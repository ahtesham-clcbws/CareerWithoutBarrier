<?php $__env->startSection('content'); ?>

<!-- Form step start -->
<?php echo $__env->make('student.layouts.form_arrow_step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Form step end -->
<?php if($student->is_final_submitted): ?> <style>input, select{pointer-events: none;}</style><?php endif; ?>
<?php

use App\Models\BoardAgencyStateModel;

$qualifications = BoardAgencyStateModel::all();

?>
<!-- InstanceBeginEditable name="Content Area" -->
<div class="container pagecontentbody">
    <div class="tab-content" >
        <div class="pagebody row" >
            <form method="post" action="<?php echo e(route('students.addQualifications')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="container col-md-9 " style="border: 1px solid #c6cbd0;padding: 8px 25px;">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="qualification">Qualification:<span class="text-danger">*</span></label><br>
                            <select id="qualification" name="qualification" class="form-control form-select" required onchange="getScholarshipCategory(this.value)" value="<?php echo e($student->qualification); ?>">
                                <option value="">--Select qualification--</option>
                                <?php $__currentLoopData = $qualifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($qualification->id); ?>" <?php echo e($student->qualification == $qualification->id ? 'selected' : ''); ?>>
                                    <?php echo e($qualification->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
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
                            <select onchange="getScholarshipoptedfor(this.value)" id="scholarship_category" name="scholarship_category" class="form-control form-select" required value="<?php echo e($student->scholarship_category); ?>">
                                <option value="">--Select Category--</option>
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
                                <option value="<?php echo e($center1->id); ?>" <?php echo e($student->test_center_a ?? $student->district_id == $center1->id ? 'selected' : ''); ?>><?php echo e($center1->name); ?></option>
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
                                <option value="<?php echo e($center1->id); ?>" <?php echo e($student->test_center_b == $center1->id ? 'selected' : ''); ?>><?php echo e($center1->name); ?></option>
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
                        <div class="col-md-3 d-grid">
                            <button type="submit" class="btn btn-theme submitform">Save and Next</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        if("<?php echo e($student->scholarship_category); ?>"){
            console.log(<?php echo e($student->scholarship_category); ?>)
            getScholarshipCategory("<?php echo e($student->scholarship_category); ?>",'Yes') 
        }
function getScholarshipCategory(id, type=null){
    $.get('/students/get_scholarship_category/' + id+'/'+type, function(response) {
        if(response.status){
console.log(response.data !=null)
        var data = response.data;
        if(response.data !=null){

            $('#scholarship_category').empty().append('<option value="">--Select Option--</option>');
            $.each(response.data, function(index, st) {
        var selected = (<?php echo e($student->scholarship_category ?? 'null'); ?> == st.id) ? 'selected' : '';

         $('#scholarship_category').append('<option value="' + st.id + '" ' + selected + '>' + st.name + '</option>');
        });
        }
        }else{
            error(response.message)
        }

      });
 
}

if("<?php echo e($student->scholarship_opted_for); ?>" !=""){
    getScholarshipoptedfor("<?php echo e($student->scholarship_category); ?>")
}
function getScholarshipoptedfor(id){
    $qulificationid = $('#qualification').val();

    $.get('/students/get_scholarship_opted_for/' + id+'/'+ $qulificationid, function(response) { 
        if(response.scholarOptedFor.length > 0){

$('#scholarship_opted_for').empty().append('<option value="">--Select Scholarship Opted For--</option>');
 $.each(response.scholarOptedFor, function(index, optedfor) {
    var selected = (<?php echo e($student->scholarship_opted_for ?? 'null'); ?> == optedfor.id) ? 'selected' : '';
    $('#scholarship_opted_for').append('<option value="' + optedfor.id + '" ' + selected + '>' + optedfor.name + '</option>');
 });
 }else{
$('#scholarship_opted_for').empty().append('<option value="">--Select Scholarship Opted For--</option>');

            error(response.message)
        }

     });
}

    </script>
    <!-- InstanceEndEditable -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/student/dashboard/qualification_student.blade.php ENDPATH**/ ?>