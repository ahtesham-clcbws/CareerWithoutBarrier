@extends('administrator.layouts.master')
@section('title')
Scholarship Course List
@endsection

@section('content')


<style>
    textarea {
        width: 100%;
    }

    .select2-selection__choice__display {
        color: black;
    }
</style>
<!-- scholarship Section One Start  -->
<div class="row py-2 pl-3 pr-3">
    <div class="col-md-6 col-lg-6 col">
        <div class="card-header">
            <h4>Scholarship Course Section:</h4>
        </div>
        <div class="card alert">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col">
                            <div class="form-group">
                                <p class="text-muted f-s-12">Add Icon Image<span class="text-danger">(60x60)*</span></p>
                                <input required type="file" id="fileInputSection2" class="form-control input-focus" onchange="validateImage(this)" name="icon">
                                @error('icon')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <img class="imagePreviewSection2" src="#" alt="Image Preview" style="display: none;width:100px">
                            </div>
                        </div>
                        <div class="col-md-6 col">
                            <div class="form-group">
                                <p for="education_type_id" class="text-muted f-s-12">Scholarship Category<span class="text-danger">*</span></p>
                                <select class="form-select form-select-sm form-control input-focus" id="education_type_id" name="education_type_id" {{ count($data['educations']) ? '' : 'disabled' }} required>
                                    <option value="">-Select Scholarship-</option>
                                    @foreach ($data['educations'] as $key => $education)
                                    <option value="{{ $education['id'] }}">{{ $education['name'] }}</option>
                                    @endforeach
                                </select>
                                <input id="form_name_scholarship" type="hidden" name="form_type" value="scholarship_form" class="form-control">
                                <input id="" type="hidden" name="scholarship_id" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col">
                            <div class="form-group">
                                <p class="text-muted f-s-12">Remark<span class="text-danger">*</span></p>
                                <input id="remark" name="remark" class="form-control" required placeholder="100% Scholarship For 600 Brilliant Aspirants">
                            </div>
                        </div>
                        <div class="col-md-6 col">
                            <div class="form-group">
                                <p class="text-muted f-s-12">Add Picture<span class="text-danger">(1600x930)*</span></p>
                                <input required type="file" id="fileInputSection2" class="form-control input-focus" onchange="validateImage(this)" name="picture">
                                @error('picture')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <img class="imagePreviewSection2" src="#" alt="Image Preview" style="display: none;width:100px">
                            </div>
                        </div>
                        <div class="col text-center">
                            <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col">
        <div class="card-header">
            <h4>Scholarship Message List:</h4>
        </div>
        <div class="card">
            <div class="card-body" style="max-height: 435px; overflow-y: auto; padding:0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sr.N.</th>
                            <th>ScholarShip</th>
                            <th>Icon</th>
                            <th>Remarks</th>
                            <th>Picture</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($data['scholarships'])
                        @foreach ($data['scholarships'] as $scholarship)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $scholarship->educationType?->name }}</td>

                            <td>
                                <div style="text-align: center;">
                                    @if ($scholarship->icon)
                                    <a href="{{ asset('home/aboutus/'.$scholarship->icon) }}" target="_blank"> <img src="{{ asset('home/aboutus/'.$scholarship->icon) }}" alt="icon Image" style=" max-height: 40px;">
                                    </a>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 100px;">
                                    {{ $scholarship->remark }}
                                </div>
                            </td>

                            <td>
                                <div style="text-align: center;">
                                    @if ($scholarship->picture)
                                    <a href="{{ asset('home/aboutus/'.$scholarship->picture) }}" target="_blank"> <img src="{{ asset('home/aboutus/'.$scholarship->picture) }}" alt="picture Image" style=" max-height: 50px;">
                                    </a>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="form-control2">
                                    <label class="switch" for="status-{{ $scholarship->id }}">
                                        <input type="checkbox" id="status-{{ $scholarship->id }}" data-id="{{ $scholarship->id }}" onchange="toggleStatus(this, 'scholarship')" {{ $scholarship->is_featured ? 'checked' :
                                                        '' }}>
                                        <div class="slider round">
                                            <span class="off">Inactive</span>
                                            <span class="on">Active</span>
                                        </div>
                                    </label>
                                </div>
                            </td>

                            <td style="text-align: center">
                                <a href="{{ route('home.scholarshipDelete', ['form_type' => 'scholarship','id' => $scholarship->id]) }}">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Scholarship Section One End -->

