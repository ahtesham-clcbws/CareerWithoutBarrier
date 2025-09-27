<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default m-t-15">
            <div class="panel-heading p-2">
                <h5>
                    New Institute Enquiry:
                </h5>
            </div>
            <div class="panel-body p-3">
                <div class="card alert">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <a href="<?php echo e(route('print.new.institute.enquiry')); ?>" target="blank" class="btn btn-primary btn-small">Print PDF</a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Sr.No.</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Inst.Name & City</th>
                                        <th>Email & Mobile</th>
                                        <th>Interested For</th>
                                        <th>Estd. Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $__currentLoopData = $institute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institutes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                                        <td>
                                            <?php if($institutes->attachment): ?>
                                            <img src="<?php echo e(asset('/storage/'.$institutes->attachment)); ?>" style="width:50px;height:50px;border:1px solid #c2c2c2;border-radius:5px;">
                                            <?php else: ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 100 100">
                                                <rect width="100%" height="100%" fill="#000000" />
                                                <path fill="#FFA500" d="M36.015 37.99h3.79v23.14h-2.2q-.52 0-.86-.17-.34-.17-.66-.57l-12.08-15.42q.09 1.06.09 1.95v14.21h-3.79V37.99h2.26q.27 0 .47.03.2.02.35.09.15.08.3.21.14.14.32.36l12.12 15.49-.08-1.1q-.03-.55-.03-1.01V37.99Zm20.35-.64-9.28 23.83q-.27.73-.87 1.1-.6.37-1.22.37h-1.68l9.34-23.9q.26-.68.79-1.04.52-.36 1.23-.36h1.69Zm8.37 15.04h7.36l-2.81-7.69q-.21-.51-.44-1.22-.22-.7-.44-1.52-.21.82-.44 1.53-.22.71-.43 1.24l-2.8 7.66Zm5.87-14.4 9.09 23.14h-3.33q-.56 0-.91-.28t-.53-.7l-1.72-4.72h-9.59l-1.73 4.72q-.12.37-.49.68-.37.3-.91.3h-3.36l9.1-23.14h4.38Z" />
                                            </svg>
                                            <?php endif; ?>
                                        </td>

                                        <td><?php echo e($institutes->name); ?></td>
                                        <td><?php echo e($institutes->institute_name); ?> <br><span style="color:blue"><?php echo e($institutes->district?->name . ', '.$institutes->state?->name); ?></span></td>
                                        <td><?php echo e($institutes->email); ?> <br> <?php echo e($institutes->phone); ?></td>
                                        <td><?php echo e($institutes->interested_for); ?></td>
                                        <td class="color-primary"><?php echo e($institutes->established_year); ?></td>
                                        <td class="text-end">
                                            <div style="display:flex">

                                                <a _target="blank" href="<?php echo e(route('institute.list.new',[$institutes])); ?>" class="btn btn-success">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                <a _target="blank" href="#" class="deletebutton ms-1 btn btn-danger">
                                                    <i class="bi bi-trash2"></i>
                                                </a>
                                            </div>

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

<!-- /#page-content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/institude/institude_list_new.blade.php ENDPATH**/ ?>