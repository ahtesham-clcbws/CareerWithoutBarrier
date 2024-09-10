

<?php $__env->startSection('content'); ?>

<!-- Form step start -->
<?php echo $__env->make('student.layouts.form_arrow_step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Form step end -->
<?php if($student->is_final_submitted): ?> <style>input, select{pointer-events: none;}</style><?php endif; ?>

<!-- InstanceBeginEditable name="Content Area" -->
<div class="container-fluid pagecontentbody">
    <div class="tab-content">
        <div class="pagebody px-4">
            <form method="post" action="<?php echo e(route('students.addQualifications')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="qualification">Qualification:<span class="text-danger">*</span></label><br>
                            <select id="qualification" name="qualification" class="form-control form-select" required value="<?php echo e($student->qualification); ?>">
                                <option value="">--Select qualification--</option>
                                <option value="qualification1" <?php echo e($student->qualification == 'qualification1' ? 'selected' : ''); ?>>qualification 1</option>
                                <option value="qualification2" <?php echo e($student->qualification == 'qualification2' ? 'selected' : ''); ?>>qualification 2</option>
                                <option value="qualification3" <?php echo e($student->qualification == 'qualification3' ? 'selected' : ''); ?>>qualification 3</option>
                            </select>
                            <?php $__errorArgs = ['qualification'];
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
                        <div class="col-md-6 mb-3">
                            <label for="scholarship_category">Scholarship Category:<span class="text-danger">*</span></label><br>
                            <select id="scholarship_category" name="scholarship_category" class="form-control form-select" required value="<?php echo e($student->scholarship_category); ?>">
                                <option value="">--Select Category--</option>
                                <option value="category1" <?php echo e($student->scholarship_category == 'category1' ? 'selected' : ''); ?>>Category 1</option>
                                <option value="category2" <?php echo e($student->scholarship_category == 'category2' ? 'selected' : ''); ?>>Category 2</option>
                                <option value="category3" <?php echo e($student->scholarship_category == 'category3' ? 'selected' : ''); ?>>Category 3</option>
                            </select>
                            <?php $__errorArgs = ['scholarship_category'];
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
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="scholarship_opted_for">Scholarship Opted For:<span class="text-danger">*</span></label><br>
                            <select id="scholarship_opted_for" name="scholarship_opted_for" class="form-control form-select" required value="<?php echo e($student->scholarship_opted_for); ?>">
                                <option value="">--Select Option--</option>
                                <option value="option1" <?php echo e($student->scholarship_opted_for == 'option1' ? 'selected' : ''); ?>>Option 1</option>
                                <option value="option2" <?php echo e($student->scholarship_opted_for == 'option2' ? 'selected' : ''); ?>>Option 2</option>
                                <option value="option3" <?php echo e($student->scholarship_opted_for == 'option3' ? 'selected' : ''); ?>>Option 3</option>
                            </select>
                            <?php $__errorArgs = ['scholarship_opted_for'];
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
                        <div class="col-md-6 mb-3">
                            <label for="test_center_a">Choice of Test Centre (A):<span class="text-danger">*</span></label><br>
                            <select id="test_center_a" name="test_center_a" class="form-control form-select" value="<?php echo e($student->test_center_a); ?>" required>
                                <option value="">--Select Center--</option>
                                <?php $__currentLoopData = $choiceCenterA; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $center1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($center1->Id); ?>" <?php echo e($student->test_center_a ?? $student->district_id == $center1->Id ? 'selected' : ''); ?>><?php echo e($center1->DistrictName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['test_center_a'];
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
    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="test_center_b">Choice of Test Centre (B):<span class="text-danger">*</span></label><br>
                            <select id="test_center_b" name="test_center_b" class="form-control form-select" required value="<?php echo e($student->test_center_a); ?>">
                                <option value="">--Select Center--</option>
                                <?php $__currentLoopData = $choiceCenterB; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $center1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($center1->Id); ?>" <?php echo e($student->test_center_b == $center1->Id ? 'selected' : ''); ?>><?php echo e($center1->DistrictName); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
                            <?php $__errorArgs = ['test_center_b'];
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
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <hr />
                        </div>
                        <div class="col-md-2 d-grid">
                            <button type="submit" class="btn btn-theme submitform">Save and Next</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>


    </script>
    <!-- InstanceEndEditable -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lkaj6m2w9cvv/public_html/resources/views/student/dashboard/qualification_student.blade.php ENDPATH**/ ?>