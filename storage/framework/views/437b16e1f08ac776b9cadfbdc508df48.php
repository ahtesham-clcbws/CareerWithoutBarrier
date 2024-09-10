
<?php $__env->startSection('content'); ?>


<style>
    textarea {
        width: 100%;
    }
</style>
<div class="row py-2 pl-3 pr-3">
    <div class="container ">

    
        <!-- Section1 Start  -->
        <div class="row section_one">
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h4>Add About Us Banner:</h4>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.aboutus')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <p class="text-muted f-s-12">Title<span class="text-danger">*</span></p>
                                        <input id="title" name="title" class="form-control">
                                        <input id="form_name_title" type="hidden" name="form_type" value="about_banner" class="form-control">
                                        <input id="" type="hidden" name="banner_id" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <p class="text-muted f-s-12">Add Banner Image<span class="text-danger">(Size:3000x700)*</span></p>
                                        <input type="file" id="fileInput" class="form-control input-focus" onchange="validateImage(this)" name="banner">
                                        <img id="imagePreview" src="#" alt="Image Preview" style="display: none;width:200px">
                                    </div>
                                    <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card-header">
                    <h4>About Us Banner :</h4>
                </div>

                <div class="card table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sr.N.</th>
                                <th>Title</th>
                                <th>Banner</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($data['banners'])): ?>
                            <?php $__currentLoopData = $data['banners']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td><?php echo e($banner->title); ?></td>

                                <td>
                                    <div style="text-align: center;">
                                        <?php if($banner->banner): ?>
                                        <a href="<?php echo e(asset('home/aboutus/'.$banner->banner)); ?>" target="_blank"> <img src="<?php echo e(asset('home/aboutus/'.$banner->banner)); ?>" alt="Banner Image" style="max-width: 50px; max-height: 40px;">
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-control2">
                                        <label class="switch" for="status-<?php echo e($banner->id); ?>">
                                            <input type="checkbox" id="status-<?php echo e($banner->id); ?>" data-id="<?php echo e($banner->id); ?>" onchange="toggleStatus(this, 'about_banner')" <?php echo e($banner->status ? 'checked' : ''); ?>>
                                            <div class="slider round">
                                                <span class="off">Inactive</span>
                                                <span class="on">Active</span>
                                            </div>
                                        </label>
                                    </div>
                                </td>

                                <td style="text-align: center">
                                    <a href="<?php echo e(route('home.aboutUsDelete', ['form_type' => 'about_banner','id' => $banner->id])); ?>">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Section1 End -->

        <!-- Founder thought Section Start  -->
        <div class="row section_founder">
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h4>Founder Thought Section:</h4>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.aboutus')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Title<span class="text-danger">*</span></p>
                                                <input id="title" name="title" class="form-control" required placeholder="Enter title here">
                                                <input id="form_name_founder" type="hidden" name="form_type" value="about_founder" class="form-control">
                                                <input id="" type="hidden" name="banner_id" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Add Icon Image<span class="text-danger">(60x60)*</span></p>
                                                <input required type="file" id="fileInputSection2" class="form-control input-focus" onchange="validateImage(this)" name="icon">
                                                <?php $__errorArgs = ['icon'];
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
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Add Picture<span class="text-danger">(256x256)*</span></p>
                                                <input required type="file" id="fileInputSection2" class="form-control input-focus" onchange="validateImage(this)" name="picture">
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
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Name<span class="text-danger">*</span></p>
                                                <input id="name" name="name" class="form-control" required placeholder="Enter name here">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">message<span class="text-danger">*</span></p>
                                                <textarea  class="editor form-control w-100 ckeditor" style="width: 100%;" name="message" placeholder="Enter message here"></textarea>
                                                <?php $__errorArgs = ['message'];
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
                                    </div>
                                    <div class="col text-center">
                                        <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-header">
                    <h4>Found Message List:</h4>
                </div>

                <div class="card table-responsive">
                <div class="card-body" style="max-height: 435px; overflow-y: auto; padding:0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sr.N.</th>
                                <th>Title</th>
                                <th>Icon</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($data['founders'])): ?>
                            <?php $__currentLoopData = $data['founders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $founder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td><?php echo e($founder->title); ?></td>

                                <td>
                                    <div style="text-align: center;">
                                        <?php if($founder->icon): ?>
                                        <a href="<?php echo e(asset('home/aboutus/'.$founder->icon)); ?>" target="_blank"> <img src="<?php echo e(asset('home/aboutus/'.$founder->icon)); ?>" alt="icon Image" style=" max-height: 40px;">
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="text-align: center;">
                                        <?php if($founder->picture): ?>
                                        <a href="<?php echo e(asset('home/aboutus/'.$founder->picture)); ?>" target="_blank"> <img src="<?php echo e(asset('home/aboutus/'.$founder->picture)); ?>" alt="picture Image" style=" max-height: 50px;">
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td><?php echo e($founder->name); ?></td>
                                <td>
                                    <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 70px;">
                                        <?php echo $founder->message; ?>

                                    </div>
                                </td>
                                <td>
                                    <div class="form-control2">
                                        <label class="switch" for="statusf-<?php echo e($founder->id); ?>">
                                            <input type="checkbox" id="statusf-<?php echo e($founder->id); ?>" data-id="<?php echo e($founder->id); ?>" onchange="toggleStatus(this, 'about_founder')" <?php echo e($founder->status ? 'checked' :
                                    ''); ?>>
                                            <div class="slider round">
                                                <span class="off">Inactive</span>
                                                <span class="on">Active</span>
                                            </div>
                                        </label>
                                    </div>
                                </td>

                                <td style="text-align: center">
                                    <a href="<?php echo e(route('home.aboutUsDelete', ['form_type' => 'about_founder','id' => $founder->id])); ?>">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        <!-- Founder thought Section End -->

        <!-- Section2 Start  -->
        <div class="row section_two">
            <div class="col-lg-12 col-md-12 col">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h4>Add Section Two (Vision/Mission/Values):</h4>
                    </div>
                    <div class="">
                        <div class="">
                            <form id="aboutUsSectionOne" action="<?php echo e(route('admin.aboutus')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="card alert">
                                    <div class="row card-body">
                                        <div class="col-md-3 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Title<span class="text-danger">*</span></p>
                                                <input id="title" name="title" class="form-control" required placeholder="Enter title here">
                                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <input id="about_section2" type="hidden" name="form_type" value="about_section2" class="form-control">
                                                <input id="" type="hidden" name="section_two_id" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Add Icon Image<span class="text-danger">(60x60)*</span></p>
                                                <input required type="file" id="fileInputSection2" class="form-control input-focus" onchange="validateImage(this)" name="banner">
                                                <?php $__errorArgs = ['banner'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img id="imagePreviewSection2" src="#" alt="Image Preview" style="display: none;width:100px">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Description<span class="text-danger">(min character:20)*</span></p>
                                                <textarea required class="editor form-control ckeditor" name="description" placeholder="Enter description here"></textarea>
                                                <?php $__errorArgs = ['description'];
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
                                    </div>
                                </div>
                                <div class="card alert">
                                    <div class="row card-body">
                                        <div class="col-md-3 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Heading A <span class="text-danger">*</span></p>
                                                <input required id="service1" name="service_a" class="form-control" placeholder="Enter Heading A here">
                                                <?php $__errorArgs = ['service_a'];
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
                                        <div class="col-md-3 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Add Image<span class="text-danger">(60x60)*</span></p>
                                                <input required type="file" id="servicea_image" class="form-control input-focus" onchange="validateImage(this)" name="service_a_image">
                                                <?php $__errorArgs = ['service_a_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img id="imagePreviewserviceAImage" src="#" alt="Image Preview" style="display: none;width:50px">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Heading A Description<span class="text-danger">(min character:20)*</span></p>
                                                <textarea required class="editor form-control ckeditor" name="service_a_description" placeholder="Enter Service A description here"></textarea>
                                                <?php $__errorArgs = ['service_a_description'];
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
                                        <div class="col-md-3 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Heading B<span class="text-danger">*</span></p>
                                                <input required id="service1" name="service_b" class="form-control" placeholder="Enter Heading B here">
                                                <?php $__errorArgs = ['service_b'];
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
                                        <div class="col-md-3 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Add Image<span class="text-danger">(60x60)*</span></p>
                                                <input required type="file" id="serviceb_image" class="form-control input-focus" onchange="validateImage(this)" name="service_b_image">
                                                <?php $__errorArgs = ['service_b_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img id="imagePreviewserviceBImage" src="#" alt="Image Preview" style="display: none;width:50px">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Heading B Description<span class="text-danger">(min character:20)*</span></p>
                                                <textarea required class="editor form-control ckeditor" name="service_b_description" placeholder="Enter Heading B description here"></textarea>
                                                <?php $__errorArgs = ['service_b_description'];
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
                                        <div class="col-md-3 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Heading C<span class="text-danger">*</span></p>
                                                <input required id="service1" name="service_c" class="form-control" placeholder="Enter Heading C here">
                                                <?php $__errorArgs = ['service_c'];
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
                                        <div class="col-md-3 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Add Image<span class="text-danger">(60x60)*</span></p>
                                                <input required type="file" id="servicec_image" class="form-control input-focus" onchange="validateImage(this)" name="service_c_image">
                                                <?php $__errorArgs = ['service_c_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img id="imagePreviewserviceCImage" src="#" alt="Image Preview" style="display: none;width:50px">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Heading C Description<span class="text-danger">(min character:20)*</span></p>
                                                <textarea required class="editor form-control ckeditor" name="service_c_description" placeholder="Enter Heading C description here"></textarea>
                                                <?php $__errorArgs = ['service_c_description'];
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
                                        <div class="col-md-3 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Heading D<span class="text-danger">*</span></p>
                                                <input required id="service1" name="service_d" class="form-control" placeholder="Enter Heading D here">
                                                <?php $__errorArgs = ['service_d'];
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
                                        <div class="col-md-3 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Add Image<span class="text-danger">(60x60)*</span></p>
                                                <input required type="file" id="serviced_image" class="form-control input-focus" onchange="validateImage(this)" name="service_d_image">
                                                <?php $__errorArgs = ['service_d_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img id="imagePreviewserviceDImage" src="#" alt="Image Preview" style="display: none;width:50px">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Heading D Description<span class="text-danger">(min character:20)*</span></p>
                                                <textarea required class="editor form-control ckeditor" name="service_d_description" placeholder="Enter Heading D description here"></textarea>
                                                <?php $__errorArgs = ['service_d_description'];
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
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5" value="Submit Section Two">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card-header">
                    <h4>Section Two List (Vision/Mission/Values):</h4>
                </div>
                <div class="card table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sr.N.</th>
                                <th>Title</th>
                                <th>Image Icon</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($data['sectionTwo'])): ?>
                            <?php $__currentLoopData = $data['sectionTwo']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sectionTwo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td><?php echo e($sectionTwo->title); ?></td>

                                <td>
                                    <div style="text-align: center;">
                                        <?php if($sectionTwo->banner): ?>
                                        <a href="<?php echo e(asset('home/aboutus/'.$sectionTwo->banner)); ?>" target="_blank"> <img src="<?php echo e(asset('home/aboutus/'.$sectionTwo->banner)); ?>" alt="sectionTwo Image" style="max-width: 50px; max-height: 40px;">
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-control2">
                                        <label class="switch" for="status-sectionTwo<?php echo e($sectionTwo->id); ?>">
                                            <input type="checkbox" id="status-sectionTwo<?php echo e($sectionTwo->id); ?>" data-id="<?php echo e($sectionTwo->id); ?>" onchange="toggleStatus(this, 'about_sectionTwo')" <?php echo e($sectionTwo->status ? 'checked' : ''); ?>>
                                            <div class="slider round">
                                                <span class="off">Inactive</span>
                                                <span class="on">Active</span>
                                            </div>
                                        </label>
                                    </div>
                                </td>

                                <td style="text-align: center">
                                    <a href="<?php echo e(route('home.aboutUsDelete', ['form_type' => 'about_sectionTwo','id' => $sectionTwo->id])); ?>">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Section2 End -->
        </div>
        <!-- Section two end -->
        <!-- Section1 Three Start  -->
        <div class="row section_three">
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h4>Add Section Three (Value for our clients):</h4>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.aboutus')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Section Title<span class="text-secondary">(Optional)</span></p>
                                                <input required id="section_title" name="section_title" class="form-control">
                                                <?php $__errorArgs = ['section_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <input id="form_name_title" type="hidden" name="form_type" value="about_section3" class="form-control">
                                                <input id="" type="hidden" name="about_section2_id" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Section Remarks<span class="text-secondary">(Optional)</span>
                                                </p>
                                                <input required id="section_remarks" name="section_remarks" class="form-control">
                                                <?php $__errorArgs = ['section_remarks'];
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Add Image<span class="text-danger">(Size:60x60)*</span></p>
                                                <input required type="file" id="fileInput" class="form-control input-focus" onchange="validateImage(this)" name="image">
                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img id="imagePreview" src="#" alt="Image Preview" style="display: none;width:200px">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Tilte<span class="text-danger">*</span></p>
                                                <input required name="title" class="form-control">
                                                <?php $__errorArgs = ['title'];
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
                                        <div class="col-md-12 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Description<span class="text-danger">(min
                                                        character:10)*</span></p>
                                                <textarea required class="editor form-control ckeditor" name="description" placeholder="Enter description here"></textarea>
                                                <?php $__errorArgs = ['description'];
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
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card-header">
                    <h4>Section Three List(Value for our clients):</h4>
                </div>

                <div class="card table-responsive">
                    <div class="card-body" style="max-height: 409px; overflow-y: auto; padding:0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.N.</th>
                                    <th>Section Title</th>
                                    <th>Section Remarks</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($data['bannerSectionThrees'])): ?>
                                <?php $__currentLoopData = $data['bannerSectionThrees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannerSectionThree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td><?php echo e($bannerSectionThree->section_title); ?></td>
                                    <td><?php echo e($bannerSectionThree->section_remarks); ?></td>
                                    <td><?php echo e($bannerSectionThree->title); ?></td>
                                    <td>
                                        <div style="text-align: center;">
                                            <?php if($bannerSectionThree->image): ?>
                                            <a href="<?php echo e(asset('home/aboutus/'.$bannerSectionThree->image)); ?>" target="_blank"> <img src="<?php echo e(asset('home/aboutus/'.$bannerSectionThree->image)); ?>" alt="Banner Image" style="max-width: 50px; max-height: 40px;">
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-control2">
                                            <label class="switch" for="status-sectionThree<?php echo e($bannerSectionThree->id); ?>">
                                                <input type="checkbox" id="status-sectionThree<?php echo e($bannerSectionThree->id); ?>" data-id="<?php echo e($bannerSectionThree->id); ?>" onchange="toggleStatus(this, 'about_sectionThree')" <?php echo e($bannerSectionThree->status ? 'checked' :
                                    ''); ?>>
                                                <div class="slider round">
                                                    <span class="off">Inactive</span>
                                                    <span class="on">Active</span>
                                                </div>
                                            </label>
                                        </div>
                                    </td>

                                    <td style="text-align: center">
                                        <a href="<?php echo e(route('home.aboutUsDelete', ['form_type' => 'about_sectionThree','id' => $bannerSectionThree->id])); ?>">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Three End -->
        <!-- Section1 Four Start  -->
        <div class="row section_Four">
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h4>Add Section Four(our values/Core values):</h4>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.aboutus')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Section Title<span class="text-secondary">(Optional)</span></p>
                                                <input required name="section_title" class="form-control">
                                                <?php $__errorArgs = ['section_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <input type="hidden" name="form_type" value="about_section4" class="form-control">
                                                <input type="hidden" name="about_section4_id" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Section Remarks<span class="text-secondary">(Optional)</span>
                                                </p>
                                                <input required name="section_remarks" class="form-control">
                                                <?php $__errorArgs = ['section_remarks'];
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Add Image<span class="text-danger">(Size:1500x1000)*</span></p>
                                                <input required type="file" class="form-control input-focus fileInput" onchange="validateImage(this)" name="image">
                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img src="#" alt="Image Preview imagePreview" style="display: none;width:200px">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Tilte<span class="text-danger">*</span></p>
                                                <input required name="title" class="form-control">
                                                <?php $__errorArgs = ['title'];
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
                                        <div class="col-md-12 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Description<span class="text-danger">(min
                                                        character:10)*</span></p>
                                                <textarea required class="editor form-control ckeditor" name="description" placeholder="Enter description here"></textarea>
                                                <?php $__errorArgs = ['description'];
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
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card-header">
                    <h4>Section Four List(our values/Core values):</h4>
                </div>

                <div class="card table-responsive">
                    <div class="card-body" style="max-height: 409px; overflow-y: auto; padding:0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.N.</th>
                                    <th>Section Title</th>
                                    <th>Section Remarks</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($data['bannerSectionFours'])): ?>
                                <?php $__currentLoopData = $data['bannerSectionFours']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannerSectionFour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td><?php echo e($bannerSectionFour->section_title); ?></td>
                                    <td><?php echo e($bannerSectionFour->section_remarks); ?></td>
                                    <td><?php echo e($bannerSectionFour->title); ?></td>
                                    <td>
                                        <div style="text-align: center;">
                                            <?php if($bannerSectionFour->image): ?>
                                            <a href="<?php echo e(asset('home/aboutus/'.$bannerSectionFour->image)); ?>" target="_blank"> <img src="<?php echo e(asset('home/aboutus/'.$bannerSectionFour->image)); ?>" alt="Banner Image" style="max-width: 50px; max-height: 40px;">
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-control2">
                                            <label class="switch" for="status-sectionFour<?php echo e($bannerSectionFour->id); ?>">
                                                <input type="checkbox" id="status-sectionFour<?php echo e($bannerSectionFour->id); ?>" data-id="<?php echo e($bannerSectionFour->id); ?>" onchange="toggleStatus(this, 'about_sectionFour')" <?php echo e($bannerSectionFour->status ? 'checked' :
                                    ''); ?>>
                                                <div class="slider round">
                                                    <span class="off">Inactive</span>
                                                    <span class="on">Active</span>
                                                </div>
                                            </label>
                                        </div>
                                    </td>

                                    <td style="text-align: center">
                                        <a href="<?php echo e(route('home.aboutUsDelete', ['form_type' => 'about_sectionFour','id' => $bannerSectionFour->id])); ?>">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Four End -->
        <!-- Section1 Five Start  -->
        <div class="row section_Five">
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h4>Add Section Five (what Clients say):</h4>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.aboutus')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Section Title<span class="text-secondary">(Optional)</span></p>
                                                <input required name="section_title" class="form-control">
                                                <?php $__errorArgs = ['section_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <input type="hidden" name="form_type" value="about_section5" class="form-control">
                                                <input type="hidden" name="about_section5_id" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Section Remarks<span class="text-secondary">(Optional)</span>
                                                </p>
                                                <input required name="section_remarks" class="form-control">
                                                <?php $__errorArgs = ['section_remarks'];
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Add Image<span class="text-danger">(Size:60x60)*</span></p>
                                                <input required type="file" class="form-control input-focus fileInput" onchange="validateImage(this)" name="image">
                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img src="#" alt="Image Preview imagePreview" style="display: none;width:200px">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Tilte<span class="text-danger">*</span></p>
                                                <input required name="title" class="form-control">
                                                <?php $__errorArgs = ['title'];
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
                                        <div class="col-md-12 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Description<span class="text-danger">(min
                                                        character:10)*</span></p>
                                                <textarea required class="editor form-control ckeditor" name="description" placeholder="Enter description here"></textarea>
                                                <?php $__errorArgs = ['description'];
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
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card-header">
                    <h4>Section Five List (what Clients say):</h4>
                </div>

                <div class="card table-responsive">
                    <div class="card-body" style="max-height: 409px; overflow-y: auto; padding:0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.N.</th>
                                    <th>Section Title</th>
                                    <th>Section Remarks</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($data['bannerSectionFives'])): ?>
                                <?php $__currentLoopData = $data['bannerSectionFives']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannerSectionFive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td><?php echo e($bannerSectionFive->section_title); ?></td>
                                    <td><?php echo e($bannerSectionFive->section_remarks); ?></td>
                                    <td><?php echo e($bannerSectionFive->title); ?></td>
                                    <td>
                                        <div style="text-align: center;">
                                            <?php if($bannerSectionFive->image): ?>
                                            <a href="<?php echo e(asset('home/aboutus/'.$bannerSectionFive->image)); ?>" target="_blank"> <img src="<?php echo e(asset('home/aboutus/'.$bannerSectionFive->image)); ?>" alt="Banner Image" style="max-width: 50px; max-height: 40px;">
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-control2">
                                            <label class="switch" for="status-sectionFive<?php echo e($bannerSectionFive->id); ?>">
                                                <input type="checkbox" id="status-sectionFive<?php echo e($bannerSectionFive->id); ?>" data-id="<?php echo e($bannerSectionFive->id); ?>" onchange="toggleStatus(this, 'about_sectionFive')" <?php echo e($bannerSectionFive->status ? 'checked' :
                                    ''); ?>>
                                                <div class="slider round">
                                                    <span class="off">Inactive</span>
                                                    <span class="on">Active</span>
                                                </div>
                                            </label>
                                        </div>
                                    </td>

                                    <td style="text-align: center">
                                        <a href="<?php echo e(route('home.aboutUsDelete', ['form_type' => 'about_sectionFive','id' => $bannerSectionFive->id])); ?>">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Five End -->

        <!-- Section1 Six Start  -->
        <div class="row section_Six">
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <h4>Add Section Six (strategy & Consulting Services):</h4>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.aboutus')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Section Title<span class="text-secondary">(Optional)</span></p>
                                                <input required name="section_title" class="form-control">
                                                <?php $__errorArgs = ['section_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <input type="hidden" name="form_type" value="about_section6" class="form-control">
                                                <input type="hidden" name="about_section6_id" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Section Remarks<span class="text-secondary">(Optional)</span>
                                                </p>
                                                <input required name="section_remarks" class="form-control">
                                                <?php $__errorArgs = ['section_remarks'];
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Add Image<span class="text-danger">(Size:60x60)*</span></p>
                                                <input required type="file" class="form-control input-focus fileInput" onchange="validateImage(this)" name="image">
                                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="text-danger"><?php echo e($message); ?></div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                <img src="#" alt="Image Preview imagePreview" style="display: none;width:200px">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Tilte<span class="text-danger">*</span></p>
                                                <input required name="title" class="form-control">
                                                <?php $__errorArgs = ['title'];
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
                                        <div class="col-md-12 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Description<span class="text-danger">(min
                                                        character:10)*</span></p>
                                                <textarea required class="editor form-control ckeditor" name="description" placeholder="Enter description here"></textarea>
                                                <?php $__errorArgs = ['description'];
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
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-primary btn-flat m-b-10 m-l-5" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card-header">
                    <h4>Section Six List (strategy & Consulting Services):</h4>
                </div>

                <div class="card table-responsive">
                    <div class="card-body" style="max-height: 409px; overflow-y: auto; padding:0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sr.N.</th>
                                    <th>Section Title</th>
                                    <th>Section Remarks</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($data['bannerSectionSixs'])): ?>
                                <?php $__currentLoopData = $data['bannerSectionSixs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannerSectionSix): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td><?php echo e($bannerSectionSix->section_title); ?></td>
                                    <td><?php echo e($bannerSectionSix->section_remarks); ?></td>
                                    <td><?php echo e($bannerSectionSix->title); ?></td>
                                    <td>
                                        <div style="text-align: center;">
                                            <?php if($bannerSectionSix->image): ?>
                                            <a href="<?php echo e(asset('home/aboutus/'.$bannerSectionSix->image)); ?>" target="_blank"> <img src="<?php echo e(asset('home/aboutus/'.$bannerSectionSix->image)); ?>" alt="Banner Image" style="max-width: 50px; max-height: 40px;">
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-control2">
                                            <label class="switch" for="status-sectionSix<?php echo e($bannerSectionSix->id); ?>">
                                                <input type="checkbox" id="status-sectionSix<?php echo e($bannerSectionSix->id); ?>" data-id="<?php echo e($bannerSectionSix->id); ?>" onchange="toggleStatus(this, 'about_sectionSix')" <?php echo e($bannerSectionSix->status ? 'checked' :
                                    ''); ?>>
                                                <div class="slider round">
                                                    <span class="off">Inactive</span>
                                                    <span class="on">Active</span>
                                                </div>
                                            </label>
                                        </div>
                                    </td>

                                    <td style="text-align: center">
                                        <a href="<?php echo e(route('home.aboutUsDelete', ['form_type' => 'about_sectionSix','id' => $bannerSectionSix->id])); ?>">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Six End -->
    </div>

    <script>
        const fileInput = document.getElementById('fileInput');
        const imagePreview = document.getElementById('imagePreview');

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
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
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/Home/aboutUs/about_us.blade.php ENDPATH**/ ?>