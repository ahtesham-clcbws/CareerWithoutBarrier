# Walkthrough - Direct Coupon Allotment Page

I have implemented the direct coupon allotment page to allow administrators to allot existing coupon codes directly to an institute/corporate with a detailed processing report.

## Changes Made

### 1. New Livewire Component & View
- Created [AllotCoupon.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/app/Livewire/Administrator/Dashboard/AllotCoupon.php): Contains the backend logic to parse coupon input, validate if codes exist, check their status (if already applied or issued to another institute), perform transactional database update, and compile a detailed report.
- Created [allot-coupon.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/administrator/dashboard/allot-coupon.blade.php): Modern form UI containing an institute selector dropdown, a textarea input, and an allotment summary + detailed report table with colored indicator badges.

### 2. Registered Route
- Added route in [admin.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/routes/admin.php) under prefix `coupon` named `coupon.allotCoupon`.

### 3. Sidebar Navigation Links
- Added "Allot Coupon" sidebar link in both main layouts sidebar ([sidebar.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/layouts/sidebar.blade.php)) and dashboard sidebar ([sidebar.blade.php](file:///mnt/WebliesNew/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/sidebar.blade.php)).

## Verification

### Automated Syntax Check
Ran a PHP syntax check on the newly created and modified files, confirming they are error-free:
```bash
php -l app/Livewire/Administrator/Dashboard/AllotCoupon.php
php -l routes/admin.php
```
Both files compiled successfully.
