# Project Backlog

## Current Tasks
- [ ] Add Default OTP System
    - [ ] Create migration for `registration_settings` (add `default_otps` and `registration_fee`).
    - [ ] Update `RegistrationSetting` Livewire component.
    - [ ] Update `RegistrationSetting` view.
    - [ ] Create Global Helper for OTP verification.
    - [ ] Update `Registration.php` to use Global OTP verification.
    - [ ] Update `CorporateController.php` and other relevant controllers.
- [ ] Improve Admin Sidebar Functionality
    - [ ] Refactor from `dropdown` to `collapse` for better performance and multi-level support.
    - [ ] Remove hardcoded `open show` classes.
    - [ ] Implement robust active state detection for automatic expansion.
    - [ ] Optimize JavaScript and CSS to fix "lagging" issues.
- [ ] Analyze Fee Update (750 -> 850)
    - [ ] Audit all files for hardcoded `750`.
    - [ ] Propose migration to move fee to database.

## Completed Tasks
- [x] Verify/Create `.agent/` Directory
- [x] Implement Plain Password Storage
- [x] Fix FAQ Route Conflict
- [x] Add Optional Link to Our Contributor
- [x] Add Delete Option to Important Links
- [x] Fix Route Name Conflict
- [x] Debug Razorpay Payment Flow
- [x] Integrate In-Place Razorpay Payment
- [x] Fix Administrator Course Education-Type Modal
- [x] Fix Administrator Student Result Modal
- [x] Update FAQ UI and Add Edit Functionality
