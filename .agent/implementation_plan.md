# Add Negative Marks to Subject Details

This plan outlines the changes required to add "negative marks for wrong answers" and "negative marks for skipped questions" to the scholarship category subject details.

## Proposed Changes

### Database Migration
#### [NEW] [2026_02_01_153000_add_negative_marks_to_subject_paper_details_table.php](file:///i:/CareerWithoutBarrier/career-without-barrier/database/migrations/2026_02_01_153000_add_negative_marks_to_subject_paper_details_table.php)
- Add `negative_marks_wrong` (decimal, default 0)
- Add `negative_marks_skipped` (decimal, default 0)

### UI Modification
#### [MODIFY] [sholarship_category.blade.php](file:///i:/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/courses/sholarship_category.blade.php)
- Add headers for "Negative Marks (Wrong)" and "Negative Marks (Skipped)" in the modal table.
- Add input fields for these new columns in each row.
- Update the AJAX save logic to include these new fields.

### Result Visualization & Calculation
#### [MODIFY] [result_download.blade.php](file:///i:/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/student/result_download.blade.php)
#### [MODIFY] [result_download.blade.php](file:///i:/CareerWithoutBarrier/career-without-barrier/resources/views/student/dashboard/result_download.blade.php)
- Fetch `negative_marks_wrong`, `negative_marks_skipped`, `max_marks`, and `total_questions` from `subject_paper_details`.
- Calculate `marks_per_question = max_marks / total_questions`.
- Update total marks calculation logic:
  - Adjusted `obtained_marks = (right_answers * marks_per_question) - (wrong_answers * negative_marks_wrong) - (skipped_questions * negative_marks_skipped)`.
  - Ensure total obtained marks doesn't go below zero (if applicable, usually it stops at zero).
- Update the display in both Admin and Student result blades.

### Backend Logic
#### [MODIFY] [AdminController.php](file:///i:/CareerWithoutBarrier/career-without-barrier/app/Http/Controllers/AdminController.php)
- Update `subjectPaperDetailsAdd` method to save `negative_marks_wrong` and `negative_marks_skipped`.

---

## Verification Plan

### Manual Verification
1.  **Configure Negative Marks**:
    - Navigate to Scholarship Category page.
    - Click "Fill Subjects Details" for a category.
    - Set non-zero values for "Negative Marks (Wrong)" and "Negative Marks (Skipped)".
    - Save.
2.  **Verify Result Calculation**:
    - Access a student's result page (both Admin and Student panels).
    - Verify that the "Obtained Marks" and "Total Marks" reflect the deductions.
    - Example:
        - Right: 10 (+1 each = 10)
        - Wrong: 2 (-0.25 each = -0.5)
        - Skipped: 1 (-0.1 each = -0.1)
        - Expected Total: 9.4
3.  **Cross-Check**:
    - Ensure both Admin and Student panels show identical results.
