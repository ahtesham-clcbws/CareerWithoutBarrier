# Fix "Fill Subjects Details" Modal Visibility

The "Fill Subjects Details" modal in the administrator course education-type page is not visible when triggered. This is likely due to a conflict between Bootstrap 4/5 versions and the use of outdated data attributes.

## Proposed Changes

### [Course Education-Type View]

#### [MODIFY] [sholarship_category.blade.php](file:///i:/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/courses/sholarship_category.blade.php)
- Update modal trigger button to use Bootstrap 5 attributes:
    - Change `data-toggle="modal"` to `data-bs-toggle="modal"`.
    - Change `data-target="#importModal..."` to `data-bs-target="#importModal..."`.
- Update modal markup to be compatible with Bootstrap 5:
    - Update close button class and attributes (from `.close` + `data-dismiss` to `.btn-close` + `data-bs-dismiss`).
    - Ensure modal structure follows BS5 standards.

## Verification Plan

### Manual Verification
- Navigate to `/administrator/course/education-type`.
- Click on "Fill Subjects Details" in the last table.
- Verify the modal opens and is clearly visible.
- Verify close button and backdrop work correctly.
