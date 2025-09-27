
<?php $__env->startSection('title'); ?>
Scholarship Course List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<style>
    textarea {
        width: 100%;
    }

    .select2-selection__choice__display {
        color: black;
    }
</style>
<!-- scholarship Section One Start  -->
<div class="row py-2 pl-3 pr-3">
    <div class="col-md-6 col-lg-6 col">
        <div class="card-header">
            <h4>Scholarship Course Section:</h4>
        </div>
        <div class="card alert">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 col">
                            <div class="form-group">
                                <p class="text-muted f-s-12">Add Icon Image<span class="text-danger">(60x60)*</span></p>
                                <input required type="file" id="fileInputSection2" class="form-control input-focus" onchange="validateImage(this)" name="icon">
                                <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <img class="imagePreviewSection2" src="#" alt="Image Preview" style="display: none;width:100px">
                            </div>
                        </div>
                        <div class="col-md-6 col">
                            <div class="form-group">
                                <p for="education_type_id" class="text-muted f-s-12">Scholarship Category<span class="text-danger">*</span></p>
                                <select class="form-select form-select-sm form-control input-focus" id="education_type_id" name="education_type_id" <?php echo e(count($data['educations']) ? '' : 'disabled'); ?> required>
                                    <option value="">-Select Scholarship-</option>
                                    <?php $__currentLoopData = $data['educations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($education['id']); ?>"><?php echo e($education['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input id="form_name_scholarship" type="hidden" name="form_type" value="scholarship_form" class="form-control">
                                <input id="" type="hidden" name="scholarship_id" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col">
                            <div class="form-group">
                                <p class="text-muted f-s-12">Remark<span class="text-danger">*</span></p>
                                <input id="remark" name="remark" class="form-control" required placeholder="100% Scholarship For 600 Brilliant Aspirants">
                            </div>
                        </div>
                        <div class="col-md-6 col">
                            <div class="form-group">
                                <p class="text-muted f-s-12">Add Picture<span class="text-danger">(1600x930)*</span></p>
                                <input required type="file" id="fileInputSection2" class="form-control input-focus" onchange="validateImage(this)" name="picture">
                                <?php $__errorArgs = ['picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <img class="imagePreviewSection2" src="#" alt="Image Preview" style="display: none;width:100px">
                            </div>
                        </div>
                        <div class="col text-center">
                            <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col">
        <div class="card-header">
            <h4>Scholarship Message List:</h4>
        </div>
        <div class="card">
            <div class="card-body" style="max-height: 435px; overflow-y: auto; padding:0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sr.N.</th>
                            <th>ScholarShip</th>
                            <th>Icon</th>
                            <th>Remarks</th>
                            <th>Picture</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($data['scholarships'])): ?>
                        <?php $__currentLoopData = $data['scholarships']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scholarship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($scholarship->educationType?->name); ?></td>

                            <td>
                                <div style="text-align: center;">
                                    <?php if($scholarship->icon): ?>
                                    <a href="<?php echo e(asset('home/aboutus/'.$scholarship->icon)); ?>" target="_blank"> <img src="<?php echo e(asset('home/aboutus/'.$scholarship->icon)); ?>" alt="icon Image" style=" max-height: 40px;">
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                                    <?php echo e($scholarship->remark); ?>

                                </div>
                            </td>

                            <td>
                                <div style="text-align: center;">
                                    <?php if($scholarship->picture): ?>
                                    <a href="<?php echo e(asset('home/aboutus/'.$scholarship->picture)); ?>" target="_blank"> <img src="<?php echo e(asset('home/aboutus/'.$scholarship->picture)); ?>" alt="picture Image" style=" max-height: 50px;">
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </td>

                            <td>
                                <div class="form-control2">
                                    <label class="switch" for="status-<?php echo e($scholarship->id); ?>">
                                        <input type="checkbox" id="status-<?php echo e($scholarship->id); ?>" data-id="<?php echo e($scholarship->id); ?>" onchange="toggleStatus(this, 'scholarship')" <?php echo e($scholarship->is_featured ? 'checked' :
                                                        ''); ?>>
                                        <div class="slider round">
                                            <span class="off">Inactive</span>
                                            <span class="on">Active</span>
                                        </div>
                                    </label>
                                </div>
                            </td>

                            <td style="text-align: center">
                                <a href="<?php echo e(route('home.scholarshipDelete', ['form_type' => 'scholarship','id' => $scholarship->id])); ?>">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Scholarship Section One End -->

<!-- scholarship Section Two Start  -->
<div class="row  py-2 pl-3 pr-3">
    <div class="col-md-12 col-lg-12 col">
        <div class="card-header">
            <h4>CAREER PREP SCHOLARSHIP EXAM:</h4>
        </div>
        <div class="card alert">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">

                        <div class="col-md-4 col-lg-4 col">
                            <div class="form-group">
                                <label for="scholarship_course">Scholarship Course<span class="text-danger">*</span></label>
                                <select class="form-select form-select-sm" name="scholarship_course" required>
                                    <option value="">--Select Scholarship--</option>
                                    <?php $__currentLoopData = $data['scholarshipCourses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scholarshipCourse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($scholarshipCourse->id); ?>"> <?php echo e($scholarshipCourse->educationType?->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input id="scholarship_secondForm" type="hidden" name="form_type" value="scholarship_secondForm" class="form-control">
                                <input id="" type="hidden" name="scholarshipTwo_id" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col">
                            <div class="form-group">
                                <label for="prospectus">Attach prospectus (Max 2MB, JPG, PNG, PDF Only):<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="custom-file custom-file-prospectus">
                                        <input type="file" name="prospectus" value="<?php echo e($scholarshipTwo?->prospectus); ?>" class="custom-file-input" id="prospectus" onchange="validateImage(this,'imagepdf')" <?php echo e($scholarshipTwo?->prospectus ? '' : 'required'); ?>>
                                        <label class="custom-file-label" for="prospectus">Choose file</label>
                                        <?php $__errorArgs = ['prospectus'];
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
                                    <?php if($scholarshipTwo?->prospectus): ?>
                                    <div class="input-group-append student-prospectus-img-view" style="margin-left: 10px;margin-top: -2rem;">
                                        <a style="background: none;border: none;" target="_blank" class="btn btn-outline-secondary btn-success" href="<?php echo e(asset('upload/student/'.$scholarshipTwo?->prospectus)); ?>">
                                            <img src="<?php echo e(asset('upload/student/'.$scholarshipTwo?->prospectus)); ?>" alt="prospectus" style="width: 7rem;height: 8rem;margin-top: -10re;">
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col">
                            <div class="form-group">
                                <label for="guideline">Attach guideline (Max 2MB, JPG, PNG, PDF Only):<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="custom-file custom-file-guideline">
                                        <input type="file" name="guideline" value="<?php echo e($scholarshipTwo?->guideline); ?>" class="custom-file-input" id="guideline" onchange="validateImage(this,'imagepdf')" <?php echo e($scholarshipTwo?->guideline ? '' : 'required'); ?>>
                                        <label class="custom-file-label" for="guideline">Choose file</label>
                                        <?php $__errorArgs = ['guideline'];
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
                                    <?php if($scholarshipTwo?->guideline): ?>
                                    <div class="input-group-append student-guideline-img-view" style="margin-left: 10px;margin-top: -2rem;">
                                        <a style="background: none;border: none;" target="_blank" class="btn btn-outline-secondary btn-success" href="<?php echo e(asset('upload/student/'.$scholarshipTwo?->guideline)); ?>">
                                            <img src="<?php echo e(asset('upload/student/'.$scholarshipTwo?->guideline)); ?>" alt="guideline" style="width: 7rem;height: 8rem;margin-top: -10re;">
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col">
                            <div class="form-group">
                                <label for="overview">Overview<span class="text-danger">*</span></label>
                                <textarea id="IdOfCKEditorTextArea" class="ckeditor form-control w-100" value="<?php echo e(old('overview') ? $scholarshipTwo?->overview : ''); ?>" style="width: 100%;" name="overview" placeholder="Enter overview here"></textarea>
                                <?php $__errorArgs = ['overview'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($overview); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="col text-center pt-5">
                            <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col">
        <div class="card-header">
            <h4>Scholarship OverView List:</h4>
        </div>
        <div class="card">
            <div class="card-body" style="max-height: 435px; overflow-y: auto; padding:0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sr.N.</th>
                            <th>ScholarShip Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($data['scholarshipTwos'])): ?>
                        <?php $__currentLoopData = $data['scholarshipTwos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scholarship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($scholarship->scholarshipType?->educationType?->name ?? ''); ?></td>
                            <td>
                                <div class="form-control2">
                                    <label class="switch" for="status1-<?php echo e($scholarship->id); ?>">
                                        <input type="checkbox" id="status1-<?php echo e($scholarship->id); ?>" data-id="<?php echo e($scholarship->id); ?>" onchange="toggleStatus(this, 'scholarship_secondForm')" <?php echo e($scholarship->is_featured ? 'checked' :
                                                        ''); ?>>
                                        <div class="slider round">
                                            <span class="off">Inactive</span>
                                            <span class="on">Active</span>
                                        </div>
                                    </label>
                                </div>
                            </td>

                            <td style="text-align: center">
                                <a href="<?php echo e(route('home.scholarshipDelete', ['form_type' => 'scholarship_secondForm','id' => $scholarship->id])); ?>">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- scholarship Section Two Start  -->

<script>
    function toggleStatus(element, $type) {

        var id = $(element).data('id');
        var isStatus = $(element).is(':checked') ? 1 : 0;

        $.ajax({
            url: "<?php echo e(route('scholarship.toggleStatus')); ?>",
            method: 'POST',
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                id: id,
                status: isStatus,
                form_type: $type
            },
            success: function(response) {
                if (response.status) {
                    success(response.message);
                } else {
                    error(response.message);
                }
            },
            error: function(xhr) {
                error(xhr.responseText);
            }
        });
    };
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/Home/scholarship.blade.php ENDPATH**/ ?>