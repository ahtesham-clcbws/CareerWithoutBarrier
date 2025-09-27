
<?php $__env->startSection('content'); ?>


<?php

use Illuminate\Support\Facades\Auth;

$admin = Auth::user();
?>
<?php if($admin->roles != 'admin'): ?>
<?php echo e(abort(403,'Permission Denied')); ?>

<?php endif; ?>
<?php $__env->startSection('content'); ?>
<div class="row py-2 pl-3 pr-3">
    <div class="container ">
        <div class="row">
            <div class="col-lg-6 col-md-6 col">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h5>Add Images:</h5>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <?php if($imageUrl): ?>
                                        <div class="col-md-12 text-end">
                                            <a href="#" style="color: blue;" class="copy-url" data-url="<?php echo e($imageUrl); ?>">
                                                <span class="url-text"><?php echo e($imageUrl); ?></span>
                                                <span class="copy-text" style="margin-left: 10px; color: green;">Copy</span>
                                            </a>
                                        </div>
                                        <?php endif; ?>

                                        <div class="col-md-12 col">
                                            <div class="form-group">
                                                <p for="mobile">Image</p>
                                                <input required type="file" id="fileInput" class="form-control input-focus" onchange="validateExcel(this,'pdf')" name="uploadfiles">
                                                <?php $__errorArgs = ['picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img id="imagePreview" src="#" alt="Image Preview" style="display: none;width: 100px;margin-left: auto;margin-top: -38px;">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <p for="mobile">&nbsp;</p>
                                            <input type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5 w-50 " value="Submit">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col">
                <div class="card-body">
                    <div class="table-responsive " style="max-height: 300px; overflow-y: auto;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>URL</th>
                                    <th>Uploads</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td>
                                        <?php if($image->url): ?>
                                        <div class="col-md-1 text-end">
                                            <a href="#" style="color: blue;" class="copy-url" data-url="<?php echo e($image->url); ?>">
                                                <span class="url-text"><?php echo e($image->url); ?></span>
                                                <span class="copy-text" style="margin-left: 10px; color: green;">Copy</span>
                                            </a>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                     
                                        <?php if($image->url): ?>
                                        <?php if(in_array(pathinfo(substr($image->url, 0, -2), PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'])): ?>
                                        <a href="<?php echo e($image->url); ?>" target="_blank">
                                            <img src="<?php echo e($image->url); ?>" alt="Upload Image" style="max-width: 50px; max-height: 40px;">
                                        </a>
                                        <?php else: ?>
                                        <a target="_blank" href="<?php echo e($image->url); ?>">
                                            <i class="fa fa-download ml-2" aria-hidden="true"></i>
                                        </a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </td>

                                    <!-- <td>
                                        <div class="form-control2">
                                            <label class="switch" for="image-<?php echo e($image->id); ?>">
                                                <input type="checkbox" id="image-<?php echo e($image->id); ?>" data-id="<?php echo e($image->id); ?>" class="image-status-toggle" <?php echo e($image->status ? 'checked' : ''); ?>>
                                                <div class="slider round">
                                                    <span class="off">No</span>
                                                    <span class="on">Yes</span>
                                                </div>
                                            </label>
                                        </div>
                                    </td> -->
                                    <td class="color-primary" style="text-align: center">
                                        <a href="<?php echo e(route('image_upload.delete',[$image->id])); ?>"><span class="fa fa-trash"></span></a>
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
<script>
    $(document).ready(function() {
        $('.toggle-status').on('change', function() {
            var courseId = $(this).data('id');
            var isStatus = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "<?php echo e(route('mobile.number.statusToggle')); ?>",
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
    });
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
<script>
    $('.copy-url').on('click', function(event) {
        event.preventDefault();
        var url = $(this).data('url');
        var copyTextElement = $(this).find('.copy-text');

        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(url).then(function() {
                copyTextElement.text('Copied');
                setTimeout(function() {
                    copyTextElement.text('Copy');
                }, 2000); // Reset text after 2 seconds
            }).catch(function(err) {
                console.error('Could not copy text: ', err);
            });
        } else {
            // Fallback method for older browsers
            var textArea = $('<textarea>');
            textArea.val(url);
            $('body').append(textArea);
            textArea.focus().select();
            try {
                document.execCommand('copy');
                copyTextElement.text('Copied');
                setTimeout(function() {
                    copyTextElement.text('Copy');
                }, 2000); // Reset text after 2 seconds
            } catch (err) {
                console.error('Fallback: Oops, unable to copy', err);
            }
            textArea.remove();
        }
    });
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/uploads/images_upload.blade.php ENDPATH**/ ?>