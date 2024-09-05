<nav class="main-header navbar navbar-expand-lg navbar-light">
   <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
     <i class=" fa fa-bars"></i> 
   </button>

   <ul class="navbar-nav dashboard2" id="menu1-top">
      <li class="nav-item search-box-css" style="margin-right: 38px;">
         <button class="panel-heading"> <i class="fa fa-search" aria-hidden="true"></i> </button> 
         <div class="dropdown-content panel-collapse"> <input type="text" placeholder="Search....."> <button class="res_btn">Result</button> </div>
      </li>
     
      <?php use Illuminate\Support\Facades\Auth;
      $corporate = Auth::guard('corporate')->user();

      ?> 
      <li class="nav-item">
         <button class="panel-heading last_p">@if($corporate->attachment_profile)
         <img src="{{asset('upload/corporate/')}}/{{$corporate->photograph}}">
            @else
             <img src="{{asset('student/images/th_5.png')}}">
            @endif           
            </button> 
         <div class="dropdown-content panel-collapse profile-noti">
            <div class="profile-box">
            @if($corporate->photograph)
         <img src="{{asset('upload/corporate/')}}/{{$corporate->photograph}}">
            @else
             <img src="{{asset('student/images/th_5.png')}}">
            @endif 
               <h6>{{ucfirst($corporate->name)}}</h6>
               <!-- <p>Course: </p> --> 
            </div>
            <ul>
                <li><a href="{{ route('corporate.profilePage')}}"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Profile</span></a>
               </li>
               <li><a href="{{ route('corporate.changePassword')}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span> Change Password</span></a></li>
               <!-- <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Profile</span></a></li> <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span> Setting</span></a></li> <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span> Offers</span></a></li> <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i><span> Information</span></a></li> <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i><span> Activity</span></a></li> --> 
               <li class="last_rad"><a href="{{route('corporate.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i><span> Log Out</span></a></li>
            </ul>
         </div>
      </li>
   </ul>
</nav>