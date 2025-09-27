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

    <div class="d-flex align-items-center justify-content-between" style="padding: 10px;">
        <a class="btn btn-primary btn-sm" href="<?php echo e(route('admin.contactEnquiry')); ?>">Close</a>
        <!--[if BLOCK]><![endif]--><?php if($contact->replyMails->count()): ?>
            <a class='btn btn-danger btn-sm' type='button'
                href="<?php echo e(route('admin.contactRelpiesList', $contact->id)); ?>">View Replied List</a>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col" style="margin-left: auto;margin-right:auto">

            <!-- datatablecl -->
            <div class="boxShadow">

                <div class="p-1">
                    <table class="w-100 table-bordered customTable table">
                        <tbody>
                            <tr>
                                <th scope="row">Name</th>
                                <td><?php echo e($contact->fullname); ?></td>
                                <th scope="row">Email</th>
                                <td><?php echo e($contact->email); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Mobile</th>
                                <td><?php echo e($contact->mobile); ?></td>
                                <th scope="row">City</th>
                                <td><?php echo e($contact->city); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Contact Reason</th>
                                <td colspan="3"><?php echo e($contact->reason_contact); ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Message</th>
                                <td colspan="3"><?php echo e($contact->message); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form class="row mt-2 gap-3" wire:submit.prevent="save">
                    <div wire:ignore>
                        <textarea class="form-control" id="message" name="message" style="min-height: 300px;" wire:model="message"
                            rows="10">
                        </textarea>
                    </div>

                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                    <!-- Submit Button -->
                    <div class="text-end">
                        <button class="btn btn-primary">
                            <span wire:loading>
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>&nbsp;
                                Sending email ...
                            </span>
                            <span wire:loading.remove>Send Reply</span>
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
        ClassicEditor.create(document.querySelector('#message'), {

            })
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('message', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/livewire/administrator/settings/contact-list-reply.blade.php ENDPATH**/ ?>