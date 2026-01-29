function inititateSelect2() {

    $("#education_type_id").select2({
        placeholder: "Scholarship Category",
        allowClear: true
    });
    $("#class_boards").select2({
        placeholder: "Board / State / Agency",
        allowClear: true,
        
    });
    $("#class_other_exam_detail").select2({
        placeholder: "  jects",
        allowClear: true,
        
    });
    $("#class_group_exam").select2({
        placeholder: "Subjects",
        allowClear: true,
        
    });
    // $("#education_name").select2({
    //     placeholder: "Scholarship Category",
    //     allowClear: true,
    // });
    $("#class_group_exam_name").select2({
        placeholder: "Education Type",
        allowClear: true,
        tags: true
    });
    $("#board_name").select2({
        placeholder: "Enter Qualification",
        allowClear: true,
        tags: true
    });
    $("#district-ids").select2({
        placeholder: "City Select",
        allowClear: true,
        
    });
    $("#genders-filters").select2({
        placeholder: "Gender Select",
        allowClear: true,
        
    });
    $("#other_exam_name").select2({
        placeholder: "Scholarship Opted For",
        allowClear: true,
        tags: true
    });

    $("#other_exam_name_sub_id").select2({
        placeholder: "Scholarship Opted For",
        allowClear: true,
        
    });


    $("#result_subject_mapping_id").select2({
        placeholder: "Subject",
        allowClear: true,
        
    });
}
inititateSelect2();

var value = $("#class_group_exam_name").html();

if ($('#class_group_exam_id').val() == 0) {
    $("#class_group_exam_name").empty();
    inititateSelect2();
}

var other_exam_name_id = $("#other_exam_name_id").html();

if ($("#otherExam_id").val() == 0) {
    $("#other_exam_name_id").empty();
    inititateSelect2();
}

function resetForm(formName) {
    $('#' + formName + 'Form')[0].reset();
    $('#' + formName + '_id').val(0);
    
    // Trigger change for Select2 elements if any
    $('#' + formName + 'Form').find('select').val('').trigger('change');
    
    // Hide reset button
    $('#' + formName + 'Reset').hide();
}

function resetSubjectMappingForm() {
    $('#resultSubjectMapForm')[0].reset();
    $('#resultSubjectMapForm_id').val(0);
    $('#resultSubjectMapForm').find('select').val('').trigger('change');
    $('#resultSubjectMapFormReset').hide();
}

function editForm(id, name, formName, education = 0, boards = '', subjects = '', class_exam = '') {
    $('#' + formName + '_id').val(id);
    
    if (formName == 'class_group_exam' || formName == 'board') {
        const $idField = $('#' + formName + '_id');
        const $nameField = $('#' + formName + '_name');
        
        $idField.val(id);
        if ($nameField.is('select') && $nameField.attr('multiple')) {
            try {
                // Try parsing as JSON first (for IDs)
                var values = JSON.parse(name);
                $nameField.val(values).trigger('change');
            } catch (e) {
                // Fallback to splitting by comma (for names)
                var values = name ? name.split(',').map(s => s.trim()) : [];
                $nameField.val(values).trigger('change');
            }
        } else {
            $nameField.val(name);
        }

        if (formName == 'class_group_exam') {
            $('#exam_education_type_id').val(education).trigger('change');
        } else if (formName == 'board') {
            $('#board_education_type_id').val(education).trigger('change');
            educationTypeChange(education, class_exam).then(() => {
                $('#board_class_group_exam').val(class_exam).trigger('change');
            });
        }
        $('#' + formName + 'Reset').show();
        return;
    }

    // Default handling for other forms
    var $nameField = $('#' + formName + '_name');
    if ($nameField.is('input')) {
        $nameField.val(name);
    } else if ($nameField.is('select')) {
        try {
            var parsedValues = JSON.parse(name);
            $nameField.val(parsedValues).trigger('change');
        } catch (e) {
            $nameField.val(name).trigger('change');
        }
    }

    if (formName == 'otherExam' || formName == 'resultSubjectMapForm') {
        const idPrefix = formName == 'otherExam' ? 'other_exam' : 'other_exam'; // they share prefix for some fields
        const isSub = formName == 'resultSubjectMapForm';
        const suffix = isSub ? '_sub_id' : '_id';

        $('#' + formName + '_id').val(id);
        
        if (!isSub) {
            var $otherExamNameField = $('#other_exam_name');
            try {
                var values = JSON.parse(name);
                $otherExamNameField.val(values).trigger('change');
            } catch (e) {
                var values = name ? name.split(',').map(s => s.trim()) : [];
                $otherExamNameField.val(values).trigger('change');
            }
            $('#other_exam_education_type_id').val(education).trigger('change');
            other_exam_education_type_change(education).then(() => {
                $('#other_exam_class_group_exam' + suffix).val(class_exam).trigger('change');
                return other_exam_classes_group_exams_change(class_exam);
            }).then(() => {
                $('#other_exam_agency_board_university' + suffix).val(boards).trigger('change');
            });
        } else {
            // Result Subject Mapping Form
            $('#other_exam_education_type_sub_id').val(education).trigger('change');
            
            other_exam_education_type_change(education, 'resultMapping').then(() => {
                $('#other_exam_class_group_exam_sub_id').val(class_exam).trigger('change');
                return other_exam_classes_group_exams_sub_change(class_exam);
            }).then(() => {
                $('#other_exam_agency_board_university_sub_id').val(boards).trigger('change');
                return other_exam_classes_scholarship_opt_sub_change(boards);
            }).then(() => {
                try {
                    var parsedOpted = (typeof name === 'string' && name.startsWith('[')) ? JSON.parse(name) : name;
                    $('#other_exam_name_sub_id').val(parsedOpted).trigger('change');
                } catch(e) { $('#other_exam_name_sub_id').val(name).trigger('change'); }
                
                try {
                    var parsedSubjects = (typeof subjects === 'string' && subjects.startsWith('[')) ? JSON.parse(subjects) : subjects;
                    $('#result_subject_mapping_id').val(parsedSubjects).trigger('change');
                } catch(e) { $('#result_subject_mapping_id').val(subjects).trigger('change'); }
            });
        }

        $('#' + formName + 'Reset').show();
        return;
    }
    if (formName == 'class') {
        $('#education_type_id').val(education);
        $('#class_boards').val(JSON.parse(boards));
        $('#class_subjects').val(JSON.parse(subjects));
        inititateSelect2();
    }
    $('#' + formName + 'Reset').show();
}

