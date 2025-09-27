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
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<table style="width:100%;"> 
    <tr>
        <td style="width:25%;float:left;">Registration Details</td>
        <td style="width:50%"><center><img src="data:image/jpeg;base64,<?php echo e(base64_encode(file_get_contents(asset('/upload/main-logo.jpeg')))); ?>" style="width:250px;"></center></td>
        <td style="width:20%;float:right;"><span style="color:red">Printed on <br> <?php echo e(date('d/m/Y h:i:s A')); ?></span></td>
    </tr>
</table>

<br>
<table id="customers" style="width:95%;">
  
                                    
                                       <tr>
                                          <td><b>Name</b></td>
                                          <td colspan="3" class="information-txt"><?php echo e($student->name); ?></td>
                                          <td>
                                             <img src="data:image/jpeg;base64,<?php echo e(base64_encode(file_get_contents(asset('/storage/'.$student->photograph)))); ?>" class="img-fluid" style="width: 100px;border: 1px double #dee2e6;padding: 4px;height: 100px;">
                                          </td>

                                       </tr>
                                       <tr>
                                          <td><b>Mobile</b></td>
                                          <td class="information-txt" colspan="4"><?php echo e($student->mobile); ?></td>
                                       </tr>
                                       <tr>
                                          <td colspan="3"><b>Email ID</b></td>
                                          <td class="information-txt" colspan="4"><?php echo e($student->email); ?></td>
                                       </tr>

                                       <tr>
                                          <td colspan="2">
                                             <b>Qualification</b>
                                          </td>
                                          <td colspan="3">
                                          <?php if(!empty($student->qualification)): ?>
                                             <?php ($qualification = DB::table('board_agency_exam')->where('id',$student->qualification)->first()); ?>
                                             <?php echo e($qualification->name); ?>

                                          <?php else: ?>
                                             NA
                                          <?php endif; ?>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td><b>Addres s</b></td>
                                          <td class="information-txt" colspan="4"><?php echo e($student->address); ?></td>
                                       </tr>
                                       <tr>
                                          <td><b>State</b></td>
                                          <td><?php echo e($student->state?->name); ?></td>
                                          <td class="information-txt"><b>City</b></td>
                                          <td class="information-txt" colspan="2">

                                             <?php if(!empty($student->district_id)): ?>
                                                 <?php ($dist = DB::table('districts')->where('id',$student->district_id)->first()); ?>
                                             <?php echo e($dist->name); ?>

                                             <?php else: ?>
                                                NA
                                             <?php endif; ?>
                                           <br>
                                          <?php echo e($student->pincode); ?></td>
                                       </tr>
                                       <tr>
                                          <td><b>Scholarship Category</b></td>
                                          <td class="information-txt">
                                             <?php if(!empty($student->scholarship_category)): ?>
                                                 <?php ($scholarship_categ = DB::table('education_type')->where('id',$student->scholarship_category)->first()); ?>
                                                <?php echo e($scholarship_categ->name); ?>

                                             <?php else: ?>
                                                NA
                                             <?php endif; ?>
                                          </td>
                                          <td> <b>Scholarship Opted For</b></td>
                                          <td class="information-txt" colspan="2"> <?php echo e($student->scholarShipCategory?->name ?? 'N/A'); ?> </td>
                                       </tr>
                                       <tr>
                                          <td> <b>Scholarship Opted For</b> </td>
                                          <td class="information-txt"> <?php echo e($student->scholarShipCategory?->name ?? 'N/A'); ?></td>
                                          <td>
                                             <b>Choice of Test Centre (A/B)</b>
                                          </td>
                                          <td class="information-txt" colspan="2"><b>A:</b> <?php echo e($student->choiceCenterA?->DistrictName); ?> / <?php if($student->choiceCenterB ): ?><b>B:</b> <?php echo e($student->choiceCenterB?->DistrictName); ?> <?php endif; ?> </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <b>Father Occupation</b> &nbsp;&nbsp;&nbsp;
                                          </td>
                                          
                                          <td><?php echo e($student->father_occupation); ?> </td>
                                          <td><b>Mother Occupation: </b> </td>
                                          <td colspan="2"><?php echo e($student->mother_occupation); ?></td>
                                       </tr>
                                       
                                       <tr>
                                          <td colspan="2"><b>Status</b></td>
                                          <td class="bg-success text-center" colspan="3"> <span class="text-white ">Active</span> </td>
                                       </tr>
                                    
                                 </table>

</table>

</body>
</html>
<?php /**PATH /run/media/ahtesham/Projects/BWS/0_PROJECTS/CareerWithoutBarrier/career-without-barrier/resources/views/administrator/download/print-student-details.blade.php ENDPATH**/ ?>