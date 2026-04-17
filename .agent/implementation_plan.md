# Implementation Plan - Convert Create Coupon to Livewire

The objective is to refactor the current "Create Coupon" feature from a traditional Laravel Controller/Blade setup to a Livewire component for better interactivity and consistency with the rest of the administrator dashboard.

## Proposed Changes

### 1. Livewire Component Creation
- [x] Create `App\Livewire\Administrator\Dashboard\CreateCoupon`.
- [x] Define properties for all form fields: `prefix`, `name`, `coupon_type`, `discount_type`, `discount_value`, `number_of_coupons`, `description`.
- [x] Implement a `save` method that:
    - [x] Validates input (including uniqueness of `prefix` and `name`).
    - [x] Generates and inserts coupon codes using the logic from `CouponCodeController`.
    - [x] Redirects to the coupon list with a success message.

### 2. View Refactoring
- [x] Create `resources/views/livewire/administrator/dashboard/create-coupon.blade.php`.
- [x] Port the HTML from `resources/views/administrator/dashboard/geenrate_coupon_code.blade.php`.
- [x] Update form to use Livewire `wire:model` and `wire:submit`.
- [x] Add loading indicators and real-time validation if appropriate.

### 3. Route Update
- [x] Modify `routes/admin.php` to point `/administrator/coupon/createCoupon` to the new Livewire component.

### 4. Cleanup
- [ ] Remove unused methods from `CouponCodeController` if no longer needed.
- [x] Remove the old blade file `geenrate_coupon_code.blade.php`.

## Verification Plan
- Access the "Create Coupon" page.
- Test validation by submitting empty or duplicate values.
- Fill the form and verify that the specified number of coupons are generated with the correct prefix and attributes.
- Ensure redirection and flash messages work.
