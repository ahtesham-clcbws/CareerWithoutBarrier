<!-- resources/views/home.blade.php -->
@extends('layouts.website')

@section('title', 'Home Page')


@section('content')
<style>
    /* Ensure the fixed header is always on top of the tabs during scroll */
    .menu-head.fix-menu {
        z-index: 1050 !important;
    }

    /* Clear the absolute header on page load */
    .perpration-page-banner.common-banner {
        margin-top: 110px !important;
    }

    /* Carrier glance and tabs */
    .carrier-glance {
        padding: 50px 0 !important;
    }
    .carrier-glance .nav-tabs {
        position: relative;
        z-index: 10;
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        border-bottom: 2px solid #e2e8f0;
        gap: 10px;
        margin-bottom: 25px;
        scrollbar-width: none;
    }
    .carrier-glance .nav-tabs::-webkit-scrollbar {
        display: none;
    }
    .carrier-glance .nav-tabs .nav-item {
        margin: 0;
        flex-shrink: 0;
    }
    .carrier-glance .nav-tabs .nav-link {
        border: none;
        border-radius: 6px 6px 0 0;
        border-bottom: 3px solid transparent;
        color: #475569;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        padding: 10px 18px;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        background: transparent;
    }
    .carrier-glance .nav-tabs .nav-link:hover {
        color: #0284c7;
    }
    .carrier-glance .nav-tabs .nav-link.active {
        color: #0284c7 !important;
        border-bottom: 3px solid #00aef1 !important;
        background: rgba(0, 174, 241, 0.05);
    }
    .carrier-glance .tab-icon {
        display: inline-flex;
        align-items: center;
    }
    .carrier-glance .tab-icon img {
        width: 20px;
        height: 20px;
        object-fit: contain;
    }

    /* Founder Message responsive */
    .founder-thought-box {
        border-radius: 12px;
        border: 2px solid #dae1ef;
        padding: 22px;
        background-color: #f9fbff;
    }
    .founder-name-wrap {
        margin-top: 20px;
    }
    .founder-name-wrap h6 {
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 0;
    }
    .founder-msg-col {
        border-left: 1px solid #cbd5e1;
        padding-left: 28px;
    }

    /* Mission section / tooltip container */
    .custom-tooltip-container {
        display: grid;
        grid-template-columns: 46% 54%;
        gap: 28px;
        margin: 0 !important;
        align-items: start;
    }
    .custom-tooltip-content {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        padding: 28px;
        border-radius: 16px;
        background: #ffffff;
        border: 1px solid #f1f5f9;
        display: block;
    }
    .custom-tooltip-content p {
        font-size: 15px;
        line-height: 1.7;
        color: #334155;
        margin-bottom: 14px;
        word-break: normal;
        overflow-wrap: break-word;
    }
    .custom-tooltip-content p:last-child {
        margin-bottom: 0;
    }
    .custom-tooltip-content ul {
        padding-left: 20px;
        margin-top: 12px;
        margin-bottom: 0;
    }
    .custom-tooltip-content li {
        font-size: 14px;
        line-height: 1.6;
        color: #334155;
        margin-bottom: 6px;
    }

    /* Mission list items */
    .cusom-tooltip-list-item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        padding: 16px;
        border-radius: 14px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        margin-bottom: 14px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .cusom-tooltip-list-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.06);
    }
    .tooltip-icon {
        width: 52px;
        height: 52px;
        min-width: 52px;
        max-width: 52px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #0cc1ba;
        flex-shrink: 0;
        padding: 10px;
    }
    .tooltip-icon.tooltip-icon-1 {
        background: #3b82f6;
    }
    .tooltip-icon.tooltip-icon-2 {
        background: #f59e0b;
    }
    .tooltip-icon.tooltip-icon-3 {
        background: #ec4899;
    }
    .tooltip-icon img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    .custom-tooltip-list-content {
        flex: 1 1 auto;
        min-width: 0;
    }
    .custom-tooltip-list-content h6 {
        font-size: 16px;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 4px;
        line-height: 1.35;
    }
    .custom-tooltip-list-content p {
        font-size: 14px;
        color: #64748b;
        line-height: 1.55;
        margin-bottom: 0;
    }

    @media (max-width: 991px) {
        .perpration-page-banner.common-banner {
            margin-top: 80px !important;
        }
        .carrier-glance {
            padding: 25px 0 !important;
        }
        .carrier-glance .nav-tabs .nav-link {
            padding: 8px 14px;
            font-size: 13px;
        }
        .custom-tooltip-container {
            display: flex !important;
            flex-direction: column !important;
            gap: 20px !important;
        }
        .custom-grid {
            padding: 0 !important;
        }
        .custom-tooltip-content {
            padding: 18px 16px !important;
            border-radius: 12px !important;
        }
        .custom-tooltip-content p,
        .custom-tooltip-content span {
            font-size: 14px !important;
            line-height: 1.6 !important;
        }
        .founder-msg-col {
            border-left: none !important;
            border-top: 1px solid #cbd5e1 !important;
            padding-left: 0 !important;
            padding-top: 18px !important;
            margin-top: 16px !important;
        }
        .founder-name-wrap {
            margin-top: 12px !important;
        }
    }
