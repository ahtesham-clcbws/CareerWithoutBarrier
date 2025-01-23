@extends('administrator.layouts.master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default m-t-15">
            <div class="panel-heading p-2">
                <h5>
                    Approved Institude:
                </h5>
            </div>
            <div class="panel-body p-3">
                <div class="card alert">
                    <div class="card-body ">
                        <a href="{{route('print.approve.institute.list')}}" target="blank" class="btn btn-primary btn-small">Print PDF</a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Inst.Name & City</th>
                                        <th>Email & Mobile</th>
                                        <th>Interested For</th>
                                        <th>Estd. Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <td><span class="badge badge-primary">Sale</span></td> --}}
                                    @foreach ($institute as $institutes)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><img src="{{ asset('/storage/'.$institutes->attachment)}}" style="width:50px;height:50px;border:1px solid #c2c2c2;border-radius:5px;"></td>
                                        <td>
                                            {{ $institutes->name }}<br />
                                            {{ $institutes->login_password }}
                                        </td>
                                        <td>{{ $institutes->institute_name }} <br><span style="color:blue">{{ $institutes->district?->name . ', '.$institutes->state?->name}}</span></td>
                                        <td>{{ $institutes->email }}<br>{{ $institutes->phone }}</td>
                                        <td>{{ $institutes->interested_for }}</td>
                                        <td class="color-primary">{{ $institutes->established_year }}</td>
                                        <td class="text-end">
                                            <div style="display:flex">

                                                <a _target="blank" href="{{route('institute.view',[$institutes])}}" class="btn btn-success">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                <a _target="blank" href="#" class="deletebutton ms-1 btn btn-danger">
                                                    <i class="bi bi-trash2"></i>
                                                </a>
                                            </div>

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
@endsection('content')