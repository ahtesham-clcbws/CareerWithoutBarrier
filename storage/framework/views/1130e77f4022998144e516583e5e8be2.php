<?php $__env->startSection('content'); ?>
<style>
   .inside-table>thead>tr>th {
      border-color: #ccc;
      background-color: #fff;
      color: black
   }

   .inside-table thead {
      background-color: #fff !important;
      border-bottom: 1px solid #ccc
   }

   .inside-table> :not(:last-child)> :last-child>* {
      border-bottom-color: #ccc
   }
</style>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default m-t-15">
      <div class="panel-heading m-4 ">
        <h2>Exam Center List</h2>
      </div>
      <div class="panel-body px-3">
        <div class="card alert">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered datatablecl">
                <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Center Name</th>
                    <th>Address</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Landmark</th>
                    <th>Pincode</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $centers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $center): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <th scope="row"><?php echo e($loop->index+1); ?></th>
                    <td><?php echo e($center->center_name); ?></td>
                    <td><?php echo e($center->address); ?></td>
                    <td><?php echo e($center->state?->name); ?></td>
                    <td><?php echo e($center->city?->name); ?></td>
                    <td><?php echo e($center->landmark); ?></td>
                    <td><?php echo e($center->pincode); ?></td>
                    <td style="text-align:center">
                      <a href="<?php echo e(route('admin.createCenter', $center->id)); ?>" class="btn btn-primary" style="text-decoration: none;"></i> Edit</a>
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
</div>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/administrator/center/list_center.blade.php ENDPATH**/ ?>