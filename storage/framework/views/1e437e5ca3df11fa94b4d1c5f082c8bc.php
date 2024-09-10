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
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Approved Institude</h6>
                                    <h3> <a href="<?php echo e(route('institute.list')); ?>" class="text-black"><?php echo e($APPinsititute); ?></a></h3>
                                </div>
                                <div class="db-icon">
                                    <img src="<?php echo e(asset('public/admin/icons/ApprovedInstitute.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Institude Enquiry</h6>
                                    <h3> <a href="<?php echo e(route('institute.list.new')); ?>" class="text-black"><?php echo e($insititute); ?></a></h3>
                                </div>
                                <div class="db-icon">
                                    <img src="<?php echo e(asset('public/admin/icons/InstituteEnquiry.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Contact Enquiry</h6>
                                    <h3> <a href="<?php echo e(route('admin.contactEnquiry')); ?>" class="text-black"><?php echo e($contactInfo); ?></a></h3>
                                </div>
                                <div class="db-icon">
                                    <img src="<?php echo e(asset('public/admin/icons/ContactEnquiry.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Students</h6>
                                    <h3> <a href="<?php echo e(route('admin.studentList')); ?>" class="text-black"><?php echo e($student); ?></a></h3>
                                </div>
                                <div class="db-icon">
                                    <img src="<?php echo e(asset('public/admin/icons/Students.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Subjects</h6>
                                    <h3> <a href="<?php echo e(route('dashboard_subjects')); ?>" class="text-black"><?php echo e($subjects); ?></a></h3>
                                </div>
                                <div class="db-icon">
                                    <img src="<?php echo e(asset('public/admin/icons/Subject.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Testimonial</h6>
                                    <h3> <a href="<?php echo e(route('admin.testimonialList')); ?>" class="text-black"><?php echo e($testimonials); ?></a></h3>
                                </div>
                                <div class="db-icon">
                                    <img src="<?php echo e(asset('public/admin/icons/Testimony1.png')); ?>" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
              
                
              
            </div>
        </div>
    </div>

    <!-- /#page-content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/dashboard/home.blade.php ENDPATH**/ ?>