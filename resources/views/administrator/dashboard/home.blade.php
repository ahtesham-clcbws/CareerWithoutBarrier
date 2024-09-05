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
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Approved Institude</h6>
                                    <h3> <a href="{{route('institute.list')}}" class="text-black">{{$APPinsititute}}</a></h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{asset('public/admin/icons/ApprovedInstitute.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Institude Enquiry</h6>
                                    <h3> <a href="{{route('institute.list.new')}}" class="text-black">{{$insititute}}</a></h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{asset('public/admin/icons/InstituteEnquiry.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Contact Enquiry</h6>
                                    <h3> <a href="{{route('admin.contactEnquiry')}}" class="text-black">{{$contactInfo}}</a></h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{asset('public/admin/icons/ContactEnquiry.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Students</h6>
                                    <h3> <a href="{{route('admin.studentList')}}" class="text-black">{{$student}}</a></h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{asset('public/admin/icons/Students.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Subjects</h6>
                                    <h3> <a href="{{route('dashboard_subjects')}}" class="text-black">{{$subjects}}</a></h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{asset('public/admin/icons/Subject.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Testimonial</h6>
                                    <h3> <a href="{{route('admin.testimonialList')}}" class="text-black">{{$testimonials}}</a></h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{asset('public/admin/icons/Testimony1.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Contact Enquiry</h6>
                                    <h3>{{$contactInfo}}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{asset('public/admin/icons/ContactEnquiry.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Students</h6>
                                    <h3>{{@$student}}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{asset('public/admin/icons/Students.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
              
                
              
            </div>
        </div>
    </div>

    <!-- /#page-content-wrapper -->
@endsection('content')
