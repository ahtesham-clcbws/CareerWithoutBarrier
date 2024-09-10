<!-- resources/views/home.blade.php -->


<?php $__env->startSection('title', 'Home Page'); ?>

<style>
    .slick-current .ban-box-com {
        transform: scale(1.1);
        border-radius: 20px;
        box-shadow: 12px 9px 16px 1px #333;
        transition: all 0.7s ease;
        position: relative;
        z-index: 1;
        opacity: 1;
        background: linear-gradient(to right, rgb(218, 34, 255), rgb(151, 51, 238));
    }

    .text-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        /* background-color: rgba(0, 0, 0, 0.5); */
        padding: 10px;
        border-radius: 5px;
    }

    .slider {
        top: 72px;
        width: 100%;
        

    }
    .slider.u-slick{
        height: 450px;
    }
    .ban-box ul li .ban-box-com {
    padding: 40px;
}

    .overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 24px;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
        border-radius: 10px;
        text-align: center;
        width: 90%;
        /* Optional: To make the overlay text wrap */
    }
</style>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<?php $__env->startSection('content'); ?>
<section>
    <!-- <div class="slider">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="slide-wrapper">
            <img src="<?php echo e(asset('/home/slider/'.$slider->image)); ?>" alt="Banner Image">
            <div class="overlay">lfd;nsfkja;/div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div> -->

    <div class="slider u-slick">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="slide-wrapper">
            <img class="w-100" style="height: 500px" src="<?php echo e(asset('/home/slider/'.$slider->image)); ?>" alt="Banner Image">
            <!-- <div class="overlay">dfsdsf</div> -->
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>


<section>
    <div class="travl-features" style="margin-top:4.5rem">
        <div class="container">
            <div class="row">
                <!-- SECTION: TYPE OFF TRAVEL BOX-->
                <div class="ban-box">
                    <ul class="slider-element">
                        <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="ban-box-com">
                                <img src="<?php echo e(asset('website/assets/images/icons/diploma.png')); ?>" alt="">
                                <h4><?php echo e($education->name); ?></h4>
                                <a href="#">View more <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                <span class="bg-1"></span>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SECTION: TRAVEL PACKAGES -->
<section>
    <div class="packages">
        <!-- ALL SECTION COMMEN TITTLE -->
        <div class="comm-tit-ani tit">
            <p>Popular Courses</p>
            <h2>For <span>100% Scholarship</span><br></h2><span class="line"></span>
        </div>
        <!-- PACKAGES BACKGROUND IMG AND ANIMATIONS -->
        <!-- <div class="leaf-2">
                        <img class="comm-tit-ani designs-pack" src="assets/images/icons/open-book.png" alt="">
                        <img class="comm-tit-ani designs-pack-1" src="assets/images/icons/5.png" alt="">
                    </div> -->
        <!-- END -->
        <div class="container">
            <div class="row">
                <!--TRAVEL PACKAGES IMG & FEATURES BOX-->
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="ani-eql col-lg-3 col-md-6 packages-ani">
                    <div class="most-packages">
                        <div class="packages-img">
                            <a href="<?php echo e(route('home.career',encodeId($course->id))); ?>" target="_blank">
                                <img src="<?php echo e(asset('home/course/'.$course->course_logo)); ?>" alt="Courses">
                                <h2><?php echo e($course->title); ?></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
</section>

<!-- SECTION: WHY CHOOSE -->

<!-- SECTION: ASK TRAVELLER -->
<section>
    <div class="ask-experts comm-p-t-b">
        <div class="container">
            <div class="comm-tit-ani tit ani-tit">
                <p>Benefit of CAREER without</p>
                <h2>BARRIER <span>scholarship Exam</span><br></h2><span class="line"></span>
            </div>
            <div class="row">

                <div class="traveller-advice">
                    <ul>
                        <?php $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="ani-eql">
                            <div class="traveller-point">
                                <i class="<?php echo e($benefit->icon); ?>" aria-hidden="true"></i>
                                <h4><?php echo e($benefit->benefits); ?> </h4>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-dt">
            <div class="dt-1"></div>
        </div>
    </div>
</section>

