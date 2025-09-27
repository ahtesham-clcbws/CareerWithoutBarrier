<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default m-t-15">
            <div class="panel-heading p-2">
                <h5>
                    SignUp Institute:
                </h5>
            </div>
            <div class="panel-body p-3">
                <div class="card alert">
                    <div class="card-body">
                    <a href="<?php echo e(route('print.signup.institute.list')); ?>" target="blank" class="btn btn-primary btn-small">Print PDF</a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th style="text-align:left;">Sr.No.</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Inst.Name & City</th>
                                        <th>Email & Mobile</th>
                                        <th>Interested For</th>
                                        <th style="text-align:left;">Estd. Year</th>                                        
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $__currentLoopData = $institute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institutes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align:left;"><?php echo e($loop->iteration); ?></td>
                                        <td><img src="<?php echo e(asset('/storage/'.$institutes->attachment)); ?>" style="width:50px;height:50px;border:1px solid #c2c2c2;border-radius:5px;"></td>
                    
                                        <td>
                                        
                                        <?php echo e($institutes->name); ?></td>
                                        <td><span class="text-Info"><?php echo e($institutes->institute_name); ?></span></span><br><span style="color:blue;"><?php echo e($institutes->district?->name . ', '.$institutes->state?->name); ?></span></td>
                                        <td><?php echo e($institutes->email); ?><br><?php echo e($institutes->phone); ?></td>
                                        <td><?php echo e($institutes->interested_for); ?></td>
                                        <td style="text-align:left;"><?php echo e($institutes->established_year); ?></td>
                                        <td>
                                           <?php if(!is_null($institutes->signup_at)): ?> <span class="badge rounded-pill bg-success">SignUp Success</span> <?php else: ?> <span class="badge rounded-pill bg-warning text-dark">Pending</span>  <?php endif; ?> 
                                        </td>
                                        <td class="text-end">
                                            <div style="display:flex">

                                                <a _target="blank" href="<?php echo e(route('institute.list.signup',[$institutes])); ?>" class="btn btn-success">
                                                    <i class="bi bi-eye-fill"></i>
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
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/institude/institude_list_signup.blade.php ENDPATH**/ ?>