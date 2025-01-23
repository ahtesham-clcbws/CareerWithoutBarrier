@extends('corporate.layouts.master')
@section('content')

<div class="container pagecontentbody ">
    <div class="tab-content">
        <div class="container">

            <h2>Dashboard</h2>
            <div class="row">

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <a href="#" class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Students</h6>
                                    <h3>
                                        <p class="text-black">5</p>
                                    </h3>
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
                        <a href="#" class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>New Students</h6>
                                    <h3>
                                        <p class="text-black">15</p>
                                    </h3>
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
                        <a href="#" class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Vouchers</h6>
                                    <h3>
                                        <p class="text-black">10</p>
                                    </h3>
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
                        <a href="#" class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Testimonials</h6>
                                    <h3>
                                        <p class="text-black">50</p>
                                    </h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{asset('admin/icons/ApprovedInstitute.png')}}" alt="Dashboard Icon" height="100px" width="100px">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection('content')