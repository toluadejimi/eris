# Running the Database Merge on Shared Hosting (No Terminal)

Since you don't have SSH/terminal access, use the **web-based merge script** below.

## Step 1: Add `years_id` to Students (via phpMyAdmin)

1. Log into **phpMyAdmin**
2. Select database **eriscomn_2025_2026**
3. Open the **SQL** tab
4. Run:
   ```sql
   ALTER TABLE students ADD COLUMN years_id INT UNSIGNED NULL AFTER batch;
   ```

## Step 2: Ensure Years Table Has All Years

1. In phpMyAdmin, select **eriscomn_2025_2026**
2. Open the **years** table
3. Check that it has: **2022_2023**, **2023_2024**, **2024_2025**, **2025_2026**
4. If not, insert them:
   ```sql
   INSERT INTO years (title, active_status, status, created_by, last_updated_by, created_at, updated_at) 
   VALUES 
   ('2022_2023', 0, 1, 1, 1, NOW(), NOW()),
   ('2023_2024', 0, 1, 1, 1, NOW(), NOW()),
   ('2024_2025', 0, 1, 1, 1, NOW(), NOW()),
   ('2025_2026', 1, 1, 1, 1, NOW(), NOW());
   ```

## Step 3: Backup All Databases

In phpMyAdmin, for each DB (**eriscomn_2022_2023**, **eriscomn_2023_2024**, **eriscomn_2024_2025**, **eriscomn_2025_2026**):

1. Select the database
2. Go to **Export** tab
3. Quick export, SQL format
4. Download the backup file

## Step 4: Configure and Upload the Merge Script

1. Edit **database-merge-web.php** (in your project root)
2. Update the config at the top:
   - `host` – usually `localhost` on shared hosting
   - `username` – your MySQL user
   - `password` – your MySQL password
   - `run_key` – set a secret string, e.g. `MySecretMergeKey2025`
3. Upload `database-merge-web.php` to your site
   - Option A: In a folder outside `public` (e.g. `../merge/`) if possible
   - Option B: In a subfolder like `public/merge/` – but **protect it** (e.g. .htaccess deny, or use a hard-to-guess folder name)

## Step 5: Run the Merge

1. **Dry run** (no changes):  
   `https://yoursite.com/merge/database-merge-web.php?dry_run=1`

2. **Execute merge**:  
   `https://yoursite.com/merge/database-merge-web.php?key=YOUR_RUN_KEY`

   Replace `YOUR_RUN_KEY` with the value you set in the script.

3. After it finishes, **remove** `database-merge-web.php` from the server.

## Important Notes

- The script merges: **students**, **exam_schedules**, **exam_mark_ledgers**
- Tables like **addressinfos**, **parent_details**, **fee_masters** are not merged by the script – add them manually or extend the script if needed
- If you see `reg_no` duplicate errors, you may need to adjust `reg_no` values (e.g. add year prefix) before merging
- Always run a dry run first and check the counts
