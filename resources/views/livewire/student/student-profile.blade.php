<section class="content mt-5">
    <style>
        .loader-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* transform: translate(-50%, -50%); */
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        .loader {
            position: absolute;
            top: 50%;
            left: 50%;
            /* width: 80px; */
            /* height: 80px; */
            transform: translate(-50%, -50%);
            /* animation: loader 1.4s infinite ease-in-out; */

        }
    </style>
    <div class="card">
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-sm-3">
                    <div class="position-relative">
                        <img src="{{ $photo?->temporaryUrl() ?? asset('/storage/'.$student->photograph) }}" class="avatar img-thumbnail" alt="avatar">
                        <div class="position-absolute" style="top: 15px; right:15px;">
                            <button class="btn btn-sm btn-primary" style="border-radius:50%;" onclick="document.getElementById('photograph').click()">
                                <i class="fa fa-camera"></i>
                            </button>
                        </div>
                        @if ($photo && $photo->temporaryUrl())
                        <div class="btn-group w-100" role="group" aria-label="Basic example">
                            @error('photo')
                            @else
                            <button type="button" class="btn btn-success" wire:click="uploadImage">Upload</button>
                            @enderror
                            <button type="button" class="btn btn-danger" onclick="window.location.reload()">Cancel</button>
                        </div>
                        @endif
                        <div class="loader-wrapper" wire:loading wire:target="uploadImage">
                            <div class="loader">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @error('photo')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror

                    <div class="form-group mt-4" style="display: none;">
                        <label for="photograph" class="control-label">Photograph <small>(Max 2MB)</small></label>
                        <input type="file" wire:model="photo" id="photograph" class="form-control text-center center-block file-upload">
                    </div>
                </div>
                <div class="col-sm-9">

                    <div class="form row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>
                                <div class="input-group">
                                    <input type="text" name="name" wire:model.live="name" placeholder="Name" title="Please enter valid Name" class="form-control" required="">
                                    @if ($student->name != $name)
                                    <div class="input-group-append">
                                        <button class="btn bg-danger" type="button" wire:click="updateName">
                                            <div class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="updateName">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            Update
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="gender" class="control-label">Gender</label>
                                <div class="input-group">
                                    <select wire:model.live="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">FeMale</option>
                                        <option value="Transgender">Transgender</option>
                                    </select>

                                    @if ($student->gender != $gender)
                                    <div class="input-group-append">
                                        <button class="btn bg-danger" type="button" wire:click="updateGender">
                                            <div class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="updateGender">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            Update
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" id="email" class="form-control" value="{{ $student->email }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="mobile" class="control-label">Mobile Number</label>
                                <input type="tel" id="mobile" class="form-control" value="{{ $student->mobile }}" disabled>
                            </div>
                        </div>


                        <div class="col-md-6 mt-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="form-group">
                                    <label for="disability" class="control-label">Person Disability</label>
                                    <br />
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model.live="disability" id="disability_yes" value="Yes">
                                        <label class="form-check-label" for="disability_yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" wire:model.live="disability" id="disability_no" value="No">
                                        <label class="form-check-label" for="disability_no">No</label>
                                    </div>
                                </div>

                                @if ($student->disability != $disability)
                                <div class="input-group-append">
                                    <button class="btn bg-danger btn-sm" type="button" wire:click="updateDisability">
                                        <div class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="updateDisability">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        Update Disability
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>

</section>