@extends('administrator.layouts.master')
@section('title')
Student Exam Center Allotment
@endsection
@section('content')

<style>
  .select2-selection__choice {
    color: black !important;
  }

  .selectAllCl .dt-column-order{
    display: none;
  }

</style>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default m-t-15">
      <div class="panel-heading m-2 ">
        <h5>Student Exam Center Allotment</h5>
      </div>
      <div class="panel-body px-2">
        <div class="card alert">
          <div class="card-header">
            <form action="#" method="post" id="alotmentForm">
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

                <div class="col-md-3 col mb-3">
                  <label for="class">Scholarship Types</label>
                  <select class="form-select form-select-sm" multiple id="education_name" onchange="scholarshipTypesChange(this.value)" name="name[]" required>
                    @foreach($scholarshipTypes as $scholarship)
                    <option value="{{ $scholarship->id }}" {{ is_array(request()->name) && in_array($scholarship->id, request()->name) ? 'selected' : '' }}>
                      {{ $scholarship->name }}
                    </option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-2 col mb-3">
                  <label for="class">Class</label>
                  <select class="form-select form-select-sm" multiple id="board_name_id" name="class[]" required>
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
                  <label class="form-label">Gender<span class="text-danger">*</span></label>
                  <select name="gender[]" class="form-control form-select" id="genders-filters" multiple required>
                    <option value="">--Select Gender--</option>
                    <option value="Male" {{ (is_array(request()->gender) && in_array('Male', request()->gender)) ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ (is_array(request()->gender) && in_array('Female', request()->gender)) ? 'selected' : '' }}>Female</option>
                    <option value="Transgender" {{ (is_array(request()->gender) && in_array('Transgender', request()->gender)) ? 'selected' : '' }}>Transgender</option>
                  </select>
                  @error('gender')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-2 col mb-3 ml-auto">
                  <label class="form-label">&nbsp;</label> <br>
                  <button type="submit" class="btn btn-primary ">Filter</button> &nbsp;&nbsp;
                  <a href="/administrator/exam_center_allotment" class="btn btn-danger " style="text-decoration: none;">Reset</a>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-2 col">
                  <label for="class">Exam Center</label>
                  <select class="form-select form-select-sm" id="exam_center" name="exam_center">
                    <option value="">--Select Center--</option>
                    @foreach($examCenters as $examCenter)
                    <option value="{{ $examCenter->id }}" {{ $examCenter->id == request()->exam_center ? 'selected' : '' }}>
                      {{ $examCenter->city?->name }} : {{ $examCenter->center_name }}
                    </option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-2 col">
                  <label for="class">Number of Student</label>
                  <select class="form-select form-select-sm text-center" id="student_number" name="student_number">
                    <option value="">--Select Student Number--</option>
                    @for ($i = 50; $i <= 400; $i +=50) <option value="{{ $i }}" {{ $i == request()->student_number ? 'selected' : '' }}>
                      0 &nbsp;- &nbsp;{{ $i }}
                      </option>
                      @endfor
                  </select>
                </div>

                <div class="col-md-2 col" style="margin-bottom: 16px !important;">
                  <label class="form-label" for="exam_date_time">Date and Time</label>
                  <input class="form-select form-select-sm" id="datetimepicker" onchange="validateDateTime()" type="datetime-local" name="exam_date_time">
                </div>
                <div class="col-md-2 col-6">
                  <label for="class">Test Duration</label>
                  <select class="form-select form-select-sm text-center" id="exam_mins" name="exam_mins">
                    <option value="">--Select Test Duration--</option>
                    @for ($i = 30; $i <= 240; $i +=15) <option value="{{ $i }}" {{ $i == request()->exam_mins ? 'selected' : '' }}>
                     {{ $i }} Minutes
                      </option>
                      @endfor
                  </select>
                </div>
                <div class="col-md-2 col-6">
                  <label for="class">AdmitCard Before</label>
                  <select class="form-select form-select-sm text-center" id="admitcard_before" name="admitcard_before">
                    <option value="">--Select--</option>
                    @for ($i = 0; $i <= 7; $i++) <option value="{{ $i }}" {{ $i == request()->admitcard_before ? 'selected' : '' }}>
                     {{ $i }} Days
                      </option>
                      @endfor
                  </select>
                </div>
                <div class="col-md-2 col " style="text-align: end;right: 20px;">
                  <label for="">&nbsp;</label><br>
                  <a href="{{ route('admin.studentExamCenterAllotment') }}" id="examCenterAllotments" class="text-end btn btn-success" style="text-decoration: none;text-align:end">Allot Test Center</a>
                </div>
              </div>
            </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <div class="card-header text-end">  
                 <a href="#" class="btn btn-success updateAdmitCardStatusAll">Issue AdmitCard All</a> 
              <a href="#" class="btn btn-danger StopAdmitCardStatusAll">Stop AdmitCard All</a>
            </div>
              <table class="table table-bordered datatablecll">
                <thead>
                  <tr>
                    <th class="selectAllCl text-center">Issued AdmitCard <br> <input type="checkbox" id="selectAll"> </th>
                    <th class="text-center">Sr. No</th>
                    <th>Name(Gender) <br> DOB</th>
                    <th>Email/Mobile</th>
                    <th>Application Code</th>
                    <th>Qualification</th>
                    <th>Scholarship Category</th>
                    <th>Scholarship Opted For</th>
                    <th>City</th>
                    <th>Roll No.</th>
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
                    <td>{{ $student->qualifications?->name }}</td>
                    <td>{{ $student->scholarShipCategory?->name ?? 'N/A' }}</td>
                    <td>{{ $student->scholarShipOptedFor?->name ?? 'N/A' }}</td>
                    <td>{{ $student->district?->name }}</td>
                    <td class="color-primary">{{ $student->student_roll_number }}</td>
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
</div>
<!-- /#page-content-wrapper -->

