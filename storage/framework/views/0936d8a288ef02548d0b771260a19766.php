<!-- Sidebar --> <?php

                  use Illuminate\Support\Facades\Auth;

                  $corporate = Auth::guard('corporate')->user();

                  ?>
<style>
   a{
      pointer-events: cursor;
   }
</style>
<nav class=" sidebar navbar-inverse fixed-top elevation-4" id="sidebar-wrapper" role="navigation" style="overflow-y: hidden;  font-style: italic !important;">
   <div class="sidebar-header">
      <div class="sidebar-brand">
         <div class="info">
            <a href="<?php echo e(('corporateDashboard')); ?>">
               <h5 style="margin-top: 20px;"> Dashboard</h5>
            </a>
            <!-- <img src="<?php echo e(asset('corporate/images/logo big')); ?> size.png" alt=""> -->
         </div>
      </div>
      <div class="logo_area mb-2">
         <a href="<?php echo e(('corporateDashboard')); ?>" class="brand-link"> 
         <?php if($corporate->attachment_profile): ?>
         <img src="<?php echo e(asset('public/upload/corporate/')); ?>/<?php echo e($corporate->photograph); ?>" alt="Prifle Dp" class="brand-image img-circle elevation-3" style="opacity: .8">
            <?php else: ?>
             <img src="<?php echo e(asset('corporate/images/th_5.png')); ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
            <?php endif; ?> 
         </a>
         <div class="brand_link_name mb-2">
            <a href="<?php echo e(('corporateDashboard')); ?>" class="brand-text font-weight-light director_name"><?php echo e($corporate->name); ?></a>
            <br>
         </div>
      </div>
   </div>
   <ul class="nav sidebar-nav" style="display: block;">
      <li>
         <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="<?php echo e(route('corporateDashboard')); ?>" >
               <img src="<?php echo e(asset('student/images/watch.png')); ?>" alt="" class="nav_icon">
               <p>Dashboard</p>
               <i class="fa fa-chevron-right"></i>
            </a>
         </div>
      </li>
      <li>
         <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="<?php echo e(route('corporateStudent')); ?>" >
               <img src="<?php echo e(asset('student/images/watch.png')); ?>" alt="" class="nav_icon">
               <p>Student List</p>
               <i class="fa fa-chevron-right"></i>
            </a>
         </div>
      </li>
      <li>
         <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="<?php echo e(route('corporate.couponlist')); ?>" >
               <img src="<?php echo e(asset('student/images/watch.png')); ?>" alt="" class="nav_icon">
               <p>Coupon List</p>
               <i class="fa fa-chevron-right"></i>
            </a>
         </div>
      </li>
      <li>
         <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="<?php echo e(route('corporate.sayAboutUs')); ?>" >
               <img src="<?php echo e(asset('student/images/watch.png')); ?>" alt="" class="nav_icon">
               <p>Say About Us</p>
               <i class="fa fa-chevron-right"></i>
            </a>
         </div>
      </li>
   </ul>
</nav>
<!-- /#sidebar-wrapper --><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/corporate/layouts/sidebar.blade.php ENDPATH**/ ?>