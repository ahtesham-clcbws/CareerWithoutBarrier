<!-- resources/views/home.blade.php -->
@extends('layouts.website')

@section('title', 'Home Page')


@section('content')
<div class="perpration-page-banner common-banner mb-0">
    <div class="container text-center">
        <h2 style="font-size:32px">CAREER wthout BARRIER 15 SCHOLARSHIP PROGRAM - 2024</h2>
    </div>
</div>

<div class="scolarship-programe">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                @foreach($scholarShips as $key => $scholarShip)
                <div class="scolarship-leftpanel">
                    <div class="scolarship-leftpanel-widget d-flex" data-target="content{{$key+1}}" style="cursor: pointer;">
                        <div class="scolarship-leftpanel-img mr-3 pr-3">
                            <img style="max-width: 80px;" class="img-fluid" src="{{ asset('home/aboutus/'.$scholarShip->icon) }}" alt="img">
                        </div>
                        <div class="scolarship-leftpanel-content text-center">
                            <div class="career-logo">
                                <img class="img-fluid" src="{{ asset('website/assets/images/prepration/career-logo.jpg') }}" alt="img">
                            </div>
                            <h4>{{$scholarShip->educationType?->name}}</h4>
                            <p>{{$scholarShip->remark}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                @foreach($scholarShips as $key => $scholarShip)
                <div class="scolarship-rightpanel-content text-center content{{$key+1}}" style="{{$key == 0 ? '' : 'display:none'}}">
                    <div class="scolarship-programe-img">
                        <img class="img-fluid" src="{{ asset('home/aboutus/'.$scholarShip->picture) }}" alt="img">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@foreach($scholarShips as $key => $scholarShip)
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

<div class="career-overview career-overview-content content{{$key+1}}" style="{{$key == 0 ? '' : 'display:none'}}">
    <div class="container">
        <div class="career-overview-header d-flex mb-5 align-items-center flex-wrap">
            <h2 class="mr-auto mb-0">{{$scholarShip->educationType?->name}}</h2>
            <div class="e-prospectus d-flex align-items-center">
                @if(in_array($prospectusExtension, $imageExtensions))
                <a href="#" class="d-flex align-items-center mr-3 e-prospectus-link">
                    <img class="mr-2" src="{{ asset($prospectusPath) }}" alt="icon">
                    <span>E-prospectus</span>
                </a>
                @else
                <a href="{{ asset($prospectusPath) }}" class="d-flex align-items-center mr-3 e-prospectus-link" target="_blank">
                    <span>E-prospectus (PDF)</span>
                </a>
                @endif

                @if(in_array($guidelineExtension, $imageExtensions))
                <a href="#" class="d-flex align-items-center e-prospectus-link">
                    <img class="mr-2" src="{{ asset($guidelinePath) }}" alt="icon">
                    <span>Guidelines</span>
                </a>
                @else
                <a href="{{ asset($guidelinePath) }}" class="d-flex align-items-center e-prospectus-link" target="_blank">
                    <span>Guidelines (PDF)</span>
                </a>
                @endif
            </div>
        </div>
        @if($scholarOverview?->overview)
        <div class="career-overview-content content{{$key+1}}">
            {!! str_replace('img','img style="max-width: 100%;"',$scholarOverview->overview) !!}
        </div>
        @endif
    </div>
</div>
@endforeach

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
@endsection