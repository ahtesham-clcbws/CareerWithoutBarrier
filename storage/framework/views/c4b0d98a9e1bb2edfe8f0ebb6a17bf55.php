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

        .newButton {
            background-color: #f73f05;
            border-color: #f73f05;
            color: white;
        }
    </style>

    <div class="w-100" style="margin-top:72px;background-color:#f26b3c;">
        <div class="container py-5 pb-4 text-center">
            <h2 class="text-white" style="font-size:32px">Student Registration</h2>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 card registrationFormCard mx-auto">

                <form class="form-row g-1 card-body" wire:submit="register">
                    <?php echo csrf_field(); ?>


                    <div class="col-12 form-row g-1">

                        <!-- qualification -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-0">Qualification</label>
                            <select class="form-control <?php $__errorArgs = ['selectedBoard'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                wire:model.live="selectedBoard">
                                <option value="" style="font-size: 12px;">Select qualification...</option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\BoardAgencyStateModel::select('id', 'name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($board->id); ?>"><?php echo e($board->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['selectedBoard'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger small"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <!-- scholarship -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-0">Scholarship Category</label>
                            <select class="form-control <?php $__errorArgs = ['selectedScholarship'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                wire:model.live="selectedScholarship" wire:key="<?php echo e($selectedBoard); ?>">
                                <option value="">Select scholarship category...</option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\Gn_DisplayExamAgencyBoardUniversity::where('board_id', 'LIKE', '%' . $selectedBoard . '%')->with('educations')->get()->pluck('educations')->flatten()->unique('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($education->id); ?>"><?php echo e($education->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['selectedScholarship'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger small"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <!-- state -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-0">State</label>
                            <select class="form-control <?php $__errorArgs = ['selectedState'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                wire:model.live="selectedState">
                                <option value="" style="font-size: 12px;">Select your state...</option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\State::select('id', 'name', 'status')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['selectedState'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger small"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <!-- distrcit -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-0">City/District</label>
                            <select class="form-control <?php $__errorArgs = ['selectedDistrict'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                wire:model.live="selectedDistrict" wire:key="<?php echo e($selectedState); ?>">
                                <option value="">Select your city...</option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\District::where('state_id', $selectedState)->whereHas('districtScholarshipLimits', function ($query) use ($selectedScholarship) {
            $query->forEducationType($selectedScholarship);
        })->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($district->id); ?>"
                                        <?php echo e(intval($district->getLimit($selectedScholarship)->limit) == 0 ? 'disabled' : ''); ?>>
                                        <?php echo e($district->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['selectedDistrict'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger small"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <!--[if BLOCK]><![endif]--><?php if($remainingForms <= 300): ?>
                            <div class="col-12">
                                <label class="form-label mb-0">Referrence Code</label>
                                <div class="input-group input-group-sm">
                                    <input
                                        class="form-control form-control-sm <?php $__errorArgs = ['couponcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" <?php if($isCouponVerify): ?> readonly <?php endif; ?>
                                        wire:model="couponcode" placeholder="Reference code by Institute"
                                        wire:key="<?php echo e($selectedDistrict); ?>">
                                    <div class="input-group-append">
                                        <button
                                            class="btn <?php if($isCouponVerify): ?> btn-success <?php else: ?> btn-outline-secondary <?php endif; ?> btn-sm"
                                            id="button-addon2" type="button" wire:click="couponVerify">
                                            <!--[if BLOCK]><![endif]--><?php if($isCouponVerify): ?>
                                                Verified
                                            <?php else: ?>
                                                Verify
                                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        </button>
                                    </div>
                                </div>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['couponcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger small"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['customErrors'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger small"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                        <div class="col-12 text-center">
                            <!--[if BLOCK]><![endif]--><?php if($selectedState && $selectedDistrict && $remainingForms <= 300): ?>
                                <hr />
                                <span class="text-danger">Only <b><?php echo e($remainingForms); ?></b> Forms are remain for
                                    <b><?php echo e($selectedDistrictData?->name ?? 'N/A'); ?></b></span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <hr />
                        </div>


                        <!-- name -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-0">Name</label>
                            <input class="form-control form-control-sm <?php $__errorArgs = ['selectedBoard'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                type="text" wire:model.blur="name" placeholder="Full Name">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger small"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <!-- gender -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-0">Gender</label>
                            <select class="form-control <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" wire:model.blur="gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">FeMale</option>
                                <option value="Transgender">Transgender</option>
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger small"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <div class="col-12">
                            <div class="form-row g-1">
                                <!-- mobile -->
                                <div class="col mb-2">
                                    <label class="form-label mb-0">Mobile</label>
                                    <div class="input-group">
                                        <input
                                            class="form-control form-control-sm <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="number" wire:model.live="mobile" placeholder="Valid mobile number"
                                            min="6000000000" max="9999999990" minlength="10" maxlength="10"
                                            <?php if($isOtpVerfied): ?> readonly <?php endif; ?>>
                                        <div class="input-group-append">
                                            <button type="button" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['btn btn-sm newButton', 'btn-success' => $isOtpVerfied]); ?>" wire:click="sendOTP"
                                                <?php if($isOtpVerfied): ?> disabled <?php endif; ?>>
                                                Get OTP
                                            </button>
                                        </div>
                                    </div>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <small class="text-danger small"><?php echo e($message); ?></small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                                <!-- OTP -->
                                <div class="col mb-2">
                                    <label class="form-label mb-0">OTP</label>
                                    <div class="input-group">
                                        <input
                                            class="form-control form-control-sm <?php $__errorArgs = ['userOtp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php if($isOtpVerfied): ?> is-valid <?php endif; ?>"
                                            type="number" wire:model.live="userOtp" placeholder="Enter 6 Digits OTP"
                                            min="100000" max="999999" minlength="6" maxlength="6"
                                            <?php if(!$otpSendSuccess): ?> disabled <?php endif; ?>
                                            <?php if($isOtpVerfied): ?> readonly <?php endif; ?>>
                                        <div class="input-group-append">
                                            <button type="button" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['btn btn-sm newButton', 'btn-success' => $isOtpVerfied]); ?>" wire:click="verifyOtp"
                                                <?php if(!$otpSendSuccess): ?> disabled <?php endif; ?>
                                                <?php if($isOtpVerfied): ?> disabled <?php endif; ?>>
                                                Verify OTP
                                            </button>
                                        </div>
                                    </div>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['userOtp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <small class="text-danger small"><?php echo e($message); ?></small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>
                        </div>
                        <!-- email -->
                        <div class="col-12 mb-2">
                            <label class="form-label mb-0">Email</label>
                            <input class="form-control form-control-sm <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                type="email" wire:model.blur="email" placeholder="Valid email address">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger small"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <!-- password -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-0">Password</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="<?php echo e($showPassword ? 'text' : 'password'); ?>" wire:model.blur="password"
                                    placeholder="Password *">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn-sm" type="button"
                                        wire:click="$toggle('showPassword')">
                                        <i class="fa fa-fw <?php echo e($showPassword ? 'fa-eye' : 'fa-eye-slash'); ?>"></i>
                                    </button>
                                </div>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger small"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <!-- confirm password -->
                        <div class="col-md-6 mb-2">
                            <label class="form-label mb-0">Confirm Password</label>
                            <div class="input-group">
                                <input
                                    class="form-control form-control-sm <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="<?php echo e($showPassword ? 'text' : 'password'); ?>"
                                    wire:model.blur="password_confirmation" placeholder="Confirm Password *">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn-sm" type="button"
                                        wire:click="$toggle('showPassword')">
                                        <i class="fa fa-fw <?php echo e($showPassword ? 'fa-eye' : 'fa-eye-slash'); ?>"></i>
                                    </button>
                                </div>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger small"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>


                        <div class="col-12 mb-2">
                            <div class="d-flex">
                                <label class="form-check-label mr-3">Person Disability:</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="inlineCheckbox1" name="disability"
                                        type="radio" value="Yes" wire:model="disability">
                                    <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="inlineCheckbox2" name="disability"
                                        type="radio" value="No" wire:model="disability">
                                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                                </div>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['disability'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger small"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <div class="col-12 mb-2">
                            <div class="form-group form-check mb-0">
                                <input class="form-check-input text-start" id="termsCheckbox" type="checkbox"
                                    wire:model.live="terms">
                                <label class="form-check-label d-inline-block" for="termsCheckbox">
                                    <!--[if BLOCK]><![endif]--><?php if($institudeTermsCondition): ?>
                                        I accept the&nbsp;<a class="inline-block"
                                            href="<?php echo e(asset('home/' . $institudeTermsCondition)); ?>"
                                            style="text-decoration: underline;" target="_blank">Terms &
                                            Conditions</a>&nbsp;of Career without barrier
                                    <?php else: ?>
                                        I accept the Terms & Conditions of Career without barrier
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </label>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger small"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                    </div>

                    <div class="col-12 mb-2">
                        <button class="btn btn-secondary w-100" type="submit"
                            style="background-color: #f73f05; border-color: #f73f05 !important;"
                            <?php if(!$otpSendSuccess || !$isOtpVerfied): ?> disabled <?php endif; ?>>
                            <span class="spinner-border spinner-border-sm mr-3" role="status" aria-hidden="true"
                                wire:loading wire:target="register"></span>
                            Register
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('custom-styles'); ?>
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
<?php $__env->stopPush(); ?>
<?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/auth/registration.blade.php ENDPATH**/ ?>