# Backlog - Admin Panel Enhancements

## Completed (Current Session)
- [x] Convert Create Coupon to Livewire [3f86386e]
  - [x] Created `CreateCoupon` Livewire component
  - [x] Ported logic and validation
  - [x] Created Livewire view with loading states
  - [x] Updated routes and deleted legacy blade
- [x] Implement Coupon Auto-fill & Prefix Suggestions [3f86386e]
  - [x] Fetched unique prefixes on mount
  - [x] Added `updatedPrefix` hook for auto-populating fields
  - [x] Added `<datalist>` for prefix input
  - [x] Relaxed `unique` validation for prefix/name
- [x] Fix Course Edit Data Loss [bd8087ea]
  - [x] Fixed empty CKEditor in edit mode by correcting textarea HTML.
  - [x] Fixed file deletion on update by preserving existing paths in Controller.
  - [x] Added Category selection persistence.
  - [x] Added admin file previews for course management.
- [x] Fix Scholarship Prospectus & Guidelines 404 errors [bd8087ea]
  - [x] Migrated PDF uploads to standard Laravel Storage.
  - [x] Implemented dual-path (Storage/Public) resolution logic.
- [x] Production Assets Build (Vite)
- [x] Git Untracked `vendor/`, `public/home` and other upload folders.
- [x] Resolved IDE lint errors/warnings.

## Active Sprint (April 18, 2026)
- [/] Enhance Govt Websites Section & Admin Form [4831551a]
  - [/] Improve homepage UI (Premium Aesthetics)
  - [ ] Refactor Admin management form
  - [ ] Add missing database migration for `remark`
  - [ ] Migrate storage path to `home/govt_websites`

- [ ] [FUTURE] Implement MSG91 OTP Service [3b405455]
  - [ ] Create `Msg91Service` class.
  - [ ] Add `.env` variables for Auth Key, Sender ID, and Template IDs.
  - [ ] Update `AppServiceProvider` to register the service.
  - [ ] Refactor `HomeController` and `CorporateController` to use the new service.
  - [ ] Map approved DLT templates once available.
