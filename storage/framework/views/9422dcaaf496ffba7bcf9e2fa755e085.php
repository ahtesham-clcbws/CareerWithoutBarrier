
<?php $__env->startSection('content'); ?>
<style>
    .select2-selection__choice__display {
        color: black;
    }
</style>
<div class="container py-3">
    <div class="dashboard-container mb-5">
        
        <div class="row border-bottom pb-2">
            
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Add / Update Subject
                    </div>
                    <form class="card-body" method="post" id="subject_form">
                        <?php $__errorArgs = ['subjectError'];
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
                        <?php $__errorArgs = ['subjectSuccess'];
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
                        <?php echo csrf_field(); ?>
                        <input type="number" name="id" class="d-none" id="subject_id" value="0">
                        <input name="form_name" id="subject_form_name" class="d-none" value="subject_form">
                        <div class="mb-3">
                            <label for="part_name" class="form-label">Classes</label>
                            <select class="form-select form-select-sm" <?php echo e(count($data['class_data']) > 0 ? '' : 'disabled'); ?> id="subject_class_id" name="class_id" required>
                                <option value=""></option>
                                <?php $__currentLoopData = $data['class_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $class_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class_data['id']); ?>"><?php echo e($class_data['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="subject_name" class="form-label"> Name / Title (No Special characters)</label>
                            <select class="form-select form-select-sm" multiple id="subject_name" name="name[]" required>
                                <?php $__currentLoopData = $data['subjects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subjects->id); ?>"><?php echo e($subjects->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="btn-group btn-group-sm w-100" role="group">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-danger resetbtn" id="subject_reset" onclick="resetForm('subject')">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-md-9 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Subject</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['subject_data_display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subject_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($key + 1); ?></th>
                                    <td><?php if(isset($subject_data->class['name'])): ?> <?php echo e($subject_data->class['name']); ?> <?php endif; ?></td>
                                    <td>
                                        <?php if(!empty($subject_data['subject_id'])): ?>
                                        <?php $__currentLoopData = json_decode($subject_data['subject_id']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="commaSeperatedSpan"><?php echo e(\App\Models\Subject::find($subject_id)?->name); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);"><i class="bi bi-pencil-square text-success me-2" onclick="editForm(<?php echo e($subject_data['id']); ?>, '<?php echo e($subject_data['subject_id']); ?>', 'subject','','',<?php echo e($subject_data->classes_group_exams_id); ?>)"></i></a>
                                        <a href="javascript:void(0);"><i class="bi bi-trash2-fill text-danger" onclick="deleteSubject(<?php echo e($subject_data['id']); ?>)"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="row border-bottom pb-2 mt-2">
            
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Add / Update Subject Part
                    </div>
                    <form class="card-body" method="post" id="part_form">
                        <?php $__errorArgs = ['partError'];
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
                        <?php $__errorArgs = ['partSuccess'];
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
                        <?php echo csrf_field(); ?>
                        <input type="number" name="id" class="d-none" id="part_id" value="0">
                        <input name="form_name" id="part_form_name" class="d-none" value="part_form">
                        <div class="mb-3">
                            <label for="part_name" class="form-label">Classes</label>
                            <select class="form-select form-select-sm" id="subject_part_class_id" name="class_id" onchange="partClassChange(this.value)" required>
                                <option value=""></option>
                                <?php $__currentLoopData = $data['class_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $class_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class_data['id']); ?>"><?php echo e($class_data['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="part_name" class="form-label">Subject</label>
                            <select class="form-select form-select-sm" <?php echo e(count($data['subjects']) > 0 ? '' : 'disabled'); ?> id="part_subject_id" name="subject_id" required>
                                <option value=""></option>
                                <?php $__currentLoopData = $data['subjects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subject['id']); ?>"><?php echo e($subject['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="part_name_id" class="form-label"> Part Name</label>
                            <select class="form-select form-select-sm" multiple id="part_name_id" name="name[]">
                                <?php $__currentLoopData = $data['gn_subject_parts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gn_subject_parts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($gn_subject_parts->id); ?>"><?php echo e($gn_subject_parts->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="btn-group btn-group-sm w-100" role="group">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-danger resetbtn" id="part_reset" onclick="resetForm('part')">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-md-9 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body" style="max-height: 356px; overflow-y: auto;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Subject Part</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['subject_parts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subject_part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($key + 1); ?></th>
                                    <td>
                                        <?php if(!empty($subject_part['classes_group_exams_id'])): ?>
                                        <?php if(isset($subject_part->class['name'])): ?> <?php echo e($subject_part->class['name']); ?> <?php endif; ?>
                                        <?php else: ?>
                                        <?php echo e('-'); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($subject_part->subject['name'])): ?>
                                        <?php echo e($subject_part->subject['name']); ?>

                                        <?php else: ?>
                                        <?php echo e('-'); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(!empty($subject_part['subject_part_id'])): ?>
                                        <?php $__currentLoopData = json_decode($subject_part['subject_part_id']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject_part_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="commaSeperatedSpan"><?php echo e(\App\Models\SubjectPart::find($subject_part_id)->name); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);"><i class="bi bi-pencil-square text-success me-2" onclick="editForm(<?php echo e($subject_part['id']); ?>, '<?php echo e($subject_part['subject_part_id']); ?>', 'part', '<?php echo e($subject_part['subject_id']); ?>','',<?php echo e($subject_part['classes_group_exams_id']); ?>)"></i></a>
                                        <a href="javascript:void(0);"><i class="bi bi-trash2-fill text-danger" onclick="deleteSubjectPart(<?php echo e($subject_part['subject_id']); ?>,<?php echo e($subject_part['id']); ?>)"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row border-bottom pb-2 mt-2">
            
            <div class="col-md-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        Add / Update Chapter
                    </div>
                    <form class="card-body" method="post" id="lesson_form">
                        <?php $__errorArgs = ['lessonError'];
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
                        <?php $__errorArgs = ['lessonSuccess'];
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
                        <?php echo csrf_field(); ?>
                        <input type="number" name="id" class="d-none" id="lesson_id" value="0">
                        <input name="form_name" id="lesson_form_name" class="d-none" value="lesson_form">
                        <div class="mb-3">
                            <label for="part_name" class="form-label">Classes</label>
                            <select class="form-select form-select-sm" id="lession_class_id" onchange="lessionClassChange(this.value)" name="class_id" required>
                                <option value=""></option>
                                <?php $__currentLoopData = $data['class_data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $class_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class_data['id']); ?>"><?php echo e($class_data['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="part_name" class="form-label">Subject</label>
                            <select class="form-select form-select-sm" onchange="lessonSubjectChange(this.value)" <?php echo e(count($data['subjects']) > 0 ? '' : 'disabled'); ?> id="lesson_subject_id" name="subject_id" required>
                                <option value=""></option>
                                <?php $__currentLoopData = $data['subjects']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subject['id']); ?>"><?php echo e($subject['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="part_name" class="form-label">Subject Part</label>
                            <select class="form-select form-select-sm" id="lesson_subject_part_id" name="subject_part_id" disabled required>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="lesson_name_id" class="form-label"> Chapter Name</label>
                            <select class="form-select form-select-sm" multiple id="lesson_name_id" name="name[]" required>
                                <?php $__currentLoopData = $data['gn_subject_part_lessons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gn_subject_part_lessons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($gn_subject_part_lessons->id); ?>"><?php echo e($gn_subject_part_lessons->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                                <label for="lesson_name" class="form-label">Chapter Name</label>
                                <input type="text" name="name" class="form-control form-control-sm" id="lesson_name" required>
                            </div> -->
                        <div class="btn-group btn-group-sm w-100" role="group">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-danger resetbtn" id="lesson_reset" onclick="resetForm('lesson')">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-md-9 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body" style="max-height: 433px; overflow-y: auto;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Subject Part</th>
                                    <th scope="col">Chapter</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data['subject_part_lessons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subject_part_lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($key + 1); ?></th>
                                    <td><?php if(isset($subject_part_lesson->class['name'])): ?><?php echo e($subject_part_lesson->class['name']); ?> <?php endif; ?></td>
                                    <td><?php echo e($subject_part_lesson->subject['name']); ?></td>
                                    <td><?php echo e($subject_part_lesson->subject_part['name']); ?></td>
                                    <td>
                                        <?php if(!empty($subject_part_lesson['chapter_id'])): ?>
                                        <?php $__currentLoopData = json_decode($subject_part_lesson['chapter_id']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="commaSeperatedSpan"><?php echo e(\App\Models\SubjectPartLesson::find($chapter_id)->name); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-end">
                                        <a href="javascript:void(0);"><i class="bi bi-pencil-square text-success me-2" onclick="editForm(<?php echo e($subject_part_lesson['id']); ?>, '<?php echo e($subject_part_lesson['chapter_id']); ?>' , 'lesson', '<?php echo e($subject_part_lesson['subject_id']); ?>', '<?php echo e($subject_part_lesson['subject_part_id']); ?>',<?php echo e($subject_part_lesson['classes_group_exams_id']); ?>)"></i></a>
                                        <a href="javascript:void(0);"><i class="bi bi-trash2-fill text-danger" onclick="deleteSubjectPartChapter(<?php echo e($subject_part_lesson['subject_id']); ?>,<?php echo e($subject_part_lesson['subject_part_id']); ?>,<?php echo e($subject_part_lesson['id']); ?>)"></i></a>
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
<script type="text/javascript" src="<?php echo e(asset('js/adminsubjects.js?v=6')); ?>"></script>

<!-- /#page-content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/courses/subjects.blade.php ENDPATH**/ ?>