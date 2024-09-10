<!doctype html>
<html lang="en">

<head>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#76cef1" />
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!-- SEO TITLE AND DESCRIPTIONS -->
    <title>Welcome to Carrier Without Barrier</title>
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="<?php echo e(asset('website/assets/images/fav-icon.png')); ?>" type="image/x-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&amp;family=Pacifico&amp;family=Poppins:wght@300;400;500;600&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap v5.0.2 css -->
    <link rel="stylesheet" href="<?php echo e(asset('website/assets/css/bootstrap.min.css')); ?>">
    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('website/assets/css/font-awesome.min.css')); ?>">
    <!-- MAIN TEMPLATE CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('website/assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('website/assets/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/slick.css')); ?>">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo e(asset('website/assets/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('website/assets/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('website/assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('website/assets/js/mail.js')); ?>"></script>
    <script src="<?php echo e(asset('website/assets/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('js/common.js')); ?>"></script>

    <script src="<?php echo e(asset('js/slick.min.js')); ?>"></script>


    <!-- <script src="assets/js/marquee.jquery.json"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <style>
        .carousel-control-next,
        .carousel-control-prev {
            background-color: rgba(0, 0, 0, 0.3) !important;
            width: 25px !important;
            height: 25px !important;
        }
        .great-contributor .carousel-control-next i,
        .great-contributor .carousel-control-prev i {
            width: 16px !important;
            height: 16px !important;
        }

        label {
            font-size: 13px
        }

        .toast-top-center-below {
            top: 20px;
            right: 40%;
            height: 100px;
        }

        .toast-top-center-below .toast-error {
            min-height: 70px;
            opacity: 5 !important;
            font-size: 20px
        }

        .toast-login-center-below {
            top: 20px;
            right: 10%;
            height: 100px;
        }

        .toast-login-center-below .toast-error {
            min-height: 70px;
            opacity: 5 !important;
            font-size: 20px
        }
    </style>
</head>
<?php

use App\Models\EProspectusModel;
use App\Models\TermsCondition;
use App\Models\PrivacyPolicy;

$prospectus = EProspectusModel::where('status', 1)->orderBy('updated_at')->first();
?>

<body class="conact-page">
    <!-- START PRELOAD -->
    <div id="preloader" style="opacity: .5;">
        <div class="plod"><span>&nbsp;</span><span>&nbsp;</span></div>
    </div>
    <!--SECTION: TOP NAV-->
    <section>
        <div class="nav">
            <div class="container">
                <div class="row">
                    <!-- SECTION: TOP NAV LEFT SIDE -->
                    <div class="col-lg-7 col-md-7 col-sm-4 col-4 nav-lhs d-none">
                        <ul>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#instituteModel" style="background-color: red;padding: 11px;color: white;font-size: larger;"> Institute
                                    Enquiry</a>
                            </li>

                        </ul>
                    </div>
                    <!-- SECTION: TOP NAV RIGH SIDE SOCIAL MEDIA ICONS $ BOOKING BUTTON -->
                    <div class="ml-md-auto col-12 col-sm-8 col-md-5 col-lg-5 nav-lhs nav-rhs">
                        <ul>
                            <li>
                                <?php if($prospectus?->e_prospectus): ?>
                                <a target="_blank" href="<?php echo e(asset('home/eprospectus/'.$prospectus?->e_prospectus)); ?>">E-Prospectus
                                    <i class="fa fa-download ml-2 float-right" aria-hidden="true"></i>
                                </a>
                                <?php endif; ?>
                            </li>
                            <?php if(auth()->guard('student')->check()): ?>
                            <li>
                                <a class="login-btn-border" href="<?php echo e(route('studentDashboard')); ?>">
                                    <?php echo e(Auth::guard('student')->user()->name); ?>

                                    <span class="fa fa-long-arrow-right" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a class="book-btn login-btn-border" href="<?php echo e(route('student.logout')); ?>">Logout<span class="fa fa-long-arrow-right" aria-hidden="true"></span></a>
                            </li>
                            <?php else: ?>
                            <li><a class="book-btn login-btn-border" href="#" data-toggle="modal" data-target="#myModalLogin">Login<span class="fa fa-long-arrow-right" aria-hidden="true"></span></a></li>
                            <li><a class="book-btn" href="#" data-toggle="modal" data-target="#myModalSignUp">Sign Up<span class="fa fa-long-arrow-right" aria-hidden="true"></span></a></li>
                            <?php endif; ?>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--SECTION: TOP MENU-->
    <section>
        <div class="menu-head">
            <div class="container">
                <div class="row">
                    <div class="menu-top">
                        <!-- MENU BOOK -->
                        <div class="menu-book"> <i class="fa fa-bars" aria-hidden="true"></i> </div>
                        <!--TOP MENU LOGO-->
                        <div class="col-lg-2 col-md-12 menu-top1">
                            <div class="logo"> <a href="#"><img src="<?php echo e(asset('website/assets/images/brand/logo.png')); ?>" alt="logo"></a>
                            </div>
                        </div>
                        <!--TOP MENU LIST-->
                        <div class="col-lg-8 col-md-4 menu-top2">
                            <div class="menu">
                                <ul>
                                    <!-- MOBILE BOOK NOW BUTTON(SHOW ONLY ON MOBILE VIEW) -->
                                    <!-- <li><a href="#" data-toggle="modal" data-target="#myModal">book now</a></li> -->
                                    <!--END MOBILE BOOK NOW BUTTON-->
                                    <!-- <li> <a class="act" href="index.html">Home</a> -->
                                    <li> <a class="act" href="<?php echo e(route('home.front')); ?>"><i class="fa fa-home home-icon" aria-hidden="true"></i></a>
                                    </li>
                                    <!--ADD SUB MENU-->
                                    <li class="add-menu">
                                        <a href="<?php echo e(route('home.aboutus')); ?>">About Us </a>
                                        <!-- <div class="sub-menu">
                                            <ul>
                                                <li>
                                                    <a href="#">About Us</a>
                                                </li>
                                                <li>
                                                    <a href="#">Preparation for</a>
                                                </li>
                                                <li>
                                                    <a href="#">Scholarship</a>
                                                </li>
                                                <li>
                                                    <a href="#">Contact Us</a>
                                                </li>
                                            </ul>
                                        </div> -->
                                    </li>
                                    <!--ADD SUB MENU END-->
                                    <li> <a href="<?php echo e(route('home.preparation')); ?>">Preparation for</a></li>

                                    <li> <a href="<?php echo e(route('home.scholarship')); ?>">Scholarship</a></li>
                                    <li> <a href="<?php echo e(route('home.contact')); ?>">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--TOP SEARCH BAR-->

                        <div class="col-lg-2 col-md-4 menu-top3">
                            <div class="click-sid-bar">
                                <!--CLICK ICONS-->
                                <div class="cl-func">
                                    <span class="fa fa-search ml-auto" aria-hidden="true"></span>
                                    <!-- <a href="#">
                                        <button type="button" class="btn btn-outline-primary btn-apply-now">Apply
                                            Now</button></a> -->
                                </div>
                                <!--TOP SEARCH BAR AND CATEGORIES-->
                                <div class="top-cl-fun">
                                    <!-- <div class="top-click-1">
                                        <h3>Select country</h3>
                                        <div class="all-cate">
                                            <ul>
                                                <li>
                                                    <a href="#">Australia</a>
                                                </li>
                                                <li>
                                                    <a href="#">Europe</a>
                                                </li>
                                                <li>
                                                    <a href="#">American </a>
                                                </li>
                                                <li>
                                                    <a href="#">china</a>
                                                </li>
                                                <li>
                                                    <a href="#">Africa</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div> -->


                                    <!--TOP SEARCH BAR AND SUBMIT BUTTON-->
                                    <input type="text" placeholder="Search...">
                                    <button type="submit" class="sub-button">
                                        <img src="<?php echo e(asset('website/assets/images/icons/6.png')); ?>" alt="">
                                    </button>
                                    <span class="fa fa-times" aria-hidden="true"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--TOP HEADER RIGHT SIDE BAR-->
    <section>
        <div class="side-bar">
            <!--TOP HEADER RIGHT SIDE BAR IMG-->
            <div class="side-bar-im">
                <a href="#"><img src="<?php echo e(asset('website/assets/images/icons/logo1.png')); ?>" alt=""></a>
                <h3>About</h3>
                <p>The argument in favor of using filler text goes something like this: If you use arey real content in
                    the Consulting Process anytime you reachtent.</p>
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            <!--TOP HEADER RIGHT BAR CONTENT-->
            <div class="side-bar-blg-post">
                <h3>Latest news</h3>
                <ul>
                    <li>
                        <img src="<?php echo e(asset('website/assets/images/team/4.jpg')); ?>" alt="">
                        <div class="side-bar-content">
                            <h4>We Provide Most Exclusive </h4>
                            <span>Lorem ipsum dolor..</span>
                        </div>
                    </li>
                    <li>
                        <img src="<?php echo e(asset('website/assets/images/team/2.jpg')); ?>" alt="">
                        <div class="side-bar-content">
                            <h4>We Are Specialist For Many</h4>
                            <span>Lorem ipsum dolor..</span>
                        </div>

                    </li>
                    <li>
                        <img src="<?php echo e(asset('website/assets/images/team/1.jpg')); ?>" alt="">
                        <div class="side-bar-content">
                            <h4>How to have the best Agency</h4>
                            <span>Lorem ipsum dolor..</span>
                        </div>
                    </li>
                </ul>
            </div>
            <!--TOP HEADER RIGHT BAR DEATILES AND ICONS-->
            <div class="side-panel-con">
                <h3>Contact info</h3>
                <ul>
                    <li>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>Zirakpur,Punjab</span>
                    </li>
                    <li>
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <span>vishal@ppnsolutions.com</span>
                    </li>
                    <li>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>(+91)-9155494233</span>
                    </li>
                </ul>
                <a href="#" data-toggle="modal" data-target="#myModal">Quick Booking</a>
            </div>
        </div>
    </section>
    <?php echo $__env->yieldContent('content'); ?>
    <?php if(isset( $slot)): ?>
    <?php echo e($slot); ?>

    <?php endif; ?>


    <section class="">
        <div class="footer comm-p-t-b">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                        <div class="logo h-100 d-flex flex-column justify-content-between">
                            <a href="/"><img src="<?php echo e(asset('logos/logo-square.png')); ?>" alt="logo"></a>
                            <p style="font-size: 80%;" class="mt-4 text-lowercase">
                                <a href="https://www.sqsfoundation.com" class="text-white"><i class="fa fa-globe"></i>&nbsp;&nbsp;www.sqsfoundation.com</a><br />
                                <a href="mailto:info@sqsfoundation.com" class="text-white"><i class="fa fa-envelope"></i>&nbsp;&nbsp;info@sqsfoundation.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                        <div class="features-foter">
                            <h2>Direct get in touch</h2>
                            <h6>Application & Admit card Related:</h6>

                            <p class="mb-3">Phone No: 9336171302 <br />
                                Email: <?php echo e(strtolower('query@careerwithoutbarrier.com')); ?></p>
                            <h6>Results & Admit Card Related:</h6>
                            <p class="mb-3">Phone No: 9389696641 <br />
                                Email: <?php echo e(strtolower('support@careerwithoutbarrier.com')); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                        <div class="features-foter">
                            <h2>Exam & Tech Agency</h2>
                            <h6>Weblies Equations Private Limited</h6>
                            <p class="mb-3">
                                Email: webliesequations@gmail.com<br />
                                Phone No: 9335334045
                            </p>
                            <h6>Test & Notes:</h6>
                            <p class="mb-3">Website: Testandnotes.com<br />
                                Email: Query@testandnotes.com<br />
                                Phone No: 9335334045</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                        <?php

                        $termsCondition = TermsCondition::where([['status', 1], ['type', 'website'], ['page_name', 'terms-and-condition']])->first();

                        $institudeTermsCondition = TermsCondition::where([['status', 1], ['type', 'institute'], ['page_name', 'terms-and-condition']])->first();

                        $privacy_policy = TermsCondition::where([['status', 1], ['type', 'website'], ['page_name', 'privacy-policy']])->first();

                        $privacy_policy_cond = TermsCondition::where([['status', 1], ['type', 'website'], ['page_name', 'privacy-policy']])->first();

                        $imp_link = TermsCondition::where([['status', 1], ['type', 'website'], ['page_name', 'important-links']])->first();

                        //$privacy_policy_cond = TermsCondition::where([['status',1],['type','website'],['page_name','privacy-policy']])->first();


                        ?>
                        <div class="features-foter">
                            <h2>Important Link</h2>
                            <p><a data-toggle="modal" data-target="#instituteModel" href="javascipt:void(0)">Institutional Enquiry</a></p>
                            <p><a href="<?php echo e($imp_link ? asset('home/'.$imp_link->terms_condition_pdf) : 'javascipt:void(0)'); ?>" target="<?php echo e($imp_link ? '_blank' : '_self'); ?>">Important Links</a></p>
                            <!--<p><a href="javascipt:void(0)">Downloads</a></p>-->
                            <p><a href="<?php echo e($privacy_policy ? asset('home/'.$privacy_policy->terms_condition_pdf) : 'javascipt:void(0)'); ?>" target="<?php echo e($termsCondition ? '_blank' : '_self'); ?>">Website Privacy Policy</a></p>
                            <p><a href="<?php echo e($termsCondition ? asset('home/'.$termsCondition->terms_condition_pdf) : 'javascipt:void(0)'); ?>" target="<?php echo e($termsCondition ? '_blank' : '_self'); ?>">Website Terms & Conditions</a>
                            </p>
                            <p><a href="<?php echo e(URL::to('/faq')); ?>">Faq</a></p>
                            <p><a href="<?php echo e(route('freeform')); ?>" style="color:white;">Get 100% Free Form (Limited)</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SECTION: COPY RIGHT -->
    <section>
        <div class="cpy-right">
            <a><img src="<?php echo e(asset('logos/weblies-logo.png')); ?>" class="mx-auto" style="max-width:350px;" alt="Weblies equations private limited"></a>
        </div>
    </section>

    <!-- SECTION: GO TO TOP -->
    <section>
        <div class="go-to-top">
            <a href="#">
                <span>Top</span>
                <i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
        </div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#getOtpBtn').click(function() {
                $(this).attr('disabled', true);
                $('#preloader').show();
                var email = $('#email').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "<?php echo e(route('home.sendMail')); ?>",
                    method: "POST",
                    data: {
                        'email': email
                    },
                    success: function(response) {
                        console.log(response);
                        success(response.message);
                        $('#getOtpBtn').attr('disabled', false);
                        $('#preloader').hide();

                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.error(xhr.responseText);
                        errors(xhr.responseText);
                        $('#getOtpBtn').attr('disabled', false);
                        $('#preloader').hide();

                    }
                });
            });
        });
    </script>

    
    <div id="applynow" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- SECTION: POP UP TRAVEL BOOKING FORM AND IMG -->
                <div class="pop-up" style="padding-bottom:35px">
                    <!--POP UP TRAVEL BOOKING FORM DEATILES-->
                    <form action="<?php echo e(route('home.corporateSubmit')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="pop-up3">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 class="book-tit">Scholarship Form</h2>
                            <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                            <?php endif; ?>
                            <div class="books-now">
                                <div class="contact__msg">Thank you.</div>
                                <ul>
                                    <li class="full">
                                        <input type="text" name="name" placeholder="Applicant’s Name" class="form-control" required>
                                    </li>
                                    <li class="full">
                                        <input type="text" name="institute_name" placeholder="Father’s/ Mother’s Name" class="form-control" required>
                                    </li>

                                    <li class="half">
                                        <input type="date" name="email" placeholder="DOB" class="form-control" required>
                                    </li>

                                    <li class="half">
                                        <input type="radio" name="email" placeholder="Gender" required style="width: 15px;height:15px">
                                        Male &nbsp;
                                        <input type="radio" name="email" placeholder="Gender" required style="width: 15px;height:15px">
                                        FeMale
                                    </li>
                                    <li class="full">
                                        <label for="Person with Disability">Person with Disability</label>
                                    </li>
                                    <li class="half">
                                        <input type="radio" name="email" placeholder="Gender" required style="width: 15px;height:15px"> Yes &nbsp;
                                        <input type="radio" name="email" placeholder="Gender" required style="width: 15px;height:15px"> No &nbsp;
                                    </li>

                                    <li class="full">
                                        <input type="text" name="email" placeholder="Addres City" class="form-control" required>
                                    </li>

                                    <li class="full">
                                        <Select class="form-control">
                                            <option value="">Qualifications</option>
                                        </Select>
                                    </li>

                                    <li class="full">
                                        <label for="">You want to Participate in Exams</label>
                                    </li>

                                    <li class="full">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <select class="form-control">
                                                    <option value="">Exam 1</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <select class="form-control">
                                                    <option value="">Exam 1</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <select class="form-control">
                                                    <option value="">Exam 1</option>
                                                </select>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="full">
                                        <label for="">Choice of test centre</label>
                                    </li>

                                    <li class="full">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <select class="form-control">
                                                    <option value="">Exam 1</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <select class="form-control">
                                                    <option value="">Exam 1</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <select class="form-control">
                                                    <option value="">Exam 1</option>
                                                </select>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="full">
                                        <label for="">Did you participate in any Govt/ Competitive
                                            Exam(s)</label>
                                    </li>

                                    <li class="full">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <select class="form-control">
                                                    <option value="">Exam 1</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <select class="form-control">
                                                    <option value="">Exam 1</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-4">
                                                <select class="form-control">
                                                    <option value="">Exam 1</option>
                                                </select>
                                            </div>
                                        </div>
                                    </li>


                                    <li class="full">
                                        <label for="" style="font-weight: bold">If Previously Apply For This
                                            Scholarship</label>
                                    </li>

                                    <li class="half">
                                        <div class="form-group">
                                            <select name="" class="form-control">
                                                <option value="">Year</option>
                                            </select>
                                        </div>
                                    </li>

                                    <li class="half">
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control" placeholder="Roll No">
                                        </div>
                                    </li>

                                    <li class="half">
                                        <div class="form-group">
                                            <select name="" class="form-control">
                                                <option value="">Family Income</option>
                                            </select>
                                        </div>
                                    </li>

                                    <li class="half">
                                        <div class="form-group">
                                            <select name="" class="form-control">
                                                <option value="">Guardian Occupation</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="full" style="font-size: 13px;display:flex">
                                        <input type="checkbox" style="width: 20px;height:20px" name="privacy_policy" required> &nbsp;
                                        I agree for career without barrier’s Terms & Conditions
                                    </li>
                                    <li class="full">
                                        <input type="submit" name="submit" value="Submit">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- SECTION: POP UP END -->
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="instituteModel" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- SECTION: POP UP TRAVEL BOOKING FORM AND IMG -->

                <div class="pop-up" style="padding-bottom:35px">
                    <!--POP UP TRAVEL BOOKING FORM DEATILES-->
                    <form action="<?php echo e(route('home.corporateSubmit')); ?>" method="POST" enctype="multipart/form-data" id="corporateForm">
                        <?php echo csrf_field(); ?>
                        <div class="pop-up3">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 class="book-tit">New Corporate Enquiry</h2>
                            <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                            <?php endif; ?>

                            <div id="errorMessages" class="text-danger">
                            </div>
                            <div class="books-now">
                                <div class="contact__msg">Thank you.</div>
                                <ul>
                                    <li class="full">
                                        <input type="text" name="name" id='name' placeholder="Your Name" class="form-control" required>
                                    </li>
                                    <li class="full">
                                        <input type="text" name="institute_name" placeholder="Institute/School/Brand Name" class="form-control" required>
                                    </li>
                                    <li class="full">
                                        <select class="form-control" name="type_institution" id="type_institution">
                                            <option value="">Type of Institution</option>
                                            <option value="Coaching Institute">Coaching Institute</option>
                                            <option value="School (High School)">School (High School)</option>
                                            <option value="School (Intermediate School)">School (Intermediate School)</option>
                                            <option value="College (Degree College)">College (Degree College)</option>
                                            <option value="Society, Trust">Society/ Trust</option>
                                        </select>
                                    </li>
                                    <li class="half">
                                        <select class="form-control" name="interested_for" id="interested_for">
                                            <option value="">Interested for</option>
                                            <option value="Institute, School welfare program">Institute/ School welfare program</option>
                                            <option value="Student’s Scholarship Program">Student’s Scholarship Program</option>
                                            <option value="Society, Trust Welfare Program">Society/ Trust Welfare Program</option>
                                            <option value="Individual (Private Tuition) Welfare Program">Individual (Private Tuition) Welfare Program</option>
                                        </select>
                                    </li>
                                    <li class="half">
                                        <select class="form-control" name="established_year" id="established_year">
                                            <option value="">Established Year</option>
                                            <?php for($i = 2001; $i <= now()->year; $i++): ?>
                                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                <?php endfor; ?>
                                        </select>
                                    </li>

                                    <li class="half">
                                        <div class="input-group">
                                            <input type="number" name="phone" id="phone" placeholder="Mobile No *" class="form-control" required>
                                            <button class="btn bg-dark text-white append corporate_send_otp_btn" onclick="sendOtp('corporate','otp_send')" type="button" style="border-bottom-left-radius: 0;font-size: 14px;padding: 7px;border-top-left-radius: 0;">
                                                Get Otp
                                            </button>
                                        </div>
                                    </li>
                                    <li class="half">
                                        <div class="input-group">
                                            <input type="text" name="otp" placeholder="otp Number" id="corporate_otp" title="Please enter valid otp" class="form-control" required>
                                            <button class="btn bg-dark text-white append corporate_verify_otp_btn" onclick="sendOtp('corporate','otp_verify')" type="button" style="border-bottom-left-radius: 0;font-size: 14px;padding: 7px;border-top-left-radius: 0;">
                                                Verfiy Otp
                                            </button>
                                        </div>
                                    </li>
                                    <li class="full">
                                        <div class="input-with-button">
                                            <input type="email" name="email" id="email" placeholder="Email id *" class="form-control" required>
                                        </div>
                                    </li>

                                    <li class="full">
                                        <input type="text" name="address" id="address" placeholder="Address" class="form-control" required>
                                    </li>
                                    <li class="half">
                                        <input type="text" name="city" id="city" placeholder="City *" class="form-control" required>
                                    </li>
                                    <li class="half">
                                        <input type="text" name="pincode" placeholder="Pincode" id="pincode" class="form-control" required>
                                    </li>
                                    <li class="half">
                                        <label for="attachment">Person Image <small>JPEG/JPG/PNG</small></label>
                                        <input type="file" name="attachment" id="attachment" onchange="validateImage(this)" class="form-control">
                                    </li>
                                    <li class="half">
                                        <label for="attachment">Institude Image<small>JPEG/JPG/PNG/PDF</small></label>
                                        <input type="file" name="attachment_profile" id="attachment_profile" class="form-control" onchange="validateImage(this,'imagepdf')">
                                    </li>
                                    <li class="full" style="font-size: 13px;display:flex">
                                        <input type="checkbox" style="width: 20px;height:20px" name="privacy_policy" id="privacy_policy" required> &nbsp; I accept the &nbsp;
                                        <?php if($institudeTermsCondition): ?> <a style="text-decoration: underline;" href="<?php echo e(asset('home/'.$institudeTermsCondition->terms_condition_pdf)); ?>" target="_blank"> Terms & Conditions </a><?php endif; ?>

                                    </li>
                                    <li class="full">
                                        <input type="submit" name="submit" id="submitInstitude" value="Submit">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- SECTION: POP UP END -->

        </div>
    </div>

    
    <div id="myModalLogin" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- SECTION: POP UP TRAVEL BOOKING FORM AND IMG -->
                <div class="pop-up">
                    <!--POP UP IMG-->
                    <div class="pop-up1">
                        <img class="pop-im" src="https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg" alt="">
                    </div>
                    <!--POP UP TRAVEL BOOKING FORM DEATILES-->
                    <div class="pop-up2" style="padding: 23px 27px 0px 30px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="book-tit">Login</h2>
                        <p>wherever you go make your self at home</p>
                        <div class="book-now">
                            <form id="loginForm" method="post" action="<?php echo e(route('studentlogin')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="contact__msg">Thank you.</div>
                                <ul>
                                    <li class="full"> <label for="mobile">Mobile<span class="text-danger">*</span></label>
                                        <input type="text" pattern="[6-9]{1}[0-9]{9}" name="mobile" placeholder="Mobile Number" title="Please enter valid mobile" class="form-control" required>
                                        <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </li>

                                    <li class="full"> <label> Password<span class="text-danger">*</span></label>
                                        <input type="password" name="password" placeholder="Password *" class="form-control" required>
                                        <i toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </li>
                                    
                                    <li class="full">
                                        <a href="#" id="myModalForgetbtn" data-toggle="modal" data-target="#myModalForget">Forgot Password</a>
                                    </li>
                                    <li class="full">
                                        <input type="submit" id="loginBtn" name="loginsubmit" value="Login">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- SECTION: POP UP END -->
            </div>
        </div>
    </div>

    <!-- Forget Password Start -->

    <div id="myModalForget" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- SECTION: POP UP TRAVEL BOOKING FORM AND IMG -->
                <div class="pop-up">
                    <!--POP UP IMG-->
                    <div class="pop-up1">
                        <img class="pop-im" src="https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg" alt="">
                    </div>
                    <!--POP UP TRAVEL BOOKING FORM DEATILES-->
                    <div class="pop-up2" style="padding: 23px 27px 0px 30px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="book-tit">Forget Password</h2>
                        <p>wherever you go make your self at home</p>
                        <div class="book-now">
                            <form id="forgetForm" method="post" action="#">
                                <?php echo csrf_field(); ?>
                                <div class="contact__msg">Thank you.</div>
                                <ul>
                                    <li class="full forgetmobiledn"> <span style="display: flex;"> Mobile <validation class="text-danger">*</validation></span>
                                        <div class="input-group">
                                            <input type="text" pattern="[6-9]{1}[0-9]{9}" name="mobile" placeholder="Mobile Number" id="forget_mobile" title="Please enter valid mobile" class="form-control" required>
                                            <button class="btn bg-dark text-white append forget_send_otp_btn" onclick="sendOtp('forgetPassword','otp_send')" type="button" style="border-bottom-left-radius: 0;font-size: 14px;padding: 7px;border-top-left-radius: 0;">
                                                Get Otp
                                            </button>
                                        </div>
                                    </li>
                                    <li class="full forgetmobiledn">
                                        <span style="display: flex;">Verify Otp <validation class="text-danger">*</validation></span>
                                        <div class="input-group">
                                            <input type="text" name="otp" placeholder="otp Number" id="forget_otp" title="Please enter valid otp" class="form-control" required>
                                            <button class="btn bg-dark text-white append forget_verify_otp_btn" onclick="sendOtp('forgetPassword','otp_verify')" type="button" style="border-bottom-left-radius: 0;font-size: 14px;padding: 7px;border-top-left-radius: 0;">
                                                Verfiy Otp
                                            </button>
                                        </div>
                                    </li>

                                    <li class="full newpasswordn" style="display: none;">
                                        <label class="forn-control" style="font-weight: 600;">New Password<span class="text-danger">*</span></label>
                                        <input type="new_password" id="new_password" name="new_password" placeholder="New Password *" class="form-control" required>
                                        <i toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                                        <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </li>
                                    <li class="full newpasswordn" style="display: none;"> <label style="font-weight: 600;" class="forn-control">Confirm New Password<span class="text-danger">*</span></label>
                                        <input type="confirm_password" id="confirm_Password" name="confirm_password" placeholder="confirm_Password *" class="form-control" required>
                                        <i toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                                        <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </li>
                                    <li class="full">
                                        <input type="submit" id="forgetBtn" style="padding: 0px !important;" name="forgetSubmit" value="forget">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- SECTION: POP UP END -->
            </div>
        </div>
    </div>

    <!-- Forget Password End -->
    
    <div id="myModalSignUp" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- SECTION: POP UP TRAVEL BOOKING FORM AND IMG -->
                <div class="pop-up">
                    <!--POP UP IMG-->
                    <div class="pop-up1">
                        <img class="pop-im" src="https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg" alt="">
                    </div>
                    <!--POP UP TRAVEL BOOKING FORM DEATILES-->
                    <div class="pop-up2">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="book-tit">SignUp</h2>
                        <p>wherever you go make your self at home</p>
                        <div class="book-now">
                            <form id="studentSignup" method="post" action="<?php echo e(route('studentSignup')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="contact__msg">Thank you.</div>
                                <ul>
                                    <li class="half"> <span style="display: flex;">Name<validation class="text-danger">*</validation> </span>
                                        <input type="text" name="name" placeholder="Name" title="Please enter valid Name" class="form-control" required>
                                    </li>
                                    <li class="half"> <span>Gender </span>
                                        <select name="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">FeMale</option>
                                            <option value="Transgender">Transgender</option>
                                        </select>
                                    </li>
                                    <li class="half"> <span style="display: flex;"> Mobile <validation class="text-danger">*</validation></span>
                                        <div class="input-group">
                                            <input type="text" pattern="[6-9]{1}[0-9]{9}" name="mobile" placeholder="Mobile Number" id="student_mobile" title="Please enter valid mobile" class="form-control" required>
                                            <button class="btn bg-dark text-white append student_send_otp_btn" onclick="sendOtp('register','otp_send')" type="button" style="border-bottom-left-radius: 0;font-size: 14px;padding: 7px;border-top-left-radius: 0;">
                                                Get Otp
                                            </button>
                                        </div>
                                    </li>
                                    <li class="half"> <span style="display: flex;">Verify Otp <validation class="text-danger">*</validation></span>
                                        <div class="input-group">
                                            <input type="text" name="otp" placeholder="otp Number" id="student_otp" title="Please enter valid otp" class="form-control" required>
                                            <button class="btn bg-dark text-white append student_verify_otp_btn" onclick="sendOtp('register','otp_verify')" type="button" style="border-bottom-left-radius: 0;font-size: 14px;padding: 7px;border-top-left-radius: 0;">
                                                Verfiy Otp
                                            </button>
                                        </div>
                                    </li>
                                    <!--POP UP EMAIL ADDTESS-->
                                    <li class="full"> <span style="display: flex;">Email ID<validation class="text-danger">*</validation> </span>
                                        <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" placeholder="Email id *" title="Please enter valid email id" class="form-control" required>
                                    </li>

                                    <!--POP UP PHONE-->
                                    <li class="half"> <span> Password<validation class="text-danger">*</validation></span>
                                        <input type="password" name="password" placeholder="Password *" class="form-control" required>
                                        <i toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                                    </li>
                                    <li class="half"> <span style="display: flex;">Confirm Password<validation class="text-danger">*</validation></span>
                                        <input type="password" name="confirmpassword" placeholder="Confirm Password *" class="form-control" required>
                                        <i toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                                    </li>

                                    <div class="form-group" style="padding:10px;width: 50%; ">
                                        <span>Person Disability</span>
                                        <input type="radio" name="disability" value="Yes"> Yes
                                        &nbsp; <input type="radio" checked="checked" name="disability" value="No"> No &nbsp;

                                    </div>

                                    <div class="form-group" style="padding:10px;width: 100%; ">

                                        <?php ($institudeTermsCondition = DB::table('terms_conditions')->where([['status',1],['type','student'],['page_name','terms-and-condition']])->first()); ?>
                                        <input type="checkbox" style="width: 20px;height:20px" name="privacy_policy" id="privacy_policy" required> &nbsp; I accept the &nbsp;
                                        <?php if($institudeTermsCondition): ?> <a style="text-decoration: underline;" href="<?php echo e(asset('home/'.$institudeTermsCondition->terms_condition_pdf)); ?>" target="_blank"> Terms & Conditions </a><?php endif; ?>


                                    </div>

                                    <li class="full">
                                        <input type="submit" name="submit" id="studentRegister" value="Register">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- SECTION: POP UP END -->
            </div>
        </div>
    </div>
    

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- SECTION: POP UP TRAVEL BOOKING FORM AND IMG -->
                <div class="pop-up">
                    <!--POP UP IMG-->
                    <div class="pop-up1">
                        <img class="pop-im" src="https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg" alt="">
                    </div>
                    <!--POP UP TRAVEL BOOKING FORM DEATILES-->
                    <div class="pop-up2">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="book-tit">Login</h2>
                        <p>wherever you go make your self at home</p>
                        <div class="book-now">
                            <form class="contact__form" method="post" action="#">
                                <div class="contact__msg">Thank you.</div>
                                <ul>
                                    <!--POP UP EMAIL ADDTESS-->
                                    <li class="half"> <span>Email Address </span>
                                        <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" placeholder="Email id *" title="Please enter valid email id" class="form-control" required>
                                    </li>
                                    <!--POP UP PHONE-->
                                    <li class="half"> <span> Password</span>
                                        <input type="text" name="phone" placeholder="Phone *" class="form-control" required>
                                        <i toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                                    </li>
                                    <li class="full">
                                        <input type="submit" name="submit" value="Login">
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- SECTION: POP UP END -->
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <script src="<?php echo e(asset('website/assets/js/jquery.marquee.min.js')); ?>"></script>
    <script>
        $(function() {
            var $mwo = $('.marquee-with-options');
            $('.marquee').marquee({
                speed: 60,
                duplicated: true,
                pauseOnHover: true
            });
            $('.marquee-with-options').marquee({
                //speed in milliseconds of the marquee
                speed: 5000,
                //gap in pixels between the tickers
                gap: 50,
                //gap in pixels between the tickers
                delayBeforeStart: 0,
                //'left' or 'right'
                direction: 'top',
                //true or false - should the marquee be duplicated to show an effect of continues flow
                duplicated: true,
                //on hover pause the marquee - using jQuery plugin https://github.com/tobia/Pause
                pauseOnHover: true
            });

            //Direction upward
            $('.marquee-vert').marquee({
                direction: 'up',
                speed: 20,
                duplicated: true,
                pauseOnHover: true
            });

            //pause and resume links
            $('.pause').click(function(e) {
                e.preventDefault();
                $mwo.trigger('pause');
            });
            $('.resume').click(function(e) {
                e.preventDefault();
                $mwo.trigger('resume');
            });
            //toggle
            $('.toggle').hover(function(e) {
                    $mwo.trigger('pause');
                }, function() {
                    $mwo.trigger('resume');
                })
                .click(function(e) {
                    e.preventDefault();
                })
        });

        var counter = document.querySelectorAll(".counter")

        window.addEventListener("scroll", function() {
            counter.forEach(function(k, v) {

                var start = counter[v].getAttribute('data-count-start')
                var end = counter[v].getAttribute('data-count-end')
                var speed = counter[v].getAttribute('data-speed')

                setInterval(function() {
                    start++;
                    if (start > end) {
                        return false;
                    }
                    counter[v].innerText = start;

                }, speed)
            })

        }, false)
    </script>
    <script src="<?php echo e(asset('website/assets/js/jssor.slider-28.1.0.min.js')); ?>" type="text/javascript"></script>



    <script type="text/javascript">
        function success(msg) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-center-below",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.success(msg);
        }

        function errors(msg, customclass = '') {
            let positionClass = ''; // Default position class

            if (customclass !== '') {
                positionClass = customclass; // Use custom class if provided
            } else {
                positionClass = 'toast-top-center'; // Default position class if custom class is not provided
            }

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": positionClass,
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "2000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error(msg);
        }



        $(document).ready(function() {
            $('#loginBtn').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('studentlogin')); ?>",
                    method: 'post',
                    data: $('#loginForm').serialize(),
                    success: function(response) {
                        if (response.success) {
                            success("Login Successfully.", 'toast-login-center-below')
                            window.location.href = "<?php echo e(route('studentDashboard')); ?>";
                        } else {
                            errors("Invalid Login Credentials", 'toast-login-center-below')
                            // alert('Invalid Login Credentials');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred while processing your request.');
                    }
                });
            });

            $('#studentRegister').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('studentSignup')); ?>",
                    method: 'post',
                    data: $('#studentSignup').serialize(),
                    success: function(response) {
                        if (response.success) {
                            success(response.msg, 'toast-login-center-below')
                            setTimeout(() => {
                                window.location.href = "<?php echo e(route('studentDashboard')); ?>";
                            }, 1000);
                        } else {
                            errors(response.msg, 'toast-login-center-below')
                        }
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = '';
                        var errorsmsg = JSON.parse(xhr.responseText).errors;
                        for (var key in errorsmsg) {
                            if (errorsmsg.hasOwnProperty(key)) {
                                errorMessage += errorsmsg[key][0] + '<br>';
                            }
                        }
                        errors(errorMessage, 'toast-login-center-below')
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            function validateForm() {
                var isValid = true;
                $('#errorMessages').empty(); // Clear any existing error messages

                // Perform validation for each input field

                // Validate Name
                var name = $('#name').val();
                if (name === '') {
                    $('#errorMessages').append('<li>Name is required.</li>');
                    isValid = false;
                }

                var otp = $('#corporate_otp').val();
                if (otp === '') {
                    $('#errorMessages').append('<li>Otp is required.</li>');
                    isValid = false;
                }
                // Validate Institute/School/Brand Name
                var instituteName = $('#institute_name').val();
                if (instituteName === '') {
                    $('#errorMessages').append('<li>Institute/School/Brand Name is required.</li>');
                    isValid = false;
                }

                // Validate Type of Institution
                var typeInstitution = $('#type_institution').val();
                if (typeInstitution === '') {
                    $('#errorMessages').append('<li>Type of Institution is required.</li>');
                    isValid = false;
                }

                // Validate Interested For
                var interestedFor = $('#interested_for').val();
                if (interestedFor === '') {
                    $('#errorMessages').append('<li>Interested For is required.</li>');
                    isValid = false;
                }

                // Validate Established Year
                var establishedYear = $('#established_year').val();
                if (establishedYear === '') {
                    $('#errorMessages').append('<li>Established Year is required.</li>');
                    isValid = false;
                }

                // Validate Email
                var email = $('#email').val();
                if (email === '') {
                    $('#errorMessages').append('<li>Email is required.</li>');
                    isValid = false;
                } else if (!isValidEmail(email)) {
                    $('#errorMessages').append('<li>Invalid email format.</li>');
                    isValid = false;
                }

                // Validate Phone
                var phone = $('#phone').val();
                if (phone === '') {
                    $('#errorMessages').append('<li>Phone is required.</li>');
                    isValid = false;
                }

                // Validate OTP
                var otp = $('#otp').val();
                if (otp === '') {
                    $('#errorMessages').append('<li>OTP is required.</li>');
                    isValid = false;
                }

                // Validate Address
                var address = $('#address').val();
                if (address === '') {
                    $('#errorMessages').append('<li>Address is required.</li>');
                    isValid = false;
                }

                // Validate City
                var city = $('#city').val();
                if (city === '') {
                    $('#errorMessages').append('<li>City is required.</li>');
                    isValid = false;
                }

                // Validate Privacy Policy acceptance
                if (!$('#privacy_policy').prop('checked')) {
                    $('#errorMessages').append('<li>You must accept the Privacy Policy.</li>');
                    isValid = false;
                }

                // Validate Mobile Number (10 digits)
                var mobileNumber = $('#phone').val();
                if (mobileNumber === '') {
                    $('#errorMessages').append('<li>Mobile number is required.</li>');
                    isValid = false;
                } else if (!/^\d{10}$/.test(mobileNumber)) {
                    $('#errorMessages').append('<li>Mobile number must be 10 digits.</li>');
                    isValid = false;
                }

                // Validate Pincode (6 digits)
                var pincode = $('#pincode').val();
                if (pincode === '') {
                    $('#errorMessages').append('<li>Pincode is required.</li>');
                    isValid = false;
                } else if (!/^\d{6}$/.test(pincode)) {
                    $('#errorMessages').append('<li>Pincode must be 6 digits.</li>');
                    isValid = false;
                }

                // Validate Attachment (if provided)
                var attachment = $('#attachment').prop('files')[0];
                if (attachment && attachment.size > (2 * 1024 * 1024)) { // 2MB file size limit
                    $('#errorMessages').append('<li>Attachment size must be less than 2MB.</li>');
                    isValid = false;
                }

                return isValid;
            }
            $('#corporateForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submission
                if (validateForm()) {
                    $('#preloader').show();
                    var formData = new FormData(this); // Create FormData object to send form data
                    $.ajax({
                        url: $(this).attr('action'), // URL to submit the form
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.success) {
                                success(response.message)
                                $('#corporateForm')[0].reset();
                                $('#preloader').hide();
                            } else {
                                errors(response.message)
                                $('#preloader').hide();
                                return;
                            }

                            $('#instituteModel .close').click();
                        },
                        error: function(xhr, status, error) {
                            var errorMessage = '';
                            var errorsmsg = JSON.parse(xhr.responseText).errors;
                            for (var key in errorsmsg) {
                                if (errorsmsg.hasOwnProperty(key)) {
                                    errorMessage += errorsmsg[key][0] + '<br>';
                                }
                            }
                            console.log(errorsmsg);
                            $('#errorMessages').append('<li>' + errorMessage + '</li>');

                            $('#preloader').hide(1000);

                        }
                    });
                }

            });
            // Function to validate email format
            function isValidEmail(email) {
                var emailRegex = /\S+@\S+\.\S+/;
                return emailRegex.test(email);
            }

        });

        $('#forgetBtn').on('click', function(e) {
            e.preventDefault();
            var forget_mobile = $('#forget_mobile').val();
            var forget_otp = $('#forget_otp').val();
            var new_password = $('#new_password').val();
            var confirm_Password = $('#confirm_Password').val();

            $.ajax({
                url: "<?php echo e(route('student.forgetPassword')); ?>",
                method: 'post',
                data: {
                    'forget_mobile': forget_mobile,
                    'forget_otp': forget_otp,
                    'new_password': new_password,
                    'confirm_Password': confirm_Password,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status) {
                        success(response.message)
                        $('.newpasswordn').hide();
                        $('.forgetmobiledn').show();
                        $('#myModalForget').find('.close').trigger('click');
                    } else {
                        errors(response.message)
                    }
                },
                error: function(xhr, status, errorType) {
                    errors(xhr.responseText)
                }
            })
        })

        $('#myModalForgetbtn').on('click', function() {
            $('#myModalLogin').find('.close').trigger('click');
        })
    </script>
    <script src="<?php echo e(asset('website/assets/js/verifyregister.js')); ?>"></script>


    <?php echo $__env->yieldPushContent('custom-scripts'); ?>
    <?php if (isset($component)) { $__componentOriginal88b0e6813f5b80100a19437aa80e29ba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal88b0e6813f5b80100a19437aa80e29ba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.message','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88b0e6813f5b80100a19437aa80e29ba)): ?>
<?php $attributes = $__attributesOriginal88b0e6813f5b80100a19437aa80e29ba; ?>
<?php unset($__attributesOriginal88b0e6813f5b80100a19437aa80e29ba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b0e6813f5b80100a19437aa80e29ba)): ?>
<?php $component = $__componentOriginal88b0e6813f5b80100a19437aa80e29ba; ?>
<?php unset($__componentOriginal88b0e6813f5b80100a19437aa80e29ba); ?>
<?php endif; ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>

</html><?php /**PATH /mnt/01D9961CD1E189D0/BWS/CareerWithoutBarrier/career-without-barrier/resources/views/layouts/website.blade.php ENDPATH**/ ?>