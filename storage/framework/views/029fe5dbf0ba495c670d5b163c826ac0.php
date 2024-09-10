 <?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row mt-3">
      <div class="col-md-9">

      </div>
      <div class="col-md-3">
         <a class="btn btn-info float-end Exam" href="<?php echo e(route('home')); ?>" style="width: 6rem;
    height: 2.65rem;">
            <svg viewBox="100 0 1024 1024" fill="#ffffff" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" style="width: 2rem; height: 2rem;">
               <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
               <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
               <g id="SVGRepo_iconCarrier">
                  <path d="M669.6 849.6c8.8 8 22.4 7.2 30.4-1.6s7.2-22.4-1.6-30.4l-309.6-280c-8-7.2-8-17.6 0-24.8l309.6-270.4c8.8-8 9.6-21.6 2.4-30.4-8-8.8-21.6-9.6-30.4-2.4L360.8 480.8c-27.2 24-28 64-0.8 88.8l309.6 280z" fill=""></path>
               </g>
            </svg>
            back
         </a>
      </div>

   </div>
   <div class="row">
      <main class="col-md-12 col-lg-12">
         <div class="pt-3 pb-2 custom-dashboard">
            <!-- <div class="w-100 dashboard-header mb-4">
               <h2 class="d-inline-block">
                  <i class="bi bi-house-fill"></i> 
               </h2>
            </div> -->
            <style>
               @media print {
                  #studenthiddenTable {
                     display: table !important;
                  }

                  .d-none {
                     display: none;
                  }
               }
            </style>
            <section class="content admin-1 mt-3">
               <div class="row corporate-cards">
                  <div class="col-md-6 col-12">
                     <div class="card">
                        <div class="card-header" style="background-color:#19467a ; color: white;">
                           <div>
                              <h5>Registration Details: </h5>
                           </div>
                           <div>
                              <h5>Expires at 19-May-2024</h5>
                           </div>
                           <div style="display:flex; ">
                              <button type="button" style="display:flex; float:right;" class="btn btn-success" onclick="printTable()"><i class="fa fa-print"></i></button>
                           </div>
                        </div>
                        <br>
                        <div class="card-body">
                           <div class="col-md-12">
                              <div class="table-responsive">
                                 <table class="table table-bordered table-hover" id="studentTable">
                                    <tbody>
                                       <tr>
                                          <td><b>Name</b></td>
                                          <td colspan="2" class="information-txt"><?php echo e($student->name); ?></td>
                                          <td class="userImageCell" rowspan="2" colspan="2">
                                             <img src="<?php echo e(url('upload/student/')); ?>/<?php echo e($student->photograph); ?>" class="img-fluid" style="width: 160px;border: 1px double #dee2e6;padding: 4px;height: 150px;">
                                          </td>

                                       </tr>
                                       <tr>
                                          <td><b>Mobile</b></td>
                                          <td class="information-txt" colspan="2"><?php echo e($student->mobile); ?></td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><b>Email ID</b></td>
                                          <td class="information-txt" colspan="2"><?php echo e($student->email); ?></td>
                                       </tr>

                                       <tr>
                                          <td colspan="2">
                                             <b>Qualification</b>
                                          </td>
                                          <td colspan="2">
                                             <?php echo e($student->qualification ?? 'N/A'); ?>

                                          </td>
                                       </tr>
                                       <tr>
                                          <td><b>Addres s</b></td>
                                          <td class="information-txt" colspan="3"><?php echo e($student->address); ?></td>
                                       </tr>
                                       <tr>
                                          <td><b>State</b></td>
                                          <td><?php echo e($student->state?->StateName); ?></td>
                                          <td class="information-txt"><b>City</b></td>
                                          <td class="information-txt"><?php echo e($student->district?->DistrictName); ?> - <?php echo e(substr($student->pincode,-4)); ?></td>
                                       </tr>
                                       <tr>
                                          <td><b>Scholarship Category</b></td>
                                          <td class="information-txt"><?php echo e($student->scholarship_category ?? 'N/A'); ?></td>
                                          <td> <b>Scholarship Opted For</b></td>
                                          <td class="information-txt"> <?php echo e($student->scholarship_opted_for ?? 'N/A'); ?> </td>
                                       </tr>
                                       <tr>
                                          <td> <b>Scholarship Opted For</b> </td>
                                          <td class="information-txt"> <?php echo e($student->scholarship_opted_for ?? 'N/A'); ?> </td>
                                          <td>
                                             <b>Choice of Test Centre (A/B)</b>
                                          </td>
                                          <td class="information-txt"><b>A:</b> <?php echo e($student->choiceCenterA?->DistrictName); ?> / <?php if($student->choiceCenterB ): ?><b>B:</b> <?php echo e($student->choiceCenterB?->DistrictName); ?> <?php endif; ?> </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <b>Father Occupation</b> &nbsp;&nbsp;&nbsp;
                                          </td>
                                          </td>
                                          </td>
                                          <td><?php echo e($student->father_occupation); ?> </td>
                                          <td><b>Mother Occupation: </b> </td>
                                          <td><?php echo e($student->mother_occupation); ?></td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><b>Action</b></td>
                                          <td colspan="2" style="text-align: center;"> <button type="button" class="btn btn-link text-danger action-button"><b>Discontinue</b></button>
                                             <!-- <button type="button" class="btn btn-link text-info action-button" onclick="showReply()">Reply</button> -->
                                          </td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><b>Status</b></td>
                                          <td class="bg-success text-center" colspan="2"> <span class="text-white ">Active</span> </td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 <table class="table table-bordered table-hover d-none" id="studenthiddenTable">
                                    <tbody>
                                       <tr>
                                          <td class="userImageCell"> <img id="profile_img" src="/storage/app/student_uploads/201/1mXYHPsRXp9hACr1wFYeLSoSFHLRZm9csv455YOk.jpg" style="width:80px;height:80px;border:1px solid #c2c2c2; "> </td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><b>Name</b></td>
                                          <td class="information-txt"><?php echo e($student->name); ?></td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><b>Mobile</b></td>
                                          <td class="information-txt" colspan="2"><?php echo e($student->mobile); ?></td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><b>Email</b></td>
                                          <td class="information-txt" colspan="2"><?php echo e($student->email); ?></td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><b>Education Type</b></td>
                                          <td class="information-txt" colspan="2">-</td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><b>Class</b></td>
                                          <td class="information-txt" colspan="2">--</td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><b>Institute Name</b></td>
                                          <td class="information-txt" colspan="2"> - </td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><b>Institute Code</b></td>
                                          <td class="information-txt" colspan="2"> - </td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><b>Subscription</b></td>
                                          <td colspan="2"> Expires at: </td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><b>Status</b></td>
                                          <td class="bg-success" colspan="2"> <span class="text-white">Active</span> </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 col-12" style="display: flex;">
                     <form class="card" id="reply-hidden">
                        <div class="card-header" style="background-color:#19467a; color: #fff;">
                           <h5>Student Activation Form</h5>
                        </div>
                        <div class="card-body">
                           <div class="d-flex mb-2">
                              <label class="box-heading"> Subscription (Duration) </label>
                              <div class="box-input">
                                 <div class="input-group">
                                    <label class="input-group-text" for="inputGroupSelect01"><i class="bi bi-clock-fill"></i></label>
                                    <select class="form-select" id="inputGroupSelect01" name="days" data-style="btn-new">
                                       <option value="0">No subscription </option>
                                       <option value="3">3 days </option>
                                       <option selected="" value="7">7 days </option>
                                       <option value="15">15 days </option>
                                       <option value="30">30 days </option>
                                       <option value="60">60 days </option>
                                       <option value="90">3 months </option>
                                       <option value="120">4 months</option>
                                       <option value="150">5 months</option>
                                       <option value="180">6 months</option>
                                       <option value="270">9 months</option>
                                       <option value="365">1 year </option>
                                       <option value="730">2 year </option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <input type="hidden" name="is_staff" value="0">
                           <div class="d-flex mb-2">
                              <label class="box-heading"> Student’s name </label>
                              <div class="box-input">
                                 <!-- <div class="box-icon"></div> -->
                                 <div class="input-group flex-nowrap"> <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-fill"></i></span> <input type="text" name="name" class="form-control" value="<?php echo e($student->name); ?>" placeholder="Person name"> </div>
                              </div>
                           </div>
                           <div class="d-flex mb-2">
                              <label class="box-heading"> Mobile No </label>
                              <div class="box-input">
                                 <!-- <div class="box-icon"></div> -->
                                 <div class="input-group flex-nowrap"> <span class="input-group-text" id="addon-wrapping"><i class="bi bi-phone"></i></span> <input type="text" name="mobile" class="form-control" value="<?php echo e($student->mobile); ?>" placeholder="Person name"> </div>
                              </div>
                           </div>
                           <div class="d-flex mb-2">
                              <label class="box-heading"> E-mail </label>
                              <div class="box-input">
                                 <!-- <div class="box-icon"></div> -->
                                 <div class="input-group flex-nowrap"> <span class="input-group-text" id="addon-wrapping"><i class="bi bi-envelope-fill"></i></span> <input type="email" class="form-control" value="<?php echo e($student->email); ?>" placeholder="E-mail" name="email" readonly=""> </div>
                              </div>
                           </div>
                           <div class="d-flex mb-2">
                              <label class="box-heading"> Education Type </label>
                              <div class="box-input">
                                 <!-- <div class="box-icon"></div> -->
                                 <div class="input-group">
                                    <label class="input-group-text" for="inputGroupSelect03"><i class="fa fa-graduation-cap" aria-hidden="true"></i></label>
                                    <select class="form-control" id="education_type_id" name="education_type_id" onchange="getClassesByEducation(this.value)" required="">
                                       <option value="" selected="">Education Type</option>
                                       <option value="51" selected="">Competition</option>
                                       <option value="52">Academics</option>
                                       <option value="53">Govt Jobs</option>
                                       <option value="54">Other Entrance Exams</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="d-flex mb-2">
                              <label class="box-heading"> Class/Group/Exam Name </label>
                              <div class="box-input">
                                 <!-- <div class="box-icon"></div> -->
                                 <div class="input-group"> <label class="input-group-text" for="inputGroupSelect03"><i class="fa fa-users" aria-hidden="true"></i></label> <select class="form-control" id="class_group_exam_id" name="class_group_exam_id" required=""> </select> </div>
                              </div>
                           </div>
                           <div class="d-flex mb-2">
                              <label class="box-heading"> Password </label>
                              <div class="box-input">
                                 <!-- <div class="box-icon"></div> -->
                                 <div class="input-group flex-nowrap"> <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key-fill"></i></span> <input type="password" class="form-control" placeholder="Password" name="password"> <span class="input-group-text togglePassword" id="addon-wrapping"> <i class="bi bi-eye-fill"></i> </span> </div>
                              </div>
                           </div>
                           <div class="d-flex mb-2">
                              <label class="box-heading"> Institute Name </label>
                              <div class="box-input">
                                 <!-- <div class="box-icon"></div> -->
                                 <div class="input-group flex-nowrap"> <span class="input-group-text" id="addon-wrapping"><i class="bi bi-list"></i></span> <input type="text" name="institute_name" class="form-control" value="sameer institute" placeholder="Person name"> </div>
                              </div>
                           </div>
                           <div class="d-flex mb-2">
                              <label class="box-heading"> Institute Code </label>
                              <div class="box-input">
                                 <!-- <div class="box-icon"></div> -->
                                 <div class="input-group flex-nowrap"> <span class="input-group-text" id="addon-wrapping"><i class="bi bi-list"></i></span> <input type="text" name="institute_code" class="form-control" value="SIS06172530" placeholder="Person name"> </div>
                              </div>
                           </div>
                           <div class="d-flex mb-2">
                              <label class="box-heading"> Applied Date </label>
                              <div class="box-input">
                                 <!-- <div class="box-icon"></div> -->
                                 <div class="input-group flex-nowrap"> <span class="input-group-text" id="addon-wrapping"><i class="bi bi-list"></i></span> <input type="text" name="created_at" class="form-control" value="15 Nov 2022" placeholder="Person name" readonly=""> </div>
                              </div>
                           </div>
                           <div class="d-flex mb-2">
                              <label class="box-heading"> Renewal Date </label>
                              <div class="box-input">
                                 <!-- <div class="box-icon"></div> -->
                                 <div class="input-group flex-nowrap"> <span class="input-group-text" id="addon-wrapping"><i class="bi bi-list"></i></span> <input type="text" name="created_at" class="form-control" value="2024-05-20 13:33:18" readonly=""> </div>
                              </div>
                           </div>
                           <div class="d-flex mb-2">
                              <label class="box-heading"> Subscription End </label>
                              <div class="box-input">
                                 <!-- <div class="box-icon"></div> -->
                                 <div class="input-group flex-nowrap"> <span class="input-group-text" id="addon-wrapping"><i class="bi bi-list"></i></span> <input type="text" name="created_at" class="form-control" value="Expires at 19-May-2024" placeholder="Remaining Subscription" readonly=""> </div>
                              </div>
                           </div>
                           <div class="d-flex mb-2">
                              <label class="box-heading"> Status </label>
                              <div class="box-input">
                                 <!-- <div class="box-icon"></div> -->
                                 <div class="input-group">
                                    <label class="input-group-text" for="inputGroupSelect03"><i class="bi bi-person-badge-fill"></i></label>
                                    <select class="form-select" id="inputGroupSelect03" name="status">
                                       <!-- <option selected>Select Option</option> -->
                                       <option value="inactive"> Inactive</option>
                                       <option selected="" value="active">Active</option>
                                       <!--<option --> <!-- value="expired">--> <!-- Expired Subscription</option>-->
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="d-flex mb-2">
                              <label class="box-heading"> </label>
                              <div class="box-input"> <button class="btn btn-success" type="submit">Save</button> </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-6 d-none">
                     <div class="table-responsive">
                        <table class="table table-bordered border-primary corporate-table">
                           <tbody>
                              <tr>
                                 <th>Actions</th>
                                 <td> <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rejectBox">Reject</button> <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#replyBox">Reply</button> </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </section>
            <div class="toast align-items-center text-white border-0 position-absolute bottom-0 end-0 mb-3" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true" id="responseToast">
               <div class="d-flex">
                  <div class="toast-body" id="responseToastMessage"> </div>
                  <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
               </div>
            </div>
         </div>
      </main>
   </div>
</div>
<script>
   function printTable() {
      var tableContents = document.getElementById("studenthiddenTable").outerHTML;
      var printWindow = window.open("", "Print Window");
      printWindow.document.write(tableContents);
      printWindow.print();
      printWindow.close();
   }
</script>
<!-- /#page-content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('administrator.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/lkaj6m2w9cvv/public_html/resources/views/administrator/dashboard/student_view.blade.php ENDPATH**/ ?>