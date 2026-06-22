# Coupon Dash and Case Insensitivity

Allow coupon codes to be validated with or without hyphens (dashes) or spaces, and in any case (upper/lower case) in the student's dashboard.

## Proposed Changes

### 1. [MODIFY] Student Controller

#### [MODIFY] [StudentController.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Http/Controllers/StudentController.php)
In `applyCoupon()`, normalize the incoming coupon code input:
1. Strip all hyphens and spaces.
2. Convert all characters to uppercase.
3. Format it back to blocks of 4 separated by hyphens (e.g., `ABCD-EFGH-IJKL`) before querying.

---

### 2. [MODIFY] Payment Page Livewire Component

#### [MODIFY] [PaymentPage.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Livewire/Student/PaymentPage.php)
In `applyCoupon()`, normalize the input coupon code in the same way (stripping hyphens/spaces, converting to uppercase, and inserting hyphens back every 4 characters) to support dash and case-insensitive matching.

---

## Verification Plan

### Manual Verification
1. Open the student payment page.
2. Enter a valid coupon code in lowercase without any dashes (e.g., `abcdefghijkl` instead of `ABCD-EFGH-IJKL`).
3. Click "Apply Coupon" and verify it matches the coupon successfully.
4. Verify the coupon code is saved back in its proper uppercase format with hyphens.
