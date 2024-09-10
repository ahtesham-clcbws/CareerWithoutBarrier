<!-- resources/views/home.blade.php -->


<?php $__env->startSection('title', 'Home Page'); ?>


<?php $__env->startSection('content'); ?>
<div class="perpration-page-banner common-banner" style="margin-top:72px;">
    <div class="container text-center py-5 pb-4">
        <h2 style="font-size:32px">CAREER wthout BARRIER 15 SCHOLARSHIP PROGRAM's</h2>
    </div>
</div>

<div class="scolarship-programe">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-12">
                <?php $__currentLoopData = $scholarShips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $scholarShip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="scolarship-leftpanel mb-3">
                    <div class="scolarship-leftpanel-widget d-flex" data-target="content<?php echo e($key+1); ?>" style="cursor: pointer;">
                        <div class="scolarship-leftpanel-img d-flex justify-content-center align-items-center">
                            <img style="max-width: 80px;" class="img-fluid" src="<?php echo e(asset('home/aboutus/'.$scholarShip->icon)); ?>" alt="img">
                        </div>
                        <div class="scolarship-leftpanel-content text-center">
                            <h4><?php echo e($scholarShip->educationType?->name); ?></h4>
                            <p><?php echo e($scholarShip->remark); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-12">
                <?php $__currentLoopData = $scholarShips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $scholarShip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="scolarship-rightpanel-content text-center content<?php echo e($key+1); ?> h-100" style="<?= $key == 0 ? '' : 'display:none' ?>">
                    <div class="scolarship-programe-img h-100">
                        <img class="img-fluid" src="<?php echo e(asset('home/aboutus/'.$scholarShip->picture)); ?>" alt="img">
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__currentLoopData = $scholarShips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $scholarShip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$imageExtensions = ['jpeg', 'jpg', 'png', 'jpeg', 'gif'];
$prospectusPath = null;
$guidelinePath = null;
$prospectusExtension = null;
$guidelineExtension = null;

$scholarOverview = $scholarShip->overview;
if ($scholarOverview) {
    $prospectusPath = 'home/aboutus/' . $scholarOverview->prospectus;
    $guidelinePath = 'home/aboutus/' . $scholarOverview->guideline;
    $prospectusExtension = pathinfo($prospectusPath, PATHINFO_EXTENSION);
    $guidelineExtension = pathinfo($guidelinePath, PATHINFO_EXTENSION);
}
?>

<div class="career-overview career-overview-content content<?php echo e($key+1); ?>" style="<?= $key == 0 ? '' : 'display:none' ?>">
    <div class="container">
        <div class="career-overview-header d-flex mb-5 align-items-center flex-wrap">
            <h2 class="mr-auto mb-0"><?php echo e($scholarShip->educationType?->name); ?></h2>
            <div class="e-prospectus d-flex align-items-center">
                <?php if(in_array($prospectusExtension, $imageExtensions)): ?>
                <a href="#" class="d-flex align-items-center mr-3 e-prospectus-link">
                    <img class="mr-2" src="<?php echo e(asset($prospectusPath)); ?>" alt="icon">
                    <span>E-prospectus</span>
                </a>
                <?php else: ?>
                <a href="<?php echo e(asset($prospectusPath)); ?>" class="d-flex align-items-center mr-3 e-prospectus-link" target="_blank">
                    <span>E-prospectus (PDF)</span>
                </a>
                <?php endif; ?>

                <?php if(in_array($guidelineExtension, $imageExtensions)): ?>
                <a href="#" class="d-flex align-items-center e-prospectus-link">
                    <img class="mr-2" src="<?php echo e(asset($guidelinePath)); ?>" alt="icon">
                    <span>Guidelines</span>
                </a>
                <?php else: ?>
                <a href="<?php echo e(asset($guidelinePath)); ?>" class="d-flex align-items-center e-prospectus-link" target="_blank">
                    <span>Guidelines (PDF)</span>
                </a>
                <?php endif; ?>
            </div>
        </div>
        <?php if($scholarOverview?->overview): ?>
        <div class="career-overview-content content<?php echo e($key+1); ?>">
            <?php echo str_replace('img','img style="max-width: 100%;"',$scholarOverview->overview); ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    $(document).ready(function() {
        $('.scolarship-leftpanel-widget').on('click', function() {
            var targetId = $(this).data('target');


            if ($('.scolarship-leftpanel-widget').hasClass('active')) {
                $('.scolarship-leftpanel-widget').removeClass('active')
            }

            $(this).addClass('active')

            $('.scolarship-rightpanel-content').hide();
            $('.career-overview-content').hide();
            // Show the targeted content
            $('.' + targetId).show();
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/01D9961CD1E189D0/BWS/CareerWithoutBarrier/career-without-barrier/resources/views/website/scholarship.blade.php ENDPATH**/ ?>