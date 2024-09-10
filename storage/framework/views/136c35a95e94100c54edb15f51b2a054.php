<?php $__env->startSection('title'); ?>
Pdf Content pload
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row py-2 pl-3 pr-3">
    <div class="container ">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h5> Add All Pdf Content:</h5>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.terms_conditionSave')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-12 col">
                                            <p class="text-muted f-s-12">Title*</p>
                                            <input class="form-control" name="title" placeholder="Enter title" ></input>
                                        </div>
                                        <div class="col-md-6 col">
                                            <p class="text-muted f-s-12">Select page:</p>
                                            <select name="page_name" class="form-select text-center" id="page_name">
                                                <option value="">--Select Page Name--</option>
                                                <option value="privacy-policy">Privacy Policy</option>
                                                <option value="terms-and-condition">Terms & Condition</option>
                                                <option value="important-links">Important Links</option>                                                
                                            </select>
                                        </div>
                                        <div class="col-md-6 col">
                                            <p class="text-muted f-s-12">Type of T & C:</p>
                                            <select name="type" class="form-select text-center" id="couponCode">
                                                <option value="">--Select Type--</option>
                                                <option value="student">Student</option>
                                                <option value="website">Website</option>
                                                <option value="institute">Institute</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <p class="text-muted f-s-12">Add PDF</p>
                                        <input type="file" id="fileInput" class="form-control input-focus" onchange="validateImage(this,'imagepdf')" name="terms_condition_pdf">
                                        <img id="imagePreview" src="#" alt="Image Preview" style="display: none;width:200px">
                                    </div>

                                    <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card-header">
                    <h3>PDF Content List</h3>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Title</th>
                                        <th>Page Name</th>
                                        <th>Type</th>
                                        <th style="text-align: center;">PDF</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $termsCondition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                                        <td><?php echo e($pros->title); ?></td>
                                        <td><?php echo e(strtoupper($pros->page_name)); ?></td>
                                        <td><?php echo e(ucfirst($pros->type)); ?></td>

                                        <td>
                                            <div style="text-align: center;">
                                                <?php if(in_array(pathinfo($pros->terms_condition_pdf, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'])): ?>
                                                <a href="<?php echo e(asset('home/'.$pros->terms_condition_pdf)); ?>" target="_blank"> <img src="<?php echo e(asset('home/'.$pros->terms_condition_pdf)); ?>" alt="Prospectus Image" style="max-width: 50px; max-height: 40px;">
                                                    <a href="<?php echo e(asset('home/'.$pros->terms_condition_pdf)); ?>" target="_blank"> <img src="<?php echo e(asset('home/'.$pros->terms_condition_pdf)); ?>" alt="Prospectus Image" style="max-width: 50px; max-height: 40px;">
                                                    </a>
                                                    <?php else: ?>
                                                    <a target="_blank" href="<?php echo e(asset('public/home/'.$pros->terms_condition_pdf)); ?>">
                                                        <i class="fa fa-download ml-2" aria-hidden="true"></i>
                                                    </a>
                                                    <?php endif; ?>
                                            </div>
                                        </td>
                                        <td>

                                            <div class="form-control2">
                                                <label class="switch" for="status-<?php echo e($pros->id); ?>">
                                                    <input type="checkbox" id="status-<?php echo e($pros->id); ?>" data-id="<?php echo e($pros->id); ?>" class="toggle-status" <?php echo e($pros->status ? 'checked' : ''); ?>>
                                                    <div class="slider round">
                                                        <span class="off">Inactive</span>
                                                        <span class="on">Active</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </td>
                                        <td style="text-align: center">
                                            <a href="<?php echo e(route('admin.terms_conditionDelete', ['id' => $pros->id])); ?>">
                                                <span class="fa fa-trash"></span>
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
        </div>
    </div>
</div>

<script>
    const fileInput = document.getElementById('fileInput');
    const imagePreview = document.getElementById('imagePreview');

    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    });
</script>

<!-- Initialize CKEditor -->
<script>
    $('.toggle-status').on('change', function() {
        var courseId = $(this).data('id');
        var isStatus = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: "<?php echo e(route('terms_condition_toggle.status')); ?>",
            method: 'POST',
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                id: courseId,
                status: isStatus
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/dashboard/terms_condition.blade.php ENDPATH**/ ?>