# Integrate In-Place Razorpay Payment

The user wants the Razorpay payment modal to open directly on the Student Dashboard (Livewire page) instead of redirecting to a separate route. After payment, the page should refresh to reflect the new state.

## Proposed Changes

### [Component Name] Payment View
#### [MODIFY] [payment-page.blade.php](file:///i:/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/student/payment-page.blade.php)
- Include `<script src="https://checkout.razorpay.com/v1/checkout.js"></script>`.
- Add a hidden form to handle the payment response and submit it to the backend.
- Replace the "Pay Now" submit button with a button that triggers a JavaScript `payWithRazorpay()` function.
- Implement `payWithRazorpay()` to open the Razorpay modal with pre-filled student data and the correct fee amount.
- Handle the `handler` callback to submit the hidden form.

### [Component Name] Controller
#### [MODIFY] [Razorpay.php](file:///i:/CareerWithoutBarrier/career-without-barrier/app/Http/Controllers/Razorpay.php)
- No significant changes needed to the `store` method as it already handles the POST request and redirects back to the dashboard, fulfilling the "automatic reload" requirement.

## Verification Plan

### Automated Verification
- Check for the existence of the Razorpay script in the page source.
- Verify the "Pay Now" button attributes.

### Manual Verification
- Log in as a student.
- Click "Review & Pay" then "Pay Now".
- Confirm the Razorpay modal opens without a page redirect.
- Ensure that after entering test credentials and "paying", the page reloads back to the dashboard with a success message.
