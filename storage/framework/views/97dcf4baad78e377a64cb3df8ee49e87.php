<!-- resources/views/home.blade.php -->


<?php $__env->startSection('title', 'Home Page'); ?>


<?php $__env->startSection('content'); ?>
<section id="main-container" class="main-content container inner">
    <a href="javascript:void(0)" class="mobile-sidebar-btn d-lg-none btn-left"><i class="ti-menu-alt"></i></a>
    <div class="mobile-sidebar-panel-overlay"></div>
    <div class="row">
        <div class="sidebar-wrapper sidebar-course col-lg-3 col-12">
            <aside class="sidebar sidebar-left" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
                <div class="close-sidebar-btn d-lg-none"> <i class="ti-close"></i> <span>Close</span></div>
                <aside class="widget widget_apus_course_filter_keywords">
                    <form class="search-courses" method="get" action="https://demoapus1.com/skillup/lp-courses/">
                        <input type="hidden" name="post_type" value="lp_course">
                        <input type="hidden" name="taxonomy" value="">
                        <input type="hidden" name="term_id" value="">
                        <input type="hidden" name="term" value="">
                        <input type="text" class="form-control" placeholder="Search courses..." name="c_search" value="">
                        <button class="btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                        <input type="hidden" name="filter-category" value="42">
                    </form>
                </aside>
   
                <?php $__currentLoopData = $featuredCourses->groupBy('scholarship_category'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <aside class="widget widget_apus_course_filter_category">
                    <?php
            
                    $scholarshipName =  $courses->first()?->scholarshipCategory?->name;
                    ?>
                    <h6 class="widget-title"><span><?php echo e($scholarshipName); ?></span></h6>
                    <div class="filter-categories-widget">
                        <form action="https://demoapus1.com/skillup/lp-courses/" method="get">
                            <ul class="course-category-list course-list-check">
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <input id="filter-category-42" class="d-none" type="radio" name="filter-category" value="<?php echo e($course->id); ?>" <?php echo e($course->is_featured ==1 ? 'checked' : ''); ?>>
                                    <label for="filter-category-42">
                                    <a href="<?php echo e(route('home.career',encodeId($course->id))); ?>">
                                        <?php echo e($course->title); ?>

                                    </a>
                                    </label>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </form>
                    </div>
                </aside>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </aside>
        </div>

        <div id="main-content" class="col-sm-12 col-lg-9 col-12 pull-right">
            <main id="main" class="site-main layout-courses display-mode-grid" role="main">
                <div class="course-top-wrapper d-md-flex align-items-center">
                    <div class="course-found"><span>6</span> courses found</div>
                    <div class="lp-courses-filter d-flex align-items-center ml-auto">

                        <div class="orderby d-flex align-items-center">
                            <label class="mb-0 me-3">Short By:</label>
                            <form class="courses-ordering" method="get">
                                <select name="orderby" class="orderby">
                                    <option value="" selected="selected">Default</option>
                                    <option value="newest">Newest</option>
                                    <option value="oldest">Oldest</option>
                                </select>
                                <input type="hidden" name="paged" value="1">
                                <input type="hidden" name="filter-category" value="42">
                            </form>
                        </div>
                        <div class="display-mode d-flex align-items-center"><a href="#" class=" change-view active">
                                <i class="fa fa-th" aria-hidden="true"></i>
                            </a><a href="#" class=" change-view "><i class="fa fa-list-ul" aria-hidden="true"></i></a></div>
                    </div>
                </div>
                <div class="learn-press-courses row">
                    <?php $__currentLoopData = $featuredCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="course-grid post-1092 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-it-software course_category-web-designing course" >
                            <div class="course-layout-item">
                                <div class="course-entry">

                                    <!-- course thumbnail -->
                                    <div class="course-cover">
                                        <div class="course-cover-thumb">
                                            <figure class="entry-thumb"><a class="post-thumbnail" href="<?php echo e(route('home.career',encodeId($featuredCourse->id))); ?>" aria-hidden="true">
                                                    <div class="image-wrapper"><center><img src="<?php echo e(asset('home/course/'.$featuredCourse->featured_image)); ?>" style="width:250px;height:250px;" class="img-fluid" alt=""></center></div>
                                                </a></figure>
                                        </div>
                                    </div>

                                    <div class="course-layout-content">
                                        <h3 class="course-title"><a href="<?php echo e(route('home.career',encodeId($featuredCourse->id))); ?>">Education
                                                <?php echo e($featuredCourse->course_full_name); ?> ( <?php echo e($featuredCourse->vacancies); ?> Vacancies)</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- <div class="col-lg-6 col-md-6 col-12">
                            <div
                                class="course-grid post-1092 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-it-software course_category-web-designing course">
                                <div class="course-layout-item">
                                    <div class="course-entry">
                                        <div class="course-cover">
                                            <div class="course-cover-thumb">
                                                <figure class="entry-thumb"><a class="post-thumbnail" href="<?php echo e(route('home.career')); ?>"
                                                        aria-hidden="true">
                                                        <div class="image-wrapper"><img width="525" height="345"
                                                                src="<?php echo e(asset('website/assets/images/prepration/bank-img-1.jpg')); ?>"
                                                                class="img-fluid" alt=""></div>
                                                    </a></figure>
                                            </div>
                                        </div>
                                        <div class="course-layout-content">
                                            <h3 class="course-title"><a href="<?php echo e(route('home.career')); ?>">Education
                                                    State Bank of india Probationary Officer SBI-PO (1400 Vacancies)</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                </div>
            </main><!-- .site-main -->
        </div><!-- .content-area -->


    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/website/preparation.blade.php ENDPATH**/ ?>