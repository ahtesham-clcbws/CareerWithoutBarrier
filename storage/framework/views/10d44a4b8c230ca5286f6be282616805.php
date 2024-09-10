<style>
  .sideBarContent{
      background: #fff !important;
      color: #000 !important;
  }
  .sideBarContent:hover{
      background: #414040 !important;
      color: #fff !important;
  }
  #dropdownMenuLink:hover{
      background: #414040 !important;
      color: #fff !important;
  }
  .content{
      /* padding-left: 10px; */
  }
</style>
<!-- Sidebar -->
<nav class=" sidebar navbar-inverse fixed-top elevation-4" id="sidebar-wrapper" role="navigation" style="  font-family: 'Sansita', sans-serif;  font-style: italic !important;overflow-y: hidden;">
  <div class="sidebar-header">
    <div class="sidebar-brand">
      <div class="info">
        <img src="<?php echo e(asset('website/assets/images/brand/logo.png')); ?>" alt="">
      </div>
    </div>
    <!-- <div class="logo_area">
      <a href="#" class="brand-link">
        <img src="<?php echo e(asset('admin/images/22.png')); ?>" alt="#" class="brand-image img-circle elevation-3" style="opacity: .8"></a>
      <div class="brand_link_name">
        <a href="#" class="brand-text font-weight-light director_name">Admin</a>
        <a href="#" class="director_post">Director</a>
      </div>

    </div> -->
  </div>
  <ul class="nav sidebar-nav">
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="<?php echo e(route('home')); ?>">
          <img src="<?php echo e(asset('public/admin/icons/Dashboard.png')); ?>" alt="" class="nav_icon">
          <p class="content">Dashboard</p>
          <i class="fa fa-chevron-right"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="<?php echo e(route('file.upload')); ?>" role="button">
          <img src="<?php echo e(asset('public/admin/icons/UploadImage.png')); ?>" alt="" class="nav_icon">
          <p class="content">Upload Image</p>
          <i class="fa fa-chevron-right"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="dropdown  open show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent"    role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <img src="<?php echo e(asset('public/admin/icons/HomePageMaster.png')); ?>" alt="" class="nav_icon">
          <p class="content">Home Page Master</p>
          <i class="fa fa-chevron-right"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" x-placement="top-start" >
          <a class="dropdown-item" href="<?php echo e(route('home.slider')); ?>">Slider Banner</a>
          <a class="dropdown-item" href="<?php echo e(route('home.courseList')); ?>">Courses List</a>
          <a class="dropdown-item" href="<?php echo e(route('home.govtwebsite')); ?>">Govt. website List</a>
          <a class="dropdown-item" href="<?php echo e(route('home.faq')); ?>">Faq List</a>
          <a class="dropdown-item" href="<?php echo e(route('news.blognews')); ?>">News</a>
          <a class="dropdown-item" href="<?php echo e(route('news.notification')); ?>">Notification</a>
          <a class="dropdown-item" href="<?php echo e(route('home.eprospectus')); ?>">E-Prospectus</a>
          <a class="dropdown-item" href="<?php echo e(route('home.ourJourney')); ?>">Our Journey</a>
          <a class="dropdown-item" href="<?php echo e(route('home.ourContributor')); ?>">Our Contributor</a>
          <a class="dropdown-item" href="<?php echo e(route('home.benefit')); ?>">Our Benefits</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="<?php echo e(route('admin.aboutus')); ?>">
          <img src="<?php echo e(asset('public/admin/icons/AboutUs.png')); ?>" alt="" class="nav_icon">
          <p class="content">About Us Page Master</p>
          <i class="fa fa-chevron-right"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="<?php echo e(route('admin.scholarship')); ?>">
          <img src="<?php echo e(asset('public/admin/icons/ScholarshipPage.png')); ?>" alt="" class="nav_icon">
          <p class="content">Scholarship Page</p>
          <i class="fa fa-chevron-right"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="<?php echo e(route('admin.testimonialList')); ?>">
          <img src="<?php echo e(asset('public/admin/icons/Testimony1.png')); ?>" alt="" class="nav_icon">
          <p class="content">Testimonial List</p>
          <i class="fa fa-chevron-right"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?php echo e(asset('public/admin/icons/DiscountVoucher.png')); ?>" alt="" class="nav_icon">
          <p class="content">Discount Voucher</p>
          <i class="fa fa-chevron-right"></i>
        </a>

        <div class="dropdown-menu" style="color:aquamarine" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="<?php echo e(route('coupon.createCoupon')); ?>">Create Coupon</a>
          <a class="dropdown-item" href="<?php echo e(route('coupon.lists')); ?>">Coupon List</a>
          <!-- <a class="dropdown-item" href="#">Applied Coupon</a>
          <a class="dropdown-item" href="#">Issued Coupon</a> -->
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="<?php echo e(route('institute.list.new')); ?>">
          <img src="<?php echo e(asset('public/admin/icons/InstituteEnquiry.png')); ?>" alt="" class="nav_icon">
          <p class="content">New Institude Enquiry</p>
          <i class="fa fa-chevron-right"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="<?php echo e(route('institute.list.signup')); ?>">
          <img src="<?php echo e(asset('public/admin/icons/SignUp.png')); ?>" alt="" class="nav_icon">
          <p class="content">SignUp Institude</p>
          <i class="fa fa-chevron-right"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="<?php echo e(route('institute.list')); ?>">
          <img src="<?php echo e(asset('public/admin/icons/ApprovedInstitute.png')); ?>" alt="" class="nav_icon">
          <p class="content">Approved Institude</p>
          <i class="fa fa-chevron-right"></i>
        </a>
      </div>
    </li>

    <li>
      <div class="dropdown active open show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent " style="color:#000 !important;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <img src="<?php echo e(asset('public/admin/icons/Students.png')); ?>" alt="" class="nav_icon">
          <p class="content">Student</p>
          <i class="fa fa-chevron-right"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" x-placement="top-start" >
          <a class="dropdown-item" href="<?php echo e(route('admin.studentList')); ?>">Student List</a>
          <a class="dropdown-item" href="<?php echo e(route('admin.studentRollList')); ?>">Student Roll No</a>
          <a class="dropdown-item" href="<?php echo e(route('admin.studentExamCenter')); ?>">Allot Exam Center</a>
          <a class="dropdown-item" href="<?php echo e(route('admin.student.result')); ?>">Student Result</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown active open show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent " style="color:#000 !important;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <img src="<?php echo e(asset('public/admin/icons/Setting.png')); ?>" alt="" class="nav_icon">
          <p class="content">Settings</p>
          <i class="fa fa-chevron-right"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" x-placement="top-start" >
          <a class="dropdown-item" href="<?php echo e(route('payment-settings.store')); ?>">Payment Settings</a>
          <a class="dropdown-item" href="<?php echo e(route('admin.mobile_number')); ?>">Mobile Number</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="<?php echo e(route('dashboard_eductaion_type')); ?>" role="button">
          <img src="<?php echo e(asset('public/admin/icons/ScholarshipExam.png')); ?>" alt="" class="nav_icon">
          <p class="content">Scholarship exam</p>
          <i class="fa fa-chevron-right"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="dropdown active open show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent " style="color:#000 !important;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <img src="<?php echo e(asset('public/admin/icons/ExamCentre.png')); ?>" alt="" class="nav_icon">
          <p class="content">Exam Center</p>
          <i class="fa fa-chevron-right"></i>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" x-placement="top-start" >
          <a class="dropdown-item" href="<?php echo e(route('admin.createCenter')); ?>">Add Center</a>
          <a class="dropdown-item" href="<?php echo e(route('admin.listCenter')); ?>">List Center</a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="<?php echo e(route('dashboard_subjects')); ?>">
          <img src="<?php echo e(asset('public/admin/icons/Subject.png')); ?>" alt="" class="nav_icon">
          <p class="content">Subjects</p>
          <i class="fa fa-chevron-right"></i>
        </a>

      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="<?php echo e(route('admin.contactEnquiry')); ?>">
          <img src="<?php echo e(asset('public/admin/icons/ContactEnquiry.png')); ?>" alt="" class="nav_icon">
          <p class="content">New Contact Enquiry</p>
          <i class="fa fa-chevron-right"></i>
        </a>
      </div>
    </li>
    <li>
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle sideBarContent" href="<?php echo e(route('admin.terms_condition')); ?>">
          <img src="<?php echo e(asset('public/admin/icons/PDFContentUpload.png')); ?>" alt="" class="nav_icon">
          <p class="content">PDF Content Upload</p>
          <i class="fa fa-chevron-right"></i>
        </a>

      </div>
    </li>

    

    
  </ul>
</nav>
<!-- /#sidebar-wrapper --><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/layouts/sidebar.blade.php ENDPATH**/ ?>