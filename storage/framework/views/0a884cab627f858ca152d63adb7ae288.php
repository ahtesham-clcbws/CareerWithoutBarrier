<div class="row px-3">
    <div class="col-lg-12">
        <div class="m-t-15 m-2">
            <div class="row justify-content-space-between py-2">
                <div class="col-md-6 col">
                    <h2>Policy Pages</h2>
                </div>
            </div>

            <div class="card">
                <div class="card-body py-0">
                    <div class="table-responsive">
                        <table class="table-bordered datatablecl table">
                            <thead>
                                <tr>
                                    <th class="text-start">S.No</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $policyPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-start"><b><?php echo e($loop->index + 1); ?></b></td>
                                        <td><?php echo e($page->name); ?></td>
                                        <td><?php echo e($page->title); ?></td>
                                        <td><?php echo e($page->slug); ?></td>
                                        <td class="items-end text-end">
                                            <a class="btn btn-primary btn-sm"
                                                href="<?php echo e(route('admin.policy-page-update', $page->id)); ?>">Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
<?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/admin/setting/policy-pages/policy-pages-list.blade.php ENDPATH**/ ?>