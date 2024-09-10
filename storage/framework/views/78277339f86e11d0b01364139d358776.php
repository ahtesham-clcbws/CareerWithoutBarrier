

<?php $__env->startSection('content'); ?>
<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

$totalMax = 0;
$totalObtained = 0;
$totalQuestions = 0;
$attempted_questions = 0;
$studentPaperDetail = null;
$notAttemptedQuestions = 0;
?>
<div class="container pagecontentbody pt-5 pb-3">
   <div class="main" id="prodiv">
      <link rel="stylesheet" href="<?php echo e(asset('student/admin_card.css')); ?>">
      <center>

         <table style="border-collapse:collapse;margin-left:6.3494pt" cellspacing="0">
            <tr>
               <td colspan="5" style="text-align: center;">
                  <div class="logo"> <a href="#"><img width="180" src="<?php echo e(asset('website/assets/images/brand/logo.png')); ?>" alt="logo"></a>
                  </div>
               </td>
            </tr>
            <tr>
               <td style="text-align: center;">
                  <div class="logo" style="margin-bottom: 40px;"> <a href="#"><img width="120" src="<?php echo e(asset('website/assets/images/bottom-menu/sqs-logo.png')); ?>" alt="img">
                     </a>
                  </div>
               </td>
               <td colspan="3">
                  <div style="margin-top: 15px;margin-bottom: 15px;text-align:center">
                     <h3 style="color:#1015cd;font-weight: 900;font-size: large;"><?php echo e($student->scholarShipCategory?->name); ?></h3>
                     <h5 style="color:#00a64b">Scholarship Test Result- 2024 (Phase-I)</h5>
                  </div>
               </td>
               <td>
                  <div class="logo" style="    margin-bottom: 40px;"> <a href="#"><img width="120" src="<?php echo e(asset('student/test_notes_logo.png')); ?>" alt="logo"></a>
                  </div>
               </td>
            </tr>
            <tr style="height:17pt">
               <td style="width:530pt;border-top-style:solid;border-top-width:1pt;border-top-color:#231F20;border-left-style:solid;border-left-width:1pt;border-left-color:#231F20;border-bottom-style:solid;border-bottom-width:1pt;border-bottom-color:#231F20;border-right-style:solid;border-right-width:1pt;border-right-color:#231F20" colspan="4" bgcolor="#FFF200">
                  <p class="s9" style="padding-top: 3pt;padding-left: 181pt;text-indent: 0pt;text-align: left;">
                     Candidate &amp; Exam Detail</p>
               </td>
               <td style="width:105pt" class="tb1" bgcolor="#FFF200">
                  <p class="s9" style="padding-top: 3pt;padding-left: 17pt;text-indent: 0pt;text-align: left;">
                     Candidate Photo</p>
               </td>
            </tr>
            <tr style="height:27pt">
               <td style="width:93pt;" class="tb1">
                  <p class="s10" style="padding: 12pt;text-indent: 0pt;text-align: left;">Candidate’s Name</p>
               </td>
               <td style="width:129pt" class="tb1">
                  <p class="s10" style="padding: 10pt;text-indent: 0pt;text-align: left;">Viramaditya Signh
                     Rajvanshi</p>
               </td>
               <td style="width:75pt;" class="tb1">
                  <p class="s10" style="padding: 12pt;text-indent: 0pt;text-align: left;">Roll No</p>
               </td>
               <td style="width:133pt;" class="tb1">
                  <p class="s11" style="padding: 11pt;text-indent: 0pt;text-align: left;"><?php echo e($appCode->roll_no); ?></p>
               </td>
               <td style="width:105pt;" class="tb1" rowspan="5">
                  <p style="text-indent: 0pt;"><span>
                        <center><img width="125" height="139" src="https://uxwing.com/wp-content/themes/uxwing/download/peoples-avatars/man-user-color-icon.png" />
                        </center>
                     </span></p>
               </td>
            </tr>
            <tr style="height:25pt">
               <td style="width:93pt;" class="tb1">
                  <p class="s10" style="padding: 10pt;text-indent: 0pt;text-align: left;">
                     Father’s Name</p>
               </td>
               <td style="width:129pt;" class="tb1">
                  <p class="s10" style="padding: 10pt;padding-left: 11pt;text-indent: 0pt;text-align: left;"><?php echo e(ucfirst($student->name)); ?></p>
               </td>
               <td style="width:75pt;" class="tb1">
                  <p class="s10" style="padding: 9pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                     Application No</p>
               </td>
               <td style="width:133pt;" class="tb1">
                  <p class="s10" style="padding: 9pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                     <?php echo e($appCode?->application_code ?? 'NA'); ?>

                  </p>
               </td>
            </tr>
            <tr style="height:24pt">
               <td style="width:93pt;" class="tb1">
                  <p class="s10" style="padding: 9pt;padding-left: 12pt;text-indent: 0pt;text-align: left;">
                     Date of
                     Birth</p>
               </td>
               <td style="width:129pt;" class="tb1">
                  <p class="s10" style="padding: 9pt;padding-left: 10pt;text-indent: 0pt;text-align: left;"><?php echo e(Carbon::parse($student->dob)->format('d/m/Y')); ?> </p>
               </td>
               <td style="width:75pt;" class="tb1">
                  <p class="s10" style="padding: 9pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                     Exam Category</p>
               </td>
               <td style="width:133pt;" class="tb1">
                  <p class="s10" style="padding: 9pt;padding-left: 10pt;text-indent: 0pt;text-align: left;">
                     <?php echo e($student->scholarShipCategory?->name ?? 'N/A'); ?>

                  </p>
               </td>
            </tr>
            <tr style="height:25pt">
               <td style="width:93pt;" class="tb1">
                  <p class="s10" style="padding: 9pt;padding-left: 12pt;text-indent: 0pt;text-align: left;">
                     Gender</p>
               </td>
               <td style="width:129pt;" class="tb1">
                  <p class="s10" style="padding: 9pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                     <?php echo e($student->gender); ?>

                  </p>
               </td>
               <td style="width:75pt;" class="tb1">
                  <p class="s10" style="padding: 9pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                     Preparation For</p>
               </td>
               <td style="width:133pt" class="tb1">
                  <p class="s10" style="padding: 9pt;padding-left: 13pt;text-indent: 0pt;text-align: left;">
                     <?php echo e($student->scholarShipOptedFor?->name ?? 'N/A'); ?>

                  </p>
               </td>
            </tr>
            <tr style="height:25pt">
               <td style="width:93pt;" class="tb1">
                  <p class="s10" style="padding: 8pt;padding-left: 12pt;text-indent: 0pt;text-align: left;">
                     Person with Disability</p>
               </td>
               <td style="width:129pt;" class="tb1" colspan="3">
                  <p class="s10" style="padding: 8pt;padding-left: 12pt;text-indent: 0pt;text-align: left;">
                     <?php echo e($student->disability ?? 'NA'); ?>

                  </p>
               </td>
               <!-- <td style="width:75pt;" class="tb1">
                  <p class="s10" style="padding: 8pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                     Test Paper Code</p>
               </td>
               <td style="width:133pt;" class="tb1">
                  <p class="s10" style="padding: 8pt;padding-left: 12pt;text-indent: 0pt;text-align: left;">
                     CPSE-S204/2024</p>
               </td> -->
            </tr>
         </table>
         <p style="padding-top: 3pt;text-indent: 0pt;text-align: left;"><br /></p>
         <h2 style="padding-bottom: 2pt;padding-left: 35pt;text-indent: 0pt;text-align: center;">Scholarship Test Result
         </h2>
         <table style="border-collapse:collapse;margin-left:6.3494pt" cellspacing="0">
            <tr style="height:26pt">
               <td style="width:188pt;" class="tb1" colspan="2" bgcolor="#FFF200">
                  <p class="s12" style="padding-top: 6pt;padding-left: 20pt;text-indent: 0pt;text-align: left;">#
                     Subject</p>
               </td>
               <td style="width:184pt;" class="tb1" bgcolor="#FFF200">
                  <p class="s12" style="padding-top: 6pt;padding-left: 36pt;text-indent: 0pt;text-align: left;">
                     Marks
                     ( Maximum )</p>
               </td>
               <td style="width:163pt;" class="tb1" bgcolor="#FFF200">
                  <p class="s12" style="padding-top: 6pt;padding-left: 27pt;text-indent: 0pt;text-align: left;">
                     Marks
                     (Obtained)</p>
               </td>
            </tr>

            <?php $__currentLoopData = $studentPaperDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $studentPaperDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="height:26pt">
               <td style="width:40pt;" class="tb1">
                  <p class="s13" style="padding-top: 7pt;padding-left: 20pt;text-indent: 0pt;text-align: left;"><?php echo e($key+1); ?>

                  </p>
               </td>
               <td style="width:148pt;" class="tb1">
                  <p class="s13" style="padding-top: 8pt;padding-left: 21pt;text-indent: 0pt;text-align: left;">
                     <?php echo e($studentPaperDetail?->subject_name); ?>

                  </p>
               </td>
               <td style="width:184pt;" class="tb1">
                  <p class="s13" style="padding-top: 7pt;padding-left: 39pt;text-indent: 0pt;text-align: left;">
                     <?php
                     $subjectPaper = DB::table('subject_paper_details')
                        ->where('subject_mapping_id', $studentPaperDetail?->subject_mapping_id)
                        ->where('subject_id', $studentPaperDetail?->subject_id)->first();
                     $totalObtained += $studentPaperDetail?->obtained_marks;
                     $totalMax +=  $subjectPaper->max_marks;
                     $totalQuestions +=  $subjectPaper->total_questions;

                     $notAttemptedQuestions = $totalQuestions - ($studentPaperDetail?->attempted_questions);
                     echo   $subjectPaper->max_marks;
                     ?>

                  </p>
               </td>
               <td style="width:163pt;" class="tb1">
                  <p class="s13" style="padding-top: 7pt;padding-left: 32pt;text-indent: 0pt;text-align: left;">
                     <?php echo e($studentPaperDetail?->obtained_marks); ?>

                  </p>
               </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr style="height:26pt">
               <td style="width:188pt;" class="tb1" colspan="2">
                  <p class="s14" style="padding-top: 5pt;padding-left: 22pt;text-indent: 0pt;text-align: left;">
                     Wrong
                     Answer-<?php echo e($studentPaperDetail?->wrong_answers); ?></p>
               </td>
               <td style="width:184pt" class="tb1">
                  <p class="s14" style="padding-top: 4pt;padding-left: 36pt;text-indent: 0pt;text-align: left;">
                     Right
                     Answer-<?php echo e($studentPaperDetail?->right_answers); ?></p>
               </td>
               <td style="width:163pt" class="tb1">
                  <p class="s14" style="padding-top: 4pt;padding-left: 14pt;text-indent: 0pt;text-align: left;">
                     Obtained Marks-<?php echo e($totalObtained); ?></p>
               </td>
            </tr>
            <tr style="height:26pt">
               <td style="width:188pt" class="tb1" colspan="2">
                  <p class="s14" style="padding-top: 3pt;padding-left: 22pt;text-indent: 0pt;text-align: left;">
                     Total
                     Questions-<?php echo e($totalQuestions); ?></p>
               </td>
               <td style="width:184pt" class="tb1">
                  <p class="s14" style="padding-top: 3pt;padding-left: 21pt;text-indent: 0pt;text-align: left;">
                     Not
                     Attempted Qs -<?php echo e($notAttemptedQuestions); ?></p>
               </td>
               <td style="width:163pt;" class="tb1">
                  <p class="s14" style="padding-top: 3pt;padding-left: 14pt;text-indent: 0pt;text-align: left;">
                     Attempted Qs -<?php echo e($studentPaperDetail?->attempted_questions); ?></p>
               </td>
            </tr>
            <tr style="height:26pt">
               <td style="width:535pt" class="tb1" colspan="4">
                  <p class="s15" style="padding-top: 6pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                     Total Marks - <?php if($totalMax > 0 ): ?><?php echo e($totalObtained); ?>/<?php echo e($totalMax); ?> <?php endif; ?></p>
               </td>
            </tr>
            <tr style="height:26pt">
               <td style="width:535pt" class="tb1" colspan="4">
                  <p class="s15" style="padding-top: 5pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                     Marks in Percentage- <?php if($totalMax > 0 ): ?> <?php echo e(round(($totalObtained/$totalMax)*100,2)); ?>% <?php endif; ?></p>
               </td>
            </tr>
            <tr style="height:26pt">
               <td style="width:268pt" class="tb1" colspan="3">
                  <p class="s15" style="padding-top: 7pt;padding-left: 88pt;text-indent: 0pt;text-align: left;">
                     All
                     India Rank-1023</p>
               </td>
               <td style="width:267pt" class="tb1">
                  <p class="s15" style="padding-top: 7pt;padding-left: 83pt;text-indent: 0pt;text-align: left;">
                     State Rank-92</p>
               </td>
            </tr>
            <tr style="height:26pt">
               <td style="width:268pt;" class="tb1" colspan="3">
                  <p class="s15" style="padding-top: 4pt;padding-left: 90pt;text-indent: 0pt;text-align: left;">
                     Gender Rank - 719</p>
               </td>
               <td style="width:267pt;" class="tb1">
                  <p class="s15" style="padding-top: 5pt;padding-left: 71pt;text-indent: 0pt;text-align: left;">
                     District Rank-1023</p>
               </td>
            </tr>
         </table>
         <p class="s16" style="padding-top: 5pt;padding-left: 35pt;text-indent: 0pt;text-align: center;">
            Congratulations!</p>
         <div style="">
            <p class="s17" style="padding-top: 4pt;text-indent: 0pt;text-align: center;background-color: #a5afb7;padding: 6pt;margin-top: 7pt;">You are Eligible for Scholarship</p>
         </div>

      </center>
   </div>
   <div align="center" class="col-md-12 mt-2">
      <button type="button" style="width: 6rem;height: 2.65rem;" class="btn btn-md btn-info" data-print="modal" onclick="PrintDoc()">Print <i class="fa fa-print" style="margin-left: 7px;"></i></button>
   </div>

</div>
</div>


<script>
   function PrintDoc() {
      var toPrint = document.getElementById('prodiv');

      var popupWin = window.open('', '_blank', 'left=100,top=100,width=1100,height=600,tollbar=0,scrollbars=1,status=0,resizable=1');

      popupWin.document.open();

      popupWin.document.write('<html><title >Result</title><head><style>body{font-family:Arial;} .noprint{display: none;} .table{width:100%; border-collapse:collapse;}h1{font-size:15pt;} .table tr th, .table tr td{border:1px solid #000; padding:2px 5px; font-size: 8.7pt;} .bsvtbl tbody tr td{border:1px solid #000; padding:8px 5px; font-size: 10pt;} .photo{text-align: center;} .photo img {width: 115px;}</style></head><body onload="window.print()">')

      popupWin.document.write(toPrint.innerHTML);

      popupWin.document.close();
   }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/administrator/dashboard/student/result_download.blade.php ENDPATH**/ ?>