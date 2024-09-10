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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo e(asset('website/assets/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('website/assets/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('website/assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('website/assets/js/mail.js')); ?>"></script>
    <script src="<?php echo e(asset('website/assets/js/custom.js')); ?>"></script>

    <!-- <script src="assets/js/marquee.jquery.json"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        label {
            font-size: 13px
        }
    </style>
</head>

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
                    <div class="col-lg-7 col-md-7 col-sm-4 col-4 nav-lhs">
                        <ul>
                            <li class="my_animation">
                                <a href="#" data-toggle="modal" data-target="#instituteModel"><i class="fa fa-question-circle" aria-hidden="true"></i> Institute
                                    Enquiry</a>
                            </li>

                        </ul>
                    </div>
                    <!-- SECTION: TOP NAV RIGH SIDE SOCIAL MEDIA ICONS $ BOOKING BUTTON -->
                    <div class="col-lg-5 col-md-5 col-sm-8 col-8 nav-lhs nav-rhs ml-auto">
                        <ul>
                            <li>
                                <a href="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf">E-Prospectus
                                    <i class="fa fa-download ml-2 float-right" aria-hidden="true"></i>
                                </a>
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
                                    <span class="fa fa-search mr-3" aria-hidden="true"></span>
                                    <a href="#">
                                        <button type="button" class="btn btn-outline-primary btn-apply-now">Apply
                                            Now</button></a>
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

    <div class="bottom-menu mt-5">
        <div class="container">
            <ul class="d-flex justify-content-center">
                <li><a href="javascipt:void(0)">Home</a></li>
                <li><a href="javascipt:void(0)">About Us</a></li>
                <li><a href="javascipt:void(0)">Preparation For</a></li>
                <li><a href="javascipt:void(0)">Scholarship</a></li>
                <li><a href="javascipt:void(0)">Contact Us</a></li>
            </ul>
            <div class="sqs-logo mt-4 mx-auto">
                <img class="img-fluid" src="<?php echo e(asset('website/assets/images/bottom-menu/sqs-logo.png')); ?>" alt="img">
            </div>
        </div>
    </div>

    <section>
        <div class="footer comm-p-t-b">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="features-foter">
                            <h2>Direct get in touch</h2>
                            <h6>Application & Admit card Related Query:</h6>
                            <p class="mb-3">86/245, Dev nagar, (Near police Station) Kanpur-208003, Uttar Pardesh,
                                India</p>
                            <p class="mb-3">Phone No: 9336171302 (Call & Whatsapp)<br />
                                Email: info@abcxyz.com</p>
                            <h6>Results & Admit Card Related Query:</h6>
                            <p class="mb-3">Phone No: 9389696641 (Call & Whatsapp)<br />
                                Email: info@abcxyz.com</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="features-foter">
                            <h2>Exam Agency & Tech Partner</h2>
                            <h6>Weblies Equations Private Limited</h6>
                            <p class="mb-3">6th Floor, Pentagon, P-2, Magarpatta, Hadapsar, Pune, Maharashtra 411013
                            </p>
                            <h6>Test & Notes:</h6>
                            <p class="mb-3">Website: Testandnotes.com<br />
                                Email: Query@testandnotes.com<br />
                                Phone No: 9335334045</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="features-foter">
                            <h2>Quick Contact Now</h2>
                            <form class="quick-contact-form" action="<?php echo e(route('home.contactPage')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="message" rows="3" placeholder="Message ..."></textarea>
                                </div>
                                <input type="submit" class="btn btn-outline-primary btn-apply-now" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SECTION: COPY RIGHT -->
    <section>
        <div class="cpy-right">
            <p>Copyrights@2024 SQS Foundation. All rights reserved.</p>
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
                <div class="pop-up">
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
                                        <input type="checkbox" style="width: 20px;height:20px" name="privacy_policy" required> &nbsp; I agree for career without barrier’s Terms & Conditions
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

                <div class="pop-up">
                    <!--POP UP TRAVEL BOOKING FORM DEATILES-->
                    <form action="<?php echo e(route('home.corporateSubmit')); ?>" method="POST" enctype="multipart/form-data" id="corporateForm">
                        <?php echo csrf_field(); ?>
                        <div class="pop-up3">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 class="book-tit">Institute Enquiry</h2>
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
                                            <option>School</option>
                                        </select>
                                    </li>
                                    <li class="half">
                                        <select class="form-control" name="interested_for" id="interested_for">
                                            <option value="">Interested for</option>
                                            <option value="Admission">Admission</option>
                                        </select>
                                    </li>
                                    <li class="half">
                                        <select class="form-control" name="established_year" id='established_year'>
                                            <option value="">Established Year</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </li>
                                    <li class="half">
                                        <input type="number" name="phone" id="phone" placeholder="Mobile No *" class="form-control" required>
                                    </li>
                                    <li class="half">
                                        <input type="number" name="otp" id="otp" placeholder="OTP" class="form-control" required>
                                    </li>
                                    <li class="full">
                                        <div class="input-with-button">
                                            <input type="email" name="email" id="email" placeholder="Email id *" class="form-control" required>
                                            <button type="button" class="get-otp-button" id="getOtpBtn">Get
                                                OTP</button>
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
                                    <li class="full">
                                        <input type="file" name="attachment" id="attachment" class="form-control" accept=".pdf, .doc, .docx">
                                    </li>
                                    <li class="full" style="font-size: 13px;display:flex">
                                        <input type="checkbox" style="width: 20px;height:20px" name="privacy_policy" id="privacy_policy" required> &nbsp; I accept the <a href="privacy_policy.html">Privacy
                                            Policy</a>
                                    </li>
                                    <li class="full">
                                        <input type="submit" name="submit" id="submitInstitude" value="Book now">
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
                    <div class="pop-up2">
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
                                    <li class="half"> <span style="display: flex;"> Mobile <validation class="text-danger">*</validation></span>
                                        <input type="text" pattern="[6-9]{1}[0-9]{9}" name="mobile" placeholder="Mobile Number" title="Please enter valid mobile" class="form-control" required>
                                    </li>
                                    <!--POP UP EMAIL ADDTESS-->
                                    <li class="half"> <span style="display: flex;">Email ID<validation class="text-danger">*</validation> </span>
                                        <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" placeholder="Email id *" title="Please enter valid email id" class="form-control" required>
                                    </li>
                                    <li class="half"> <span>Gender </span>
                                        <select name="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">FeMale</option>
                                            <option value="Transgender">Transgender</option>
                                        </select>
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
        window.jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
                [{
                    b: -1,
                    d: 1,
                    ls: 0.5
                }, {
                    b: 0,
                    d: 1000,
                    y: 5,
                    e: {
                        y: 6
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    ls: 0.5
                }, {
                    b: 200,
                    d: 1000,
                    y: 25,
                    e: {
                        y: 6
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    ls: 0.5
                }, {
                    b: 400,
                    d: 1000,
                    y: 45,
                    e: {
                        y: 6
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    ls: 0.5
                }, {
                    b: 600,
                    d: 1000,
                    y: 65,
                    e: {
                        y: 6
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    ls: 0.5
                }, {
                    b: 800,
                    d: 1000,
                    y: 85,
                    e: {
                        y: 6
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    ls: 0.5
                }, {
                    b: 500,
                    d: 1000,
                    y: 195,
                    e: {
                        y: 6
                    }
                }],
                [{
                    b: 0,
                    d: 2000,
                    y: 30,
                    e: {
                        y: 3
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    rY: -15,
                    tZ: 100
                }, {
                    b: 0,
                    d: 1500,
                    y: 30,
                    o: 1,
                    e: {
                        y: 3
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    rY: -15,
                    tZ: -100
                }, {
                    b: 0,
                    d: 1500,
                    y: 100,
                    o: 0.8,
                    e: {
                        y: 3
                    }
                }],
                [{
                    b: 500,
                    d: 1500,
                    o: 1
                }],
                [{
                    b: 0,
                    d: 1000,
                    y: 380,
                    e: {
                        y: 6
                    }
                }],
                [{
                    b: 300,
                    d: 1000,
                    x: 80,
                    e: {
                        x: 6
                    }
                }],
                [{
                    b: 300,
                    d: 1000,
                    x: 330,
                    e: {
                        x: 6
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    r: -110,
                    sX: 5,
                    sY: 5
                }, {
                    b: 0,
                    d: 2000,
                    o: 1,
                    r: -20,
                    sX: 1,
                    sY: 1,
                    e: {
                        o: 6,
                        r: 6,
                        sX: 6,
                        sY: 6
                    }
                }],
                [{
                    b: 0,
                    d: 600,
                    x: 150,
                    o: 0.5,
                    e: {
                        x: 6
                    }
                }],
                [{
                    b: 0,
                    d: 600,
                    x: 1140,
                    o: 0.6,
                    e: {
                        x: 6
                    }
                }],
                [{
                    b: -1,
                    d: 1,
                    sX: 5,
                    sY: 5
                }, {
                    b: 600,
                    d: 600,
                    o: 1,
                    sX: 1,
                    sY: 1,
                    e: {
                        sX: 3,
                        sY: 3
                    }
                }]
            ];

            var jssor_1_options = {
                $AutoPlay: 1,
                $LazyLoading: 1,
                $CaptionSliderOptions: {
                    $Class: $JssorCaptionSlideo$,
                    $Transitions: jssor_1_SlideoTransitions
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$,
                    $SpacingX: 20,
                    $SpacingY: 20
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1600;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                } else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>

    <script type="text/javascript">
        jssor_1_slider_init();

        function success(msg) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
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

        function errors(msg) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
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
            toastr.error(msg)
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
                            success("Login Successfully.")
                            window.location.href = "<?php echo e(route('studentDashboard')); ?>";
                        } else {
                            errors("Invalid Login Credentials")
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
                            success(response.msg)
                            window.location.href = "<?php echo e(route('studentDashboard')); ?>";
                        } else {
                            errors(response.msg)
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
                        errors(errorMessage)
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
                            $('#errorMessages').append('<li>'+xhr.responseText+'</li>');
                            errors((xhr.responseText))
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
    </script>

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
</body>

</html><?php /**PATH /home/lkaj6m2w9cvv/public_html/resources/views/layouts/website.blade.php ENDPATH**/ ?>