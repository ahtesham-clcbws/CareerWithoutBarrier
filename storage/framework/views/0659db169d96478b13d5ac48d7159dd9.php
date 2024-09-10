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
                            <input type="text" class="form-control" placeholder="Search courses..." name="c_search"
                                value="">
                            <button class="btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                            <input type="hidden" name="filter-category" value="42">
                        </form>
                    </aside>
                    <aside class="widget widget_apus_course_filter_category">
                        <h2 class="widget-title"><span>Central Govt Jobs</span></h2>
                        <div class="filter-categories-widget">
                            <form action="https://demoapus1.com/skillup/lp-courses/" method="get">
                                <ul class="course-category-list course-list-check">
                                    <li>
                                        <input id="filter-category-42" class="d-none" type="radio" name="filter-category"
                                            value="42" checked="checked">
                                        <label for="filter-category-42">Web Designing <span class="count">6</span></label>
                                    </li>
                                    <li>
                                        <input id="filter-category-46" class="d-none" type="radio" name="filter-category"
                                            value="46">
                                        <label for="filter-category-46">Photography <span class="count">1</span></label>
                                    </li>
                                    <li>
                                        <input id="filter-category-38" class="d-none" type="radio" name="filter-category"
                                            value="38">
                                        <label for="filter-category-38">Medical <span class="count">0</span></label>
                                    </li>
                                    <li>
                                        <input id="filter-category-45" class="d-none" type="radio" name="filter-category"
                                            value="45">
                                        <label for="filter-category-45">Marketing <span class="count">1</span></label>
                                    </li>
                                    <li>
                                        <input id="filter-category-43" class="d-none" type="radio" name="filter-category"
                                            value="43">
                                        <label for="filter-category-43">Lifestyle <span class="count">4</span></label>
                                    </li>
                                    <li>
                                        <input id="filter-category-34" class="d-none" type="radio" name="filter-category"
                                            value="34">
                                        <label for="filter-category-34">IT &amp; Software <span
                                                class="count">2</span></label>
                                    </li>
                                    <li>
                                        <input id="filter-category-44" class="d-none" type="radio" name="filter-category"
                                            value="44">
                                        <label for="filter-category-44">Health &amp; Fitness <span
                                                class="count">2</span></label>
                                    </li>
                                    <li>
                                        <input id="filter-category-40" class="d-none" type="radio" name="filter-category"
                                            value="40">
                                        <label for="filter-category-40">Finance &amp; Accounting <span
                                                class="count">3</span></label>
                                    </li>
                                    <li>
                                        <input id="filter-category-41" class="d-none" type="radio"
                                            name="filter-category" value="41">
                                        <label for="filter-category-41">Development <span class="count">3</span></label>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </aside>
                    <aside class="widget widget_apus_course_filter_instructor">
                        <h2 class="widget-title"><span>UP State Govt Jobs</span></h2>
                        <div class="filter-instructors-widget">
                            <form action="https://demoapus1.com/skillup/lp-courses/" method="get">
                                <ul class="instructor-list course-list-check">
                                    <li>
                                        <input id="filter-instructor-5" type="radio" class="d-none"
                                            name="filter-instructor" value="5">
                                        <label for="filter-instructor-5">Adam Riky <span class="count">2</span></label>
                                    </li>
                                    <li>
                                        <input id="filter-instructor-3" type="radio" class="d-none"
                                            name="filter-instructor" value="3">
                                        <label for="filter-instructor-3">David Garza <span class="count">2</span></label>
                                    </li>
                                    <li>
                                        <input id="filter-instructor-7" type="radio" class="d-none"
                                            name="filter-instructor" value="7">
                                        <label for="filter-instructor-7">John Doe <span class="count">2</span></label>
                                    </li>
                                    <li>
                                        <input id="filter-instructor-6" type="radio" class="d-none"
                                            name="filter-instructor" value="6">
                                        <label for="filter-instructor-6">Mike Hussy <span class="count">2</span></label>
                                    </li>
                                    <li>
                                        <input id="filter-instructor-8" type="radio" class="d-none"
                                            name="filter-instructor" value="8">
                                        <label for="filter-instructor-8">Robert Fox <span class="count">2</span></label>
                                    </li>
                                </ul>
                                <input type="hidden" name="filter-category" value="42">
                            </form>
                        </div>
                    </aside>

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
                            <div class="display-mode d-flex align-items-center"><a href="#"
                                    class=" change-view active">
                                    <i class="fa fa-th" aria-hidden="true"></i>
                                </a><a href="#" class=" change-view "><i class="fa fa-list-ul"
                                        aria-hidden="true"></i></a></div>
                        </div>
                    </div>
                    <div class="learn-press-courses row">
                        <?php $__currentLoopData = $featuredCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div
                                class="course-grid post-1092 lp_course type-lp_course status-publish has-post-thumbnail hentry course_category-it-software course_category-web-designing course">
                                <div class="course-layout-item">
                                    <div class="course-entry">

                                        <!-- course thumbnail -->
                                        <div class="course-cover">
                                            <div class="course-cover-thumb">
                                                <figure class="entry-thumb"><a class="post-thumbnail"
                                                href="<?php echo e(route('home.career',encodeId($featuredCourse->id))); ?>"
                                                        aria-hidden="true">
                                                        <div class="image-wrapper"><img
                                                                src="<?php echo e(asset('home/course/'.$featuredCourse->featured_image)); ?>"
                                                                class="img-fluid" alt=""></div>
                                                    </a></figure>
                                            </div>
                                        </div>

                                        <div class="course-layout-content">
                                            <h3 class="course-title"><a href="<?php echo e(route('home.career',encodeId($featuredCourse->id))); ?>">Education
                                                    <?php echo e($featuredCourse->course_full_name); ?> (  <?php echo e($featuredCourse->vacancies); ?> Vacancies)</a></h3>
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

<?php echo $__env->make('layouts.website', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/website/preparation.blade.php ENDPATH**/ ?>