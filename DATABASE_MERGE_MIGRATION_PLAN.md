# Database Merge Migration Plan
## Consolidating Multiple Academic-Year Databases Into One

This plan ensures **no data loss** when merging historical databases (e.g. `eriscomn_2022_2023`, `eriscomn_2023_2024`, etc.) into a single database.

---

## Phase 0: Preparation (CRITICAL – Do Not Skip)

### 1. Full Backup
```bash
# Backup each source database BEFORE any changes
mysqldump -u root -p eriscomn_2022_2023 > backup_2022_2023_$(date +%Y%m%d).sql
mysqldump -u root -p eriscomn_2023_2024 > backup_2023_2024_$(date +%Y%m%d).sql
mysqldump -u root -p eriscomn_2024_2025 > backup_2024_2025_$(date +%Y%m%d).sql
# ... repeat for each historical DB

# Backup your current target DB
mysqldump -u root -p eris_unified > backup_unified_$(date +%Y%m%d).sql
```

### 2. Test Environment
- Run the entire migration on a **copy** of production first
- Verify data integrity and app behaviour before touching production

### 3. Document Current State
- List all source databases and their names
- Note which year each DB represents
- Confirm .env `DB_DATABASE` for the target (merged) database

---

## Phase 1: Schema Updates (Add `years_id` Where Missing)

Some tables are year-scoped by database but have **no `years_id` column**. We must add it before merge.

### Tables that NEED `years_id` added

| Table | Reason |
|-------|--------|
| `students` | Each DB has its own students for that year. When merging, we must tag which year they belong to. |
| `fee_masters` | Fee records are per-student per-year |
| `fee_collections` | Payment records linked to fee_masters |
| `addressinfos` | Student addresses (via students_id → year) |
| `parent_details` | Parent info (via students_id) |
| `academic_infos` | Academic history (via students_id) |
| `student_guardians` | Guardian links (via students_id) |
| `library_members` | If year-scoped |
| `residents` | Hostel residents (if year-scoped) |

### Tables that ALREADY have `years_id`

- `exam_schedules`
- `attendances`
- `subject_attendances`
- `assignments`
- `resident_histories`
- `transport_histories`
- `student_exam_access`

### Migration: Add `years_id` to `students`

Create migration:
```bash
php artisan make:migration add_years_id_to_students_table
```

Migration content:
```php
// In the migration's up() method:
Schema::table('students', function (Blueprint $table) {
    $table->unsignedInteger('years_id')->nullable()->after('batch');
    // We'll backfill this during merge; then make it required if desired
});

// Also: change reg_no unique constraint if same reg_no can exist across years
// DB::statement('ALTER TABLE students DROP INDEX students_reg_no_unique');
// $table->unique(['reg_no', 'years_id']);
// Only do this if your reg_no can repeat across years. If reg_no is globally unique (e.g. STU2022001, STU2023001), leave the unique as-is.
```

Run only on the **target** database after it exists.

---

## Phase 2: Define Merge Order

Merge in this order to respect foreign keys:

1. **Reference/Master Tables** (usually same across DBs – take from newest or merge carefully)
   - `years` – merge all unique year titles
   - `faculties`, `semesters`, `months`, `exams`, `subjects`, `student_statuses`, `student_batches`
   - `hostels`, `rooms`, `beds`, `routes`, `vehicles`
   - `general_settings` – keep one (e.g. from current year)

2. **Year-Scoped Tables** (have `years_id`; safe to merge with ID remapping for FKs)
   - `exam_schedules`
   - `attendances`, `subject_attendances`
   - `assignments`
   - `resident_histories`, `transport_histories`
   - `student_exam_access`

3. **Student-Dependent Tables** (require `students_id` mapping)
   - `students` (with `years_id` set)
   - `addressinfos`, `parent_details`, `academic_infos`, `student_guardians`
   - `exam_mark_ledgers` (also `exam_schedule_id` mapping)
   - `fee_masters`, `fee_collections`
   - `library_members`, `book_issues`
   - `certificate_histories`, etc.

4. **Users**
   - `users` – student logins (role 6) reference `hook_id` = student id. When we remap student IDs, we must update `users.hook_id`.

---

## Phase 3: ID Remapping Strategy

When merging DB B into target A, IDs will collide. Strategy:

1. **Build mapping tables** (temporary, in target DB):
   - `_merge_students_map`: `(source_db, old_id, new_id)`
   - `_merge_exam_schedules_map`: `(source_db, old_id, new_id)`
   - Similar for any table whose PK is referenced elsewhere

2. **Process oldest year first** (e.g. 2022_2023 → 2024_2025)
   - Insert from year 1: students, exam_schedules, etc. Keep same IDs if target is empty.
   - Insert from year 2: assign NEW IDs; record mappings; update FK columns when inserting child rows.

3. **Handle `reg_no` uniqueness**
   - If `reg_no` is globally unique (e.g. STU/2022/001): no change.
   - If `reg_no` can repeat across years (e.g. both DBs have STU001): either
     - Make `(reg_no, years_id)` unique and allow duplicates, or
     - Transform during merge: `STU001` in 22-23 → `STU2022001`, in 23-24 → `STU2023001`.

