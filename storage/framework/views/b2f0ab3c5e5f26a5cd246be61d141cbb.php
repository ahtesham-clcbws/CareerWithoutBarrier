

<?php $__env->startSection('content'); ?>

<!-- Form step start -->
<?php echo $__env->make('student.layouts.form_arrow_step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Form step end -->

<!-- InstanceBeginEditable name="Content Area" -->
<?php if($student->is_final_submitted): ?> <style>
   input,
   select {
      pointer-events: none;
   }
</style><?php endif; ?>
<div class="container pagecontentbody">
   <div class="tab-content">
      <div class="pagebody px-2">
         <div class="container">
            <form method="post" action="<?php echo e(route('students.addstudent')); ?>" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>

               <div class="row mt-2 ">
                  <div class="col-md-6 mb-3">
                     <label class="form-label">Student Name</label>
                     <input pattern="[A-Za-z]+" class="form-control" value="<?php echo e($student->name); ?>" name="name" />
                     <?php $__errorArgs = ['name'];
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
                  <div class="col-md-6 col mb-3">
                     <label class="form-label">Name of Father<span class="text-danger">*</span></label>
                     <input pattern="[A-Za-z ]+" class="form-control" placeholder="Enter name of Father" value="<?php echo e($student->father_name); ?>" name="father_name" required />
                     <?php $__errorArgs = ['father_name'];
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
                  <div class="col-md-6 col mb-3">
                     <label class="form-label">Mobile<span class="text-danger">*</span></label>
                     <input pattern="[0-9]+" class="form-control" placeholder="Enter Mobile" value="<?php echo e($student->mobile); ?>" name="" disabled />
                  </div>
                  <div class="col-md-6 col mb-3">
                     <label class="form-label">Email ID<span class="text-danger">*</span></label>
                     <input pattern="[0-9]+" class="form-control" placeholder="Enter Email ID" value="<?php echo e($student->email); ?>" name="" disabled />
                  </div>

                  <div class="col-md-6 col mb-3">
                     <label class="form-label">Date of Birth<span class="text-danger">*</span></label>
                     <input type="date" class="form-control " placeholder="dd-mm-yyyy" value="<?php echo e($student->dob); ?>" name="dob" id="dob" required />
                     <?php $__errorArgs = ['dob'];
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
                  <div class="col-md-6 col mb-3">
                     <label class="form-label">Gender<span class="text-danger">*</span></label>
                     <select name="gender" class="form-control form-select" id="gender" required>
                        <option value="">--Select Gender--</option>
                        <option value="Male" <?php echo e('Male' == $student->gender ? 'selected' : ''); ?>>Male</option>
                        <option value="Female" <?php echo e('Female' == $student->gender ? 'selected' : ''); ?>>Female</option>
                        <option value="Transgender" <?php echo e('Transgender' == $student->gender ? 'selected' : ''); ?>>Transgender</option>
                     </select>
                     <?php $__errorArgs = ['gender'];
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
                  <!-- 
               <div class="col-md-6 col mb-3">
                  <label class="form-label">Course Category <span class="text-danger">*</span></label>
                  <select name="category_id" class="form-control form-select" id="category" required>
                     <option value="">--Select category--</option>
                     <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == $student->category_id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php $__errorArgs = ['category'];
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

               <div class="col-md-6 col mb-3">
                  <label class="form-label">Subcategory <span class="text-danger">*</span></label>
                  <select name="subcategory_id" class="form-control form-select" id="subcategory" required>
                     <option value="">--Select subcategory--</option>
                  </select>
                  <?php $__errorArgs = ['subcategory'];
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

               <div class="col-md-6 col mb-3">
                  <label class="form-label">Subject </label>
                  <select name="subject" class="form-control form-select" id="subject">
                     <option value="">--Select subject--</option>
                  </select>
                  <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <div class="text-danger"><?php echo e($message); ?></div>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
               </div> -->

                  <div class="col-md-12 col mb-3">
                     <label class="form-label">Address<span class="text-danger">*</span></label>
                     <input class="form-control" name="address" placeholder="Enter address" value="<?php echo e($student->address); ?>" required />
                     <?php $__errorArgs = ['address'];
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
                  <div class="col-md-6 col mb-3">
                     <label class="form-label">State<span class="text-danger">*</span></label>
                     <select name="state_id" class="form-control form-select" id="state" onchange="selectDisctrict(this.value)" required>
                        <option value="">--Select state--</option>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->Id); ?>" <?php echo e($student->state_id == $state->Id ? 'selected' : ''); ?>><?php echo e($state->StateName); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
                     <?php $__errorArgs = ['state_id'];
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
                  <div class="col-md-6 col mb-3">
                     <label class="form-label">District/City<span class="text-danger">*</span></label>
                     <select name="district_id" class="form-control form-select" id="district" required>
                        <option value="">--Select District/City--</option>
                     </select>
                     <?php $__errorArgs = ['district_id'];
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
                  <div class="col-md-6 col mb-3">
                     <label class="form-label">Landmark</label>
                     <input type="text" placeholder="Enter landmark" class="form-control" name="landmark" value="<?php echo e($student->landmark); ?>" />
                     <?php $__errorArgs = ['landmark'];
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
                  <div class="col-md-3 col col mb-3">
                     <label class="form-label">Pincode<span class="text-danger">*</span><small>[Max Digits:6]</small></label>
                     <input type="text" pattern="[0-9]{6}" placeholder="Enter pincode" class="form-control" name="pincode" value="<?php echo e($student->pincode); ?>" required />
                     <?php $__errorArgs = ['pincode'];
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
                  <div class="col-md-3 col mb-3">
                     <div class="" style=" ">
                        <span style="display: block;font-family: Josefin Sans;font-size: 16px;font-weight: 600;padding: 7px 7px 10px 4px;">Person Disability</span>
                        &nbsp;&nbsp; <input type="radio" name="disability" value="Yes" <?php echo e($student->disability == 'Yes' ? 'checked' : ''); ?>> Yes
                        &nbsp; <input type="radio" name="disability" value="No" <?php echo e($student->disability == 'No' ? 'checked' : ''); ?>> No &nbsp;
                     </div> <?php $__errorArgs = ['disability'];
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
            </form>
         </div>
      </div>
   </div>