<script type="text/javascript" src="{{ asset('js/admineducationtypes.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#examCenterAllotments').click(function(e) {
      e.preventDefault();
      var isValid = true;
      var errorMessage = "";
      $(this).attr('disabled',true);

      if ($('#exam_center').val() === "") {
        isValid = false;
        errorMessage += "Please select an Exam Center.\n";
      }

      if ($('#student_number').val() === "") {
        isValid = false;
        errorMessage += "Please select the Number of Students.\n";
      }

      if ($('#datetimepicker').val() === "") {
        isValid = false;
        errorMessage += "Please select the Date and Time.\n";
      }

      if (!isValid) {
        $(this).attr('disabled',false);
        error(errorMessage);
        return;
      } else {
        var form = $('#alotmentForm');

        $.ajax({
          url: $(this).attr('href'),
          type: 'post',
          data: form.serialize(),
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            if (response.status) {
              success(response.message);
              location.reload();
            } else {
              error(response.message)
              $(this).attr('disabled',true);
            }
          },
          error: function(xhr) {
            error(xhr.responseText)
          }
        });
      }
    });
  });
</script>
<script>
   $(document).ready(function(){
    $('#selectAll').click(function(){
        $('.rowCheckbox').prop('checked', this.checked);
    });

    $('.rowCheckbox').change(function(){
        if ($('.rowCheckbox:checked').length == $('.rowCheckbox').length){
            $('#selectAll').prop('checked', true);
        } else {
            $('#selectAll').prop('checked', false);
        }
        updateAdmitCardStatus([$(this).data('studcode_id')], $(this).is(':checked') ? 1 : 0);
    });

    $('.changeStatus').click(function(e){
        e.preventDefault();
        var studcodeId = $(this).data('studcode_id');
        var status = $(this).data('status');
        updateAdmitCardStatus([studcodeId], status);
    });

    $('.updateAdmitCardStatusAll').click(function(e){
        e.preventDefault();
        var studcodeIds = [];
        $('.rowCheckbox:checked').each(function(){
            studcodeIds.push($(this).data('studcode_id'));
        });
        if (studcodeIds.length === 0) {
            error('Please select at least one student.');
            return;
        }
        updateAdmitCardStatus(studcodeIds, 1);
    });

    $('.StopAdmitCardStatusAll').click(function(e){
        e.preventDefault();
        var studcodeIds = [];
        $('.rowCheckbox:checked').each(function(){
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