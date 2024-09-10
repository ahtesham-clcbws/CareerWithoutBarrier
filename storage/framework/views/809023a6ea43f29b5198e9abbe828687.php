<?php $__env->startSection('content'); ?>

<style>
    /* .coupons-container>.institudeCouponGrid {
        background-color: #dedcdc;
        padding: 12px;
        margin: 4px 4px 0px 0px;
    } */
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
<?php

use App\Models\CouponCode;
?>
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
                                                <img id="profile_img" src="<?php echo e(asset('/upload/corporate/'.$corporate->attachment)); ?>" style="width:80px;height:80px;border:1px solid #c2c2c2;  ">
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
                                                <!-- <span class="commaList">Offline Test (At Centers/Schools )</span>
                                                <span class="commaList">Study Notes (Book/Paper Notes)</span> -->
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="2"><b>Action</b></td>
                                            <td colspan="2">
                                                <button type="button" class="btn btn-link text-danger action-button" onclick="showReject()">Reject</button>
                                                <?php if( !$corporate->is_approved ): ?>
                                                <button type="button" class="btn btn-link action-button action-button-pending" onclick="showPending()" style="color: #F48134;">Pending</button>
                                                <button type="button" class="btn btn-link text-success action-button action-button-approve" onclick="showApproved()">Approve</button>
                                                <?php endif; ?>
                                                <button type="button" class="btn btn-link text-info action-button" onclick="showReply()">Reply</button>
                                                <?php if( $corporate->is_approved ): ?>
                                                <button type="button" class="btn btn-link text-info action-button-coupon-allotment" onclick="showCouponAllotment()">Coupon Allotment</button>
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

            <?php if( $corporate->is_approved ): ?>
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
                <div class="card" id="approved-show">
                    <div class="card-header" style="background-color:#18c968; color: #fff;">
                        <h5>Approve</h5>
                    </div>
                    <div class="card-body">
                        <div class="modalLoader" id="approved-loader" style="display: none;">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="mid-content">
                            <textarea id="approved-message" name="type" cols="30" rows="10">
                            <?php if($corporate->institude_code): ?>    
                            Please use this <?php echo e($corporate->institude_code); ?> branch code, to signup so we can go further on your request.
                            <?php endif; ?>
                            </textarea>
                        </div>
                        <div class="control-area">
                            <button class="btn btn-danger" onclick="closeBox()">Close</button>
                            <button class="btn btn-success approvedbtn" onclick="submitReply('approved', this)">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="card" id="reject-show">
                    <div class="card-header" style="background-color:#ff0000; color: #fff;">
                        <h5>Reason to reject</h5>
                    </div>
                    <div class="card-body">
                        <div class="modalLoader" id="reject-loader" style="display: none;">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="mid-content">
                            <textarea id="reject-message" name="type" cols="30" rows="10">We are sorry to inform you that your business request is rejected by our Authorisation Team.
                                The rejection was made, due to insufficient/wrong information while physical inspection by the authorisation
                                team.</textarea>
                        </div>
                        <div class="control-area">
                            <button class="btn btn-danger" onclick="closeBox()">Close</button>
                            <button class="btn btn-success action-button-reject" onclick="submitReply('reject', this)">Submit</button>
                        </div>
                    </div>
                </div>
                <?php if( $corporate->is_approved ): ?>
                <div class="card" id="coupon-allotment-show">
                    <div class="card-header" style="background-color:#F48134; color: #fff;">
                        <h5>Coupon allotment: </h5>

                        <h5>Total Issued Coupon to <a target="_blank" style="color:#fff;text-decoration:none !important" href="<?php echo e(route('institute.CoprporateCouponlists',[$corporate->id])); ?>"><b style="text-decoration: underline;"><?php echo e(ucfirst($corporate->name)); ?> </b> Count: <b class="totalIssuedCoupon"><?php echo e($totalIssuedCount); ?></b></a></h5>
                    </div>
                    <div class="card-body" style="padding: .25rem; background-color: #ededed;">
                        <div class="modalLoader" id="pending-loader" style="display: none;">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="mid-content ">
                            <div class="coupons-container">
                                <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $remainCoupon = $coupon->prefix_count - ($coupon->issued_count);
                                $corporateCountIssued = CouponCode::where('prefix', $coupon->prefix)->where('corporate_id', $corporate->id)->count();
                                ?>
                                <div class="col-md-12 ">
                                    <div class="form-group" style="margin-bottom:0px">
                                        <div class="row institudeCouponGrid" data-couponremain="<?php echo e($remainCoupon); ?>">
                                            <div class="col">
                                                Prefix: <b><?php echo e($coupon->prefix); ?></b>
                                            </div>
                                            <!-- <div class="col">
                                                Code Value: <b><?php echo e($coupon->value . '  ' . ($coupon->valueType == 'amount' ? 'Rs.' : '%')); ?></b>
                                            </div> -->
                                            <div class="col">
                                                Remain: <b><?php echo e($remainCoupon); ?></b>
                                            </div>
                                            <div class="col">
                                                Count: <b><?php echo e($coupon->prefix_count); ?></b>
                                            </div>
                                            <div class="col">
                                                Applied Count: <b><?php echo e($coupon->applied_count); ?></b>
                                            </div>
                                            <div class="col" data-issuedcount="<?php echo e($coupon->issued_count); ?>">
                                                Issued Count: <b><?php echo e($coupon->issued_count); ?></b>
                                            </div>
                                            <div style="border:1px solid #8b8b8b" class="my-2"></div>
                                            <div class="row corporate-issued-count-count" data-corporateissuedcount="<?php echo e($corporateCountIssued); ?>" data-corporatename="<?php echo e($corporate->name); ?>" style="display: block;">

                                               <b> <?php echo e($corporate->name); ?>: </b> Total Issued: <b><?php echo e($corporateCountIssued); ?></b>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="institude-coupon-grid-content-input" style="display: none;">
                                        <div class="input-group input-group-lg m-3">
                                            <input type="text" class="form-control" pattern="[1-9]{4}" placeholder="Enter number of coupon" aria-label="Number of coupon" aria-describedby="apply-btn">
                                            <div class="input-group-append" style="width:15%">
                                                <button data-remaincount="<?php echo e($remainCoupon); ?>" data-prefix="<?php echo e($coupon->prefix); ?>" data-corporate="<?php echo e($corporate->id); ?>" class="btn btn-lg apply-btn">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>
                        <hr />
                        <div class="control-area">
                            <button class="btn btn-danger" onclick="closeBox()">Close</button>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
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
                <div class="card" id="approved-show">
                    <div class="card-header" style="background-color:#18c968; color: #fff;">
                        <h5>Approve</h5>
                    </div>
                    <div class="card-body">
                        <div class="modalLoader" id="approved-loader" style="display: none;">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="mid-content">
                            <textarea id="approved-message" name="type" cols="30" rows="10">
                            <?php if($corporate->institude_code): ?>    
                            Please use this <?php echo e($corporate->institude_code); ?> branch code, to signup so we can go further on your request.
                            <?php endif; ?>
                            </textarea>
                        </div>
                        <div class="control-area">
                            <button class="btn btn-danger" onclick="closeBox()">Close</button>
                            <button class="btn btn-success approvedbtn" onclick="submitReply('approved', this)">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="card" id="reject-show">
                    <div class="card-header" style="background-color:#ff0000; color: #fff;">
                        <h5>Reason to reject</h5>
                    </div>
                    <div class="card-body">
                        <div class="modalLoader" id="reject-loader" style="display: none;">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="mid-content">
                            <textarea id="reject-message" name="type" cols="30" rows="10">We are sorry to inform you that your business request is rejected by our Authorisation Team.
                                The rejection was made, due to insufficient/wrong information while physical inspection by the authorisation
                                team.</textarea>
                        </div>
                        <div class="control-area">
                            <button class="btn btn-danger" onclick="closeBox()">Close</button>
                            <button class="btn btn-success action-button-reject" onclick="submitReply('reject', this)">Submit</button>
                        </div>
                    </div>
                </div>
                <?php if( !$corporate->is_approved ): ?>
                <div class="card" id="pending-show">
                    <div class="card-header" style="background-color:#F48134; color: #fff;">
                        <h5>Reason for pending</h5>
                    </div>
                    <div class="card-body">
                        <div class="modalLoader" id="pending-loader" style="display: none;">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="mid-content">
                            <textarea id="pending-message" name="type" cols="30" rows="10"></textarea>
                        </div>
                        <div class="control-area">
                            <button class="btn btn-danger" onclick="closeBox()">Close</button>
                            <button class="btn btn-success action-button-pending" onclick="submitReply('pending', this)">Submit</button>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-7 d-none">
                <div class="table-responsive">
                    <table class="table table-bordered border-primary corporate-table">
                        <tbody>
                            <tr>
                                <th>Actions</th>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#approveBox">Ok</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rejectBox">Reject</button>
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#replyBox">Reply</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
    var rejectBox = $('#reject-show')
    var approvedBox = $('#approved-show')
    var pendingBox = $('#pending-show')
    var replyBox = $('#reply-show')
    var formBox = $('#reply-hidden')
    var couponAllotment = $('#coupon-allotment-show')

    function showReply() {
        rejectBox.hide();
        approvedBox.hide();
        pendingBox.hide();
        replyBox.show();
        formBox.hide();
    }

    function showCouponAllotment() {
        rejectBox.hide();
        approvedBox.hide();
        pendingBox.hide();
        replyBox.hide();
        formBox.hide();
        couponAllotment.show();
    }

    function showReject() {
        rejectBox.show();
        approvedBox.hide();
        pendingBox.hide();
        replyBox.hide();
        formBox.hide();
    }

    function showApproved() {
        rejectBox.hide();
        approvedBox.show();
        pendingBox.hide();
        replyBox.hide();
        formBox.hide();
    }

    function showPending() {
        rejectBox.hide();
        approvedBox.hide();
        pendingBox.show();
        replyBox.hide();
        formBox.hide();
    }

    function closeBox() {
        rejectBox.hide();
        approvedBox.hide();
        pendingBox.hide();
        replyBox.hide();
        formBox.hide();
        couponAllotment.hide();
    }

    function closeMessage(messageBox, loader) {
        messageBox.removeClass('is-invalid');
        messageBox.removeClass('is-valid');
        loader.hide();
        rejectBox.hide();
        approvedBox.hide();
        pendingBox.hide();
        replyBox.hide();
        formBox.hide();
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
        formData.append('type', "<?php echo e($corporate->id); ?>")
        formData.append('message', message.val())
        formData.append('type', type)
        formData.append('name', "<?php echo e($corporate->name); ?>")
        formData.append('id', "<?php echo e($corporate->id); ?>")
        formData.append('phone', "<?php echo e($corporate->phone); ?>")
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'))

        console.log(Array.from(formData));

        $.ajax({
            url: "<?php echo e(route('institute.institute_status')); ?>",
            // url: '',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false
        }).done(function(data) {
            loader.hide();
            actionbtn.attr('disabled', false);

            if (data.success) {
                success(data.message)
                if (type == 'approved') {
                    $('.approvedbtn').hide()
                    $('.action-button-pending').hide()
                    $('.action-button-approve').hide();
                    message.val("Please use this " + data.code + " branch code, to signup so we can go further on your request.");
                }
                if (type == 'reply') {
                    $('.approvedbtn').hide()
                    $('.action-button-pending').hide()
                    $('.action-button-reply').hide();
                }
                if (type == 'reject') {
                    $('.approvedbtn').hide()
                    $('.action-button-pending').hide()
                    $('.action-button-reject').hide();
                }
                if (type == 'pending') {
                    $('.approvedbtn').hide()
                    $('.action-button-pending').hide()
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
        // Make AJAX call
        $.ajax({
            type: 'POST',
            url: "<?php echo e(route('apply_coupon_corporate')); ?>",
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify({
                prefix: prefix,
                corporateId: corporateId,
                enteredValue: enteredValue
            }),
            success: function(response) {
                console.log(response);
                success(response.message);

                var $parent = $btn.closest('.col-md-12');
                var $corporateCountCount = $parent.find('.corporate-issued-count-count');
                var $remainCountElement = $parent.find('.col:eq(1)');
                var $issuedCountElement = $parent.find('.col:last');


                var remainCount = parseInt($btn.data('remaincount')) - enteredValue;
                var corporateValue = parseInt($corporateCountCount.data('corporateissuedcount')) + parseInt(enteredValue);
                var corporateName = $corporateCountCount.data('corporatename')
                var issuedCount = parseInt($issuedCountElement.data('issuedcount')) + parseInt(enteredValue);

                console.log(corporateValue);
                $btn.data('remaincount', remainCount);

                $corporateCountCount.data('corporateissuedcount', corporateValue);
                $corporateCountCount.html("<b> "+corporateName+": </b> Total Issued: <b>"+corporateValue+"</b>");

                $remainCountElement.html("Remain: <b>" + remainCount + "</b>");
                $issuedCountElement.data('issuedcount', issuedCount).html("Issued Count: <b>" + issuedCount + "</b>");

                $('.totalIssuedCoupon').text(parseInt(enteredValue)+parseInt("<?php echo e($totalIssuedCount); ?>"));

                $btn.attr('disabled', false);
                $btn.closest('.institude-coupon-grid-content-input').find('input').val('');
            },

            error: function(xhr, status, e) {
                console.log(e)
                error('Error: ' + e);
                $btn.attr('disabled', false)
            }
        });
    });
</script>

<!-- /#page-content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/01D9961CD1E189D0/BWS/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/institude/institudeView.blade.php ENDPATH**/ ?>