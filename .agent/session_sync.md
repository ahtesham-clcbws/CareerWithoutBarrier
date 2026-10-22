## Decisions & "Why" (Last updated: 2026-10-22)
- **Home Counters Management**:
  - Implemented dynamic management for the 4 homepage progress counters under **Home Page Master** -> **Home Counters**.
  - Restored static ordering and locked predefined icons for the 4 slots: Scholarship Counter, Institutes Counter, Form Fee Counter, and Free Education Counter.
  - Dynamically configured `data-count-start` to always derive from `max(0, counter_value - 10)` in both backend model accessor and frontend Blade template.
  - Created a dedicated batch form in admin with live preview for start counts and switch toggles for plus (+) suffixes.

## Handoff Summary (2026-10-22)
- **New Files**:
  - `database/migrations/2026_10_22_131647_create_homepage_counters_table.php`
  - `app/Models/HomepageCounter.php`
  - `resources/views/administrator/Home/counters/index.blade.php`
- **Modified Files**:
  - `routes/admin.php`
  - `app/Http/Controllers/HomeController.php`
  - `resources/views/administrator/layouts/sidebar.blade.php`
  - `resources/views/website/homepage.blade.php`
- **Pending User Action**:
  - Run `php artisan migrate` on the database server to run the migration and seed the initial counter rows.

## Unresolved Questions
- None.


