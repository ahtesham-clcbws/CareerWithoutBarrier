<!-- Sidebar --> <?php

                  use App\Events\paymentDoneEvent;
                  use App\Models\Student;
                  use App\Models\StudentPaperExported;
                  use Illuminate\Support\Facades\Auth;
                  use Carbon\Carbon;

                  $showAdmitCard = null;

                  $user = Student::find(Auth::guard('student')->id());

                  $studCode = $user->latestStudentCode;

                  if ($studCode) {
                     $examAt = Carbon::parse($studCode->exam_at);
                     $sevenDaysBeforeExam = $examAt->subDays($studCode->admitcard_before);
                     $showAdmitCard = Carbon::now()->gte($sevenDaysBeforeExam);

                     if (($studCode->is_paid || $studCode->used_coupon)) {
                        $updatedAt = Carbon::parse($studCode->updated_at);
                        $isRecentlyUpdated = $updatedAt->greaterThanOrEqualTo(now()->subMinutes(2));

                        if ($isRecentlyUpdated &&  $studCode->payment_done_notification_sent==0) {
                           
                           event(new paymentDoneEvent($studCode));

                           $studCode->payment_done_notification_sent = 1;
                           $studCode->save();
                        }
                     }
                  }
                  ?>

<nav class=" sidebar navbar-inverse fixed-top elevation-4" id="sidebar-wrapper" role="navigation" style="overflow-y: hidden;  font-style: italic !important;">
   <div class="sidebar-header">
      <div class="sidebar-brand">
         <div class="info">
            <a href="<?php echo e(('studentDashboard')); ?>">
               <h5 style="margin-top: 20px;"> Dashboard</h5>
            </a>
            <!-- <img src="<?php echo e(asset('student/images/logo big')); ?> size.png" alt=""> -->
         </div>
      </div>
      <div class="logo_area mb-2">
         <a href="<?php echo e(('studentDashboard')); ?>" class="brand-link">
            <?php if($student->photograph): ?>
            <img src="<?php echo e(url('upload/student/')); ?>/<?php echo e($student->photograph); ?>" alt="Prifle Dp" class="brand-image img-circle elevation-3" style="opacity: .8">
            <?php else: ?>
            <img src="<?php echo e(asset('student/images/th_5.png')); ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
            <?php endif; ?>
         </a>
         <div class="brand_link_name mb-2">
            <a href="<?php echo e(('studentDashboard')); ?>" class="brand-text font-weight-light director_name"><?php echo e($user->name); ?></a>
            <br>
            <?php
            $appCode = $student->latestStudentCode;

            $studentPaperDetails = StudentPaperExported::where('app_code', $appCode?->application_code)->where('student_id', $student->id)->first();


            ?>
            <?php if($appCode): ?>
            <p style="color:#18c968;font-size: 15px;">Application No: <?php echo e($appCode->application_code); ?></p>

            <?php endif; ?>
            <!-- <a href="#" class="director_post">Director</a> -->
         </div>
      </div>
   </div>
   <ul class="nav sidebar-nav">
      <li>
         <div class="dropdown show">
            <a class="btn btn-secondary text-dark bg-white" href="<?php echo e(route('studentDashboard')); ?>">
               <img src="<?php echo e(asset('student/images/watch.png')); ?>" alt="" class="nav_icon">
               <p>Dashboard</p>
               <i class="fa fa-chevron-right"></i>
            </a>
            <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a> </div> -->
         </div>
         <?php if(!$user->is_final_submitted): ?>
         <div class="dropdown show">
            <a class="btn btn-secondary" href="<?php echo e(route('studentform')); ?>">
               <img src="<?php echo e(asset('student/images/8.png')); ?>" alt="" class="nav_icon">
               <p style="color:#18c968">Apply Now</p>
            </a>
         </div>
         <?php endif; ?>
         <?php if($user->is_final_submitted): ?>
         <div class="dropdown show">
            <a class="btn btn-secondary" href="<?php echo e(route('students.formReview')); ?>">
               <img src="<?php echo e(asset('student/images/8.png')); ?>" alt="" class="nav_icon">
               <p style="color:#18c968">Application Form</p>
            </a>
         </div>
         <?php endif; ?>
         <?php if(($studCode?->is_paid || $studCode?->used_coupon) && $studCode?->issued_admitcard && $showAdmitCard): ?>
         <div class="dropdown show">
            <a class="btn btn-secondary" href="<?php echo e(route('students.admitCardSearch')); ?>">
               <img src="<?php echo e(asset('student/images/12.png')); ?>" alt="" class="nav_icon">
               <p style="color:#18c968">Admid Card</p>
            </a>
         </div>
         <?php endif; ?>
         <?php if(($studCode?->is_paid || $studCode?->used_coupon) && $studCode?->issued_admitcard && $showAdmitCard && $studentPaperDetails?->is_imported): ?>
         <?php if($student->studentPaperDetails?->isNotEmpty()): ?>
         <div class="dropdown show">
            <a class="btn btn-secondary" href="<?php echo e(route('students.resultdownload')); ?>">
               <img src="<?php echo e(asset('student/images/12.png')); ?>" alt="" class="nav_icon">
               <p style="color:#18c968">Result Download</p>
            </a>
         </div>
         <?php endif; ?>
         <?php endif; ?>
         <?php if($studCode && $studCode?->allow_to_claim_scholarship && $studCode?->issued_admitcard && $showAdmitCard && $studentPaperDetails?->is_imported && App\Models\StudentClaimForm::where('student_id', $student->id)->first()): ?>
         <div class="dropdown show">
            <a class="btn btn-secondary" href="<?php echo e(route('students.claimScholarshipForm')); ?>">
               <img src="<?php echo e(asset('student/images/12.png')); ?>" alt="" class="nav_icon">
               <p style="color:#18c968">Student Claim Form</p>
            </a>
         </div>
         <?php endif; ?>
         <?php if(($studCode?->is_paid || $studCode?->used_coupon)): ?>
         <div class="dropdown show">
            <a class="btn btn-secondary" href="<?php echo e(route('student.payment')); ?>">
               <img src="<?php echo e(asset('student/images/12.png')); ?>" alt="" class="nav_icon">
               <p style="color:#18c968">Payment Details</p>
            </a>
         </div>
         <?php endif; ?>
         <?php if(($studCode?->is_paid || $studCode?->used_coupon)): ?>
         <div class="dropdown show">
            <a class="btn btn-secondary" href="<?php echo e(route('student.sayAboutUs')); ?>">
               <img src="<?php echo e(asset('student/images/12.png')); ?>" alt="" class="nav_icon">
               <p style="color:#18c968">Say About Us</p>
            </a>
            <?php endif; ?>
      </li>

   </ul>
</nav>
<!-- /#sidebar-wrapper -->    <?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/student/layouts/sidebar.blade.php ENDPATH**/ ?>