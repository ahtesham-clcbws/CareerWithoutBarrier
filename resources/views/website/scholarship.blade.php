<!-- resources/views/home.blade.php -->
@extends('layouts.website')

@section('title', 'Home Page')


@section('content')
    <div class="w-100" style="margin-top:72px;background-color:#f26b3c;">
        <div class="container text-center py-5 pb-4">
            <h2 style="font-size:32px" class="text-white">CAREER without BARRIER</h2>
            <p class="text-white" style="font-size:20px">14th Certified Annual Scholarship Program - 2026</p>
        </div>
    </div>

    <div class="scolarship-programe">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                    @foreach ($scholarShips as $key => $scholarShip)
                        <div class="scolarship-leftpanel mb-3">
                            <div class="scolarship-leftpanel-widget d-flex" data-target="content{{ $key + 1 }}"
                                style="cursor: pointer;">
                                <div class="scolarship-leftpanel-img d-flex justify-content-center align-items-center">
                                    <img class="img-fluid" src="{{ asset('home/aboutus/' . $scholarShip->icon) }}"
                                        alt="img" style="max-width: 80px;">
                                </div>
                                <div class="scolarship-leftpanel-content text-center">
                                    <h4>{{ $scholarShip->educationType?->name }}</h4>
                                    <p>{{ $scholarShip->remark }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                    @foreach ($scholarShips as $key => $scholarShip)
                        <div class="scolarship-rightpanel-content content{{ $key + 1 }} h-100 text-center"
                            style="<?= $key == 0 ? '' : 'display:none' ?>">
                            <div class="scolarship-programe-img h-100">
                                <img class="img-fluid" src="{{ asset('home/aboutus/' . $scholarShip->picture) }}"
                                    alt="img">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @foreach ($scholarShips as $key => $scholarShip)
        <?php
        $imageExtensions = ['jpeg', 'jpg', 'png', 'jpeg', 'gif'];
        $prospectusPath = null;
        $guidelinePath = null;
        $prospectusExtension = null;
        $guidelineExtension = null;
        
        $scholarOverview = $scholarShip->overview;
        if ($scholarOverview) {
            $prospectusPath = 'home/aboutus/' . $scholarOverview->prospectus;
            $guidelinePath = 'home/aboutus/' . $scholarOverview->guideline;
            $prospectusExtension = pathinfo($prospectusPath, PATHINFO_EXTENSION);
            $guidelineExtension = pathinfo($guidelinePath, PATHINFO_EXTENSION);
        }
        ?>

        <div class="career-overview career-overview-content content{{ $key + 1 }}"
            style="<?= $key == 0 ? '' : 'display:none' ?>">
            <div class="container">
                <div class="career-overview-header d-flex align-items-center mb-5 flex-wrap">
                    <h2 class="mb-0 mr-auto">{{ $scholarShip->educationType?->name }}</h2>
                    <div class="e-prospectus d-flex align-items-center">
                        @if (in_array($prospectusExtension, $imageExtensions))
                            <a class="d-flex align-items-center e-prospectus-link mr-3" href="#">
                                <img class="mr-2" src="{{ asset($prospectusPath) }}" alt="icon">
                                <span>E-prospectus</span>
                            </a>
                        @else
                            <a class="d-flex align-items-center e-prospectus-link mr-3" href="{{ asset($prospectusPath) }}"
                                target="_blank">
                                <span>E-prospectus (PDF)</span>
                            </a>
                        @endif

                        @if (in_array($guidelineExtension, $imageExtensions))
                            <a class="d-flex align-items-center e-prospectus-link" href="#">
                                <img class="mr-2" src="{{ asset($guidelinePath) }}" alt="icon">
                                <span>Guidelines</span>
                            </a>
                        @else
                            <a class="d-flex align-items-center e-prospectus-link" href="{{ asset($guidelinePath) }}"
                                target="_blank">
                                <span>Guidelines (PDF)</span>
                            </a>
                        @endif
                    </div>
                </div>
                @if ($scholarOverview?->overview)
                    <div class="career-overview-content content{{ $key + 1 }}">
                        {!! str_replace('img', 'img style="max-width: 100%;"', $scholarOverview->overview) !!}
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


                if ($('.scolarship-leftpanel-widget').hasClass('active')) {
                    $('.scolarship-leftpanel-widget').removeClass('active')
                }

                $(this).addClass('active')

                $('.scolarship-rightpanel-content').hide();
                $('.career-overview-content').hide();
                // Show the targeted content
                $('.' + targetId).show();
            });
        });
    </script>
@endpush