<section class="important-information">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                <div class="comm-tit-ani tit ani-tit">
                    <p>Important</p>
                    <h2>Information <span>& Notice</span><br></h2><span class="line"></span>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 pr-0">
                        <div class="important-information-img">
                            <img class="img-fluid" src="<?php echo e(asset('website/assets/images/information/important-information.png')); ?>" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 pl-0">
                        <div class="important-information-news">
                            <div class="news-slider">
                                <div class='marquee-vert'>
                                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="#" class="news-link"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo $notice->title; ?> <?php echo $notice->details; ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="comm-tit-ani tit ani-tit">
                    <p>News &</p>
                    <h2><span>Events</span><br></h2><span class="line"></span>
                </div>
                <?php $__currentLoopData = $blogNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="news-row d-flex mb-3">
                    <div class="news-img mr-3">
                        <img class="img-fluid" src="<?php echo e(asset('news/'.$news->image)); ?>" alt="img">
                    </div>
                    <div class="news-content">
                        <h6><?php echo $news->title; ?></h6>
                        <p><?php echo $news->details; ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="packages govt-web">
        <div class="comm-tit-ani tit">
            <p>Important</p>
            <h2>Govt <span>Websites</span><br></h2><span class="line"></span>
        </div>
        <div class="container">
            <div class='marquee'>
                <div class="row flex-nowrap">
                    <?php $__currentLoopData = $govtwebsites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $govtwebsite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-2 govt-web-col " style="align-content: space-around;">
                        <div class="govt-web-logo">
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="<?php echo e($govtwebsite->website_link); ?>">
                                    <img class="img-fluid" src="<?php echo e(asset('home/courses/' . $govtwebsite->image)); ?>" alt="img">
                                </a>
                                <span class="remark"><?php echo e($govtwebsite->remark); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="counter-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="counter-section-widget text-center">
                    <div class="counter-section-icon mb-3 d-flex align-items-center justify-content-center mx-auto">
                        <img class="img-fluid" src="<?php echo e(asset('website/assets/images/icons/student-icon.png')); ?>" alt="img">
                    </div>
                    <h6>Students Enrolled</h6>
                    <h2><span class="counter" data-count-start="50" data-count-end="80" data-speed="70">80</span><span class="plus-icon">+</span></h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="counter-section-widget text-center">
                    <div class="counter-section-icon mb-3 d-flex align-items-center justify-content-center mx-auto">
                        <img class="img-fluid" src="<?php echo e(asset('website/assets/images/icons/certificate-icon.png')); ?>" alt="img">
                    </div>
                    <h6>Certified Teachers</h6>
                    <h2><span class="counter" data-count-start="50" data-count-end="100" data-speed="70">100</span><span class="plus-icon">+</span></h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="counter-section-widget text-center">
                    <div class="counter-section-icon mb-3 d-flex align-items-center justify-content-center mx-auto">
                        <img class="img-fluid" src="<?php echo e(asset('website/assets/images/icons/class-icon.png')); ?>" alt="img">
                    </div>
                    <h6>Classes Complete</h6>
                    <h2><span class="counter" data-count-start="50" data-count-end="150" data-speed="70">150</span><span class="plus-icon">+</span></h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="counter-section-widget text-center">
                    <div class="counter-section-icon mb-3 d-flex align-items-center justify-content-center mx-auto">
                        <img class="img-fluid" src="<?php echo e(asset('website/assets/images/icons/forign-icon.png')); ?>" alt="img">
                    </div>
                    <h6>Foreign Followers</h6>
                    <h2><span class="counter" data-count-start="50" data-count-end="200" data-speed="70">200</span><span class="plus-icon">+</span></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION: TESTIMONIALS-->
<section>
    <div class="testimonails-head">
        <div class="testimonails">
            <div class="container">
                <div class="row">
                    <!--TESTIMONIALS START-->
                    <div class="testimonails-inner">
                        <!--TESTIMONIALS LEFT SIDE CONTENT-->
                        <div class="testimo-header">
                            <div class="comm-tit-ani tit ani-tit text-left pb-2">
                                <p>Hear it directly</p>
                                <h2>from <span>our students</span><br></h2><span class="line"></span>
                            </div>
                            <p>The passage experienced a surge in popularity during the 1960s when Letraset </p>
                            <ul class="carousel-indicators">

                                <li>
                                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                        <i class="fa fa-long-arrow-left carousel-control-prev-icon" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="carousel-control-next" href="#demo" data-slide="next">
                                        <i class="fa fa-long-arrow-right carousel-control-next-icon" aria-hidden="true"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!--TESTIMONIALS RIGHT SIDE BOX-->
                        <div class="testi1">
                            <div class="testi2">
                                <div id="demo" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php $__currentLoopData = $studentTestimonials->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="carousel-item active">
                                            <?php $__currentLoopData = $chunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $studentTestimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-6 col-md-6 testi-slider">
                                                <div class="testi-lhs">
                                                    <div class="str-rating">
                                                        <div class="testimonials-user">
                                                            <img src="<?php echo e(asset('home/'.$studentTestimonial->image)); ?>" alt="img">
                                                        </div>
                                                        <p><?php echo $studentTestimonial->message; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SECTION: BRANDS -->

