@extends('administrator.layouts.master')
@section('title')
Testimonials
@endsection


@section('content')
<div class="row">
    <div class="col-lg-12 col">
        <h4 style="margin-top: 10px;margin-left:10px">Student And Institude Testimonials List:</h4>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sr.N.</th>
                        <th>Profile Pic</th>
                        <th>Message</th>
                        <th>Is Featured</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $testimonial)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td> <img src="{{ asset('home/' . $testimonial->image) }}"
                                    style="width: 100px;border-radius:10px"></td>
                            <td width="40%">{!! $testimonial->message !!}</td>
                            <td>
                                <div class="form-control2">
                                    <label class="switch" for="testimonial-{{ $testimonial->id }}">
                                        <input type="checkbox" id="testimonial-{{ $testimonial->id }}"
                                            data-id="{{ $testimonial->id }}" class="testimonial-status-toggle" {{ $testimonial->status ? 'checked' : '' }}>
                                        <div class="slider round">
                                            <span class="off">No</span>
                                            <span class="on">Yes</span>
                                        </div>
                                    </label>
                                </div>
                            </td>
                            <td> {{ucfirst($testimonial->type)}}</td>
                            <td>{{ $testimonial->created_at->diffForHumans() }}</td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="{{ route('admin.testimonialDelete', [$testimonial->id]) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $('.testimonial-status-toggle').on('change', function () {
        var courseId = $(this).data('id');
        var isFeatured = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: "{{ route('testimonial.toggle.status') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                id: courseId,
                status: isFeatured
            },
            success: function (response) {
                if (response.status) {
                    success(response.message);
                } else {
                    error(response.message);
                }
            },
            error: function (xhr) {
                error(xhr.responseText);
            }
        });
    });
</script>
@endsection