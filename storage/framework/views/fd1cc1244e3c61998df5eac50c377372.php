<div>
    <div class="w-100" style="margin-top:72px;background-color:#f26b3c;">
        <div class="container text-center py-5 pb-4">
            <h2 style="font-size:32px" class="text-white">Institutes list</h2>
        </div>
    </div>
    <style>
        .small {
            font-size: 80%;
        }
    </style>
    <div class="container py-5">
        <div class="d-flex flex-column flex-lg-row justify-content-between">
            <div class="d-flex gap-2">
                <div class="input-group mb-3 w-auto">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="selectCity">Select city</label>
                    </div>
                    <select class="custom-select" id="selectCity" wire:model.change="selectedCity">
                        <option selected value=''>All</option>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city); ?>"><?php echo e($city); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                </div>
                <div class="input-group ml-3 mb-3 w-auto">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="showEntries">Show</label>
                    </div>
                    <select class="custom-select" id="showEntries" wire:model.change="entriesPerPage">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $entiresArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($entry); ?>"><?php echo e($entry == 0 ? 'All' : $entry); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </select>
                </div>
            </div>

            <div class="input-group mb-3 w-auto">
                <input type="text" class="form-control" placeholder="Search ..." aria-label="Search" wire:model.live="query">
                <div class="input-group-append">
                    <i class="input-group-text fa fa-search"></i>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="institutes-table">
                <thead>
                    <tr>
                        <th scope="col"><small class="font-weight-bold">#</small>
                        <th scope="col"><small class="font-weight-bold">City</small>
                        <th scope="col"><small class="font-weight-bold">Authorised person</small>
                        <th scope="col"><small class="font-weight-bold">Institute/School/Person<br />E-mail & Mobile</small>
                        <th scope="col"><small class="font-weight-bold">Address</small>
                        <th scope="col"><small class="font-weight-bold">100% Discount<br />Coupon/Applied Coupon</small>
                        <th scope="col"><small class="font-weight-bold">Other Discount<br />Coupon upto 60%</small>
                    </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $institutes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td class="small"><?php echo e($loop->index +1); ?></td>
                        <td class="small text-primary"><?php echo e($institute->city); ?></td>
                        <td class="small">
                            <div class="media text-muted d-flex flex-column">
                                <img
                                    data-src="<?php echo e(asset('upload/corporate/'.$institute->attachment)); ?>"
                                    alt="<?php echo e($institute->name); ?>"
                                    class="mr-2 rounded d-block"
                                    style="width: 32px; height: 32px;"
                                    src="<?php echo e(asset('upload/corporate/'.$institute->attachment)); ?>"
                                    data-holder-rendered="true">
                                <p class="media-body pb-3 mb-0 lh-125 text-primary">
                                    <?php echo e($institute->name); ?>

                                </p>
                            </div>
                            <!-- <?php echo e($institute->attachment); ?><br /> -->
                            <!-- <?php echo e($institute->name); ?> -->
                        </td>
                        <td class="small">
                            <span class="text-primary"><?php echo e($institute->institute_name); ?></span><br />
                            <?php echo e($institute->email); ?><br />
                            <?php echo e($institute->phone); ?>

                        </td>
                        <td class="small"><?php echo e($institute->address); ?>, <?php echo e($institute->pincode); ?></td>
                        <td>
                            <small class="text-danger font-weight-bold">Limited</small><br />
                            <span class="badge badge-success px-3 py-2">100% Free <i class="fa fa-check"></i></span>
                        </td>
                        <td>
                            <small class="text-danger font-weight-bold">Available</small><br />
                            <span class="badge badge-primary px-3 py-2">Upto 60% <i class="fa fa-check"></i></span>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>

        <!--[if BLOCK]><![endif]--><?php if($entriesPerPage > 0): ?>
        <div class="">
            <?php echo e($institutes->links()); ?>

        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    </div>
</div><?php /**PATH /mnt/01D9961CD1E189D0/BWS/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/pages/free-form.blade.php ENDPATH**/ ?>