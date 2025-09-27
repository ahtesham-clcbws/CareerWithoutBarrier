<?php $__env->startSection('title'); ?>
Registered Student
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<style>
    .select2-selection__choice {
        color: black !important;
    }
</style>
<div class="row px-3">
    <div class="col-lg-12">
        <div class="m-2 m-t-15">
            <div class="row justify-content-space-between py-2">
                <div class="col-md-6 col">
                    <h2>Registered Students</h2>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered datatablecl">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Email/Mobile</th>
                                    <th scope="col">City & center</th>
                                    <th scope="col">Application Code</th>
                                    <th scope="col">Payment & Voucher</th>
                                    <th scope="col">Scholarship Category</th>
                                    <th scope="col">Scholarship Opted</th>
                                    <th scope="col">Step</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->index + 1); ?></th>
                                    <td>
                                        <?php echo e($student->name); ?><br>
                                        <span><?php echo e($student->gender); ?></span><br>
                                        <span><?php echo e($student->dob); ?></span><br>
                                    </td>
                                    <td>
                                        <?php echo e($student->email); ?> <br>
                                        <?php echo e($student->mobile); ?><br>
                                        <?php echo e($student->login_password); ?>

                                    </td>
                                    <td>
                                        <?php echo e($student->district?->name); ?>

                                        <?php ($center =
                                        DB::table('districts')->where('id',$student->test_center_a)->first()); ?>
                                        <br />
                                        <?php echo e($center?->name); ?>

                                    </td>
                                    <td><?php echo e($student->latestStudentCode?->application_code ? $student->latestStudentCode?->application_code : 'NA'); ?><br>
                                        <?php if(!empty($student->latestStudentCode?->roll_no)): ?>
                                            <span style="color:red;">R.No:<?php echo e($student->latestStudentCode?->roll_no); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>

                                        <?php ($studentPayment = $student->studentPayment->last()); ?>
                                        <?php if(!empty($studentPayment)): ?>

                                        <?php echo e($studentPayment->payment_amount); ?>


                                        <bt />
                                        <?php echo e($student->latestStudentCode?->coupan_code ? 'Coupon:- ' . $student->latestStudentCode?->coupan_code : ''); ?>

                                        <?php endif; ?>

                                    </td>
                                    <td><?php echo e($student->scholarShipCategory?->name ?? 'N/A'); ?></td>
                                    <td>
                                        <?php echo $student->qualifications?->name ? $student->qualifications?->name . '<br/>' : ''; ?>

                                        <?php echo e($student->scholarShipOptedFor?->name ?? 'N/A'); ?>

                                    </td>
                                    <td>Step: <?php echo e($student->form_step); ?></td>
                                    <td style="text-align:center">
                                        <a href="<?php echo e(route('admin.student', $student->id)); ?>" class="btn btn-primary"
                                            style="text-decoration: none;"></i> View</a>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/students-registered.blade.php ENDPATH**/ ?>