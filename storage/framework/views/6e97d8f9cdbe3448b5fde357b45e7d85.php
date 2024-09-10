

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default m-t-15">
      <div class="panel-heading p-2">
        <h5>
          Approved Institude:
        </h5>
      </div>
      <div class="panel-body p-3">
        <div class="card alert">
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Name</th>
                    <th>Inst.Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Interested For</th>
                    <th>Estd. Year</th>
                    <th>City</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php $__currentLoopData = $institute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institutes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                    <td><?php echo e($institutes->name); ?></td>
                    <td><?php echo e($institutes->institute_name); ?></td>
                    <td><?php echo e($institutes->email); ?></td>
                    <td><?php echo e($institutes->phone); ?></td>
                    <td><?php echo e($institutes->interested_for); ?></td>
                    <td class="color-primary"><?php echo e($institutes->established_year); ?></td>
                    <td><?php echo e($institutes->city); ?></td>
                    <td class="text-end" >
                      <div style="display:flex">

                      <a _target="blank" href="<?php echo e(route('institute.view',[$institutes])); ?>" class="btn btn-success">
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
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/administrator/dashboard/institude/institude_list.blade.php ENDPATH**/ ?>