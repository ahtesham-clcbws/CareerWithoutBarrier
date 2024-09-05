@extends('administrator.layouts.master')
@section('title')
Student Result
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
<?php

use App\Models\StudentPaperExported;
?>
<div class="row px-3">

  <div class="col-lg-12">
    <div class="row justify-content-space-between py-3">
      <div class="col-md-6 col">
        <h2>Student Result and Claim Form</h2>
      </div>
      <div class="col-md-6 col">
        <a href="{{route('admin.refreshStudentRank')}}" class="btn-warning btn float-right">Student Rank Refresh</a>
      </div>
    </div>
    <div class="panel panel-default m-t-15">


      <div class="panel-body">
        <div class="card alert">
          <!-- <div class="card-header"> -->
          <!-- <form action="#" method="post">
              @csrf
              <div class="row" style="margin-bottom: 15px">
                <input type="hidden" value="filterform" name="filterform">

                <div class="col-md-3 col mb-3">
                  <label for="class">Scholarship Types<span class="text-danger">*</span></label>
                  <select class="form-control" id="education_name" name="education_name" required>
                    <option value="">--Select Scholarship--</option>
                    @foreach($scholarshipTypes as $scholarship)
                    <option value="{{ $scholarship->id }}" {{ request()->education_name== $scholarship->id ? 'selected' : '' }}>
                      {{ $scholarship->name }}
                    </option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-2 col mb-3">
                  <label class="form-label">Gender</label>
                  <select name="gender" class="form-control" id="genders-filters">
                    <option value="">--Select Gender--</option>
                    <option value="Male" {{ request()->gender == 'Male'  ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ request()->gender == 'Female'  ? 'selected' : '' }}>Female</option>
                    <option value="Transgender" {{ request()->gender == 'Transgender'  ? 'selected' : '' }}>Transgender</option>
                  </select>
                  @error('gender')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-2 col mb-3">
                  <label class="form-label">Number of Student<span class="text-danger">*</span></label>
                  <input class="form-control" placeholder="Enter Number Of Student" type="text" pattern="[0-9]+" name="limit" value="{{request()->limit}}" required>
                </div>

                <div class="col-md-2 col mb-3">
                  <label class="form-label">Percentage<span class="text-danger">*</span></label>
                  <input class="form-control" placeholder="Enter Percentage" type="text" pattern="[0-9]+" name="percentage" value="{{request()->percentage}}" required>
                </div>
                <div class="col-md-2 col mb-3 ml-auto">
                  <label class="form-label">&nbsp;</label> <br>
                  <button type="submit" class="btn btn-primary ">Filter</button> &nbsp;&nbsp;
                  <a href="/administrator/student_result" class="btn btn-danger " style="text-decoration: none;">Reset</a>
                </div>
              </div>
            </form> -->
          <!-- </div> -->
          <form action="{{route('admin.student.result.allow_claim')}}" method="post">
            @csrf
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered datatablecll">
                  <thead>
                    <tr>
                      <th class="selectAllCl text-center" style="padding-right: 10px;">Check_All <br> <input type="checkbox" id="selectAll"> </th>
                      <th>Student Name/ Gender</th>
                      <th>Email/ Mobile/ App_Code</th>

                      <th>Scholarship Category</th>
                      <th>Scholarship Opted For</th>
                      <th>City</th>
                      <th>Percentage</th>
                      <th>Page</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($students as $student)
                    <?php



                    $studCode = $student->latestStudentCode;

                    ?>
                    <tr>

                      <td scope="row" style="text-align: right;">
                        <input type="hidden" name="student_id[]" value="{{$student->id}}">
                        <input title="Please Tick" type="checkbox" data-row-id="{{$student->id}}" name="allow_to_claim_scholarship[]" class="form-check-input rowCheckbox" id="allow_to_claim_scholarship" value="1" {{ $studCode?->allow_to_claim_scholarship ? 'checked' : '' }} required>
                        &nbsp;&nbsp;

                        {{$loop->index + 1}}.)
                      </td>
                      <td>{{ $student->name }}<br>
                        ({{ genderShort($student->gender) }})
                      </td>
                      <td>{{ $student->email }} <br>
                        {{ $student->mobile }} <br>
                        {{$studCode?->application_code ? $studCode?->application_code : 'NA'}}
                      </td>
                      <td>{{ $student->scholarShipCategory?->name ?? 'N/A' }} <br> {{ $student->qualifications?->name }} </td>
                      <td>{{ $student->scholarShipOptedFor?->name ?? 'N/A' }}</td>
                      <td>{{ $student->district?->name }}</td>
                      <td style="text-align:center">{{decimal_Number($student->latestStudentCode?->percentage)}} %</td>
                      <td>

                        <a href="{{ route('admin.student.result.detail', $student->id) }}" class="btn btn-primary" style="text-decoration: none; text-align:center"></i> Result</a>
                        <br>
                        <a href="{{ route('admin.student.adminCard', $student->id) }}" class="btn btn-primary" style="text-decoration: none;     width: 104px;
    margin-top: 10px;"></i> Admit Card</a>
                      </td>
                      <td style="text-align:center">
                        <!-- @if($student->studentPaperDetails?->isNotEmpty()) -->

                        <!-- @endif -->
                        @if($student->latestStudentCode?->percentage < 60) <a href="#" class="btn btn-warning text-danger" style="text-decoration: none; width: 94px; margin-bottom: 10px;"></i> Not Eligible</a>
                          @else
                          <a href="{{ route('admin.student.claim_form', $student->id) }}" class="btn btn-warning" style="text-decoration: none; width: 94px; margin-bottom: 10px;"></i> Claim Form</a>

                          <button type="submit" class="btn btn-success mt-2 allow_claim_btn{{$student->id}} allow_to_claim_scholarship" style="display: none;"></i> Allow To Claim Scholarship</button>

                          @endif
                          </li>
                          </ul>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<script>
  $('#selectAll').click(function() {
    $('.rowCheckbox').each(function() {
      $(this).prop('checked', $('#selectAll').prop('checked'));

      var rowId = $(this).data('row-id');
      if ($(this).is(':checked')) {
        $('.allow_claim_btn' + rowId).show();
      } else {
        $('.allow_claim_btn' + rowId).hide();
      }
    });
  });
</script>

@endsection('content')