  
<?php $__env->startSection('content'); ?>





<?php

$appCode = $student->studentCode->last();

$studentPayment = $student->studentPayment->last();

?>

<section class="content admin-1 mt-3">
   <div class="row corporate-cards" style="width: 50%;text-align: center;margin-left: 20%;padding-top:5%;margin-right: auto;">
      <div class="col-md-12 col-12">
         <div class="card">
            <div class="card-header" style="background-color:#18c968 ; color: white;text-align:left;height:70px">
               <div>
                  <h5 style="color: #000;">Your application has been submitted successfully , <br>&nbsp;  your Application no is: <b> <?php echo e($appCode?->application_code); ?></b></h5>
               </div>

               <!-- <div style="display:flex; ">
                              <button type="button" style="display:flex; float:right;" class="btn btn-success" onclick="printTable()"><i class="fa fa-print"></i></button>
                           </div> -->
            </div>
            <br>
            <div class="card-body">
               <div class="col-md-12">
                  <div class="table-responsive">
                     <table class="table table-bordered table-hover" id="studentTable">
                        <tbody>
                           <tr>
                              <td colspan="2"><b>name</b></td>
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
                              <td colspan="2"><b>Roll No</b></td>
                              <td class="information-txt" colspan="2"><?php echo e($appCode?->roll_no ?? '-'); ?></td>
                           </tr>
                           <tr>
                              <td colspan="2"><b>Institude</b></td>
                              <td class="information-txt" colspan="2">----</td>
                           </tr>
                           <tr>
                              <td colspan="2"><b>Subscription Code</b></td>
                              <td class="information-txt" colspan="2">----</td>
                           </tr>
             
                           <tr>
                              <td colspan="2"><b>Fee Amount</b></td>
                              <td class="information-txt" colspan="2">750 &#8377;</td>
                           </tr>
                           <tr>
                              <td colspan="2"><b>Applied Coupon</b></td>
                              <td class="information-txt" colspan="2">
                                 <?php echo e($student->disability =='Yes' ? 'Celebrating Diversity : 100% Discount For You, Unlock Your Potential' : (($appCode?->is_coupan_code_applied) ? $appCode?->coupan_value : 'No')); ?> 
                                 <?php if($appCode?->is_coupan_code_applied): ?> &#8377; <?php endif; ?>
                              </td>

                           </tr>
                           <?php if(($appCode?->is_coupan_code_applied && !$appCode?->is_paid)): ?>
                           <tr>
                              <td colspan="2"><b>Payable Amount</b></td>
                              <td class="information-txt" colspan="2">
                                 <?php echo e($appCode?->coupan_value); ?>

                              </td>
                           </tr>
                           <?php endif; ?>
                           <?php if($appCode?->is_paid && $studentPayment?->payment_amount): ?>
                           <tr>
                              <td colspan="2"><b>Paid Amount</b></td>
                              <td class="information-txt" colspan="2">
                                 <?php echo $studentPayment?->payment_amount .' &#8377;' ?? 0; ?>

                              </td>
                           </tr>
                           <?php endif; ?>
                           <?php if(!$studentPayment && !$appCode->is_paid): ?>
                           <tr>
                              <td class="text-center" colspan="4">
                                 <button type="button" class="bg-success btn-lg  btn text-white action-button" data-toggle="modal" data-target="#exampleModalCenter"><b>Pay Now</b></button>
                              </td>
                           </tr>
                           <?php endif; ?>
                           <?php if($studentPayment && $studentPayment->payment_status == 'success' ): ?>
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
                           <?php endif; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <form id="couponForm" action="<?php echo e(route('student.paymentCreate')); ?>" method="get">
         <?php echo csrf_field(); ?>
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Coupan Code: <?php echo ($appCode?->is_coupan_code_applied ? ' Applied Coupon(&#8377;) :&nbsp; '.$appCode->coupan_value : ''); ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="text-center">
                     <label id="fee_amount" name="fee_amount" class="text-sucsess" readonly>Fee Amount (&#8377;) : <?php echo e($student->disability =='Yes' ? 0 : ($appCode?->is_coupan_code_applied ? $appCode->fee_amount : 750)); ?></label><br>
                  </div>
                  <div class="modalLoader" id="reply-loader" style="display: none;">
                     <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                           <span class="visually-hidden">Loading...</span>
                        </div>
                     </div>
                  </div>
                  <?php if( $appCode?->is_coupan_code_applied ? false : true): ?>
                  <label for="coupan_code">Coupan code:<span class="text-danger">*</span></label>
                  <div class="input-group">
                     <input type="text" placeholder="Enter coupon code" class="form-control" name="coupan_code">
                     <div class="input-group-append">
                        <button type="button" id="applyCoupon" class="btn btn-primary bg-success">Apply Coupon</button>
                     </div>
                  </div>
                  <?php endif; ?>
               </div>
               <div class="modal-footer justify-content-center">
                  <?php if($student->disability =='No' && !$appCode->is_paid ): ?>
                  <button type="submit" class="btn btn-primary ">Pay Now</button>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </form>
   </div>
</section>

<script>
   $(document).ready(function() {
      $('#applyCoupon').click(function(event) {
         event.preventDefault();
         $('.modalLoader').show()

         var inputData = $(this).parent().prev().val();

         if(inputData==''){
            error('Please provide Coupon details.');
         $('.modalLoader').toggle()
            return;
         }
         var formData = $('#couponForm').serialize();
console.log(inputData);
         $.ajax({
            type: 'POST',
            url: "<?php echo e(route('students.couponCodeApply')); ?>",
            data: formData,
            success: function(response) {
               $('.modalLoader').hide()
               if (response.status) {
                  $('#applyCoupon').text('Coupon Applied.');
                  $('#applyCoupon').attr('disabled',true);
                  $('#fee_amount').text('Fee Amount: '+response.amount);
                  success('Coupon Code Applied.');
                  if("<?php echo e($student->disability); ?>" =='Yes'){
                     setTimeout(() => {
                        location.reload();
                     }, 1000);
                  }
               }
               if (!response.status) {
                  $('#fee_amount').html("<span class='text-danger'>"+response.message+"</span>");
                  error('Coupon Code Invalid.');
               }
            },
            error: function(xhr, status, error) {
               $('.modalLoader').hide()

               alert(error);
            }
         });
      });
   });
</script>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lkaj6m2w9cvv/public_html/resources/views/student/dashboard/student_payment.blade.php ENDPATH**/ ?>