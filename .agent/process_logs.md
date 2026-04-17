# Process Logs

## [2026-04-05] Registration Form Count Investigation
- **Context**: User reported that "Remaining Forms" was 1 less than expected.
- **Analysis**: Found that `District::getLimit` counts ALL students, while Admin's "Applied" counts only PAID students.
- **Result**: Explained the logic to the user. User confirmed they understand and do not want to change it.
- **Discovered Bug**: `DistrictScholarshipLimit::students()` is missing a filter for `scholarship_category`, which could lead to cross-category form counting in the admin dashboard. Added to backlog.

## Session: 2026-04-10 10:20
- Synchronized global brain artifacts for conversation `86a7f73b-fc81-49b7-a9be-9bc537185521` to `.agent/brain/`.
- Executed production build using `npm run build` (Vite).
- Identified and resolved production-breaking bug: hardcoded `Debugbar` in `config/app.php` and `AppServiceProvider.php`.
- Refactored codebase to remove hardcoded Debugbar and committed/pushed the fix.
- Resolved production `git pull` conflict via `git reset --hard HEAD` and `git pull --rebase`.
- Successfully synced production dependencies using `composer install --no-dev`.
- Finalized production environment with `php artisan optimize`.

## Session: 2026-04-11 10:55 (Scholarship Storage Fix)
- **Problem**: 404 errors on scholarship prospectus/guideline PDF links.
- **Root Cause**: Inconsistent path handling between Admin (eprospectus folder) and Frontend (aboutus folder), combined with manual `public_path()` file movements.
- **Architectural Shift**: Transferred scholarship document handling to standard Laravel `Storage::disk('public')` while maintaining legacy file support via a smart path resolver in views.
- **Logic Guard**: Implemented local `Storage` logic in `AdminController.php` specifically for the scholarship section to avoid modifying global helpers as per user request.
- **IDE Fixes**: Resolved 4 lint errors/warnings in `AdminController.php` and `scholarship.blade.php`.
- **Infrastructure**: Verified `php artisan storage:link` and synced `public/` folder tracking in Git (resolved `.gitignore` tracking issues via `git rm --cached`).
- **Regression Fix**: Resolved `Call to undefined function getFileUrl()` in the scholarship view (introduced by a partial helper revert).
- **Course Fix**: Resolved data loss bug on course edit page (fixed textareas, category selection, and file preservation logic).
- **Deployment**: Executed multiple `git push` operations to synchronize master with all fixes.

## [2026-04-18 01:05] - Coupon Create Conversion
- **Action:** Converted `createCoupon` form to Livewire.
- **Components:** Created `App\Livewire\Administrator\Dashboard\CreateCoupon` and its view.
- **Logic:** Ported validation and code generation logic.
- **Routes:** Updated `routes/admin.php` to use the Livewire component and eliminated the redundant POST route.
- **Decision:** Used `wire:model` and `wire:submit` for state management. Kept original randomness logic for coupon codes.

## [2026-04-18 01:25] - Coupon Auto-fill & Prefixes
- **Action:** Added auto-fill functionality to `CreateCoupon` Livewire component.
- **Features:** 
    - Fetches unique prefixes and their associated data on mount.
    - Implemented `updatedPrefix` hook to automatically populate form fields when an existing prefix is entered/selected.
    - Added HTML5 `<datalist>` to the prefix input for easy selection of existing prefixes.
    - Removed `unique` validation requirements for `prefix` and `name` to allow adding coupons to existing batches.
