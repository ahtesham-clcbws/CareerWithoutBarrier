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
                        <?php echo csrf_field(); ?>
                        <div class="card-header bg-dark">
                            Scholarship + District Forms
                        </div>
                        <div class="card-body" style="min-height: 251px;">
                            <div class="mb-3">
                                <label for="education_type_id" class="form-label">Scholarship Category</label>
                                <select class="form-select form-select-sm" wire:model.live="form.education_type_id" required>
                                    <option value=""></option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\EducationType::select('id','name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="education_type_id" class="form-label">State</label>
                                <select class="form-select form-select-sm" wire:model.live="form.selectedState" <?= $form->education_type_id ? '' : 'disabled' ?> required>
                                    <option value=""></option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\State::select('id','name', 'status')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="education_type_id" class="form-label">District</label>
                                <select class="form-select form-select-sm" wire:model.live="form.district_id" wire:key="<?php echo e($form->selectedState); ?>" <?= $form->selectedState ? '' : 'disabled' ?> required>
                                    <option value=""></option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\District::where('state_id', $form->selectedState)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        <?php echo e($district->districtScholarshipLimits()->where('education_type_id', $form->education_type_id)->exists() ? 'disabled' : ''); ?>

                                        value="<?php echo e($district->id); ?>">
                                        <?php echo e($district->name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="education_type_id" class="form-label">Forms</label>
                                <input class="form-control form-control-sm" type="number" min="1" wire:model="form.max_registration_limit" <?= $form->district_id ? '' : 'disabled' ?> required />
                            </div>

                            <div class="btn-group btn-group-sm w-100" role="group">
                                <button type="submit" class="btn btn-success"><?php echo e(isset($form->formsData) && $form->formsData ? 'Update' : 'Add'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-sm-6 col-12">
                    <div class="card card-body" style="border-radius: 5px !important; box-shadow: none !important;">
                        <div class="mb-3 d-flex gap-3">
                            <select class="form-select form-select-sm" wire:model.live="selectedCategory">
                                <option value="">Scholarship Category ...</option>
                                <?php $__currentLoopData = \App\Models\EducationType::select('id','name')->whereHas('DistrictScholarshipLimits')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <select class="form-select form-select-sm" wire:model.live="selectedState">
                                <option value="">All States ...</option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\State::get(['id', 'name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </select>
                            <select class="form-select form-select-sm" wire:model.live="selectedDistrict" wire:key="<?php echo e($selectedState); ?>" <?= !$selectedState ? 'disabled' : '' ?>>
                                <option value="">All Districts ...</option>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = \App\Models\District::select('id','name')->where('state_id', $selectedState)->whereHas('DistrictScholarshipLimits')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($district->id); ?>"><?php echo e($district->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
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
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $formsData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-start"><b><?php echo e($loop->iteration.''); ?></b></td>
                                        <td><?php echo e($entity->EducationType->name); ?></td>
                                        <td><?php echo e($entity->district->name); ?></td>
                                        <td><?php echo e($entity->max_registration_limit); ?></td>
                                        <td>
                                            <div class="d-flex gap-2 border-0">
                                                <i class="bi bi-pencil-square btn-link" style="cursor:pointer;" wire:click="editForms(<?= $entity->id ?>)"></i>
                                                <i class="bi bi-trash2 btn-link text-danger" style="cursor:pointer;" wire:click="deleteForm(<?= $entity->id ?>)" wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            <?php echo e($formsData->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/admin/setting/scholarship-forms.blade.php ENDPATH**/ ?>