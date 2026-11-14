<!-- resources/views/website/scholarship.blade.php -->
@extends('layouts.website')

@section('title', 'Scholarship Program - Career Without Barrier')

@section('content')
    <style>
        .scholarship-top-banner {
            background-color: #f26b3c;
        }

        .scholarship-main-title {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .scholarship-sub-title {
            font-size: 20px;
            opacity: 0.95;
            font-weight: 500;
        }

        .scolarship-programe {
            padding: 60px 0;
            background-color: #fff;
        }

        .scolarship-interactive-container {
            background-color: #f8fafc;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            border: 1px solid #edf2f7;
            position: relative;
        }

        .scolarship-leftpanel-group {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .scolarship-leftpanel-widget {
            background: #ffffff;
            border-radius: 14px;
            padding: 16px 20px;
            border: 2px solid transparent;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
            position: relative;
        }

        .scolarship-leftpanel-widget:hover {
            border-color: #fed7aa;
            transform: translateY(-1px);
        }

        .scolarship-leftpanel-widget.active {
            background: #fff8f5;
            box-shadow: 0 8px 24px rgba(242, 107, 60, 0.12);
            border-color: #f26b3c;
        }

        .scolarship-leftpanel-img {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            margin-right: 14px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            padding: 4px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.06);
        }

        .scolarship-leftpanel-img img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .scolarship-leftpanel-content {
            text-align: left !important;
            flex-grow: 1;
            min-width: 0;
        }

        .scolarship-leftpanel-content h4 {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
            line-height: 1.35;
            transition: color 0.2s ease;
        }

        .scolarship-leftpanel-widget.active .scolarship-leftpanel-content h4 {
            color: #f26b3c;
        }

        .scolarship-leftpanel-content p {
            font-size: 13px;
            color: #64748b;
            margin: 4px 0 0 0;
            line-height: 1.45;
        }

        .scolarship-leftpanel-content .subtitle {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #f26b3c;
            margin-bottom: 2px;
        }

        .scolarship-active-indicator {
            color: #cbd5e1;
            font-size: 14px;
            margin-left: 8px;
            transition: all 0.2s ease;
        }

        .scolarship-leftpanel-widget.active .scolarship-active-indicator {
            color: #f26b3c;
            transform: translateX(3px);
        }

        .scolarship-rightpanel-container {
            border-radius: 16px;
            overflow: hidden;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.08);
            border: 1px solid #f1f5f9;
        }

        .scolarship-rightpanel-content {
            width: 100%;
        }

        .scolarship-rightpanel-content img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 16px;
        }

        .scolarship-swipe-hint {
            display: none;
        }

        /* Career Overview Section */
        .career-overview {
            padding: 50px 0 70px 0;
            background: #fff;
        }

        .career-overview-header {
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 20px;
        }

        .career-overview-header h2 {
            border-left: 4px solid #f26b3c;
            padding-left: 16px;
            font-weight: 800;
            font-size: 26px;
            color: #0f172a;
            letter-spacing: -0.3px;
        }

        .e-prospectus-link {
            background: #fff7ed;
            color: #ea580c !important;
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 13px;
            transition: all 0.2s;
            border: 1px solid #fed7aa;
            display: inline-flex;
            align-items: center;
            text-decoration: none !important;
        }

        .e-prospectus-link:hover {
            background: #f26b3c;
            color: #fff !important;
            border-color: #f26b3c;
            transform: translateY(-1px);
        }

        .career-overview-body {
            color: #334155;
            font-size: 15px;
            line-height: 1.7;
            padding-top: 25px;
        }

        .career-overview-body table {
            display: block !important;
            width: 100% !important;
            max-width: 100% !important;
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch !important;
            border-collapse: collapse !important;
            margin: 24px 0 !important;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }

        .career-overview-body table td,
        .career-overview-body table th {
            padding: 10px 14px !important;
            border: 1px solid #e2e8f0 !important;
            font-size: 13px !important;
            line-height: 1.5 !important;
        }

        .career-overview-body ul {
            padding-left: 20px;
        }

        .career-overview-body li {
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .career-overview-body hr {
            border-color: #e2e8f0;
            margin: 24px 0;
        }

        /* Mobile Responsive View */
        @media (max-width: 991px) {
            .scholarship-main-title {
                font-size: 24px;
            }

            .scholarship-sub-title {
                font-size: 15px;
                line-height: 1.4;
            }

            .scolarship-programe {
                padding: 24px 0 35px 0;
            }

            .scolarship-interactive-container {
                background-color: transparent !important;
                padding: 0 !important;
                box-shadow: none !important;
                border: none !important;
                border-radius: 0 !important;
            }

            .scolarship-swipe-hint {
                display: flex !important;
                align-items: center;
                justify-content: space-between;
                font-size: 11px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                color: #94a3b8;
                margin-bottom: 8px;
                padding: 0 4px;
            }

            .scolarship-swipe-hint i {
                color: #f26b3c;
            }

            .scolarship-leftpanel-group {
                display: flex !important;
                flex-direction: row !important;
                overflow-x: auto !important;
                -webkit-overflow-scrolling: touch !important;
                scroll-snap-type: x mandatory;
                gap: 12px !important;
                padding: 4px 4px 14px 4px !important;
                margin: 0 -15px 15px -15px !important;
                padding-left: 15px !important;
                padding-right: 15px !important;
                scrollbar-width: none;
            }

            .scolarship-leftpanel-group::-webkit-scrollbar {
                display: none;
            }

            .scolarship-leftpanel-widget {
                flex: 0 0 80% !important;
                max-width: 290px !important;
                min-width: 240px !important;
                scroll-snap-align: center;
                margin-bottom: 0 !important;
                background: #ffffff !important;
                border: 2px solid #e2e8f0 !important;
                border-radius: 14px !important;
                padding: 12px 14px !important;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04) !important;
            }

            .scolarship-leftpanel-widget.active {
                border-color: #f26b3c !important;
                background: #ffffff !important;
                box-shadow: 0 6px 20px rgba(242, 107, 60, 0.16) !important;
            }

            .scolarship-leftpanel-widget.active::after {
                content: '';
                position: absolute;
                bottom: -2px;
                left: 16px;
                right: 16px;
                height: 3px;
                background: #f26b3c;
                border-radius: 3px 3px 0 0;
            }

            .scolarship-leftpanel-widget.active .scolarship-leftpanel-content h4 {
                color: #f26b3c !important;
            }

            .scolarship-leftpanel-img {
                width: 42px;
                height: 42px;
                margin-right: 10px;
            }

            .scolarship-leftpanel-content h4 {
                font-size: 14px;
            }

            .scolarship-leftpanel-content p {
                font-size: 12px;
                white-space: normal;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .scolarship-rightpanel-container {
                margin-top: 6px;
                border-radius: 14px;
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
            }

            .career-overview {
                padding: 25px 0 45px 0;
            }

            .career-overview-header {
                flex-direction: column !important;
                align-items: flex-start !important;
                margin-bottom: 20px !important;
                padding-bottom: 16px !important;
            }

            .career-overview-header h2 {
                font-size: 20px !important;
                border-left-width: 3px !important;
                padding-left: 12px !important;
                width: 100%;
                margin-bottom: 14px !important;
            }

            .e-prospectus {
                width: 100% !important;
                display: flex !important;
                flex-direction: row !important;
                gap: 8px !important;
            }

            .e-prospectus-link {
                flex: 1 1 0 !important;
                justify-content: center !important;
                padding: 9px 10px !important;
                font-size: 12px !important;
                margin-right: 0 !important;
                text-align: center;
            }

            .career-overview-body {
                font-size: 14px !important;
                line-height: 1.65 !important;
                padding-top: 15px;
            }
        }
    </style>

    <div class="w-100 scholarship-top-banner">
        <div class="container text-center py-4 py-md-5">
            <h2 class="text-white scholarship-main-title">CAREER without BARRIER</h2>
            <p class="text-white mb-0 scholarship-sub-title">14th Certified Annual Scholarship Program - 2026</p>
        </div>
    </div>

    <div class="scolarship-programe">
        <div class="container">
            <div class="scolarship-interactive-container">
                <div class="scolarship-swipe-hint">
                    <span>Select Scholarship Program</span>
                    <span><i class="fa fa-hand-o-right mr-1"></i> Swipe</span>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12 mb-3 mb-lg-0">
                        <div class="scolarship-leftpanel-group">
                            @foreach ($scholarShips as $key => $scholarShip)
                                <div class="scolarship-leftpanel-widget {{ $key == 0 ? 'active' : '' }}" data-target="content{{ $key + 1 }}">
                                    <div class="scolarship-leftpanel-img">
                                        <img class="img-fluid"
                                             src="{{ asset('home/aboutus/' . $scholarShip->icon) }}"
                                             onerror="this.onerror=null;this.src='{{ asset('website/assets/images/icons/scholarship.png') }}';"
                                             alt="{{ $scholarShip->educationType?->name }}">
                                    </div>
                                    <div class="scolarship-leftpanel-content">
                                        @if($scholarShip->subtitle)
                                            <span class="subtitle">{{ $scholarShip->subtitle }}</span>
                                        @endif
                                        <h4>{{ $scholarShip->educationType?->name }}</h4>
                                        <p>{{ $scholarShip->remark }}</p>
                                    </div>
                                    <div class="scolarship-active-indicator d-none d-lg-block">
                                        <i class="fa fa-chevron-right"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="scolarship-rightpanel-container">
                            @foreach ($scholarShips as $key => $scholarShip)
                                <div class="scolarship-rightpanel-content content{{ $key + 1 }}"
                                    style="<?= $key == 0 ? '' : 'display:none' ?>">
                                    <img class="img-fluid"
                                         src="{{ asset('home/aboutus/' . $scholarShip->picture) }}"
                                         onerror="this.onerror=null;this.src='{{ asset('website/assets/images/placeholder.webp') }}';"
                                         alt="{{ $scholarShip->educationType?->name }}"
                                         loading="lazy">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($scholarShips as $key => $scholarShip)
        <?php
        $imageExtensions = ['jpeg', 'jpg', 'png', 'jpeg', 'gif'];
        $scholarOverview = $scholarShip->overview;
        $prospectusUrl = null;
        $guidelineUrl = null;
        $prospectusExtension = null;
        $guidelineExtension = null;

        if ($scholarOverview) {
            $pPath = 'home/eprospectus/' . $scholarOverview->prospectus;
            $gPath = 'home/eprospectus/' . $scholarOverview->guideline;

            $prospectusUrl = \Illuminate\Support\Facades\Storage::disk('public')->exists($pPath) 
                ? \Illuminate\Support\Facades\Storage::disk('public')->url($pPath) 
                : asset($pPath);

            $guidelineUrl = \Illuminate\Support\Facades\Storage::disk('public')->exists($gPath) 
                ? \Illuminate\Support\Facades\Storage::disk('public')->url($gPath) 
                : asset($gPath);

            $prospectusExtension = pathinfo($scholarOverview->prospectus, PATHINFO_EXTENSION);
            $guidelineExtension = pathinfo($scholarOverview->guideline, PATHINFO_EXTENSION);
        }
        ?>

        <div class="career-overview career-overview-pane content{{ $key + 1 }}"
            style="<?= $key == 0 ? '' : 'display:none' ?>">
            <div class="container">
                <div class="career-overview-header d-flex align-items-center mb-4 flex-wrap">
                    <h2 class="mb-0 mr-auto">{{ $scholarShip->educationType?->name }}</h2>
                    <div class="e-prospectus d-flex align-items-center flex-wrap">
                        @if ($scholarOverview?->prospectus)
                            @if (in_array($prospectusExtension, $imageExtensions))
                                <a class="d-flex align-items-center e-prospectus-link mr-2 mb-2" href="{{ $prospectusUrl }}" target="_blank">
                                    <i class="fa fa-file-image-o mr-2"></i>
                                    <span>E-prospectus</span>
                                </a>
                            @else
                                <a class="d-flex align-items-center e-prospectus-link mr-2 mb-2" href="{{ $prospectusUrl }}" target="_blank">
                                    <i class="fa fa-file-pdf-o mr-2"></i>
                                    <span>E-prospectus (PDF)</span>
                                </a>
                            @endif
                        @endif

                        @if ($scholarOverview?->guideline)
                            @if (in_array($guidelineExtension, $imageExtensions))
                                <a class="d-flex align-items-center e-prospectus-link mb-2" href="{{ $guidelineUrl }}" target="_blank">
                                    <i class="fa fa-file-image-o mr-2"></i>
                                    <span>Guidelines</span>
                                </a>
                            @else
                                <a class="d-flex align-items-center e-prospectus-link mb-2" href="{{ $guidelineUrl }}" target="_blank">
                                    <i class="fa fa-file-pdf-o mr-2"></i>
                                    <span>Guidelines (PDF)</span>
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
                @if ($scholarOverview?->overview)
                    <div class="career-overview-body">
                        {!! str_replace('img', 'img style="max-width: 100%; height: auto; border-radius: 8px;"', $scholarOverview->overview) !!}
                    </div>
                @endif
            </div>
        </div>
    @endforeach

@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('.scolarship-leftpanel-widget').on('click', function() {
                var targetId = $(this).data('target');
                
                if ($(this).hasClass('active')) return;

                $('.scolarship-leftpanel-widget').removeClass('active');
                $(this).addClass('active');

                // Smoothly center the clicked widget in view on mobile
                if (window.innerWidth < 992) {
                    try {
                        this.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                    } catch (e) {}
                }

                // Seamless transitions
                $('.scolarship-rightpanel-content').stop(true, true).hide();
                $('.scolarship-rightpanel-content.' + targetId).stop(true, true).fadeIn(250);
                
                $('.career-overview-pane').stop(true, true).hide();
                $('.career-overview-pane.' + targetId).stop(true, true).fadeIn(250);
            });
        });
    </script>
@endpush
