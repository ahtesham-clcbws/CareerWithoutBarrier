<div class="content admin-1" style="min-height: 100%;" x-data>
    <style>
        .d-block {
            color: inherit !important
        }
    </style>
    <div class="row corporate-cards" style="width: 50%;text-align: center;margin-left: 20%;padding-top:5%;margin-right: auto;">
        <div class="col-md-12 col-12" id="prodiv">
            <div class="card">
                <div class="card-header" style="background-color:#18c968 ; color: white;text-align:center;justify-content:center">
                    <div st>
                        <h6 style="color: #000;">Your Application no is: <b> <?php echo e($student->latestStudentCode?->application_code); ?></b></h6>
                    </div>
                </div>
                <br>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="studentTable">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><b>Name</b></td>
                                        <td class="information-txt" colspan="2"><?php echo e($student->name); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Mobile</b></td>
                                        <td class="information-txt" colspan="2"><?php echo e($student->mobile); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Email</b></td>
                                        <td class="information-txt" colspan="2"><?php echo e($student->email); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Referral Code Issued By</b></td>
                                        <td class="information-txt" colspan="2"><?php echo e($student->latestStudentCode?->corporate?->institute_name ? $student->latestStudentCode?->corporate?->institute_name : 'SQS Foundation, Kanpur'); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Referral Subscription Code</b></td>
                                        <td class="information-txt" colspan="2"><?php echo e($student->latestStudentCode?->coupan_code ?? '-'); ?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"><b>Fee Amount</b></td>
                                        <td class="information-txt" colspan="2">750 &#8377;</td>
                                    </tr>

                                    <!--[if BLOCK]><![endif]--><?php if($student->latestStudentCode?->is_coupan_code_applied): ?>
                                    <!--[if BLOCK]><![endif]--><?php if($calculateDiscountPercentage < 60): ?>
                                        <tr>
                                        <td colspan="2"><b>Discount Amount</b></td>
                                        <td class="information-txt" colspan="2">
                                            <?php echo e($student->latestStudentCode?->is_coupan_code_applied ? $student->latestStudentCode?->coupan_value : 'No'); ?>

                                            <!--[if BLOCK]><![endif]--><?php if($student->latestStudentCode?->is_coupan_code_applied): ?> &#8377; <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </td>
                                        </tr>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                        <!--[if BLOCK]><![endif]--><?php if(($student->latestStudentCode?->is_coupan_code_applied && !$student->latestStudentCode?->is_paid && ($student->latestStudentCode?->fee_amount > 0))): ?>
                                        <tr>
                                            <td colspan="2"><b>
                                                    <?php echo e($calculateDiscountPercentage < 60 ? 'Final Payable Amount':'Final online Paid Amount'); ?>

                                                </b></td>
                                            <td class="information-txt" colspan="2">
                                                <?php echo e($student->latestStudentCode?->fee_amount); ?> &#8377;
                                            </td>
                                        </tr>
                                        <?php elseif($student->latestStudentCode?->is_coupan_code_applied && $student->latestStudentCode?->fee_amount <= 0): ?>
                                            <tr>
                                            <td colspan="2"><b>
                                                    <?php echo e($calculateDiscountPercentage < 60 ? 'Final Payable Amount':'Final online Paid Amount'); ?>

                                                </b></td>
                                            <td class="information-txt" colspan="2">
                                                0 &#8377;
                                            </td>
                                            </tr>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            <!--[if BLOCK]><![endif]--><?php if( $student->latestStudentCode?->is_paid && $studentPayment?->payment_amount): ?>
                                            <tr>
                                                <td colspan="2"><b>
                                                        <?php echo e($calculateDiscountPercentage < 60 ? 'Final Payable Amount':'Final online Paid Amount'); ?>

                                                    </b></td>
                                                <td class="information-txt" colspan="2">
                                                    <?php echo $studentPayment?->payment_amount .' &#8377;' ?? 0; ?>

                                                </td>
                                            </tr>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            <!--[if BLOCK]><![endif]--><?php if(!$studentPayment && !$student->latestStudentCode?->is_paid && ($student->latestStudentCode?->is_coupan_code_applied ? ($student->latestStudentCode?->fee_amount > 0) : true) ): ?>
                                            <tr>
                                                <td class="text-center" colspan="4">
                                                    <button type="button" id="exampleModalCenterButton" class="bg-success btn-lg  btn text-white action-button" wire:click="$toggle('modalOpened')"><b>Pay Now</b></button>
                                                </td>
                                            </tr>
                                            <?php else: ?>

                                            <tr class="dn">
                                                <td colspan="4">

                                                    <!--[if BLOCK]><![endif]--><?php if($student->latestStudentCode?->is_coupan_code_applied): ?>
                                                        <div style="display:block;text-align:center;">
                                                            <h6 style="font-weight:700;">Discount Voucher Provided By: SQS Foundation</h6>
                                                        </div>
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                                    <button type="button" style="width: 5rem;height: 2rem;" class="btn btn-md btn-info" data-print="modal" @click="printDocument()"> Print <i class="fa fa-print"></i></button>
                                                </td>
                                            </tr>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                            <!--[if BLOCK]><![endif]--><?php if($studentPayment && $studentPayment->payment_status == 'success' ): ?>
                                            <tr>
                                                <table class="table table-response">
                                                    <thead>
                                                        <tr>
                                                            <th>Course Type</th>
                                                            <th>Course</th>
                                                            <th>Institute</th>
                                                            <th>Amount</th>
                                                            <th>Payment Order ID </th>
                                                            <th>Payment Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo e($studentPayment->course_type); ?></td>
                                                            <td><?php echo e($studentPayment->course_id); ?></td>
                                                            <td><?php echo e($studentPayment->institute_id); ?></td>
                                                            <td><?php echo e($studentPayment->payment_amount); ?></td>
                                                            <td><?php echo e($studentPayment->payment_order_id); ?></td>
                                                            <td><?php echo e(ucfirst($studentPayment->payment_status)); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </tr>
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade <?php if($modalOpened): ?> show d-block <?php endif; ?>" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form id="couponForm" action="<?php echo e(route('student.paymentCreate')); ?>" method="get">
            <?php echo csrf_field(); ?>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div style="<?php echo e($student->latestStudentCode?->is_coupan_code_applied ? 'margin-left: 16%;':''); ?>">
                            <h6 class="modal-title" id="exampleModalLongTitle"> <!--[if BLOCK]><![endif]--><?php if($student->latestStudentCode?->is_coupan_code_applied): ?> Refferel Coupon is Applied Successfully <?php else: ?> Apply Coupon Code: <?php endif; ?><!--[if ENDBLOCK]><![endif]--></h6>
                        </div>
                        <button type="button" class="close" wire:click="$toggle('modalOpened')">
                            <span aria-hidden="true"style="color:black;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center fee_amount-dv">
                            <p id="fee_amount" class="text-sucsess font-weight:20px;" style="margin-left: -45px;margin-bottom:0rem;" readonly>Fee Amount (Rs.) : 750</p>
                            <!--[if BLOCK]><![endif]--><?php if($student->latestStudentCode?->is_coupan_code_applied): ?>
                            <p class="text-danger fee_discount_amount" style="margin-left: -20px; margin-bottom:0rem;">Discount Amount (Rs.): -<?php echo e($student->latestStudentCode?->coupan_value); ?></p>

                            <p id="payable_amount" style="font-weight:700; ">Final Payable Amount (Rs.): <?php echo e($student->latestStudentCode?->fee_amount); ?> </p>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

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
                            <input type="text" placeholder="Enter coupon code" class="form-control" wire:model="coupan_code"  <?php echo e($coupan_code ? "readonly"  : ""); ?>>
                            <div class="input-group-append">
                                <button type="button" id="applyCoupon" wire:click="applyCoupon" class="btn btn-primary bg-success" style="display:<?php echo e($student->latestStudentCode?->is_coupan_code_applied ? 'none' : 'block'); ?>;"">Apply Coupon</button>
                                <button type="button" id="removeCoupon" wire:click="removeCoupon" class="btn btn-primary text-danger" style="background: #fd0000;color: white !important;border: #f91818;<?php echo e($student->latestStudentCode?->is_coupan_code_applied ? 'display:block' : 'display:none'); ?>">Remove Coupon</button>
                            </div>
                        </div>

                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['coupan_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"> <?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                    </div>
                    <div class="modal-footer justify-content-center" id="pay-now-btn-modal" style="display:block;text-align:center;">
                        <!--[if BLOCK]><![endif]--><?php if($student->latestStudentCode?->is_coupan_code_applied): ?>
                            <div style="display:block;text-align:center;">
                                <h6 style="font-weight:700;">Discount Voucher Provided By: SQS Foundation</h6>
                                <?php echo $student->latestStudentCode?->corporate?->institute_name ? '<p>Voucher issued By: '.$student->latestStudentCode?->corporate?->institute_name.'</p>' : ''; ?>

                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        
                        <!--[if BLOCK]><![endif]--><?php if(!$student->latestStudentCode?->is_paid && ($student->latestStudentCode?->is_coupan_code_applied ? ($student->latestStudentCode?->fee_amount) > 0 : true)): ?>
                        <button type="submit" class="btn btn-primary">Pay Now</button>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal-backdrop fade <?php if($modalOpened): ?> show <?php else: ?> d-none <?php endif; ?>"></div>

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
    <?php
        $__scriptKey = '3094064526-0';
        ob_start();
    ?>
<script>
    $wire.on('coupon-applied', () => {
        setTimeout(() => {
            $wire.dispatch('close-modal');
        }, 1000);
    });
</script>
    <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>
<?php /**PATH /run/media/ahtesham/Weblies/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/student/payment-page.blade.php ENDPATH**/ ?>