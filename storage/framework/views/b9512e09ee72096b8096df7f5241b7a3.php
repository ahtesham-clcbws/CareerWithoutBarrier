
<?php $__env->startSection('content'); ?>
<style>
   .inside-table>thead>tr>th {
      border-color: #ccc;
      background-color: #fff;
      color: black
   }

   .inside-table thead {
      background-color: #fff !important;
      border-bottom: 1px solid #ccc
   }

   .inside-table> :not(:last-child)> :last-child>* {
      border-bottom-color: #ccc
   }
</style>
<?php

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

$country = "";
$state = '';
$city = '';

if ($student->state_id) {
   $state = DB::table('states')->where('id', $student->state_id)->first()?->name;
}
$studentCode = $student->studentCode()->first();

?>

<?php if($student->is_final_submitted): ?> <style>
   input,
   select {
      pointer-events: none;
   }
</style><?php endif; ?>

<!-- InstanceBeginEditable name="Content Area" -->
<div class="container pagecontentbody">
   <div class="tab-content">
      <div class="pagebody p-4">
         <div class="row">
            <div class="col-md-9">
               <a style="border: 1px solid #17a2b8;background: #17a2b8;" href="<?php echo e(route('studentDashboard')); ?>" >
                  <svg viewBox="100 0 1024 1024" fill="#ffffff" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem; height: 2rem;">
                     <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                     <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                     <g id="SVGRepo_iconCarrier">
                        <path d="M669.6 849.6c8.8 8 22.4 7.2 30.4-1.6s7.2-22.4-1.6-30.4l-309.6-280c-8-7.2-8-17.6 0-24.8l309.6-270.4c8.8-8 9.6-21.6 2.4-30.4-8-8.8-21.6-9.6-30.4-2.4L360.8 480.8c-27.2 24-28 64-0.8 88.8l309.6 280z" fill=""></path>
                     </g>
                  </svg>
               </a>
            </div>
            <div class="col-md-3 text-end">
               <button style="border: 1px solid #17a2b8;background: #17a2b8;color:#fff" type="button" data-print="modal" onclick="PrintDoc()"> <i class="fa fa-print"></i> </button>


            </div>
         </div>
         <form action="<?php echo e($student->is_final_submitted ? '#' : route('students.finalSubmit')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="row justify-content-center">
               <div class="col-md-10">
                  <div id="prodiv">
                     <div id="content" style="position:relative;">
                        <table class="bsvtbl" border="0" cellspacing="0" cellpadding="8" width="100%" style="border-collapse:collapse;">
                           <thead>
                              <tr>
                                 <th colspan="4">
                                    <div style="padding: 0 15px 10px; margin-bottom: 10px; border-bottom: 2px solid #000; position: relative;">
                                       <img src="<?php echo e(asset('website/assets/images/fav-icon.png')); ?>" style="width: 50px; height: auto; position: absolute; top: 0px; left: 20px;" />
                                       <h1 style="text-align: center; font-size: 20pt; margin: 0px 0px 0px 0px; padding: 0px 0 0; color: #383838; font-weight: bold;">
                                          The Gyanology
                                       </h1>
                                       <h2 style="text-align: center; margin:0px 0px 0px 0px; font-size:14pt; padding: 0px; color:#383838; font-weight: bold;">
                                          Registration Form <?php echo e(date('Y')); ?>

                                       </h2>
                                    </div>
                                 </th>
                              </tr>
                              <tr class="dn">
                                 <th colspan="2" style="font-size: 12pt; text-align:left;font-weight:700;font-size:large;color:red">Please tick the checkbox &nbsp;&nbsp; &check;</th>

                                 <th colspan="2" style="text-align: right; font-size: 10pt;"><strong>Registration Date : </strong> <?php echo e($student->registration_date ? date_format($student->registration_date,'d-m-Y') :  date_format($student->created_at,'d-m-Y')); ?></th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>
                                    <b>Student Name</b>
                                 </td>

                                 <td colspan="2">
                                    <input type="hidden" name="name_checked" value="0"> <input title="Please Tick" type="checkbox" name="name_checked" class="form-check-input" id="name_checked" value="1" <?php echo e($student->name_checked ? 'checked' : ''); ?> required>
                                    &nbsp;&nbsp; <?php echo e($student->name); ?>

                                 </td>
                                 <td rowspan="5" colspan="2" align="center">
                                    <div class="text-center" style="display: inline-grid;">
                                       <img src="<?php echo e(url('upload/student/')); ?>/<?php echo e($student->photograph); ?>" class="img-fluid" style="width: 160px;border: 1px double #dee2e6;padding: 4px;height: 150px;">
                                       <img src="<?php echo e(url('upload/student/')); ?>/<?php echo e($student->signature); ?>" class="img-fluid" style="width: 160px;border: 1px double #dee2e6;padding: 4px;height: 60px;">
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Name of Father</b>
                                 </td>
                                 <td colspan="2">
                                    <input type="hidden" name="father_name_checked" value="0"> <input title="Please Tick" type="checkbox" name="father_name_checked" class="form-check-input" id="father_name_checked" value="1" <?php echo e($student->father_name_checked ? 'checked' : ''); ?> required>
                                    &nbsp;&nbsp; <?php echo e($student->father_name); ?>

                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Date of Birth</b>
                                 </td>
                                 <td colspan="2">
                                    <input type="hidden" name="dob_checked" value="0"> <input title="Please Tick" type="checkbox" name="dob_checked" class="form-check-input" id="dob_checked" value="1" <?php echo e($student->dob_checked ? 'checked' : ''); ?> required> &nbsp;&nbsp;
                                    <?php echo e(Carbon::parse($student->dob)->format('d/m/Y')); ?> <small>(<?php echo e(str_replace('ago','',Carbon::parse($student->dob)->diffForHumans())); ?>)</small>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Mobile Number</b>
                                 </td>
                                 <td colspan="2">
                                    <input type="hidden" name="mobile_checked" value="0"> <input title="Please Tick" type="checkbox" name="mobile_checked" class="form-check-input" id="mobile_checked" value="1" <?php echo e($student->mobile_checked ? 'checked' : ''); ?> required>
                                    &nbsp;&nbsp; <?php echo e($student->mobile); ?>

                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Email ID</b>
                                 </td>
                                 <td colspan="2">
                                    <input type="hidden" name="email_checked" value="0"> <input title="Please Tick" type="checkbox" name="email_checked" class="form-check-input" id="email_checked" value="1" <?php echo e($student->email_checked ? 'checked' : ''); ?> required>
                                    &nbsp;&nbsp;
                                    <?php echo e($student->email); ?>


                                 </td>
                              </tr>

                              <tr>
                                 <td>
                                    <b>Address</b>
                                 </td>
                                 <td>
                                    <?php echo e($student->address); ?>

                                 </td>
                                 <td>
                                    <b>State</b>
                                 </td>
                                 <td colspan="2">
                                    <?php echo e($state); ?>

                                 </td>

                              </tr>
                              <tr>
                                 <td>
                                    <b>City</b>
                                 </td>
                                 <td>
                                    <?php echo e($student->district?->name); ?>

                                 </td>
                                 <td>
                                    <b>Pincode</b>
                                 </td>
                                 <td colspan="2">
                                    <?php echo e($student->pincode); ?>

                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Qualification</b>
                                 </td>
                                 <td colspan="3">
                                    <input type="hidden" name="qualification_checked" value="0"> <input title="Please Tick" type="checkbox" name="qualification_checked" class="form-check-input" id="qualification_checked" value="1" <?php echo e($student->qualification_checked ? 'checked' : ''); ?> required>
                                    <?php echo e($student->qualifications?->name ?? 'N/A'); ?>

                                 </td>

                              </tr>
                              <tr>
                                 <td>
                                    <b>Scholarship Category</b>
                                 </td>
                                 <td>
                                    <div style="display: flex;">
                                       <div>

                                          <input type="hidden" name="scholarship_category_checked" value="0"> <input title="Please Tick" type="checkbox" name="scholarship_category_checked" class="form-check-input" id="scholarship_category_checked" value="1" <?php echo e($student->scholarship_category_checked ? 'checked' : ''); ?> required>
                                       </div>
                                       &nbsp; <div>
                                          <?php echo e($student->scholarShipCategory?->name ?? 'N/A'); ?>

                                       </div>
                                    </div>

                                 </td>
                                 <td>
                                    <b>Scholarship Opted For</b>
                                 </td>
                                 <td>
                                    <div style="display: flex;margin-left: 13px;">
                                       <input type="hidden" name="scholarship_opted_for_checked" value="0"> <input title="Please Tick" type="checkbox" name="scholarship_opted_for_checked" class="form-check-input" id="scholarship_opted_for_checked" value="1" <?php echo e($student->scholarship_opted_for_checked ? 'checked' : ''); ?> required>
                                       <div>
                                          <?php echo e($student->scholarShipOptedFor?->name ?? 'N/A'); ?>

                                       </div>
                                    </div>
                                 </td>
                              <tr>
                                 <td>
                                    <b>Choice of Test Centre (A)</b>
                                 </td>
                                 <td>
                                    <input type="hidden" name="choiceCenterA_checked" value="0">
                                    <input title="Please Tick" type="checkbox" name="choiceCenterA_checked" class="form-check-input" id="choiceCenterA_checked" value="1" <?php echo e($student->choiceCenterA_checked ? 'checked' : ''); ?> required>
                                    &nbsp;&nbsp; <?php echo e($student->choiceCenterA?->name ?? 'N/A'); ?>

                                 </td>

                                 <td>
                                    <b>Choice of Test Centre (B)</b>
                                 </td>
                                 <td>
                                    <input type="hidden" name="choiceCenterB_checked" value="0">
                                    <input title="Please Tick" type="checkbox" name="choiceCenterB_checked" class="form-check-input" id="choiceCenterB_checked" value="1" <?php echo e($student->choiceCenterB_checked ? 'checked' : ''); ?> required>
                                    &nbsp;&nbsp;
                                    <?php echo e($student->choiceCenterB?->name ?? 'N/A'); ?>

                                 </td>
                              <tr>
                                 <td>
                                    <b>Participate in any Govt/ Competitive Exam(s)?</b>
                                 </td>
                                 <td>
                                    <?php echo e(ucfirst($student->is_gov_exam_participated) ?? 'N/A'); ?>

                                 </td>
                                 <td>
                                    <?php if($student->is_gov_exam_participated == 'yes'): ?>
                                    <?php if($student->govt_exams_1): ?> <b>Exam 1</b><br>
                                    <?php endif; ?>
                                    <?php if($student->govt_exams_2): ?><br> <b>Exam 2</b><br>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                 </td>
                                 <td colspan="2">
                                    <?php if($student->is_gov_exam_participated == 'yes'): ?>
                                    <?php echo e($student->govt_exams_1); ?>

                                    <?php if($student->exam_one_year): ?>
                                    , Roll No: <?php echo e($studentCode?->roll_no); ?>

                                    <?php endif; ?>
                                    <?php if($student->exam_one_result): ?>
                                    <br> Result: <?php echo e($student->exam_one_result); ?> %
                                    <?php endif; ?>

                                    <?php if($student->govt_exams_2): ?>
                                    <br>
                                    <?php echo e($student->govt_exams_2); ?>

                                    <?php if($student->exam_two_year): ?>
                                    , Roll No: <?php echo e($studentCode?->roll_no); ?>

                                    <?php endif; ?>
                                    <?php if($student->exam_two_result): ?>
                                    <br> Result: <?php echo e($student->exam_two_result); ?> %
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Apply for the Career Without Barrier Scholarship Program</b>
                                 </td>
                                 <td>
                                    <?php echo e(ucfirst($student->is_apply_career_without_barrier) ?? 'N/A'); ?>

                                 </td>
                                 <td>
                                    <?php if($student->is_apply_career_without_barrier =='yes' && $student->year): ?>
                                    <b>Year: </b> &nbsp; <?php echo e($student->year); ?>

                                    <?php endif; ?>
                                 </td>
                                 <td colspan="2">
                                    <?php if($student->is_apply_career_without_barrier =='yes' && $studentCode?->roll_no): ?>
                                    <b>Roll No: </b> &nbsp; <?php echo e($studentCode?->roll_no); ?>

                                    <?php endif; ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <b>Father Occupation </b> &nbsp;&nbsp;&nbsp;
                                 </td>
                                 <td><?php echo e($student->father_occupation); ?> </td>
                                 <td><b>Mother Occupation </b></td>
                                 <td><?php echo e($student->mother_occupation); ?></td>

                              </tr>
                              <tr>
                                 <td>
                                    <b>Family Income</b>&nbsp;
                                 </td>
                                 <td>
                                    <?php echo e(familyIncome($student->family_income)); ?>

                                 </td>
                                 <td><b>Person with Disability</b></td>
                                 <td><?php echo e($student->disability); ?></td>
                              </tr>
                              <tr>
                                 <td colspan="4">
                                    <b>I agree for Career without Barrier’s <?php if($student->terms_conditions && $termsCondition): ?> <a href="<?php echo e(asset('home/'.$termsCondition->terms_condition_pdf)); ?>" target="_blank" style="text-decoration: underline;"> Terms & Conditions </a></b> &nbsp;&nbsp; &check; <?php endif; ?>

                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row justify-content-center">
               <div class="col-12">
                  <hr />
               </div>
               <?php if($student->is_final_submitted ): ?>
               <?php if(!$studentCode?->is_paid && $studentCode?->used_coupon==0): ?>
               <div class="col-md-2 d-grid">
                  <a type="submit" href="<?php echo e(route('student.payment')); ?>" class="btn btn-payment">Proceed To Pay</a>
               </div>
               <?php endif; ?>
               <?php else: ?>
               <div class="col-md-2 d-grid">
                  <button type="submit" class="btn btn-payment">Final Submit</button>
               </div>
               <?php endif; ?>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- InstanceEndEditable -->
<script>
   function PrintDoc() {
      var toPrint = document.getElementById('prodiv');

      var popupWin = window.open('', '_blank', 'left=100,top=100,width=1100,height=600,tollbar=0,scrollbars=1,status=0,resizable=1');

      popupWin.document.open();

      popupWin.document.write('<html><title>Summer Registration</title><head><style>body{font-family:Arial} .noprint{display: none;} .table{width:100%; border-collapse:collapse;}h1{font-size:15pt;} .table tr th, .table tr td{border:1px solid #000; padding:2px 5px; font-size: 8.7pt;} .bsvtbl tbody tr td{border:1px solid #000; padding:8px 5px; font-size: 10pt;} .photo{text-align: center;} .photo img {width: 115px;}</style></head><body onload="window.print()">')

      popupWin.document.write(toPrint.innerHTML);

      popupWin.document.close();
   }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('student.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/student/dashboard/student_review.blade.php ENDPATH**/ ?>