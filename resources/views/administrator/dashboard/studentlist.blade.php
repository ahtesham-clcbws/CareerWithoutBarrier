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
                    <a href="{{route('admin.print.studentList')}}" target="blank" class="btn btn-primary btn-small">Print PDF</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered datatablecl">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Student Name</th>
                                    <th>Email/Mobile</th>
                                    <th>City & center</th>
                                    <th>Application Code</th>
                                    <th>Payment & Voucher</th>
                                    <th>Scholarship Category</th>
                                    <th>Scholarship Opted For</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <td><span class="badge badge-primary">Sale</span></td> --}}
                                @foreach($students as $student)
                                <tr>
                                    <?php
                                    $studCode = $student->latestStudentCode;

                                    ?>
                                    <th scope="row">{{$loop->index + 1}}</th>
                                    <td>{{ $student->name }}<br>
                                        <span>{{$student->gender}}</span><br>
                                        <span>{{ $student->dob }}</span><br>
                                    </td>
                                    <td>{{ $student->email }} <br>
                                        {{ $student->mobile }}
                                        <br>
                                        {{ $student->login_password }}
                                    </td>
                                    <td>{{$student->district?->name}}
                                        <hr>
                                        @php($center = DB::table('districts')->where('id',$student->test_center_a)->first())
                                        {{ $center?->name }}
                                    </td>
                                    <td>{{$studCode?->application_code ? $studCode?->application_code : 'NA'}}<br>
                                        @if(!empty($studCode?->roll_no))
                                        <span style="color:red;">R.No:{{ $studCode?->roll_no }} </span>
                                        @endif
                                    </td>
                                    <td>

                                        @php($studentPayment = $student->studentPayment->last())
                                        @if(!empty($studentPayment))

                                        {{$studentPayment->payment_amount}}

                                        <hr>
                                        @php($appCode = $student->latestStudentCode)
                                        Voucher No : {{$appCode?->coupan_code ?? '-'}}
                                        @endif

                                    </td>
                                    <td>{{ $student->scholarShipCategory?->name ?? 'N/A' }}</td>
                                    <td>{{ $student->qualifications?->name }}
                                        <hr> {{ $student->scholarShipOptedFor?->name ?? 'N/A' }}
                                    </td>

                                    <td style="text-align:center">
                                        <a href="{{ route('admin.student', $student->id) }}" class="btn btn-primary" style="text-decoration: none;"></i> View</a>
                                        <!-- <ul style="list-style: none;">
                    <li class="card-option drop-menu">
                        <span class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link">::</span>
                        <ul class="card-option-dropdown dropdown-menu">
                        <li><a href="{{ $student->id }}"><i class="ti-loop"></i> Edit</a></li>
                        <li><a href="#"><i class="ti-menu-alt"></i>Restrict</a></li>
                        <li><a href="#"><i class="ti-menu-alt"></i>Delete</a></li>
                        </ul> -->
                                        </li>
                                        </ul>
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