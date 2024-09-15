<nav class="main-header navbar navbar-expand-lg navbar-light">
   <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
      <!-- <span class="hamb-top"></span> <span class="hamb-middle"></span> <span class="hamb-bottom"></span> --> <i class=" fa fa-bars"></i>
   </button>
   <!-- <div class="header-left-box">
      <div class="required_area"> <img src="<?php echo e(asset('student/images/watch.png')); ?>" alt="clock" class="watch_ic"> <span class="required_text"> Required Text </span> <span class="required_num">21</span> </div>
      <div class="required_area"> <img src="<?php echo e(asset('student/images/watch.png')); ?>" alt="clock" class="watch_ic"> <span class="required_text">Required Text</span> <span class="required_num">21</span> </div>
      <div class="required_area"> <img src="<?php echo e(asset('student/images/watch.png')); ?>" alt="clock" class="watch_ic"> <span class="required_text"> Required Text </span> <span class="required_num">21</span> </div>
   </div> -->
   <ul class="navbar-nav dashboard2" id="menu1-top">
      <li class="nav-item search-box-css" style="margin-right: 38px;">
         <button class="panel-heading"> <i class="fa fa-search" aria-hidden="true"></i> </button>
         <div class="dropdown-content panel-collapse"> <input type="text" placeholder="Search....."> <button class="res_btn">Result</button> </div>
      </li>

      <?php

      use Illuminate\Support\Facades\Auth;

      $user = Auth::guard('student')->user(); ?>
      <li class="nav-item">
         <button class="panel-heading last_p"><?php if($student->photograph): ?>
            <img src="<?php echo e(url('upload/student/')); ?>/<?php echo e($student->photograph); ?>">
            <?php else: ?>
            <img src="<?php echo e(asset('student/images/th_5.png')); ?>">
            <?php endif; ?>
         </button>
         <div class="dropdown-content panel-collapse profile-noti">
            <div class="profile-box">
               <?php if($student->photograph): ?>
               <img src="<?php echo e(url('upload/student/')); ?>/<?php echo e($student->photograph); ?>">
               <?php else: ?>
               <img src="<?php echo e(asset('student/images/th_5.png')); ?>">
               <?php endif; ?>
               <h6><?php echo e(ucfirst($user->name)); ?></h6>
               <!-- <p>Course: </p> -->
            </div>
            <ul>
               <li><a href="<?php echo e(route('students.profilePage')); ?>"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Profile</span></a>
               </li>
               <li><a href="<?php echo e(route('students.changePassword')); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span> Change Password</span></a></li>
              <!--  <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span> Offers</span></a></li>
               <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i><span> Information</span></a></li>
               <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i><span> Activity</span></a></li> -->
               <li class="last_rad"><a href="<?php echo e(route('student.logout')); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i><span> Sign Out</span></a></li>
            </ul>
         </div>
      </li>
   </ul>
</nav><?php /**PATH /mnt/01D9961CD1E189D0/BWS/CareerWithoutBarrier/career-without-barrier/resources/views/student/layouts/student_menubar.blade.php ENDPATH**/ ?>