# Implementation Plan: Targeted Scholarship Link Fix (Local Only)

Fixing the prospectus and guideline links specifically by implementing `Storage` logic directly in the affected controller and views, avoiding any global helper modifications.

## User Review Required

> [!IMPORTANT]
> - Existing files will remain in the `public/` directory.
> - New files will be uploaded to `storage/app/public/`.
> - A smart helper `storage_url()` will be used to resolve the correct URL by checking both locations.
> - IDE lint errors and warnings regarding path resolution will be fixed.
> - Views will dynamically check both the standard `storage/` directory and the legacy `public/` directory to ensure all files (old and new) load correctly.

## Proposed Changes

### [Component] Admin Controller

#### [MODIFY] [AdminController.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Http/Controllers/AdminController.php)
- Update the `scholarship` method for `scholarship_secondForm`:
  - Use `home/eprospectus` as the base folder.
  - Implement `Storage::disk('public')->putFileAs()` directly for `prospectus` and `guideline` fields.
  - Manually update/create `Image` model records to maintain consistency with the rest of the app's media tracking.

### [Component] Views (Frontend & Admin)

#### [MODIFY] [scholarship.blade.php (Frontend)](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/website/scholarship.blade.php)
- Update the PDF path generation to use `home/eprospectus/`.
- Wrap the output URL in a check:
  ```php
  \Illuminate\Support\Facades\Storage::disk('public')->exists($path) 
  ? \Illuminate\Support\Facades\Storage::disk('public')->url($path) 
  : asset($path)
  ```

#### [MODIFY] [scholarship.blade.php (Admin)](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/Home/scholarship.blade.php)
- Update code to handle dual path resolution for previews.
- Fix "Asset not found" warnings by correcting `asset()` directory syntax.

## Verification Plan

### Manual Verification
- Re-upload a prospectus in the admin panel and verify it is saved to `storage/app/public/home/eprospectus/`.
- Verify the link on the frontend works for BOTH the newly uploaded file and any existing files in `public/home/eprospectus/`.
