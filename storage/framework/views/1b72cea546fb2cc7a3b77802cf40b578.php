 
<?php $__env->startSection('content'); ?> 
<?php echo $__env->make('student.layouts.form_arrow_step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                                 <th>Name</th>
                                 <th>Mobile</th>
                                 <th>Email</th>
                                 <th>DOB</th>
                                 <th>Payment Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td><?php echo e($student->name); ?></td>
                                 <td><?php echo e($student->mobile); ?></td>
                                 <td> <?php echo e($student->email); ?></td>
                                 <td><?php echo e($student->dob ?? '-'); ?></td>
                                 <td>Pending</td>
                                 <td style="padding:0"> <a class="btn btn-info" style="margin:3px" href="<?php echo e(route('studentform')); ?>" title="Edit">&nbsp;<?php echo e($student->form_step > 0 ? 'View' : 'Apply'); ?>&nbsp;</a> &nbsp;&nbsp; </a> </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lkaj6m2w9cvv/public_html/resources/views/student/dashboard/home.blade.php ENDPATH**/ ?>