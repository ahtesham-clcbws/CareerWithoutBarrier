 <?php $__env->slot('title', null, []); ?> <?php echo e($page->title); ?> <?php $__env->endSlot(); ?>
<div>
    <div class="w-100" style="margin-top:72px;background-color:#f26b3c;">
        <div class="container py-5 pb-4 text-center">
            <h2 class="text-white" style="font-size:32px"><?php echo e($page->title); ?></h2>
        </div>
    </div>


    <div class="container py-5">
        <div class="row">
            <div class="col prose max-w-none">
                <?php echo $page->content; ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/website/policy-page-frontend.blade.php ENDPATH**/ ?>