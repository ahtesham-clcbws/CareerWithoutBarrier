<!DOCTYPE html>
<html>
<head>
<style>
body{
    font-family: sans-serif;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 99%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 5px;
}



#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #d2cfce;
  color: black;
}
</style>
</head>
<body>
<table style="width:100%;"> 
    <tr>
        <td style="width:25%;float:left;">New Institute <br>Enquiry</td>
        <td style="width:50%"><center><img src="data:image/jpeg;base64,<?php echo e(base64_encode(file_get_contents(asset('/public/upload/main-logo.jpeg')))); ?>" style="width:250px;"></center></td>
        <td style="width:20%;float:right;"><span style="color:red">Printed on <br> <?php echo e(date('d/m/Y h:i:s A')); ?></span></td>
    </tr>
</table>

<br>
<table id="customers" style="width:95%;">
  <tr>
    <th>Sr.No.</th>
    <th>Photo</th>
    <th>Name</th>
    <th>Inst.Name & City</th>
    <th>Email & Mobile</th>
    <th>Interested For</th>
    <th>Estd. Year</th>
    <th>Enquiry Date</th>
    <th>Note</th>
  </tr>
  <?php if(isset($institute) && !empty($institute)): ?>
  <?php $__currentLoopData = $institute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institutes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
    <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td>
        <?php if(file_exists(public_path('upload/corporate/'.$institutes->attachment))): ?>

            <img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(asset('/public/upload/corporate/'.$institutes->attachment)))); ?>" style="width:50px;height:50px;border:1px solid #c2c2c2;border-radius:5px;">

        <?php else: ?>
            <img src="data:image/jpg;base64,<?php echo e(base64_encode(file_get_contents(asset('public/upload/no_image_available.jpg')))); ?>" style="width:50px;height:50px;border:1px solid #c2c2c2;border-radius:5px;">
        <?php endif; ?>
        </td>
        <td><?php echo e($institutes->name); ?></td>
        <td><?php echo e($institutes->institute_name); ?> <br><span style="color:blue"><?php echo e($institutes->city); ?></td>
        <td><?php echo e($institutes->email); ?> <br> <?php echo e($institutes->phone); ?></td>
        <td><?php echo e($institutes->interested_for); ?></td>
        <td><?php echo e($institutes->established_year); ?></td>
        <td><?php echo e(date('d/m/Y h:i:s A', strtotime($institutes->created_at))); ?></td>
        <td style="width:40px;"></td>
        
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>
    <tr>
        <td colspan="8"><center>No data available at this moment...</center></td>
    </tr>
  <?php endif; ?>

</table>

</body>
</html>
<?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/download/new-institute-enquiry.blade.php ENDPATH**/ ?>