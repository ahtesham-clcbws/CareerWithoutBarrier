@extends('administrator.layouts.master')
@section('title')
Student Exam Center Allotment
@endsection
@section('content')

<style>
    .select2-selection__choice {
        color: black !important;
    }

    .selectAllCl .dt-column-order {
        display: none;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default m-t-15">
            <div class="panel-heading m-2 ">
                <h5>Student Exam Center Allotment</h5>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="m-t-15">
            <div class="p-2">
                <div class="card mb-4">
                    <div class="card-body">
                        <div id="alotmentForm">
                            @csrf
                            <form class="row" method="get" style="margin-bottom: 15px">
                                <div class="col-md-3 col mb-3">
                                    <label class="form-label" for="district-ids">City</label>
                                    <select name="district_id[]" multiple class="customSelect" id="district-ids">
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

                                <div class="col-md-3 col mb-3">
                                    <label class="form-label" for="education_name">Scholarship Types</label>
                                    <select class="customSelect" multiple id="education_name" name="scholarship[]">
                                        @foreach($scholarshipTypes as $scholarship)
                                        <option value="{{ $scholarship->id }}" {{ is_array(request()->scholarship) && in_array($scholarship->id, request()->scholarship) ? 'selected' : '' }}>
                                            {{ $scholarship->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2 col mb-3">
                                    <label for="class">Class</label>
                                    <select class="customSelect" multiple id="board_name_id" name="class[]">
                                        <option value=""> --Select Class-- </option>
                                        @if(!empty(request()->class))
                                        @foreach($preloadedClasses as $class)
                                        <option value="{{ $class->id }}" {{ in_array($class->id, request()->class) ? 'selected' : '' }}>
                                            {{ $class->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-2 col mb-3">
                                    <label class="form-label" for="genders-filters">Gender</label>
                                    <select name="gender[]" class="customSelect" id="genders-filters" multiple>
                                        <option value="">--Select Gender--</option>
                                        <option value="Male" {{ (is_array(request()->gender) && in_array('Male', request()->gender)) ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ (is_array(request()->gender) && in_array('Female', request()->gender)) ? 'selected' : '' }}>Female</option>
                                        <option value="Transgender" {{ (is_array(request()->gender) && in_array('Transgender', request()->gender)) ? 'selected' : '' }}>Transgender</option>
                                    </select>
                                    @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 col mb-3">
                                    <label class="form-label" for="">&nbsp;</label><br />
                                    <div class="btn-group w-100" role="group" aria-label="Basic example">
                                        <button type="submit" class="btn btn-primary "><i class="bi bi-funnel-fill"></i> Filter</button>
                                        <a href="/administrator/exam_center_allotment" class="btn btn-danger " type="button" style="text-decoration: none;"><i class="bi bi-arrow-clockwise"></i> Reset</a>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <form class="row">
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label for="form-label">Exam Center</label>
                                    <div>
                                        <select class="customSelect w-100" id="exam_center" name="exam_center">
                                            <!-- <option value="">--Select Center--</option> -->
                                            <option data-display="Select" value="">Select center</option>

                                            @foreach($examCenters as $examCenter)
                                            <option value="{{ $examCenter->id }}" {{ $examCenter->id == request()->exam_center ? 'selected' : '' }}>
                                                {{ $examCenter->city?->name }} : {{ $examCenter->center_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label for="form-label">Number of Student</label>
                                    <div>
                                        <select class="customSelect w-100" id="student_number" name="student_number">
                                            <!-- <option value="">--Select Student Number--</option> -->
                                            <option data-display="Select" value="">Select</option>

                                            @for ($i = 50; $i <= 400; $i +=50) <option value="{{ $i }}" {{ $i == request()->student_number ? 'selected' : '' }}>
                                                0 &nbsp;- &nbsp;{{ $i }}
                                                </option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label class="form-label" for="exam_date_time">Date and Time X</label>
                                    <input class="form-control" id="flatpickrInstance" onchange="validateDateTime()" type="datetime-local" name="exam_date_time">
                                </div>
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label for="form-label">Test Duration</label>
                                    <div>
                                        <select class="customSelect w-100" id="exam_mins" name="exam_mins">
                                            <!-- <option value="">--Select Test Duration--</option> -->
                                            <option data-display="Select" value="">Select duration</option>

                                            @for ($i = 30; $i <= 240; $i +=15) <option value="{{ $i }}" {{ $i == request()->exam_mins ? 'selected' : '' }}>
                                                {{ $i }} Minutes
                                                </option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label for="form-label">AdmitCard Before</label>
                                    <div>
                                        <select class="customSelect w-100" id="admitcard_before" name="admitcard_before">
                                            <option data-display="Select" value="">Select days</option>
                                            <!-- <option data-display="Select">Select days</option> -->
                                            <!-- $i == request()->admitcard_before ? 'selected' : '' -->
                                            @for ($i = 0; $i <= 7; $i++)
                                                <option value="{{ $i }}">
                                                {{ $i }} Days
                                                </option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label for="form-label">&nbsp;</label>
                                    <button id="examCenterAllotments" type="submit" class="btn btn-success btn-block">Allot Test Center</button>
                                </div>

                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label for="form-label">&nbsp;</label>
                                    <button id="allotCenterToAll" type="button" class="btn btn-danger btn-block">Allot Center to All</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card rounded">
                    <div class="card-body tableHere">
                        <div class="table-responsive">
                            <div class="card-header text-end">
                                <button class="btn btn-success" id="updateAdmitCardStatusAll">Issue Admit Card All</button>
                                <button class="btn btn-danger" id="StopAdmitCardStatusAll">Stop AdmitCard All</button>
                            </div>
                            <table class="table table-bordered datatablecll">
                                <thead>
                                    <tr>
                                        <th class="selectAllCl text-center">Issued AdmitCard <br> <input type="checkbox" id="selectAll"> </th>
                                        <th class="text-center">Sr. No</th>
                                        <th>Name(Gender) <br> DOB</th>
                                        <th>Email/Mobile</th>
                                        <th>Application Code</th>
                                        <th>Roll No</th>
                                        <th>Scholarship Category</th>
                                        <th>Scholarship Opted For</th>
                                        <th>City</th>
                                        <th>Exam Center</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <?php
                                        $studCode = $student->studentCode->sortBy('created_at')->last();
                                        ?>
                                        <td scope="row" class="text-center">
                                            @if($studCode?->examCenter)
                                            <input type="checkbox" class="rowCheckbox" data-studcode_id="{{$studCode->id}}" value="" {{$studCode?->issued_admitcard ? 'checked' : ''}}>
                                            @endif
                                        </td>
                                        <td scope="row">{{$loop->index + 1}}</td>
                                        <td>{{ $student->name }} ({{ substr($student->gender,0,1) }}) <br>{{ $student->dob ?Carbon\Carbon::parse($student->dob)->format('d-m-Y') : ''  }}</td>
                                        <td>{{ $student->email }} <br>
                                            {{ $student->mobile }}
                                        </td>
                                        <td>{{$studCode?->application_code ? $studCode?->application_code : 'NA'}}</td>
                                        <td>{{ $studCode?->roll_no }}</td>
                                        <td>{{ $student->scholarShipCategory?->name ?? 'N/A' }}</td>
                                        <td>
                                            @if(!empty($student->qualifications) && $student->qualifications?->name)
                                            <span style="color:red;">{{ $student->qualifications?->name }} </span>
                                            <br>
                                            @endif
                                            {{ $student->scholarShipOptedFor?->name ?? 'N/A' }}
                                        </td>
                                        <td>{{ $student->district?->name }}</td>
                                        <td>{{$studCode?->examCenter?->center_name}}</td>

                                        <td>
                                            @if($studCode?->examCenter && $studCode?->issued_admitcard)
                                            <a href="#" class="btn btn-danger changeStatus" data-studcode_id="{{$studCode->id}}" data-status="0">Stop AdmitCard</a>
                                            @elseIf($studCode?->examCenter)
                                            <a href="#" class="btn btn-success changeStatus" data-studcode_id="{{$studCode->id}}" data-status="1">Issue AdmitCard</a>
                                            @endif
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

<!-- <script type="text/javascript" src="{{ asset('js/admineducationtypes.js') }}"></script> -->
<script>
    $(document).ready(function() {
        $('#allotCenterToAll').on('click', function(e) {
            if ($('#exam_center').val() === "") {
                return alert("Please select an Exam Center.");
            }
            if ($('#flatpickrInstance').val() === "") {
                return alert("Please select the Date and Time.");
            }
            if ($('#exam_mins').val() === "") {
                return alert("Please select test duration.");
            }
            if ($('#admitcard_before').val() === "") {
                return alert("Please select admin card before show.");
            }
            if (confirm('Are you sure to allot all the students to selected exams center?')) {
                console.log('exam center:- ', $('#exam_center').val())
                var url = "/administrator/exam_center_allot_to_all/" + $('#exam_center').val() + '?exam_date_time=' + $('#flatpickrInstance').val() + '&exam_mins=' + $('#exam_mins').val() + '&admitcard_before=' + $('#admitcard_before').val();

                if ($('#student_number').val() != "") {
                    url += '&exam_date_time=' + $('#student_number').val()
                }
            }
        })
        // $('#alotmentForm').on('submit', function(e) {
        //     e.preventDefault();
        //     // alert('click alotmentForm submit')
        //     var isValid = true;
        //     var errorMessage = "";
        //     // $(this).attr('disabled', true);

        //     // if ($('#exam_center').val() === "") {
        //     //     isValid = false;
        //     //     errorMessage += "Please select an Exam Center.\n";
        //     // }

        //     // if ($('#student_number').val() === "") {
        //     //     isValid = false;
        //     //     errorMessage += "Please select the Number of Students.\n";
        //     // }

        //     // if ($('#flatpickrInstance').val() === "") {
        //     //     isValid = false;
        //     //     errorMessage += "Please select the Date and Time.\n";
        //     // }

        //     if (!isValid) {
        //         // $(this).attr('disabled', false);
        //         alert(errorMessage);
        //         return;
        //     } else {
        //         var formData = new FormData($(this)[0]);

        //         $.ajax({
        //             url: "<?= route('admin.studentExamCenterAllotment') ?>",
        //             type: 'post',
        //             data: formData,
        //             contentType: false,
        //             processData: false,
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             success: function(response) {
        //                 if (response.status) {
        //                     success(response.message);
        //                     location.reload();
        //                 } else {
        //                     alert(response.message)
        //                 }
        //             },
        //             error: function(xhr) {
        //                 alert(xhr.responseText)
        //             }
        //         });
        //     }
        // })
    });
</script>
<script>
    $(document).ready(function() {
        $('#selectAll').click(function() {
            $('.rowCheckbox').prop('checked', this.checked);
        });

        $('.rowCheckbox').change(function() {
            if ($('.rowCheckbox:checked').length == $('.rowCheckbox').length) {
                $('#selectAll').prop('checked', true);
            } else {
                $('#selectAll').prop('checked', false);
            }
            updateAdmitCardStatus([$(this).data('studcode_id')], $(this).is(':checked') ? 1 : 0);
        });

        $('.changeStatus').click(function(e) {
            e.preventDefault();
            var studcodeId = $(this).data('studcode_id');
            var status = $(this).data('status');
            updateAdmitCardStatus([studcodeId], status);
        });

        $('#updateAdmitCardStatusAll').click(function(e) {
            e.preventDefault();
            var studcodeIds = [];
            $('.rowCheckbox:checked').each(function() {
                studcodeIds.push($(this).data('studcode_id'));
            });
            if (studcodeIds.length === 0) {
                error('Please select at least one student.');
                return;
            }
            updateAdmitCardStatus(studcodeIds, 1);
        });

        $('#StopAdmitCardStatusAll').click(function(e) {
            e.preventDefault();
            var studcodeIds = [];
            $('.rowCheckbox:checked').each(function() {
                studcodeIds.push($(this).data('studcode_id'));
            });
            if (studcodeIds.length === 0) {
                error('Please select at least one student.');
                return;
            }
            updateAdmitCardStatus(studcodeIds, 0);
        });

        function updateAdmitCardStatus(studcodeIds, status) {
            $.ajax({
                url: '{{ route("update.admitcard.status") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    studcode_ids: studcodeIds,
                    status: status
                },
                success: function(response) {
                    if (response.status) {
                        success(response.message);
                        location.reload();
                    }
                }
            });
        }
    });
</script>
@endsection('content')

@push('custom-scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $("#flatpickrInstance").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i:s",
        altInput: true,
        altFormat: "G:i K - l - j M, Y",
        minDate: "today"
    });
</script>


<style>
    /* #exam_center,
    #student_number,
    #admitcard_before,
    #exam_mins {
        display: none;
    } */

    /* .customSelect {
        overflow: hidden;
    } */
    .nice-select .current {
        position: relative;
        display: flex;
        overflow: hidden;
    }
</style>
<script>
    // var config = {};
    document.querySelectorAll('.customSelect').forEach((el) => {
        let settings = {};
        new TomSelect(el, settings);
    });


    $(document).on('change', '#education_name', function() {
        let scholarshipCategory = $(this).val();
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
                    let select = document.getElementById('board_name_id');
                    let control = select.tomselect;
                    control.clear();
                    control.clearOptions();
                    $.each(data, function(index, st) {
                        control.addOption({
                            id: st.id,
                            title: st.name
                        })
                    });
                    control.refreshItems();
                }
            } else {
                error(response.message); // Ensure error function is defined
            }
        });
    })

    // document.getElementById('education_name')
    // $(document).body('change', '#education_name', function(){
    //     console.log('this function hit')
    // })
    // function scholarshipTypesChange2(value) {
    //     console.log('init scholarshipTypesChange2')
    //     let scholarshipCategory = $("#education_name").val();
    //     console.log("value : ", scholarshipCategory);
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.post('/administrator/get_scholarship_category', {
    //         'ids': scholarshipCategory
    //     }, function(response) {
    //         console.log("Response:", response);
    //         if (response.status) {
    //             var data = response.data;
    //             if (data != null) {
    //                 let select = document.getElementById('#board_name_id');
    //                 let control = select.tomselect;
    //                 control.clear();
    //                 control.clearOptions();
    //                 $.each(data, function(index, st) {
    //                     control.addOption({
    //                         id: st.id,
    //                         text: st.name
    //                     })
    //                 });
    //             }
    //         } else {
    //             error(response.message); // Ensure error function is defined
    //         }
    //     });
    // }
    // new TomSelect('.customSelect', config);

    // NiceSelect.bind(document.getElementById('exam_center'), {
    //     searchable: true
    // });
    // NiceSelect.bind(document.getElementById('student_number'));
    // NiceSelect.bind(document.getElementById('admitcard_before'));
    // NiceSelect.bind(document.getElementById('exam_mins'));
</script>

@endpush