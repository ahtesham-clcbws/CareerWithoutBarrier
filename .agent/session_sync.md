## Decisions & "Why" (Last updated: 2026-04-25)
- **OTP Success Feedback**: Added a persistent "OTP successfully sent" message below the input field to reduce user confusion. While toastr notifications provide immediate feedback, a static message serves as a visual indicator that the form is ready for the next step.
- **Unified OTP Flow**: Applied the success message to both Livewire components (Student & Corporate) and the global AJAX flow (`verifyregister.js`) to ensure UI consistency across all registration and verification points.


## Handoff Summary (2026-04-25)
- **Student Registration Success Message**: Added "OTP successfully sent" text below the OTP input in `livewire/auth/registration.blade.php`.
- **Corporate Enquiry Success Message**: Added same feedback in `livewire/website/corporate/enquiry-form.blade.php`.
- **Global AJAX Feedback**: Updated `verifyregister.js` to dynamically insert a success message below any OTP input handled via AJAX (Login, Forget Password, etc.).
- **Automatic Cleanup**: Configured the JS and Livewire logic to hide the success message once verification is complete to maintain a clean UI.

## Unresolved Questions
- Should we add a cooldown period for "Get OTP" requests to prevent SMS cost spikes?
- Do we need a fallback channel (Email) if SMS delivery fails?
- Should the "OTP successfully sent" message include the masked mobile number it was sent to?
