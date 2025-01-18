<div>
    <style>
        .input-group input {
            border-end-end-radius: 0 !important;
            border-start-end-radius: 0 !important;
        }

        .input-group button {
            border-end-start-radius: 0 !important;
            border-start-start-radius: 0 !important;
        }
    </style>
    <div class="w-100" style="margin-top:72px;background-color:#f26b3c;">
        <div class="container text-center py-5 pb-4">
            <h2 style="font-size:32px" class="text-white">Student Registration</h2>
        </div>
    </div>


    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 mx-auto card registrationFormCard">
                @if (!$otpRequestId && !$otpSendSuccess)
                <form class="form-row g-1 card-body" wire:submit="register">
                    @csrf


                    <div class="col-12 form-row g-1">

                        <!-- qualification -->
                        <div class="mb-2 col-md-6">
                            <label class="form-label mb-0">Qualification</label>
                            <select class="form-control @error('selectedBoard') is-invalid @enderror" wire:model.live="selectedBoard">
                                <option style="font-size: 12px;" value="">Select qualification...</option>
                                @foreach (\App\Models\BoardAgencyStateModel::select('id','name')->get() as $board)
                                <option value="{{ $board->id }}">{{ $board->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedBoard')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- scholarship -->
                        <div class="mb-2 col-md-6">
                            <label class="form-label mb-0">Scholarship Category</label>
                            <select class="form-control @error('selectedScholarship') is-invalid @enderror" wire:model.live="selectedScholarship" wire:key="{{ $selectedBoard }}">
                                <option value="">Select scholarship category...</option>
                                @foreach ((\App\Models\Gn_DisplayExamAgencyBoardUniversity::where('board_id', 'LIKE', '%' . $selectedBoard . '%')->with('educations')->get())->pluck('educations')->flatten()->unique('id') as $education)
                                <option value="{{ $education->id }}">{{ $education->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedScholarship')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- state -->
                        <div class="mb-2 col-md-6">
                            <label class="form-label mb-0">State</label>
                            <select class="form-control @error('selectedState') is-invalid @enderror" wire:model.live="selectedState">
                                <option style="font-size: 12px;" value="">Select your state...</option>
                                @foreach (\App\Models\State::select('id','name', 'status')->get() as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedState')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- distrcit -->
                        <div class="mb-2 col-md-6">
                            <label class="form-label mb-0">City/District</label>
                            <select class="form-control @error('selectedDistrict') is-invalid @enderror" wire:model.live="selectedDistrict" wire:key="{{ $selectedState }}">
                                <option value="">Select your city...</option>
                                @foreach (\App\Models\District::where('state_id', $selectedState)
                                ->whereHas('districtScholarshipLimits', function ($query) use ($selectedScholarship) {
                                $query->forEducationType($selectedScholarship);
                                })->get() as $district)

                                <option {{ intval($district->getLimit($selectedScholarship)->limit) == 0 ? 'disabled' : '' }} value="{{ $district->id }}">
                                    {{ $district->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('selectedDistrict')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>

                        @if ($remainingForms <= 300)
                        <div class="col-12">
                            <label class="form-label mb-0">Referrence Code</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm @error('couponcode') is-invalid @enderror" @if($isCouponVerify) readonly @endif wire:model="couponcode" placeholder="Reference code by Institute" wire:key="{{ $selectedDistrict }}">
                                <div class="input-group-append">
                                    <button class="btn @if($isCouponVerify) btn-success @else btn-outline-secondary @endif btn-sm" wire:click="couponVerify" type="button" id="button-addon2">@if($isCouponVerify) Validated @else Verify @endif</button>
                                </div>
                            </div>
                            @error('couponcode')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>
                        @endif

                        @error('customErrors')
                        <small class="text-danger small">{{ $message }}</small>
                        @enderror

                        <div class="col-12 text-center">
                            @if ($selectedState && $selectedDistrict && $remainingForms
                            <= 300)
                                <hr />
                            <span class="text-danger">Only <b>{{ $remainingForms }}</b> Forms are remain for <b>{{ $selectedDistrictData?->name ?? 'N/A' }}</b></span>
                            @endif
                            <hr />
                        </div>


                        <!-- name -->
                        <div class="mb-2 col-md-6">
                            <label class="form-label mb-0">Name</label>
                            <input type="text" wire:model.blur="name" placeholder="Full Name" class="form-control form-control-sm @error('selectedBoard') is-invalid @enderror">
                            @error('name')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- gender -->
                        <div class="mb-2 col-md-6">
                            <label class="form-label mb-0">Gender</label>
                            <select wire:model.blur="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">FeMale</option>
                                <option value="Transgender">Transgender</option>
                            </select>
                            @error('gender')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- mobile -->
                        <div class="mb-2 col-md-6">
                            <label class="form-label mb-0">Mobile</label>
                            <input type="number" wire:model.blur="mobile" placeholder="Valid mobile number" class="form-control form-control-sm @error('mobile') is-invalid @enderror" min="6000000000" max="9999999990" minlength="10" maxlength="10">
                            @error('mobile')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- email -->
                        <div class="mb-2 col-md-6">
                            <label class="form-label mb-0">Email</label>
                            <input type="email" wire:model.blur="email" placeholder="Valid email address" class="form-control form-control-sm @error('email') is-invalid @enderror">
                            @error('email')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- password -->
                        <div class="mb-2 col-md-6">
                            <label class="form-label mb-0">Password</label>
                            <div class="input-group">
                                <input type="{{ $showPassword ? 'text' : 'password' }}" wire:model.blur="password" placeholder="Password *" class="form-control form-control-sm @error('password') is-invalid @enderror">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn-sm" type="button" wire:click="$toggle('showPassword')">
                                        <i class="fa fa-fw {{ $showPassword ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                    </button>
                                </div>
                            </div>
                            @error('password')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- confirm password -->
                        <div class="mb-2 col-md-6">
                            <label class="form-label mb-0">Confirm Password</label>
                            <div class="input-group">
                                <input type="{{ $showPassword ? 'text' : 'password' }}" wire:model.blur="password_confirmation" placeholder="Confirm Password *" class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn-sm" type="button" wire:click="$toggle('showPassword')">
                                        <i class="fa fa-fw {{ $showPassword ? 'fa-eye' : 'fa-eye-slash' }}"></i>
                                    </button>
                                </div>
                            </div>
                            @error('password_confirmation')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="mb-2 col-12">
                            <div class="d-flex">
                                <label class="form-check-label mr-3">Person Disability:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox1" wire:model="disability" name="disability" value="Yes">
                                    <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox2" wire:model="disability" name="disability" value="No">
                                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                                </div>
                            </div>
                            @error('disability')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2 col-12">
                            <div class="form-group form-check mb-0">
                                <input type="checkbox" class="form-check-input text-start" id="termsCheckbox" wire:model.live="terms">
                                <label class="form-check-label d-inline-block" for="termsCheckbox">
                                    @if ($institudeTermsCondition)
                                    I accept the&nbsp;<a class="inline-block" style="text-decoration: underline;" href="{{ asset('home/'.$institudeTermsCondition) }}" target="_blank">Terms & Conditions</a>&nbsp;of Career without barrier
                                    @else
                                    I accept the Terms & Conditions of Career without barrier
                                    @endif
                                </label>
                            </div>
                            @error('terms')
                            <small class="text-danger small">{{ $message }}</small>
                            @enderror
                        </div>


                    </div>


                    <div class="mb-2 col-12">
                        <button type="submit" class="btn-custom w-100 d-flex justify-content-center align-items-center">
                            <span class="spinner-border spinner-border-sm mr-3" wire:loading wire:target="register" role="status" aria-hidden="true"></span>
                            Register
                        </button>
                    </div>
                </form>
                @else
                <form class="form-row g-1 card-body" wire:submit="verifyOtp">
                    <div class="mb-2 col-12">
                        <label class="form-label mb-0 text-center d-block"><b>Enter OTP, you recieved on Mobile number!</b></label>
                        <input type="number" wire:model="userOtp" class="form-control form-control-lg text-center" min="100000" max="999999" minlength="6" maxlength="6">
                    </div>
                    <div class="mb-3 col-12">
                        <button type="submit" class="btn-custom w-100 d-flex justify-content-center align-items-center">
                            <span class="spinner-border spinner-border-sm mr-3" wire:loading wire:target="verifyOtp" role="status" aria-hidden="true"></span>
                            Register
                        </button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

@push('custom-styles')
<style>
    small.small {
        font-size: 70%;
        font-weight: 500;
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

    .registrationFormCard input::placeholder,
    .registrationFormCard select {
        font-size: 12px;
    }
</style>
@endpush