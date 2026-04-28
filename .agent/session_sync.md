## Decisions & "Why" (Last updated: 2026-04-26)
- **Institute Name in Student List**: Updated the administrator student list to display the Institute Name instead of the Director/Person's name for students using corporate vouchers. This provides better clarity for administrators to identify which institution a student belongs to.
- **Eager Loading for Performance**: Added eager loading for the `corporate` relationship on `latestStudentCode` in `AdminController` to avoid N+1 query issues when displaying institute names.
- **Data Consistency**: Updated all coupon application points (API, StudentController, Livewire) to store `institute_name` into `corporate_name` by default, ensuring future consistency while maintaining backward compatibility in the view.
- **Institute Display Toggle**: Added a toggle button in the administrator institute list to enable/disable the display of institutes on the `/authentication-code` (Free Form) page. This allows administrators to temporarily hide institutes without unapproving them.
- **Strict Image-Only Testimonial**: Modified the student dashboard's "Say About Us" feature to strictly allow ONLY image uploads. The review textarea has been permanently removed, and the file picker is restricted to image files only. All text-related fields have been hidden from both input and display.
- **PDF Image Loading Fix**: Resolved `file_get_contents` HTTP errors in PDF generation by replacing `asset()` URLs with `public_path()` file paths. This prevents the server from attempting to fetch its own assets via HTTP, which frequently fails in local or restricted network environments.
- **Payment Page Course Name Fix**: Resolved an issue where the student's ID was displayed as the course ID on the payment page. Added a `course` relationship to `StudentPayment` and updated the view to display the course name. Also corrected the saving logic in `Razorpay` and `ApplicationController`.
9: - **Corporate Admit Card Restrictions**: Restricted the Institute (Corporate) dashboard from blocking or stopping admit cards once they have been issued from the admin panel. The "Stop AdmitCard" button and checkbox are now hidden for issued students, and the backend prevents status changes for these records.


## Handoff Summary (2026-04-26)
- **Admin Student List**: Modified `administrator.dashboard.studentlist` to prioritize `corporate->institute_name`.
- **Eager Loading**: Updated `AdminController::studentList` and `AdminController::studentRollList` with `.corporate` eager loading.
- **Save Logic**: Updated `StudentController`, `Api/ApplicationController`, `Registration`, `RegistrationForm`, and `PaymentPage` to save `institute_name` into `corporate_name`.
- **Institute Display Toggle**:
    - Updated `EnquiryController::instituteStatus` to handle `toggle-display` type.
    - Added AJAX-powered "Enable/Disable" buttons to `administrator.dashboard.institude.institude_list`.
    - Updated `FreeForm` Livewire component to filter by `status == 1`.
    - Modified `EnquiryController` to automatically set `status = 1` when a new institute is approved.
- **Strict Image-Only Testimonial**:
    - Permanently removed `message` textarea from `livewire.student.add-testimonial`.
    - Added `accept="image/*"` to the file input to strictly restrict the browser file picker to image files.
    - Updated `AddTestimonial.php` (Student) to make `image` required and `message` nullable.
    - Removed message display from the student dashboard view.
- **PDF Generation**: Fixed image loading in all PDF download views (`print-approve-institute-list`, `new-institute-enquiry`, `print-signup-institute-list`, `print-student-list`, `print-student-details`) by using `public_path()` instead of `asset()`.
- **Payment Page Course Name Fix**:
    - Added `course()` relationship to `StudentPayment` model.
    - Updated `Razorpay` and `ApplicationController` to store actual `scholarship_opted_for` ID in `course_id`.
    - Updated `payment-page.blade.php` to display course name instead of ID.

## Unresolved Questions
- Should we add a cooldown period for "Get OTP" requests to prevent SMS cost spikes?
- Do we need a fallback channel (Email) if SMS delivery fails?
- Should the "OTP successfully sent" message include the masked mobile number it was sent to?
