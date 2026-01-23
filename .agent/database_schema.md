# Database Schema Analysis

## Core Tables
- `users`: Standard auth table.
- `students`: Core student profile data.
- `personal_access_tokens`: Sanctum auth.

## Domain Specific
- `centers`: Examination or coordinate centers.
- `corporates`: Institutional partners/companies.
- `scholarship_exam`, `scholarship_claim_generations`: Scholarship logic.
- `payments`, `student_payments`: Payment records (Razorpay integration).
- `results`, `gn_result_subject_mappings`: Exam results.
- `categories`, `subcategories`, `subjects`: Categorization for exams/courses.

## Recent Updates
- **Jan 2025:** Added columns to `corporates`, `students`, `testimonials`.
- **June 2025:** Created `policy_pages_table`.
- **Future/Planned:** `district_scholarship_limits` updates (Oct 2025 migration date noted).

## Relationships (Inferred)
- `students` -> `users` (Likely 1:1 or extensions).
- `students` -> `scholarship_exam` via applications.
- `centers` -> `districts`/`cities`.
