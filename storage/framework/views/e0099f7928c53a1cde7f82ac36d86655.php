<?php $__env->startSection('content'); ?>


<?php $__env->startSection('content'); ?>
<div class="row py-2 pl-3 pr-3">
    <div class="container ">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h3> Add E-Prospectus</h3>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="<?php echo e(route('home.eprospectusSave')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <p class="text-muted f-s-12">Title*</p>
                                        <input class="form-control" name="title"></input>
                                    </div>

                                    <div class="form-group">
                                        <p class="text-muted f-s-12">Add Image</p>
                                        <input type="file" id="fileInput" class="form-control input-focus" onchange="validateImage(this,'imagepdf')" name="e_prospectus">
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
                    <h3>E-Prospectus List</h3>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th style="text-align: center;">Prospectus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $prospectus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                                        <td><?php echo $pros->title; ?></td>
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
                                        <td>
                                            <div style="text-align: center;">
                                                <?php if(in_array(pathinfo($pros->e_prospectus, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'])): ?>
                                                <a href="<?php echo e(asset('home/eprospectus/'.$pros->e_prospectus)); ?>" target="_blank" >  <img src="<?php echo e(asset('home/eprospectus/'.$pros->e_prospectus)); ?>" alt="Prospectus Image" style="max-width: 50px; max-height: 40px;">
                                                </a>
                                                <?php else: ?>
                                                <a href="<?php echo e(asset('home/eprospectus/'.$pros->e_prospectus)); ?>">
                                                    <i class="fa fa-download ml-2" aria-hidden="true"></i>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td style="text-align: center">
                                            <a href="<?php echo e(route('home.eprospectusDelete', ['id' => $pros->id])); ?>">
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
    function confirmDelete() {
        if (confirm("Are you sure you want to delete this item?")) {
            // User clicked "OK", proceed with deletion
            // Add your deletion logic here
            console.log("Item deleted");
        } else {
            // User clicked "Cancel", do nothing
            console.log("Deletion canceled");
        }
    }
</script>

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
            url: "<?php echo e(route('prospect_toggle.status')); ?>",
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
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/administrator/Home/eprospectus.blade.php ENDPATH**/ ?>