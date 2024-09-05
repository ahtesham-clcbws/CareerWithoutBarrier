<!-- resources/views/home.blade.php -->
@extends('layouts.website')

@section('title', 'Home Page')


@section('content')

<body class="conact-page">
    <section>
        <div class="common-banner contact-us-banner">
            <div class="container">
                <div class="row">
                    <h2>Contact us</h2>
                    <h4><a href="{{ route('home.front') }}">Home > </a> <span>Contact</span></h4>
                    <i class="fly-icon"></i>
                    <div class="comm-ban-im">
                        <img src="{{ asset('website/assets/images/bg-icons/contact-banner.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="faq comm-p-t-b">
        <div class="container">
            <div class="row tex-center">
                <div class="col-lg-3 col-md-12">
                </div>
                <div class="col-lg-6 col-md-12">
                    <h2>Contact</h2>
                    <div class>
                        <form action="{{ route('home.contactinsert') }}" method="POST">
                            @csrf
                            <div class="contact-input">
                                <ul>
                                    <li>
                                        <input type="text"  required value="{{ old('full_name') }}" name="full_name" placeholder="Enter Full Name*">
                                        @error('full_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </li>
                                    <li class="mobile-input">
                                        <input type="number" class="get-otp-mobile" required value="{{ old('mobile') }}" name="mobile" placeholder="Mobile">
                                        <!-- <button class="get-otp-button" onclick="sendOtpContact('contact','otp_verify')">Get OTP</button>
                                        -->
                                    </li>
                             
                                    <!-- <li>
                                        <input type="text"  required value="{{ old('otp_verify') }}" name="otp_verify" style="margin-left: 10px;" placeholder="Enter Otp Received">
                                      
                                        @error('otp_verify')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </li> -->
                                    <li style="margin-left: 10px;">
                                        <input type="text"  required value="{{ old('email') }}" name="email" placeholder="Email *">
                                     
                                    </li>
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    <li>
                                        <input type="text"  required value="{{ old('city') }}" name="city" placeholder="City/District Name *">
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </li>
                                    <li>
                                       
                                        <select style="background-color:#f0f4ff;border:0px;" class="form-control" required value="{{ old('reason_contact') }}" id="reason_contact" name="reason_contact" onchange="get_other_reason()">
                                            <option value="">Select Reason to Contact</option>
                                            <option value="Student's Application Related Issue">Student's Application Related Issue</option>
                                            <option value="Student's Admit Card Related Issue">Student's Admit Card Related Issue</option>
                                            <option value="Student's Result Related Issue">Student's Result Related Issue</option>
                                            <option value="Institutional Enquiry / Signup">Institutional Enquiry / Signup</option>
                                            <option value="Institutional Login Issue">Institutional Login Issue</option>
                                            <option value="Other Issues">Other Issues</option>
                                        </select>
                                        @error('reason_contact')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </li>
                                    <li style="display:none;" id="otherdd">
                                        <input type="text" id="subjectres"   value="{{ old('subjectres') }}" name="subjectres" placeholder="Explain other issue *" style="height:40px;background-color:white;" >
                                        @error('subjectres')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </li>
                                    <li>
                                        <input type="text"  required value="{{ old('message') }}" name="message" placeholder="Your message here" style="height:80px;">
                                        @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </li>
                                    <li style="padding:0px "><input class="sub bg-primary btn-sm" style="width:100px;height:40px;border-radius:5px;padding:0px;" type="submit" value="Submit"></li>
                                </ul>

                            </div>
                        </form>
                    </div>
                </div>
                <!-- FAQ RIGHT SIDE CONTENT END-->
                <div class="col-lg-3 col-md-12">
                </div>
            </div>
        </div>
    </div>
    @endsection

    <script>
        function get_other_reason(){
            
            var reason_contact = $("#reason_contact").val();
            if(reason_contact == "Other Issues"){
                $("#otherdd").show();
            }else{
                $("#otherdd").hide();

            }

        }
    
    </script>