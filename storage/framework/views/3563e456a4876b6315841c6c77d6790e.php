<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', env('APP_NAME')); ?></title>

    <link rel="stylesheet" href="<?php echo e(asset('admin/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/icheck-bootstrap.min.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="shortcut icon" href="<?php echo e(asset('website/assets/images/fav-icon.png')); ?>" type="image/x-icon">

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
    <link href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/3.1.1/css/buttons.dataTables.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo e(asset('css/datatable.css')); ?>">
    <script src="<?php echo e(asset('js/dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('js/common.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>

    <style>
        .toast-top-right-below {
            top: 20px;
            right: 40%;
            height: 100px;
            color: black !important;
        }


        .toast-top-right-below .toast-error {
            min-height: 70px;
            opacity: 5 !important;
            font-size: 20px;
        }

        .field-icon {
            float: right;
            margin-right: 14px;
            margin-top: -29px;
            position: relative;
            z-index: 2;
            opacity: 0.6;
            cursor: pointer;

        }
    </style>
    <script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>

    <!-- Initialize CKEditor -->
    <script>
        CKEDITOR.instances['IdOfCKEditorTextArea'].setData(data['body']);
    </script>
</head>

<body>
    <div id="wrapper" class="toggled">
        <div class="overlay"></div>

        <?php echo $__env->make('administrator.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('administrator.layouts.menubar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page Content -->
        <div class="content-wrapper" style="background-color: #f4f6f9;">
            <!-- Put "@" before include -->
            <!-- include('administrator.layouts.content_header') -->

            <?php echo $__env->yieldContent('content'); ?>

        </div>

        <!-- /#wrapper -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>

        <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.colVis.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.min.css" rel="stylesheet">

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
                    "showDuration": "2000",
                    "hideDuration": "2000",
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
                    "showDuration": "2000",
                    "hideDuration": "2000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",

                }
                toastr.error(msg)
            }

            new DataTable('.table-striped.datatablecl', {
                responsive: true,
                "iDisplayLength": 10,
                "aLengthMenu": [
                    [5, 10, 25, 50, 100, 600, -1],
                    [5, 10, 25, 50, 100, 600, "All"]
                ]
            });
            new DataTable('.table-bordered.datatablecl', {
                responsive: true,
                "iDisplayLength": 10,
                "aLengthMenu": [
                    [5, 10, 25, 50, 100, 600, -1],
                    [5, 10, 25, 50, 100, 600, "All"]
                ]
            });
            new DataTable('.table-bordered.datatablecll', {
                responsive: true,
                "iDisplayLength": 10,
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }]
            });
        </script>

        <script>
            $(".toggle-password").on('click', function() {
                console.log('sasas')
                var input = $(this).prev('input')
                $(this).toggleClass("fa-eye fa-eye-slash");
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        </script>

        <script>
            function toggleStatus(element, $type) {

                var id = $(element).data('id');
                var isStatus = $(element).is(':checked') ? 1 : 0;

                $.ajax({
                    url: "<?php echo e(route('about_us.toggleStatus')); ?>",
                    method: 'POST',
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        id: id,
                        status: isStatus,
                        form_type: $type
                    },
                    success: function(response) {
                        if (response.status) {
                            success(response.message);
                        } else {
                            error(response.message);
                        }
                    },
                    error: function(xhr) {
                        error(xhr.responseText);
                    }
                });
            };
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
        <script>
            // var tomSelectConfig = {};
            // new TomSelect('.tom-select', tomSelectConfig);
        </script>
        <script>
            new DataTable('#example');

            // $('.panel-collapse').collapse()
            // $('body').
        </script>
</body>

</html><?php /**PATH /mnt/01D9961CD1E189D0/BWS/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/layouts/master.blade.php ENDPATH**/ ?>