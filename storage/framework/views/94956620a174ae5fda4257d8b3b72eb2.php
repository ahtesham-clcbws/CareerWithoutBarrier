<?php $__env->startSection('title'); ?>
Student List
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<style>
  .select2-selection__choice {
    color: black !important;
  }
</style>
<div class="row px-3">
  <div class="col-lg-12">
    <div class="panel panel-default m-t-15">
      <div class="panel-heading m-2 ">
        <div class="row justify-content-space-between py-2">
          <div class="col-md-6 col">
            <h2>Student List</h2>
          </div>
          <div class="col-md-6 col text-end"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importModal">
              Import Student Papers
            </button></div>
        </div>
      </div>

      <div class="panel-body">
        <div class="card alert">
          <div class="card-header">
            
          </div>
          <div class="card-body">
           <a href="<?php echo e(route('admin.print.studentList')); ?>" target="blank" class="btn btn-primary btn-small">Print PDF</a>
            <div class="table-responsive">
              <table class="table table-bordered datatablecl">
                <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Student Name</th>
                    <th>Email/Mobile</th>
                    <th>City & center</th>
                    <th>Application Code</th>
                    <th>Payment & Voucher</th>
                    <th>Scholarship Category</th>
                    <th>Scholarship Opted For</th> 
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <?php
                    $studCode = $student->latestStudentCode;

                    ?>
                    <th scope="row"><?php echo e($loop->index + 1); ?></th>
                    <td><?php echo e($student->name); ?><br>
                      <span><?php echo e($student->gender); ?></span><br>
                      <span><?php echo e($student->dob); ?></span><br>
                    </td>
                    <td><?php echo e($student->email); ?> <br>
                      <?php echo e($student->mobile); ?>

                      <br>
                      <?php echo e($student->login_password); ?>

                    </td>
                    <td><?php echo e($student->district?->name); ?> <hr>
                      <?php ($center = DB::table('districts')->where('id',$student->test_center_a)->first()); ?>                                        
                      <?php echo e($center->name); ?>  
                    </td>
                    <td><?php echo e($studCode?->application_code ? $studCode?->application_code : 'NA'); ?><br>
                      <?php if(!empty($studCode?->roll_no)): ?>
                        <span style="color:red;">R.No:<?php echo e($studCode?->roll_no); ?> </span>
                      <?php endif; ?>
                    </td>
                    <td>

                      <?php ($studentPayment = $student->studentPayment->last()); ?>
                      <?php if(!empty($studentPayment)): ?>
                        
                          <?php echo e($studentPayment->payment_amount); ?>

                      
                      <hr>
                       <?php ($appCode = $student->latestStudentCode); ?>
                      Voucher No : <?php echo e($appCode?->coupan_code ?? '-'); ?>

                      <?php endif; ?>

                    </td>
                    <td><?php echo e($student->scholarShipCategory?->name ?? 'N/A'); ?></td>
                    <td><?php echo e($student->qualifications?->name); ?> <hr> <?php echo e($student->scholarShipOptedFor?->name ?? 'N/A'); ?></td>
                    
                    <td style="text-align:center">
                      <a href="<?php echo e(route('admin.student', $student->id)); ?>" class="btn btn-primary" style="text-decoration: none;"></i> View</a>
                      <!-- <ul style="list-style: none;">
                        <li class="card-option drop-menu">
                          <span class="ti-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link">::</span>
                          <ul class="card-option-dropdown dropdown-menu">
                            <li><a href="<?php echo e($student->id); ?>"><i class="ti-loop"></i> Edit</a></li>
                            <li><a href="#"><i class="ti-menu-alt"></i>Restrict</a></li>
                            <li><a href="#"><i class="ti-menu-alt"></i>Delete</a></li>
                          </ul> -->
                      </li>
                      </ul>
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
<!-- Student paper import start modal -->

<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="importModalLabel">Import Student Papers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('student_papers.import')); ?>" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="row">

            <div class="col">
              <div class="form-group">
                <input required type="file" id="fileInputSection2" class="form-control input-focus" onchange="validateExcel(this)" name="importFile">
                <?php $__errorArgs = ['picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <img class="imagePreviewSection2" src="#" alt="Image Preview" style="display: none;width:100px">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Import</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Student paper import end modal -->
<!-- /#page-content-wrapper -->

<script type="text/javascript" src="<?php echo e(asset('js/admineducationtypes.js')); ?>"></script>
<script>
  $(document).ready(function() {
    $('#generateRollNumber').click(function(event) {
      event.preventDefault();

      $.ajax({
        url: $(this).attr('href'),
        type: 'GET',
        success: function(response) {
          if (response.status) {
            success(response.message);
            location.reload();
          } else {
            error(response.message)
          }
        },
        error: function(xhr) {
          error(xhr.responseText)
        }
      });
    });
    $("#board_name_id").parent().find('textarea').on('click', function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });
  });

  function scholarshipTypesChange(value) {
    var scholarshipCategory = $("#education_name").val();
    console.log("Valur : ", scholarshipCategory);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.post('/administrator/get_scholarship_category', {
      'ids': scholarshipCategory
    }, function(response) {
      console.log("Response:", response);
      if (response.status) {
        var data = response.data;
        if (data != null) {
          $('#board_name_id').empty().append('<option value="">--Select Option--</option>');
          $.each(data, function(index, st) {
            var selected = ({
              {
                $request - > name ?? 'null'
              }
            } == st.id) ? 'selected' : '';
            $('#board_name_id').append('<option value="' + st.id + '" ' + selected + '>' + st.name + '</option>');
          });
        }
      } else {
        error(response.message); // Ensure error function is defined
      }
    });
  }
</script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/01D9961CD1E189D0/BWS/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/dashboard/studentlist.blade.php ENDPATH**/ ?>