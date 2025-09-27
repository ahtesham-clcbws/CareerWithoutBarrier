<!-- Sidebar -->
<?php

use App\Events\paymentDoneEvent;
use App\Models\Student;
use App\Models\StudentPaperExported;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

$showAdmitCard = null;

$student = Student::find(Auth::guard('student')->id());
$student->student_paper_details;
$isResultAvailable = false;
$studCode = $student->latestStudentCode;

// $studentPaperDetails = StudentPaperExported::with('subjectPaperDetail')->where('app_code', $appCode?->application_code)->where('student_id', $student->id)->get();

$query = Student::query()->select('students.*', 's.percentage')
    ->where('students.is_final_submitted', 1)
    ->where('students.id', Auth::guard('student')->id())
    ->leftJoin('student_codes as s', 'students.id', '=', 's.stud_id')
    ->leftJoin('student_paper_exporteds as sp', 'students.id', '=', 'sp.student_id')
    ->whereNotNull('s.percentage')->first();

if ($studCode && $query) {
    $isResultAvailable = true;
}


if ($studCode) {
    $examAt = Carbon::parse($studCode->exam_at)->startOfDay(); // Parse exam date and set time to start of day


    $examAtDate = $examAt;
    $daysBeforeExam = $examAtDate->subDays($studCode->admitcard_before)->startOfDay(); // Calculate the admit card availability date
    $showAdmitCard = Carbon::now()->startOfDay()->gte($daysBeforeExam) ? true : false; // Compare current date (start of day) with admit card availability date

    if ($studCode->is_paid || $studCode->used_coupon) {
        $updatedAt = Carbon::parse($studCode->updated_at);
        $isRecentlyUpdated = $updatedAt->greaterThanOrEqualTo(now()->subMinutes(2));

        if ($isRecentlyUpdated &&  $studCode->payment_done_notification_sent == 0) {

            event(new paymentDoneEvent($studCode));

            $studCode->payment_done_notification_sent = 1;
            $studCode->save();
        }
    }
}

// return print_r([
//     // 'examAt' => $examAt,
//     // 'admitcard_before' => $studCode->admitcard_before,
//     // 'examAtDate' => $examAtDate,
//     // 'daysBeforeExam' => $daysBeforeExam,
//     'showAdmitCard' => json_encode($showAdmitCard),
//     // 'is_paid' => $studCode->is_paid,
//     // 'used_coupon' => $studCode->used_coupon,
//     // 'payment_done_notification_sent' => $studCode->payment_done_notification_sent,
//     // 'updatedAt' => $updatedAt,
//     // 'isRecentlyUpdated' => $isRecentlyUpdated,
//     'query' => $query,
//     'isResultAvailable' => json_encode($isResultAvailable)
// ]);
// return print_r($student->toArray());
?>

