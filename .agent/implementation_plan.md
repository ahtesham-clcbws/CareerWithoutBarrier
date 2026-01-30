# Fix "Fill Subjects Details" Modal Visibility

The "Fill Subjects Details" modal in the administrator course education-type page is not visible when triggered. This is likely due to a conflict between Bootstrap 4/5 versions and the use of outdated data attributes.

## Proposed Changes

### [Course Education-Type View]

#### [MODIFY] [sholarship_category.blade.php](file:///i:/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/courses/sholarship_category.blade.php)
- Updated modal trigger button to use Bootstrap 5 attributes (`data-bs-toggle`, `data-bs-target`).
- Updated modal markup and close buttons (`btn-close`, `data-bs-dismiss`).

---

### [Student Result View]

#### [MODIFY] [student_result.blade.php](file:///i:/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/student_result.blade.php)
- Update "Import Result" and "Generate Scholarship Claims" buttons to use BS5 attributes.
- Standardize modal headers and close buttons to use `.btn-close` and `data-bs-dismiss`.
- Ensure all modals use `data-bs-backdrop="static"` or standard BS5 behavior if needed.

## Verification Plan

### Manual Verification
- Navigate to `/administrator/course/education-type`.
- Click on "Fill Subjects Details" in the last table.
- Verify the modal opens and is clearly visible.
- Verify close button and backdrop work correctly.
