<?php if($message = session()->get('success')): ?>
<script type="text/javascript">
      success("<?php echo e($message); ?>");
</script>
<?php endif; ?>

<?php if($message = session()->get('error')): ?>
<script type="text/javascript">
      error("<?php echo e($message); ?>");
</script>
<?php endif; ?>

<?php if($message = session()->get('warning')): ?>
<script type="text/javascript">
      warning("<?php echo e($message); ?>");
</script>
<?php endif; ?>

<?php if($message = session()->get('info')): ?>
<script type="text/javascript">
      info("<?php echo e($message); ?>");
</script>
<?php endif; ?>

<?php if(isset($errors)): ?>
<?php if($message = $errors->first()): ?>
<script  type="text/javascript">
      error("<?php echo e($message); ?>");
</script>
<?php endif; ?>
<?php endif; ?>
<div class="modal fade" id="query_form_reply" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabels" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="prodiv" style="max-width: 1020px;">
        <div class="modal-content" id="query_form_reply_append">
            
        </div>
    </div>
</div>



<?php /**PATH /home/u482032683/domains/develop.testandnotes.com/public_html/resources/views/components/message.blade.php ENDPATH**/ ?>