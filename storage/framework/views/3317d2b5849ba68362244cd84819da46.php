<?php $__env->startSection('title'); ?>
Student List
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
                    <h2>Student List</h2>
                </div>
                <div class="col-md-6 col text-end">
                    <a href="<?php echo e(route('admin.print.studentList')); ?>" target="blank"
                        class="btn btn-primary btn-small">Print PDF</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered datatablecl">
                            <thead>
                                <tr>
                                    <th scope="col">##</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Email/Mobile</th>
                                    <th scope="col">District<br />Centre</th>
                                    <th scope="col">Appl No</th>
                                    <th scope="col">Roll No</th>
                                    <th scope="col">Payment & Voucher</th>
                                    <th scope="col">Qualification</th>
                                    <th scope="col">Scholarship Category</th>
                                    <th scope="col">Scholarship Opted For</th>
                                    <th scope="col">Dated</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="text-left"><?php echo e($loop->index+1); ?></th>
                                    <td class="text-nowrap">
                                        <?php echo e($student->name); ?><br />
                                        <span><?php echo e($student->gender); ?></span><br />
                                        <span><?php echo e($student->dob); ?></span>
                                    </td>
                                    <td><?php echo e($student->email); ?><br />
                                        <?php echo e($student->mobile); ?><br />
                                        <?php echo e($student->login_password); ?>

                                    </td>
                                    <td><?php echo e($student->district?->name); ?></td>
                                    <td><?php echo e($student->latestStudentCode?->application_code ? $student->latestStudentCode?->application_code : 'N/A'); ?> </td>
                                    <td><?php echo e(!empty($student->latestStudentCode?->roll_no) ? $student->latestStudentCode?->roll_no :'N/A'); ?></td>
                                    <td>
                                        ₹ <?php echo e($student->studentPayment && count($student->studentPayment) && !empty($student->studentPayment[0]) && $student->studentPayment[0]->payment_amount ? $student->studentPayment[0]->payment_amount : 0); ?>

                                        <br />
                                        <?php echo e($student->latestStudentCode?->coupan_code ? $student->latestStudentCode?->coupan_code : ''); ?>

                                        <?php echo $student->latestStudentCode?->coupan_code ? '<br />'.($student->latestStudentCode?->corporate_name ? $student->latestStudentCode?->corporate_name : 'SQS Foundation, Kanpur') : ''; ?>

                                    </td>
                                    <td><?php echo e($student->qualifications?->name); ?></td>
                                    <td><?php echo e($student->scholarShipCategory?->name ?? 'N/A'); ?></td>
                                    <td><?php echo e($student->scholarShipOptedFor?->name ?? 'N/A'); ?></td>
                                    <td><?php echo e(date('d-M-Y', strtotime($student->created_at))); ?></td>

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
<?php echo $__env->make('administrator.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /run/media/ahtesham/Weblies/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/studentlist.blade.php ENDPATH**/ ?>