<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="<?php echo e(asset('admin/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('admin/css/icheck-bootstrap.min.css')); ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

  <link rel="icon" type="image/x-icon" href="<?php echo e(asset('admin/images/logo big size.png')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('admin/css/all.min.css')); ?>">
  <!-- <link rel="stylesheet" href="css/tempusdominus-bootstrap-4.min.css"> -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/css/icheck-bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
  <!-- <link rel="stylesheet" href="css/adminlte.min.css"> -->
  <link rel="stylesheet" href="<?php echo e(asset('admin/css/OverlayScrollbars.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
  <!-- <link rel="stylesheet" href="<?php echo e(asset('/css/bootstrap-icons.css')); ?>"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Asap+Condensed:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans:wght@400;700&amp;display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
  </script>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
  <!-- <script src="<?php echo e(asset('js/dataTables.bootstrap5.js')); ?>"></script> -->
  <script src="<?php echo e(asset('js/dataTables.js')); ?>"></script>
  <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>

  <style>
    .toast-top-right-below {
    top: 20px;
    right:40%;
    height: 100px;
}

.toast-top-right-below .toast-error{
    min-height: 70px;
    opacity: 5 !important;
    font-size: 20px
}
  </style>
</head>

<body>
  <div id="wrapper" class="toggled">
    <div class="overlay"></div>


    <?php echo $__env->make('administrator.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('administrator.layouts.menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Page Content -->
    <div class="content-wrapper" style="min-height: 694.65px; height: 100vh; background-color: #f4f6f9;">
      <!-- Put "@" before include -->
      <!-- include('administrator.layouts.content_header') -->
      <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- /#wrapper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo e(asset('admin/index.js')); ?>"></script>
    <script>
      function success(msg) {
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-right-below",
          "preventDuplicates": false,
          "showDuration": "1000",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",

        }
        toastr.success(msg);
      }

      function error(msg) {
        toastr.options = {
          "closeButton": false,
          "debug": true,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-right-below",
          "preventDuplicates": false,
          "showDuration": "1000",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
    
        }
        toastr.error(msg)
      }

      //       new DataTable('.datatablecl', {
      //     responsive: true
      // });
    </script>
    <?php echo $__env->yieldPushContent('custom-scripts'); ?>
    <?php if (isset($component)) { $__componentOriginal88b0e6813f5b80100a19437aa80e29ba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal88b0e6813f5b80100a19437aa80e29ba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.message','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal88b0e6813f5b80100a19437aa80e29ba)): ?>
<?php $attributes = $__attributesOriginal88b0e6813f5b80100a19437aa80e29ba; ?>
<?php unset($__attributesOriginal88b0e6813f5b80100a19437aa80e29ba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b0e6813f5b80100a19437aa80e29ba)): ?>
<?php $component = $__componentOriginal88b0e6813f5b80100a19437aa80e29ba; ?>
<?php unset($__componentOriginal88b0e6813f5b80100a19437aa80e29ba); ?>
<?php endif; ?>
</body>

</html><?php /**PATH /home/lkaj6m2w9cvv/public_html/resources/views/administrator/layouts/master.blade.php ENDPATH**/ ?>