async function educationTypeChange(id, class_exam) {
    var formData = new FormData();
    formData.append('form_name', 'get_class_group_exam');
    formData.append('education_type_id', id);
    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    }).done(function (data) {
        if (data && data.success) {
            const class_group_exam = data.message;
            var options = '<option value=""></option>';
            if (class_group_exam.length > 0) {
                $(class_group_exam).each(function (index, item) {
                    options += '<option value="' + item.id + '" ' + (item.id == class_exam ? "selected" : "") + '>' + item.name + '</option>';
                });
                $('#board_class_group_exam').removeAttr('disabled');
            } else {
                $('#board_class_group_exam').val('');
                $('#board_class_group_exam').attr('disabled', 'disabled');
                alert('No Class/ Group/ Exam Name in this Education Type, please select another, or add some.');
            }
            $('#board_class_group_exam').html(options);
        } else {
            alert(data.message);
        }
    }).fail(function (data) {
        console.log(data);
    });
}

async function other_exam_education_type_change(id, class_exam) {

    if (class_exam == 'resultMapping') {
        var $educationTypeAdd = $('#other_exam_class_group_exam_sub_id');
    } else {
        var $educationTypeAdd = $('#other_exam_class_group_exam_id');
    }
    var formData = new FormData();
    formData.append('form_name', 'get_class_group_exam');
    formData.append('education_type_id', id);
    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    }).done(function (data) {
        if (data && data.success) {
            const class_group_exam = data.message;
            var options = '<option value=""></option>';
            if (class_group_exam.length > 0) {
                $(class_group_exam).each(function (index, item) {
                    options += '<option value="' + item.id + '" ' + (item.id == class_exam ? "selected" : "") + '>' + item.name + '</option>';
                });
                $educationTypeAdd.removeAttr('disabled');
            } else {
                $educationTypeAdd.val('');
                $educationTypeAdd.attr('disabled', 'disabled');
                error('No Class/ Group/ Exam Name in this Education Type, please select another, or add some.');
            }
            $educationTypeAdd.html(options);
        } else {
            error(data.message);
        }
    }).fail(function (data) {
        console.log(data);
    });

    if (class_exam && class_exam != 'resultMapping') {
        other_exam_classes_group_exams_change(class_exam);
        other_exam_classes_group_exams_sub_change(class_exam);
    }
}

async function other_exam_classes_group_exams_change(id, boards) {
    var education_type_id = $("#other_exam_education_type_id").val();
    var formData = new FormData();
    formData.append('form_name', 'get_agency_board_university');
    formData.append('education_type_id', education_type_id);
    formData.append('classes_group_exams_id', id);
    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    }).done(function (data) {
        if (data && data.success) {
            const agency_board_university = data.message;
            var options = '<option value=""></option>';
            if (agency_board_university.length > 0) {
                $(agency_board_university).each(function (index, item) {
                    options += '<option value="' + item.id + '" ' + (item.id == boards ? "selected" : "") + '>' + item.name + '</option>';
                });
                $('#other_exam_agency_board_university_id').removeAttr('disabled');
            } else {
                $('#other_exam_agency_board_university_id').val('');
                $('#other_exam_agency_board_university_id').attr('disabled', 'disabled');
                alert('Exam Agency/ Board/ University in this Class/ Group/ Exam Name, please select another, or add some.');
            }
            $('#other_exam_agency_board_university_id').html(options);
        } else {
            alert(data.message);
        }
    }).fail(function (data) {
        console.log(data);
    });
}

