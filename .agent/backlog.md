# Project Backlog

## Completed Tasks
- [x] Admin OTP login implementation (both OTP and password).
- [x] Enforce 10-digit mobile number rule for admin OTP.
- [x] Centralize TRAI-approved OTP template in `Msg91Service`.
- [x] Resolve Student OTP saving issue in `Msg91Service`.
- [x] Sanitize mobile numbers globally (exactly 10 digits) for OTP storage and verification.
- [x] Fix non-existent `errors()` calls in `verifyregister.js`.
- [x] Correct unique validation rules in admin profile update.
- [x] Migrated SMS Infrastructure Integration (Conversation 3b405455).
- [x] Bulk Student Creation Form (Conversation 0f79c8ed).

## Active Tasks
- [ ] Monitor OTP delivery success rates with the new template.
- [ ] Add rate limiting to "Get OTP" button to prevent abuse.
- [ ] Implement master toggle for OTP login in settings.

## Future Enhancements
- [ ] Audit logs for admin logins.
- [ ] Two-factor authentication (2FA) via email as fallback.
