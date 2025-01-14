@extends('administrator.layouts.master')
@section('title')
Home
@endsection
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <h2>Dashboard</h2>
        <div class="row">

            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="{{route('admin.studentList')}}" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>New Students</h6>
                                <h3> <p class="text-black">{{$newStudents}}</p></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{asset('admin/icons/Students.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="{{route('coupon.lists')}}" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Applied Voucher</h6>
                                <h3> <p class="text-black">{{$appliedCount}}</p></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{asset('admin/icons/DiscountVoucher.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="{{route('institute.list.new')}}" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>New Institude Enquiry</h6>
                                <h3> <p class="text-black">{{$newInstituteInquiry}}</p></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{asset('admin/icons/SignUp.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="{{route('institute.list.signup')}}" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>New Institude Signup</h6>
                                <h3> <p class="text-black">{{$insititute}}</p></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{asset('admin/icons/ApprovedInstitute.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="{{route('institute.list')}}" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Approved Institude</h6>
                                <h3> <p class="text-black">{{$APPinsititute}}</p></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{asset('admin/icons/ApprovedInstitute.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="{{route('admin.contactEnquiry')}}" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>New Contact Enquiry</h6>
                                <h3> <p class="text-black">{{$contactInfo}}</p></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{asset('admin/icons/ContactEnquiry.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="{{route('admin.testimonialList')}}" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Feedback/ review (Testimony)</h6>
                                <h3> <p class="text-black">{{$testimonials}}</p></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{asset('admin/icons/Testimony1.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>



            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <a href="{{route('dashboard_subjects')}}" class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Subjects</h6>
                                <h3> <p class="text-black">{{$subjects}}</p></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{asset('admin/icons/Subject.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- /#page-content-wrapper -->
    @endsection('content')