<!-- SECTION: Institude TESTIMONIALS-->
<section>
    <div class="testimonails-head">
        <div class="testimonails">
            <div class="container">
                <div class="row">
                    <!--TESTIMONIALS START-->
                    <div class="testimonails-inner">

                        <!--TESTIMONIALS RIGHT SIDE BOX-->
                        <div class="testi1">
                            <div class="testi2">
                                <div id="demo" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php $__currentLoopData = $corporateTestimonials->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="carousel-item active">
                                            <?php $__currentLoopData = $chunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $corporateTestimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-6 col-md-6 testi-slider">
                                                <div class="testi-lhs">
                                                    <div class="str-rating">
                                                        <div class="testimonials-user">
                                                            <img src="<?php echo e(asset('home/'.$corporateTestimonial->image)); ?>" alt="img">
                                                        </div>
                                                        <p><?php echo $corporateTestimonial->message; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <!--TESTIMONIALS SLIDER 1 END-->
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!--TESTIMONIALS LEFT SIDE CONTENT-->
                        <div class="testimo-header">
                            <div class="comm-tit-ani tit ani-tit text-end pb-2">
                                <p>Hear it directly</p>
                                <h2 style="font-size:35px">from <span>our Institude</span><br></h2><span class="line"></span>
                            </div>
                            <p>The passage experienced a surge in popularity during the 1960s when Letraset </p>
                            <ul class="carousel-indicators" style="right:0 !important ;">
                                <li>
                                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                        <i class="fa fa-long-arrow-end carousel-control-prev-icon" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="carousel-control-next" href="#demo" data-slide="next">
                                        <i class="fa fa-long-arrow-right carousel-control-next-icon" aria-hidden="true"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SECTION: BRANDS -->
<section>
    <div class="ani-eql country-wise never-ending-journey">
        <!--COUNTRY WISE TRAVEL TITTLE-->
        <h2>NEVER ENDING JOURNEYS</h2>
        <p>Lorem ipsum dolor sit amet, pri in persius oporteat, usu ex erat aperiam nusquam. His liber verear <br>
            ornatus eu. Nobis regione patrioque pri te.</p>

        <!--COUNTRY WISE TRAVEL MAP AND LINE-->
        <div class="tim-lin">
            <div class="country-travel">
                <ul>
                    <?php $__currentLoopData = $ourJourneys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ourJourney): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="country-travel-1">
                            <img class="loc-img" src="<?php echo e(asset('home/'.$ourJourney->logo)); ?>" alt="">
                            <img src="<?php echo e(asset('home/'.$ourJourney->image)); ?>" alt="">
                            <div class="travel-content">
                                <h3><?php echo e($ourJourney->title); ?></h3>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <!--COUNTRY WISE TRAVEL MAP AND LINE END-->
    </div>
</section>

<div class="great-contributor">
    <div class="container relative">
        <div class="comm-tit-ani tit ani-tit">
            <p>WE WOULD LIKE TO SAY</p>
            <h2>Thanks To Our <span>Great Contributor</span><br></h2><span class="line"></span>
        </div>

        <div id="great-contributor" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $__currentLoopData = $ourContributors->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyChunk => $chunks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($keyChunk ==0 ? 'active' : ''); ?>">
                    <div class="row">
                        <?php $__currentLoopData = $chunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                            <img class="img-fluid" src="<?php echo e(asset('home/'.$chunk->logo)); ?>" alt="img">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <ul class="carousel-indicators">
                <li>
                    <a class="carousel-control-prev" href="#great-contributor" data-slide="prev">
                        <i class="fa fa-long-arrow-left carousel-control-prev-icon" aria-hidden="true"></i>
                    </a>
                </li>
                <li>
                    <a class="carousel-control-next" href="#great-contributor" data-slide="next">
                        <i class="fa fa-long-arrow-right carousel-control-next-icon" aria-hidden="true"></i>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</div>

<script>
    $('.slider-element').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        centerMode: true,
        arrows: false,
    });


    $('.slider').slick({
        slidesToScroll: 1,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        centerMode: true,
        arrows: false,
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/website/homepage.blade.php ENDPATH**/ ?>