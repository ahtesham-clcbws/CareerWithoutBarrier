

<?php $__env->startSection('content'); ?>

<style>

    .institudeCouponGrid {
        background-color: #b4afaf;
        padding: 12px;
        margin: 14px 0px 0px 0px;
        margin-left: -12px;
        margin-right: -15px;
    }

    /* Adjust the input width and margin */
    .institude-coupon-grid-content-input input.form-control {
        width: 80%;
        margin-right: 10px;
        /* Adjust as needed */
    }

    /* Center the Apply button vertically */
    .institude-coupon-grid-content-input .input-group-append .apply-btn {
        display: flex;
        align-items: center;
    }

    /* Style the Apply button */
    .institude-coupon-grid-content-input .input-group-append .apply-btn {
        cursor: pointer;
        background-color: #007bff;
        /* Example color, adjust as needed */
        color: #fff;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
    }

    /* Hover effect for Apply button */
    .institude-coupon-grid-content-input .input-group-append .apply-btn:hover {
        background-color: #0056b3;
        /* Example color, adjust as needed */
    }
</style>

<div class="pt-3 pb-2 custom-dashboard">
    <div class="w-100 dashboard-header mb-4">
        <h2 class="d-inline-block">
            <!--<i class="bi bi-house-fill"></i>-->
        </h2>
    </div>

    <input class="d-none" id="franchiseId" value="<?php echo e($corporate->id); ?>">
    <section class="content admin-1">
        <div class="row corporate-cards">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header" style="background-color:#19467a ; color: white;">
                        <div>
                            <h5>Enquiry Detail: </h5>
                        </div>

                        <div>
                            <h5>Created on: <?php echo e($corporate->created_at); ?></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><b>Name</b></td>
                                            <td class="information-txt"><?php echo e($corporate->name); ?></td>
                                            <td rowspan="2" class="userImageCell">
                                                <img id="profile_img" src="<?php echo e(asset('/upload/corporate')); ?>" style="width:80px;height:80px;border:1px solid #c2c2c2;  ">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Mobile</b></td>
                                            <td class="information-txt"><?php echo e($corporate->phone); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Email</b></td>
                                            <td class="information-txt" colspan="2"><?php echo e($corporate->email); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Address</b></td>
                                            <td class="information-txt" colspan="2"><?php echo e($corporate->address); ?>

                                                &nbsp;&nbsp;, <strong>City: &nbsp;</strong><?php echo e($corporate->city); ?>

                                                <!-- <strong>State: &nbsp;</strong>Uttar Pradesh -->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <b>Inst. Name</b>
                                            </td>
                                            <td class="information-txt" colspan="2"><?php echo e($corporate->institute_name); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Institute Type</b></td>
                                            <td class="information-txt" colspan="2">
                                                <span class="commaList"><?php echo e($corporate->type_institution); ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Interested For</b></td>
                                            <td class="information-txt" colspan="2">
                                                <span class="commaList"><?php echo e($corporate->interested_for); ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2"><b>Action</b></td>
                                            <td colspan="2">
                                           <button type="button" class="btn btn-link text-info action-button" onclick="showReply()">Reply</button>
                                           <?php if(!$corporate->signup_approved): ?>
                                           <button type="button" class="btn btn-link text-success action-button" onclick="showSignupApprove()">SignUp Approve</button>
                                           <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Status</b></td>
                                            <td class="bg-info" colspan="2">
                                                <?php if( !$corporate->is_approved ): ?>
                                                <span class="text-white">New</span>
                                                <?php else: ?>
                                                <span class="text-white">Approved</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Established Year</b></td>
                                            <td colspan="2">
                                                <?php echo e($corporate->established_year); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Branch Code</b></td>
                                            <td colspan="2">
                                                <?php echo e($corporate->institude_code); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Subscription</b></td>
                                            <td colspan="2">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="card" id="reply-show">
                    <div class="card-header" style="background-color:#0DCAF0; color: #fff;">
                        <h5>Reply</h5>
                    </div>
                    <div class="card-body">
                        <div class="modalLoader" id="reply-loader" style="display: none;">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="mid-content">
                            <textarea id="reply-message" name="type" cols="30" rows="10"></textarea>
                        </div>
                        <div class="control-area">
                            <button class="btn btn-danger" onclick="closeBox()">Close</button>
                            <button class="btn btn-success action-button-reply" onclick="submitReply('reply', this)">Submit</button>
                        </div>
                    </div>
                </div>
       
                <div class="card" id="signup-approve-show"  style="display: none;">
                    <div class="card-header" style="background-color: #18c968;color: #fff;align-items: center;">
                        <h5>Sign Up approve</h5>
                    </div>
                    <div class="card-body">
                        <div class="modalLoader" id="signup-approve-loader" style="display: none;">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="mid-content">
                            <textarea id="signup-approve-message" name="type" cols="30" rows="10">We are happy to inform you that your business request signup approved by our Authorisation Team.
                         
                        </textarea>
                        </div>
                        <div class="control-area">
                            <button class="btn btn-danger" onclick="closeBox()">Close</button>
                            <button class="btn btn-success action-button-signup-approve" onclick="submitReply('signup-approve', this)">Submit</button>
                        </div>
                    </div>
                </div>
      
            </div>
        </div>
    </section>
    <div class="toast align-items-center text-white border-0 position-absolute bottom-0 end-0 mb-3" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true" id="responseToast">
        <div class="d-flex">
            <div class="toast-body" id="responseToastMessage">
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    $(".institudeCouponGrid").on('click', function() {
        $(".institude-coupon-grid-content-input").not($(this).parent().next()).hide();

        if ($(this).data('couponremain') == 0) {
            error('The Coupon is not avaialable.');
            return;
        }
        $(this).parent().next().toggle();
    });

    $('.select2').select2();

    function closeBox(){
        $('#signup-approve-show').hide();
        $('#reply-show').hide();
    }

    function showToast(message, bgColor) {
        var responseToastMessage = $('#responseToastMessage');
        responseToastMessage.html('');
        responseToastMessage.html(message);
        var responseToast = document.getElementById('responseToast');
        responseToast.classList.remove('bg-success');
        responseToast.classList.remove('bg-danger');
        responseToast.classList.remove('bg-warning');
        responseToast.classList.add(bgColor);
        responseToast = new bootstrap.Toast(responseToast);
        responseToast.show();
    }
    
    var replyBox = $('#reply-show')
    var signApprove = $('#signup-approve-show')

    function showReply() {
        replyBox.show();
        signApprove.hide();
    }


    function showSignupApprove() {
        replyBox.hide();
        signApprove.show();
    }

    function submitReply(type, button) {
        const message = $('#' + type + '-message');
        const actionbtn = $('.action-button-' + type);
        actionbtn.attr('disabled', true);
        if (!message.val()) {
            message.addClass('is-invalid');
            message.removeClass('is-valid');
            return;
        } else {
            message.addClass('is-valid');
            message.removeClass('is-invalid');
        }
        const loader = $('#' + type + '-loader');
        loader.show();
        var formData = new FormData();
        formData.append('corporate_id', "<?php echo e($corporate->id); ?>")
        formData.append('message', message.val())
        formData.append('type', type)
        formData.append('name', "<?php echo e($corporate->name); ?>")
        formData.append('id', "<?php echo e($corporate->id); ?>")
        formData.append('phone', "<?php echo e($corporate->phone); ?>")
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'))

        console.log(Array.from(formData));

        $.ajax({
            url: "<?php echo e(route('institute.institute_status')); ?>",
            type: 'post',
            data: formData,
            contentType: false,
            processData: false
        }).done(function(data) {
            loader.hide();
            actionbtn.attr('disabled', false);

            if (data.success) {
                success(data.message)
                if (type == 'signup-approve') {
                    actionbtn.hide()

                    setTimeout(function(){
                        window.location.href = "<?php echo e(route('institute.list.signup')); ?>";
                    },2000)
                }
                if (type == 'reply') {
                    actionbtn.hide();
                }
              
            } else {
                errors(data.message)
                actionbtn.attr('disabled', false);
            }

        }).fail(function(err) {
            console.log('error', err)
            showToast(err.statusText, 'bg-danger');
            errors(data.message)
            loader.hide();
            actionbtn.attr('disabled', false);

            // closeMessage(message, loader);
        });
    }

    $('.apply-btn').on('click', function() {
        $(this).attr('disabled', true);
        var prefix = $(this).data('prefix');
        var corporateId = $(this).data('corporate');
        var remainCount = $(this).data('remaincount');
        var enteredValue = $(this).closest('.institude-coupon-grid-content-input').find('input').val();
        var $btn = $(this);

        if (remainCount == 0) {
            $(".institude-coupon-grid-content-input").not($(this).parent().next()).hide();
            error('The Coupon is not avaialable.');
        }

        if (!enteredValue || isNaN(enteredValue) || enteredValue == 0) {
            error('Please enter a valid number.');
            return;
        }

        // Check if the entered value has at most 4 digits
        if (enteredValue.length > 4) {
            error('Please enter a number with at most 4 digits.');
            return;
        }

        if (remainCount < enteredValue) {

            error('Please enter the number below the remain coupon.');
            return;
        }
    });
</script>

<!-- /#page-content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/administrator/dashboard/institude/institude_list_signup_view.blade.php ENDPATH**/ ?>