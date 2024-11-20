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
        <div class="panel panel-default m-t-15">
            <div class="panel-heading m-2 ">
                <div class="row justify-content-space-between py-2">
                    <div class="col-md-6 col">
                        <h2>Student Roll No</h2>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="card alert">
                    <div class="card-header">
                        <form action="{{route('admin.studentGenerateRollNo') }}" method="post">
                            @csrf
                            <div class="row" style="margin-bottom: 15px">
                                <div class="col-md-3 col mb-3">
                                    <label class="form-label">City<span class="text-danger">*</span></label>
                                    <select name="district_id[]" multiple class="form-control form-select" id="district-ids" required>
                                        <option value="">--Select City--</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" {{ (is_array(request()->district_id) && in_array($city->id, request()->district_id)) ? 'selected' : '' }}>
                                            {{$city->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-2 col mb-2">
                                    <label for="class">Scholarship Types</label>
                                    <select class="form-select form-select-sm" multiple id="education_name" onchange="scholarshipTypesChange(this.value)" name="scholarship_type[]">
                                        @foreach($scholarshipTypes as $scholarship)
                                        <option value="{{ $scholarship->id }}" {{ is_array(request()->name) && in_array($scholarship->id, request()->name) ? 'selected' : '' }}>
                                            {{ $scholarship->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2 col mb-2">
                                    <label for="class">Class</label>
                                    <select class="form-select form-select-sm" multiple id="board_name_id" name="class[]">
                                        <option value=""> --Select Class-- </option>
                                        @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ is_array(request()->class) && in_array($class->id, array_map('intval', request()->class)) ? 'selected' : '' }}>
                                            {{ $class->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 col mb-1">
                                    <label class="form-label">Gender</label>
                                    <select name="gender[]" class="form-control form-select" id="genders-filters" multiple>
                                        <option value="">--Select Gender--</option>
                                        <option value="Male" {{ (is_array(request()->gender) && in_array('Male', request()->gender)) ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ (is_array(request()->gender) && in_array('Female', request()->gender)) ? 'selected' : '' }}>Female</option>
                                        <option value="Transgender" {{ (is_array(request()->gender) && in_array('Transgender', request()->gender)) ? 'selected' : '' }}>Tg</option>
                                    </select>
                                    @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 col mb-3 ml-auto">
                                    <label class="form-label">&nbsp;</label> <br>
                                    <button type="submit" class="btn btn-primary ">Filter</button> &nbsp;&nbsp;
                                    <a href="/administrator/student_list" class="btn btn-danger " style="text-decoration: none;">Reset</a>
                                    &nbsp;&nbsp;
                                    <button type="submit" id="generateRollNumber" class="text-end btn btn-warning" style="text-decoration: none;text-align:end">Gen. Roll No</button>
                                </div>


                            </div>
                        </form>
                    </div>
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
                                        <td>{{ $student->choiceCenterA?->name }}</td>
                                        <td>{{ $student->latestStudentCode?->application_code ? $student->latestStudentCode?->application_code : 'N/A'}} </td>
                                        <td>{{ !empty($student->latestStudentCode?->roll_no) ? $student->latestStudentCode?->roll_no :'N/A' }}</td>
                                        <td>
                                            {{ $student->studentPayment && count($student->studentPayment) && !empty($student->studentPayment[0]) && $student->studentPayment[0]->payment_amount ? '₹ '.$student->studentPayment[0]->payment_amount : ''}}

                                            {!! $student->studentPayment && count($student->studentPayment) && !empty($student->studentPayment[0]) && $student->studentPayment[0]->payment_amount && $student->latestStudentCode?->coupan_code ? '<br />' : '' !!}

                                            {{ $student->latestStudentCode?->coupan_code ? $student->latestStudentCode?->coupan_code : '' }}
                                            {!! $student->latestStudentCode?->coupan_code ? '<br />'.($student->latestStudentCode?->corporate_name ? $student->latestStudentCode?->corporate_name : 'SQS Foundation, Kanpur') : '' !!}
                                        </td>
                                        <td>{{ $student->qualifications?->name }}</td>
                                        <td>{{ $student->scholarShipCategory?->name ?? 'N/A' }}</td>
                                        <td>{{ $student->scholarShipOptedFor?->name ?? 'N/A' }}</td>
                                        <td>{{ date('d-M-Y', strtotime($student->created_at)) }}</td>
                                        <td style="text-align:center">
                                            <a href="{{ route('admin.student', $student->id) }}" class="btn btn-primary" style="text-decoration: none;"></i> View</a>
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

</div>
<!-- /#page-content-wrapper -->

<script type="text/javascript" src="{{ asset('js/admineducationtypes.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#formStudentGenerateRollNo').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);

            // console.log('formStudentGenerateRollNo: ', Array.from(formData));
            // return;

            $.ajax({
                url: "<?= route('admin.studentGenerateRollNo') ?>",
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        success(response.message);
                        location.reload();
                    } else {
                        error(response.message)
                    }
                },
                error: function(xhr) {
                    error(xhr.responseText)
                }
            });
        });
        $("#board_name_id").parent().find('textarea').on('click', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    });

    function scholarshipTypesChange(value) {
        var scholarshipCategory = $("#education_name").val();
        console.log("Valur : ", scholarshipCategory);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post('/administrator/get_scholarship_category', {
            'ids': scholarshipCategory
        }, function(response) {
            console.log("Response:", response);
            if (response.status) {
                var data = response.data;
                if (data != null) {
                    $('#board_name_id').empty().append('<option value="">--Select Option--</option>');
                    $.each(data, function(index, st) {
                        var selected = (<?= $request->name ?? 'null' ?> == st.id) ? 'selected' : '';
                        $('#board_name_id').append('<option value="' + st.id + '" ' + selected + '>' + st.name + '</option>');
                    });
                }
            } else {
                error(response.message); // Ensure error function is defined
            }
        });
    }
</script>




@endsection('content')