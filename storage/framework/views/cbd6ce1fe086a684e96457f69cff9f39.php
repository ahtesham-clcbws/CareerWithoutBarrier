<div>
    <style>
        .select2 textarea {
            border-color: none !important;
            box-shadow: none !important;
            outline: 0 none;
        }

        .input-group input {
            border-end-end-radius: 0 !important;
            border-start-end-radius: 0 !important;
        }

        .input-group button {
            border-end-start-radius: 0 !important;
            border-start-start-radius: 0 !important;
        }

        .select2-search__field,
        .select2-search.select2-search--inline,
        .select2-selection.select2-selection--multiple,
        .select2-selection__rendered {
            border-color: #ffc7b4 !important;
        }

        .registrationFormCard select {
            padding: .375rem .50rem;
        }
    </style>
    <div class="w-100" style="margin-top:72px;background-color:#f26b3c;">
        <div class="container text-center py-5 pb-4">
            <h2 style="font-size:32px" class="text-white">Corporate Enquiry</h2>
        </div>
    </div>


    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 mx-auto card registrationFormCard">
                <div class="card-body">

                    <form class="form-row g-1" wire:submit="VerifyAndSubmit">
                        <div class="mb-2 col-12">
                            <input type="text" wire:model.change="name" id='name' placeholder="Your Name" class="form-control">
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
                        <div class="mb-2 col-12">
                            <input type="text" wire:model.change="institute_name" placeholder="Institute/School/Brand Name" class="form-control">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['institute_name'];
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
                        <div class="mb-2 col-md-6">
                            <select class="form-control form-control-lg" wire:model.change="type_institution" id="type_institution">
                                <option value="">Type of Institution</option>
                                <option value="Coaching Institute">Coaching Institute</option>
                                <option value="School (High School)">School (High School)</option>
                                <option value="School (Intermediate School)">School (Intermediate School)</option>
                                <option value="College (Degree College)">College (Degree College)</option>
                                <option value="Society, Trust">Society/ Trust</option>
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['type_institution'];
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
                        <div class="mb-2 col-md-6">
                            <select class="form-control form-control-lg" wire:model.change="established_year" id="established_year">
                                <option value="">Established Year</option>
                                <!--[if BLOCK]><![endif]--><?php for($i = now()->year; $i >= 2001; $i--): ?>
                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['established_year'];
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
                        <div class="mb-2 col-12">
                            <div class="form-control" style="height: auto !important;">
                                <label class="form-control-label"><b>Interested For: </b></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.change="interested_for" id="school_welfare_program" value="Institute/School welfare program">
                                    <label class="form-check-label" for="school_welfare_program">Institute/School welfare program</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.change="interested_for" id="student_scholarship_program" value="Students Scholarship Program">
                                    <label class="form-check-label" for="student_scholarship_program">Students Scholarship Program</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.change="interested_for" id="society_welfare_program" value="Society/Trust Welfare Program">
                                    <label class="form-check-label" for="society_welfare_program">Society/Trust Welfare Program</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.change="interested_for" id="private_welfare_program" value="Individual (Private Tuition) Welfare Program">
                                    <label class="form-check-label" for="private_welfare_program">Individual (Private Tuition) Welfare Program</label>
                                </div>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['interested_for'];
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
                                <!-- phone number -->
                                <div class="mb-2 col">
                                    <div class="input-group">
                                        <input type="number" wire:model.live="phone" placeholder="Valid phone number" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" min="6000000000" max="9999999990" minlength="10" maxlength="10" <?php if($isOtpVerfied): ?> readonly <?php endif; ?>>
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary btn-sm" style="background-color: #f73f05; border-color: #f73f05 !important;" type="button" wire:click="sendOTP" <?php if($isOtpVerfied): ?> disabled <?php endif; ?>>
                                                Get OTP
                                            </button>
                                        </div>
                                    </div>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['phone'];
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
                                <div class="mb-2 col">
                                    <div class="input-group">
                                        <input type="number" wire:model.live="userOtp" placeholder="Enter 6 Digits OTP" class="form-control <?php $__errorArgs = ['userOtp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php if($isOtpVerfied): ?> is-valid <?php endif; ?>" min="100000" max="999999" minlength="6" maxlength="6" <?php if(!$otpSendSuccess): ?> disabled <?php endif; ?> <?php if($isOtpVerfied): ?> readonly <?php endif; ?>>
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary btn-sm" style="background-color: #f73f05; border-color: #f73f05 !important;" type="button" wire:click="verifyOtp" <?php if(!$otpSendSuccess): ?> disabled <?php endif; ?> <?php if($isOtpVerfied): ?> disabled <?php endif; ?>>
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
                            

                        <div class="mb-2 col-12">
                            <div class="input-with-button">
                                <input type="email" wire:model.change="email" id="email" placeholder="Email id *" class="form-control">
                            </div>
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

                        <div class="mb-2 col-md-6">
                            <select class="form-control form-control-lg" wire:model.live="state_id" id="state_id">
                                <option value="">State</option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\State::select('id','name', 'status')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['state_id'];
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
                        <div class="mb-2 col-md-6">
                            <select class="form-control form-control-lg" wire:model="district_id" wire:key="<?php echo e($state_id); ?>" name="district_id" id="district_id">
                                <option value="">District</option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\District::where('state_id', $state_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($district->id); ?>"> <?php echo e($district->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['district_id'];
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
                        <div class="mb-2 col-md-6">
                            <input type="text" wire:model.change="address" id="address" placeholder="Address" class="form-control">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['address'];
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
                        <div class="mb-2 col-md-6">
                            <input type="text" wire:model.change="pincode" placeholder="Pincode" id="pincode" class="form-control">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['pincode'];
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

                        <div class="mb-2 col-md-6">
                            <label for="attachment" class="mb-0">Person Image</label>
                            <input type="file" wire:model.change="attachment" id="attachment" class="form-control form-control-sm" accept=".jpeg,.jpg,.png">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['attachment'];
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

                        <div class="mb-2 col-md-6">
                            <label for="attachment_profile" class="mb-0">Institute Image PDF</label>
                            <input type="file" wire:model.change="attachment_profile" id="attachment_profile" class="form-control form-control-sm" accept=".pdf">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['attachment_profile'];
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
                        <div class="mb-2 col-12" style="font-size: 13px;display:flex">
                            <label form="privacy_policy">
                                <input type="checkbox" style="width: 20px;height:20px" wire:model.change="privacy_policy" id="privacy_policy"> &nbsp; I accept the &nbsp;
                                <!--[if BLOCK]><![endif]--><?php if($institudeTermsCondition): ?> <a style="text-decoration: underline;" href="<?php echo e(asset('home/'.$institudeTermsCondition->terms_condition_pdf)); ?>" target="_blank"> Terms & Conditions </a><?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </label>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['privacy_policy'];
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
                        <div class="mb-2 col-12">
                            <button type="submit" class="btn-custom w-100 d-flex justify-content-center align-items-center" <?php if(!$otpSendSuccess || !$isOtpVerfied): ?> disabled <?php endif; ?>>
                                Submit
                            </button>
                        </div>
                    </form>
                    
                </div>
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
<?php $__env->stopPush(); ?><?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/website/corporate/enquiry-form.blade.php ENDPATH**/ ?>