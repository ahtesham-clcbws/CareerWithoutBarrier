

<?php $__env->startSection('content'); ?>

<style>
  .select2-selection__choice {
    color: black !important;
  }

  .selectAllCl .dt-column-order {
    display: none;

  }
</style>
<?php

use App\Models\StudentPaperExported;
?>
<div class="row px-3">

  <div class="col-lg-12">
    <div class="panel panel-default m-t-15">
      <div class="panel-heading m-2 ">
        <div class="row justify-content-space-between py-2">
          <div class="col-md-6 col">
            <h2>Student Result and Claim Form</h2>
          </div>
        </div>
      </div>

      <div class="panel-body">
        <div class="card alert">
          <!-- <div class="card-header"> -->
          <!-- <form action="#" method="post">
              <?php echo csrf_field(); ?>
              <div class="row" style="margin-bottom: 15px">
                <input type="hidden" value="filterform" name="filterform">

                <div class="col-md-3 col mb-3">
                  <label for="class">Scholarship Types<span class="text-danger">*</span></label>
                  <select class="form-control" id="education_name" name="education_name" required>
                    <option value="">--Select Scholarship--</option>
                    <?php $__currentLoopData = $scholarshipTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scholarship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($scholarship->id); ?>" <?php echo e(request()->education_name== $scholarship->id ? 'selected' : ''); ?>>
                      <?php echo e($scholarship->name); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                <div class="col-md-2 col mb-3">
                  <label class="form-label">Gender</label>
                  <select name="gender" class="form-control" id="genders-filters">
                    <option value="">--Select Gender--</option>
                    <option value="Male" <?php echo e(request()->gender == 'Male'  ? 'selected' : ''); ?>>Male</option>
                    <option value="Female" <?php echo e(request()->gender == 'Female'  ? 'selected' : ''); ?>>Female</option>
                    <option value="Transgender" <?php echo e(request()->gender == 'Transgender'  ? 'selected' : ''); ?>>Transgender</option>
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
                <div class="col-md-2 col mb-3">
                  <label class="form-label">Number of Student<span class="text-danger">*</span></label>
                  <input class="form-control" placeholder="Enter Number Of Student" type="text" pattern="[0-9]+" name="limit" value="<?php echo e(request()->limit); ?>" required>
                </div>

                <div class="col-md-2 col mb-3">
                  <label class="form-label">Percentage<span class="text-danger">*</span></label>
                  <input class="form-control" placeholder="Enter Percentage" type="text" pattern="[0-9]+" name="percentage" value="<?php echo e(request()->percentage); ?>" required>
                </div>
                <div class="col-md-2 col mb-3 ml-auto">
                  <label class="form-label">&nbsp;</label> <br>
                  <button type="submit" class="btn btn-primary ">Filter</button> &nbsp;&nbsp;
                  <a href="/administrator/student_result" class="btn btn-danger " style="text-decoration: none;">Reset</a>
                </div>
              </div>
            </form> -->
          <!-- </div> -->
          <form action="<?php echo e(route('admin.student.result.allow_claim')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered datatablecll">
                  <thead>
                    <tr>
                      <th class="selectAllCl text-center" style="padding-right: 10px;">Check_All <br> <input type="checkbox" id="selectAll"> </th>
                      <th>Student Name/ Gender</th>
                      <th>Email/ Mobile/ App_Code</th>

                      <th>Scholarship Category</th>
                      <th>Scholarship Opted For</th>
                      <th>City</th>
                      <th>Percentage</th>
                      <th>Page</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php



                    $studCode = $student->latestStudentCode;

                    ?>
                    <tr>

                      <td scope="row" style="text-align: right;">
                        <input type="hidden" name="student_id[]" value="<?php echo e($student->id); ?>">
                        <input title="Please Tick" type="checkbox" data-row-id="<?php echo e($student->id); ?>" name="allow_to_claim_scholarship[]" class="form-check-input rowCheckbox" id="allow_to_claim_scholarship" value="1" <?php echo e($studCode?->allow_to_claim_scholarship ? 'checked' : ''); ?> required>
                        &nbsp;&nbsp;

                        <?php echo e($loop->index + 1); ?>.)
                      </td>
                      <td><?php echo e($student->name); ?><br>
                       (<?php echo e(genderShort($student->gender)); ?>)
                      </td>
                      <td><?php echo e($student->email); ?> <br>
                        <?php echo e($student->mobile); ?> <br>
                        <?php echo e($studCode?->application_code ? $studCode?->application_code : 'NA'); ?>

                      </td>
                      <td><?php echo e($student->scholarShipCategory?->name ?? 'N/A'); ?> <br> <?php echo e($student->qualifications?->name); ?> </td>
                      <td><?php echo e($student->scholarShipOptedFor?->name ?? 'N/A'); ?></td>
                      <td><?php echo e($student->district?->name); ?></td>
                      <td style="text-align:center"><?php echo e(decimal_Number($student->latestStudentCode?->percentage)); ?> %</td>
                      <td>
                        <?php if($student->latestStudentCode?->percentage > 60): ?>
                        <a href="#" class="btn btn-warning text-danger" style="text-decoration: none; width: 94px; margin-bottom: 10px;"></i> Not Eligible</a>
                        <?php else: ?>
                        <a href="<?php echo e(route('admin.student.claim_form', $student->id)); ?>" class="btn btn-warning" style="text-decoration: none; width: 94px; margin-bottom: 10px;"></i> Claim Form</a>
                        <?php endif; ?>
                      
                         <br>
                        <a href="<?php echo e(route('admin.student.adminCard', $student->id)); ?>" class="btn btn-primary" style="text-decoration: none;"></i> Admit Card</a>
                      </td>
                      <td style="text-align:center">
                        <!-- <?php if($student->studentPaperDetails?->isNotEmpty()): ?> -->
                        <a href="<?php echo e(route('admin.student.result.detail', $student->id)); ?>" class="btn btn-primary" style="text-decoration: none;"></i> Result</a>
                        <!-- <?php endif; ?> -->
                        <button type="submit" class="btn btn-success mt-2 allow_claim_btn<?php echo e($student->id); ?> allow_to_claim_scholarship" style="display: none;"></i> Allow To Claim Scholarship</button>
                        </li>
                        </ul>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </tbody>
                </table>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<script>
  $('#selectAll').click(function() {
    $('.rowCheckbox').each(function() {
      $(this).prop('checked', $('#selectAll').prop('checked'));

      var rowId = $(this).data('row-id');
      if ($(this).is(':checked')) {
        $('.allow_claim_btn' + rowId).show();
      } else {
        $('.allow_claim_btn' + rowId).hide();
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/administrator/dashboard/student_result.blade.php ENDPATH**/ ?>