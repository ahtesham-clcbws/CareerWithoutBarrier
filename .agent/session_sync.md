## Decisions & "Why" (Last updated: 2026-04-23)
- **Admin OTP Enforcement**: Decided to require BOTH password and OTP for admins with 10-digit mobile numbers to enhance security.
- **Dynamic OTP Recipient**: Changed admin OTP sending to fetch the specific admin's stored mobile number.
- **Centralized Messaging**: Moved all OTP message construction to `Msg91Service::OTP_TEMPLATE` to ensure 100% compliance with TRAI-approved templates and ease of future updates.
- **Login UI Logic**: Implemented JS-based visibility for the OTP field specifically for administrator paths.

## Handoff Summary (2026-04-23)
- **Implemented Admin OTP Login**: Admins now require both password and OTP if they have a 10-digit mobile number.
- **Fixed Student OTP Saving**: Resolved an issue where OTPs were not saving to the database for students. Moved the database save operation to BEFORE the API call in `Msg91Service` to ensure records are always created, even if the SMS gateway fails.
- **Global Number Sanitization**: Hardened `Msg91Service` and `verifyOtp` helper to consistently clean mobile numbers to exactly 10 digits. This ensures that numbers stored in the database match the numbers used during verification, regardless of user input formatting.
- **Centralized TRAI Template**: Created `Msg91Service::OTP_TEMPLATE` containing the exact approved text from the user's screenshot.
- **Refined Mobile Validation**: Added non-numeric character stripping before checking mobile number length in both sending and login phases.
- **Fixed Buggy JS**: Corrected non-existent `errors()` calls to `error()` in `verifyregister.js`.
- **Updated Login UI**: Modified `auth/login.blade.php` to include a functional OTP field and "Get OTP" button.
- **Admin Profile Correction**: Fixed existing validation bugs in `AdminController::profile`.

## Unresolved Questions
- Should we add a cooldown period for "Get OTP" requests to prevent SMS cost spikes?
- Do we need a fallback channel (Email) if SMS delivery fails?
