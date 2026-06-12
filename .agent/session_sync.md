## Decisions & "Why" (Last updated: 2026-06-12)
- **Coupon Code Format Refactoring**: Updated coupon code generation to produce clean, formatted, uppercase alphanumeric strings without prefix prefixing (e.g., `D5FH-Y676-GHT7` instead of `$prefix . $randomString . $randomNumber`). The prefix is still stored in the database's `prefix` field to support grouping and filtering.
- **Batch Duplicacy Verification**: Used a single-query batch check (`whereIn`) to look up generated coupons against the database and regenerate duplicates in-memory, avoiding slow N-query loops.
- **Admin Length Selector**: Added an option to allow administrators to choose between 12-character and 16-character coupons, defaulting to the highly memorable 12-character format.
- **Database Unique Constraint**: Created a migration adding a unique constraint to `couponcode` in the `coupon_codes` table to ensure database-level data integrity.
- **Simple side-by-side PDF listing**: Built a clean, simple, two-column layout table for exporting coupons to PDF. This allows admins to print active and unused codes in a landscape/portrait optimized structure with zero layout clutter.
- **PDF Export Limit Protection & Filter Sync**: Synchronized the PDF export route to respect all frontend filters (status/applied, issued, search). Implemented 500-result batch partitioning: when results are larger than 500, a select dropdown lets the administrator choose a batch of 500 to print, preventing PHP memory exhaustion and timeouts.
- **Row-by-Row PDF Side-by-Side Fix**: Refactored the PDF table to render left and right columns row-by-row inside a single table block. This ensures DomPDF page breaks on table rows beautifully, solving the empty left columns or blocks being pushed down.
- **Fixed Batch Selection Reset**: Modified the Livewire lifecycle hook `updated` to ignore `selectedBatch` property updates when resetting. This keeps the user's selected batch choice active on selection.

## Handoff Summary (2026-06-12)
- **Livewire Component**: Updated `CreateCoupon.php` with `$coupon_length` property, validated against allowable options, and batch generation logic with database checks. Updated `CouponList.php` to calculate and expose the count of filtered items and the selected batch property. Fixed batch reset loop on update.
- **Admin Interface**: Added the `coupon_length` select dropdown input in `create-coupon.blade.php`. Added the dynamic Batch select dropdown and integrated it with the "Export PDF" button in `coupon-list.blade.php`.
- **Legacy Controller**: Updated `CouponCodeController.php`'s `saveCoupon` method to match the new generation logic, and added the `printCoupons` method.
- **Database Schema**: Created and ran migration `2026_06_12_000334_make_coupon_code_unique_in_coupon_codes_table.php` to add the unique index.
- **PDF Export view**: Implemented the simple two-column `print-coupons.blade.php` view.
- **Verification**: Format checks verified successfully with local execution, validating the uppercase hyphen-separated alphanumeric codes. Checked and confirmed there were no pre-existing duplicates in the database, and verified compilation/rendering of the new PDF export view.

## Unresolved Questions
- None.
