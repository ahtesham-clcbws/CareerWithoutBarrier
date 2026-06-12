# Walkthrough - Batch-based Filtered Coupon PDF Export

We resolved the filtering issue by ensuring the print route receives and applies all page filters (including `status` and `issued`), and added a batch dropdown option to safely print large coupon sets in chunks of 500.

## Changes Made

### 1. Correct Filter Mapping
- **Controller Method:** Updated `printCoupons` in [CouponCodeController.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Http/Controllers/CouponCodeController.php) to extract and query all frontend filters:
  - `status` (resolves to Active/Inactive/Applied matching front-end)
  - `issued` (resolves to Issued/Not-Issued matching front-end)
  - `prefix`, `value`, `corporate_id`, `valueType`, and `search`.
- **Bug Fix:** Fixed an existing bug in `CouponList.php` where it previously checked `selectedStatus == 'not-issued'` instead of `selectedIssued == 'not-issued'`.

### 2. Batched Export Logic
- **Dropdown integration:** If the filtered coupon results count exceeds 500, a **Batch** selector dropdown automatically renders next to the Export button (e.g. *Batch 1 (1-500)*, *Batch 2 (501-1,000)*).
- **Controller skip/take:** The `printCoupons` method reads the `batch` parameter and applies offset pagination (`skip(($batch - 1) * 500)->take(500)`) to ensure the PDF generation operates in highly efficient 500-result blocks.
- **Dynamic Notice:** A clear notice banner is rendered at the top of the PDF informing the admin which batch and range they are viewing.
