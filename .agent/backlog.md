# Backlog - Admin Panel Enhancements

## Completed (Current Session)
- [x] Fix Scholarship Prospectus & Guidelines 404 errors [bd8087ea]
  - [x] Migrated PDF uploads to standard Laravel Storage.
  - [x] Implemented dual-path (Storage/Public) resolution logic.
  - [x] Resolved IDE lint errors/warnings.
- [x] Production Assets Build (Vite)
- [x] Git Push & Session Synchronization
- [x] Brain Artifact Mirroring
- [x] Git Untracked `public/home` and other upload folders.

## Active Sprint (April 11, 2026)
- [x] Deployment of Scholarship Storage Fix
- [x] Final Verification & Pushing

## Future / Recommended
- [ ] Migrate other media uploads (icons, blog images) to standard Storage.
- [ ] Refactor common image upload logic into a Trait or Service (currently repetitive in AdminController).
- [ ] Implement a global `storage_url` helper after confirming no side effects on existing custom logic.
