function sendOtp(userType, type) {
    let sendBtn, verifyBtn, mobileField, otp, otpField;

    let formData = new FormData();
    console.log(userType);
    if (userType === 'admin') {
        email = $('#email').val();

        sendBtn = $('.admin_otp_sent_btn');


        formData.append('form_name', type);
        formData.append('form_user', userType);
        formData.append('email', email);

        sendBtn.prop('disabled', true);

        $.ajax({
            url: '/otp_verification',
            data: formData,
            type: 'post',
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.status) {
                    success(response.message);
                    // Add success message below the input group
                    let otpInput = $('#admin_otp');
                    let successMsgId = 'admin_otp_success_msg';
                    if ($('#' + successMsgId).length === 0) {
                        otpInput.parent().after('<small id="' + successMsgId + '" class="text-success small d-block">OTP successfully sent.</small>');
                    } else {
                        $('#' + successMsgId).text('OTP successfully sent.').show();
                    }
                } else {
                    error(response.message);
                    sendBtn.prop('disabled', false);
                }
            },
            error: function (jqXHR) {
                let msg = 'Server error, please try again later.';
                if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                    msg = jqXHR.responseJSON.message;
                }
                error(msg);
                sendBtn.prop('disabled', false);
            }
        });

        return;
    }

    if (userType === 'register') {
        sendBtn = $('.student_send_otp_btn');
        verifyBtn = $('.student_verify_otp_btn');
        mobileField = $('#student_mobile');
        otp = $('#student_otp').val();
        otpField = $('#student_otp');

        formData.append('otp', otp);
    } else if (userType === 'corporate') {
        sendBtn = $('.corporate_send_otp_btn');
        verifyBtn = $('.corporate_verify_otp_btn');
        mobileField = $('#phone');
        otpField = $('#corporate_otp');
        otp = $('#corporate_otp').val();
        formData.append('otp', otp);
    } else if (userType === 'forgetPassword') {
        mobileField = $('#forget_mobile');
        sendBtn = $('.forget_send_otp_btn');
        if (type == 'otp_verify') {
            verifyBtn = $('.forget_verify_otp_btn');
            otpField = $('#forget_otp');
            otp = $('#forget_otp').val();
            formData.append('otp', otp);
        }
    } else {
        error('Invalid user type.');        
        sendBtn.prop('disabled', false);
        mobileField.prop('readonly', false);
        verifyBtn.prop('disabled', false);
        otpField.prop('readonly', false);
        return;
    }

    var mobile = mobileField.val();
    if (!mobile) {
        error('Please input a valid mobile number.');
        sendBtn.prop('disabled', false);
        verifyBtn.prop('disabled', false);
        return;
    }

    var mobileNumber = parseInt(mobile);
    if (isNaN(mobileNumber) || mobileNumber.toString().length !== 10) {
        error('10 digit mobile number is required.');
        sendBtn.prop('disabled', false);
        verifyBtn.prop('disabled', false);
        return;
    }

    if (type == 'otp_send') {
        sendBtn.prop('disabled', true);
        mobileField.prop('readonly', true);
    }
    if (type == 'otp_verify') {
        verifyBtn.prop('disabled', true);
        otpField.prop('readonly', false);
    }

    formData.append('form_name', type);
    formData.append('form_user', userType);
    formData.append('mobile', mobileNumber);

    $.ajax({
        url: '/otp_verification',
        data: formData,
        type: 'post',
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (data) {
        console.log(data);
        if (data.status) {
            success(data.message);
            if (type == 'otp_verify') {
                verifyBtn.text('Verified');
                verifyBtn.removeClass('bg-dark');
                verifyBtn.addClass('bg-success');

                // Hide success message once verified
                if (otpField) {
                    let successMsgId = otpField.attr('id') + '_success_msg';
                    $('#' + successMsgId).hide();
                }
            }
            if (type == 'otp_send') {
                if (otpField) {
                    otpField.prop('readonly', false);
                    otpField.focus();

                    // Add success message below the input group
                    let successMsgId = otpField.attr('id') + '_success_msg';
                    if ($('#' + successMsgId).length === 0) {
                        otpField.parent().after('<small id="' + successMsgId + '" class="text-success small d-block">OTP successfully sent.</small>');
                    } else {
                        $('#' + successMsgId).text('OTP successfully sent.').show();
                    }
                }
                if (verifyBtn) {
                    verifyBtn.prop('disabled', false);
                }
            }
            console.log(userType == 'forgetPassword' && type == 'otp_verify');
            console.log(userType + ' ' + type);
            if (userType == 'forgetPassword' && type == 'otp_verify') {
                $('.newpasswordn').show();
                $('.forgetmobiledn').hide();
            }
        } else {
            error(data.message);
            sendBtn.prop('disabled', false);
            mobileField.prop('readonly', false);
            verifyBtn.prop('disabled', false);
            otpField.prop('readonly', false);
        }
    }).fail(function (jqXHR) {
        let msg = 'Server error, please try again later.';
        if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
            msg = jqXHR.responseJSON.message;
        }
        error(msg);
        sendBtn.prop('disabled', false);
        verifyBtn.prop('disabled', false);
    });
}
