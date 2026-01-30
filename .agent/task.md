# Workspace Maintenance & Analysis

- [x] Verify/Create `.agent/` Directory
    - [x] Confirm `.agent` is a directory
    - [x] Create if missing
- [x] Create Core Documentation (in `.agent/`)
    - [x] `project_architecture.md`: Overview of stack, patterns, and key flows.
    - [x] `database_schema.md`: Summary of tables and relationships.
    - [x] `feature_list.md`: Extracted features from routes and code.
    - [x] `work_history.md`: Log of changes and decisions.
- [x] Sync Task Tracking
    - [x] Maintain `task.md` in `.agent/` as the single source of truth.

- [x] Implement Plain Password Storage
    - [x] Analyze existing attributes and password handling (Student & Corporate)
    - [x] Create Observers or Modify Controllers
    - [x] Verify `login_password` column presence
    - [x] Implement logic to save `login_password`

- [x] Fix FAQ Route Conflict
    - [x] Locate Admin route definitions (`routes/admin.php`)
    - [x] Rename conflicting admin routes to `admin.home.faq`
    - [x] Update Controller/View references (`sidebar.blade.php`, `master.blade.php`)

- [x] Add Optional Link to Our Contributor
    - [x] Verify `our_contributors` table schema (Checking)
    - [x] Create migration to add `link` column
    - [x] Update Admin View (`our_contributor.blade.php`) to add URL input
    - [x] Update `HomeController::ourContributor` to save `link`
    - [x] Update Frontend View (`homepage.blade.php`) to display link
    - [x] Show optional link in Admin Table

- [x] Add Delete Option to Important Links
    - [x] Locate `ImportantLinkSettings` Livewire component
    - [x] Add `delete` method to component
    - [x] Update View to add Delete button with confirmation

- [x] Fix Route Name Conflict
    - [x] Locate duplicate `home.career` routes in `routes/web.php`
    - [x] Rename one of the conflicting routes (`preparation-course` -> `home.preparation_course`)
    - [x] Update duplicate route references if necessary

- [ ] Resolve All Route Name Conflicts
    - [x] Compare `routes/web.php` and `routes/admin.php` for duplicates
    - [x] Rename Admin routes (prefix `admin.`) in `routes/admin.php`
    - [ ] Compare `routes/corporate.php` and others for duplicates
    - [ ] Rename Corporate/Institute routes if necessary
    - [x] Resolve Vite Environment Issue
    - [x] Run `npm install` to regenerate shims
    - [x] Verify `vite.cmd` existence
    - [x] Confirm `composer dev` works
- [x] Debug Razorpay Payment Flow
    - [x] Move Razorpay credentials to `config/services.php`
    - [x] Update `Razorpay.php` controller to use `config()`
    - [x] Update `razorpay.blade.php` with auto-opening modal logic
    - [x] Remove redundant `@csrf` from `payment-page.blade.php`
    - [x] Verify fix
- [x] Integrate In-Place Razorpay Payment
    - [x] Add Razorpay checkout script to `payment-page.blade.php`
    - [x] Implement JavaScript to open Razorpay modal directly
    - [x] Update "Pay Now" button to trigger in-place checkout
    - [x] Handle payment callback and trigger page reload/success
    - [x] Verify seamless payment flow

- [x] Fix Administrator Course Education-Type Modal
    - [x] Update modal trigger attributes to Bootstrap 5
    - [x] Update modal structure and close button for Bootstrap 5
    - [x] Verify fix

