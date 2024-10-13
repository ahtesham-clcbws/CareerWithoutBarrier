@extends('administrator.layouts.master')

@section('title')
Student List
@endsection
@section('content')

<style>
    .select2-selection__choice {
        color: black !important;
    }
</style>
<div class="row px-3">
    <div class="col-lg-12">
        <div class="m-2 m-t-15">
            <div class="row justify-content-space-between py-2">
                <div class="col-md-6 col">
                    <h2>Student List</h2>
                </div>
                <div class="col-md-6 col text-end">
                    <a href="{{route('admin.print.studentList')}}" target="blank"
                        class="btn btn-primary btn-small">Print PDF</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered datatablecl">
                            <thead>
                                <tr>
                                    <th scope="col">##</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Email/Mobile</th>
                                    <th scope="col">District</th>
                                    <th scope="col">Center</th>
                                    <th scope="col">App Code</th>
                                    <th scope="col">Roll No</th>
                                    <th scope="col">Payment & Voucher</th>
                                    <th scope="col">Qualification</th>
                                    <th scope="col">Scholarship Category</th>
                                    <th scope="col">Scholarship Opted For</th>
                                    <th scope="col">Dated</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <th scope="text-left">{{$loop->index+1}}</th>
                                    <td class="text-nowrap">
                                        {{ $student->name }}<br />
                                        <span>{{$student->gender}}</span><br />
                                        <span>{{ $student->dob }}</span>
                                    </td>
                                    <td>{{ $student->email }}<br />
                                        {{ $student->mobile }}<br />
                                        {{ $student->login_password }}
                                    </td>
                                    <td>{{$student->district?->name}}</td>
                                    <td>{{ $student->choice_center_a?->name }}</td>
                                    <td>{{ $student->latest_student_code?->application_code ? $student->latest_student_code?->application_code : 'N/A'}} </td>
                                    <td>{{ !empty($student->latest_student_code?->roll_no) ? $student->latest_student_code?->roll_no :'N/A' }}</td>
                                    <td>
                                        {{ $student->student_payment && count($student->student_payment) && !empty($student->student_payment[0]) && $student->student_payment[0]->payment_amount ? '₹ '.$student->student_payment[0]->payment_amount : ''}}

                                        {!! $student->student_payment && count($student->student_payment) && !empty($student->student_payment[0]) && $student->student_payment[0]->payment_amount && $student->latest_student_code?->coupan_code ? '<br />' : '' !!}

                                        {{ $student->latest_student_code?->coupan_code ? $student->latest_student_code?->coupan_code : '' }}
                                        {!! $student->latest_student_code?->coupan_code ? '<br />'.($student->latest_student_code?->corporate_name ? $student->latest_student_code?->corporate_name : 'SQS Foundation, Kanpur') : '' !!}
                                    </td>
                                    <td>{{ $student->qualifications?->name }}</td>
                                    <td>{{ $student->scholar_ship_category?->name ?? 'N/A' }}</td>
                                    <td>{{ $student->scholar_ship_opted_for?->name ?? 'N/A' }}</td>
                                    <td>{{ date('d-M-Y', strtotime($student->created_at)) }}</td>

                                    <td style="text-align:center">
                                        <a href="{{ route('admin.student', $student->id) }}" class="btn btn-primary"
                                            style="text-decoration: none;"></i> View</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection('content')