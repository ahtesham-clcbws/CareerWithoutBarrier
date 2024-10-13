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

if ($student->studentPaperDetails && is_array($student->studentPaperDetails) && count($student->studentPaperDetails) >0 && $student->studentPaperDetails[0]->is_imported) {
    // foreach ($student->studentPaperDetails[0] as $key => $paper) {
    //     if($paper->is_imported) {
    $isResultAvailable = true;
    //     }
    // }
}

$studCode = $student->latestStudentCode;

if ($studCode) {
    $examAt = Carbon::parse($studCode->exam_at)->startOfDay(); // Parse exam date and set time to start of day
    $sevenDaysBeforeExam = (clone $examAt)->subDays($studCode->admitcard_before)->startOfDay(); // Calculate the admit card availability date
    $showAdmitCard = Carbon::now()->startOfDay()->gte($sevenDaysBeforeExam); // Compare current date (start of day) with admit card availability date

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

// return print_r($student->toArray());
?>

<nav class=" sidebar navbar-inverse fixed-top elevation-4" id="sidebar-wrapper" role="navigation" style="overflow-y: hidden;  font-style: italic !important;">
    <div class="sidebar-header">
        <div class="sidebar-brand">
            <div class="info">
                <a href="{{('studentDashboard')}}">
                    <h5 style="margin-top: 20px;"> Student Panel</h5>
                </a>
            </div>
        </div>
        <div class="logo_area mb-2">
            <a href="{{('studentDashboard')}}" class="brand-link">
                @if($student->photograph)
                <img src="{{ explode('/', $student->photograph)[0] == 'student' ? '/storage/'.$student->photograph : '/upload/student/'.$student->photograph  }}" alt="Prifle Dp" class="brand-image img-circle elevation-3" style="opacity: .8">
                @else
                <img src="{{asset('student/images/th_5.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8" alt="">
                @endif
            </a>
            <div class="brand_link_name mb-2">
                <a href="{{('studentDashboard')}}" class="brand-text font-weight-light director_name">{{$student->name}}</a>
                <br>
                <?php
                $appCode = $student->latestStudentCode;

                $studentPaperDetails = StudentPaperExported::where('app_code', $appCode?->application_code)->where('student_id', $student->id)->first();


                ?>
                @if($appCode)
                <p style="color:#18c968;font-size: 15px;">Application No: {{$appCode->application_code}}</p>

                @endif
            </div>
        </div>
    </div>
    <ul class="nav sidebar-nav">
        <li>
            <div class="dropdown show">
                <a class="btn btn-secondary text-dark bg-white" href="{{route('studentDashboard')}}">
                    <img src="{{asset('student/images/watch.png')}}" alt="" class="nav_icon">
                    <p>Dashboard</p>
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>
            @if(!$student->is_final_submitted)
            <div class="dropdown show">
                <a class="btn btn-secondary" href="{{route('studentform')}}">
                    <img src="{{asset('student/images/8.png')}}" alt="" class="nav_icon">
                    <p style="color:#18c968">Apply Now</p>
                </a>
            </div>
            @endif
            @if($student->is_final_submitted)
            <div class="dropdown show">
                <a class="btn btn-secondary" href="{{route('students.formReview')}}">
                    <img src="{{asset('student/images/8.png')}}" alt="" class="nav_icon">
                    <p style="color:#18c968">Application Form</p>
                </a>
            </div>
            @endif
            @if(($studCode?->is_paid || $studCode?->used_coupon) && $studCode?->issued_admitcard && ($isResultAvailable || $showAdmitCard))
            <div class="dropdown show">
                <a class="btn btn-secondary" href="{{route('students.admitCardSearch')}}">
                    <img src="{{asset('student/images/12.png')}}" alt="" class="nav_icon">
                    <p style="color:#18c968">Admid Card</p>
                </a>
            </div>
            @endif
            @if(($studCode?->is_paid || $studCode?->used_coupon) && $studCode?->issued_admitcard && $isResultAvailable)
            @if($student->studentPaperDetails?->isNotEmpty())
            <div class="dropdown show">
                <a class="btn btn-secondary" href="{{route('students.resultdownload')}}">
                    <img src="{{asset('student/images/12.png')}}" alt="" class="nav_icon">
                    <p style="color:#18c968">Result Download</p>
                </a>
            </div>
            @endif
            @endif
            @if($studCode && $student->scholarship_claim_generation_id && $studCode?->issued_admitcard && $isResultAvailable && App\Models\StudentClaimForm::where('student_id', $student->id)->first())
            <!-- <div class="dropdown show">
                <a class="btn btn-secondary" href="{{route('students.claimScholarshipForm')}}">
                    <img src="{{asset('student/images/12.png')}}" alt="" class="nav_icon">
                    <p style="color:#18c968">Student Claim Form</p>
                </a>
            </div> -->
            @endif
            @if(($studCode?->is_paid || $studCode?->used_coupon))
            <div class="dropdown show">
                <a class="btn btn-secondary" href="{{route('student.payment')}}">
                    <img src="{{asset('student/images/12.png')}}" alt="" class="nav_icon">
                    <p style="color:#18c968">Payment Details</p>
                </a>
            </div>
            @endif
            @if(($studCode?->is_paid || $studCode?->used_coupon))
            <div class="dropdown show">
                <a class="btn btn-secondary" href="{{route('student.sayAboutUs')}}">
                    <img src="{{asset('student/images/12.png')}}" alt="" class="nav_icon">
                    <p style="color:#18c968">Say About Us</p>
                </a>
                @endif
        </li>

    </ul>
</nav>
<!-- /#sidebar-wrapper -->