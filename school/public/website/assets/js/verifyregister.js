function sendOtp(userType, type) {
    var sendBtn, verifyBtn, mobileField,otp;
    var formData = new FormData();

    if (userType === 'register') {
        sendBtn = $('.student_send_otp_btn');
        verifyBtn = $('.student_verify_otp_btn');
        mobileField = $('#student_mobile');
        otp = $('#student_otp').val();
        console.log(otp)
        console.log('vstu');
        formData.append('otp', otp);
    } else if (userType === 'corporate') {
        sendBtn = $('.corporate_send_otp_btn');
        verifyBtn = $('.corporate_verify_otp_btn');
        mobileField = $('#phone');
        otp = $('#corporate_otp').val();
        formData.append('otp', otp);
    } else {
        errors('Invalid user type.');
        sendBtn.prop('disabled', false);
        verifyBtn.prop('disabled', false);
        return;
    }

    if (type === 'otp_send') {
        sendBtn.prop('disabled', true);
    } else if (type === 'otp_verify') {
        verifyBtn.prop('disabled', true);
    } else {
        errors('Invalid OTP type.');
        sendBtn.prop('disabled', false);
        verifyBtn.prop('disabled', false);
        return;
    }

    var mobile = mobileField.val();
    if (!mobile) {
        errors('Please input a valid mobile number.');
        sendBtn.prop('disabled', false);
        verifyBtn.prop('disabled', false);
        return;
    }

    var mobileNumber = parseInt(mobile);
    if (isNaN(mobileNumber) || mobileNumber.toString().length !== 10) {
        errors('10 digit mobile number is required.');
        sendBtn.prop('disabled', false);
        verifyBtn.prop('disabled', false);
        return;
    }

   
    formData.append('form_name', type);
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
        } else {
            errors(data.message);
            sendBtn.prop('disabled', false);
        verifyBtn.prop('disabled', false);
        }
    }).fail(function () {
        errors('Server error, please try again later.');
        sendBtn.prop('disabled', false);
        verifyBtn.prop('disabled', false);
    })
}
