<div class="content admin-1" style="min-height: 100%;" x-data>
    <style>
        .d-block {
            color: inherit !important
        }

        .half {
            width: 50% !important;
        }
    </style>
    <div class="row corporate-cards"
        style="width: 50%;text-align: center;margin-left: 20%;padding-top:5%;margin-right: auto;">
        <div class="col-md-12 col-12" id="prodiv">
            <div class="card">
                <div class="card-header"
                    style="background-color:#18c968 ; color: white;text-align:center;justify-content:center">
                    <div st>
                        <h6 style="color: #000;">Your Application no is: <b>
                                {{ $student->latestStudentCode?->application_code }}</b></h6>
                    </div>
                </div>
                <br>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table-bordered table-hover table" id="studentTable">
                                <tbody>
                                    <tr>
                                        <td class="half" colspan="2"><b>Name</b></td>
                                        <td class="information-txt half" colspan="2">{{ $student->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="half" colspan="2"><b>Mobile</b></td>
                                        <td class="information-txt half" colspan="2">{{ $student->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td class="half" colspan="2"><b>Email</b></td>
                                        <td class="information-txt half" colspan="2">{{ $student->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="half" colspan="2"><b>Referral Code Issued By</b></td>
                                        <td class="information-txt half" colspan="2">
                                            {{ $student->latestStudentCode?->corporate?->institute_name ? $student->latestStudentCode?->corporate?->institute_name : 'SQS Foundation, Kanpur' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="half" colspan="2"><b>Referral Subscription Code</b></td>
                                        <td class="information-txt half" colspan="2">
                                            {{ $student->latestStudentCode?->coupan_code ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <td class="half" colspan="2"><b>Fee Amount</b></td>
                                        <td class="information-txt half" colspan="2">750 &#8377;</td>
                                    </tr>

                                    @if ($student->latestStudentCode?->is_coupan_code_applied)
                                        @if ($calculateDiscountPercentage < 60)
                                            <tr>
                                                <td class="half" colspan="2"><b>Discount Amount</b></td>
                                                <td class="information-txt half" colspan="2">
                                                    {{ $student->latestStudentCode?->is_coupan_code_applied ? $student->latestStudentCode?->coupan_value : 'No' }}
                                                    @if ($student->latestStudentCode?->is_coupan_code_applied)
                                                        &#8377;
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endif

                                    @if (
                                        $student->latestStudentCode?->is_coupan_code_applied &&
                                            !$student->latestStudentCode?->is_paid &&
                                            $student->latestStudentCode?->fee_amount > 0)
                                        <tr>
                                            <td class="half" colspan="2"><b>
                                                    {{ $calculateDiscountPercentage < 60 ? 'Final Payable Amount' : 'Final online Paid Amount' }}
                                                </b></td>
                                            <td class="information-txt half" colspan="2">
                                                {{ $student->latestStudentCode?->fee_amount }} &#8377;
                                            </td>
                                        </tr>
                                    @elseif($student->latestStudentCode?->is_coupan_code_applied && $student->latestStudentCode?->fee_amount <= 0)
                                        <tr>
                                            <td class="half" colspan="2"><b>
                                                    {{ $calculateDiscountPercentage < 60 ? 'Final Payable Amount' : 'Final online Paid Amount' }}
                                                </b></td>
                                            <td class="information-txt half" colspan="2">
                                                0 &#8377;
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($student->latestStudentCode?->is_paid && $studentPayment?->payment_amount)
                                        <tr>
                                            <td class="half" colspan="2"><b>
                                                    {{ $calculateDiscountPercentage < 60 ? 'Final Payable Amount' : 'Final online Paid Amount' }}
                                                </b></td>
                                            <td class="information-txt half" colspan="2">
                                                {!! $studentPayment?->payment_amount . ' &#8377;' ?? 0 !!}
                                            </td>
                                        </tr>
                                    @endif
                                    @if (
                                        !$studentPayment &&
                                            !$student->latestStudentCode?->is_paid &&
                                            ($student->latestStudentCode?->is_coupan_code_applied ? $student->latestStudentCode?->fee_amount > 0 : true))
                                        <tr>
                                            <td class="text-center" colspan="4">
                                                <button class="bg-success btn-lg btn action-button text-white"
                                                    id="exampleModalCenterButton" type="button"
                                                    wire:click="$toggle('modalOpened')"><b>Pay Now</b></button>
                                            </td>
                                        </tr>
                                    @else
                                        <tr class="dn">
                                            <td colspan="4">

                                                @if ($student->latestStudentCode?->is_coupan_code_applied)
                                                    <div style="display:block;text-align:center;">
                                                        <h3 style="font-weight:700; font-size:18px;">Discount Voucher
                                                            Provided By: SQS
                                                            Foundation</h3>
                                                    </div>
                                                @endif

                                                <button class="btn btn-md btn-info noprint" data-print="modal"
                                                    type="button" style="width: 5rem;height: 2rem;"
                                                    @click="printDocument()"> Print <i class="fa fa-print"></i></button>
                                            </td>
                                        </tr>
                                    @endif

                                    @if ($studentPayment && $studentPayment->payment_status == 'success')
                                        <tr>

                                            <table class="table-bordered table-hover table" id="studentTable">
                                                <tbody>
                                                    <tr>
                                                        <td class="half" colspan="2"><b>Course Type</b></td>
                                                        <td class="information-txt half" colspan="2">
                                                            {{ $studentPayment->course_type }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="half" colspan="2"><b>Course</b></td>
                                                        <td class="information-txt half" colspan="2">
                                                            {{ $studentPayment->course_id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="half" colspan="2"><b>Institute</b></td>
                                                        <td class="information-txt half" colspan="2">
                                                            {{ $studentPayment->institute?->institute_name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="half" colspan="2"><b>Amount</b></td>
                                                        <td class="information-txt half" colspan="2">
                                                            {{ $studentPayment->payment_amount }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="half" colspan="2"><b>Payment Order ID</b></td>
                                                        <td class="information-txt half" colspan="2">
                                                            {{ $studentPayment->payment_order_id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="half" colspan="2"><b>Payment Status</b></td>
                                                        <td class="information-txt half" colspan="2">
                                                            {{ ucfirst($studentPayment->payment_status) }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade @if ($modalOpened) show d-block @endif" id="exampleModalCenter" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true" tabindex="-1">
        <form id="couponForm" action="{{ route('student.paymentCreate') }}" method="get">
            @csrf
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div
                            style="{{ $student->latestStudentCode?->is_coupan_code_applied ? 'margin-left: 16%;' : '' }}">
                            <h6 class="modal-title" id="exampleModalLongTitle">
                                @if ($student->latestStudentCode?->is_coupan_code_applied)
                                    Refferel Coupon is Applied Successfully
                                @else
                                    Apply Coupon Code:
                                @endif
                            </h6>
                        </div>
                        <button class="close" type="button" wire:click="$toggle('modalOpened')">
                            <span aria-hidden="true"style="color:black;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="fee_amount-dv text-center">
                            <p class="text-sucsess font-weight:20px;" id="fee_amount"
                                style="margin-left: -45px;margin-bottom:0rem;" readonly>Fee Amount (Rs.) : 750</p>
                            @if ($student->latestStudentCode?->is_coupan_code_applied)
                                <p class="text-danger fee_discount_amount"
                                    style="margin-left: -20px; margin-bottom:0rem;">Discount Amount (Rs.):
                                    -{{ $student->latestStudentCode?->coupan_value }}</p>

                                <p id="payable_amount" style="font-weight:700; ">Final Payable Amount (Rs.):
                                    {{ $student->latestStudentCode?->fee_amount }} </p>
                            @endif

                        </div>
                        <div class="modalLoader" id="reply-loader" wire:loading>
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>

                        <label for="coupan_code">Coupan code: </label>

                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter coupon code"
                                wire:model="coupan_code" {{ $coupan_code ? 'readonly' : '' }}>
                            <div class="input-group-append">
                                <button type="button" id="applyCoupon" wire:click="applyCoupon"
                                    class="btn btn-primary bg-success"
                                    style="display:{{ $student->latestStudentCode?->is_coupan_code_applied ? 'none' : 'block' }};"">Apply
                                    Coupon</button>
                                <button class="btn btn-primary text-danger" id="removeCoupon" type="button"
                                    style="background: #fd0000;color: white !important;border: #f91818;{{ $student->latestStudentCode?->is_coupan_code_applied ? 'display:block' : 'display:none' }}"
                                    wire:click="removeCoupon">Remove Coupon</button>
                            </div>
                        </div>

                        @error('coupan_code')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror

                    </div>
                    <div class="modal-footer justify-content-center" id="pay-now-btn-modal"
                        style="display:block;text-align:center;">
                        @if ($student->latestStudentCode?->is_coupan_code_applied)
                            <div style="display:block;text-align:center;">
                                <h6 style="font-weight:700;">Discount Voucher Provided By: SQS Foundation</h6>
                                {!! $student->latestStudentCode?->corporate?->institute_name
                                    ? '<p>Voucher issued By: ' . $student->latestStudentCode?->corporate?->institute_name . '</p>'
                                    : '' !!}
                            </div>
                        @endif
                        @if (
                            !$student->latestStudentCode?->is_paid &&
                                ($student->latestStudentCode?->is_coupan_code_applied ? $student->latestStudentCode?->fee_amount > 0 : true))
                            <button class="btn btn-primary" type="submit">Pay Now</button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal-backdrop fade @if ($modalOpened) show @else d-none @endif"></div>

    <!-- Alpine.js Script -->
    <script>
        function printDocument() {
            let printContent = document.getElementById('prodiv').innerHTML;
            let popupWin = window.open('', '_blank', 'width=1100,height=600');

            popupWin.document.open();
            popupWin.document.write(`
                <html>
                <head>
                    <title>Payment Receipts</title>
                    <style>
                        body { font-family: Arial; }
                        .noprint { display: none; }
                        .table { width: 100%; border-collapse: collapse; }
                        h1 { font-size: 15pt; }
                        .table th, .table td { border: 1px solid #000; padding: 5px; font-size: 10pt; }
                        .photo { text-align: center; }
                        .photo img { width: 115px; }
                        .half { width: 50% !important; }
                    </style>
                </head>
                <body onload="window.print()">
                    ${printContent}
                </body>
                </html>
            `);
            popupWin.document.close();
        }
    </script>
</div>
@script
    <script>
        $wire.on('coupon-applied', () => {
            setTimeout(() => {
                $wire.dispatch('close-modal');
            }, 1000);
        });
    </script>
@endscript
