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
            <div class="row tex-center">
                <div class="col-lg-3 col-md-12">
                </div>
                <div class="col-lg-6 col-md-12">
                    <h2>Contact</h2>
                    <div class>
                        <form action="<?php echo e(route('home.contactinsert')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="contact-input">
                                <ul>
                                    <li>
                                        <input type="text"  required value="<?php echo e(old('full_name')); ?>" name="full_name" placeholder="Enter Full Name*">
                                        <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </li>
                                    <li class="mobile-input">
                                        <input type="number" class="get-otp-mobile" required value="<?php echo e(old('mobile')); ?>" name="mobile" placeholder="Mobile">
                                        <!-- <button class="get-otp-button" onclick="sendOtpContact('contact','otp_verify')">Get OTP</button>
                                        -->
                                    </li>
                             
                                    <!-- <li>
                                        <input type="text"  required value="<?php echo e(old('otp_verify')); ?>" name="otp_verify" style="margin-left: 10px;" placeholder="Enter Otp Received">
                                      
                                        <?php $__errorArgs = ['otp_verify'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </li> -->
                                    <li style="margin-left: 10px;">
                                        <input type="text"  required value="<?php echo e(old('email')); ?>" name="email" placeholder="Email *">
                                     
                                    </li>
                                    <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> 
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <li>
                                        <input type="text"  required value="<?php echo e(old('city')); ?>" name="city" placeholder="City/District Name *">
                                        <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </li>
                                    <li>
                                       
                                        <select style="background-color:#f0f4ff;border:0px;" class="form-control" required value="<?php echo e(old('reason_contact')); ?>" id="reason_contact" name="reason_contact" onchange="get_other_reason()">
                                            <option value="">Select Reason to Contact</option>
                                            <option value="Student's Application Related Issue">Student's Application Related Issue</option>
                                            <option value="Student's Admit Card Related Issue">Student's Admit Card Related Issue</option>
                                            <option value="Student's Result Related Issue">Student's Result Related Issue</option>
                                            <option value="Institutional Enquiry / Signup">Institutional Enquiry / Signup</option>
                                            <option value="Institutional Login Issue">Institutional Login Issue</option>
                                            <option value="Other Issues">Other Issues</option>
                                        </select>
                                        <?php $__errorArgs = ['reason_contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </li>
                                    <li style="display:none;" id="otherdd">
                                        <input type="text" id="subjectres"   value="<?php echo e(old('subjectres')); ?>" name="subjectres" placeholder="Explain other issue *" style="height:40px;background-color:white;" >
                                        <?php $__errorArgs = ['subjectres'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </li>
                                    <li>
                                        <input type="text"  required value="<?php echo e(old('message')); ?>" name="message" placeholder="Your message here" style="height:80px;">
                                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </li>
                                    <li style="padding:0px "><input class="sub bg-primary btn-sm" style="width:100px;height:40px;border-radius:5px;padding:0px;" type="submit" value="Submit"></li>
                                </ul>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- FAQ RIGHT SIDE CONTENT END-->
                <div class="col-lg-3 col-md-12">
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

    <script>
        function get_other_reason(){
            
            var reason_contact = $("#reason_contact").val();
            if(reason_contact == "Other Issues"){
                $("#otherdd").show();
            }else{
                $("#otherdd").hide();

            }

        }
    
    </script>
<?php echo $__env->make('layouts.website', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/website/contact.blade.php ENDPATH**/ ?>