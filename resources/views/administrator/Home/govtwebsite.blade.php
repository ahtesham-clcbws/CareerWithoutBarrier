@extends('administrator.layouts.master')
@section('title')
Govt Website
@endsection

@section('content')
<div class="row py-5 pl-3 pr-3">
    <div class="container p-0">
        <div class="dashboard-container mb-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default m-t-15">
                        <div class="panel-heading">
                            <h4 class="panel-title"><strong>Add Govt Website Details</strong></h4>
                        </div>
                        <div class="panel-body">
                            <div class="card alert">
                                <div class="card-body">
                                    <form action="{{ route('home.savegovtwebsite') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col">
                                                <div class="form-group">
                                                    <p>Website Url</p>
                                                    <input type="text" placeholder="Enter Placeholder" name="website_link" id="" required class="form-control input-focus">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col">
                                            <div class="form-group">
                                            <p>Remarks</p>
                                            <input type="text" name="remark" id="" placeholder="Enter Remarks" class="form-control input-focus">
                                        </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <p>Add Logo</p>
                                            <div class="input-group">
                                                <input type="file" id="fileInput" class="form-control input-focus" name="image">
                                                <img id="imagePreview" src="#" alt="Image Preview" style="display: none;width: 100px;">
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <h4>Govt Website List</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Image</th>
                                    <th>Remark</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($website as $websites)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>
                                        <p style="width: 185px;word-wrap: break-word;">{{ $websites->website_link}}</p>
                                        <a href="{{ asset('home/courses/' . $websites->image) }}">
                                            <img src="{{ asset('home/courses/' . $websites->image) }}" style="width: 50px;border-radius:10px"></a>
                                    </td>
                                    <td>{{$websites->remark}}</td>
                                    <td>
                                    <div class="form-control2">
                                        <label class="switch" for="status-{{ $websites->id }}">
                                            <input type="checkbox" id="status-{{ $websites->id }}" data-id="{{ $websites->id }}" onchange="toggleStatus(this, 'gov_website')" {{ $websites->status ? 'checked' : '' }}>
                                            <div class="slider round">
                                                <span class="off">Inactive</span>
                                                <span class="on">Active</span>
                                            </div>
                                        </label>
                                    </div>
                                    </td>

                                    <td style="text-align: center">
                                        <a href="{{ route('home.deleteGovtwebsite', ['id' => $websites->id]) }}">
                                            <span class="fa fa-trash"></span>
                                        </a>
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

<script>
    const fileInput = document.getElementById('fileInput');
    const imagePreview = document.getElementById('imagePreview');

    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    });
</script>

@endsection