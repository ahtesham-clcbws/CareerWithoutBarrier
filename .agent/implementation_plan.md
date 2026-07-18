# Implementation Plan - Direct Coupon Allotment Page

Add a new admin page allowing administrators to select an institute and directly paste generated coupon codes into a textarea to allot them.

## Proposed Changes

### 1. [NEW] Livewire Component: AllotCoupon

#### [NEW] [AllotCoupon.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Livewire/Administrator/Dashboard/AllotCoupon.php)
Create a new Livewire component that:
- Loads all registered corporates (`Corporate::orderBy('institute_name')->get()`) for the dropdown selection.
- Provides a textarea input for coupon codes.
- Implements `allot()` method which:
  - Sanitizes the input (splits by newline, comma, or whitespace).
  - Processes each code:
    - Normalizes the code (trims, uppercase, inserts hyphens if matching formatting).
    - Queries `CouponCode::where('couponcode', $code)->first()`.
    - If code doesn't exist: adds to report as **Failed** (Reason: "Voucher/Coupon code not found in database").
    - If code exists and `is_applied` is true: adds to report as **Failed** (Reason: "Already used/applied by a student").
    - If code exists and is already issued:
      - If `corporate_id` matches selected institute: adds to report as **Failed** (Reason: "Already alloted to this institute").
      - Otherwise: adds to report as **Failed** (Reason: "Already alloted to another institute: [Institute Name]").
    - If code exists, is not applied, and is not issued:
      - Updates `corporate_id` to selected institute ID and sets `is_issued = 1`.
      - Adds to report as **Success** (Reason: "Alloted successfully").
- Returns a list of results (`$report`) to display below the form.

#### [NEW] [allot-coupon.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/administrator/dashboard/allot-coupon.blade.php)
Create a blade file for the component with:
- Dropdown select for Institute (showing `institute_name` or `name`).
- Textarea for pasting codes.
- "Allot Coupons" submit button.
- A summary card (showing Total Inputted, Alloted, and Failed counts).
- A detailed results table displaying:
  - Coupon Code
  - Status (Success/Failure with green/red badges)
  - Details / Reason (e.g. "Alloted successfully", "Already used/applied", etc.)

---

### 2. [MODIFY] Admin Routes

#### [MODIFY] [admin.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/routes/admin.php)
Add the route under the `coupon` prefix group:
```php
Route::any('/allotCoupon', AllotCoupon::class)->name('coupon.allotCoupon');
```

---

### 3. [MODIFY] Sidebar Navigation

#### [MODIFY] [sidebar.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/layouts/sidebar.blade.php)
Add "Allot Coupon" link inside the Discount Voucher dropdown menu and update the active menu detection.

#### [MODIFY] [sidebar.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/sidebar.blade.php)
Add "Allot Coupon" link inside the Discount Voucher dropdown menu.

---

## Verification Plan

### Manual Verification
1. Navigate to the admin dashboard.
2. Under "Discount Voucher", click "Allot Coupon".
3. Select an institute from the dropdown.
4. Paste a mix of coupon codes in the textarea:
   - One code that is generated and unused.
   - One code that is already used.
   - One code that is already issued to another institute.
   - One code that does not exist at all.
5. Click "Allot Coupons" and verify the report matches the expected outcomes and statuses.
6. Verify database records are updated correctly for the successfully alloted coupon.
