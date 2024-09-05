function sendOtp(userType, type) {
    var sendBtn, verifyBtn, mobileField,otp;
    var formData = new FormData();
console.log(userType );
    if (userType === 'admin') {
        email = $('#email').val();

        sendBtn = $('.admin_otp_sent_btn');
    

        formData.append('form_name', type);
        formData.append('form_user', userType);
        formData.append('email', email);

        sendBtn.prop('disabled',true);

        $.ajax({
            url: '/otp_verification',
            data: formData,
            type: 'post',
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(response){
              success(response.message)
            },
            error:function(response){
                error(response.xhr.message)
                sendBtn.prop('disabled',false);
            }
        });

        return;
    }

    if (userType === 'register') {
        sendBtn = $('.student_send_otp_btn');
        verifyBtn = $('.student_verify_otp_btn');
        mobileField = $('#student_mobile');
        otp = $('#student_otp').val();

        formData.append('otp', otp);
    } else if (userType === 'corporate') {
        sendBtn = $('.corporate_send_otp_btn');
        verifyBtn = $('.corporate_verify_otp_btn');
        mobileField = $('#phone');
        otp = $('#corporate_otp').val();
        formData.append('otp', otp);
    }else if(userType === 'forgetPassword'){

        mobileField = $('#forget_mobile');
            sendBtn = $('.forget_send_otp_btn');
        if(type=='otp_verify'){
            verifyBtn = $('.forget_verify_otp_btn');
            otp = $('#forget_otp').val();
            formData.append('otp', otp);
        }
    } else {
        errors('Invalid user type.');
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
            sendBtn.prop('disabled', false);
            if(type=='otp_verify'){
                verifyBtn.text('Verified');
            }
            console.log(userType == 'forgetPassword' && type=='otp_verify')
            console.log(userType + ' '+type)
            if(userType == 'forgetPassword' && type=='otp_verify'){ 
                $('.newpasswordn').show();
                $('.forgetmobiledn').hide();
            }
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
