@extends('administrator.layouts.master')
@section('title')
Faq List
@endsection


@section('content')
<style>
    .faq_w1 h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        font-size: 13px
    }
</style>
<div class="row py-2 pl-3 pr-3">
    <div class="container ">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <div class="panel-heading">Add FAQ</div>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="{{ route('admin.home.faqSave') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Title</p>
                                                <textarea class="ckeditor" style="width: 100%;" id="editor" name="title"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Details</p>
                                                <textarea class="ckeditor" style="width: 100%;" id="editor1" name="details"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col text-center">
                                            <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card-header">
                    <div class="panel-heading"> FAQ List</div>
                </div>
                <div class="table-responsive card">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Title</th>
                                <th>Staus</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faq as $faqs)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td class="faq_w1">{!! $faqs->title !!}</td>
                                <td>
                                <div class="form-control2">
                                        <label class="switch" for="status-{{ $faqs->id }}">
                                            <input type="checkbox" id="status-{{ $faqs->id }}" data-id="{{ $faqs->id }}" onchange="toggleStatus(this, 'home_faqs')" {{ $faqs->status ? 'checked' : '' }}>
                                            <div class="slider round">
                                                <span class="off">Inactive</span>
                                                <span class="on">Active</span>
                                            </div>
                                        </label>
                                    </div>
                                </td>

                                <td style="text-align: center">
                                    <a href="{{ route('admin.home.faqDelete', ['id' => $faqs->id]) }}">
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
@endsection