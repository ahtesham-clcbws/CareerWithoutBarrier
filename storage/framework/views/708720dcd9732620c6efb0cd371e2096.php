<!-- resources/views/home.blade.php -->


<?php $__env->startSection('title', 'Home Page'); ?>


<?php $__env->startSection('content'); ?>
<div class="perpration-page-banner common-banner" style="    margin-bottom: 55px; margin-top: 72px;">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo e(asset('home/aboutus/'.$banner->banner)); ?>" class="img-fluid" alt="img">
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="carrier-glance">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                <?php $__currentLoopData = $founderThoughts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $founderThought): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?php echo e($key == 0? 'active' : ''); ?>" id="thought-tab<?php echo e($key+1); ?>" data-toggle="tab" href="#thought<?php echo e($key+1); ?>" role="tab" aria-controls="thought" aria-selected="true">
                            <span class="mr-1 tab-icon">
                                <img class="img-fluid" src="<?php echo e(asset('home/aboutus/'.$founderThought?->icon)); ?>" alt="img">
                               <?php echo e($founderThought?->title); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $bannerSectionTwos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sectionTwo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                            <span class="mr-1 tab-icon">
                                <img src="<?php echo e(asset('home/aboutus/'.$sectionTwo->banner)); ?>" alt="img"></span>
                            <?php echo e($sectionTwo->title); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="tab-content" id="myTabContent">
                <?php $__currentLoopData = $founderThoughts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $founderThought): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade show <?php echo e($key > 0? 'active' : ''); ?>" id="thought<?php echo e($key+1); ?>" role="tabpanel" aria-labelledby="thought-tab<?php echo e($key+1); ?>" >
                        <div class="container">
                            <!-- About 1 - Bootstrap Brain Component -->
                            <section class="">
                                <div class="container">
                                    <div class="row gy-3 gy-md-4 gy-lg-0 " style="border-radius: 8px;border: 2px solid #dae1ef;padding: 18px;background-color: #f9fbff;">
                                        <div class="col-12 col-lg-3">
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="<?php echo e(asset('home/aboutus/'.$founderThought?->picture)); ?>" alt="maximize-icon" class="img-fluid rounded" loading="lazy">
                                                </div>
                                            </div>
                                            <div class="row text-center mt-5" style="margin-top: 41%;">
                                                <div class="col">
                                                    <div class="title">
                                                        <h6><?php echo e($founderThought?->name); ?></h6>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-lg-9" style="border-left: 1px solid #848e8e;">
                                        <?php echo $founderThought?->message; ?>

                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $bannerSectionTwos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sectionTwo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="custom-tooltip-container">
                            <div class="add">
                                <div class="custom-grid">
                                    <div class="dummy-image">
                                        <img class="img-fluid" src="<?php echo e(asset('website/assets/images/prepration/dummy-img.jpg')); ?>" alt="img">
                                    </div>
                                    <div class="custom-tooltip-content specialised">
                                        <?php echo $sectionTwo->description; ?>

                                    </div>
                                </div>
                            </div>
                            <div class="grid-list">
                                <div class="custom-grid">
                                    <div class="click" data-id="specialised">
                                        <div class="cusom-tooltip-list-item">
                                            <span class="tooltip-icon me-3">
                                                <img src="<?php echo e(asset('home/aboutus/'.$sectionTwo->service_a_image)); ?>" alt="img">
                                            </span>

                                            <div class="custom-tooltip-list-content">
                                                <h6><?php echo e($sectionTwo->service_a); ?></h6>
                                                <p>{ !!sectionTwo->service_a_description!!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="click" data-id="onlineAppointement">
                                        <div class="cusom-tooltip-list-item">
                                            <span class="tooltip-icon tooltip-icon-1 me-3">
                                                <img src="<?php echo e(asset('home/aboutus/'.$sectionTwo->service_b_image)); ?>" alt="img">
                                            </span>

                                            <div class="custom-tooltip-list-content">
                                                <h6><?php echo e($sectionTwo->service_b); ?></h6>
                                                <?php echo $sectionTwo->service_b_descriptio; ?>

                                           
                                            </div>
                                        </div>
                                    </div>
                                    <div class="click" data-id="emergency">
                                        <div class="cusom-tooltip-list-item">
                                            <span class="tooltip-icon tooltip-icon-2 me-3">
                                                <img src="<?php echo e(asset('home/aboutus/'.$sectionTwo->service_c_image)); ?>" alt="img">
                                            </span>

                                            <div class="custom-tooltip-list-content">
                                                <h6><?php echo e($sectionTwo->service_c); ?></h6>
                                                <?php echo $sectionTwo->service_c_descriptio; ?>

                                           
                                            </div>
                                        </div>
                                    </div>
                                    <div class="click" data-id="suppport">
                                        <div class="cusom-tooltip-list-item">
                                            <span class="tooltip-icon tooltip-icon-3 me-3">
                                                <img src="<?php echo e(asset('home/aboutus/'.$sectionTwo->service_d_image)); ?>" alt="img">
                                            </span>

                                            <div class="custom-tooltip-list-content">
                                                <h6><?php echo e($sectionTwo->service_d); ?></h6>
                                                <?php echo $sectionTwo->service_d_descriptio; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="custom-tooltip-list">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="maximize-value">
    <section>
        <div class="subscribe-off comm-p-t-b">
            <div class="container">
                <div class="comm-tit-ani tit ani-tit text-left pb-2">
                    <p><?php echo e($bannerSectionThreeHeader?->section_remarks); ?></p>
                    <?php if($bannerSectionThreeHeader?->section_title): ?>
                    <h2><?php echo wrap_half_title_in_span($bannerSectionThreeHeader?->section_title); ?><br></h2><span class="line"></span>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $bannerSectionThrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannerSectionThree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12 meet-experts wow-ani ani-strt">
                        <div class="maximize-value-widget" style="max-height: 260px;min-height: 260px;">
                            <div class="maximize-icon">
                                <img src="<?php echo e(asset('home/aboutus/'.$bannerSectionThree->image)); ?>" alt="maximize-icon">
                            </div>
                            <h6><?php echo e($bannerSectionThree->title); ?></h6>
                            <p style="max-height: 88px;overflow:hidden"><?php echo $bannerSectionThree->description; ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!--SUBSCRIBE OFFER CONTENT-->

                </div>
            </div>
        </div>

    </section>
</div>

<section>
    <div class="travel-experts single-pg-experts our-way">
        <!--TRAVEL EXPERTS BACKGROUND DOT AND ANIMATIONS -->
        <div class="experts-bg-dt">
            <div class="exp-dt-1"></div>
        </div>
        <!-- END -->
        <!--ALL SECTION COMMEN TITTLE-->
        <div class="comm-tit-ani tit ani-tit">
            <h2><?php echo wrap_half_title_in_span($bannerSectionFourHeader?->section_title); ?><br></h2><span class="line"></span>
            <h6><?php echo e($bannerSectionFourHeader?->section_remarks); ?></h6>
        </div>
        <div class="container">
            <div class="row">
                <!--TRAVEL EXPERTS IMG AND NAME -->
                <?php $__currentLoopData = $bannerSectionFours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannerSectionFour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="ani-eql col-lg-3 col-md-6 meet-experts wow-ani ani-strt">
                    <!--TRAVEL EXPERTS IMG-->
                    <div class="travel-exp-1">
                        <h4><?php echo e($bannerSectionFour->title); ?></h4>
                        <img src="<?php echo e(asset('home/aboutus/'.$bannerSectionFour->image)); ?>" alt="img">
                        <h5><?php echo $bannerSectionFour->description; ?></h5>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<div class="our-values">
    <div class="container">
        <div class="comm-tit-ani tit ani-tit text-center pb-2">
            <p><?php echo e($bannerSectionFiveHeader?->section_remarks); ?></p>
            <h2><?php echo wrap_half_title_in_span($bannerSectionFiveHeader?->section_title); ?><br></h2><span class="line"></span>
        </div>
        <div class="row">
            <?php $__currentLoopData = $bannerSectionFives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannerSectionFive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="our-values-widget d-flex" style="max-height: 137px;">
                    <div class="our-values-icon mr-3" >
                        <img src="<?php echo e(asset('home/aboutus/'.$bannerSectionFive->image)); ?>" alt="icon">
                    </div>
                    <div class="our-values-widget-content" style="max-height: 78px;overflow: hidden;">
                        <h6><?php echo e($bannerSectionFive->title); ?></h6>
                        <?php echo $bannerSectionFive->description; ?>

                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<!-- SECTION: TESTIMONIALS-->
<section>
    <div class="testimonails-head what-client-say">
        <div class="testimonails">
            <div class="container">
                <div class="comm-tit-ani tit ani-tit text-center pb-2">
                    <p>What</p>
                    <h2>Our Institude <span>say</span><br></h2><span class="line"></span>
                </div>
                <div class="row">
                    <!--TESTIMONIALS START-->
                    <div class="testimonails-inner">
                        <!--TESTIMONIALS LEFT SIDE CONTENT-->

                        <!--TESTIMONIALS RIGHT SIDE BOX-->
                        <div class="testi1">
                            <div class="testi2">
                                <div id="demo" class="carousel slide" data-ride="carousel">
                                    <?php $__currentLoopData = $corporateTestimonials->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="carousel-inner">
                                        <?php $__currentLoopData = $chunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$corporateTestimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="carousel-item <?php echo e($key==0 ? 'active' : ''); ?>">
                                            <div class="col-lg-4 col-md-4 testi-slider">
                                                <div class="testi-lhs">
                                                    <div class="str-rating">
                                                        <div class="commas">
                                                            "
                                                        </div>
                                                        <?php echo $corporateTestimonial->message; ?>

                                                        <div class="testimonials-user">
                                                            <img src="<?php echo e(asset('home/'.$corporateTestimonial->image)); ?>" alt="img">
                                                        </div>
                                                        <h5 class="mb-0"><?php echo e($corporateTestimonial?->corporate?->name); ?></h5>
                                                        <h6 class="mb-0"><?php echo e($corporateTestimonial?->corporate?->type_institution); ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TESTIMONIALS SLIDER 1 IMG AND RATING -->
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <!--TESTIMONIALS SLIDER 1 END-->
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>
                        </div>
                        <div class="testimo-header">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SECTION: BRANDS -->

<div class="our-values strategy-consult">
    <div class="container">
        <div class="comm-tit-ani tit ani-tit text-center pb-2">
            <h2><?php echo wrap_half_title_in_span($bannerSectionSixHeader?->section_title); ?><br></h2><span class="line"></span>
            <h6 class="mb-5"><?php echo e($bannerSectionSixHeader?->section_remarks); ?></h6>
        </div>
        <div class="row">
            <?php $__currentLoopData = $bannerSectionSixs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannerSectionSix): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="our-values-widget d-flex">
                    <div class="our-values-icon mr-3">
                        <img src="<?php echo e(asset('home/aboutus/'.$bannerSectionSix->image)); ?>" alt="icon">
                    </div>
                    <div class="our-values-widget-content" style="max-height: 102px;overflow: hidden;">
                        <h6><?php echo e($bannerSectionSix->title); ?></h6>
                        <?php echo $bannerSectionSix->description; ?>

                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/website/aboutus.blade.php ENDPATH**/ ?>