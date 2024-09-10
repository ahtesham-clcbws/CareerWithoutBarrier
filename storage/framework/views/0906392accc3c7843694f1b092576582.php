
<?php $__env->startSection('content'); ?>

<div class="container pagecontentbody mt-5 pt-5">
   <div class="tab-content">
      <div class="container">
         <div class="pagebody removebg-color">
            <div class="row justify-content-center">
               <div class="col-md-12">
                  <div class="card">
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-bordred table-hover bg-white">
                              <thead>
                                 <tr>
                                    <th class="selectAllCl text-center">Issued AdmitCard <br> <input type="checkbox" id="selectAll"> </th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Fee Amount</th>
                                    <th>Discount Amount</th>
                                    <th>Voucher name</th>
                                    <th>Voucher Code</th>
                                    <th>Scholarship category</th>
                                    <th>Scholarship opted for</th>
                                    <th>DOB</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                    <?php

                                    $studCode = $student->studentCode->first();
                                    if ($studCode && !$studCode->is_coupan_code_applied) {
                                       $studCode = null;
                                    }
                                    ?>
                                    <td scope="row" class="text-center">
                                       <input type="checkbox" class="rowCheckbox" data-studcode_id="<?php echo e($studCode->id); ?>" value="" <?php echo e($studCode?->issued_admitcard ? 'checked' : ''); ?>>
                                    </td>
                                    <td><?php echo e($student->name); ?></td>
                                    <td><?php echo e(maskMobile($student->mobile)); ?></td>
                                    <td><?php echo e(maskEmail($student->email)); ?></td>
                                    <td><?php echo e('Rs.' .$studCode?->fee_amount); ?></td>
                                    <td><?php echo e('Rs.'. $studCode?->coupan_value); ?></td>
                                    <td><?php echo e($studCode?->voucher?->name); ?></td>
                                    <td><?php echo e($studCode?->voucher?->couponcode); ?></td>
                                    <td> <?php echo e($student->scholarShipCategory?->name ?? 'N/A'); ?></td>
                                    <td> <?php echo e($student->scholarShipOptedFor?->name ?? 'N/A'); ?></td>
                                    <td><?php echo e($student->dob ?? '-'); ?></td>
                                    <td>
                                       <?php if($studCode?->issued_admitcard): ?>
                                       <a href="#" class="btn btn-danger changeStatus" data-studcode_id="<?php echo e($studCode->id); ?>" data-status="0">Stop AdmitCard</a>
                                       <?php elseif(!$studCode?->issued_admitcard): ?>
                                       <a href="#" class="btn btn-success changeStatus" data-studcode_id="<?php echo e($studCode->id); ?>" data-status="1">Issue AdmitCard</a>
                                       <?php endif; ?>
                                    </td>

                                 </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   new DataTable('table', {
      responsive: true,
      "columnDefs": [{
         "orderable": false,
         "targets": 0
      }]
   });
</script>

<script>
   $(document).ready(function() {
      $('#selectAll').click(function() {
         $('.rowCheckbox').prop('checked', this.checked);
      });

      $('.rowCheckbox').change(function() {
         if ($('.rowCheckbox:checked').length == $('.rowCheckbox').length) {
            $('#selectAll').prop('checked', true);
         } else {
            $('#selectAll').prop('checked', false);
         }
         updateAdmitCardStatus([$(this).data('studcode_id')], $(this).is(':checked') ? 1 : 0);
      });

      $('.changeStatus').click(function(e) {
         e.preventDefault();
         var studcodeId = $(this).data('studcode_id');
         var status = $(this).data('status');
         updateAdmitCardStatus([studcodeId], status);
      });

      $('.updateAdmitCardStatusAll').click(function(e) {
         e.preventDefault();
         var studcodeIds = [];
         $('.rowCheckbox:checked').each(function() {
            studcodeIds.push($(this).data('studcode_id'));
         });
         if (studcodeIds.length === 0) {
            error('Please select at least one student.');
            return;
         }
         updateAdmitCardStatus(studcodeIds, 1);
      });

      $('.StopAdmitCardStatusAll').click(function(e) {
         e.preventDefault();
         var studcodeIds = [];
         $('.rowCheckbox:checked').each(function() {
            studcodeIds.push($(this).data('studcode_id'));
         });
         if (studcodeIds.length === 0) {
            error('Please select at least one student.');
            return;
         }
         updateAdmitCardStatus(studcodeIds, 0);
      });

      function updateAdmitCardStatus(studcodeIds, status) {
         $.ajax({
            url: '<?php echo e(route("corporate.update.admitcard.status")); ?>',
            method: 'POST',
            data: {
               _token: '<?php echo e(csrf_token()); ?>',
               studcode_ids: studcodeIds,
               status: status
            },
            success: function(response) {
               if (response.status) {
                  success(response.message);
                  location.reload();
               }
            }
         });
      }
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('corporate.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/corporate/dashboard/student/list.blade.php ENDPATH**/ ?>