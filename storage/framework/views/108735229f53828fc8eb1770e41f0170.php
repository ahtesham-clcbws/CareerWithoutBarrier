
<?php $__env->startSection('content'); ?>

<?php

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

$country = "";
$state = '';
$city = '';

if ($center?->state_id) {
   $state = DB::table('states')->where('id', $center?->state_id)->first()?->name;
}


?>
<style>
    .line-with-button {
            position: relative;
        }
        .round-button {
         position: absolute;
         right: 0;
         margin-top: -16px;
         margin-right: 26px;
         transform: translateY(-50%);
         background-color: #007bff;
         color: white;
         border: none;
         border-radius: 50%;
         width: 30px;
         height: 30px;
         text-align: center;
         cursor: pointer;
}
        .round-button:focus {
            outline: none;
        }
</style>
<div class="container pagecontentbody">
   <div class="tab-content">
      <div class="row pt-3">
         <div class="col">
            <h5>
               Add Exam Center
            </h5>
         </div>
      </div>
      <div class="pagebody row pt-2">
         <div class="container col-md-9" style="border: 1px solid #c6cbd0;padding: 8px 25px;">
            <form method="post" action="<?php echo e(route('admin.saveCenter')); ?>" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>
               <input type="hidden" name="id" value="<?php echo e($center?->id); ?>" autocomplete="off">
               <div class="row mt-2 ">
                  <div class="col-md-6 col mb-2">
                     <label class="form-label">State<span class="text-danger">*</span></label>
                     <select name="state_id" class="form-control form-select" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" id="state" onchange="selectDisctrict(this.value)" required>
                        <option value="">--Select state--</option>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($state->id); ?>" <?php echo e($center?->state_id == $state->id ? 'selected' : ''); ?>><?php echo e($state->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </select>
                     <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-md-6 col mb-2">
                     <label class="form-label">City<span class="text-danger">*</span></label>
                     <select name="city_id" class="form-control form-select" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" id="district" required>
                        <option value="">--Select City--</option>
                     </select>
                     <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-md-6 mb-2">
                     <label class="form-label">Test Center A<span class="text-danger">*</span></label>
                     <input required pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Test Center A" value="<?php echo e($center?->center_name); ?>" name="center_namea" />
                     <?php $__errorArgs = ['center_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-md-6 mb-2">
                     <label class="form-label">Test Center B</label>
                     <input  pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Test Center B" value="" name="center_nameb" />
                     <?php $__errorArgs = ['center_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-md-6 col mb-2">
                     <label class="form-label">Address<span class="text-danger">*</span></label>
                     <input required class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="addressa" placeholder="Enter address" value="<?php echo e($center?->address); ?>" required />
                     <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-md-6 col mb-2">
                     <label class="form-label">Address</label>
                     <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="addressb" placeholder="Enter address" value="" />
                     <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-md-6 col mb-2">
                     <label class="form-label">Landmark<span class="text-danger">*</span></label>
                     <input required type="text" placeholder="Enter landmark" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="landmarka" value="<?php echo e($center?->landmark); ?>" />
                     <?php $__errorArgs = ['landmark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-md-6 col mb-2">
                     <label class="form-label">Landmark</label>
                     <input type="text" placeholder="Enter landmark" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="landmarkb" value="" />
                     <?php $__errorArgs = ['landmark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-md-6 col col mb-2">
                     <label class="form-label">Pincode<span class="text-danger">*</span><small>[Max Digits:6]</small></label>
                     <input required type="text" pattern="[0-9]{6}" placeholder="Enter pincode" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="pincodea" value="<?php echo e($center?->pincode); ?>" required />
                     <?php $__errorArgs = ['pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-md-6 col col mb-2">
                     <label class="form-label">Pincode<small>[Max Digits:6]</small></label>
                     <input type="text" pattern="[0-9]{6}" placeholder="Enter pincode" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="pincodeb" value="" />
                     <?php $__errorArgs = ['pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
               </div>
               <hr class="line-with-button">
               <span class="round-button add-center-c">+</span>
               <div class="row center-c-cl" style="display: none;">
                  <div class="col-md-6 mb-2">
                     <label class="form-label">Test Center C</label>
                     <input pattern="[A-Za-z ]+" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" placeholder="Test Center C" value="" name="center_namec" />
                     <?php $__errorArgs = ['center_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-md-6 col mb-2">
                     <label class="form-label">Address<span class="text-danger">*</span></label>
                     <input class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="addressc" placeholder="Enter address" value=""  />
                     <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-md-6 col mb-2">
                     <label class="form-label">Landmark</label>
                     <input type="text" placeholder="Enter landmark" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="landmarkc" value="" />
                     <?php $__errorArgs = ['landmark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-md-6 col col mb-2">
                     <label class="form-label">Pincode<span class="text-danger">*</span><small>[Max Digits:6]</small></label>
                     <input type="text" pattern="[0-9]{6}" placeholder="Enter pincode" class="form-control" style="height:calc(2rem + 2px) !important; padding:0 0 0 3px !important" name="pincodec" value="" />
                     <?php $__errorArgs = ['pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <div class="text-danger"><?php echo e($message); ?></div>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  <div class="col-12">
                     <hr />
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="col-md-3 d-grid">
                     <button type="submit" class="btn btn-theme btn-primary submitform">Add Center</button>
                  </div>

               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<script>
   function selectDisctrict(state) {
      console.log(state)
      console.log('vvv')
      if (state) {
         fetchDistricts(state);
      } else {
         $('#district').html('<option value="">--Select district--</option>');
      }
   }
   $('.add-center-c').on('click',function(){
      $('.center-c-cl').toggle();

     if($('.center-c-cl').is(':visible')){
      $('.add-center-c').text('-');
     }else
     {
      $('.add-center-c').text('+');
     }

      $('.center-c-cl').each(function() {
        var $this = $(this);
    });
   })
   $('#state').val(<?php echo e($center?-> state_id ?? 'null'); ?>).trigger('change');

   // Function to fetch subjects based on subcategory
   function fetchDistricts(state) {
      $.get('/districts/' + state, function(data) {
         $('#district').empty().append('<option value="">--Select District/City--</option>');
         $.each(data, function(index, district) {
            var selected = (<?php echo e($center?->city_id ?? 'null'); ?> == district.id) ? 'selected' : '';
            $('#district').append('<option value="' + district.id + '" ' + selected + '>' + district.name + '</option>');
         });
      });
   }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/administrator/center/add_center.blade.php ENDPATH**/ ?>