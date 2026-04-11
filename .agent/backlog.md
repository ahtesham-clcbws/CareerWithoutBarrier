# Backlog - Admin Panel Enhancements

## Completed (Current Session)
- [x] Production Assets Build (Vite)
- [x] Git Push & Session Synchronization
- [x] Brain Artifact Mirroring
- [x] Resolve Production Git Conflict
- [x] Fix hardcoded Debugbar crash to allow `composer install --no-dev`
- [x] Full Production Sync & Optimization

## Active Sprint (April 11, 2026)
- [ ] Fix Scholarship Prospectus & Guidelines 404 errors [bd8087ea]
  - [ ] Update AdminController to use `home/eprospectus` for PDF uploads.
  - [ ] Update frontend scholarship view to correct paths.
  - [ ] Update admin scholarship view to correct paths.
- [x] Deployment Preparation & Persistence

## Future / Recommended
- [ ] Migrate media uploads from `public/` to `storage/app/public/`
- [ ] Implement `php artisan storage:link` on production
- [ ] Refactor common image upload logic into a Trait or Service