<nav class=" sidebar navbar-inverse fixed-top elevation-4" id="sidebar-wrapper" role="navigation" style="overflow-y: hidden;  font-style: italic !important;">
    <div class="sidebar-header">
        <div class="sidebar-brand" style="height: auto !important;">
            <div>
                <a href="<?php echo e(('studentDashboard')); ?>">
                    <img src="/website/assets/images/brand/logo.png" style="width: 100%;"/>
                </a>
            </div>
        </div>
        <div class="logo_area mb-2">
            <a href="<?php echo e(('studentDashboard')); ?>" class="brand-link">
                <?php if($student->photograph): ?>
                <img src="<?php echo e(explode('/', $student->photograph)[0] == 'student' ? '/storage/'.$student->photograph : '/upload/student/'.$student->photograph); ?>" alt="Prifle Dp" class="brand-image img-circle elevation-3" style="opacity: .8">
                <?php else: ?>
                <img src="<?php echo e(asset('student/images/th_5.png')); ?>" class="brand-image img-circle elevation-3" style="opacity: .8" alt="">
                <?php endif; ?>
            </a>
            <div class="brand_link_name mb-2">
                <a href="<?php echo e(('studentDashboard')); ?>" class="brand-text font-weight-light director_name"><?php echo e($student->name); ?></a>
                <br>
                <?php
                $appCode = $student->latestStudentCode;

                $studentPaperDetails = StudentPaperExported::where('app_code', $appCode?->application_code)->where('student_id', $student->id)->first();


                ?>
                <?php if($appCode): ?>
                <p style="color:#18c968;font-size: 15px;">Application No: <?php echo e($appCode->application_code); ?></p>

                <?php endif; ?>
            </div>
        </div>
    </div>
    <ul class="nav sidebar-nav">
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary text-dark bg-white" href="/">
                    <span class="nav_icon" style="color: #18c968;">
                        <i class="fa fa-home" style="font-size: 18px;"></i></span>
                    <p style="color:#18c968">Homepage</p>
                </a>
            </div>
            <div class="dropdown show">
                <a class="btn btn-secondary text-dark bg-white" href="<?php echo e(route('studentDashboard')); ?>">
                    <img src="<?php echo e(asset('student/images/watch.png')); ?>" alt="" class="nav_icon">
                    <p>Dashboard</p>
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>
            <?php if(!$student->is_final_submitted): ?>
            <div class="dropdown show">
                <a class="btn btn-secondary" href="<?php echo e(route('studentform')); ?>">
                    <img src="<?php echo e(asset('student/images/8.png')); ?>" alt="" class="nav_icon">
                    <p style="color:#18c968">Apply Now</p>
                </a>
            </div>
            <?php endif; ?>
            <?php if($student->is_final_submitted): ?>
            <div class="dropdown show">
                <a class="btn btn-secondary" href="<?php echo e(route('students.formReview')); ?>">
                    <img src="<?php echo e(asset('student/images/8.png')); ?>" alt="" class="nav_icon">
                    <p style="color:#18c968">Application Form</p>
                </a>
            </div>
            <?php endif; ?>
            <?php if(($studCode?->is_paid || $studCode?->used_coupon) && $studCode?->issued_admitcard && ($isResultAvailable || $showAdmitCard)): ?>
            <div class="dropdown show">
                <a class="btn btn-secondary" href="<?php echo e(route('students.admitCardSearch')); ?>">
                    <img src="<?php echo e(asset('student/images/12.png')); ?>" alt="" class="nav_icon">
                    <p style="color:#18c968">Admit Card</p>
                </a>
            </div>
            <?php endif; ?>
            <?php if(($studCode?->is_paid || $studCode?->used_coupon) && $studCode?->issued_admitcard && $isResultAvailable): ?>
            <?php if($student->studentPaperDetails?->isNotEmpty()): ?>
            <div class="dropdown show">
                <a class="btn btn-secondary" href="<?php echo e(route('students.resultdownload')); ?>">
                    <img src="<?php echo e(asset('student/images/12.png')); ?>" alt="" class="nav_icon">
                    <p style="color:#18c968">Result Download</p>
                </a>
            </div>
            <?php endif; ?>
            <?php endif; ?>
            <?php if($studCode && $student->scholarship_claim_generation_id && $studCode?->issued_admitcard && $isResultAvailable && App\Models\StudentClaimForm::where('student_id', $student->id)->first()): ?>
            <!-- <div class="dropdown show">
                <a class="btn btn-secondary" href="<?php echo e(route('students.claimScholarshipForm')); ?>">
                    <img src="<?php echo e(asset('student/images/12.png')); ?>" alt="" class="nav_icon">
                    <p style="color:#18c968">Student Claim Form</p>
                </a>
            </div> -->
            <?php endif; ?>
            <?php if($student->name_checked && $student->father_name_checked && $student->dob_checked && $student->mobile_checked && $student->email_checked && $student->qualification_checked
            && $student->scholarship_category_checked && $student->scholarship_opted_for_checked && $student->choiceCenterA_checked
            && $student->choiceCenterB_checked && ($studCode?->is_paid || $studCode?->used_coupon)): ?>
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
<!-- /#sidebar-wrapper --><?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/student/layouts/sidebar.blade.php ENDPATH**/ ?>