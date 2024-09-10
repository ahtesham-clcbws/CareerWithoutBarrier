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
         <button class="panel-heading last_p"><?php if($corporate->attachment_profile): ?>
         <img src="<?php echo e(asset('public/upload/corporate/')); ?>/<?php echo e($corporate->photograph); ?>">
            <?php else: ?>
             <img src="<?php echo e(asset('student/images/th_5.png')); ?>">
            <?php endif; ?>           
            </button> 
         <div class="dropdown-content panel-collapse profile-noti">
            <div class="profile-box">
            <?php if($corporate->photograph): ?>
         <img src="<?php echo e(asset('public/upload/corporate/')); ?>/<?php echo e($corporate->photograph); ?>">
            <?php else: ?>
             <img src="<?php echo e(asset('student/images/th_5.png')); ?>">
            <?php endif; ?> 
               <h6><?php echo e(ucfirst($corporate->name)); ?></h6>
               <!-- <p>Course: </p> --> 
            </div>
            <ul>
                <li><a href="<?php echo e(route('corporate.profilePage')); ?>"><i class="fa fa-user" aria-hidden="true"></i>
                <span> Profile</span></a>
               </li>
               <li><a href="<?php echo e(route('corporate.changePassword')); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span> Change Password</span></a></li>
               <!-- <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> <span> Profile</span></a></li> <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span> Setting</span></a></li> <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i><span> Offers</span></a></li> <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i><span> Information</span></a></li> <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i><span> Activity</span></a></li> --> 
               <li class="last_rad"><a href="<?php echo e(route('corporate.logout')); ?>"><i class="fa fa-sign-out" aria-hidden="true"></i><span> Log Out</span></a></li>
            </ul>
         </div>
      </li>
   </ul>
</nav><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/corporate/layouts/corporate_menubar.blade.php ENDPATH**/ ?>