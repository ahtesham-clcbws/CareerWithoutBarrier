
<?php $__env->startSection('content'); ?>

<style>
  .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }

  .pagination>.page-item>.page-link {
    color: #000000;
    border: 1px solid #3c4248;
    margin: 0 5px;
    font-size: 15px;
  }

  .pagination>.page-item>.page-link:hover {
    background-color: #f8f9fa;
  }

  .pagination>.page-item.active>.page-link {
    background-color: #007bff;
    border-color: #007bff;
  }

  .pagination>.page-item.disabled>.page-link {
    color: #6c757d;
    pointer-events: none;
    cursor: default;
  }

  .boxShadow {
    margin: 10px auto;
    background-color: #fff;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .pagination .page-item .page-link span {
    font-size: 1rem;
    /* Adjust the font size as needed */
  }

  .appliedCount{
    cursor: pointer;
  }
</style>

<h4 style="padding-top: 10px;padding-left: 10px;">
      Discount Voucher Details: <?php echo e($corporate->name); ?>

    </h4>
<div class="row">
  <div class="col-lg-11 col-md-11 col" style="margin-left: auto;margin-right:auto">
   
    <div class="container boxShadow d-flex">
      <div class="row headerGridBox mb-3" style="width: 100%;">
        <div class="col-md-2 col-2">
          <label for="couponCode">Coupon Code:</label>
          <select class="form-select text-center" id="couponCode">
            <option value="">--Select Coupon Code--</option>
            <?php $__currentLoopData = $coupons->whereNotNull('prefix')->pluck('prefix','prefix'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <div class="col-md-2 col-2">
          <label for="couponValue">Code Value:</label>
          <div class="couponValue" style="text-align: center;padding: 6px;border-radius: .2rem;    height: 2.3rem;border: 1px solid #d6d6d6;">
            <?php echo e($codeValue); ?>

          </div>
        </div>
        <div class="col-md-2 col-2">
          <label for="prefixtxt">Prefix:</label>
          <div class="prefixtxt" style="text-align: center;padding: 6px;border-radius: .2rem;    height: 2.3rem;border: 1px solid #d6d6d6;">
            <?php echo e($prefix); ?>

          </div>
        </div>
        <div class="col-md-2 col-2">
          <label for="totalcount">Total Count:</label>
          <div class="totalcount" style="text-align: center;padding: 6px;border-radius: .2rem;    height: 2.3rem;border: 1px solid #d6d6d6;">
            <?php echo e($counts); ?>

          </div>
        </div>
        <div class="col-md-2 col-2">
          <label for="issuedCount">Issued Coupon:</label>
          <div class="issuedCount" style="text-align: center;padding: 6px;border-radius: .2rem; height: 2.3rem;border: 1px solid #d6d6d6;">
            <?php echo e($issuedCount); ?>

          </div>
        </div>
        <div class="col-md-2 col-2">
          <label for="appliedCount">Applied Coupon:</label>
          <div class="appliedCount" style="text-align: center;padding: 6px;border-radius: .2rem; height: 2.3rem;border: 1px solid #d6d6d6;">
            <?php echo e($appliedCount); ?>

          </div>
        </div>
      </div>
    </div>
    <table class="table table-striped datatablecl" style="width:100%">
      <thead class="thead-light">
        <tr>
     
          <th>Sr.No.</th>
          <th>Prefix</th>
          <th>Name</th>
          <th>Coupon Code</th>
          <th >Status</th>
        </tr>
      </thead>
      <tbody class="table-striped table-striped-coupon">

        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td style="font-size: 13px"><?php echo e($loop->index+1); ?></td>
          <td style="font-size: 13px"><?php echo e($coupon->prefix); ?></td>
          <td style="font-size: 13px"><?php echo e($coupon->name); ?></td>
          <td style="font-size: 13px"><?php echo e($coupon->couponcode); ?></td>
          <td style="font-size: 13px"><?php echo e($coupon->status ? ($coupon->is_applied ? 'Applied' : 'Active') : 'Inactive'); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>

  </div>
</div>
</div>
<script>
  $(document).ready(function() {

    var areRowsHidden = true; // Flag to track if rows are hidden
    
    $('.appliedCount').click(function() {
        $('.table-striped.datatablecl tbody tr').each(function() {
            if ($(this).find('td:last').text().trim() === 'Applied') {
                $(this).toggle(areRowsHidden); // Toggle visibility of rows with 'Applied'
            } else {
                $(this).toggle(!areRowsHidden); // Toggle visibility of other rows
            }
        });
        areRowsHidden = !areRowsHidden; // Toggle the flag value
    });


    $('#selectAll').click(function() {
      $('.selectSingle').prop('checked', this.checked);
    });

    $('.selectSingle').click(function() {
      if ($('.selectSingle:checked').length == $('.selectSingle').length) {
        $('#selectAll').prop('checked', true);
      } else {
        $('#selectAll').prop('checked', false);
      }
    });


    $('#couponCode').change(function() {
      var name = $(this).val();
      $.ajax({
        url: "<?php echo e(route('corporate.couponlist')); ?>/<?php echo e($corporate->id); ?>",
        type: "POST",
        data: {
          _token: "<?php echo e(csrf_token()); ?>",
          name: name
        },
        success: function(response) {
          console.log(response);
          $('.table-striped-coupon').empty();

          $('.couponValue').text(response.codeValue);
          $('.prefixtxt').text(response.prefix);
          $('.totalcount').text(response.counts);
          $('.appliedCount').text(response.appliedCount);
          $('.issuedCount').text(response.issuedCount);

          $.each(response.coupons, function(index, coupon) {
            var row = "<tr>" +
              "<td><input type='checkbox' class='selectSingle'></td>" +
              "<td style='font-size: 13px'>" + (parseInt(index)+1) + "</td>" +
              "<td style='font-size: 13px'>" + coupon.prefix + "</td>" +
              "<td style='font-size: 13px'>" + coupon.name + "</td>" +
              "<td style='font-size: 13px'>" + coupon.couponcode + "</td>" +
              "<td style='font-size: 13px'>" + (coupon.status ? (coupon.is_applied ? 'Applied' : 'Active') : 'Inactive') + "</td>" +
              "</tr>";
            $('.table-striped-coupon').append(row);
          });
        },
        error: function(xhr, status, error) {
          // Handle error response
          console.error(xhr.responseText);
        }
      });
    });
  });


</script>
<!-- /#page-content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('corporate.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/corporate/dashboard/corporate_coupon_list.blade.php ENDPATH**/ ?>