async function other_exam_classes_group_exams_sub_change(id, boards) {

    var education_type_id = $("#other_exam_education_type_sub_id").val();
    var formData = new FormData();
    formData.append('form_name', 'get_agency_board_university');
    formData.append('education_type_id', education_type_id);
    formData.append('classes_group_exams_id', id);
    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    }).done(function (data) {
        if (data && data.success) {
            const agency_board_university = data.message;
            var options = '<option value=""></option>';
            if (agency_board_university.length > 0) {
                $(agency_board_university).each(function (index, item) {
                    options += '<option value="' + item.id + '" ' + (item.id == boards ? "selected" : "") + '>' + item.name + '</option>';
                });
                $('#other_exam_agency_board_university_sub_id').removeAttr('disabled');
            } else {
                $('#other_exam_agency_board_university_sub_id').val('');
                $('#other_exam_agency_board_university_sub_id').attr('disabled', 'disabled');
                alert('Exam Agency/ Board/ University in this Class/ Group/ Exam Name, please select another, or add some.');
            }
            $('#other_exam_agency_board_university_sub_id').html(options);
        } else {
            alert(data.message);
        }
    }).fail(function (data) {
        console.log(data);
    });
}

async function other_exam_classes_scholarship_opt_sub_change(id, boards) {
    var scholarshipCat = $("#other_exam_education_type_sub_id").val();
    var educationType = $("#other_exam_class_group_exam_sub_id").val();
    var qualification = $("#other_exam_agency_board_university_sub_id").val();

    var formData = new FormData();
    formData.append('form_name', 'get_agency_board_qualification');
    formData.append('scholarshipCat', scholarshipCat);
    formData.append('educationType', educationType);
    formData.append('qualification', qualification);
    formData.append('classes_group_exams_id', id);

    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    }).done(function (data) {
        if (data && data.success) {
            const agency_board_university = data.message;
            var options = '<option value=""></option>';
            if (agency_board_university.length > 0) {
                $(agency_board_university).each(function (index, item) {
                    options += '<option value="' + item.id + '" ' + (item.id == boards ? "selected" : "") + '>' + item.name + '</option>';
                });
                $('#other_exam_name_sub_id').removeAttr('disabled');
            } else {
                $('#other_exam_name_sub_id').val('');
                $('#other_exam_name_sub_id').attr('disabled', 'disabled');
                alert('Exam Agency/ Board/ University in this Class/ Group/ Exam Name, please select another, or add some.');
            }
            $('#other_exam_name_sub_id').html(options);
        } else {
            alert(data.message);
        }
    }).fail(function (data) {
        console.log(data);
    });
}

async function quickAddEducationTypeChange(id) {
    var formData = new FormData();
    formData.append('form_name', 'get_class_group_exam');
    formData.append('education_type_id', id);
    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (data) {
        if (data && data.success) {
            const class_group_exam = data.message;
            var options = '<option value=""></option>';
            if (class_group_exam.length > 0) {
                $(class_group_exam).each(function (index, item) {
                    options += '<option value="' + item.id + '">' + item.name + '</option>';
                });
                $('#class_group_exam').removeAttr('disabled');
            } else {
                $('#class_group_exam').val('');
                // $('#class_group_exam').attr('disabled', 'disabled');
                // alert('No Class/ Group/ Exam Name in this Education Type, please select another, or add some.');
            }
            $('#class_group_exam').html(options);
        } else {
            alert(data.message);
        }
    }).fail(function (data) {
        console.log(data);
    });
}

async function classes_group_exams_change(id) {
    var classes_group_exams_id = $('#class_group_exam').val();
    var education_type_id = $("#education_type_id").val();

    var formData = new FormData();
    formData.append('form_name', 'gn_get_agency_board_university');
    formData.append('education_type_id', education_type_id);
    for (let i = 0; i < classes_group_exams_id.length; i++) {
        formData.append('classes_group_exams_id[]', classes_group_exams_id[i]);
    }

    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (data) {
        if (data && data.success) {
            const agency_board_university = data.message;
            var options = '<option value=""></option>';
            if (agency_board_university.length > 0) {
                $(agency_board_university).each(function (index, item) {
                    options += '<option value="' + item.id + '">' + item.name + '</option>';
                });
                $('#class_boards').removeAttr('disabled');
            } else {
                $('#class_boards').val('');
                // $('#class_boards').attr('disabled', 'disabled');
                // alert('Exam Agency/ Board/ University in this Class/ Group/ Exam Name, please select another, or add some.');
            }
            $('#class_boards').html(options);
        } else {
            alert(data.message);
        }
    }).fail(function (data) {
        console.log(data);
    });
}

