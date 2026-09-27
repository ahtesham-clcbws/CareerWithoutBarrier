## Decisions & "Why" (Last updated: 2026-09-27)
- **Admin Accounts Password Reset Migration**: Generated a dedicated migration to reset passwords for admin accounts to `23988725`.
- **Targeting Strategy**: In this application, admins are stored in the `users` table. The query checks multiple schema states: `roles` (`admin`, `superadmin`, `sub_admin`, `administrator`), `isAdminAllowed = 1`, and emails containing `admin`. Includes fallback logic for non-student accounts in legacy single-user configurations where role flags may not be explicitly set.

## Handoff Summary (2026-09-27)
- **Migration File**: Created [2026_09_27_180243_reset_admin_accounts_password.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/database/migrations/2026_09_27_180243_reset_admin_accounts_password.php).
- **Execution Command**: Ready to be applied during the next deployment or via `php artisan migrate`.

## Unresolved Questions
- None.

