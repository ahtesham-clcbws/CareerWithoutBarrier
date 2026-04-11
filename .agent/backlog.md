# Backlog - Admin Panel Enhancements

## Completed (Current Session)
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

## Active Sprint (April 11, 2026)
- [x] Deployment of Scholarship & Course Fixes
- [x] Final Verification & Pushing

## Future / Recommended
- [ ] Migrate all other media uploads (icons, blog images) to standard Storage.
- [ ] Implement a global `file_url()` or `storage_url()` helper to unify path resolution.
