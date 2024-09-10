<!-- resources/views/home.blade.php -->


<?php $__env->startSection('title', 'Home Page'); ?>


<?php $__env->startSection('content'); ?>

    <body class="conact-page">
        <section>
            <div class="common-banner contact-us-banner">
                <div class="container">
                    <div class="row">
                        <h2>Contact us</h2>
                        <h4><a href="<?php echo e(route('home.front')); ?>">Home > </a> <span>Contact</span></h4>
                        <i class="fly-icon"></i>
                        <div class="comm-ban-im">
                            <img src="<?php echo e(asset('website/assets/images/bg-icons/contact-banner.png')); ?>" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="faq comm-p-t-b">
            <div class="container">
                <div class="row">
                    <!-- FAQ RIGHT SIDE CONTENT-->
                    <div class="col-lg-6 col-md-12">
                        <h2>Faq</h2>
                        <div class="faq-rhs">
                            <ul>
                                <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <h3><?php echo $faqs->title; ?></h3>
                                        <?php echo $faqs->details; ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>

                    <!-- FAQ LEFT SIDE IMG-->
                    <div class="col-lg-6 col-md-12">
                        <h2>Contact</h2>
                        <div class>
                            <form action="<?php echo e(route('home.contactinsert')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="contact-input">
                                    <ul>
                                        <li>
                                            <input type="text" name="full_name" placeholder="Full Name">
                                        </li>
                                        <li class="mobile-input">
                                            <input type="text" name="mobile" placeholder="Mobile">
                                            <button class="get-otp-button">Get OTP</button>
                                        </li>

                                        <li>
                                            <input type="text" name="email" style="margin-left: 10px;"
                                                placeholder="Email *">
                                        </li>

                                        <li>
                                            <input type="text" name="city" placeholder="City/District Name *">
                                        </li>

                                        <li>
                                            <input type="text" name="reason_contact" placeholder="Reason to contact">
                                        </li>

                                        <li>
                                            <input type="text" name="message" placeholder="Your message here">
                                        </li>
                                        <li><input class="sub bg-success" type="submit" value="Submit"></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- FAQ RIGHT SIDE CONTENT END-->
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lkaj6m2w9cvv/public_html/resources/views/website/contact.blade.php ENDPATH**/ ?>