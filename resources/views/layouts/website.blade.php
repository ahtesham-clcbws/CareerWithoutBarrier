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
    <title>
        {{ isset($title) && !empty(trim($title)) ? $title . ' | Carrier Without Barrier' : 'Welcome to Carrier Without Barrier' }}
    </title>
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="{{ asset('website/assets/images/fav-icon.png') }}" type="image/x-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&amp;family=Pacifico&amp;family=Poppins:wght@300;400;500;600&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap v4 css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/font-awesome.min.css') }}">
    <!-- MAIN TEMPLATE CSS -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">



    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('custom-styles')

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

        /* .modal-dialog .modal-content .pop-up {
            padding-bottom: 0px;
        } */

        /* .modal-dialog .modal-content .pop-up>.pop-up1 {
            height: 100% !important;
            position: relative !important;
            overflow: hidden !important;
        }
        .modal-dialog .modal-content .pop-up>.pop-up1 .pop-im {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
        } */

        /* textarea:focus, */
        /* *:focus,
        select:focus,
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="datetime"]:focus,
        input[type="datetime-local"]:focus,
        input[type="date"]:focus,
        input[type="month"]:focus,
        input[type="time"]:focus,
        input[type="week"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        input[type="search"]:focus,
        input[type="tel"]:focus,
        input[type="color"]:focus,
        .uneditable-input:focus {
            border-color: #ffc7b4 !important;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(255, 199, 180, .25);
            outline: 0 none;
        } */

        .custom-file label,
        .form-control {
            background-color: #fff;
            border-color: #ffc7b4 !important;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: #ffc7b4 !important;
            box-shadow: 0 0 0 .2rem rgba(255, 199, 180, .25) !important;
        }

        .select2-container--bootstrap4.select2-container--focus .select2-selection {
            border-color: #ffc7b4 !important;
            -webkit-box-shadow: 0 0 0 .2rem rgba(255, 199, 180, .25) !important;
            box-shadow: 0 0 0 .2rem rgba(255, 199, 180, .25) !important;
        }

        .select2-container--bootstrap4 .select2-results__option--highlighted,
        .select2-container--bootstrap4 .select2-results__option--highlighted.select2-results__option[aria-selected="true"] {
            background-color: #f26b3c !important;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-search__field {
            color: #86929d !important;
            margin: 0 !important;
            padding-left: 0.65rem !important;
            font-size: 14px !important;
        }

        .select2-selection.select2-selection--multiple {
            display: block !important;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__rendered {
            display: flex !important;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__rendered,
        .select2-container--bootstrap4 .select2-selection--multiple .select2-search__field {
            padding: 0 !important;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-search__field {
            margin-top: 2px !important;
            color: #495057 !important;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-search__field::placeholder {
            color: #495057 !important;
        }

        .select2-container--bootstrap4 .select2-selection--multiple {
            /* min-height: calc(1.5em + .75rem + 2px) !important; */
            /* min-height: auto !important; */
            min-height: calc(1.5em + .75rem + 2px) !important;
            padding: .375rem .75rem !important;
            font-size: 1rem !important;
            font-weight: 400 !important;
            line-height: 1.5 !important;
            color: #495057 !important;
            background-color: #fff !important;
            background-clip: padding-box !important;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
        }

        /* // file bootstrap 5 */

        ::-webkit-file-upload-button {
            font: inherit;
            -webkit-appearance: button;
        }

        ::file-selector-button {
            font: inherit;
            -webkit-appearance: button;
        }

        .form-control[type=file]:not(:disabled):not([readonly]) {
            cursor: pointer;
        }

        .form-control::-webkit-file-upload-button {
            padding: 0.375rem 0.75rem;
            margin: -0.375rem -0.75rem;
            -webkit-margin-end: 0.75rem;
            margin-inline-end: 0.75rem;
            color: var(--bs-body-color);
            background-color: var(--bs-tertiary-bg);
            pointer-events: none;
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            border-inline-end-width: var(--bs-border-width);
            border-radius: 0;
            -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control::file-selector-button {
            padding: 0.375rem 0.75rem;
            margin: -0.375rem -0.75rem;
            -webkit-margin-end: 0.75rem;
            margin-inline-end: 0.75rem;
            color: var(--bs-body-color);
            background-color: var(--bs-tertiary-bg);
            pointer-events: none;
            border-color: inherit;
            border-style: solid;
            border-width: 0;
            border-inline-end-width: var(--bs-border-width);
            border-radius: 0;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {
            .form-control::-webkit-file-upload-button {
                -webkit-transition: none;
                transition: none;
            }

            .form-control::file-selector-button {
                transition: none;
            }
        }

        .form-control:hover:not(:disabled):not([readonly])::-webkit-file-upload-button {
            background-color: var(--bs-secondary-bg);
        }

        .form-control:hover:not(:disabled):not([readonly])::file-selector-button {
            background-color: var(--bs-secondary-bg);
        }

        .form-control-sm::file-selector-button {
            padding: 0.25rem 0.5rem;
            margin: -0.25rem -0.5rem;
            -webkit-margin-end: 0.5rem;
            margin-inline-end: 0.5rem;
        }

        .form-control-lg::-webkit-file-upload-button {
            padding: 0.5rem 1rem;
            margin: -0.5rem -1rem;
            -webkit-margin-end: 1rem;
            margin-inline-end: 1rem;
        }

        .form-control-lg::file-selector-button {
            padding: 0.5rem 1rem;
            margin: -0.5rem -1rem;
            -webkit-margin-end: 1rem;
            margin-inline-end: 1rem;
        }
    </style>

    @livewireStyles
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
                                @if($prospectus?->e_prospectus)
                                <a target="_blank" href="{{asset('home/eprospectus/'.$prospectus?->e_prospectus)}}">E-Prospectus
                                    <i class="fa fa-download ml-2 float-right" aria-hidden="true"></i>
                                </a>
                                @endif
                            </li>
                            @auth('student')
                            <li>
                                <a class="login-btn-border" href="{{ route('studentDashboard') }}">
                                    {{ Auth::guard('student')->user()->name }}
                                    <span class="fa fa-long-arrow-right" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li>
                                <a class="book-btn login-btn-border" href="{{ route('student.logout') }}">Logout<span class="fa fa-long-arrow-right" aria-hidden="true"></span></a>
                            </li>
                            @else
                            <li><a class="book-btn login-btn-border" href="#" data-toggle="modal" data-target="#myModalLogin">Login<span class="fa fa-long-arrow-right" aria-hidden="true"></span></a></li>
                            <li><a class="book-btn" href="{{ route('registration') }}">Sign Up<span class="fa fa-long-arrow-right" aria-hidden="true"></span></a></li>
                            @endauth

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
                            <div class="logo"> <a href="/"><img src="{{ asset('website/assets/images/brand/logo.png') }}" alt="logo"></a>
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
                                    <li> <a class="act" href="{{ route('home.front') }}"><i class="fa fa-home home-icon" aria-hidden="true"></i></a>
                                    </li>
                                    <!--ADD SUB MENU-->
                                    <li class="add-menu">
                                        <a href="{{ route('home.aboutus') }}">About Us </a>
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
                                    <li> <a href="{{ route('home.preparation') }}">Preparation for</a></li>

                                    <li> <a href="{{ route('home.scholarship') }}">Scholarship</a></li>
                                    <li> <a href="{{ route('home.contact') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--TOP SEARCH BAR-->

                        <div class="col-lg-2 col-md-4 menu-top3 text-right menu" style="padding-right: 0;">
                            <a href="{{ route('freeform') }}" style="text-decoration: underline; font-size: 12px; font-weight: 900; color: #ba2af7;">Get Discount Voucher</a>
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
                <a href="#"><img src="{{ asset('website/assets/images/icons/logo1.png') }}" alt=""></a>
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
                        <img src="{{ asset('website/assets/images/team/4.jpg') }}" alt="">
                        <div class="side-bar-content">
                            <h4>We Provide Most Exclusive </h4>
                            <span>Lorem ipsum dolor..</span>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('website/assets/images/team/2.jpg') }}" alt="">
                        <div class="side-bar-content">
                            <h4>We Are Specialist For Many</h4>
                            <span>Lorem ipsum dolor..</span>
                        </div>

                    </li>
                    <li>
                        <img src="{{ asset('website/assets/images/team/1.jpg') }}" alt="">
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
    @yield('content')

    @if (isset( $slot))
    {{ $slot }}
    @endif

    <!-- footer -->
    <section class="">
        <div class="footer comm-p-t-b">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                        <div class="logo h-100 d-flex flex-column justify-content-between">
                            <a href="/"><img src="{{ asset('logos/logo-square.png') }}" alt="logo"></a>
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
                                Email: {{ strtolower('query@careerwithoutbarrier.com')}}</p>
                            <h6>Results & Admit Card Related:</h6>
                            <p class="mb-3">Phone No: 9389696641 <br />
                                Email: {{ strtolower('support@careerwithoutbarrier.com')}}</p>
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

                        // $privacy_policy = TermsCondition::where([['status', 1], ['type', 'website'], ['page_name', 'privacy-policy']])->first();

                        // $privacy_policy_cond = TermsCondition::where([['status', 1], ['type', 'website'], ['page_name', 'privacy-policy']])->first();

                        $imp_link = TermsCondition::where([['status', 1], ['type', 'website'], ['page_name', 'important-links']])->first();

                        //$privacy_policy_cond = TermsCondition::where([['status',1],['type','website'],['page_name','privacy-policy']])->first();


                        ?>
                        <div class="features-foter">
                            <h2>Important Link</h2>
                            <!-- <p><a data-toggle="modal" data-target="#instituteModel" href="javascipt:void(0)">Institutional Enquiry</a></p> -->
                            <li><a href="{{ route('corporateEnquiry') }}">Institutional Enquiry</a></li>
                            <p><a href="{{ $imp_link ? asset('home/'.$imp_link->terms_condition_pdf) : 'javascipt:void(0)' }}" target="{{ $imp_link ? '_blank' : '_self'}}">Important Links</a></p>
                            <!--<p><a href="javascipt:void(0)">Downloads</a></p>-->
                            {{-- PolicyPage --}}
                            @php
                                $pages = App\Models\PolicyPage::all();
                            @endphp
                            @foreach ($pages as $page)
                            <p><a href="{{ route('website.policy-page', $page->slug) }}">{{ $page->title }}</a></p>
                            @endforeach
                            {{-- <p><a href="{{ $privacy_policy ? asset('home/'.$privacy_policy->terms_condition_pdf) : 'javascipt:void(0)' }}" target="{{ $termsCondition ? '_blank' : '_self'}}">Website Privacy Policy</a></p> --}}
                            {{-- <p><a href="{{ $termsCondition ? asset('home/'.$termsCondition->terms_condition_pdf) : 'javascipt:void(0)' }}" target="{{ $termsCondition ? '_blank' : '_self'}}">Website Terms & Conditions</a> --}}
                            </p>
                            <p><a href="{{URL::to('/faq')}}">Faq</a></p>
                            <p><a href="{{ route('freeform') }}">Get 100% Free Form (Limited)</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SECTION: COPY RIGHT -->
    <section>
        <div class="cpy-right py-3">
            <a><img src="{{ asset('logos/weblies-logo.png') }}" class="mx-auto" style="max-width:350px;" alt="Weblies equations private limited"></a>
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
                    url: "{{ route('home.sendMail') }}",
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

    {{-- applynow --}}
    <div id="applynow" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- SECTION: POP UP TRAVEL BOOKING FORM AND IMG -->
                <div class="pop-up row">
                    <!--POP UP TRAVEL BOOKING FORM DEATILES-->
                    <form action="{{ route('home.corporateSubmit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="pop-up3">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 class="book-tit">Scholarship Form</h2>
                            @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
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

    <div id="instituteModel" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- SECTION: POP UP TRAVEL BOOKING FORM AND IMG -->

                <div class="pop-up row">
                    <!--POP UP TRAVEL BOOKING FORM DEATILES-->
                    <form action="{{ route('home.corporateSubmit') }}" method="POST" enctype="multipart/form-data" id="corporateForm">
                        <livewire:website.corporate.enquiry.form />
                    </form>
                </div>
            </div>
            <!-- SECTION: POP UP END -->

        </div>
    </div>

    <div id="myModalLogin" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- SECTION: POP UP TRAVEL BOOKING FORM AND IMG -->
                <div class="pop-up row">
                    <!--POP UP IMG-->
                    <div class="pop-up1 col-12 col-lg-6" style="background: url('https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg');">
                        <!-- <img class="pop-im" src="https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg" alt=""> -->

                    </div>
                    <!--POP UP TRAVEL BOOKING FORM DEATILES-->
                    <div class="pop-up2">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="book-tit">Login</h2>
                        <p>wherever you go make your self at home</p>
                        <div class="book-now">
                            <form id="loginForm" method="post" action="{{ route('studentlogin') }}">
                                @csrf
                                <div class="contact__msg">Thank you.</div>
                                <ul>
                                    <li class="full"> <label for="mobile">Mobile<span class="text-danger">*</span></label>
                                        <input type="number" pattern="[6-9]{1}[0-9]{9}" name="mobile" placeholder="Mobile Number" title="Please enter valid mobile" class="form-control" required>
                                        @error('mobile')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </li>

                                    <li class="full"> <label> Password<span class="text-danger">*</span></label>
                                        <input type="password" name="password" placeholder="Password *" class="form-control" required>
                                        <i toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                                        @error('password')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </li>
                                    {{-- <li class="full">
                                        <input type="checkbox" id="rememberMe" name="remember" value="1">
                                        <label for="rememberMe">Remember Me</label>
                                    </li> --}}
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

    <div id="myModalForget" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- SECTION: POP UP TRAVEL BOOKING FORM AND IMG -->
                <div class="pop-up row">
                    <!--POP UP IMG-->
                    <div class="pop-up1 col-12 col-lg-6" style="background: url('https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg');">
                        <!-- <img class="pop-im" src="https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg" alt=""> -->
                    </div>
                    <!--POP UP TRAVEL BOOKING FORM DEATILES-->
                    <div class="pop-up2">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="book-tit">Forget Password</h2>
                        <p>wherever you go make your self at home</p>
                        <div class="book-now">
                            <form id="forgetForm" method="post" action="#">
                                @csrf
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
                                        @error('new_password')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </li>
                                    <li class="full newpasswordn" style="display: none;"> <label style="font-weight: 600;" class="forn-control">Confirm New Password<span class="text-danger">*</span></label>
                                        <input type="confirm_password" id="confirm_Password" name="confirm_password" placeholder="confirm_Password *" class="form-control" required>
                                        <i toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                                        @error('confirm_password')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
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

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <!-- Modal content-->
            <div class="modal-content">
                <!-- SECTION: POP UP TRAVEL BOOKING FORM AND IMG -->
                <div class="pop-up row">
                    <!--POP UP IMG-->
                    <div class="pop-up1 col-12 col-lg-6" style="background: url('https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg');">
                        <!-- <img class="pop-im" src="https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg" alt=""> -->

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


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('website/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    <script src="{{ asset('website/assets/js/mail.js') }}"></script>
    <script src="{{ asset('website/assets/js/custom.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>

    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <!-- <script src="assets/js/marquee.jquery.json"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <!-- Optional JavaScript -->
    <script src="{{ asset('website/assets/js/jquery.marquee.min.js') }}"></script>

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

    <script src="{{ asset('website/assets/js/jssor.slider-28.1.0.min.js') }}" type="text/javascript"></script>

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
                    url: "{{ route('studentlogin') }}",
                    method: 'post',
                    data: $('#loginForm').serialize(),
                    success: function(response) {
                        if (response.success) {
                            success("Login Successfully.", 'toast-login-center-below')
                            window.location.href = "{{ route('studentDashboard') }}";
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
                    url: "{{ route('studentSignup') }}",
                    method: 'post',
                    data: $('#studentSignup').serialize(),
                    success: function(response) {
                        if (response.success) {
                            success(response.msg, 'toast-login-center-below')
                            setTimeout(() => {
                                window.location.href = "{{ route('studentDashboard') }}";
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
                url: "{{route('student.forgetPassword')}}",
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
    <script src="{{ asset('website/assets/js/verifyregister.js') }}"></script>

    <style>
        .closeButton {
            border-radius: 50px;
            border: 1px solid red !important;
            width: 30px;
            height: 30px;
            line-height: 30px;
            color: red;
            font-size: small !important;
            font-weight: 300 !important;
            text-shadow: none !important;
        }

        .closeButton:hover {
            color: red !important;
        }
    </style>

    <script>
        // success('check error messages')
    </script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    <style>
        .select2-search__field,
        .select2-search.select2-search--inline,
        .select2-selection.select2-selection--multiple,
        .select2-selection__rendered {
            display: flex;
            flex-wrap: wrap;
        }

        .splide__list {
            height: auto !important;
        }
    </style>
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
            // centerMode: true,
            arrows: false,
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="/js/jquery.autoscroll.js"></script> -->
    <script>
        // $("[data-autoscroll]").autoscroll({
        //     interval: 100
        // });
        var miniSliderOptions = {
            type: 'loop',
            perPage: 4,
            gap: '15px',
            autoplay: true,
            perMove: 1,
            arrows: false,
            pauseOnFocus: false,
            breakpoints: {
                1000: {
                    perPage: 3,
                },
                640: {
                    perPage: 2,
                },
                340: {
                    perPage: 1,
                },
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splide-testimonials', {
                ...miniSliderOptions
            });
            splide.mount();
            var corporateTestimonials = new Splide('.splide-corporate-testimonials', {
                ...miniSliderOptions
            });
            corporateTestimonials.mount();
            var contributorTestimonials = new Splide('.splide-contributor-testimonials', {
                ...miniSliderOptions
            });
            contributorTestimonials.mount();
        });

        function interestedForInit() {
            // console.log('interestedForInit')
            if ($("#interested_for").hasClass("select2-hidden-accessible")) {
                $('#interested_for').select2("destroy").select2({
                    placeholder: 'Interested for',
                    theme: "bootstrap4",
                    // dropdownParent: $('#instituteModel')
                });
            } else {
                $('#interested_for').select2({
                    placeholder: 'Interested for',
                    theme: "bootstrap4",
                    // dropdownParent: $('#instituteModel')
                });
            }
        }
        interestedForInit()
    </script>

    @livewireScripts

    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <x-message />

    @stack('custom-scripts')
</body>

</html>