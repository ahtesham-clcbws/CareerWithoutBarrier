# Walkthrough - Excel Export, Bulk Import, Gated Delete All, and Case/Dash Normalization

We implemented Excel export, Excel bulk import (restore), an email-authorized "Delete All Coupons" feature, and case/dash-insensitive coupon code validation.

## Changes Made

### 1. Export & Import Classes
* **Export File**: [CouponsExport.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Exports/CouponsExport.php)
  * Formats coupon records for Excel outputs.
* **Import File**: [CouponsImport.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Imports/CouponsImport.php)
  * Parses uploaded Excel sheets row-by-row, skipping coupons already present in the database to prevent duplicate entries, mapping statuses, looking up corporate IDs, and saving records.

### 2. Coupon Controller & Normalization
* **File**: [CouponCodeController.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Http/Controllers/CouponCodeController.php)
  * Added `exportCoupons(Request $request)` for Excel streaming.
  * Added `importCoupons(Request $request)` to validate uploads and trigger Excel import parsing.
* **File**: [StudentController.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Http/Controllers/StudentController.php)
  * Normalizes the coupon code typed by the student in the legacy `applyCoupon` endpoint to format it with hyphens and make it case/dash insensitive before matching the DB record.

### 3. Routes
* **File**: [admin.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/routes/admin.php)
  * Added `coupon.export` and `coupon.import` endpoints.

### 4. Admin Livewire Component & View
* **Livewire Component File**: [CouponList.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Livewire/Administrator/Dashboard/CouponList.php)
  * Added `deleteAll()` method ensuring only user email `ahtesham2000@ymail.com` can perform the operation.
* **Blade View File**: [coupon-list.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/administrator/dashboard/coupon-list.blade.php)
  * Added the **Export Excel** button inline next to **Export PDF**.
  * Added the **Restore/Import Coupons (Excel)** upload form above the table layout.
  * Added the **Delete All Coupons** button, visible and usable only for `ahtesham2000@ymail.com`.

### 5. Payment Page Livewire Component
* **Livewire Component File**: [PaymentPage.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Livewire/Student/PaymentPage.php)
  * Normalizes coupon code typed by the student (converting to uppercase, removing hyphens/spaces, and splitting into blocks of 4 separated by hyphens) to ensure dash and case insensitivity works properly during registration checks.

### 6. MSG91 SMS Service & Environment Settings
* **Service File**: [Msg91Service.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Services/Msg91Service.php)
  * Updated `OTP_TEMPLATE` and `getFormattedMessage($otp)` to use the new layout: `"Dear user OTP for sign up to www.careerwithoutbarrier.com is ##var## valid for 10 minutes. Do not share this OTP Regards SQS Foundation"` replacing `##var##`.
* **Config File**: [.env](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/.env)
  * Updated `MSG91_OTP_TEMPLATE_ID` to the new MSG91 template ID: `6a32c6f447a2ad09ab0f1f02`.

---

## Verification Results
* Ran PHP syntax validation successfully on all modified files.
* Executed mock simulation tests verifying:
  * Case/dash/space insensitivity (Pass)
  * Bulk import and database duplicacy checking/skipping (Pass)
  * "Delete All Coupons" email authorization restrictions (Pass)
