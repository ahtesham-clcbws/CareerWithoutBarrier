<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default m-t-15">
      <div class="panel-heading p-2">
        <h5>
        New Institude Enquiry:
        </h5></div>
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
                    <td><img src="<?php echo e(asset('public/upload/corporate/'.$institutes->attachment)); ?>" style="width:50px;height:50px;border:1px solid #c2c2c2;border-radius:5px;"></td>
                    
                    <td><?php echo e($institutes->name); ?></td>
                    <td><?php echo e($institutes->institute_name); ?> <br><span style="color:blue"><?php echo e($institutes->city); ?></span></td>
                    <td><?php echo e($institutes->email); ?> <br> <?php echo e($institutes->phone); ?></td>
                    <td><?php echo e($institutes->interested_for); ?></td>
                    <td class="color-primary"><?php echo e($institutes->established_year); ?></td>
                    <td class="text-end" >
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
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/dashboard/institude/institude_list_new.blade.php ENDPATH**/ ?>