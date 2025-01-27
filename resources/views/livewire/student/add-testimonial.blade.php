<div class="row py-2 pl-3 pr-3">
    <div class="container ">
        <div class="row">
            @if(!$student->testimonial)
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h4> Say About Us:</h4>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form wire:submit="save">
                                    @csrf
                                    <div class="form-group">
                                        <label class="text-muted f-s-12">Write Review</label>
                                        <textarea style="width: 100%;" id="editor" wire:model.live="message"></textarea>
                                        @error('message')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="text-muted f-s-12">Add screenshot/image</label>
                                        @if ($image && $image->temporaryUrl())
                                        <br /><img src="{{ $image->temporaryUrl() }}" alt="Image Preview" class="mb-1" style="width:200px">
                                        @endif
                                        <input type="file" class="form-control input-focus" wire:model.live="image">
                                        @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-warning ">
                                        <div class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="save">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif
            <div class="{{ $student->testimonial ? 'col-md-12' : 'col-md-6' }} ">
                <div class="card-header">
                    <h4> Said About Us:</h4>
                </div>
                <div class="card">
                    @if ($student->testimonial)
                    <div class=" mb-4">
                        <div class="card-header text-end">
                            <!-- <a href="#">Edit</a> -->&nbsp;
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7 col">
                                    <h5 class="card-title"><b>Name: </b>{{ $student->testimonial->name }}</h5>
                                    <p class="card-text"><b>Message: </b>{!! $student->testimonial->message !!}</p>
                                </div>
                                <div class="col-md-5 col"> @if ($student->testimonial->image)
                                    <img style="width: 64px;" src="{{ asset('home/' . $student->testimonial->image) }}" class="card-img-top" alt="{{ $student->testimonial->name }}">
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    @else
                    <div class="">
                        <h5 class="m-3">You have not submitted a testimonial yet.</h5>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>