<?php $__env->startSection('title'); ?>
Home
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <h2>Dashboard</h2>
        <div class="row">

            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="<?php echo e(route('admin.studentListRegistered')); ?>" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>New Students</h6>
                                <h3>
                                    <p class="text-black"><?php echo e($newStudents); ?></p>
                                </h3>
                            </div>
                            <div class="db-icon">
                                <img src="<?php echo e(asset('admin/icons/Students.png')); ?>" style="filter: hue-rotate(45deg);" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="<?php echo e(route('admin.studentList')); ?>" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Total Students</h6>
                                <h3>
                                    <p class="text-black"><?php echo e($totalStudents); ?></p>
                                </h3>
                            </div>
                            <div class="db-icon">
                                <img src="<?php echo e(asset('admin/icons/Students.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="<?php echo e(route('institute.list.new')); ?>" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>New Institute Enquiry</h6>
                                <h3>
                                    <p class="text-black"><?php echo e($newInstituteInquiry); ?></p>
                                </h3>
                            </div>
                            <div class="db-icon">
                                <img src="<?php echo e(asset('admin/icons/SignUp.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="<?php echo e(route('institute.list.signup')); ?>" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>New Institute Signup</h6>
                                <h3>
                                    <p class="text-black"><?php echo e($newInstituteSignup); ?></p>
                                </h3>
                            </div>
                            <div class="db-icon">
                                <img src="<?php echo e(asset('admin/icons/ApprovedInstitute.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>



            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="<?php echo e(route('institute.list')); ?>" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Approved Institute</h6>
                                <h3>
                                    <p class="text-black"><?php echo e($approvedInsititutes); ?></p>
                                </h3>
                            </div>
                            <div class="db-icon">
                                <img src="<?php echo e(asset('admin/icons/ApprovedInstitute.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="<?php echo e(route('admin.testimonialList')); ?>" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Feedback/ review (Testimony)</h6>
                                <h3>
                                    <p class="text-black"><?php echo e($newTestimonials); ?></p>
                                </h3>
                            </div>
                            <div class="db-icon">
                                <img src="<?php echo e(asset('admin/icons/Testimony1.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="<?php echo e(route('admin.contactEnquiry')); ?>" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>New Contact Enquiry</h6>
                                <h3>
                                    <p class="text-black"><?php echo e($newContactEnquiries); ?></p>
                                </h3>
                            </div>
                            <div class="db-icon">
                                <img src="<?php echo e(asset('admin/icons/ContactEnquiry.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="<?php echo e(route('institute.couponRequests')); ?>" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>New Coupon Requests</h6>
                                <h3>
                                    <p class="text-black"><?php echo e($newCouponRequests); ?></p>
                                </h3>
                            </div>
                            <div class="db-icon">
                                <img src="<?php echo e(asset('admin/icons/DiscountVoucher.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- /#page-content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /run/media/ahtesham/Weblies/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/home.blade.php ENDPATH**/ ?>