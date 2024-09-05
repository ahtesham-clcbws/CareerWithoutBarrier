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
            <a href="{{('studentDashboard')}}">
               <h5 style="margin-top: 20px;"> Dashboard</h5>
            </a>
            <!-- <img src="{{asset('student/images/logo big')}} size.png" alt=""> -->
         </div>
      </div>
      <div class="logo_area mb-2">
         <a href="{{('studentDashboard')}}" class="brand-link">
            @if($student->photograph)
            <img src="{{url('upload/student/')}}/{{$student->photograph}}" alt="Prifle Dp" class="brand-image img-circle elevation-3" style="opacity: .8">
            @else
            <img src="{{asset('student/images/th_5.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
            @endif
         </a>
         <div class="brand_link_name mb-2">
            <a href="{{('studentDashboard')}}" class="brand-text font-weight-light director_name">{{$user->name}}</a>
            <br>
            <?php
            $appCode = $student->latestStudentCode;

            $studentPaperDetails = StudentPaperExported::where('app_code', $appCode?->application_code)->where('student_id', $student->id)->first();


            ?>
            @if($appCode)
            <p style="color:#18c968;font-size: 15px;">Application No: {{$appCode->application_code}}</p>

            @endif
            <!-- <a href="#" class="director_post">Director</a> -->
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
            <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a> </div> -->
         </div>
         @if(!$user->is_final_submitted)
         <div class="dropdown show">
            <a class="btn btn-secondary" href="{{route('studentform')}}">
               <img src="{{asset('student/images/8.png')}}" alt="" class="nav_icon">
               <p style="color:#18c968">Apply Now</p>
            </a>
         </div>
         @endif
         @if($user->is_final_submitted)
         <div class="dropdown show">
            <a class="btn btn-secondary" href="{{route('students.formReview')}}">
               <img src="{{asset('student/images/8.png')}}" alt="" class="nav_icon">
               <p style="color:#18c968">Application Form</p>
            </a>
         </div>
         @endif
         @if(($studCode?->is_paid || $studCode?->used_coupon) && $studCode?->issued_admitcard && $showAdmitCard)
         <div class="dropdown show">
            <a class="btn btn-secondary" href="{{route('students.admitCardSearch')}}">
               <img src="{{asset('student/images/12.png')}}" alt="" class="nav_icon">
               <p style="color:#18c968">Admid Card</p>
            </a>
         </div>
         @endif
         @if(($studCode?->is_paid || $studCode?->used_coupon) && $studCode?->issued_admitcard && $showAdmitCard && $studentPaperDetails?->is_imported)
         @if($student->studentPaperDetails?->isNotEmpty())
         <div class="dropdown show">
            <a class="btn btn-secondary" href="{{route('students.resultdownload')}}">
               <img src="{{asset('student/images/12.png')}}" alt="" class="nav_icon">
               <p style="color:#18c968">Result Download</p>
            </a>
         </div>
         @endif
         @endif
         @if($studCode && $studCode?->allow_to_claim_scholarship && $studCode?->issued_admitcard && $showAdmitCard && $studentPaperDetails?->is_imported && App\Models\StudentClaimForm::where('student_id', $student->id)->first())
         <div class="dropdown show">
            <a class="btn btn-secondary" href="{{route('students.claimScholarshipForm')}}">
               <img src="{{asset('student/images/12.png')}}" alt="" class="nav_icon">
               <p style="color:#18c968">Student Claim Form</p>
            </a>
         </div>
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