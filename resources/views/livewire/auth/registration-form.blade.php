<div>
    <div class="w-100" style="margin-top:72px;background-color:#f26b3c;">
        <div class="container text-center py-5 pb-4">
            <h2 style="font-size:32px" class="text-white">Student Registration</h2>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 mx-auto card registrationFormCard">
                <form class="form-row g-1 card-body" wire:submit="register">
                    @csrf
                    <div class="col-12 form-row g-1 {{ $this->otpSendSuccess && $this->otpRequestId ? 'd-none' : '' }} ">

                        <div class="mb-3 col-md-6">
                            <label class="form-label mb-0">State</label>
                            <select class="form-control" wire:model.live="selectedState">
                                <option value="">Select your state...</option>
                                @foreach (\App\Models\State::select('id','name', 'status')->get() as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label mb-0">City/District</label>
                            <select class="form-control" wire:model.live="selectedDistrict" wire:key="{{ $selectedState }}">
                                <option value="">Select your city...</option>
                                @foreach (\App\Models\District::where('state_id', $selectedState)->get() as $district)
                                <option {{ intval($district->getRemainingForms()) == 0 ? 'disabled' : '' }} value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 text-center">
                            @if($selectedState && $selectedDistrict && $selectedDistrictData)
                            <hr />
                            <span class="text-danger">Only <b>{{ $selectedDistrictData->getRemainingForms() }}</b> Forms are remain for <b>{{ $selectedDistrictData->name }}</b></span>
                            @endif
                            <hr />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label mb-0">Name</label>
                            <input type="text" wire:model="name" placeholder="Full Name" class="form-control <?= !$nameError ?? 'is-invalid' ?>" required>
                            @if($nameError)<div class="invalid-feedback">{{$nameError}}</div>@endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label mb-0">Gender</label>
                            <select wire:model="gender" class="form-control <?= !$genderError ?? 'is-invalid' ?>" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">FeMale</option>
                                <option value="Transgender">Transgender</option>
                            </select>
                            @if($genderError)<div class="invalid-feedback">{{$genderError}}</div>@endif
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label mb-0">Mobile</label>
                            <input type="number" pattern="[6-9]{1}[0-9]{9}" wire:model="mobile" placeholder="Valid mobile number" class="form-control <?= !$mobileError ?? 'is-invalid' ?>" required min="6000000000" max="9999999990" minlength="10" maxlength="10">
                            @if($mobileError)<div class="invalid-feedback">{{$mobileError}}</div>@endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label mb-0">Email</label>
                            <input type="email" wire:model="email" placeholder="Valid email address" class="form-control <?= !$emailError ?? 'is-invalid' ?>" required>
                            @if($emailError)<div class="invalid-feedback">{{$emailError}}</div>@endif
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label mb-0">Password</label>
                            <div class="input-group">
                                <input type="{{ $showPassword ? 'text' : 'password' }}" wire:model="password" placeholder="Password *" class="form-control <?= !$passwordError ?? 'is-invalid' ?>" required minlength="8" maxlength="8">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" wire:click="$toggle('showPassword')">
                                        <i class="fa fa-fw {{ $showPassword ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                    </button>
                                </div>
                            </div>
                            @if($passwordError)<div class="invalid-feedback">{{$passwordError}}</div>@endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label mb-0">Confirm Password</label>
                            <div class="input-group">
                                <input type="{{ $showPassword ? 'text' : 'password' }}" wire:model="confirmPassword" placeholder="Confirm Password *" class="form-control <?= !$confirmPasswordError ?? 'is-invalid' ?>" required minlength="8" maxlength="8">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" wire:click="$toggle('showPassword')">
                                        <i class="fa fa-fw {{ $showPassword ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                    </button>
                                </div>
                            </div>
                            @if($confirmPasswordError)<div class="invalid-feedback">{{$confirmPasswordError}}</div>@endif
                        </div>

                        <div class="mb-3 col-12">
                            <div class="d-flex">
                                <label class="form-check-label mr-3">Person Disability:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox1" wire:model="disability" name="disability" value="Yes" required>
                                    <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox2" wire:model="disability" name="disability" value="No" required>
                                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                                </div>
                            </div>
                        </div>

                        @if($institudeTermsCondition)
                        <div class="mb-3 col-12">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input <?= !$termsError ?? 'is-invalid' ?>" id="termsCheckbox" wire:model="terms" required>
                                <label class="form-check-label" for="termsCheckbox">
                                    I accept the &nbsp;<a style="text-decoration: underline;" href="{{ asset('home/'.$institudeTermsCondition) }}" target="_blank"> Terms & Conditions </a>&nbsp; of Career without barrier.
                                </label>
                            </div>
                            @if($termsError)<div class="invalid-feedback">{{$termsError}}</div>@endif
                        </div>
                        @endif
                    </div>

                    <div class="mb-3 col-12 {{ $this->otpSendSuccess && $this->otpRequestId ? '' : 'd-none' }} ">
                        <label class="form-label mb-0 text-center d-block"><b>Enter OTP, you recieved on Mobile number!</b></label>
                        <input type="number" wire:model="userOtp" class="form-control form-control-lg text-center <?= !$userOtpError ?? 'is-invalid' ?>" min="100000" max="999999" minlength="6" maxlength="6">
                        @if($mobileError)<div class="invalid-feedback">{{$userOtpError}}</div>@endif
                    </div>

                    <div class="mb-3 col-12">
                        <button type="submit" class="btn-custom w-100 d-flex justify-content-center align-items-center">
                            <span class="spinner-border spinner-border-sm mr-3" wire:loading wire:target="register" role="status" aria-hidden="true"></span>
                            {{ $this->otpSendSuccess && $this->otpRequestId ? 'Verify OTP' : 'Register' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('custom-styles')
<style>
    .small {
        font-size: 80%;
    }

    .registrationFormCard {
        border: 1px solid #ffc7b4 !important;
        border-radius: .6rem !important;
        box-shadow: 0 0 0 5px #ffd8ca;
    }

    .registrationFormCard input,
    .registrationFormCard select,
    .registrationFormCard .input-group button {
        border-color: #ffc7b4 !important;
    }
</style>
@endpush