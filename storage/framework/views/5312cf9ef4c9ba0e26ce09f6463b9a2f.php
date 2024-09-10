<?php $__env->startSection('content'); ?>

<div class="container pagecontentbody pt-5">
   <div class="card">
      <div class="card-header">
         <h5>Download Admit Card:</h5>
      </div>
      <form action="<?php echo e(route('students.admitCard')); ?>" method="post">
         <?php echo csrf_field(); ?>
         <div class="card-body">
            <div class="card-text">
            <div class="form-row">
                  <div class="col">
                     <label for="app_code">Application Number</label>
                     <input type="text" name="app_code" class="form-control" placeholder="Enter Application Number" value="<?php echo e($studCode?->application_code); ?>">
                  </div>
                  <div class="col">
                     <label for="class">Select Class</label>
                     <select class="form-control" id="select-class" name="class">
                        <option value="">--Select Class--</option>
                        <option value="<?php echo e($qualification->id); ?>" <?php echo e(request()->class == $qualification->id ? 'selected' : ''); ?>><?php echo e($qualification->name); ?></option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-footer">
            <div class="text-center">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </div>
      </form>
   </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/student/dashboard/admitCardSearch.blade.php ENDPATH**/ ?>