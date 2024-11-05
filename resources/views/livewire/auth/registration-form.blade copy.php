<div id="myModalSignUp" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="pop-up row">
                <!--POP UP IMG-->
                <div class="pop-up1 col-12 col-lg-6" style="background: url('https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg');"></div>
                <div class="pop-up2">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="book-tit">SignUp</h2>
                    <div class="book-now">
                        <form id="studentSignup" method="post" action="<?= !$isEmailValid || !$isFormValid ? 'javascript:void(0);' : route('studentSignup') ?>">
                            @csrf
                            <ul>
                                <li class="half">
                                    <span>State </span>
                                    <select name="state_id" class="form-control" wire:model="selectedState">
                                        <option value="">Select a state...</option>
                                        @foreach (\App\Models\State::all() as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li class="half">
                                    <span>District </span>
                                    <select name="district_id" class="form-control" wire:model="selectedDistrict">
                                        <option value="">Select a District...</option>
                                        @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li class="half">
                                    <span style="display: flex;">Name<validation class="text-danger">*</validation> </span>
                                    <input type="text" name="name" placeholder="Name" title="Please enter valid Name" class="form-control" required>
                                </li>
                                <li class="half">
                                    <span>Gender </span>
                                    <select name="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">FeMale</option>
                                        <option value="Transgender">Transgender</option>
                                    </select>
                                </li>
                                <li class="half">
                                    <span style="display: flex;"> Mobile <validation class="text-danger">*</validation></span>
                                    <div class="input-group">
                                        <input type="text" pattern="[6-9]{1}[0-9]{9}" name="mobile" placeholder="Mobile Number" id="student_mobile" title="Please enter valid mobile" class="form-control" required>
                                        <button class="btn bg-dark text-white append student_send_otp_btn" onclick="sendOtp('register','otp_send')" type="button" style="border-bottom-left-radius: 0;font-size: 14px;padding: 7px;border-top-left-radius: 0;">
                                            Get Otp
                                        </button>
                                    </div>
                                </li>
                                <li class="half">
                                    <span style="display: flex;">Verify Otp <validation class="text-danger">*</validation></span>
                                    <div class="input-group">
                                        <input type="text" name="otp" placeholder="otp Number" id="student_otp" title="Please enter valid otp" class="form-control" required>
                                        <button class="btn bg-dark text-white append student_verify_otp_btn" onclick="sendOtp('register','otp_verify')" type="button" style="border-bottom-left-radius: 0;font-size: 14px;padding: 7px;border-top-left-radius: 0;">
                                            Verfiy Otp
                                        </button>
                                    </div>
                                </li>
                                <!--POP UP EMAIL ADDTESS-->
                                <li class="full">
                                    <span style="display: flex;">Email ID<validation class="text-danger">*</validation> </span>
                                    <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" placeholder="Email id *" title="Please enter valid email id" class="form-control" required>
                                </li>

                                <!--POP UP PHONE-->
                                <li class="half">
                                    <span> Password<validation class="text-danger">*</validation></span>
                                    <input type="password" name="password" placeholder="Password *" class="form-control" required>
                                    <i toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                                </li>
                                <li class="half">
                                    <span style="display: flex;">Confirm Password<validation class="text-danger">*</validation></span>
                                    <input type="password" name="confirmpassword" placeholder="Confirm Password *" class="form-control" required>
                                    <i toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                                </li>

                                <div class="form-group pt-4 pl-2" style="width: 50%; ">
                                    <span>Person Disability</span>
                                    <input type="radio" name="disability" value="Yes"> Yes
                                    &nbsp; <input type="radio" checked="checked" name="disability" value="No"> No
                                </div>

                                <div class="form-group pl-2" style="width: 100%; ">
                                    @php($institudeTermsCondition = DB::table('terms_conditions')->where([['status',1],['type','student'],['page_name','terms-and-condition']])->first())
                                    <input type="checkbox" style="width: 20px;height:20px" name="privacy_policy" id="privacy_policy" required> &nbsp; I accept the &nbsp;
                                    @if($institudeTermsCondition) <a style="text-decoration: underline;" href="{{ asset('home/'.$institudeTermsCondition->terms_condition_pdf) }}" target="_blank"> Terms & Conditions </a>@endif
                                </div>

                                <li class="full">
                                    <input type="submit" name="submit" id="studentRegister" <?= !$isEmailValid || !$isFormValid ? 'disabled' : '' ?> value="Register">
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <!-- SECTION: POP UP END -->
        </div>
    </div>
</div>