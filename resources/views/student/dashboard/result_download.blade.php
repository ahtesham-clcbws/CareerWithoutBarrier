@extends('student.layouts.master')
@section('content')
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
        <link rel="stylesheet" href="{{ asset('student/admin_card.css') }}">
        <center>

            <table style="border-collapse:collapse;margin-left:6.3494pt" cellspacing="0">
                <tr>
                    <td colspan="5" style="text-align: center;">
                        <div class="logo"> <a href="#"><img width="180" src="{{ asset('website/assets/images/brand/logo.png') }}" alt="logo"></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <div class="logo" style="margin-bottom: 40px;"> <a href="#"><img width="120" src="{{ asset('website/assets/images/bottom-menu/sqs-logo.png') }}" alt="img">
                            </a>
                        </div>
                    </td>
                    <td colspan="3">
                        <div style="margin-top: 15px;margin-bottom: 15px;text-align:center">
                            <h3 style="color:#1015cd;font-weight: 900;font-size: large;">CAREER PREP SCHOLARSHIP EXAM</h3>
                            <h5 style="color:#00a64b">Scholarship Test Result- 2024 (Phase-I)</h5>
                        </div>
                    </td>
                    <td>
                        <div class="logo" style="    margin-bottom: 40px;"> <a href="#"><img width="120" src="{{ asset('student/test_notes_logo.png') }}" alt="logo"></a>
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
                        <p class="s11" style="padding: 11pt;text-indent: 0pt;text-align: left;">{{$appCode->roll_no}}</p>
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
                        <p class="s10" style="padding: 10pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">{{ucfirst($student->name)}}</p>
                    </td>
                    <td style="width:75pt;" class="tb1">
                        <p class="s10" style="padding: 9pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                            Application No</p>
                    </td>
                    <td style="width:133pt;" class="tb1">
                        <p class="s10" style="padding: 9pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                            {{$appCode?->application_code ?? 'NA'}}
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
                        <p class="s10" style="padding: 9pt;padding-left: 10pt;text-indent: 0pt;text-align: left;">{{Carbon::parse($student->dob)->format('d/m/Y')}} </p>
                    </td>
                    <td style="width:75pt;" class="tb1">
                        <p class="s10" style="padding: 9pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                            Exam Category</p>
                    </td>
                    <td style="width:133pt;" class="tb1">
                        <p class="s10" style="padding: 9pt;padding-left: 10pt;text-indent: 0pt;text-align: left;">
                            {{ $student->scholarShipCategory?->name ?? 'N/A' }}
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
                            {{$student->gender}}
                        </p>
                    </td>
                    <td style="width:75pt;" class="tb1">
                        <p class="s10" style="padding: 9pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">
                            Preparation For</p>
                    </td>
                    <td style="width:133pt" class="tb1">
                        <p class="s10" style="padding: 9pt;padding-left: 13pt;text-indent: 0pt;text-align: left;">
                            {{ $student->scholarShipOptedFor?->name ?? 'N/A' }}
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
                            {{$student->disability ?? 'NA'}}
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

                @foreach($studentPaperDetails as $key => $studentPaperDetail)
                <tr style="height:26pt">
                    <td style="width:40pt;" class="tb1">
                        <p class="s13" style="padding-top: 7pt;padding-left: 20pt;text-indent: 0pt;text-align: left;">{{$key+1}}
                        </p>
                    </td>
                    <td style="width:148pt;" class="tb1">
                        <p class="s13" style="padding-top: 8pt;padding-left: 21pt;text-indent: 0pt;text-align: left;">
                            {{$studentPaperDetail?->subject_name}}
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
                            {{$studentPaperDetail?->obtained_marks}}
                        </p>
                    </td>
                </tr>
                @endforeach
                <tr style="height:26pt">
                    <td style="width:188pt;" class="tb1" colspan="2">
                        <p class="s14" style="padding-top: 5pt;padding-left: 22pt;text-indent: 0pt;text-align: left;">
                            Wrong
                            Answer-{{$studentPaperDetail?->wrong_answers}}</p>
                    </td>
                    <td style="width:184pt" class="tb1">
                        <p class="s14" style="padding-top: 4pt;padding-left: 36pt;text-indent: 0pt;text-align: left;">
                            Right
                            Answer-{{$studentPaperDetail?->right_answers}}</p>
                    </td>
                    <td style="width:163pt" class="tb1">
                        <p class="s14" style="padding-top: 4pt;padding-left: 14pt;text-indent: 0pt;text-align: left;">
                            Obtained Marks-{{$totalObtained}}</p>
                    </td>
                </tr>
                <tr style="height:26pt">
                    <td style="width:188pt" class="tb1" colspan="2">
                        <p class="s14" style="padding-top: 3pt;padding-left: 22pt;text-indent: 0pt;text-align: left;">
                            Total
                            Questions-{{$totalQuestions}}</p>
                    </td>
                    <td style="width:184pt" class="tb1">
                        <p class="s14" style="padding-top: 3pt;padding-left: 21pt;text-indent: 0pt;text-align: left;">
                            Not
                            Attempted Qs -{{$notAttemptedQuestions}}</p>
                    </td>
                    <td style="width:163pt;" class="tb1">
                        <p class="s14" style="padding-top: 3pt;padding-left: 14pt;text-indent: 0pt;text-align: left;">
                            Attempted Qs -{{$studentPaperDetail?->attempted_questions}}</p>
                    </td>
                </tr>
                <tr style="height:26pt">
                    <td style="width:535pt" class="tb1" colspan="4">
                        <p class="s15" style="padding-top: 6pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                            Total Marks - @if($totalMax > 0 ){{$totalObtained}}/{{$totalMax}} @endif</p>
                    </td>
                </tr>
                <tr style="height:26pt">
                    <td style="width:535pt" class="tb1" colspan="4">
                        <p class="s15" style="padding-top: 5pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                            Marks in Percentage- @if($totalMax > 0 ) {{round(($totalObtained/$totalMax)*100,2)}}% @endif</p>
                    </td>
                </tr>
                <tr style="height:26pt">
                    <td style="width:268pt" class="tb1" colspan="3">
                        <p class="s15" style="padding-top: 7pt;padding-left: 88pt;text-indent: 0pt;text-align: left;">
                            All
                            India Rank - {{$appCode->rank}}</p>
                    </td>
                    <td style="width:267pt" class="tb1">
                        <p class="s15" style="padding-top: 7pt;padding-left: 83pt;text-indent: 0pt;text-align: left;">
                            State Rank - {{$appCode->state_rank}}</p>
                    </td>
                </tr>
                <tr style="height:26pt">
                    <td style="width:268pt;" class="tb1" colspan="3">
                        <p class="s15" style="padding-top: 4pt;padding-left: 90pt;text-indent: 0pt;text-align: left;">
                            Gender Rank - {{$appCode->gender_rank}}</p>
                    </td>
                    <td style="width:267pt;" class="tb1">
                        <p class="s15" style="padding-top: 5pt;padding-left: 71pt;text-indent: 0pt;text-align: left;">
                            District - {{$appCode->district_rank}}</p>
                    </td>
                </tr>
            </table>
            <p class="s16" style="padding-top: 5pt;padding-left: 35pt;text-indent: 0pt;text-align: center;">
                Congratulations!</p>
            <div class="">
                <p class="s17" style="padding-top: 4pt;text-indent: 0pt;text-align: center;background-color: #a5afb7;padding: 6pt;margin-top: 7pt;">
                    You are Eligible for Scholarship
                </p>
            </div>

        </center>
    </div>
    <div align="center" class="col-md-12 mt-2">
        <button type="button" style="width: 6rem;height: 2.65rem;" class="btn btn-md btn-info" data-print="modal" onclick="PrintDoc()">Print <i class="fa fa-print" style="margin-left: 7px;"></i></button>
    </div>

    @if($appCode->allow_to_claim_scholarship)
    @endif

    <div align="center" class="col-md-12 mt-2">
        <a type="button" data-toggle="modal" data-target="#myModal" style="text-decoration:underline;color:blue">
            Claim Your Scholarship
        </a>
    </div>

</div>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <form class="form" method="POST" action="{{route('students.claimScholarshipForm')}}">
                <div class="modal-header">
                    <h4 class="modal-title">Terms and Conditions</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form class="form" method="POST" action="{{route('students.claimScholarshipForm')}}">
                    @csrf
                    <!-- Modal Body -->
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12 col">
                                <div class="form-check mb-3 mt-2">
                                    <input type="hidden" name="terms_conditions_scholarship" value="0">
                                    <input type="checkbox" name="terms_conditions_scholarship" class="form-check-input" id="terms_conditions_scholarship" value="1" {{ $student->terms_conditions_scholarship ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="terms_conditions_scholarship"><span class="text-danger">*</span> I agree
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 col">
                                <p style="font-size: 11pt;">
                                    rem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit and Proceed</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>

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
@endsection('content')