
<?php $__env->startSection('content'); ?>

<style>
    .right-top-modal .modal-dialog {
  position: fixed;
  top: 10px;
  right: 10px;
  margin: 0;
  transform: translate3d(100%, 0, 0);
  transition: transform 0.3s ease-out;
}

.right-top-modal.show .modal-dialog {
  transform: translate3d(0, 0, 0);
}
</style>
<div class="row py-2 pl-2 pr-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 text-start">
                <h4>Contact Enquiry List: </h4>
            </div>
        </div>
    </div>
    <div class="container card p-0">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered inqueryTable">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>Message</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th style="text-align:center">Reply Mail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $contactInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td><?php echo e($contact->fullname); ?></td>
                                    <td><?php echo e($contact->mobile); ?></td>
                                    <td><?php echo e($contact->email); ?></td>
                                    <td><?php echo e($contact->city); ?></td>
                                    <td><?php echo e($contact->reason_contact); ?></td>
                                    <td><?php echo e($contact->message); ?></td>
                                    <td>
                                        <div class="form-control2">
                                            <label class="switch" for="featured-<?php echo e($contact->id); ?>">
                                                <input type="checkbox" id="featured-<?php echo e($contact->id); ?>" data-id="<?php echo e($contact->id); ?>" class="toggle-featured" <?php echo e($contact->is_featured ? 'checked' : ''); ?>>
                                                <div class="slider round">
                                                    <span class="off">Inactive</span>
                                                    <span class="on">Active</span>
                                                </div>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if($contact->email): ?>
                                        <div class="col-md-12 col text-end">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importModal<?php echo e($key+1); ?>">
                                                Reply Mail
                                            </button>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.contactEnquiryDelete', $contact->id)); ?>" class="btn btn-danger" style="text-decoration: none;"></i> Delete</a>
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
</div>
<?php $__currentLoopData = $contactInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(is_null($contact->email)): ?>
<?php break; ?>
<?php endif; ?>
<div class="modal fade right-top-modal" id="importModal<?php echo e($key+1); ?>" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Mail Template:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body" style="max-height: 517px; overflow-y: auto;">
                    <form method="post" action="<?php echo e(route('admin.conatctEnqueryEeplyMail',$contact->id)); ?>" id="mail_Form<?php echo e($key); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12 col">
                                <div class="mid-content">
                                    <textarea  class="ckeditor" name="email_message" cols="30" rows="10" style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <!-- <div class="col-md-12 TEMPLATE_CONMTENT">
                                <div class="form-group">
                                    <label for="TEMPLATE_CONMTENT" class="placeholder"> Email Body </label>
                                    <textarea cols="8" name="TEMPLATE_CONMTENT" rows="5" class="form-control  mt-2" ></textarea>
                                </div>
                            </div> -->
                            <div class="col-md-12 col mt-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Send
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>

<!-- Initialize CKEditor -->
<script>
  CKEDITOR.instances['IdOfCKEditorTextArea'].setData(data['body']);
</script>
<script>
$(document).ready(function() {
    $('.inqueryTable').DataTable(); // Initialize DataTables
});
    $(document).ready(function() {
        // $('.toggle-status').on('change', function() {
        //     var courseId = $(this).data('id');
        //     var isStatus = $(this).is(':checked') ? 1 : 0;

        //     $.ajax({
        //         url: "<?php echo e(route('toggle.status')); ?>",
        //         method: 'POST',
        //         data: {
        //             _token: "<?php echo e(csrf_token()); ?>",
        //             id: courseId,
        //             status: isStatus
        //         },
        //         success: function(response) {
        //             if (response.status) {
        //                 success(response.message);
        //             } else {
        //                 error(response.message);
        //             }
        //         },
        //         error: function(xhr) {
        //             error(xhr.responseText);
        //         }
        //     });
        // });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/contact_enquiry/contact_enquiry.blade.php ENDPATH**/ ?>