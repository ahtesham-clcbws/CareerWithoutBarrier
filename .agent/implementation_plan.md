# Enhance Govt Websites Section & Admin Form

The user wants to improve the "Govt Websites" section, specifically requested to use Laravel's **Storage** facade for **new** uploads, and add an **Edit option** in the admin panel. 

## User Review Required

> [!IMPORTANT]
> **No automatic file migration**: As per user instructions, I will not move existing images. I will update the logic to handle both existing public paths and new Storage-based paths.
> 
> **Edit Functionality**: I will implement AJAX-based editing for Govt Websites to keep the management experience seamless.

> [!NOTE]
> The `remark` column is missing from the migrations but is used in the code. I will add a migration to ensure the schema is correct.

## Proposed Changes

### Database & Storage
- Create a migration to add the `remark` column to the `govtwebsite` table (if missing).
- Ensure the `public/storage` link exists (verified).

### [MODIFY] [HomeController.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Http/Controllers/HomeController.php)
- Update `savegovtwebsite` method:
    - Handle both **Store** and **Update** logic.
    - Use `Storage::disk('public')->putFile('govt_websites', $request->image)` for new uploads.
    - Store the relative path in the DB if using Storage, or keep the existing format if legacy. 
    - *Decision*: For consistency in the model, I'll store the relative path (e.g., `govt_websites/name.png`) for new items.

### [MODIFY] [govtwebsite.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/Home/govtwebsite.blade.php)
- **Add Edit Feature**: Implement a modal or inline form to edit existing Govt Website records.
- **UI Upgrade**:
    - Improved layout with better visual hierarchy.
    - Enhanced file preview (shows current image when editing).
    - Clearer labels and placeholders.
- **Path Resolution**: Logic to check if an image path starts with `govt_websites/` (Storage) or is a legacy filename in `home/courses/`.

### [MODIFY] [homepage.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/website/homepage.blade.php)
- **Aesthetic Overhaul**: 
    - Implement a high-end marquee/carousel.
    - Use **Glassmorphism** for logo cards (backdrop-blur, translucency).
    - Smooth hover transitions and scaling.
- **Path Resolution**: Use a helper or inline check to resolve image URLs correctly for both legacy and new Storage paths.

### [DELETE] Migrate Govt Files Command
- Removed as per user request.

## Verification Plan

### Automated Tests
- N/A (UI based)

### Manual Verification
- Upload a new Govt Website logo in the admin panel and verify it shows up in the new folder.
- Edit an existing logo and verify the changes (including image update) reflect correctly.
- Verify the logo displays correctly in the admin list.
- Verify the homepage section displays the logos with the new "Premium" styling.
- Check mobile responsiveness.
