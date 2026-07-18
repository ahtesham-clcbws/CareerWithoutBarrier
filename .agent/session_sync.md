## Decisions & "Why" (Last updated: 2026-07-18)
- **Direct Coupon Allotment Page**: Added a page to directly allot already generated coupon codes to a selected institute from a dropdown. It parses the coupon list from a textarea, normalizes user inputs (removes spaces/dashes, converts to uppercase, formats with hyphens), transactionally processes allotment to avoid half-complete states, and generates a structured success/failure report.
- **Vulnerability Safeguard**: Implemented validation to ensure only unallocated (`is_issued = 0`) and unused (`is_applied = 0`) coupon codes can be allotted to the selected institute, preventing double allotment and regression.

## Handoff Summary (2026-07-18)
- **Livewire Component**: Created [AllotCoupon.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Livewire/Administrator/Dashboard/AllotCoupon.php) for processing inputs, handling validation, checking duplicates, and compiling allotment reports.
- **Blade View**: Created [allot-coupon.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/administrator/dashboard/allot-coupon.blade.php) containing forms, input fields, statistics, and processing details.
- **Routes**: Registered `coupon.allotCoupon` route in [admin.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/routes/admin.php).
- **Navigation**: Linked the allotment page in layouts sidebars: [sidebar.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/layouts/sidebar.blade.php) & [sidebar.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/sidebar.blade.php).
- **Verification**: Verified PHP syntax of the updated files successfully.

## Unresolved Questions
- None.
