# Single Database Migration Guide

The application has been updated to use **one database** instead of multiple session-specific databases. All academic years are now managed in a single database using the `years` table and `years_id` foreign keys on relevant tables.

## What Changed

- **Removed:** Multiple database connections (`session_2022_2023`, `session_2023_2024`, etc.)
- **Removed:** Session/database selector on login
- **Removed:** Switch-year route and `SwitchDatabase` middleware
- **Now:** Single `mysql` connection (from `.env`) handles all data

## Setup

1. **Set your database in `.env`:**
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=eris
   DB_USERNAME=root
   DB_PASSWORD=
   ```

2. **Ensure your single database has:**
   - All tables (run migrations if needed: `php artisan migrate`)
   - The `years` table populated with your academic sessions (e.g. 2022_2023, 2023_2024, 2024_2025, 2025_2026)
   - One year marked as active (`status = 1` or `active_status = 1`)

## If You Had Multiple Databases Before

If you previously used separate databases per academic year (e.g. `eriscomn_2023_2024`, `eriscomn_2024_2025`), you have two options:

### Option A: Use One Existing Database

Pick one database (e.g. the current year) and point `DB_DATABASE` to it. You will only have data from that database. Historical data in other databases will not be accessible unless you merge them.

### Option B: Merge All Databases Into One

1. Create a new database (e.g. `eris_unified`)
2. Export schema from one of your existing databases
3. Import schema into the new database
4. For each old database, export data and import into the new database
5. Ensure `years` table has one row per academic session
6. Set `DB_DATABASE=eris_unified` in `.env`

**Note:** If tables use `years_id`, records from different databases can coexist. If tables do not have `years_id`, you may need to add it and backfill, or keep data separate by other means.

## Academic Year Switching

The app uses `Year::where('status', 1)->first()` (or `active_status`) to determine the current academic year. To switch the active year, update the `years` table in your admin/settings area (e.g. mark one year as active and others as inactive).
