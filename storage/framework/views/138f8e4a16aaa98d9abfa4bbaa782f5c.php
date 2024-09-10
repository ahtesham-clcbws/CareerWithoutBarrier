<!-- Sidebar --> <?php

                  use Illuminate\Support\Facades\Auth;

                  $user = Auth::guard('student')->user();

                  $studCode = $user->studentCode->first();
                  ?>

<nav class=" sidebar navbar-inverse fixed-top elevation-4" id="sidebar-wrapper" role="navigation" style="overflow-y: hidden;  font-style: italic !important;">
   <div class="sidebar-header">
      <div class="sidebar-brand">
         <div class="info">
            <a href="<?php echo e(('studentDashboard')); ?>">
               <h5 style="margin-top: 20px;"> Dashboard</h5>
            </a>
            <!-- <img src="<?php echo e(asset('student/images/logo big')); ?> size.png" alt=""> -->
         </div>
      </div>
      <div class="logo_area mb-2">
         <a href="#" class="brand-link"> <img src="<?php echo e(asset('student/images/22.png')); ?>" alt="#" class="brand-image img-circle elevation-3" style="opacity: .8"></a>
         <div class="brand_link_name mb-2">
            <a href="#" class="brand-text font-weight-light director_name"><?php echo e($user->name); ?></a> <!-- <a href="#" class="director_post">Director</a> -->
         </div>
      </div>
   </div>
   <ul class="nav sidebar-nav">
      <li>
         <div class="dropdown show">
            <a class="btn btn-secondary dropdown-toggle" href="<?php echo e(route('studentDashboard')); ?>" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="<?php echo e(asset('student/images/watch.png')); ?>" alt="" class="nav_icon">
               <p>Dashboard</p>
               <i class="fa fa-chevron-right"></i>
            </a>
            <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a> </div> -->
         </div>
         <?php if($user->is_final_submitted): ?>
         <div class="dropdown show">
            <a class="btn btn-secondary" href="<?php echo e(route('students.formReview')); ?>">
               <img src="<?php echo e(asset('student/images/8.png')); ?>" alt="" class="nav_icon">
               <p style="color:#18c968">Application Form</p>
            </a>
         </div>
         <?php endif; ?>
         <?php if($studCode?->is_paid): ?>
         <div class="dropdown show">
            <a class="btn btn-secondary" href="<?php echo e(route('students.admitCardSearch')); ?>">
               <img src="<?php echo e(asset('student/images/12.png')); ?>" alt="" class="nav_icon">
               <p style="color:#18c968">Admid Card</p>
            </a>
         </div>
         <?php endif; ?>
         <?php if($studCode?->is_paid): ?>
         <div class="dropdown show">
            <a class="btn btn-secondary" href="<?php echo e(route('students.resultdownload')); ?>">
               <img src="<?php echo e(asset('student/images/12.png')); ?>" alt="" class="nav_icon">
               <p style="color:#18c968">Result Download</p>
            </a>
         </div>
         <?php endif; ?>
      </li>

   </ul>
</nav>
<!-- /#sidebar-wrapper --><?php /**PATH /home/lkaj6m2w9cvv/public_html/resources/views/student/layouts/sidebar.blade.php ENDPATH**/ ?>