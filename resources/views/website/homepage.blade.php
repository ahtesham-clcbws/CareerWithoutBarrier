@extends('layouts.website')

@section('title', 'Home Page')

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
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
        border-radius: 5px;
    }

    .slider {
        top: 72px;
        width: 100%;


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
    }

    /* Default styles for mobile devices */
    .responsive-item {
        width: 100%;
        /* Full width on small screens */
    }

    /* Styles for larger screens (e.g., desktops) */
    @media screen and (min-width: 769px) {
        .responsive-item {
            width: calc(100% / <?=count($educations) ?>) !important;
        }
    }

    .sliderBackgroundImage,
    .slider.u-slick {
        min-height: 450px !important;
        overflow: hidden;
    }

    :root {
        --slider-height: 90vh;
    }

    @media (max-aspect-ratio: 1/1) {
        :root {
            --slider-height: calc(100vw - 80%);
        }
    }

    .sliderBackgroundImage {
        /* height: calc(100vh - 40%) !important; */
        height: var(--slider-height) !important;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .customAnchor,
    .customAnchor * {
        text-decoration: none !important;
        color: inherit !important;
    }

    .customAnchor:hover,
    .customAnchor:hover * {
        text-decoration: none !important;
    }
</style>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

@section('content')
    <section>
        <div class="slider u-slick">
            @foreach ($sliders as $key => $slider)
                <?php $thisImage = asset('home/slider/' . $slider->image); ?>
                <div class="slide-wrapper sliderBackgroundImage" style="background-image:url('<?= $thisImage ?>')">
                </div>
            @endforeach
        </div>
    </section>


    @if (isset($educations) && count($educations) > 0)
        <section>
            <div class="travl-features">
                <div class="container">
                    <div class="row">
                        <div class="ban-box">
                            <ul>
                                @foreach ($educations as $key => $education)
                                    <li class="responsive-item">
                                        <div class="ban-box-com {{ $key == 1 ? 'act' : '' }}">
                                            <img src="{{ asset('website/assets/images/icons/diploma.png') }}" alt="">
                                            <h4>{{ $education->name }}</h4>
                                            <a href="{{ route('registration') }}">Apply Now <i
                                                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                            <span class="bg-1"></span>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($courses->count())
        <section>
            <div class="packages">
                <!-- ALL SECTION COMMEN TITTLE -->
                <div class="comm-tit-ani tit">
                    <p>Popular Courses</p>
                    <h2>For <span>100% Scholarship</span><br></h2><span class="line"></span>
                </div>

                <div class="container">
                    <div class="row">
                        @foreach ($courses as $course)
                            <div class="ani-eql col-lg-4 col-md-6 packages-ani mb-5">
                                <div class="customAnchor overflow-hidden bg-white p-3 shadow" style="border-radius: 15px;">
                                    <a class="d-flex align-items-center"
                                        href="{{ route('home.career', encodeId($course->id)) }}" target="_blank">
                                        <div style="width: 50px; height: 50px;">
                                            <img class="h-100 mx-auto"
                                                src="{{ asset('home/course/' . $course->course_logo) }}"
                                                alt="{{ $course->title }}">
                                        </div>
                                        <p class="mb-0"
                                            style="line-height: 50px; font-size:18px; font-weight:700; margin-left:12px;">
                                            {{ $course->title }}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    @endif

    @if ($benefits->count())
        <section>
            <div class="ask-experts comm-p-t-b">
                <div class="container">
                    <div class="comm-tit-ani tit ani-tit">
                        <p>Benefit of CAREER without</p>
                        <h2>BARRIER <span>scholarship Exam</span><br></h2><span class="line"></span>
                    </div>
                    <div class="row">

                        <div class="traveller-advice">
                            <ul class="row row-cols-2 row-cols-md-4">
                                @foreach ($benefits as $benefit)
                                    <li class="ani-eql">
                                        <div class="traveller-point">
                                            <i class="{{ $benefit->icon }}" aria-hidden="true"></i>
                                            <h4>{{ $benefit->benefits }} </h4>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="important-information">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                    <div class="comm-tit-ani tit ani-tit">
                        <p>Important</p>
                        <h2>Information <span>& Notice</span><br></h2><span class="line"></span>
                    </div>
                    <div class="row h-100">
                        <div class="col-lg-6 col-12 h-100 d-none d-md-flex pr-0">
                            <div class="important-information-img h-100">
                                <img class="img-fluid"
                                    src="{{ asset('website/assets/images/information/important-information.png') }}"
                                    alt="img">
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 h-100 pl-0">
                            <div class="important-information-news h-100">
                                <div class="news-slider h-100 overflow-hidden">
                                    <div class='marquee-vert'
                                        style="height: 470px !important;min-height: 470px !important;">
                                        @foreach ($notifications as $notice)
                                            <a class="news-link" href="#"><i class="fa fa-arrow-right"
                                                    aria-hidden="true"></i>
                                                {!! $notice->title !!} {!! $notice->details !!}</a>
                                        @endforeach
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
                    @foreach ($blogNews as $news)
                        <div class="news-row d-flex mb-3">
                            <div class="news-img mr-3">
                                <img class="img-fluid" src="{{ asset('news/' . $news->image) }}" alt="img">
                            </div>
                            <div class="news-content">
                                <h6>{!! $news->title !!}</h6>
                                <p>{!! $news->details !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @if ($govtwebsites->count())
        <section>
            <div class="packages govt-web">
                <div class="comm-tit-ani tit">
                    <p>Important</p>
                    <h2>Govt <span>Websites</span><br></h2><span class="line"></span>
                </div>
                <div class="container">
                    <div class='marquee' style="outline: none; background-color: transparent; box-shadow: none;">
                        <div class="row flex-nowrap">
                            @foreach ($govtwebsites as $govtwebsite)
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2 govt-web-col"
                                    style="align-content: space-around;">
                                    <div class="govt-web-logo">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="{{ $govtwebsite->website_link }}">
                                                <img class=""
                                                    src="{{ asset('home/courses/' . $govtwebsite->image) }}" alt="img"
                                                    style="width: 100px; height: 100px;">
                                            </a>
                                            <span class="remark">{{ $govtwebsite->remark }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <div class="counter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
                    <div class="counter-section-widget text-center">
                        <div class="counter-section-icon d-flex align-items-center justify-content-center mx-auto mb-3">
                            <img class="img-fluid" src="{{ asset('website/assets/images/icons/student-icon.png') }}"
                                alt="img">
                        </div>
                        <h6>100% Scholarship for</h6>
                        <h2><span class="counter" data-count-start="990" data-count-end="1000"
                                data-speed="70">1000</span><span class="plus-icon"></span></h2>
                        <h6>Applicants</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
                    <div class="counter-section-widget text-center">
                        <div class="counter-section-icon d-flex align-items-center justify-content-center mx-auto mb-3">
                            <img class="img-fluid" src="{{ asset('website/assets/images/icons/certificate-icon.png') }}"
                                alt="img">
                        </div>
                        <h6>Offered Institutes</h6>
                        <h2><span class="counter" data-count-start="240" data-count-end="250" data-speed="70">250</span>
                        </h2>
                        <h6>Institutes (Approx)</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
                    <div class="counter-section-widget text-center">
                        <div class="counter-section-icon d-flex align-items-center justify-content-center mx-auto mb-3">
                            <img class="img-fluid" src="{{ asset('website/assets/images/icons/class-icon.png') }}"
                                alt="img">
                        </div>
                        <h6>Zero Form Fee For</h6>
                        <h2><span class="counter" data-count-start="4990" data-count-end="5000"
                                data-speed="70">5000</span>
                        </h2>
                        <h6>Applicants</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="counter-section-widget text-center">
                        <div class="counter-section-icon d-flex align-items-center justify-content-center mx-auto mb-3">
                            <img class="img-fluid" src="{{ asset('website/assets/images/icons/forign-icon.png') }}"
                                alt="img">
                        </div>
                        <!-- <h2><span class="counter">Free</span></h2>
                                        <h6>Online Education</h6>
                                        <h6>For All</h6> -->

                        <h6>Free online education for</h6>
                        <h2><span class="counter" data-count-start="9990" data-count-end="10000"
                                data-speed="70">10000</span><span class="plus-icon"></span></h2>
                        <h6>Students</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($studentTestimonials->count())
        <!-- SECTION: TESTIMONIALS-->
        <section>
            <div class="container mt-5">
                <div class="heading text-center">
                    <div class="comm-tit-ani tit">
                        <p>Hear it directly</p>
                        <h2>from <span>our students</span><br></h2><span class="line"></span><br />
                        <span>The passage experienced a surge in popularity during the 1960s when Letraset </span>
                    </div>
                </div>

                <div class="splide splide-testimonials" id="splide-testimonials" role="group">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($studentTestimonials as $studentTestimonial)
                                <li class="splide__slide">
                                    <div class="card h-100 d-flex flex-column justify-content-between">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center studentImage">
                                                <img class="img-thumbnail rounded"
                                                    src="{{ $studentTestimonial->student->photograph ? asset('/storage/' . $studentTestimonial->student->photograph) : asset('student/images/th_5.png') }}"
                                                    alt="{{ $studentTestimonial->name }}"
                                                    style="height: 80px;width: 80px;">

                                                <p class="card-text pl-2">
                                                    <b>{{ $studentTestimonial->name }}</b>,
                                                    @if ($studentTestimonial->student->district?->name)
                                                        {{ $studentTestimonial->student->district?->name }}
                                                    @endif
                                                </p>
                                            </div>
                                            <img class="img-fluid img-thumbnail mt-3"
                                                src="{{ $studentTestimonial->image ? asset('/storage/' . $studentTestimonial->image) : '/website/assets/images/placeholder.webp' }}"
                                                alt="{{ $studentTestimonial->name }}">
                                            <p class="card-text mt-3">{!! $studentTestimonial->message !!}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <!-- SECTION: BRANDS -->
    @endif

    @if ($corporateTestimonials->count())
        <!-- SECTION: Institute TESTIMONIALS-->
        <section>
            <div class="container mt-5">
                <div class="heading text-center">
                    <div class="comm-tit-ani tit">
                        <p>Hear it directly</p>
                        <h2>from <span>our Institute</span><br></h2><span class="line"></span><br />
                        <span>The passage experienced a surge in popularity during the 1960s when Letraset </span>
                    </div>
                </div>

                <div class="splide splide-corporate-testimonials" id="splide-corporate-testimonials" role="group">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($corporateTestimonials as $corporateTestimonial)
                                <li class="splide__slide">
                                    <div class="card h-100 d-flex flex-column justify-content-between">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center studentImage">
                                                <img class="img-thumbnail rounded"
                                                    src="{{ $corporateTestimonial->corporate->attachment ? asset('/storage/' . $corporateTestimonial->corporate->attachment) : asset('student/images/th_5.png') }}"
                                                    alt="{{ $corporateTestimonial->name }}"
                                                    style="height: 80px;width: 80px;">

                                                <p class="card-text pl-2">
                                                    <b>{{ $corporateTestimonial->name }}</b>{!! isset($corporateTestimonial->corporate, $corporateTestimonial->corporate->institute_name)
                                                        ? ',<br /> ' . $corporateTestimonial->corporate?->institute_name
                                                        : '' !!}{{ isset($corporateTestimonial->corporate, $corporateTestimonial->corporate->district, $corporateTestimonial->corporate->district->name) ? ', ' . $corporateTestimonial->corporate->district->name : '' }}
                                                </p>
                                            </div>
                                            <img class="img-fluid img-thumbnail w-100 mt-3"
                                                src="{{ $corporateTestimonial->image ? asset('/storage/' . $corporateTestimonial->image) : '/website/assets/images/placeholder.webp' }}"
                                                alt="{{ $corporateTestimonial->corporate?->institute_name ? $corporateTestimonial->corporate?->institute_name : $corporateTestimonial->name }}">
                                            <p class="card-text mt-3">{!! $studentTestimonial->message !!}</p>
                                        </div>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </section>
    @endif

    @if ($ourJourneys->count())
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
                            @foreach ($ourJourneys as $ourJourney)
                                <li>
                                    <div class="country-travel-1">
                                        <img class="loc-img" src="{{ asset('home/' . $ourJourney->logo) }}"
                                            alt="">
                                        <img src="{{ asset('home/' . $ourJourney->image) }}" alt="">
                                        <div class="travel-content">
                                            <h3>{{ $ourJourney->title }}</h3>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!--COUNTRY WISE TRAVEL MAP AND LINE END-->
            </div>
        </section>
    @endif

    @if ($ourContributors->count())
        <div class="great-contributor mb-5">
            <div class="container relative">
                <div class="comm-tit-ani tit ani-tit">
                    <p>WE WOULD LIKE TO SAY</p>
                    <h2>Thanks To Our <span>Great Contributor</span><br></h2><span class="line"></span>
                </div>

                <div class="splide splide-contributor-testimonials" id="splide-contributor-testimonials" role="group">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($ourContributors as $ourContributor)
                                <li class="splide__slide">
                                    <img class="img-fluid" src="{{ asset('home/' . $ourContributor->logo) }}"
                                        alt="img" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    @endif


    @php
        $popup = \App\Models\PopupSettings::firstOrCreate();
    @endphp
    @if ($popup && $popup->status == 1 && $popup->image)
        <div class="modal fade" id="popupModal" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <button class="close closeButton" data-dismiss="modal" type="button" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                    <img class="w-100" id="popupModalImage" src="" />
                </div>
            </div>
        </div>
        <script>
            $(window).on('load', function() {
                $('#popupModalImage').attr('src', '{{ '/storage/' . $popup->image }}');
                $('#popupModal').modal('show')
            });
        </script>
    @endif

@endsection
