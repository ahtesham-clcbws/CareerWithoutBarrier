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
        <img width="70" src="<?php echo e(asset('images/approvalmark.png')); ?>">
    </div>
    <div >
        <h2 style="color:rgb(35, 33, 33); text-align:center ">Success</h2>
        <p align="center" style="margin-top: 10px; color:rgb(35, 33, 33); text-align:center" id='message'>
            New Student <?php echo e($student->name); ?>  successfully Registered! Mobile Number: <?php echo e($student->mobile); ?>.
        </p>
    </div>
    <?php $__env->startComponent('mail::button', ['url' => route('admin.student', [$student])]); ?>
        Click here
    <?php echo $__env->renderComponent(); ?>
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
<?php /**PATH /mnt/01D9961CD1E189D0/BWS/CareerWithoutBarrier/career-without-barrier/resources/views/mail/admin/student_registration.blade.php ENDPATH**/ ?>