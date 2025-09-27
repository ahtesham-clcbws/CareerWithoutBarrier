<div class="card" style="border-radius: 1rem;">
    <div class="row g-0">
        <div class="col-md-6 col-lg-5 d-none d-md-block">

            <img src="https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height:100%" />
        </div>
        <div class="col-md-6 col-lg-7 d-flex align-items-center">
            <div class="card-body p-4 p-lg-5 text-black">

                <form wire:submit="signUp">
                    <?php echo csrf_field(); ?>
                    <div class="d-flex align-items-center mb-3 pb-1">
                        <span class="h1 fw-bold mb-0">
                            <img src="<?php echo e(asset('website/assets/images/fav-icon.png')); ?>" alt="Signup form" class="img-thumnails" style="border-radius: 1rem 0 0 1rem;height:100%" />
                        </span>
                    </div>

                    <div class="form-outline mb-3">
                        <label class="form-label" for="institude_code">Branch code<span class="text-danger"> *</span></label>
                        <input type="text" id="institude_code" wire:model.live="institude_code" placeholder="Branch code" title="Please enter valid Branch code" class="form-control">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['institude_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger small"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <div class="row">
                        <div class="col-md-6 col">
                            <div class="form-outline mb-3">
                                <label class="form-label" for="phone">Phone Number<span class="text-danger"> *</span></label>
                                <input type="tel" id="phone" wire:model.live="phone" placeholder="Enter Phone number" title="Please enter valid Phone number" class="form-control">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <div class="col-md-6 col">
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form2Example17">Email ID<span class="text-danger"> *</span></label>
                                <input type="text" wire:model.live="email" placeholder="Email ID" title="Please enter valid Email ID" class="form-control">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col">
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form2Example27">Password<span class="text-danger"> *</span></label>
                                <div style="display: flex;">
                                    <input type="password" wire:model.live="password" placeholder="Password " class="form-control">
                                    <i toggle="#password-field" style="cursor: pointer;margin-left: -31px;margin-top: 10px;" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                                </div>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>

                        </div>
                        <div class="col-md-6 col">
                            <div class="form-outline mb-3">
                                <label class="form-label" for="password_confirmation">Confirm Password<span class="text-danger"> *</span></label>
                                <div style="display: flex;">
                                    <input type="password" wire:model.live="password_confirmation" id="password_confirmation" placeholder="Confirm Password " class="form-control">
                                    <i toggle="#password-field" style="cursor: pointer;margin-left: -31px;margin-top: 10px;" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                                </div>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger small"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>

                        <div class="col-md-12 col-12 mb-3">
                            <?php

                            use Illuminate\Support\Facades\DB;

                            $institudeTermsCondition = DB::table('terms_conditions')->where([['status', 1], ['type', 'institute'], ['page_name', 'terms-and-condition']])->first();
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model.live="terms" id="terms">
                                <label class="form-check-label" for="terms">
                                    I accept the <!--[if BLOCK]><![endif]--><?php if($institudeTermsCondition): ?> <a style="text-decoration: underline;" href="<?php echo e(asset('home/'.$institudeTermsCondition->terms_condition_pdf)); ?>" target="_blank"> Terms & Conditions </a><?php else: ?> Terms & Conditions <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </label>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                    </div>
                    <div class="pt-1 mb-3">
                        <button class="btn btn-dark btn-md btn-block" style="width: 100%;background: #1616c9;font-weight: 700;" type="submit">
                            <span class="spinner-border spinner-border-sm mr-3" wire:loading wire:target="signUp" role="status" aria-hidden="true"></span>Signup
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div><?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/auth/corporate/institute-sign-up-form.blade.php ENDPATH**/ ?>