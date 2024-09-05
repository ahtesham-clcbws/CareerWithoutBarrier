@extends('administrator.layouts.master')
@section('title')
Generate Coupon
@endsection
@section('content')

<div class="row">
  <h5>
  <div class="panel-heading py-3">Generate CouponCode:</div>
  </h5>
</div>
<div class="row">
  <div class="col-md-8 col-lg-8 col" style="margin-left: auto;margin-right:auto">
    <div class="panel panel-default m-t-15">
 
      <div class="panel-body">
        <div class="card alert">
          <div class="card-body">
            <form action="{{ route('coupon.saveCoupon') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">


                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Prefix<span class="text-danger">*</span></p>
                    <input type="text" name="prefix" class="form-control input-focus" required placeholder="Add Prefix">
                    @error('prefix')
                    {{$message}}
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Name of Coupon<span class="text-danger">*</span></p>
                    <input type="text" name="name" class="form-control input-focus" required placeholder="Enter name of ">
                    @error('name')
                    {{$message}}
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Coupon Type<span class="text-danger">*</span></p>
                    <select class="form-control" id="coupon-type" name="coupon_type">
                        <option value="">Select Coupon Type</option>
                        <option value="special">Special</option>
                        <option value="paid_students">Paid Students</option>
                        <option value="all_students">All Students</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Discount Value Type<span class="text-danger">*</span></p>
                    <select name="discount_type" class="form-control">
                      @error('discount_type')
                      {{$message}}
                      @enderror <option value="">Select Value Type</option>
                      <option value="amount">Rupee</option>
                      <option value="percentage">Percentage</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Discount Value<span class="text-danger">*</span></p>
                    <input type="number" name="discount_value" class="form-control input-focus" required placeholder="Only Number i.e 5">
                    @error('discount_value')
                    {{$message}}
                    @enderror
                  </div>
                </div>
                <!-- <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Discount Value<span class="text-danger">*</span></p>
                    <input type="number" name="discount_value" class="form-control input-focus" required placeholder="Only Number i.e 5">
                    @error('discount_value')
{{$message}}
@enderror                  </div>
                </div> -->

                <div class="col-md-6">
                  <div class="form-group">
                    <p class="text-dark m-b-15 f-s-12">Number of Coupons<span class="text-danger">*</span></p>
                    <input type="number" name="number_of_coupons" class="form-control input-focus" required placeholder="Only Number i.e 5">
                    @error('number_of_coupons')
                    {{$message}}
                    @enderror
                  </div>
                </div>
              </div>
             <div class="row">
              <div class="col text-center"> <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit"></div>
             </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /#page-content-wrapper -->
@endsection('content')