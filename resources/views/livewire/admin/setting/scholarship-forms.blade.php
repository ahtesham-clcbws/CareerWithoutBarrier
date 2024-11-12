<div class="row px-3" style="min-height: 92vh;">
    <div class="col-lg-12">
        <div class="m-2 m-t-15">
            <div class="row justify-content-space-between py-2">
                <div class="col-md-6 col">
                    <h2>Scholarship Forms</h2>
                </div>
            </div>


            <div class="row g-3">
                <div class="col-md-3 col-sm-6 col-12">
                    <form class="card overflow-hidden" style="border-radius: 5px !important; box-shadow: none !important;" wire:submit="addForms">
                        @csrf
                        <div class="card-header bg-dark">
                            Scholarship + District Forms
                        </div>
                        <div class="card-body" style="min-height: 251px;">
                            <div class="mb-3">
                                <label for="education_type_id" class="form-label">Scholarship Category</label>
                                <select class="form-select form-select-sm" wire:model.live="form.educationtype_id" required>
                                    <option value=""></option>
                                    @foreach (\App\Models\EducationType::select('id','name')->get() as $category)
                                    <option value="{{ $category->id }}">{{ ucfirst(strtolower($category->name)) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="education_type_id" class="form-label">State</label>
                                <select class="form-select form-select-sm" wire:model.live="form.selectedState" <?= $form->educationtype_id ? '' : 'disabled' ?> required>
                                    <option value=""></option>
                                    @foreach (\App\Models\State::select('id','name', 'status')->get() as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="education_type_id" class="form-label">District</label>
                                <select class="form-select form-select-sm" wire:model.live="form.district_id" wire:key="{{ $form->selectedState }}" <?= $form->selectedState ? '' : 'disabled' ?> required>
                                    <option value=""></option>
                                    @foreach (\App\Models\District::where('state_id', $form->selectedState)->get() as $district)
                                    <option
                                        {{ $district->districtScholarshipLimits()->where('educationtype_id', $form->educationtype_id)->exists() ? 'disabled' : '' }}
                                        value="{{ $district->id }}">
                                        {{ $district->name }}
                                    </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="education_type_id" class="form-label">Forms</label>
                                <input class="form-control form-control-sm" type="number" min="1" wire:model="form.max_registration_limit" <?= $form->district_id ? '' : 'disabled' ?> required />
                            </div>

                            <div class="btn-group btn-group-sm w-100" role="group">
                                <button type="submit" class="btn btn-success">{{ isset($form->formsData) && $form->formsData ? 'Update' : 'Add' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-sm-6 col-12">
                    <div class="card card-body" style="border-radius: 5px !important; box-shadow: none !important;">
                        <div class="mb-3 d-flex gap-3">
                            <select class="form-select form-select-sm" wire:model.live="selectedCategory">
                                <option value="">Filter category ...</option>
                                @foreach (\App\Models\EducationType::select('id','name')->whereHas('DistrictScholarshipLimits')->get() as $category)
                                <option value="{{ $category->id }}">{{ ucfirst(strtolower($category->name)) }}</option>
                                @endforeach
                            </select>
                            <select class="form-select form-select-sm" wire:model.live="selectedDistrict">
                                <option value="">Filter district ...</option>
                                @foreach (\App\Models\District::select('id','name')->whereHas('DistrictScholarshipLimits')->get() as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                            <!-- <input type="search" wire:model.live="searchString" class="form-control form-control-sm" placeholder="search here .." /> -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-start">S.No</th>
                                        <th>Scholarship</th>
                                        <th>District</th>
                                        <th>Forms</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($formsData as $entity)
                                    <tr>
                                        <td class="text-start"><b>{{ $loop->iteration.'' }}</b></td>
                                        <td>{{ ucfirst(strtolower($entity->EducationType->name)) }}</td>
                                        <td>{{ $entity->district->name }}</td>
                                        <td>{{ $entity->max_registration_limit }}</td>
                                        <td>
                                            <div class="d-flex gap-2 border-0">
                                                <i class="bi bi-pencil-square btn-link" style="cursor:pointer;" wire:click="editForms(<?= $entity->id ?>)"></i>
                                                <i class="bi bi-trash2 btn-link text-danger" style="cursor:pointer;" wire:click="deleteForm(<?= $entity->id ?>)" wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $formsData->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>