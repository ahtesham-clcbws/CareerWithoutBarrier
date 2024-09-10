<?php $__env->startSection('content'); ?>

<?php $__env->startSection('content'); ?>
<div class="row py-5 pl-3 pr-3">
    <div class="container p-0">
        <div class="dashboard-container mb-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default m-t-15">
                        <div class="panel-heading">
                            <h4 class="panel-title"><strong>Add Govt Website Details</strong></h4>
                        </div>
                        <div class="panel-body">
                            <div class="card alert">
                                <div class="card-body">
                                    <form action="<?php echo e(route('home.savegovtwebsite')); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-md-6 col">
                                                <div class="form-group">
                                                    <p>Website Url</p>
                                                    <input type="text" placeholder="Enter Placeholder" name="website_link" id="" required class="form-control input-focus">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col">
                                            <div class="form-group">
                                            <p>Remarks</p>
                                            <input type="text" name="remark" id="" placeholder="Enter Remarks" class="form-control input-focus">
                                        </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <p>Add Logo</p>
                                            <div class="input-group">
                                                <input type="file" id="fileInput" class="form-control input-focus" name="image">
                                                <img id="imagePreview" src="#" alt="Image Preview" style="display: none;width: 100px;">
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <h4>Govt Website List</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Image</th>
                                    <th>Remark</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $website; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $websites): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td>
                                        <p style="width: 185px;word-wrap: break-word;"><?php echo e($websites->website_link); ?></p>
                                        <a href="<?php echo e(asset('home/courses/' . $websites->image)); ?>">
                                            <img src="<?php echo e(asset('home/courses/' . $websites->image)); ?>" style="width: 50px;border-radius:10px"></a>
                                    </td>
                                    <td><?php echo e($websites->remark); ?></td>
                                    <td>
                                    <div class="form-control2">
                                        <label class="switch" for="status-<?php echo e($websites->id); ?>">
                                            <input type="checkbox" id="status-<?php echo e($websites->id); ?>" data-id="<?php echo e($websites->id); ?>" onchange="toggleStatus(this, 'gov_website')" <?php echo e($websites->status ? 'checked' : ''); ?>>
                                            <div class="slider round">
                                                <span class="off">Inactive</span>
                                                <span class="on">Active</span>
                                            </div>
                                        </label>
                                    </div>
                                    </td>

                                    <td style="text-align: center">
                                        <a href="<?php echo e(route('home.deleteGovtwebsite', ['id' => $websites->id])); ?>">
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
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/administrator/Home/govtwebsite.blade.php ENDPATH**/ ?>