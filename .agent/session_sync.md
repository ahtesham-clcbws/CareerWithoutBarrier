## Decisions & "Why" (Last updated: 2026-06-22)
- **Coupon Code Format Refactoring**: Updated coupon code generation to produce clean, formatted, uppercase alphanumeric strings without prefix prefixing (e.g., `D5FH-Y676-GHT7` instead of `$prefix . $randomString . $randomNumber`). The prefix is still stored in the database's `prefix` field to support grouping and filtering.
- **Batch Duplicacy Verification**: Used a single-query batch check (`whereIn`) to look up generated coupons against the database and regenerate duplicates in-memory, avoiding slow N-query loops.
- **Admin Length Selector**: Added an option to allow administrators to choose between 12-character and 16-character coupons, defaulting to the highly memorable 12-character format.
- **Database Unique Constraint**: Created a migration adding a unique constraint to `couponcode` in the `coupon_codes` table to ensure database-level data integrity.
- **Simple side-by-side PDF listing**: Built a clean, simple, two-column layout table for exporting coupons to PDF. This allows admins to print active and unused codes in a landscape/portrait optimized structure with zero layout clutter.
- **PDF Export Limit Protection & Filter Sync**: Synchronized the PDF export route to respect all frontend filters (status/applied, issued, search). Implemented 500-result batch partitioning: when results are larger than 500, a select dropdown lets the administrator choose a batch of 500 to print, preventing PHP memory exhaustion and timeouts.
- **Row-by-Row PDF Side-by-Side Fix**: Refactored the PDF table to render left and right columns row-by-row inside a single table block. This ensures DomPDF page breaks on table rows beautifully, solving the empty left columns or blocks being pushed down.
- **Fixed Batch Selection Reset**: Modified the Livewire lifecycle hook `updated` to ignore `selectedBatch` property updates when resetting. This keeps the user's selected batch choice active on selection.
- **Excel Export Implementation**: Added a new Excel export feature using `Maatwebsite\Excel` to download coupons list with applied filters, search queries, and batch selection.
- **Excel Bulk Import (Restore)**: Implemented Excel bulk import to restore coupon codes from exported sheets. This includes looking up corporate references and checking for duplicate codes in the database to prevent regression.
- **Email-Gated Delete All Action**: Created a "Delete All Coupons" button in the Livewire dashboard that is only rendered and executable for the authenticated user with email address `ahtesham2000@ymail.com`.
- **SMS Template Update**: Integrated the new TRAI-approved template design using `##var##` and the updated MSG91 template ID.

## Handoff Summary (2026-06-22)
- **Export & Import Classes**: Created [CouponsExport.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Exports/CouponsExport.php) and [CouponsImport.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Imports/CouponsImport.php).
- **Controller**: Added `exportCoupons` and `importCoupons` endpoints to [CouponCodeController.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Http/Controllers/CouponCodeController.php).
- **Routes**: Registered import/export endpoints in [admin.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/routes/admin.php).
- **Admin Interface**: Added Excel Import Form and Export Excel button in [coupon-list.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/administrator/dashboard/coupon-list.blade.php).
- **Livewire Component**: Implemented `deleteAll` gated by the authorized email in [CouponList.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Livewire/Administrator/Dashboard/CouponList.php).
- **SMS Services**: Configured new template variables in [Msg91Service.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Services/Msg91Service.php) and [.env](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/.env).
- **Verification**: Verified syntax correctness of modified files.

## Unresolved Questions
- None.
