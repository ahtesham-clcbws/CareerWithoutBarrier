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
  background-color: ##d2cfce;
  color: black;
}
</style>
</head>
<body>
<table style="width:100%;"> 
    <tr>
        <td style="width:25%;float:left;">Student List</td>
        <td style="width:50%"><center><img src="data:image/jpeg;base64,<?php echo e(base64_encode(file_get_contents(asset('/public/upload/main-logo.jpeg')))); ?>" style="width:250px;"></center></td>
        <td style="width:20%;float:right;"><span style="color:red">Printed on <br> <?php echo e(date('d/m/Y h:i:s A')); ?></span></td>
    </tr>
</table>

<br>
<table id="customers" style="width:95%;">
  <tr>
    <th>Sr.No</th>
    <th>Student Name</th>
    <th>Email/Mobile</th>
    <th>Password</th>
    <th>DOB</th>
    <th>Application Code</th>
    <th>Qualification</th>
    <th>Scholarship Category</th>
    <th>Scholarship Opted For</th>
    
  </tr>
  <?php if(isset($students) && !empty($students)): ?>
  <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <?php
                    $studCode = $student->latestStudentCode;

                    ?>
                    <th scope="row"><?php echo e($loop->index + 1); ?></th>
                    <td><?php echo e($student->name); ?><br>
                      <span style="color:red"><?php echo e($student->gender); ?></span><br>
                      <span style="color:red"><?php echo e($student->district?->name); ?></span><br>
                    </td>
                    <td><?php echo e($student->email); ?> <br>
                      <?php echo e($student->mobile); ?>

                    </td>
                    <td><?php echo e($student->login_password); ?></td>
                    <td><?php echo e($student->dob); ?></td>
                    <td><?php echo e($studCode?->application_code ? $studCode?->application_code : 'NA'); ?><br>
                      <?php if(!empty($studCode?->roll_no)): ?>
                        <span style="color:red;">R.No:<?php echo e($studCode?->roll_no); ?> </span>
                      <?php endif; ?>
                    </td>
                    <td><?php echo e($student->qualifications?->name); ?></td>
                    <td><?php echo e($student->scholarShipCategory?->name ?? 'N/A'); ?></td>
                    <td><?php echo e($student->scholarShipOptedFor?->name ?? 'N/A'); ?></td>
                    
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>
    <tr>
        <td colspan="9"><center>No data available at this moment...</center></td>
    </tr>
  <?php endif; ?>

</table>

</body>
</html>
<?php /**PATH /home/u482032683/domains/careerwithoutbarrier.com/public_html/resources/views/administrator/download/print-student-list.blade.php ENDPATH**/ ?>