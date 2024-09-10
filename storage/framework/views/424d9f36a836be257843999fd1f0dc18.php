
<?php $__env->startSection('title'); ?>
Generate Coupon
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <h5>
  <div class="panel-heading py-3">Generate CouponCode:</div>
  </h5>
</div>
<div class="row">
  <div class="col-md-8 col-lg-8 col" style="margin-left: auto;margin-right:auto">
    <div class="panel panel-default m-t-15">
 
      <div class="panel-body">
        <div class="card alert">
          <div class="card-body">
            <form action="<?php echo e(route('coupon.saveCoupon')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="row">


                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Prefix<span class="text-danger">*</span></p>
                    <input type="text" name="prefix" class="form-control input-focus" required placeholder="Add Prefix">
                    <?php $__errorArgs = ['prefix'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Name of Coupon<span class="text-danger">*</span></p>
                    <input type="text" name="name" class="form-control input-focus" required placeholder="Enter name of ">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Coupon Type<span class="text-danger">*</span></p>
                    <select class="form-control" id="coupon-type" name="coupon_type">
                        <option value="">Select Coupon Type</option>
                        <option value="special">Special</option>
                        <option value="paid_students">Paid Students</option>
                        <option value="all_students">All Students</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Discount Value Type<span class="text-danger">*</span></p>
                    <select name="discount_type" class="form-control">
                      <?php $__errorArgs = ['discount_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <?php echo e($message); ?>

                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <option value="">Select Value Type</option>
                      <option value="amount">Rupee</option>
                      <option value="percentage">Percentage</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Discount Value<span class="text-danger">*</span></p>
                    <input type="number" name="discount_value" class="form-control input-focus" required placeholder="Only Number i.e 5">
                    <?php $__errorArgs = ['discount_value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
                <!-- <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Discount Value<span class="text-danger">*</span></p>
                    <input type="number" name="discount_value" class="form-control input-focus" required placeholder="Only Number i.e 5">
                    <?php $__errorArgs = ['discount_value'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
<?php echo e($message); ?>

<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>                  </div>
                </div> -->

                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Number of Coupons<span class="text-danger">*</span></p>
                    <input type="number" name="number_of_coupons" class="form-control input-focus" required placeholder="Only Number i.e 5">
                    <?php $__errorArgs = ['number_of_coupons'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <?php echo e($message); ?>

                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                </div>
              </div>
             <div class="row">
              <div class="col text-center"> <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit"></div>
             </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /#page-content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/dashboard/geenrate_coupon_code.blade.php ENDPATH**/ ?>