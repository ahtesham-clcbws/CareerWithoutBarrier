<div class="row py-2 pl-3 pr-3">
    <div class="container ">
        <div class="row">
            <!--[if BLOCK]><![endif]--><?php if(!$student->testimonial): ?>
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h4> Say About Us:</h4>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form wire:submit="save">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label class="text-muted f-s-12">Write Review</label>
                                        <textarea style="width: 100%;" id="editor" wire:model.live="message"></textarea>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <small class="text-danger"><?php echo e($message); ?></small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>

                                    <div class="form-group">
                                        <label class="text-muted f-s-12">Add screenshot/image</label>
                                        <!--[if BLOCK]><![endif]--><?php if($image && $image->temporaryUrl()): ?>
                                        <br /><img src="<?php echo e($image->temporaryUrl()); ?>" alt="Image Preview" class="mb-1" style="width:200px">
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <input type="file" class="form-control input-focus" wire:model.live="image">
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <small class="text-danger"><?php echo e($message); ?></small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>

                                    <button type="submit" class="btn btn-warning ">
                                        <div class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="save">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <div class="<?php echo e($student->testimonial ? 'col-md-12' : 'col-md-6'); ?> ">
                <div class="card-header">
                    <h4> Said About Us:</h4>
                </div>
                <div class="card">
                    <!--[if BLOCK]><![endif]--><?php if($student->testimonial): ?>
                    <div class=" mb-4">
                        <div class="card-header text-end">
                            <!-- <a href="#">Edit</a> -->&nbsp;
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7 col">
                                    <h5 class="card-title"><b>Name: </b><?php echo e($student->testimonial->name); ?></h5>
                                    <p class="card-text"><b>Message: </b><?php echo $student->testimonial->message; ?></p>
                                </div>
                                <div class="col-md-5 col"> <!--[if BLOCK]><![endif]--><?php if($student->testimonial->image): ?>
                                    <img src="<?php echo e(asset('/storage/' . $student->testimonial->image)); ?>" class="card-img-top" alt="<?php echo e($student->testimonial->name); ?>">
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php else: ?>
                    <div class="">
                        <h6 class="m-3">You have not submitted a testimonial yet.</h6>
                    </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>

            </div>
        </div>
    </div>
</div><?php /**PATH /run/media/ahtesham/Weblies/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/student/add-testimonial.blade.php ENDPATH**/ ?>