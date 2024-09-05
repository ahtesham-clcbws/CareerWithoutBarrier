<!-- resources/views/home.blade.php -->
@extends('layouts.website')

@section('title', 'Home Page')


@section('content')
    <div class="perpration-page-banner common-banner">

        <div class="container text-center">
            <h2>Carrier Without Barrier</h2>
        </div>
    </div>

    <div class="carrier-glance">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">
                                <span class="mr-1 tab-icon"><img
                                        src="{{ asset('website/assets/images/prepration/rocket-black.png') }}"
                                        alt="img"></span>
                                Mission
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">
                                <span class="mr-1 tab-icon"><img
                                        src="{{ asset('website/assets/images/prepration/light-bulb.png') }}"
                                        alt="img"></span>
                                Vision
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">
                                <span class="mr-1 tab-icon"><img
                                        src="{{ asset('website/assets/images/prepration/customer.png') }}"
                                        alt="img"></span>
                                Values
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="custom-tooltip-container">
                                <div class="add">
                                    <div class="custom-grid">
                                        <div class="dummy-image">
                                            <img class="img-fluid"
                                                src="{{ asset('website/assets/images/prepration/dummy-img.jpg') }}"
                                                alt="img">
                                        </div>
                                        <div class="custom-tooltip-content specialised">
                                            <h3 class="mb-3">Education for all is our Aim 1</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor
                                                incididunt
                                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation
                                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                dolor
                                                in
                                                reprehenderit in voluptate velit </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor
                                                incididunt
                                                ut labore et dolore magna aliqua.</p>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <h2 style="color:#BC61F6">375<span>+</span> </h2>
                                                    <h5 class="text-uppercase" style="font-size: 13px; line-height: 18px;">
                                                        Happy Client</h5>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <h2 style="color:#25C5DB">1500<span>+</span> </h2>
                                                    <h5 class="text-uppercase" style="font-size: 13px; line-height: 18px;">
                                                        Project Completed</h5>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                                    <h2 style="color:#F7553B">695<span>+</span> </h2>
                                                    <h5 class="text-uppercase" style="font-size: 13px; line-height: 18px;">
                                                        Running Projects</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="custom-tooltip-content onlineAppointement">
                                                    <h3 class="mb-3">Education for all is our Aim 2</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation
                                                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                        dolor
                                                        in
                                                        reprehenderit in voluptate velit </p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua.</p>
                                                </div>
                                                <div class="custom-tooltip-content emergency">
                                                    <h3 class="mb-3">Education for all is our Aim 3</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation
                                                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                        dolor
                                                        in
                                                        reprehenderit in voluptate velit </p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua.</p>
                                                </div>
                                                <div class="custom-tooltip-content suppport">
                                                    <h3 class="mb-3">Education for all is our Aim 4</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation
                                                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                        dolor
                                                        in
                                                        reprehenderit in voluptate velit </p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua.</p>
                                                </div> -->
                                    </div>
                                </div>
                                <div class="grid-list">
                                    <div class="custom-grid">
                                        <div class="click" data-id="specialised">
                                            <div class="cusom-tooltip-list-item">
                                                <span class="tooltip-icon me-3">
                                                    <img src="{{ asset('website/assets/images/prepration/rocket.png') }}"
                                                        alt="img">
                                                </span>

                                                <div class="custom-tooltip-list-content">
                                                    <h6>Specialised Support Service</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod
                                                        tempor
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click" data-id="onlineAppointement">
                                            <div class="cusom-tooltip-list-item">
                                                <span class="tooltip-icon tooltip-icon-1 me-3">
                                                    <img src="{{ asset('website/assets/images/prepration/online-learning.png') }}"
                                                        alt="img">
                                                </span>

                                                <div class="custom-tooltip-list-content">
                                                    <h6>Online Appointement</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod
                                                        tempor
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click" data-id="emergency">
                                            <div class="cusom-tooltip-list-item">
                                                <span class="tooltip-icon tooltip-icon-2 me-3">
                                                    <img src="{{ asset('website/assets/images/prepration/emergency.png') }}"
                                                        alt="img">
                                                </span>

                                                <div class="custom-tooltip-list-content">
                                                    <h6>Emergency Medical Care 24/7</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod
                                                        tempor
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click" data-id="suppport">
                                            <div class="cusom-tooltip-list-item">
                                                <span class="tooltip-icon tooltip-icon-3 me-3">
                                                    <img src="{{ asset('website/assets/images/prepration/rocket.png') }}"
                                                        alt="img">
                                                </span>

                                                <div class="custom-tooltip-list-content">
                                                    <h6>Specialised Support Service</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod
                                                        tempor
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="custom-tooltip-container">
                                <div class="add">
                                    <div class="custom-grid">
                                        <div class="dummy-image">
                                            <img class="img-fluid"
                                                src="{{ asset('website/assets/images/prepration/dummy-img.jpg') }}"
                                                alt="img">
                                        </div>
                                        <div class="custom-tooltip-content specialised">
                                            <h3 class="mb-3">Education for all is our Aim 1</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor
                                                incididunt
                                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation
                                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                dolor
                                                in
                                                reprehenderit in voluptate velit </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor
                                                incididunt
                                                ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <!-- <div class="custom-tooltip-content onlineAppointement">
                                                    <h3 class="mb-3">Education for all is our Aim 2</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation
                                                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                        dolor
                                                        in
                                                        reprehenderit in voluptate velit </p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua.</p>
                                                </div>
                                                <div class="custom-tooltip-content emergency">
                                                    <h3 class="mb-3">Education for all is our Aim 3</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation
                                                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                        dolor
                                                        in
                                                        reprehenderit in voluptate velit </p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua.</p>
                                                </div>
                                                <div class="custom-tooltip-content suppport">
                                                    <h3 class="mb-3">Education for all is our Aim 4</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation
                                                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                        dolor
                                                        in
                                                        reprehenderit in voluptate velit </p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua.</p>
                                                </div> -->
                                    </div>
                                </div>
                                <div class="grid-list">
                                    <div class="custom-grid">
                                        <div class="click" data-id="specialised">
                                            <div class="cusom-tooltip-list-item">
                                                <span class="tooltip-icon me-3">
                                                    <img src="{{ asset('website/assets/images/prepration/rocket.png') }}"
                                                        alt="img">
                                                </span>

                                                <div class="custom-tooltip-list-content">
                                                    <h6>Specialised Support Service</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod
                                                        tempor
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click" data-id="onlineAppointement">
                                            <div class="cusom-tooltip-list-item">
                                                <span class="tooltip-icon me-3">
                                                    <img src="{{ asset('website/assets/images/prepration/rocket.png') }}"
                                                        alt="img">
                                                </span>

                                                <div class="custom-tooltip-list-content">
                                                    <h6>Specialised Support Service</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod
                                                        tempor
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click" data-id="emergency">
                                            <div class="cusom-tooltip-list-item">
                                                <span class="tooltip-icon me-3">
                                                    <img src="{{ asset('website/assets/images/prepration/rocket.png') }}"
                                                        alt="img">
                                                </span>

                                                <div class="custom-tooltip-list-content">
                                                    <h6>Specialised Support Service</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod
                                                        tempor
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click" data-id="suppport">
                                            <div class="cusom-tooltip-list-item">
                                                <span class="tooltip-icon me-3">
                                                    <img src="{{ asset('website/assets/images/prepration/rocket.png') }}"
                                                        alt="img">
                                                </span>

                                                <div class="custom-tooltip-list-content">
                                                    <h6>Specialised Support Service</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod
                                                        tempor
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="custom-tooltip-container">
                                <div class="add">
                                    <div class="custom-grid">
                                        <div class="dummy-image">
                                            <img class="img-fluid"
                                                src="{{ asset('website/assets/images/prepration/dummy-img.jpg') }}"
                                                alt="img">
                                        </div>
                                        <div class="custom-tooltip-content specialised">
                                            <h3 class="mb-3">Education for all is our Aim 1</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor
                                                incididunt
                                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation
                                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                dolor
                                                in
                                                reprehenderit in voluptate velit </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor
                                                incididunt
                                                ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <!-- <div class="custom-tooltip-content onlineAppointement">
                                                    <h3 class="mb-3">Education for all is our Aim 2</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation
                                                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                        dolor
                                                        in
                                                        reprehenderit in voluptate velit </p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua.</p>
                                                </div>
                                                <div class="custom-tooltip-content emergency">
                                                    <h3 class="mb-3">Education for all is our Aim 3</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation
                                                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                        dolor
                                                        in
                                                        reprehenderit in voluptate velit </p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua.</p>
                                                </div>
                                                <div class="custom-tooltip-content suppport">
                                                    <h3 class="mb-3">Education for all is our Aim 4</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation
                                                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                                        dolor
                                                        in
                                                        reprehenderit in voluptate velit </p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                        tempor
                                                        incididunt
                                                        ut labore et dolore magna aliqua.</p>
                                                </div> -->
                                    </div>
                                </div>
                                <div class="grid-list">
                                    <div class="custom-grid">
                                        <div class="click" data-id="specialised">
                                            <div class="cusom-tooltip-list-item">
                                                <span class="tooltip-icon me-3">
                                                    <img src="{{ asset('website/assets/images/prepration/rocket.png') }}"
                                                        alt="img">
                                                </span>

                                                <div class="custom-tooltip-list-content">
                                                    <h6>Specialised Support Service</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod
                                                        tempor
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click" data-id="onlineAppointement">
                                            <div class="cusom-tooltip-list-item">
                                                <span class="tooltip-icon me-3">
                                                    <img src="{{ asset('website/assets/images/prepration/rocket.png') }}"
                                                        alt="img">
                                                </span>

                                                <div class="custom-tooltip-list-content">
                                                    <h6>Specialised Support Service</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod
                                                        tempor
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click" data-id="emergency">
                                            <div class="cusom-tooltip-list-item">
                                                <span class="tooltip-icon me-3">
                                                    <img src="{{ asset('website/assets/images/prepration/rocket.png') }}"
                                                        alt="img">
                                                </span>

                                                <div class="custom-tooltip-list-content">
                                                    <h6>Specialised Support Service</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod
                                                        tempor
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click" data-id="suppport">
                                            <div class="cusom-tooltip-list-item">
                                                <span class="tooltip-icon me-3">
                                                    <img src="{{ asset('website/assets/images/prepration/rocket.png') }}"
                                                        alt="img">
                                                </span>

                                                <div class="custom-tooltip-list-content">
                                                    <h6>Specialised Support Service</h6>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod
                                                        tempor
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>



                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="custom-tooltip-list">

                    </div>
                </div>
            </div>
            <!-- <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                        <div class="founder-message">
                            <img class="img-fluid" src="assets/images/prepration/founder-message.jpg" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="founder-message-content">
                            <ul>
                                <li>50%	Application	Forms	are	free</li>
                                <li>We	provide	previous	year	papers</li>
                                <li>50%	Application	Forms	are	free</li>
                                <li>We	provide	previous	year	papers	</li>
                                <li>50%	Application	Forms	are	free</li>
                                <li>We	provide	previous	year	papers</li>
                            </ul>
                        </div>
                    </div>
                </div> -->

        </div>
    </div>

    <div class="maximize-value">
        <section>
            <div class="subscribe-off comm-p-t-b">
                <div class="container">
                    <div class="comm-tit-ani tit ani-tit text-left pb-2">
                        <p>We maximize added</p>
                        <h2>Value for <span>our clients</span><br></h2><span class="line"></span>
                    </div>
                    <div class="row">
                        <!--SUBSCRIBE OFFER IMG-->
                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 meet-experts wow-ani ani-strt">
                            <div class="maximize-value-widget">
                                <div class="maximize-icon">
                                    <img src="{{ asset('website/assets/images/prepration/icon-1.png') }}"
                                        alt="maximize-icon">
                                </div>
                                <h6>Strategy</h6>
                                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 meet-experts wow-ani ani-strt">
                            <div class="maximize-value-widget">
                                <div class="maximize-icon">
                                    <img src="{{ asset('website/assets/images/prepration/icon-2.png') }}"
                                        alt="maximize-icon">
                                </div>
                                <h6>Mission</h6>
                                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 meet-experts wow-ani ani-strt">
                            <div class="maximize-value-widget">
                                <div class="maximize-icon">
                                    <img src="{{ asset('website/assets/images/prepration/icon-3.png') }}"
                                        alt="maximize-icon">
                                </div>
                                <h6>Development</h6>
                                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-12 meet-experts wow-ani ani-strt">
                            <div class="maximize-value-widget">
                                <div class="maximize-icon">
                                    <img src="{{ asset('website/assets/images/prepration/icon-4.png') }}"
                                        alt="maximize-icon">
                                </div>
                                <h6>Team</h6>
                                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                            </div>
                        </div>
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
                <h2>Our<span> Way</span><br></h2><span class="line"></span>
                <h6>Our team is commited to making a positive impact for our clients, <br />their users, and our
                    community.</h6>
            </div>
            <div class="container">
                <div class="row">
                    <!--TRAVEL EXPERTS IMG AND NAME -->
                    <div class="ani-eql col-lg-3 col-md-6 meet-experts wow-ani ani-strt">
                        <!--TRAVEL EXPERTS IMG-->
                        <div class="travel-exp-1">
                            <h4>2019</h4>
                            <img src="{{ asset('website/assets/images/prepration/way-img-1.jpg') }}" alt="img">
                            <h5>The purpose of lorem ipsum is to create a natural looking block of text</h5>
                        </div>
                    </div>

                    <!--TRAVEL EXPERTS IMG AND NAME -->
                    <div class="ani-eql col-lg-3 col-md-6 meet-experts wow-ani1 ani-strt">
                        <!--TRAVEL EXPERTS IMG-->
                        <div class="travel-exp-1">
                            <h4>2020</h4>
                            <img src="{{ asset('website/assets/images/prepration/way-img-1.jpg') }}" alt="img">
                            <h5>The purpose of lorem ipsum is to create a natural looking block of text</h5>
                        </div>
                    </div>

                    <!--TRAVEL EXPERTS IMG AND NAME -->
                    <div class="ani-eql col-lg-3 col-md-6 meet-experts wow-ani2 ani-strt">
                        <!--TRAVEL EXPERTS IMG-->
                        <div class="travel-exp-1">
                            <h4>2021</h4>
                            <img src="{{ asset('website/assets/images/prepration/way-img-1.jpg') }}" alt="img">
                            <h5>The purpose of lorem ipsum is to create a natural looking block of text</h5>
                        </div>
                    </div>

                    <!--TRAVEL EXPERTS IMG AND NAME -->
                    <div class="ani-eql col-lg-3 col-md-6 meet-experts wow-ani3 ani-strt">
                        <!--TRAVEL EXPERTS IMG-->
                        <div class="travel-exp-1">
                            <h4>2023</h4>
                            <img src="{{ asset('website/assets/images/prepration/way-img-1.jpg') }}" alt="img">
                            <h5>The purpose of lorem ipsum is to create a natural looking block of text</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="our-values">
        <div class="container">
            <div class="comm-tit-ani tit ani-tit text-center pb-2">
                <p>Our values</p>
                <h2>Core <span>values</span><br></h2><span class="line"></span>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="our-values-widget d-flex">
                        <div class="our-values-icon mr-3">
                            <img src="{{ asset('website/assets/images/prepration/safety-icon-1.png') }}" alt="icon">
                        </div>
                        <div class="our-values-widget-content">
                            <h6>Safety</h6>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="our-values-widget d-flex">
                        <div class="our-values-icon mr-3">
                            <img src="assets/images/prepration/safety-icon-2.png" alt="icon">
                        </div>
                        <div class="our-values-widget-content">
                            <h6>Excellence</h6>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="our-values-widget d-flex">
                        <div class="our-values-icon mr-3">
                            <img src="assets/images/prepration/safety-icon-3.png" alt="icon">
                        </div>
                        <div class="our-values-widget-content">
                            <h6>Accountability</h6>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="our-values-widget d-flex">
                        <div class="our-values-icon mr-3">
                            <img src="assets/images/prepration/safety-icon-4.png" alt="icon">
                        </div>
                        <div class="our-values-widget-content">
                            <h6>Kindness</h6>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="our-values-widget d-flex">
                        <div class="our-values-icon mr-3">
                            <img src="assets/images/prepration/safety-icon-5.png" alt="icon">
                        </div>
                        <div class="our-values-widget-content">
                            <h6>Learning</h6>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="our-values-widget d-flex">
                        <div class="our-values-icon mr-3">
                            <img src="assets/images/prepration/safety-icon-6.png" alt="icon">
                        </div>
                        <div class="our-values-widget-content">
                            <h6>Teamwork</h6>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="counter-section prep-counter-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="counter-section-widget text-center">
                        <div class="counter-section-icon mb-3 d-flex align-items-center justify-content-center mx-auto">
                            <img class="img-fluid" src="assets/images/prepration/specialist-icon-1.png" alt="img">
                        </div>
                        <h6>Specialists</h6>
                        <h2><span class="counter" data-count-start="0" data-count-end="26"
                                data-speed="70">26</span><span class="plus-icon">+</span></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="counter-section-widget text-center">
                        <div class="counter-section-icon mb-3 d-flex align-items-center justify-content-center mx-auto">
                            <img class="img-fluid" src="assets/images/prepration/specialist-icon-2.png" alt="img">
                        </div>
                        <h6>Happy Clients</h6>
                        <h2><span class="counter" data-count-start="0" data-count-end="1256"
                                data-speed="20">1256</span><span class="plus-icon">+</span></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="counter-section-widget text-center">
                        <div class="counter-section-icon mb-3 d-flex align-items-center justify-content-center mx-auto">
                            <img class="img-fluid" src="assets/images/prepration/specialist-icon-3.png" alt="img">
                        </div>
                        <h6>Successful Cases</h6>
                        <h2><span class="counter" data-count-start="0" data-count-end="1256"
                                data-speed="20">1256</span><span class="plus-icon">+</span></h2>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="counter-section-widget text-center">
                        <div class="counter-section-icon mb-3 d-flex align-items-center justify-content-center mx-auto">
                            <img class="img-fluid" src="assets/images/prepration/specialist-icon-4.png" alt="img">
                        </div>
                        <h6>Awards</h6>
                        <h2><span class="counter" data-count-start="0" data-count-end="16"
                                data-speed="70">16</span><span class="plus-icon">+</span></h2>
                    </div>
                </div>
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
                        <h2>Clients <span>say</span><br></h2><span class="line"></span>
                    </div>
                    <div class="row">
                        <!--TESTIMONIALS START-->
                        <div class="testimonails-inner">
                            <!--TESTIMONIALS LEFT SIDE CONTENT-->

                            <!--TESTIMONIALS RIGHT SIDE BOX-->
                            <div class="testi1">
                                <div class="testi2">
                                    <div id="demo" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="col-lg-4 col-md-4 testi-slider">
                                                    <div class="testi-lhs">
                                                        <div class="str-rating">
                                                            <div class="commas">
                                                                "
                                                            </div>
                                                            <p>They are client statements that highlight what your
                                                                organization does well and help convince potential
                                                                clients </p>
                                                            <div class="testimonials-user">
                                                                <img src="assets/images/testimonails/3.jpg"
                                                                    alt="img">
                                                            </div>
                                                            <h5 class="mb-0">John</h5>
                                                            <h6 class="mb-0">Business Owner</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--TESTIMONIALS SLIDER 1 IMG AND RATING -->
                                                <div class="col-lg-4 col-md-4 testi-slider">
                                                    <div class="testi-lhs">
                                                        <div class="str-rating">
                                                            <div class="commas">
                                                                "
                                                            </div>
                                                            <p>They are client statements that highlight what your
                                                                organization does well and help convince potential
                                                                clients </p>
                                                            <div class="testimonials-user">
                                                                <img src="assets/images/testimonails/3.jpg"
                                                                    alt="img">
                                                            </div>
                                                            <h5 class="mb-0">John</h5>
                                                            <h6 class="mb-0">Business Owner</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 testi-slider">
                                                    <div class="testi-lhs">
                                                        <div class="str-rating">
                                                            <div class="commas">
                                                                "
                                                            </div>
                                                            <p>They are client statements that highlight what your
                                                                organization does well and help convince potential
                                                                clients </p>
                                                            <div class="testimonials-user">
                                                                <img src="assets/images/testimonails/3.jpg"
                                                                    alt="img">
                                                            </div>
                                                            <h5 class="mb-0">John</h5>
                                                            <h6 class="mb-0">Business Owner</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TESTIMONIALS SLIDER 1 END-->

                                            <!--TESTIMONIALS SLIDER 2 START-->
                                            <div class="carousel-item">
                                                <!--TESTIMONIALS SLIDER 2 IMG AND RATING -->
                                                <div class="col-lg-4 col-md-4 testi-slider">
                                                    <div class="testi-lhs">
                                                        <div class="str-rating">
                                                            <div class="commas">
                                                                "
                                                            </div>
                                                            <p>They are client statements that highlight what your
                                                                organization does well and help convince potential
                                                                clients </p>
                                                            <div class="testimonials-user">
                                                                <img src="assets/images/testimonails/3.jpg"
                                                                    alt="img">
                                                            </div>
                                                            <h5 class="mb-0">John</h5>
                                                            <h6 class="mb-0">Business Owner</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--TESTIMONIALS SLIDER 2 IMG AND RATING -->
                                                <div class="col-lg-4 col-md-4 testi-slider">
                                                    <div class="testi-lhs">
                                                        <div class="str-rating">
                                                            <div class="commas">
                                                                "
                                                            </div>
                                                            <p>They are client statements that highlight what your
                                                                organization does well and help convince potential
                                                                clients </p>
                                                            <div class="testimonials-user">
                                                                <img src="assets/images/testimonails/3.jpg"
                                                                    alt="img">
                                                            </div>
                                                            <h5 class="mb-0">John</h5>
                                                            <h6 class="mb-0">Business Owner</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 testi-slider">
                                                    <div class="testi-lhs">
                                                        <div class="str-rating">
                                                            <div class="commas">
                                                                "
                                                            </div>
                                                            <p>They are client statements that highlight what your
                                                                organization does well and help convince potential
                                                                clients </p>
                                                            <div class="testimonials-user">
                                                                <img src="assets/images/testimonails/3.jpg"
                                                                    alt="img">
                                                            </div>
                                                            <h5 class="mb-0">John</h5>
                                                            <h6 class="mb-0">Business Owner</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--TESTIMONIALS SLIDER 2 END-->

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="testimo-header">
                                <ul class="carousel-indicators">

                                    <li>
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <i class="fa fa-long-arrow-left carousel-control-prev-icon"
                                                aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <i class="fa fa-long-arrow-right carousel-control-next-icon"
                                                aria-hidden="true"></i>
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
                <p>strategy &</p>
                <h2>Consulting <span>Services</span><br></h2><span class="line"></span>
                <h6 class="mb-5">Our management consulting services focus on our clients most<br /> critical issue and
                    opportunities.</h6>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="our-values-widget d-flex">
                        <div class="our-values-icon mr-3">
                            1
                        </div>
                        <div class="our-values-widget-content">
                            <h6>Marketing</h6>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="our-values-widget d-flex">
                        <div class="our-values-icon mr-3">
                            2
                        </div>
                        <div class="our-values-widget-content">
                            <h6>Operations</h6>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="our-values-widget d-flex">
                        <div class="our-values-icon mr-3">
                            3
                        </div>
                        <div class="our-values-widget-content">
                            <h6>Strategy</h6>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="our-values-widget d-flex">
                        <div class="our-values-icon mr-3">
                            4
                        </div>
                        <div class="our-values-widget-content">
                            <h6>Procurement</h6>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="our-values-widget d-flex">
                        <div class="our-values-icon mr-3">
                            5
                        </div>
                        <div class="our-values-widget-content">
                            <h6>Sustainbility</h6>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="our-values-widget d-flex">
                        <div class="our-values-icon mr-3">
                            6
                        </div>
                        <div class="our-values-widget-content">
                            <h6>Privite Equity</h6>
                            <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="contact-wave-effect ">
        <div class="ocean">
            <div class="wave"></div>
        </div>
    </div> --}}
@endsection
