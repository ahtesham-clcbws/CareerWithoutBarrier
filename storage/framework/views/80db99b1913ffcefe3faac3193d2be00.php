<?php $__env->startSection('content'); ?>

<?php $__env->startSection('content'); ?>
<div class="row py-5 pl-3 pr-3">
    <div class="container card p-0">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 text-start">
                    <h4>Course List </h4>
                </div>
                <div class="col-md-6 text-end"> <a href="<?php echo e(route('home.course')); ?>" class="btn btn-primary">Add Course </a></div>
            </div>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Name</th>
                                    <th>Exam Date</th>
                                    <th>Date</th>
                                    <th>Is Featured</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td><?php echo e($course->title); ?></td>
                                    <td><?php echo e($course->exam_Date); ?></td>
                                    <td><?php echo e($course->exam_Date); ?></td>
                                    <td>
                                        <div class="form-control2">
                                            <label class="switch" for="featured-<?php echo e($course->id); ?>">
                                                <input type="checkbox" id="featured-<?php echo e($course->id); ?>" data-id="<?php echo e($course->id); ?>" class="toggle-featured" <?php echo e($course->is_featured ? 'checked' : ''); ?>>
                                                <div class="slider round">
                                                    <span class="off">Deactive</span>
                                                    <span class="on">Active</span>
                                                </div>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                    <div class="form-control2">
                                            <label class="switch" for="status-<?php echo e($course->id); ?>">
                                                <input type="checkbox" id="status-<?php echo e($course->id); ?>" data-id="<?php echo e($course->id); ?>" class="toggle-status" <?php echo e($course->status ? 'checked' : ''); ?>>
                                                <div class="slider round">
                                                    <span class="off">Deactive</span>
                                                    <span class="on">Active</span>
                                                </div>
                                            </label>
                                        </div>
                                    
                                 </td>
                                    <td class="color-primary" style="text-align: center">
                                        <a href="<?php echo e(route('home.course',[$course->id])); ?>"><span class="fa fa-edit"></span> </a> | <a href="<?php echo e(route('home.courseDelete',[$course->id])); ?>"><span class="fa fa-trash"></span></a>
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
<script>
    $(document).ready(function() {
        $('.toggle-featured').on('change', function() {
            var courseId = $(this).data('id');
            var isFeatured = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "<?php echo e(route('toggle.featured')); ?>",
                method: 'POST',
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    id: courseId,
                    is_featured: isFeatured
                },
                success: function(response) {
                    if(response.status){
                        success(response.message);
                    }else{
                        error(response.message);
                    }
                },
                error: function(xhr) {
                    error(xhr.responseText);
                }
            });
        });

        $('.toggle-status').on('change', function() {
            var courseId = $(this).data('id');
            var isStatus = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "<?php echo e(route('toggle.status')); ?>",
                method: 'POST',
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    id: courseId,
                    status: isStatus
                },
                success: function(response) {
                    if(response.status){
                        success(response.message);
                    }else{
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/administrator/Home/courseList.blade.php ENDPATH**/ ?>