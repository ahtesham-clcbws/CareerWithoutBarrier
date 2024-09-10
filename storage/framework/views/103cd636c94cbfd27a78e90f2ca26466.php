
<?php $__env->startSection('title'); ?>
Testimonials
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 col">
        <h4 style="margin-top: 10px;margin-left:10px">Student And Institude Testimonials List:</h4>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sr.N.</th>
                        <th>Profile Pic</th>
                        <th>Message</th>
                        <th>Is Featured</th>
                        <th>Type</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                        <td> <img src="<?php echo e(asset('home/' . $testimonial->image)); ?>" style="width: 100px;border-radius:10px"></td>
                        <td width="40%"><?php echo $testimonial->message; ?></td>
                        <td>
                            <div class="form-control2">
                                            <label class="switch" for="testimonial-<?php echo e($testimonial->id); ?>">
                                                <input type="checkbox" id="testimonial-<?php echo e($testimonial->id); ?>" data-id="<?php echo e($testimonial->id); ?>" class="testimonial-status-toggle" <?php echo e($testimonial->status ? 'checked' : ''); ?>>
                                                <div class="slider round">
                                                    <span class="off">No</span>
                                                    <span class="on">Yes</span>
                                                </div>
                                            </label>
                                        </div>
                        </td>
                        <td> <?php echo e(ucfirst($testimonial->type)); ?></td>
                        <td><?php echo e($testimonial->created_at->diffForHumans()); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $('.testimonial-status-toggle').on('change', function() {
        var courseId = $(this).data('id');
        var isFeatured = $(this).is(':checked') ? 1 : 0;

        $.ajax({
            url: "<?php echo e(route('testimonial.toggle.status')); ?>",
            method: 'POST',
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                id: courseId,
                status: isFeatured
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
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/01D9961CD1E189D0/BWS/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/testimonials.blade.php ENDPATH**/ ?>