<?php $__env->startSection('title'); ?>
Student Payment
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php

use Illuminate\Support\Facades\Auth;

$admin = Auth::user();
?>
<?php if($admin->roles != 'admin'): ?>
<?php echo e(abort(403,'Permission Denied')); ?>

<?php endif; ?>
<?php $__env->startSection('content'); ?>
<div class="row py-2 pl-3 pr-3">
    <div class="container ">
        <div class="row">
            <div class="col-lg-11 col-md-11 col">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h5> <?php echo e($settings ? 'Update' : 'Add'); ?> Payment Key Secret:</h5>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="<?php echo e(route('payment-settings.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <p for="key_id">Key ID</p>
                                                <input class="form-control" type="text" id="key_id" name="key_id" value="<?php echo e($settings->key_id ?? ''); ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <p for="key_secret">Key Secret</p>
                                                <input class="form-control" type="text" id="key_secret" name="key_secret" value="<?php echo e($settings->key_secret ?? ''); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-11 text-center">
                                        <input type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5 w-50 mt-4" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/dashboard/payment_settings.blade.php ENDPATH**/ ?>