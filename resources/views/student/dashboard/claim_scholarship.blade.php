@extends('student.layouts.master')
@section('content')



<style>
    .line-with-button {
        position: relative;
    }

    .round-button {
        position: absolute;
        right: 0;
        margin-top: -16px;
        margin-right: 26px;
        transform: translateY(-50%);
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        text-align: center;
        cursor: pointer;
    }

    .round-button:focus {
        outline: none;
    }
</style>
<div class="container pagecontentbody">
    <div class="tab-content">
        <div class="row pt-3">
            <div class="col">
                <h5>
                    Claim Form
                </h5>
            </div>
        </div>
        <div class="pagebody row pt-2">
            <div class="container col-md-11" style="border: 1px solid #c6cbd0;padding: 8px 25px;">
                <form method="post" action="{{route('students.claimScholarshipFormSave')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col">
                            <h5>
                                Choice One
                            </h5>
                            <div class="row mt-2 ">

                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute Name<span class="text-danger">*</span></label>
                                    <input required pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of institute" name="institude_name1" value="{{$claimForm?->institude_name1}}" />
                                    @error('institude_name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute’s Director’s Name<span class="text-danger"></span></label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of Director" name="institude_director1" value="{{$claimForm?->institude_director1}}" />
                                    @error('institude_director')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col mb-2 ">
                                    <label class="form-label">Institute/ Contact Details<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Mobile No" name="institude_mobile1" value="{{$claimForm?->institude_mobile1}}" />
                                        <div class="input-group-append">
                                        <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Whatsapp No" name="whatsapp_no1" value="{{$claimForm?->whatsapp_no1}}" />
                                        </div>
                                    </div>
                                    @error('institude_mobile')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute E-mail Id</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Email" name="institude_email1" value="{{$claimForm?->institude_email1}}" />
                                    @error('institude_email')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">State<span class="text-danger">*</span></label>
                                    <input required pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="State" name="state1" value="{{$student->state?->name}}" />

                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">City<span class="text-danger">*</span></label>
                                    <select name="city_id1" class="form-control form-select" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" id="district" required>
                                        <option value="">--Select City--</option>

                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{$city->id == $claimForm?->city_id1 ? 'selected' : ''}}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Institute Address<span class="text-danger">*</span></label>
                                    <input required  class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Institute Address" name="institude_address1" value="{{$claimForm?->institude_address1}}" />
                                    @error('institude_address')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Desired Course Detail<span class="text-danger">*</span></label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Desired Course Detail*" value="" name="desired_course_detail1" value="{{$claimForm?->desired_course_detail1}}" />
                                    @error('desired_course_detail')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col mb-2 ">
                                    <label class="form-label">Course Fee<span class="text-danger">*</span></label>
                                    <input required class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_fee1" value="{{$claimForm?->course_fee1}}" placeholder="Enter address" required />
                                    @error('course_duration')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                    @error('course_fee')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">Course Duration<span class="text-danger">*</span></label>
                                    <input required class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_duration1" value="{{$claimForm?->course_duration1}}" placeholder="Enter Duration" required />
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute Prospectus</label>
                                    <input type="file" id="fileInput" class="form-control input-focus" onchange="validateImage(this,'imagepdf')" name="institude_prospectus1">

                                    @error('institude_prospectus')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col">
                            <h5>
                                Choice Two
                            </h5>
                            <div class="row mt-2 ">
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute Name<span class="text-danger">*</span></label>
                                    <input required pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of institute" name="institude_name2" value="{{$claimForm?->institude_name2}}" />
                                    @error('institude_name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute’s Director’s Name<span class="text-danger"></span></label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of Director" name="institude_director2" value="{{$claimForm?->institude_director2}}" />
                                    @error('institude_director')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col mb-2 ">
                                    <label class="form-label">Institute/ Contact Details<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Mobile No" name="institude_mobile2" value="{{$claimForm?->institude_mobile2}}" />
                                        <div class="input-group-append">
                                        <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Whatsapp No" name="whatsapp_no2" value="{{$claimForm?->whatsapp_no2}}" />
                                        </div>
                                    </div>
                                    @error('institude_mobile')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute E-mail Id</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Email" name="institude_email2" value="{{$claimForm?->institude_email2}}" />
                                    @error('institude_email')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">State<span class="text-danger">*</span></label>
                                    <input required pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="State" name="state2" value="{{$student->state?->name}}" />

                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">City<span class="text-danger">*</span></label>
                                    <select name="city_id2" class="form-control form-select" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" id="district" required>
                                        <option value="">--Select City--</option>

                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{$city->id == $claimForm?->city_id2 ? 'selected' : ''}}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Institute Address<span class="text-danger">*</span></label>
                                    <input required class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Institute Address" name="institude_address2" value="{{$claimForm?->institude_address2}}" />
                                    @error('institude_address')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Desired Course Detail<span class="text-danger">*</span></label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Desired Course Detail*" value="" name="desired_course_detail2" value="{{$claimForm?->desired_course_detail2}}" />
                                    @error('desired_course_detail')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col mb-2 ">
                                    <label class="form-label">Course Fee<span class="text-danger">*</span></label>
                                    <input required class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_fee2" value="{{$claimForm?->course_fee2}}" placeholder="Enter address" required />
                                    @error('course_duration')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                    @error('course_fee')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">Course Duration<span class="text-danger">*</span></label>
                                    <input required class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_duration2" value="{{$claimForm?->course_duration2}}" placeholder="Enter Duration" required />
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute Prospectus</label>
                                    <input type="file" id="fileInput" class="form-control input-focus" onchange="validateImage(this,'imagepdf')" name="institude_prospectus2">

                                    @error('institude_prospectus')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="line-with-button">
                    <span class="round-button add-center-c">+</span>
                    <div class="row center-c-cl" style="display: none;">
                        <div class="col-md-6 col">
                            <h5>
                                Choice Third
                            </h5>
                            <div class="row mt-2 ">

                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute Name</label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of institute" name="institude_name3" value="{{$claimForm?->institude_name3}}" />
                                    @error('institude_name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute’s Director’s Name<span class="text-danger"></span></label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of Director" name="institude_director3" value="{{$claimForm?->institude_director3}}" />
                                    @error('institude_director')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col mb-2 ">
                                    <label class="form-label">Institute/ Contact Details</label>
                                    <div class="input-group">
                                        <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Mobile No" name="institude_mobile3" value="{{$claimForm?->institude_mobile3}}" />
                                        <div class="input-group-append">
                                            <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter whatsapp no" name="whatsapp_no3" value="{{$claimForm?->whatsapp_no3}}" />
                                        </div>
                                    </div>
                                    @error('institude_mobile')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute E-mail Id</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Email" name="institude_email3" value="{{$claimForm?->institude_email3}}" />
                                    @error('institude_email')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">State</label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="State" name="state3" value="{{$student->state?->name}}" />

                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">City</label>
                                    <select name="city_id3" class="form-control form-select" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" id="district">
                                        <option value="">--Select City--</option>

                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{$city->id == $claimForm?->city_id1 ? 'selected' : ''}}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Institute Address</label>
                                    <input  class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Institute Address" name="institude_address3" value="{{$claimForm?->institude_address3}}" />
                                    @error('institude_address')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Desired Course Detail</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Desired Course Detail*" value="" name="desired_course_detail3" value="{{$claimForm?->desired_course_detail3}}" />
                                    @error('desired_course_detail')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col mb-2 ">
                                    <label class="form-label">Course Fee</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_fee3" value="{{$claimForm?->course_fee3}}" placeholder="Enter address" />
                                    @error('course_duration')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                    @error('course_fee')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">Course Duration</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_duration3" value="{{$claimForm?->course_duration3}}" placeholder="Enter Duration" />
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute Prospectus</label>
                                    <input type="file" id="fileInput" class="form-control input-focus" onchange="validateImage(this,'imagepdf')" name="institude_prospectus3">

                                    @error('institude_prospectus')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col">
                            <h5>
                                Choice Fourth
                            </h5>
                            <div class="row mt-2 ">
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute Name</label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of institute" name="institude_name4" value="{{$claimForm?->institude_name4}}" />
                                    @error('institude_name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute’s Director’s Name<span class="text-danger"></span></label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of Director" name="institude_director4" value="{{$claimForm?->institude_director4}}" />
                                    @error('institude_director')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col mb-2 ">
                                    <label class="form-label">Institute/ Contact Details<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Mobile No" name="institude_mobile4" value="{{$claimForm?->institude_mobile4}}" />
                                        <div class="input-group-append">
                                            <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Whatsapp No" name="whatsapp_no4" value="{{$claimForm?->whatsapp_no4}}" />
                                        </div>
                                    </div>
                                    @error('institude_mobile')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute E-mail Id</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Email" name="institude_email4" value="{{$claimForm?->institude_email4}}" />
                                    @error('institude_email')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">State</label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="State" name="state4" value="{{$student->state?->name}}" />

                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">City</label>
                                    <select name="city_id4" class="form-control form-select" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" id="district">
                                        <option value="">--Select City--</option>

                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{$city->id == $claimForm?->city_id2 ? 'selected' : ''}}>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Institute Address</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Institute Address" name="institude_address4" value="{{$claimForm?->institude_address4}}" />
                                    @error('institude_address')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Desired Course Detail</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Desired Course Detail*" value="" name="desired_course_detail4" value="{{$claimForm?->desired_course_detail4}}" />
                                    @error('desired_course_detail')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col mb-2 ">
                                    <label class="form-label">Course Fee</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_fee4" value="{{$claimForm?->course_fee4}}" placeholder="Enter address" />
                                    @error('course_duration')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                    @error('course_fee')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">Course Duration</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_duration4" value="{{$claimForm?->course_duration4}}" placeholder="Enter Duration" />
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute Prospectus</label>
                                    <input type="file" id="fileInput" class="form-control input-focus" onchange="validateImage(this,'imagepdf')" name="institude_prospectus4">

                                    @error('institude_prospectus')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3 mb-4">
                        <div class="col-md-3 d-grid">
                            <button type="submit" class="btn btn-theme btn-primary submitform">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

   $('.add-center-c').on('click',function(){

     if($('.center-c-cl').is(':visible')){
      $('.add-center-c').text('+');
     }else {
      $('.add-center-c').text('-');
     }
     $('.center-c-cl').toggle(500);
   })



</script>
@endsection('content')