</style>
<div class="perpration-page-banner common-banner" style="    margin-bottom: 55px;">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        @foreach($banners as $banner)
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('home/aboutus/'.$banner->banner) }}" class="img-fluid" alt="img">
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="carrier-glance">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach($founderThoughts as $key => $founderThought)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="thought-tab{{$key+1}}" data-toggle="tab" href="#thought{{$key+1}}" role="tab" aria-controls="thought" aria-selected="<?= $key == 0 ? 'true' : 'false' ?>">
                            <span class="mr-1 tab-icon">
                                <img class="img-fluid" src="{{ asset('home/aboutus/'.$founderThought?->icon) }}" alt="img">
                                {{$founderThought?->title}}
                            </span>
                        </a>
                    </li>
                    @endforeach
                    @foreach($bannerSectionTwos as $sectionKey => $sectionTwo)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#section-tab{{$sectionKey+1}}" role="tab" aria-controls="section-tab{{$sectionKey+1}}" aria-selected="false">
                            <span class="mr-1 tab-icon">
                                <img src="{{ asset('home/aboutus/'.$sectionTwo->banner) }}"
                                     onerror="this.onerror=null;this.src='{{ asset('website/assets/images/prepration/rocket.png') }}';"
                                     alt="img">
                            </span>
                            {{ ucwords(str_ireplace('mision', 'mission', $sectionTwo->title)) }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach($founderThoughts as $key => $founderThought)
                    <div class="tab-pane <?= $key == 0 ? ' active show ' : '' ?>" id="thought{{$key+1}}" role="tabpanel" aria-labelledby="thought-tab{{$key+1}}">
                        <div class="container px-0">
                            <!-- About 1 - Bootstrap Brain Component -->
                            <section class="">
                                <div class="container px-0">
                                    <div class="row gy-3 gy-md-4 gy-lg-0 founder-thought-box mx-0">
                                        <div class="col-12 col-lg-3 text-center">
                                            <div class="row text-center">
                                                <div class="col founder-pic-wrap">
                                                    <img src="{{asset('home/aboutus/'.$founderThought?->picture)}}" alt="founder" class="img-fluid rounded" loading="lazy">
                                                </div>
                                            </div>
                                            <div class="row text-center founder-name-wrap">
                                                <div class="col">
                                                    <div class="title">
                                                        <h6>{{$founderThought?->name}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-9 founder-msg-col">
                                            {!! $founderThought?->message !!}
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    @endforeach
                    @foreach($bannerSectionTwos as $sectionKey => $sectionTwo)
                    <div class="tab-pane" id="section-tab{{$sectionKey+1}}" role="tabpanel" aria-labelledby="section-tab{{$sectionKey+1}}">
                        <div class="custom-tooltip-container">
                            <div class="add">
                                <div class="custom-grid">
                                    <div class="dummy-image">
                                        <img class="img-fluid" src="{{ asset('website/assets/images/prepration/dummy-img.jpg') }}" alt="img">
                                    </div>
                                    <div class="custom-tooltip-content specialised">
                                        {!! $sectionTwo->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="grid-list">
                                <div class="custom-grid">
                                    <div class="click" data-id="specialised">
                                        <div class="cusom-tooltip-list-item">
                                            <span class="tooltip-icon me-3">
                                                <img src="{{ file_exists(public_path('home/aboutus/'.$sectionTwo->service_a_image)) ? asset('home/aboutus/'.$sectionTwo->service_a_image) : asset('website/assets/images/prepration/icon-1.png') }}"
                                                     onerror="this.onerror=null;this.src='{{ asset('website/assets/images/prepration/icon-1.png') }}';"
                                                     alt="{{ $sectionTwo->service_a }}">
                                            </span>

                                            <div class="custom-tooltip-list-content">
                                                <h6>{{$sectionTwo->service_a}}</h6>
                                                <p>{!! $sectionTwo->service_a_description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="click" data-id="onlineAppointement">
                                        <div class="cusom-tooltip-list-item">
                                            <span class="tooltip-icon tooltip-icon-1 me-3">
                                                <img src="{{ file_exists(public_path('home/aboutus/'.$sectionTwo->service_b_image)) ? asset('home/aboutus/'.$sectionTwo->service_b_image) : asset('website/assets/images/prepration/icon-2.png') }}"
                                                     onerror="this.onerror=null;this.src='{{ asset('website/assets/images/prepration/icon-2.png') }}';"
                                                     alt="{{ $sectionTwo->service_b }}">
                                            </span>

                                            <div class="custom-tooltip-list-content">
                                                <h6>{{$sectionTwo->service_b}}</h6>
                                                {!! $sectionTwo->service_b_description !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="click" data-id="emergency">
                                        <div class="cusom-tooltip-list-item">
                                            <span class="tooltip-icon tooltip-icon-2 me-3">
                                                <img src="{{ file_exists(public_path('home/aboutus/'.$sectionTwo->service_c_image)) ? asset('home/aboutus/'.$sectionTwo->service_c_image) : asset('website/assets/images/prepration/icon-3.png') }}"
                                                     onerror="this.onerror=null;this.src='{{ asset('website/assets/images/prepration/icon-3.png') }}';"
                                                     alt="{{ $sectionTwo->service_c }}">
                                            </span>

                                            <div class="custom-tooltip-list-content">
                                                <h6>{{$sectionTwo->service_c}}</h6>
                                                {!! $sectionTwo->service_c_description !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="click" data-id="suppport">
                                        <div class="cusom-tooltip-list-item">
                                            <span class="tooltip-icon tooltip-icon-3 me-3">
                                                <img src="{{ file_exists(public_path('home/aboutus/'.$sectionTwo->service_d_image)) ? asset('home/aboutus/'.$sectionTwo->service_d_image) : asset('website/assets/images/prepration/icon-4.png') }}"
                                                     onerror="this.onerror=null;this.src='{{ asset('website/assets/images/prepration/icon-4.png') }}';"
                                                     alt="{{ $sectionTwo->service_d }}">
                                            </span>

                                            <div class="custom-tooltip-list-content">
                                                <h6>{{$sectionTwo->service_d}}</h6>
                                                {!! $sectionTwo->service_d_description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!--SECOND SECTION-->
<div class="maximize-value">
    <section>
        <div class="subscribe-off comm-p-t-b">
            <div class="container">
                <div class="comm-tit-ani tit ani-tit pb-2">
                    <p>{{$bannerSectionThreeHeader?->section_remarks}}</p>
                    @if($bannerSectionThreeHeader?->section_title)
                    <h2>{!! wrapHalfTitleInSpan($bannerSectionThreeHeader?->section_title) !!}<br></h2><span class="line"></span>
                    @endif
                </div>
                <div class="row">
                    @foreach($bannerSectionThrees as $bannerSectionThree)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12 meet-experts wow-ani ani-strt">
                        <div class="maximize-value-widget" style="max-height: 260px;min-height: 260px;">
                            <div class="maximize-icon">
                                <img src="{{ asset('home/aboutus/'.$bannerSectionThree->image) }}" alt="maximize-icon">
                            </div>
                            <h6>{{$bannerSectionThree->title}}</h6>
                            <p style="max-height: 88px;overflow:hidden">{!!$bannerSectionThree->description!!}</p>
                        </div>
                    </div>
                    @endforeach
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
            <h2>{!! wrapHalfTitleInSpan($bannerSectionFourHeader?->section_title) !!}<br></h2><span class="line"></span>
            <h6>{{$bannerSectionFourHeader?->section_remarks}}</h6>
        </div>
        <div class="container">
            <div class="row">
                <!--TRAVEL EXPERTS IMG AND NAME -->
                @foreach($bannerSectionFours as $bannerSectionFour)
                <div class="ani-eql col-lg-3 col-md-6 meet-experts wow-ani ani-strt">
                    <!--TRAVEL EXPERTS IMG-->
                    <div class="travel-exp-1">
                        <h4>{{$bannerSectionFour->title}}</h4>
                        <img src="{{ asset('home/aboutus/'.$bannerSectionFour->image)}}" alt="img">
                        <h5>{!!$bannerSectionFour->description!!}</h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<div class="our-values">
    <div class="container">
        <div class="comm-tit-ani tit ani-tit text-center pb-2">
            <p>{{$bannerSectionFiveHeader?->section_remarks}}</p>
            <h2>{!! wrapHalfTitleInSpan($bannerSectionFiveHeader?->section_title) !!}<br></h2><span class="line"></span>
        </div>
        <div class="row">
            @foreach($bannerSectionFives as $bannerSectionFive)
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="our-values-widget d-flex" style="max-height: 137px;">
                    <div class="our-values-icon mr-3">
                        <img src="{{ asset('home/aboutus/'.$bannerSectionFive->image) }}" alt="icon">
                    </div>
                    <div class="our-values-widget-content" style="max-height: 78px;overflow: hidden;">
                        <h6>{{$bannerSectionFive->title}}</h6>
                        {!!$bannerSectionFive->description!!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- SECTION: TESTIMONIALS-->
@if($corporateTestimonials->count())
<section>
    <div class="testimonails-head what-client-say">
        <div class="testimonails">
            <div class="container">
                <div class="comm-tit-ani tit ani-tit text-center pb-2">
                    <p>What</p>
                    <h2>Our Institute <span>say</span><br></h2><span class="line"></span>
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
                                            <p class="card-text mt-3">{!! $corporateTestimonial->message !!}</p>
                                        </div>

                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- SECTION: BRANDS -->

<div class="our-values strategy-consult">
    <div class="container">
        <div class="comm-tit-ani tit ani-tit text-center pb-2">
            <h2>{!! wrapHalfTitleInSpan($bannerSectionSixHeader?->section_title) !!}<br></h2><span class="line"></span>
            <h6 class="mb-5">{{$bannerSectionSixHeader?->section_remarks}}</h6>
        </div>
        <div class="row">
            @foreach($bannerSectionSixs as $bannerSectionSix)
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="our-values-widget d-flex">
                    <div class="our-values-icon mr-3">
                        <img src="{{ asset('home/aboutus/'.$bannerSectionSix->image) }}" alt="icon">
                    </div>
                    <div class="our-values-widget-content" style="max-height: 102px;overflow: hidden;">
                        <h6>{{$bannerSectionSix->title}}</h6>
                        {!!$bannerSectionSix->description!!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


{{-- <div class="contact-wave-effect ">
        <div class="ocean">
            <div class="wave"></div>
        </div>
    </div> --}}
@endsection