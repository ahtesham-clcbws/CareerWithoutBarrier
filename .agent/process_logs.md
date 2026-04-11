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
- **Deployment**: Executed `npm run build` and pushed all changes to `master`.
