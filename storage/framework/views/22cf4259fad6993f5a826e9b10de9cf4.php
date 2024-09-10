<?php $__env->startSection('content'); ?>

<div class="row py-5 pl-3 pr-3">
    <div class="container p-0">
        <div class="dashboard-container mb-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default m-t-15">
                        <div class="panel-heading">
                            <h4 class="panel-title"><strong>Add Slider</strong></h4>
                        </div>
                        <div class="panel-body">
                            <div class="card alert">
                                <div class="card-body">
                                    <form action="<?php echo e(route('home.saveSlider')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                        <div class="col-md-12 col">
                                            <div class="form-group">
                                                <label for="image">Add Slider Image (Max 2MB, JPG, PNG Only):<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input class="form-control input-focus" type="file" name="image" id="fileInput" onchange="validateImage(this)" required>
                                                        <?php $__errorArgs = ['signature'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="text-danger"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                    <div class="input-group-append image-img-view" style="margin-left: 10px;margin-top: -2rem;">
                                                        <img src="#" alt="Image Preview" style="display:none; width: 7rem;height: 8rem;margin-top: -10re;" id="imagePreview">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col mb-3 d-flex">
                                        <label for="remark" class="mr-3">Remark</label>
                                            <input type="text" name="remark" placeholder="ENter remarks(Optional)" class="form-control input-focus">
                                        </div>
                                        <div class="col-md-4 col text-end " style="margin-left:-12px">
                                            <input type="submit" style="border-radius: 3px;" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <h4 class="panel-title"><strong>Slider List</strong></h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Image</th>
                                    <th>Remark</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td>
                                        <a target="_blank" class="btn btn-outline-secondary btn-success" href="<?php echo e(asset('home/slider/'.$slider->image)); ?>" style="background: none;border: none;">
                                            <img src="<?php echo e(asset('home/slider/'.$slider->image)); ?> " style="width: 43px;margin-top: -10px;border-radius:10px;height: 50px;">
                                    </td>
                                    <td><?php echo e($slider->remark); ?></td>
                                    <td>
                                    <div class="form-control2">
                                        <label class="switch" for="status-<?php echo e($slider->id); ?>">
                                            <input type="checkbox" id="status-<?php echo e($slider->id); ?>" data-id="<?php echo e($slider->id); ?>" onchange="toggleStatus(this, 'home_slider')" <?php echo e($slider->status ? 'checked' : ''); ?>>
                                            <div class="slider round">
                                                <span class="off">Inactive</span>
                                                <span class="on">Active</span>
                                            </div>
                                        </label>
                                    </div>
                                    </td>
                                    <td style="text-align: center">
                                        <a href="<?php echo e(route('home.deleteSlider', ['id' => $slider->id])); ?>">
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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/administrator/Home/slider.blade.php ENDPATH**/ ?>