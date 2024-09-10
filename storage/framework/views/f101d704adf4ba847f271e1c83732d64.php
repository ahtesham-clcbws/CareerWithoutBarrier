
<?php $__env->startSection('content'); ?>



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
                <form method="post" action="<?php echo e(route('students.claimScholarshipFormSave')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 col">
                            <h5>
                                Choice One
                            </h5>
                            <div class="row mt-2 ">

                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institude Name<span class="text-danger">*</span></label>
                                    <input required pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of institude" name="institude_name1" value="<?php echo e($claimForm?->institude_name1); ?>" />
                                    <?php $__errorArgs = ['institude_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute’s Director’s Name<span class="text-danger"></span></label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of Director" name="institude_director1" value="<?php echo e($claimForm?->institude_director1); ?>" />
                                    <?php $__errorArgs = ['institude_director'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col mb-2 ">
                                    <label class="form-label">Institute/ Contact Details<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Mobile No" name="institude_mobile1" value="<?php echo e($claimForm?->institude_mobile1); ?>" />
                                        <div class="input-group-append">
                                        <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Whatsapp No" name="whatsapp_no1" value="<?php echo e($claimForm?->whatsapp_no1); ?>" />
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['institude_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute E-mail Id</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Email" name="institude_email1" value="<?php echo e($claimForm?->institude_email1); ?>" />
                                    <?php $__errorArgs = ['institude_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">State<span class="text-danger">*</span></label>
                                    <input required pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="State" name="state1" value="<?php echo e($student->state?->name); ?>" />

                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">City<span class="text-danger">*</span></label>
                                    <select name="city_id1" class="form-control form-select" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" id="district" required>
                                        <option value="">--Select City--</option>

                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->id); ?>" <?php echo e($city->id == $claimForm?->city_id1 ? 'selected' : ''); ?>><?php echo e($city->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Institute Address<span class="text-danger">*</span></label>
                                    <input required pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Institude Address" name="institude_address1" value="<?php echo e($claimForm?->institude_address1); ?>" />
                                    <?php $__errorArgs = ['institude_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Desired Course Detail<span class="text-danger">*</span></label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Desired Course Detail*" value="" name="desired_course_detail1" value="<?php echo e($claimForm?->desired_course_detail1); ?>" />
                                    <?php $__errorArgs = ['desired_course_detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 col mb-2 ">
                                    <label class="form-label">Course Fee<span class="text-danger">*</span></label>
                                    <input required class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_fee1" value="<?php echo e($claimForm?->course_fee1); ?>" placeholder="Enter address" required />
                                    <?php $__errorArgs = ['course_duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['course_fee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">Course Duration<span class="text-danger">*</span></label>
                                    <input required class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_duration1" value="<?php echo e($claimForm?->course_duration1); ?>" placeholder="Enter Duration" required />
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute Prospectus</label>
                                    <input type="file" id="fileInput" class="form-control input-focus" onchange="validateImage(this,'imagepdf')" name="institude_prospectus1">

                                    <?php $__errorArgs = ['institude_prospectus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col">
                            <h5>
                                Choice Two
                            </h5>
                            <div class="row mt-2 ">
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institude Name<span class="text-danger">*</span></label>
                                    <input required pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of institude" name="institude_name2" value="<?php echo e($claimForm?->institude_name2); ?>" />
                                    <?php $__errorArgs = ['institude_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute’s Director’s Name<span class="text-danger"></span></label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of Director" name="institude_director2" value="<?php echo e($claimForm?->institude_director2); ?>" />
                                    <?php $__errorArgs = ['institude_director'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col mb-2 ">
                                    <label class="form-label">Institute/ Contact Details<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Mobile No" name="institude_mobile2" value="<?php echo e($claimForm?->institude_mobile2); ?>" />
                                        <div class="input-group-append">
                                        <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Whatsapp No" name="whatsapp_no2" value="<?php echo e($claimForm?->whatsapp_no2); ?>" />
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['institude_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute E-mail Id</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Email" name="institude_email2" value="<?php echo e($claimForm?->institude_email2); ?>" />
                                    <?php $__errorArgs = ['institude_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">State<span class="text-danger">*</span></label>
                                    <input required pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="State" name="state2" value="<?php echo e($student->state?->name); ?>" />

                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">City<span class="text-danger">*</span></label>
                                    <select name="city_id2" class="form-control form-select" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" id="district" required>
                                        <option value="">--Select City--</option>

                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->id); ?>" <?php echo e($city->id == $claimForm?->city_id2 ? 'selected' : ''); ?>><?php echo e($city->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Institute Address<span class="text-danger">*</span></label>
                                    <input required pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Institude Address" name="institude_address2" value="<?php echo e($claimForm?->institude_address2); ?>" />
                                    <?php $__errorArgs = ['institude_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Desired Course Detail<span class="text-danger">*</span></label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Desired Course Detail*" value="" name="desired_course_detail2" value="<?php echo e($claimForm?->desired_course_detail2); ?>" />
                                    <?php $__errorArgs = ['desired_course_detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 col mb-2 ">
                                    <label class="form-label">Course Fee<span class="text-danger">*</span></label>
                                    <input required class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_fee2" value="<?php echo e($claimForm?->course_fee2); ?>" placeholder="Enter address" required />
                                    <?php $__errorArgs = ['course_duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['course_fee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">Course Duration<span class="text-danger">*</span></label>
                                    <input required class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_duration2" value="<?php echo e($claimForm?->course_duration2); ?>" placeholder="Enter Duration" required />
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute Prospectus</label>
                                    <input type="file" id="fileInput" class="form-control input-focus" onchange="validateImage(this,'imagepdf')" name="institude_prospectus2">

                                    <?php $__errorArgs = ['institude_prospectus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                    <label class="form-label">Institude Name</label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of institude" name="institude_name3" value="<?php echo e($claimForm?->institude_name3); ?>" />
                                    <?php $__errorArgs = ['institude_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute’s Director’s Name<span class="text-danger"></span></label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of Director" name="institude_director3" value="<?php echo e($claimForm?->institude_director3); ?>" />
                                    <?php $__errorArgs = ['institude_director'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col mb-2 ">
                                    <label class="form-label">Institute/ Contact Details</label>
                                    <div class="input-group">
                                        <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Mobile No" name="institude_mobile3" value="<?php echo e($claimForm?->institude_mobile3); ?>" />
                                        <div class="input-group-append">
                                            <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter whatsapp no" name="whatsapp_no3" value="<?php echo e($claimForm?->whatsapp_no3); ?>" />
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['institude_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute E-mail Id</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Email" name="institude_email3" value="<?php echo e($claimForm?->institude_email3); ?>" />
                                    <?php $__errorArgs = ['institude_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">State</label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="State" name="state3" value="<?php echo e($student->state?->name); ?>" />

                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">City</label>
                                    <select name="city_id3" class="form-control form-select" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" id="district">
                                        <option value="">--Select City--</option>

                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->id); ?>" <?php echo e($city->id == $claimForm?->city_id1 ? 'selected' : ''); ?>><?php echo e($city->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Institute Address</label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Institude Address" name="institude_address3" value="<?php echo e($claimForm?->institude_address3); ?>" />
                                    <?php $__errorArgs = ['institude_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Desired Course Detail</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Desired Course Detail*" value="" name="desired_course_detail3" value="<?php echo e($claimForm?->desired_course_detail3); ?>" />
                                    <?php $__errorArgs = ['desired_course_detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 col mb-2 ">
                                    <label class="form-label">Course Fee</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_fee3" value="<?php echo e($claimForm?->course_fee3); ?>" placeholder="Enter address" />
                                    <?php $__errorArgs = ['course_duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['course_fee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">Course Duration</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_duration3" value="<?php echo e($claimForm?->course_duration3); ?>" placeholder="Enter Duration" />
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute Prospectus</label>
                                    <input type="file" id="fileInput" class="form-control input-focus" onchange="validateImage(this,'imagepdf')" name="institude_prospectus3">

                                    <?php $__errorArgs = ['institude_prospectus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col">
                            <h5>
                                Choice Fourth
                            </h5>
                            <div class="row mt-2 ">
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institude Name<span class="text-danger">*</span></label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of institude" name="institude_name4" value="<?php echo e($claimForm?->institude_name4); ?>" />
                                    <?php $__errorArgs = ['institude_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute’s Director’s Name<span class="text-danger"></span></label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Name of Director" name="institude_director4" value="<?php echo e($claimForm?->institude_director4); ?>" />
                                    <?php $__errorArgs = ['institude_director'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col mb-2 ">
                                    <label class="form-label">Institute/ Contact Details<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Mobile No" name="institude_mobile4" value="<?php echo e($claimForm?->institude_mobile4); ?>" />
                                        <div class="input-group-append">
                                            <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Whatsapp No" name="whatsapp_no4" value="<?php echo e($claimForm?->whatsapp_no4); ?>" />
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['institude_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute E-mail Id</label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Enter Email" name="institude_email4" value="<?php echo e($claimForm?->institude_email4); ?>" />
                                    <?php $__errorArgs = ['institude_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">State<span class="text-danger">*</span></label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="State" name="state4" value="<?php echo e($student->state?->name); ?>" />

                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">City<span class="text-danger">*</span></label>
                                    <select name="city_id4" class="form-control form-select" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" id="district">
                                        <option value="">--Select City--</option>

                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->id); ?>" <?php echo e($city->id == $claimForm?->city_id2 ? 'selected' : ''); ?>><?php echo e($city->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Institute Address<span class="text-danger">*</span></label>
                                    <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Institude Address" name="institude_address4" value="<?php echo e($claimForm?->institude_address4); ?>" />
                                    <?php $__errorArgs = ['institude_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label">Desired Course Detail<span class="text-danger">*</span></label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Desired Course Detail*" value="" name="desired_course_detail4" value="<?php echo e($claimForm?->desired_course_detail4); ?>" />
                                    <?php $__errorArgs = ['desired_course_detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 col mb-2 ">
                                    <label class="form-label">Course Fee<span class="text-danger">*</span></label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_fee4" value="<?php echo e($claimForm?->course_fee4); ?>" placeholder="Enter address" />
                                    <?php $__errorArgs = ['course_duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <?php $__errorArgs = ['course_fee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-6 col mb-2">
                                    <label class="form-label">Course Duration<span class="text-danger">*</span></label>
                                    <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="course_duration4" value="<?php echo e($claimForm?->course_duration4); ?>" placeholder="Enter Duration" />
                                </div>
                                <div class="col-md-12 col mb-2">
                                    <label class="form-label">Institute Prospectus</label>
                                    <input type="file" id="fileInput" class="form-control input-focus" onchange="validateImage(this,'imagepdf')" name="institude_prospectus4">

                                    <?php $__errorArgs = ['institude_prospectus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/student/dashboard/claim_scholarship.blade.php ENDPATH**/ ?>