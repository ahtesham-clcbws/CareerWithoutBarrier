<div class="row px-3">
    <style>
        .select2-container--default .select2-selection--single {
            padding: 5px .5rem;
        }

        .select2-container .select2-selection--single {
            height: 32px;
        }
    </style>
    <div class="col-lg-12">
        <div class="panel panel-default m-t-15">
            <div class="row justify-content-space-between py-2 m-2">
                <div class="col-md-6 col">
                    <h2>Student Roll No</h2>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div>
                        <div class="row" style="margin-bottom: 15px">
                            <div class="col-md-2 mb-3">
                                <label class="form-label">State</label>
                                <select class="form-control form-select-sm" id="selectedState" wire:model.live="selectedState" style="width: 100%">
                                    <option value="">All states</option>
                                    @foreach (\App\Models\State::get() as $entity)
                                    <option value="{{$entity->id}}">
                                        {{$entity->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">City</label>
                                <select class="form-control form-select-sm" id="districts" wire:model.live="selectedDistricts" wire:key="{{ $selectedState }}">
                                    <option value="">All cities</option>
                                    @foreach (\App\Models\District::whereStateId($selectedState)->get() as $entity)
                                    <option value="{{$entity->id}}">
                                        {{$entity->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2 mb-2">
                                <label for="class">Scholarship Types</label>
                                <select class="form-control form-select-sm" id="scholarshipTypes" wire:model.live="selectedScholarhips" multiple>
                                    <option value="">All scholarship types</option>
                                    @foreach (\App\Models\EducationType::get() as $entity)
                                    <option value="{{$entity->id}}">
                                        {{$entity->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2 mb-2">
                                <label for="class">Class</label>
                                <select class="form-control form-select-sm" id="classes" wire:model.live="selectedClasses" multiple>
                                    <option value="">All classes</option>
                                    @foreach (\App\Models\BoardAgencyStateModel::get() as $entity)
                                    <option value="{{$entity->id}}">
                                        {{$entity->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 mb-1">
                                <label class="form-label">Gender</label>
                                <select class="form-control form-select" id="genders" wire:model.live="selectedGenders" multiple>
                                    <option value="">All genders</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Transgender">Tg</option>
                                </select>
                            </div>
                            <div class="col-md-2 ml-auto">
                                <label class="form-label">&nbsp;</label> <br>
                                <button type="submit" class="btn btn-primary ">Filter</button> &nbsp;&nbsp;
                                <a href="/administrator/student_list" class="btn btn-danger " style="text-decoration: none;">Reset</a>
                                &nbsp;&nbsp;
                                <button type="submit" id="generateRollNumber" class="text-end btn btn-warning" style="text-decoration: none;text-align:end">Gen. Roll No</button>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function startSelect2() {
            $("#scholarshipTypes").select2({
                placeholder: "Select scholarships",
                allowClear: true
            });
            $("#classes").select2({
                placeholder: "Select classes",
                allowClear: true
            });
            $("#genders").select2({
                placeholder: "Select genders",
                allowClear: true
            });
        }
        // startSelect2()
    </script>
</div>