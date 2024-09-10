<!-- Sidebar -->
<nav class=" sidebar navbar-inverse fixed-top elevation-4" id="sidebar-wrapper" role="navigation" style="  font-family: 'Sansita', sans-serif;  font-style: italic !important;overflow-y: hidden;">


  <div class="sidebar-header">
    <div class="sidebar-brand">
      <div class="info">
        <img src="<?php echo e(asset('admin/images/logo big size.png')); ?>" alt="">
      </div>
    </div>
    <div class="logo_area">
      <a href="#" class="brand-link">
        <img src="<?php echo e(asset('admin/images/22.png')); ?>" alt="#" class="brand-image img-circle elevation-3" style="opacity: .8"></a>
      <div class="brand_link_name">
        <a href="#" class="brand-text font-weight-light director_name">Ashutosh Pathak</a>
        <a href="#" class="director_post">Director</a>
      </div>

    </div>
  </div>
  <ul class="nav sidebar-nav">
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>Dashboard</p>
          <i class="fa fa-chevron-right"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>Discount Voucher</p>
          <i class="fa fa-chevron-right"></i>
        </a>

        <div class="dropdown-menu" style="color:aquamarine" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="<?php echo e(route('coupon.createCoupon')); ?>">Create Coupon</a>
          <a class="dropdown-item" href="<?php echo e(route('coupon.lists')); ?>">Coupon List</a>
          <a class="dropdown-item" href="#">Applied Coupon</a>
          <a class="dropdown-item" href="#">Issued Coupon</a>
        </div>
      </div>
    </li>

    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>Corporate</p>
          <i class="fa fa-chevron-right"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Add Corporate</a>
          <a class="dropdown-item" href="<?php echo e(route('institute.list')); ?>">Corporate List</a>
          <a class="dropdown-item" href="#">Verified Corporate</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>Student</p>
          <i class="fa fa-chevron-right"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="<?php echo e(route('admin.studentList')); ?>">All Student</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>My Course Details</p>
          <i class="fa fa-chevron-right"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>My Test & Quizes</p>
          <i class="fa fa-chevron-right"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>My Study Material</p>
          <i class="fa fa-chevron-right"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>My Schedule Tests</p>
          <i class="fa fa-chevron-right"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>My Schedule Tests</p>
          <i class="fa fa-chevron-right"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>Upload & Download</p>
          <i class="fa fa-chevron-right"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>

    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>Solution & Suggestion</p>
          <i class="fa fa-chevron-right"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>Result & Rank</p>
          <i class="fa fa-chevron-right"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>

    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>Revenue & Earning</p>
          <i class="fa fa-chevron-right"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>Site Statics</p>
          <i class="fa fa-chevron-right"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('admin/images/watch.png')); ?>" alt="" class="nav_icon">
          <p>Account Setting</p>
          <i class="fa fa-chevron-right"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </li>

  </ul>
</nav>
<!-- /#sidebar-wrapper --><?php /**PATH /home/lkaj6m2w9cvv/public_html/resources/views/administrator/layouts/sidebar.blade.php ENDPATH**/ ?>