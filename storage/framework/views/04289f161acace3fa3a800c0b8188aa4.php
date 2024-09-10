<!-- resources/views/home.blade.php -->


<?php $__env->startSection('title', 'Career Page'); ?>

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .faq-rhs p {
            display: block !important;
        }
        .mainSectionCar{
            margin-top:72px;
            background:#253a53;
            color:#fff;
        }
        .mainSectionCar a{
            color:#fff;
        }
        .gvtJobs{
            height: 27px;
        }
        /* responsive  */
        @media screen and (max-width: 600px) { 
            .width{
                max-width:100%;
                padding-bottom:10px;
            }
            .row{
                display:block !important;
                text-align:center;
            }
            .centerContent{
                text-align:center;
            }
            .wave{
                max-width:600px;   
            }

            .exam-details{
                margin-top:10px;
            }
        }
    
    </style>
<div style="background:#e6f6fd">

    <div class="perpration-career-banner mainSectionCar" >
        <div class="container text-center" >
            <div class="row" style="padding-top:85px;padding-bottom:85px">
                <div class="col-2 width">
                    <img src="<?php echo e(asset('home/course/'.$course?->course_logo)); ?>" width="115px" height="100px" class="img-thumbnail" alt="Responsive image">
                </div>
                <div class="col-7 width centerContent" style="text-align: justify;">
                    <div class="row">
                        <div class="col-5 width gvtJobs" >
                            <p style="font-size: small;max-width:100%">Union Govt Job</p>
                        </div>
                        <div class="col-12 width">
                            <h4><?php echo e($course?->course_full_name); ?> (<?php echo e($course?->title); ?>)</h4>
                        </div>
                        <div class="div col-5 width">
                                <i class="bi bi-megaphone"></i>
                             <a class="" href="<?php echo e(asset('home/course/'.$course->notification_file_path)); ?>">Gazette Notification
                               <i class="bi bi-download text-success"></i>
                            </a>
                        </div>
                        <div class="div col-5 width"> 
                            <i class="bi bi-book"></i>
                            <a class="" href="<?php echo e(asset('home/course/'.$course->exam_details_file_path)); ?>">Course/Exam Details
                               <i class="bi bi-download text-success"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3 width">
                    <!-- <h style=""> -->
                        <span>Get 100% Scholarship For Preparation </span>
                    <!-- </h6> -->
                    <div class="">
                        <!-- <a href="http://ppn.test/scholarshipForm"> -->
                        <a href="#">
                            <button type="button" class="btn btn-success btn-apply-now">Apply
                                Now</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5" >
        <div class="row">
            <!-- FAQ RIGHT SIDE CONTENT-->
            <div class="col-lg-7 col-md-12 ">
                <h4>Course Overview</h4>
                <div class="faq-rhs career-overview-content" style="border-radius: 0;">
                    <?php echo $course?->overview; ?> <?php echo $course?->otherdetails; ?>

                </div>
            </div>
    
            <!-- FAQ LEFT SIDE IMG-->
            <div class="col-lg-5 col-md-12 exam-details">
                <h4>Exam Details</h4>
                <div class="career-overview-content list-group-horizontal">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="border-top:0 !important;color: black;font-weight: bold;">
                                    Notification:
                                </td>
    
                                <td style=" border-top:0 !important;color: black;font-weight: bold;">
                                    <?php echo e($course?->notification); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="color: black;font-weight: bold;">
                                    Registration:
                                </td>
    
                                <td>
                                    <?php echo e($course?->registration); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="color: black;font-weight: bold;">
                                    Exam Date:
                                </td>
    
                                <td>
                                    <?php echo e($course?->exam_Date); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="color: black;font-weight: bold;">
                                    Exam Mode:
                                </td>
    
                                <td>
                                    <?php echo e($course?->exam_mode); ?>

    
                                </td>
                            </tr>
                            <tr>
                                <td style="color: black;font-weight: bold;">
                                    Exam Pattern:
                                </td>
    
                                <td>
                                    <?php echo e($course?->exam_pattern); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="color: black;font-weight: bold;">
                                    Vacancy:
                                </td>
    
                                <td>
                                    <?php echo e($course?->vacancies); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="color: black;font-weight: bold;">
                                    Pay Scale:
                                </td>
    
                                <td>
                                    <?php echo e($course?->pay_scale); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="color: black;font-weight: bold;">
                                    Age Criteria:
                                </td>
    
                                <td>
                                    <?php echo e($course?->age_criteria); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="color: black;font-weight: bold;">
                                    Eligibility:
                                </td>
    
                                <td>
                                    <?php echo e($course?->eligibility); ?>

                                </td>
                            </tr>
                            <tr>
                            <?php if($course?->prospectus): ?>
                                <td style="color: black;font-weight: bold;">
                                    E-Prospectus:
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <?php if(in_array(pathinfo($course->prospectus, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'])): ?>
                                        <a href="<?php echo e(asset('home/course/'.$course->prospectus)); ?>" target="_blank"> <img src="<?php echo e(asset('home/course/'.$course->prospectus)); ?>" alt="Prospectus Image" style="max-width: 50px; max-height: 40px;">
                                        </a>
                                        <?php else: ?>
                                        <a href="<?php echo e(asset('home/course/'.$course->prospectus)); ?>">
                                            <i class="fa fa-download ml-2" aria-hidden="true"></i>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <td style="color: black;font-weight: bold;">
                                    Official site:
                                </td>
    
                                <td>
                                    <?php echo e($course?->official_site); ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
    
                </div>
            </div>
            <!-- FAQ RIGHT SIDE CONTENT END-->
        </div>
    </div>
   
    <!-- <div class="contact-wave-effect ">
        <div class="ocean">
            <div class="wave"></div>
        </div>
    </div> -->
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/website/career.blade.php ENDPATH**/ ?>