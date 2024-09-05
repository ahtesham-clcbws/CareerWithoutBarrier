@extends('administrator.layouts.master')
@section('title')
Blog News List
@endsection


@section('content')
<div class="row py-2 pl-3 pr-3">
    <div class="container ">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h3> Add Blog</h3>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="{{ route('news.blogSave') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <p class="text-muted f-s-12">Title</p>
                                        <textarea class="ckeditor" id="editor" name="title"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <p class="text-muted f-s-12">Details(max Character:)
                                        <textarea class="ckeditor" id="editor1" name="details"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <p class="text-muted f-s-12">Add Image</p>
                                        <input type="file" id="fileInput" class="form-control input-focus" name="image">
                                        <img id="imagePreview" src="#" alt="Image Preview" style="display: none;width:200px">
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
                    <h3>Blog List</h3>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blog as $blogs)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{!! $blogs->title !!}</td>
                                        <td>
                                        <div class="form-control2">
                                        <label class="switch" for="status-{{ $blogs->id }}">
                                            <input type="checkbox" id="status-{{ $blogs->id }}" data-id="{{ $blogs->id }}" onchange="toggleStatus(this, 'blog_news')" {{ $blogs->status ? 'checked' : '' }}>
                                            <div class="slider round">
                                                <span class="off">Inactive</span>
                                                <span class="on">Active</span>
                                            </div>
                                        </label>
                                    </div>
                                        </td> 

                                        <td style="text-align: center">
                                            <a href="{{ route('news.blogDelete', ['id' => $blogs->id]) }}">
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