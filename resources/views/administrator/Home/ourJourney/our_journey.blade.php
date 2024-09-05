@extends('administrator.layouts.master')
@section('content')


@section('content')
<div class="row py-2 pl-3 pr-3">
    <div class="container ">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h3> Add Our Journey</h3>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="{{ route('home.ourJourney') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <p class="text-muted f-s-12">Title*</p>
                                        <input required class="form-control" name="title"></input>
                                    </div>

                                    <div class="form-group">
                                        <p class="text-muted f-s-12">Add Logo*<small>50x50</small></p>
                                        <input type="file" id="fileInputlogo" class="form-control input-focus" onchange="validateImage(this)" name="logo">
                                        <img id="imagePreviewLogo" src="#" alt="Image Preview" style="display: none;width:200px">
                                    </div>

                                    <div class="form-group">
                                        <p class="text-muted f-s-12">Add Image*<small>200x200</small></p>
                                        <input required type="file" id="fileInputImage" class="form-control input-focus" onchange="validateImage(this)" name="image">
                                        <img id="imagePreviewImage" src="#" alt="Image Preview" style="display: none;width:200px">
                                    </div>

                                    <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card-header">
                    <h3>Our Journey List</h3>
                </div>
                <div class="card">
                    <div class="card-body" style="max-height: 384px;overflow-y: auto;">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Title</th>
                                        <th>Is Featured</th>
                                        <th style="text-align: center;">Logo</th>
                                        <th style="text-align: center;">Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ourJourneys as $pros)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{!! $pros->title !!}</td>
                                        <td>

                                            <div class="form-control2">
                                                <label class="switch" for="status-{{ $pros->id }}">
                                                    <input type="checkbox" id="status-{{ $pros->id }}" data-id="{{ $pros->id }}" class="toggle-featured" {{ $pros->is_featured ? 'checked' : '' }}>
                                                    <div class="slider round">
                                                        <span class="off">Inactive</span>
                                                        <span class="on">Active</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center;">
                                                @if (in_array(pathinfo($pros->logo, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp']))
                                                <a href="{{ asset('home/'.$pros->logo) }}" target="_blank" >  <img src="{{ asset('home/'.$pros->logo) }}" alt="our Jouney logo" style="max-width: 50px; max-height: 40px;">
                                                </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div style="text-align: center;">
                                                @if (in_array(pathinfo($pros->image, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp']))
                                                <a href="{{ asset('home/'.$pros->image) }}" target="_blank" >  <img src="{{ asset('home/'.$pros->image) }}" alt="our Jouney Image" style="max-width: 50px; max-height: 40px;">
                                                </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td style="text-align: center">
                                            <a href="{{ route('home.ourJourneyDelete', ['id' => $pros->id]) }}">
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
</div>

<script>
    function confirmDelete() {
        if (confirm("Are you sure you want to delete this item?")) {
            // User clicked "OK", proceed with deletion
            // Add your deletion logic here
            console.log("Item deleted");
        } else {
            // User clicked "Cancel", do nothing
            console.log("Deletion canceled");
        }
    }
</script>

<script>
    const fileInput = document.getElementById('fileInputLogo');
    const imagePreview = document.getElementById('imagePreviewLogo');

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

    const fileInputImage = document.getElementById('fileInputImage');
    const imagePreviewImage = document.getElementById('imagePreviewImage');

    fileInputImage.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreviewImage.src = e.target.result;
                imagePreviewImage.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreviewImage.src = '#';
            imagePreviewImage.style.display = 'none';
        }
    });
</script>
<script>
     $('.toggle-featured').on('change', function() {
                var id = $(this).data('id');
                var isFeatured = $(this).is(':checked') ? 1 : 0;
    
                $.ajax({
                    url: "{{ route('toggle.featured') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        type:'ourJourney',
                        is_featured: isFeatured
                    },
                    success: function(response) {
                        if(response.status){
                            success(response.message);
                        }else{
                            error(response.message);
                        }
                    },
                    error: function(xhr) {
                        error(xhr.responseText);
                    }
                });
            });
</script>
@endsection