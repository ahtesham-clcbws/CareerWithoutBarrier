<!-- resources/views/home.blade.php -->
@extends('layouts.website')

@section('title', 'Home Page')


@section('content')

    <body class="conact-page">
        <section>
            <div class="common-banner contact-us-banner">
                <div class="container">
                    <div class="row">
                        <h2>Contact us</h2>
                        <h4><a href="{{ route('home.front') }}">Home > </a> <span>Contact</span></h4>
                        <i class="fly-icon"></i>
                        <div class="comm-ban-im">
                            <img src="{{ asset('website/assets/images/bg-icons/contact-banner.png') }}" alt="img">
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
                                @foreach ($faq as $faqs)
                                    <li>
                                        <h3>{!! $faqs->title !!}</h3>
                                        {!! $faqs->details !!}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- FAQ LEFT SIDE IMG-->
                    <div class="col-lg-6 col-md-12">
                        <h2>Contact</h2>
                        <div class>
                            <div class="contact-input">
                                <ul>
                                    <li>
                                        <input type="text" placeholder="Full Name">
                                    </li>
                                    <li class="mobile-input">
                                        <input type="text" placeholder="Mobile">
                                        <button class="get-otp-button">Get OTP</button>
                                    </li>

                                    <li>
                                        <input type="text" style="margin-left: 10px;" placeholder="Email *">
                                    </li>

                                    <li>
                                        <input type="text" placeholder="City/District Name *">
                                    </li>

                                    <li>
                                        <input type="text" placeholder="Reason to contact">
                                    </li>

                                    <li>
                                        <input type="text" placeholder="Your message here">
                                    </li>
                                    <li><input class="sub" type="submit" value="Submit"></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!-- FAQ RIGHT SIDE CONTENT END-->
                </div>
            </div>
        </div>
    @endsection
