
<?php $__env->startSection('title'); ?>
Student Exam Center Allotment
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<style>
    .select2-selection__choice {
        color: black !important;
    }

    .selectAllCl .dt-column-order {
        display: none;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default m-t-15">
            <div class="panel-heading m-2 ">
                <h5>Student Exam Center Allotment</h5>
            </div>
            <div class="panel-body px-2">
                <div class="card alert">
                    <div class="card-header">
                        <form action="#" method="post" id="alotmentForm">
                            <?php echo csrf_field(); ?>
                            <div class="row" style="margin-bottom: 15px">
                                <div class="col-md-3 col mb-3">
                                    <label class="form-label" for="district-ids">City</label>
                                    <select name="district_id[]" multiple class="form-control form-select" id="district-ids">
                                        <option value="">--Select City--</option>
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->id); ?>" <?php echo e((is_array(request()->district_id) && in_array($city->id, request()->district_id)) ? 'selected' : ''); ?>>
                                            <?php echo e($city->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['district_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-3 col mb-3">
                                    <label class="form-label" for="education_name">Scholarship Types</label>
                                    <select class="form-select form-select-sm" multiple id="education_name" onchange="scholarshipTypesChange(this.value)" name="name[]">
                                        <?php $__currentLoopData = $scholarshipTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scholarship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($scholarship->id); ?>" <?php echo e(is_array(request()->name) && in_array($scholarship->id, request()->name) ? 'selected' : ''); ?>>
                                            <?php echo e($scholarship->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-md-2 col mb-3">
                                    <label for="class">Class</label>
                                    <select class="form-select form-select-sm" multiple id="board_name_id" name="class[]">
                                        <option value=""> --Select Class-- </option>
                                        <?php if(!empty(request()->class)): ?>
                                        <?php $__currentLoopData = $preloadedClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>" <?php echo e(in_array($class->id, request()->class) ? 'selected' : ''); ?>>
                                            <?php echo e($class->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-md-2 col mb-3">
                                    <label class="form-label" for="genders-filters">Gender</label>
                                    <select name="gender[]" class="form-control form-select" id="genders-filters" multiple>
                                        <option value="">--Select Gender--</option>
                                        <option value="Male" <?php echo e((is_array(request()->gender) && in_array('Male', request()->gender)) ? 'selected' : ''); ?>>Male</option>
                                        <option value="Female" <?php echo e((is_array(request()->gender) && in_array('Female', request()->gender)) ? 'selected' : ''); ?>>Female</option>
                                        <option value="Transgender" <?php echo e((is_array(request()->gender) && in_array('Transgender', request()->gender)) ? 'selected' : ''); ?>>Transgender</option>
                                    </select>
                                    <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-2 col mb-3 ml-auto">
                                    <label class="form-label" for="">&nbsp;</label> <br>
                                    <button type="button" class="btn btn-primary ">Filter</button> &nbsp;&nbsp;
                                    <a href="/administrator/exam_center_allotment" class="btn btn-danger " type="button" style="text-decoration: none;">Reset</a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label for="form-label">Exam Center</label>
                                    <div>
                                        <select class="customSelect w-100" id="exam_center" name="exam_center">
                                            <!-- <option value="">--Select Center--</option> -->
                                            <option data-display="Select" value="">Select center</option>

                                            <?php $__currentLoopData = $examCenters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $examCenter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($examCenter->id); ?>" <?php echo e($examCenter->id == request()->exam_center ? 'selected' : ''); ?>>
                                                <?php echo e($examCenter->city?->name); ?> : <?php echo e($examCenter->center_name); ?>

                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label for="form-label">Number of Student</label>
                                    <div>
                                        <select class="customSelect w-100" id="student_number" name="student_number">
                                            <!-- <option value="">--Select Student Number--</option> -->
                                            <option data-display="Select" value="">Select</option>

                                            <?php for($i = 50; $i <= 400; $i +=50): ?> <option value="<?php echo e($i); ?>" <?php echo e($i == request()->student_number ? 'selected' : ''); ?>>
                                                0 &nbsp;- &nbsp;<?php echo e($i); ?>

                                                </option>
                                                <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label class="form-label" for="exam_date_time">Date and Time X</label>
                                    <input class="form-control" id="flatpickrInstance" onchange="validateDateTime()" type="datetime-local" name="exam_date_time">
                                </div>
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label for="form-label">Test Duration</label>
                                    <div>
                                        <select class="customSelect w-100" id="exam_mins" name="exam_mins">
                                            <!-- <option value="">--Select Test Duration--</option> -->
                                            <option data-display="Select" value="">Select duration</option>

                                            <?php for($i = 30; $i <= 240; $i +=15): ?> <option value="<?php echo e($i); ?>" <?php echo e($i == request()->exam_mins ? 'selected' : ''); ?>>
                                                <?php echo e($i); ?> Minutes
                                                </option>
                                                <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label for="form-label">AdmitCard Before</label>
                                    <div>
                                        <select class="customSelect w-100" id="admitcard_before" name="admitcard_before">
                                            <option data-display="Select" value="">Select days</option>
                                            <!-- <option data-display="Select">Select days</option> -->
                                            <!-- $i == request()->admitcard_before ? 'selected' : '' -->
                                            <?php for($i = 0; $i <= 7; $i++): ?>
                                                <option value="<?php echo e($i); ?>">
                                                <?php echo e($i); ?> Days
                                                </option>
                                                <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label for="form-label">&nbsp;</label>
                                    <button id="examCenterAllotments" type="submit" class="btn btn-success btn-block">Allot Test Center</button>
                                </div>

                                <div class="col-md-4 col-lg-3 mb-2">
                                    <label for="form-label">&nbsp;</label>
                                    <button id="allotCenterToAll" type="button" class="btn btn-danger btn-block">Allot Center to All</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="card-header text-end">
                                <button class="btn btn-success" id="updateAdmitCardStatusAll">Issue Admit Card All</button>
                                <button class="btn btn-danger" id="StopAdmitCardStatusAll">Stop AdmitCard All</button>
                            </div>
                            <table class="table table-bordered datatablecll">
                                <thead>
                                    <tr>
                                        <th class="selectAllCl text-center">Issued AdmitCard <br> <input type="checkbox" id="selectAll"> </th>
                                        <th class="text-center">Sr. No</th>
                                        <th>Name(Gender) <br> DOB</th>
                                        <th>Email/Mobile</th>
                                        <th>Application Code</th>
                                        <th>Roll No</th>
                                        <th>Scholarship Category</th>
                                        <th>Scholarship Opted For</th>
                                        <th>City</th>
                                        <th>Exam Center</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <?php
                                        $studCode = $student->studentCode->sortBy('created_at')->last();
                                        ?>
                                        <td scope="row" class="text-center">
                                            <?php if($studCode?->examCenter): ?>
                                            <input type="checkbox" class="rowCheckbox" data-studcode_id="<?php echo e($studCode->id); ?>" value="" <?php echo e($studCode?->issued_admitcard ? 'checked' : ''); ?>>
                                            <?php endif; ?>
                                        </td>
                                        <td scope="row"><?php echo e($loop->index + 1); ?></td>
                                        <td><?php echo e($student->name); ?> (<?php echo e(substr($student->gender,0,1)); ?>) <br><?php echo e($student->dob ?Carbon\Carbon::parse($student->dob)->format('d-m-Y') : ''); ?></td>
                                        <td><?php echo e($student->email); ?> <br>
                                            <?php echo e($student->mobile); ?>

                                        </td>
                                        <td><?php echo e($studCode?->application_code ? $studCode?->application_code : 'NA'); ?></td>
                                        <td><?php echo e($studCode?->roll_no); ?></td>
                                        <td><?php echo e($student->scholarShipCategory?->name ?? 'N/A'); ?></td>
                                        <td>
                                            <?php if(!empty($student->qualifications) && $student->qualifications?->name): ?>
                                            <span style="color:red;"><?php echo e($student->qualifications?->name); ?> </span>
                                            <br>
                                            <?php endif; ?>
                                            <?php echo e($student->scholarShipOptedFor?->name ?? 'N/A'); ?>

                                        </td>
                                        <td><?php echo e($student->district?->name); ?></td>
                                        <td><?php echo e($studCode?->examCenter?->center_name); ?></td>

                                        <td>
                                            <?php if($studCode?->examCenter && $studCode?->issued_admitcard): ?>
                                            <a href="#" class="btn btn-danger changeStatus" data-studcode_id="<?php echo e($studCode->id); ?>" data-status="0">Stop AdmitCard</a>
                                            <?php elseif($studCode?->examCenter): ?>
                                            <a href="#" class="btn btn-success changeStatus" data-studcode_id="<?php echo e($studCode->id); ?>" data-status="1">Issue AdmitCard</a>
                                            <?php endif; ?>
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

<script type="text/javascript" src="<?php echo e(asset('js/admineducationtypes.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('#allotCenterToAll').on('click', function(e) {
            if ($('#exam_center').val() === "") {
                return alert("Please select an Exam Center.");
            }
            if ($('#flatpickrInstance').val() === "") {
                return alert("Please select the Date and Time.");
            }
            if ($('#exam_mins').val() === "") {
                return alert("Please select test duration.");
            }
            if ($('#admitcard_before').val() === "") {
                return alert("Please select admin card before show.");
            }
            if (confirm('Are you sure to allot all the students to selected exams center?')) {
                console.log('exam center:- ', $('#exam_center').val())
                var url = "/administrator/exam_center_allot_to_all/" + $('#exam_center').val() + '?exam_date_time=' + $('#flatpickrInstance').val() + '&exam_mins=' + $('#exam_mins').val() + '&admitcard_before=' + $('#admitcard_before').val();

                if ($('#student_number').val() != "") {
                    url +='&exam_date_time=' + $('#student_number').val()
                }
            }
        })
        $('#alotmentForm').on('submit', function(e) {
            e.preventDefault();
            // alert('click alotmentForm submit')
            var isValid = true;
            var errorMessage = "";
            // $(this).attr('disabled', true);

            if ($('#exam_center').val() === "") {
                isValid = false;
                errorMessage += "Please select an Exam Center.\n";
            }

            if ($('#student_number').val() === "") {
                isValid = false;
                errorMessage += "Please select the Number of Students.\n";
            }

            if ($('#flatpickrInstance').val() === "") {
                isValid = false;
                errorMessage += "Please select the Date and Time.\n";
            }

            if (!isValid) {
                // $(this).attr('disabled', false);
                alert(errorMessage);
                return;
            } else {
                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: "<?= route('admin.studentExamCenterAllotment') ?>",
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status) {
                            success(response.message);
                            location.reload();
                        } else {
                            alert(response.message)
                        }
                    },
                    error: function(xhr) {
                        alert(xhr.responseText)
                    }
                });
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#selectAll').click(function() {
            $('.rowCheckbox').prop('checked', this.checked);
        });

        $('.rowCheckbox').change(function() {
            if ($('.rowCheckbox:checked').length == $('.rowCheckbox').length) {
                $('#selectAll').prop('checked', true);
            } else {
                $('#selectAll').prop('checked', false);
            }
            updateAdmitCardStatus([$(this).data('studcode_id')], $(this).is(':checked') ? 1 : 0);
        });

        $('.changeStatus').click(function(e) {
            e.preventDefault();
            var studcodeId = $(this).data('studcode_id');
            var status = $(this).data('status');
            updateAdmitCardStatus([studcodeId], status);
        });

        $('#updateAdmitCardStatusAll').click(function(e) {
            e.preventDefault();
            var studcodeIds = [];
            $('.rowCheckbox:checked').each(function() {
                studcodeIds.push($(this).data('studcode_id'));
            });
            if (studcodeIds.length === 0) {
                error('Please select at least one student.');
                return;
            }
            updateAdmitCardStatus(studcodeIds, 1);
        });

        $('#StopAdmitCardStatusAll').click(function(e) {
            e.preventDefault();
            var studcodeIds = [];
            $('.rowCheckbox:checked').each(function() {
                studcodeIds.push($(this).data('studcode_id'));
            });
            if (studcodeIds.length === 0) {
                error('Please select at least one student.');
                return;
            }
            updateAdmitCardStatus(studcodeIds, 0);
        });

        function updateAdmitCardStatus(studcodeIds, status) {
            $.ajax({
                url: '<?php echo e(route("update.admitcard.status")); ?>',
                method: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    studcode_ids: studcodeIds,
                    status: status
                },
                success: function(response) {
                    if (response.status) {
                        success(response.message);
                        location.reload();
                    }
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $("#flatpickrInstance").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i:s",
        altInput: true,
        altFormat: "G:i K - l - j M, Y",
        minDate: "today"
    });
</script>
<script src="/website/plugin/niceSelect/js/nice-select2.js"></script>
<link rel="stylesheet" href="/website/plugin/niceSelect/css/nice-select2.css">
<style>
    #exam_center,
    #student_number,
    #admitcard_before,
    #exam_mins {
        display: none;
    }

    /* .customSelect {
        overflow: hidden;
    } */
    .nice-select .current {
        position: relative;
        display: flex;
        overflow: hidden;
    }
</style>
<script>
    NiceSelect.bind(document.getElementById('exam_center'), {
        searchable: true
    });
    NiceSelect.bind(document.getElementById('student_number'));
    NiceSelect.bind(document.getElementById('admitcard_before'));
    NiceSelect.bind(document.getElementById('exam_mins'));
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/01D9961CD1E189D0/BWS/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/student_exam_center_allot.blade.php ENDPATH**/ ?>