async function classes_exams_board_change(id) {

    var education_type_id = $("#education_type_id").val();
    var classes_group_exams_id = $('#class_group_exam').val();
    var class_boards_id = $('#class_boards').val();

    var formData = new FormData();
    formData.append('form_name', 'get_other_exam_class_detail');
    formData.append('education_type_id', education_type_id);
    for (let i = 0; i < classes_group_exams_id.length; i++) {
        formData.append('classes_group_exams_id[]', classes_group_exams_id[i]);
    }
    for (let i = 0; i < class_boards_id.length; i++) {
        formData.append('class_boards_id[]', class_boards_id[i]);
    }

    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (data) {
        if (data && data.success) {
            const agency_board_university = data.message;
            var options = '<option value=""></option>';
            if (agency_board_university.length > 0) {
                $(agency_board_university).each(function (index, item) {
                    options += '<option value="' + item.id + '">' + item.name + '</option>';
                });
                $('#class_other_exam_detail').removeAttr('disabled');
            } else {
                $('#class_other_exam_detail').val('');
                // $('#class_other_exam_detail').attr('disabled', 'disabled');
                // alert('Exam Agency/ Board/ University in this Class/ Group/ Exam Name, please select another, or add some.');
            }
            $('#class_other_exam_detail').html(options);
        } else {
            alert(data.message);
        }
    }).fail(function (data) {
        console.log(data);
    });
}

async function deleteEducationType(id) {

    var formData = new FormData();
    formData.append('form_name', 'deleteEducationType');
    formData.append('id', id);

    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (data) {
        console.log('data deleted');
        location.reload();
    }).fail(function (data) {
        console.log(data);
    });
}

async function deleteClassGroup(class_id, education_id) {

    var formData = new FormData();
    formData.append('form_name', 'deleteClass');
    formData.append('education_id', education_id);
    formData.append('class_id', class_id);

    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (data) {
        console.log('data deleted');
        location.reload();
    }).fail(function (data) {
        console.log(data);
    });
}

async function deleteExamAgencyBoard(education_id, class_id, exam_agency_id, gn_display_id) {

    var formData = new FormData();
    formData.append('form_name', 'deleteExamAgencyBoard');
    formData.append('education_id', education_id);
    formData.append('class_id', class_id);
    formData.append('exam_agency_id', exam_agency_id);
    formData.append('gn_display_id', gn_display_id);

    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (data) {
        console.log('data deleted');
        location.reload();
    }).fail(function (data) {
        console.log(data);
    });
}

async function deleteOtherExamClass(education_type_id, classes_group_exams_id, agency_board_university_id) {

    var formData = new FormData();
    formData.append('form_name', 'deleteOtherExamClass');
    formData.append('education_type_id', education_type_id);
    formData.append('classes_group_exams_id', classes_group_exams_id);
    formData.append('agency_board_university_id', agency_board_university_id);

    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (data) {
        console.log('data deleted');
        location.reload();
    }).fail(function (data) {
        console.log(data);
    });
}

function editFormResultMapping(id, educationType, classes_group_exams_id, agency_board_university_id = 0, name = '', subject_ids = '') {
    return;
    $('#resultSubjectMapForm_id').val(id);
    $('#other_exam_education_type_sub_id').append("<option value=" + educationType + " selected>" + name + "</option>");
    console.log(formName);


    other_exam_education_type_change(education).finally(() => {
        $('#other_exam_class_group_exam_id').val(class_exam);
        other_exam_classes_group_exams_change(class_exam).finally(() => {
            $('#other_exam_agency_board_university_id').val(boards);
        });
    });
    $('#other_exam_education_type_id').val(education);
    $("#other_exam_name_id").empty();
    $("#other_exam_name_id").append(other_exam_name_id);
    $('#other_exam_name_id').val(JSON.parse(name));
    inititateSelect2();


    $('#resultSubjectMapFormReset').show();
}

async function deleteresultSubjectMapFormClass(id) {

    var formData = new FormData();
    formData.append('form_name', 'deleteresultSubjectMap');
    formData.append('id', id);

    await $.ajax({
        url: '/',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (data) {
        console.log('data deleted');
        location.reload();
    }).fail(function (data) {
        console.log(data);
    });
}
