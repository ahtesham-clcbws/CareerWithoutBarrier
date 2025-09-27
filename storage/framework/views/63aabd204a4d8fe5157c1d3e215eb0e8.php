<?php if (isset($component)) { $__componentOriginalaa758e6a82983efcbf593f765e026bd9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa758e6a82983efcbf593f765e026bd9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => $__env->getContainer()->make(Illuminate\View\Factory::class)->make('mail::message'),'data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('mail::message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    Hello!
    <br>
    <div style="text-align: center">
        <img src="<?php echo e(asset('images/approvalmark.png')); ?>" width="70">
    </div>
    <div>
        <h2 style="color:rgb(35, 33, 33); text-align: center;">Student Registration Successful</h2>
        <br />
        <p id='message' style="margin-top: 10px; color:rgb(35, 33, 33); text-align:center" align="center">
            Student's Name: <b><?php echo e($student->name); ?></b><br />
            Mobile Number: <b><?php echo e($student->mobile); ?></b>.
        </p>
        <br />
        <?php $__env->startComponent('mail::button', ['url' => route('admin.student', [$student->id])]); ?>
            Click here to view
        <?php echo $__env->renderComponent(); ?>
    </div>
    <br> <br>
    Thanks
    Best regards,<br>
    <?php echo e(config('app.name')); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8fc086857aa7fb0c80bd697fa28a65de)): ?>
<?php $attributes = $__attributesOriginal8fc086857aa7fb0c80bd697fa28a65de; ?>
<?php unset($__attributesOriginal8fc086857aa7fb0c80bd697fa28a65de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8fc086857aa7fb0c80bd697fa28a65de)): ?>
<?php $component = $__componentOriginal8fc086857aa7fb0c80bd697fa28a65de; ?>
<?php unset($__componentOriginal8fc086857aa7fb0c80bd697fa28a65de); ?>
<?php endif; ?>
<?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/mail/admin/admin_student_registration.blade.php ENDPATH**/ ?>