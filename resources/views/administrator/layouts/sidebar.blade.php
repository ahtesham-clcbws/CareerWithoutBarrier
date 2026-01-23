<style>
    .sideBarContent {
        background: #fff !important;
        color: #000 !important;
    }

    .sideBarContent:hover {
        background: #414040 !important;
        color: #fff !important;
    }

    #dropdownMenuLink:hover {
        background: #414040 !important;
        color: #fff !important;
    }

    .nav_icon {
        margin-right: 5px;
    }

    .sidebar-nav li a p {
        font-weight: 300 !important;
        font-size: inherit !important;
    }
</style>
<!-- Sidebar -->
<nav class=" sidebar navbar-inverse fixed-top elevation-4" id="sidebar-wrapper" role="navigation"
    style="  font-family: 'Sansita', sans-serif;  font-style: italic !important;overflow-y: hidden;">
    <div class="sidebar-header shadow mb-2">
        <div class="sidebar-brand">
            <div class="info d-flex">
                <img src="{{asset('website/assets/images/fav-icon.png')}}"
                    style="width:40px; height: 40px; margin: 0 10px 0 5px !important">
                <span class="text-left" style="font-size: 14px;">
                    <span class="font-weight-bold">Admin panel</span><br />
                    <span class="text-primary">{{auth()->user()->name}}</span>
                </span>
            </div>
        </div>
    </div>
    <ul class="nav sidebar-nav mt-1"
        style="height: calc(100vh - 68px) !important; overflow-y: auto !important; margin-bottom: 0 !important; padding-bottom: 10px !important;">
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('admin.home')}}">
                    <img src="{{asset('admin/icons/Dashboard.png')}}" alt="" class="nav_icon">
                    <p class="content">Dashboard</p>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('file.upload')}}"
                    role="button">
                    <img src="{{asset('admin/icons/UploadImage.png')}}" alt="" class="nav_icon">
                    <p class="content">Upload Image</p>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown  open show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="{{asset('admin/icons/HomePageMaster.png')}}" alt="" class="nav_icon">
                    <p class="content">Home Page Master</p>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" x-placement="top-start">
                    <a class="dropdown-item" href="{{route('admin.home.slider')}}">Slider Banner</a>
                    <a class="dropdown-item" href="{{route('admin.home.courseList')}}">Courses List</a>
                    <a class="dropdown-item" href="{{route('admin.home.govtwebsite')}}">Govt. website List</a>
                    <a class="dropdown-item" href="{{route('admin.home.faq')}}">Faq List</a>
                    <a class="dropdown-item" href="{{ route('news.blognews') }}">News</a>
                    <a class="dropdown-item" href="{{ route('news.notification') }}">Notification</a>
                    <a class="dropdown-item" href="{{ route('admin.home.eprospectus') }}">E-Prospectus</a>
                    <a class="dropdown-item" href="{{ route('admin.home.ourJourney') }}">Our Journey</a>
                    <a class="dropdown-item" href="{{ route('admin.home.ourContributor') }}">Our Contributor</a>
                    <a class="dropdown-item" href="{{ route('admin.home.benefit') }}">Our Benefits</a>
                </div>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('admin.aboutus')}}">
                    <img src="{{asset('admin/icons/AboutUs.png')}}" alt="" class="nav_icon">
                    <p class="content">About Us Page Master</p>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('admin.scholarship')}}">
                    <img src="{{asset('admin/icons/ScholarshipPage.png')}}" alt="" class="nav_icon">
                    <p class="content">Scholarship Page</p>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('admin.testimonialList')}}">
                    <img src="{{asset('admin/icons/Testimony1.png')}}" alt="" class="nav_icon">
                    <p class="content">Testimonial List</p>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('admin/icons/DiscountVoucher.png')}}" alt="" class="nav_icon">
                    <p class="content">Discount Voucher</p>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <div class="dropdown-menu" style="color:aquamarine" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('coupon.createCoupon')}}">Create Coupon</a>
                    <a class="dropdown-item" href="{{route('coupon.lists')}}">Coupon List</a>
                    <!-- <a class="dropdown-item" href="#">Applied Coupon</a>
          <a class="dropdown-item" href="#">Issued Coupon</a> -->
                </div>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('institute.list.new')}}">
                    <img src="{{asset('admin/icons/InstituteEnquiry.png')}}" alt="" class="nav_icon">
                    <p class="content">New Institute Enquiry</p>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('institute.list.signup')}}">
                    <img src="{{asset('admin/icons/SignUp.png')}}" alt="" class="nav_icon">
                    <p class="content">SignUp Institute</p>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('institute.list')}}">
                    <img src="{{asset('admin/icons/ApprovedInstitute.png')}}" alt="" class="nav_icon">
                    <p class="content">Approved Institute</p>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('institute.couponRequests')}}">
                    <img src="{{asset('admin/icons/DiscountVoucher.png')}}" style="filter: invert(1);" alt="" class="nav_icon">
                    <p class="content">New Coupon Requests</p>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </li>

        <li>
            <div class="dropdown active open show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent " style="color:#000 !important;" href="#"
                    role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="true">
                    <img src="{{asset('admin/icons/Students.png')}}" alt="" class="nav_icon">
                    <p class="content">Student</p>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" x-placement="top-start">
                    <a class="dropdown-item" href="{{route('admin.studentListRegistered')}}">New Student</a>
                    <a class="dropdown-item" href="{{route('admin.studentList')}}">Student List</a>
                    {{-- <a class="dropdown-item" href="{{route('admin.studentRollList')}}">Student Roll No</a> --}}
                    <a class="dropdown-item" href="{{route('admin.student-roll-list')}}">Student Roll No</a>
                    <a class="dropdown-item" href="{{route('admin.studentExamCenter')}}">Allot Exam Center</a>
                    <a class="dropdown-item" href="{{route('admin.student.result')}}">Student Result</a>
                </div>
            </div>
        </li>
        <li>
            <div class="dropdown active open show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent " style="color:#000 !important;" href="#"
                    role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="true">
                    <img src="{{asset('admin/icons/Setting.png')}}" alt="" class="nav_icon">
                    <p class="content">Settings</p>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" x-placement="top-start">
                    <a class="dropdown-item" href="{{route('payment-settings.store')}}">Payment Settings</a>
                    <a class="dropdown-item" href="{{route('admin.mobile_number')}}">Mobile Number</a>
                    <a class="dropdown-item" href="{{route('admin.state-settings')}}">States</a>
                    <a class="dropdown-item" href="{{route('admin.important-links')}}">Important Links</a>
                    <a class="dropdown-item" href="{{route('admin.district-settings')}}">Districts</a>
                    <a class="dropdown-item" href="{{route('admin.scholarship-forms')}}">Scholarship Forms</a>
                    <a class="dropdown-item" href="{{route('admin.policy-pages')}}">Policy Pages</a>
                    <a class="dropdown-item" href="{{route('settings.popup')}}">Popup Settings</a>
                    <a class="dropdown-item" href="{{route('settings.resetPortal')}}">Reset Portal</a>
                </div>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('dashboard_eductaion_type')}}"
                    role="button">
                    <img src="{{asset('admin/icons/ScholarshipExam.png')}}" alt="" class="nav_icon">
                    <p class="content">Scholarship exam</p>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown active open show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent " style="color:#000 !important;" href="#"
                    role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="true">
                    <img src="{{asset('admin/icons/ExamCentre.png')}}" alt="" class="nav_icon">
                    <p class="content">Exam Center</p>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" x-placement="top-start">
                    <a class="dropdown-item" href="{{route('admin.createCenter')}}">Add Center</a>
                    <a class="dropdown-item" href="{{route('admin.listCenter')}}">List Center</a>
                </div>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('dashboard_subjects')}}">
                    <img src="{{asset('admin/icons/Subject.png')}}" alt="" class="nav_icon">
                    <p class="content">Subjects</p>
                    <i class="bi bi-chevron-right"></i>
                </a>

            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('admin.contactEnquiry')}}">
                    <img src="{{asset('admin/icons/ContactEnquiry.png')}}" alt="" class="nav_icon">
                    <p class="content">New Contact Enquiry</p>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </li>
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle sideBarContent" href="{{route('admin.terms_condition')}}">
                    <img src="{{asset('admin/icons/PDFContentUpload.png')}}" alt="" class="nav_icon">
                    <p class="content">PDF Content Upload</p>
                    <i class="bi bi-chevron-right"></i>
                </a>

            </div>
        </li>




    </ul>
</nav>
<!-- /#sidebar-wrapper -->