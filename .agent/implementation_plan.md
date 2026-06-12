# PDF Export with Batched Printing & Correct Filter State

Address the issue where page filters (specifically Status/Applied) were ignored by the print route, and implement a batched printing dropdown to allow exporting large lists in 500-coupon batches.

## User Review Required
> [!IMPORTANT]
> - The PDF print route will now correctly respect **all filters** from the page, including `status` (active, inactive, applied) and `issued` status.
> - When the filtered results exceed 500, the interface will dynamically present a **Batch Select** dropdown next to the Export button (e.g. "Batch 1 (1-500)", "Batch 2 (501-1000)"). Selecting a batch will download that specific chunk, preventing any memory or timeout crashes on large exports.

## Proposed Changes

### Controller

#### [MODIFY] [CouponCodeController.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Http/Controllers/CouponCodeController.php)
- Update the `printCoupons` method to:
  - Read **all** page filters from query parameters: `status`, `issued`, `prefix`, `value`, `corporate_id`, `valueType`, `search`.
  - Apply the status filter exactly like the Livewire component:
    - If status is `active`: `status = 1`, `is_applied = 0`.
    - If status is `inactive`: `status = 0`, `is_applied = 0`.
    - If status is `applied`: `is_applied = 1`.
  - Apply the issued filter:
    - If issued is `issued`: `corporate_id IS NOT NULL`.
    - If issued is `not-issued`: `corporate_id IS NULL`.
  - Read `batch` parameter (e.g. `1`, `2`).
  - If a batch is specified, apply `skip(($batch - 1) * 500)->take(500)`.
  - Split the returned records into left/right side-by-side columns and render the PDF view.

### Livewire Component & View

#### [MODIFY] [CouponList.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Livewire/Administrator/Dashboard/CouponList.php)
- Add a helper method or property to calculate the total number of filtered coupons matching the current filter state (excluding pagination).
- Expose the count and calculate the number of 500-coupon batches available.

#### [MODIFY] [coupon-list.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/administrator/dashboard/coupon-list.blade.php)
- Add a select dropdown for **Select Batch** next to the Export PDF button.
- The dropdown will display options:
  - If total count <= 500: "All (Count)"
  - If total count > 500: "Batch 1 (1-500)", "Batch 2 (501-1,000)", etc.
- Dynamically update the Export PDF link href with the selected batch number.

## Verification Plan

### Manual Verification
- Select the "Applied only" filter on the coupons list (should show around 19 records).
- Click Export PDF and verify that only those 19 applied coupons are printed.
- Clear filters (showing 12,031 records). Verify the Batch dropdown lists ~25 batches. Export Batch 1 and Batch 2, verifying that each exports exactly 500 coupons.