<!-- scholarship Section Two Start  -->
<div class="row  py-2 pl-3 pr-3">
    <div class="col-md-12 col-lg-12 col">
        <div class="card-header">
            <h4>CAREER PREP SCHOLARSHIP EXAM:</h4>
        </div>
        <div class="card alert">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-4 col-lg-4 col">
                            <div class="form-group">
                                <label for="scholarship_course">Scholarship Course<span class="text-danger">*</span></label>
                                <select class="form-select form-select-sm" name="scholarship_course" required>
                                    <option value="">--Select Scholarship--</option>
                                    @foreach($data['scholarshipCourses'] as $scholarshipCourse)
                                    <option value="{{ $scholarshipCourse->id }}"> {{ $scholarshipCourse->educationType?->name }}</option>
                                    @endforeach
                                </select>
                                <input id="scholarship_secondForm" type="hidden" name="form_type" value="scholarship_secondForm" class="form-control">
                                <input id="" type="hidden" name="scholarshipTwo_id" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 col">
                            <div class="form-group">
                                <label for="prospectus">Attach prospectus (Max 2MB, JPG, PNG, PDF Only):<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="custom-file custom-file-prospectus">
                                        <input type="file" name="prospectus" value="{{$scholarshipTwo?->prospectus}}" class="custom-file-input" id="prospectus" onchange="validateImage(this,'imagepdf')" {{$scholarshipTwo?->prospectus ? '' : 'required'}}>
                                        <label class="custom-file-label" for="prospectus">Choose file</label>
                                        @error('prospectus')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    @if($scholarshipTwo?->prospectus)
                                    <div class="input-group-append student-prospectus-img-view" style="margin-left: 10px;margin-top: -2rem;">
                                        <a style="background: none;border: none;" target="_blank" class="btn btn-outline-secondary btn-success" href="{{  asset('upload/student/'.$scholarshipTwo?->prospectus)}}">
                                            <img src="{{ asset('upload/student/'.$scholarshipTwo?->prospectus) }}" alt="prospectus" style="width: 7rem;height: 8rem;margin-top: -10re;">
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col">
                            <div class="form-group">
                                <label for="guideline">Attach guideline (Max 2MB, JPG, PNG, PDF Only):<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="custom-file custom-file-guideline">
                                        <input type="file" name="guideline" value="{{$scholarshipTwo?->guideline}}" class="custom-file-input" id="guideline" onchange="validateImage(this,'imagepdf')" {{$scholarshipTwo?->guideline ? '' : 'required'}}>
                                        <label class="custom-file-label" for="guideline">Choose file</label>
                                        @error('guideline')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    @if($scholarshipTwo?->guideline)
                                    <div class="input-group-append student-guideline-img-view" style="margin-left: 10px;margin-top: -2rem;">
                                        <a style="background: none;border: none;" target="_blank" class="btn btn-outline-secondary btn-success" href="{{  asset('upload/student/'.$scholarshipTwo?->guideline)}}">
                                            <img src="{{ asset('upload/student/'.$scholarshipTwo?->guideline) }}" alt="guideline" style="width: 7rem;height: 8rem;margin-top: -10re;">
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col">
                            <div class="form-group">
                                <label for="overview">Overview<span class="text-danger">*</span></label>
                                <textarea id="IdOfCKEditorTextArea" class="ckeditor form-control w-100" value="{{ old('overview') ? $scholarshipTwo?->overview : '' }}" style="width: 100%;" name="overview" placeholder="Enter overview here"></textarea>
                                @error('overview')
                                <div class="text-danger">{{$overview}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col text-center pt-5">
                            <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12 col">
        <div class="card-header">
            <h4>Scholarship OverView List:</h4>
        </div>
        <div class="card">
            <div class="card-body" style="max-height: 435px; overflow-y: auto; padding:0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sr.N.</th>
                            <th>ScholarShip Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($data['scholarshipTwos'])
                        @foreach ($data['scholarshipTwos'] as $scholarship)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $scholarship->scholarshipType?->educationType?->name ?? '' }}</td>
                            <td>
                                <div class="form-control2">
                                    <label class="switch" for="status1-{{ $scholarship->id }}">
                                        <input type="checkbox" id="status1-{{ $scholarship->id }}" data-id="{{ $scholarship->id }}" onchange="toggleStatus(this, 'scholarship_secondForm')" {{ $scholarship->is_featured ? 'checked' :
                                                        '' }}>
                                        <div class="slider round">
                                            <span class="off">Inactive</span>
                                            <span class="on">Active</span>
                                        </div>
                                    </label>
                                </div>
                            </td>

                            <td style="text-align: center">
                                <a href="{{ route('home.scholarshipDelete', ['form_type' => 'scholarship_secondForm','id' => $scholarship->id]) }}">
                                    <span class="fa fa-trash"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- scholarship Section Two Start  -->

<script>
    function toggleStatus(element, $type) {

        var id = $(element).data('id');
        var isStatus = $(element).is(':checked') ? 1 : 0;

        $.ajax({
            url: "{{ route('scholarship.toggleStatus') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                status: isStatus,
                form_type: $type
            },
            success: function(response) {
                if (response.status) {
                    success(response.message);
                } else {
                    error(response.message);
                }
            },
            error: function(xhr) {
                error(xhr.responseText);
            }
        });
    };
</script>
@endsection