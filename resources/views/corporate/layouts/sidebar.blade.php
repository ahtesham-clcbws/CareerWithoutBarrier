<!-- Sidebar --> <?php

                    use Illuminate\Support\Facades\Auth;

                    $corporate = Auth::guard('corporate')->user();

                    ?>
<style>
    a {
        pointer-events: cursor;
    }
</style>
<nav class=" sidebar navbar-inverse fixed-top elevation-4" id="sidebar-wrapper" role="navigation" style="overflow-y: hidden;  font-style: italic !important;">
    <div class="sidebar-header">
        <div class="sidebar-brand">
            <div class="info">
                <a href="{{('corporateDashboard')}}">
                    <h5 style="margin-top: 20px;"> Institute Panel</h5>
                </a>
                <!-- <img src="{{asset('corporate/images/logo big')}} size.png" alt=""> -->
            </div>
        </div>
        <div class="logo_area mb-2">
            <a href="{{('corporateDashboard')}}" class="brand-link">
                @if($corporate->attachment)
                <img src="{{ asset(preg_match('/upload2/',$corporate->attachment) ? $corporate->attachment : 'upload/corporate/'.$corporate->attachment)}}" alt="Prifle Dp" class="brand-image img-circle elevation-3" style="opacity: .8">
                @else
                <img src="{{asset('corporate/images/th_5.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
                @endif
            </a>
            <div class="brand_link_name mb-2">
                <a href="{{('corporateDashboard')}}" class="brand-text font-weight-light director_name">{{$corporate->name}}</a>
                <br>
            </div>
        </div>
    </div>
    <ul class="nav sidebar-nav" style="display: block;">
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="{{route('corporateDashboard')}}">
                    <img src="{{asset('student/images/watch.png')}}" alt="" class="nav_icon">
                    <p>Dashboard</p>
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="{{route('corporateStudent')}}">
                    <img src="{{asset('student/images/watch.png')}}" alt="" class="nav_icon">
                    <p>Student List</p>
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="{{route('corporate.couponlist')}}">
                    <img src="{{asset('student/images/watch.png')}}" alt="" class="nav_icon">
                    <p>Coupon List</p>
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" href="{{route('corporate.sayAboutUs')}}">
                    <img src="{{asset('student/images/watch.png')}}" alt="" class="nav_icon">
                    <p>Say About Us</p>
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /#sidebar-wrapper -->