---

## Phase 4: Practical Merge Options

### Option A: Laravel Artisan Command (Recommended)

A custom command can:

1. Connect to each source DB in turn
2. For each table, read rows, apply ID mappings, insert into target
3. Maintain `_merge_*_map` tables for FK resolution

Pros: Full control, no manual SQL.  
Cons: Requires development time; slower for very large datasets.

### Option B: mysqldump + SQL Scripts

1. **Dump each DB** without `CREATE TABLE` for shared tables:
   ```bash
   mysqldump -u root -p --no-create-info eriscomn_2022_2023 students > students_2022_2023.sql
   ```

2. **Preprocess the SQL** to:
   - Add `years_id` values
   - Rewrite IDs (e.g. with `sed`/script): `(1,` → `(1001,` for students from year 2
   - Rewrite FK references: `students_id = 1` → `students_id = 1001`

3. **Import** into target:
   ```bash
   mysql -u root -p eris_unified < students_2022_2023_modified.sql
   ```

Pros: Uses standard tools.  
Cons: Preprocessing scripts can be error-prone; careful testing required.

### Option C: Hybrid – Use One DB as Base, Import Others

1. Pick the **current year DB** as the target (e.g. `eriscomn_2024_2025`).
2. Add `years_id` to `students` and other tables as needed.
3. Run a Laravel command that:
   - Connects to each historical DB (2022_2023, 2023_2024)
   - For each row in critical tables, inserts into target with:
     - Correct `years_id`
     - New PKs where needed
     - Remapped FKs using mapping tables

---

## Phase 5: Step-by-Step Checklist

- [ ] 1. Backup all source databases
- [ ] 2. Create target database `eris_unified` (or choose existing)
- [ ] 3. Run migrations on target (or copy schema from one source)
- [ ] 4. Add `years_id` to `students` (and others as needed) on target
- [ ] 5. Ensure `years` table has rows: 2022_2023, 2023_2024, 2024_2025, 2025_2026
- [ ] 6. Merge reference tables (take from one DB or merge manually)
- [ ] 7. Merge year 1 (oldest): students, exam_schedules, attendances, etc., with `years_id` set
- [ ] 8. Merge year 2: use ID mapping, insert students with new IDs, then children with mapped FKs
- [ ] 9. Repeat for each subsequent year
- [ ] 10. Update `users.hook_id` for student logins to point to new student IDs
- [ ] 11. Verify: row counts, spot-check records, run app in test environment
- [ ] 12. Update `.env` to use merged database
- [ ] 13. Re-test full app flows (login, exams, fees, reports)

---

## Phase 5b: Add Source Connections for Merge

To run the `db:merge-historical` Artisan command, add your historical databases to `config/database.php` temporarily:

```php
// In config/database.php, inside 'connections' array:
'session_2022_2023' => [
    'driver' => 'mysql',
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => 'eriscomn_2022_2023',
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'strict' => true,
],
// Repeat for session_2023_2024, session_2024_2025, etc.
```

Edit `app/Console/Commands/MergeHistoricalDatabases.php` and set `$sources` to match your actual DB names and year keys.

---

## Phase 6: Post-Merge Application Updates

The application already filters by `years_id` and active year:

- Exam lists, results, attendance are filtered by `Year::where('active_status', 1)`.
- Ensure the `years` table has one row per historical year.
- Ensure one year is marked `active_status = 1` as the current session.

No further code changes should be required for basic year scoping.

---

## Appendix: Quick Reference – Tables by Category

**Already have `years_id`:**  
exam_schedules, attendances, subject_attendances, assignments, resident_histories, transport_histories, student_exam_access

**Need `years_id` or are student-scoped:**  
students, fee_masters, fee_collections, addressinfos, parent_details, academic_infos, student_guardians, exam_mark_ledgers (via exam_schedule→years_id, but students_id needs mapping)

**Reference (shared):**  
years, faculties, semesters, months, exams, subjects, hostels, rooms, beds, routes, vehicles, general_settings

---

## Handling `reg_no` Conflicts

If the same `reg_no` appears in multiple year databases (e.g. same student continuing):

1. **Option A**: Make `(reg_no, years_id)` unique – allows same reg_no in different years
2. **Option B**: Transform during merge – e.g. `STU001` in 2022_2023 → `STU/22/001`
3. **Option C**: Keep one student record, add enrollment history – requires schema changes

The current merge command inserts each year's students independently. If `reg_no` is unique globally and you have duplicates, the second insert will fail. Check your data first:

```sql
-- Run on each source DB to see if reg_no is year-specific
SELECT reg_no, COUNT(*) FROM students GROUP BY reg_no HAVING COUNT(*) > 1;
```

---

## Running the Merge Command

```bash
# Dry run first (no changes)
php artisan db:merge-historical --dry-run

# Merge all years
php artisan db:merge-historical

# Merge one year only
php artisan db:merge-historical --year=2022_2023
```
