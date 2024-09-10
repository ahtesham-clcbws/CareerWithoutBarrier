<?php $__env->startSection('title'); ?>
Faq List
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<style>
    .faq_w1 h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        font-size: 13px
    }
</style>
<div class="row py-2 pl-3 pr-3">
    <div class="container ">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default m-t-15">
                    <div class="card-header">
                        <div class="panel-heading">Add FAQ</div>
                    </div>
                    <div class="panel-body">
                        <div class="card alert">
                            <div class="card-body">
                                <form action="<?php echo e(route('home.faqSave')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-12 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Title</p>
                                                <textarea class="ckeditor" style="width: 100%;" id="editor" name="title"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col">
                                            <div class="form-group">
                                                <p class="text-muted f-s-12">Details</p>
                                                <textarea class="ckeditor" style="width: 100%;" id="editor1" name="details"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col text-center">
                                            <input type="submit" class="btn btn-warning btn-flat m-b-10 m-l-5" value="Submit">
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
                    <div class="panel-heading"> FAQ List</div>
                </div>
                <div class="table-responsive card">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Title</th>
                                <th>Staus</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td class="faq_w1"><?php echo $faqs->title; ?></td>
                                <td>
                                <div class="form-control2">
                                        <label class="switch" for="status-<?php echo e($faqs->id); ?>">
                                            <input type="checkbox" id="status-<?php echo e($faqs->id); ?>" data-id="<?php echo e($faqs->id); ?>" onchange="toggleStatus(this, 'home_faqs')" <?php echo e($faqs->status ? 'checked' : ''); ?>>
                                            <div class="slider round">
                                                <span class="off">Inactive</span>
                                                <span class="on">Active</span>
                                            </div>
                                        </label>
                                    </div>
                                </td>

                                <td style="text-align: center">
                                    <a href="<?php echo e(route('home.faqDelete', ['id' => $faqs->id])); ?>">
                                        <span class="fa fa-trash"></span>
                                    </a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/Home/faq.blade.php ENDPATH**/ ?>