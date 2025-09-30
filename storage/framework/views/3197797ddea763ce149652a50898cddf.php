<?php

use Illuminate\Support\Facades\Auth;

$student = Auth::guard('student')->user();
// $student->latestStudentCode;
// $appCode = $student->latestStudentCode;
// $studentPayment = $student->studentPayment->last();

?>

<nav class="main-header navbar navbar-expand-lg navbar-light">
    <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
        <i class=" fa fa-bars"></i>
    </button>
    <h5 class="text-white pt-1">Student Panel</h5>
    
    <ul class="navbar-nav dashboard2" id="menu1-top">

        <?php
        $user = Auth::guard('student')->user(); ?>
        <li class="nav-item">
            <button class="panel-heading last_p studentImage"><?php if($student->photograph): ?>
                <img src="<?php echo e(explode('/', $student->photograph)[0] == 'student' ? '/storage/'.$student->photograph : '/upload/student/'.$student->photograph); ?>">
                <?php else: ?>
                <img src="<?php echo e(asset('student/images/th_5.png')); ?>">
                <?php endif; ?>
            </button>
            <div class="dropdown-content panel-collapse profile-noti">
                <div class="profile-box">
                    <?php if($student->photograph): ?>
                    <img src="<?php echo e(explode('/', $student->photograph)[0] == 'student' ? '/storage/'.$student->photograph : '/upload/student/'.$student->photograph); ?>">
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
</nav><?php /**PATH /run/media/ahtesham/Weblies/CareerWithoutBarrier/career-without-barrier/resources/views/student/layouts/student_menubar.blade.php ENDPATH**/ ?>