</div>

<script>
   $(document).ready(function() {

      // Handle change event for category dropdown
      // $('#category').change(function() {
      //    var categoryId = $(this).val();
      //    if (categoryId) {
      //       fetchSubcategories(categoryId);
      //    } else {
      //       $('#subcategory').html('<option value="">--Select subcategory--</option>');
      //       $('#subject').html('<option value="">--Select subject--</option>');
      //    }
      // });

      // // Handle change event for subcategory dropdown
      // $('#subcategory').change(function() {
      //    var subcategoryId = $(this).val();
      //    if (subcategoryId) {
      //       fetchSubjects(subcategoryId);
      //    } else {
      //       $('#subject').html('<option value="">--Select subject--</option>');
      //    }
      // });

      // Handle change event for subcategory dropdown
      // // Function to fetch subcategories based on category
      // function fetchSubcategories(categoryId) {
      //    $.get('/subcategories/' + categoryId, function(data) {
      //       $('#subcategory').empty().append('<option value="">--Select subcategory--</option>');
      //       $.each(data, function(index, subcategory) {
      //          $('#subcategory').append('<option value="' + subcategory.id + '">' + subcategory.subcategory_name + '</option>');
      //       });
      //    });
      // }

      // // Function to fetch subjects based on subcategory
      // function fetchSubjects(subcategoryId) {
      //    $.get('/subjects/' + subcategoryId, function(data) {
      //       $('#subject').empty().append('<option value="">--Select subject--</option>');
      //       $.each(data, function(index, subject) {
      //          $('#subject').append('<option value="' + subject.id + '">' + subject.subjectName + '</option>');
      //       });
      //    });
      // }

   });

   function selectDisctrict(state) {
      if (state) {
         fetchDistricts(state);
      } else {
         $('#district').html('<option value="">--Select district--</option>');
      }
   }

   $('#state').val(<?php echo e($student->state_id ?? 'null'); ?>).trigger('change');

   // Function to fetch subjects based on subcategory
   function fetchDistricts(state) {
      $.get('/districts/' + state, function(data) {
         $('#district').empty().append('<option value="">--Select District/City--</option>');
         $.each(data, function(index, district) {
            // Check if the district id matches the saved district id for the student
            var selected = (<?php echo e($student->district_id ?? 'null'); ?> == district.Id) ? 'selected' : '';
            $('#district').append('<option value="' + district.Id + '" ' + selected + '>' + district.DistrictName + '</option>');
         });
      });
   }

   // Calculate the date 10 years ago from today
   var today = new Date();
   var tenYearsAgo = new Date(today.getFullYear() - 16, today.getMonth(), today.getDate());

   // Format the date as required by the date input
   var formattedDate = tenYearsAgo.toISOString().split('T')[0];

   // Set the max attribute of the input element
   document.getElementById("dob").setAttribute("max", formattedDate);
</script>
<!-- InstanceEndEditable -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lkaj6m2w9cvv/public_html/resources/views/student/dashboard/studentform.blade.php ENDPATH**/ ?>