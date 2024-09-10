
<?php $__env->startSection('content'); ?>
<style>
    .select2-selection__choice__display {
        color: black;
    }

    .commaSeperatedSpan:not(:last-child)::after {
        content: ", ";
        font-weight: 700;
    }
</style>
</style>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlHj5/3pQTcVb9IWJtxH8gb+G7CeGpC/1Ch5n6U3e47PPCe3pI0FepfO4Gk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-2LR0miTWKIH7K3y5lRETXdpQ3hTxk2l7X2+67G9AkQIowmEl4aI1OVVgD9F0kQlK" crossorigin="anonymous"></script>

<div class="row py-5 pl-3 pr-3">
    <div class="container p-0">
        <div class="dashboard-container mb-5">
            <?php $__errorArgs = ['Error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> <?php echo e($message); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <div class="row border-bottom mt-3 pb-3">
                
                <div class="col-md-3 col-sm-6 col-12">
                    <form class="card" method="post" id="educationForm" style=" box-shadow: 0px 0px 5px 1px #17a2b887 !important; ">
                        <?php echo csrf_field(); ?>
                        <?php $__errorArgs = ['educationError'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo e($message); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['educationSuccess'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> <?php echo e($message); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="card-header bg-info">Scholarship Category</div>
                        <input type="number" name="id" class="d-none" id="education_id" value="0">
                        <input name="form_name" id="educationFormName" class="d-none" value="education_form">
                        <div class="card-body" style="min-height: 199px;">
                            <div class="mb-4">
                                <label for="class_boards" class="form-label"> Scholarship Category</label>
                                <select class="form-select form-select-sm" multiple id="education_name" name="name[]" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="btn-group btn-group-sm w-100" role="group">
                                <button type="button" class="btn btn-danger resetbtn" id="educationReset" onclick="resetForm('education')">Reset</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-sm-6 col-12">
                    <div class="card" style=" box-shadow: 0px 0px 5px 1px #17a2b887 !important; ">
                        <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                            <table class="table table-sm datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Scholarship Category</th>
                                        <th scope="col">Is Featured</th>
                                        <th scope="col" class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data['educations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td scope="row"><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($education['name']); ?></td>
                                        <td>
                                            <div class="form-control2">
                                                <label class="switch" for="featured-<?php echo e($education->id); ?>">
                                                    <input type="checkbox" id="featured-<?php echo e($education->id); ?>" data-id="<?php echo e($education->id); ?>" class="educations-status-toggle" <?php echo e($education->is_featured ? 'checked' : ''); ?>>
                                                    <div class="slider round">
                                                        <span class="off">No</span>
                                                        <span class="on">Yes</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <a href="javascript:void(0);"><i class="bi bi-pencil-square text-success me-2" onclick="editForm(<?php echo e($education['id']); ?>, '<?php echo e($education['name']); ?>', 'education')"></i></a>
                                            <a href="javascript:void(0);"><i class="bi bi-trash2-fill text-danger" onclick="deleteEducationType(<?php echo e($education['id']); ?>)"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border-bottom mt-3 pb-3">
                
                <div class="col-md-3 col-sm-6 col-12">
                    <form class="card" method="post" id="class_group_examForm">
                        <?php echo csrf_field(); ?>
                        <?php $__errorArgs = ['examError'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo e($message); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['examSuccess'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> <?php echo e($message); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="card-header bg-dark">
                            Education Type
                        </div>
                        <input type="number" name="id" class="d-none" id="class_group_exam_id" value="0">
                        <input name="form_name" id="class_group_examFormName" class="d-none" value="exam_form">
                        <div class="card-body" style="min-height: 251px;">
                            <div class="mb-3">
                                <label for="education_type_id" class="form-label">Scholarship Category</label>
                                <select class="form-select form-select-sm" id="exam_education_type_id" name="exam_education_type_id" <?php echo e(count($data['educations']) ? '' : 'disabled'); ?> required>
                                    <option value=""></option>
                                    <?php $__currentLoopData = $data['educations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($education['id']); ?>"><?php echo e($education['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="class_group_exam_name_id" class="form-label"> Education Type</label>
                                <select class="form-select form-select-sm" multiple id="class_group_exam_name_id" name="name[]" required>
                                    <?php $__currentLoopData = $data['class_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>"> <?php echo e($class->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="btn-group btn-group-sm w-100" role="group">
                                <button type="button" class="btn btn-danger resetbtn" id="class_group_examReset" onclick="resetForm('class_group_exam')">Reset</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                            <table class="table table-sm datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Scholarship Category</th>
                                        <th scope="col">Education Type</th>
                                        <th scope="col" class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data['exam']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($key + 1); ?></th>

                                        <td><?php if(!empty($exam->education['name'])): ?>
                                            <?php echo e($exam->education['name']); ?>

                                            <?php else: ?>
                                            <?php echo e('-'); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $exam->class_exam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_group_exam_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="commaSeperatedSpan"><?php echo e($class_group_exam_name->name); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td class="text-end">
                                            <a href="javascript:void(0);"><i class="bi bi-pencil-square text-success me-2" onclick="editForm( <?php echo e($exam['id']); ?>, '<?php echo e($exam['class_group_exam_name']); ?>', 'class_group_exam', '<?php echo e($exam['education_type_id']); ?>')"></i></a>
                                            <a href="javascript:void(0);"><i class="bi bi-trash2-fill text-danger" onclick="deleteClassGroup(<?php echo e($exam['id']); ?>, <?php echo e($exam['education_type_id']); ?>)"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border-bottom mt-3 pb-3">
                
                <div class="col-md-3 col-sm-6 col-12">
                    <form class="card" method="post" id="boardForm" style=" box-shadow: 0px 0px 5px 1px #ffc10799 !important; ">
                        <?php echo csrf_field(); ?>
                        <?php $__errorArgs = ['boardError'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo e($message); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['boardSuccess'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> <?php echo e($message); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="card-header bg-warning">
                            Qualification
                        </div>
                        <input type="number" name="id" class="d-none" id="board_id" value="0">
                        <input name="form_name" id="boardFormName" class="d-none" value="board_form">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="board_education_type_id" class="form-label">Scholarship Category</label>
                                <select class="form-select form-select-sm" id="board_education_type_id" name="education_type_id" <?php echo e(count($data['educations']) ? '' : 'disabled'); ?> onchange="educationTypeChange(this.value)" required>
                                    <option value=""></option>
                                    <?php $__currentLoopData = $data['educations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($education['id']); ?>"><?php echo e($education['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3" id="board_class_group">
                                <label for="board_class_group_exam" class="form-label">Education Type</label>
                                <select class="form-select form-select-sm" id="board_class_group_exam" name="classes_group_exams_id" disabled required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="board_name_id" class="form-label">Qualification</label>
                                <select class="form-select form-select-sm" multiple id="board_name_id" name="name[]" required>
                                    <?php $__currentLoopData = $data['boards']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boards): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($boards->id); ?>"> <?php echo e($boards->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="btn-group btn-group-sm w-100" role="group">
                                <button type="button" class="btn btn-danger resetbtn" id="boardReset" onclick="resetForm('board')">Reset</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-sm-6 col-12">
                    <div class="card" style=" box-shadow: 0px 0px 5px 1px #ffc10799 !important; ">
                        <div class="card-body" style="max-height: 356px; overflow-y: auto;">
                            <table class="table table-sm datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Scholarship Category</th>
                                        <th scope="col">Education Type</th>
                                        <th scope="col">Qualification</th>
                                        <th scope="col" class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data['gn_exam_agency_board']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($key + 1); ?></th>

                                        <td>
                                            <?php if(!empty($board->education['name'])): ?>
                                            <?php echo e($board->education['name']); ?>

                                            <?php else: ?>
                                            <?php echo e('-'); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($board->classesGroupExam['name'])): ?>
                                            <?php echo e($board->classesGroupExam['name']); ?>

                                            <?php else: ?>
                                            <?php echo e('-'); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($board['board_id'])): ?>
                                            <?php $__currentLoopData = json_decode($board['board_id']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $board1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="commaSeperatedSpan"><?php echo e(\App\Models\BoardAgencyStateModel::find($board1)->name); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <?php echo e('-'); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td class="text-end">
                                            <a href="javascript:void(0);">
                                                <i class="bi bi-pencil-square text-success me-2" onclick="editForm(<?php echo e($board['id']); ?>, '<?php echo e($board['board_id']); ?>', 'board','<?php echo e($board->education_type_id); ?>','','','<?php echo e($board->classes_group_exams_id); ?>')">
                                                </i>
                                            </a>
                                            <a href="javascript:void(0);">
                                                <i class="bi bi-trash2-fill text-danger" onclick="deleteExamAgencyBoard(<?php echo e($board['education_type_id']); ?>,<?php echo e($board['classes_group_exams_id']); ?>,<?php echo e($board['board_id']); ?>,<?php echo e($board['id']); ?>)">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border-bottom mt-3 pb-3">
                
                <div class="col-md-3 col-sm-6 col-12">
                    <form class="card" method="post" id="otherExamForm" style=" box-shadow: 0px 0px 5px 1px #14a413 !important; ">
                        <?php echo csrf_field(); ?>
                        <?php $__errorArgs = ['otherExamError'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo e($message); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['otherExamSuccess'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> <?php echo e($message); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="card-header " style="background-color: #14a413 !important;">
                            Scholarship Opted For
                        </div>
                        <input type="number" name="id" class="d-none" id="otherExam_id" value="0">
                        <input name="form_name" id="boardFormName" class="d-none" value="otherExam_form">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="other_exam_education_type_id" class="form-label">Scholarship Category</label>
                                <select class="form-select form-select-sm" id="other_exam_education_type_id" name="education_type_id" onchange="other_exam_education_type_change(this.value)" <?php echo e(count($data['educations']) ? '' : 'disabled'); ?> required>
                                    <option value=""></option>
                                    <?php $__currentLoopData = $data['educations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($education['id']); ?>"><?php echo e($education['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="education_type_id" class="form-label">Education Type</label>
                                <select class="form-select form-select-sm" id="other_exam_class_group_exam_id" name="classes_group_exams_id" onchange="other_exam_classes_group_exams_change(this.value)" <?php echo e(count($data['educations']) ? '' : 'disabled'); ?> required>
                                    <option value=""></option>
                                    <?php $__currentLoopData = $data['educations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($education['id']); ?>"><?php echo e($education['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="other_exam_agency_board_university_id" class="form-label">Qualification</label>
                                <select class="form-select form-select-sm" id="other_exam_agency_board_university_id" name="agency_board_university_id" <?php echo e(count($data['educations']) ? '' : 'disabled'); ?> required>
                                    <option value=""></option>
                                    <?php $__currentLoopData = $data['educations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($education['id']); ?>"><?php echo e($education['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="other_exam_name_id" class="form-label">Scholarship Opted For</label>
                                <select class="form-select form-select-sm" multiple id="other_exam_name_id_j" name="name[]" required>
                                    <option value=""></option>
                                    <?php $__currentLoopData = $data['gn_other_exam_classes']->unique('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gn_other_exam_classes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gn_other_exam_classes->name); ?>"><?php echo e($gn_other_exam_classes->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="btn-group btn-group-sm w-100" role="group">
                                <button type="button" class="btn btn-danger resetbtn" id="otherExamReset" onclick="resetForm('otherExam')">Reset</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-sm-6 col-12">
                    <div class="card" style=" box-shadow: 0px 0px 5px 1px #14a413 !important; ">
                        <div class="card-body" style="max-height: 435px; overflow-y: auto;">
                            <table class="table table-sm datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Scholarship Category</th>
                                        <th scope="col">Education Type</th>
                                        <th scope="col">Qualification</th>
                                        <th scope="col">Scholarship Opted For</th>
                                        <th scope="col" class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data['other_exam_classes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $other_exam_class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($key + 1); ?></th>
                                        <td>

                                            <?php if(!empty($other_exam_class->education['name'])): ?>
                                            <?php echo e($other_exam_class->education['name']); ?>

                                            <?php else: ?>
                                            <?php echo e('-'); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>

                                            <?php if(!empty($other_exam_class->classesGroupExam['name'])): ?>
                                            <?php echo e($other_exam_class->classesGroupExam['name']); ?>

                                            <?php else: ?>
                                            <?php echo e('-'); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($other_exam_class->boardAgencyState['name'])): ?>
                                            <?php echo e($other_exam_class->boardAgencyState['name']); ?>

                                            <?php else: ?>
                                            <?php echo e('-'); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($other_exam_class['other_exam_id'])): ?>
                                            <?php $__currentLoopData = json_decode($other_exam_class['other_exam_id']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other_exam_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="commaSeperatedSpan"><?php echo e(\App\Models\Gn_OtherExamClassDetailModel::find($other_exam_id)->name); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-end">
                                            <a href="javascript:void(0);"><i class="bi bi-pencil-square text-success me-2" onclick="editForm(<?php echo e($other_exam_class['id']); ?>, '<?php echo e($other_exam_class['other_exam_id']); ?>', 'otherExam' , '<?php echo e($other_exam_class['education_type_id']); ?>','<?php echo e($other_exam_class['agency_board_university_id']); ?>','','<?php echo e($other_exam_class['classes_group_exams_id']); ?>')"></i></a>
                                            <a href="javascript:void(0);"><i class="bi bi-trash2-fill text-danger" onclick="deleteOtherExamClass(<?php echo e($other_exam_class['education_type_id']); ?>,<?php echo e($other_exam_class['classes_group_exams_id']); ?>,<?php echo e($other_exam_class['agency_board_university_id']); ?>)"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border-bottom mt-3 pb-3">
                
                <div class="col-md-3 col-sm-6 col-12">
                    <form class="card" method="post" id="resultSubjectMapForm" style=" box-shadow: 0px 0px 5px 1px #1c26c9 !important; ">
                        <?php echo csrf_field(); ?>
                        <?php $__errorArgs = ['resultSubjectMapFormError'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo e($message); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php $__errorArgs = ['resultSubjectMapFormSuccess'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> <?php echo e($message); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="card-header " style="color:#fff;background-color: #1c26c9 !important;">
                            Scholarship Opted For
                        </div>
                        <input type="number" name="id" class="d-none" id="resultSubjectMapForm_id" value="0">
                        <input name="form_name" id="resultSubjectFormName" class="d-none" value="resultSubjectMapForm">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="other_exam_education_type_id" class="form-label">Scholarship Category</label>
                                <select class="form-select form-select-sm" id="other_exam_education_type_sub_id" name="education_type_id" onchange="other_exam_education_type_change(this.value,'resultMapping')" <?php echo e(count($data['educations']) ? '' : 'disabled'); ?> required>
                                    <option value=""></option>
                                    <?php $__currentLoopData = $data['educations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($education['id']); ?>"><?php echo e($education['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="classes_group_exams_id" class="form-label">Education Type</label>
                                <select class="form-select form-select-sm" id="other_exam_class_group_exam_sub_id" name="classes_group_exams_id" onchange="other_exam_classes_group_exams_sub_change(this.value)" <?php echo e(count($data['educations']) ? '' : 'disabled'); ?> required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="agency_board_university_id" class="form-label">Qualification</label>
                                <select class="form-select form-select-sm" id="other_exam_agency_board_university_sub_id" onchange="other_exam_classes_scholarship_opt_sub_change(this.value)" name="agency_board_university_id" <?php echo e(count($data['educations']) ? '' : 'disabled'); ?> required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="other_exam_name_sub_id" class="form-label">Scholarship Opted For</label>
                                <select class="form-select form-select-sm" multiple id="other_exam_name_sub_id" name="name[]" required>
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="result_subject_mapping_id" class="form-label">Subject`s</label>
                                <select class="form-select form-select-sm" multiple id="result_subject_mapping_id" name="subject_id[]" required>
                                    <option value=""></option>
                                    <?php $__currentLoopData = $data['subjects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="btn-group btn-group-sm w-100" role="group">
                                <button type="button" class="btn btn-danger resetbtn" id="resultSubjectMapFormReset" onclick="resetSubjectMappingForm()">Reset</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-9 col-sm-6 col-12">
                    <div class="card" style=" box-shadow: 0px 0px 5px 1px #1c26c9 !important; ">
                        <div class="card-body" style="max-height: 517px; overflow-y: auto;">
                            <table class="table table-sm datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr.N.</th>
                                        <th scope="col">Scholarship Category</th>
                                        <th scope="col">Education Type</th>
                                        <th scope="col">Qualification</th>
                                        <th scope="col">Scholarship Opted For</th>
                                        <th scope="col" style="text-align: center;">Subjects</th>
                                        <th scope="col" style="text-align: center;">
                                            Subject Max marks
                                        </th>
                                        <th scope="col" style="text-align: center;">Result Excel Sample</th>
                                        <th scope="col" class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data['resultSubjectMappings']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $resultSubjectMapping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($key + 1); ?></th>
                                        <td>

                                            <?php if(!empty($resultSubjectMapping->education['name'])): ?>
                                            <?php echo e($resultSubjectMapping->education['name']); ?>

                                            <?php else: ?>
                                            <?php echo e('-'); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>

                                            <?php if(!empty($resultSubjectMapping->classesGroupExam['name'])): ?>
                                            <?php echo e($resultSubjectMapping->classesGroupExam['name']); ?>

                                            <?php else: ?>
                                            <?php echo e('-'); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($resultSubjectMapping->boardAgencyState['name'])): ?>
                                            <?php echo e($resultSubjectMapping->boardAgencyState['name']); ?>

                                            <?php else: ?>
                                            <?php echo e('-'); ?>

                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <span class="commaSeperatedSpan"><?php echo e(($resultSubjectMapping->scholarshipOptedFor('name'))); ?></span>
                                        </td>

                                        <td>
                                            <span class="commaSeperatedSpan"><?php echo e(($resultSubjectMapping->subjects('name'))); ?></span>

                                        </td>
                                        <td>
                                            <div class="col-md-6 col text-end">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importModal<?php echo e($key+1); ?>">
                                                    Fill Subjects Details
                                                </button>
                                            </div>
                                        </td>
                                        <td><a class="btn btn-success" href="<?php echo e(route('admin.exportMarkFillExcel',encodeId($resultSubjectMapping->id))); ?>"> Generate Student MarkFill Template Excel &nbsp;<i class="bi bi-download text-dark"></i></a>
                                        </td>

                                        <td class="text-end">
                                            <a href="javascript:void(0);"><i class="bi bi-trash2-fill text-danger" onclick="deleteresultSubjectMapFormClass(<?php echo e($resultSubjectMapping->id); ?>)"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Student paper import Subject details start modal -->
<?php $__currentLoopData = $data['resultSubjectMappings']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $resultSubjectMapping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="importModal<?php echo e($key+1); ?>" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="importModalLabel">Subject Max Marks Insert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card-body" style="max-height: 517px; overflow-y: auto;">
            <table class="table table-sm datatable">
                <thead>
                    <tr>
                        <th scope="col">Sr.N.</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Max Marks</th>
                        <th scope="col">Total Questions</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $resultSubjectMapping->subjectPaperDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $subjectPaperDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-subject-id="<?php echo e($subjectPaperDetail->subject_id); ?>" data-subject-mapping-id="<?php echo e($subjectPaperDetail->subject_mapping_id); ?>">
                            <?php echo csrf_field(); ?>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($subjectPaperDetail->subject_name); ?></td>
                            <td>
                                <input style="height: 42px;width:80px;font-size: 16px;text-align: center;" type="number" class="num_digit max-marks-input" name="max_marks" value="<?php echo e($subjectPaperDetail->max_marks); ?>" placeholder="Enter value">
                            </td>
                            <td>
                                <input style="height: 42px;width:80px;font-size: 16px;text-align: center;" type="number" class="num_digit total-questions-input" name="total_questions" value="<?php echo e($subjectPaperDetail->total_questions); ?>" placeholder="Enter value">
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-primary save-btn-mapp">Save</button>
                            </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

 
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script type="text/javascript" src="<?php echo e(asset('js/admineducationtypes.js')); ?>"></script>

<script>
    $('.educations-status-toggle').on('change', function() {
        var courseId = $(this).data('id');
        var isFeatured = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: "<?php echo e(route('toggle.featured')); ?>",
            method: 'POST',
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                id: courseId,
                type: 'educationType',
                is_featured: isFeatured
            },
        
            success: function(response) {
                if (response.status) {
                    success(response.message);
                } else {
                    error(response.message);
                }
            },
            error: function(xhr) {
                error(xhr.responseText);
            }
        });
    });
</script>
<script>
   $(document).ready(function() {
    $('.save-btn-mapp').on('click', function(e) {
        e.preventDefault();

        var $btn = $(this);

        var form = $(this).closest('tr');

        var subjectId = form.data('subject-id');
        var subjectMappingId = form.data('subject-mapping-id');
        var maxMarks = form.find('.max-marks-input').val();
        var totalQuestions = form.find('.total-questions-input').val();

        var formData = new FormData();
        formData.append('subject_id', subjectId);
        formData.append('subjectMapping_id', subjectMappingId);
        formData.append('max_marks', maxMarks);
        formData.append('total_questions', totalQuestions);


        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '<?php echo e(route("admin.subjectPaperDetailsAdd")); ?>',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            contentType: false,
            processData: false,
            success: function(response) {
              if(response.status){
                success(response.message)

                $btn.text('Update')
              }else{
                error(response.message)
              }
            },
            error: function(xhr, status, error) {
                error(xhr.responseText)
            }
        });
    });
});
</script>

<!-- /#page-content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/courses/sholarship_category.blade.php ENDPATH**/ ?>