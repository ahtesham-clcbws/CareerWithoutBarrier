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
<?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/components/message.blade.php ENDPATH**/ ?>