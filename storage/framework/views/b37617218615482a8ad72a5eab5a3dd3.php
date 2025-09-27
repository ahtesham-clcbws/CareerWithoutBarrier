<div class="h-100">
    <style>
        .boxShadow {
            margin: 10px auto;
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .customTable td,
        .customTable th {
            padding: 2px;
        }

        .ck-content.ck-editor__editable {
            min-height: 200px !important;
        }
    </style>

    <div class="row">
        <div class="col-lg-12 col-md-12 col" style="margin-left: auto;margin-right:auto">

            <div class="boxShadow">

                <form class="row mt-2 gap-3" wire:submit.prevent="save">

                    <div class="row row-cols-3">
                        <div class="row">
                            <label>Name</label>
                            <input class="form-control" wire:model="name" />
                        </div>
                        <div class="row">
                            <label>Title</label>
                            <input class="form-control" wire:model="title" />
                        </div>
                        <div class="row">
                            <label>Slug</label>
                            <input class="form-control" value="<?php echo e($page->slug); ?>" readonly />
                        </div>
                    </div>
                    <div>
                        <div wire:ignore>
                            <textarea class="form-control" id="content" name="content" style="min-height: 300px;" wire:model="content"
                                rows="10">
                                <?php echo $page->content; ?>

                            </textarea>
                        </div>

                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <!-- Submit Button -->
                    <div class="text-end">
                        <button class="btn btn-primary">
                            <span wire:loading wire:target="save">
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>&nbsp;
                                Saving Page ...
                            </span>
                            <span wire:loading.remove>Save Page</span>
                        </button>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
<?php $__env->startPush('custom-scripts'); ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor.create(document.querySelector('#content'), {

            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('content', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/admin/setting/policy-pages/policy-page-add-update.blade.php ENDPATH**/ ?>