<!-- Modal -->
<div class="modal fade" id="user-model" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="font-family: 'Koulen', cursive; color: #007bff;" id="userModel"></h4>
      </div>
      <div class="modal-body">

        <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">



          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">កាលបរិច្ឆេទ<span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="date" name="attendance_date" required="" id="attendance_date" class="form-control" />
                <span id="error_attendance_date" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group" id="student_details">
            <div class="table-responsive">
             <table class="table table-bordered table-hover" style="font-size: 16px; min-width: max-content; " role="grid"  style="font-family: 'Kantumruy', sans-serif;" aria-describedby="example2_info">
              <thead>
                <tr>
                  <!-- <th>ល.រ</th> -->
                  <th>Teacher_ID</th>
                  <th colspan="2">Event_Time</th>
                  <th th colspan="2">វត្ដមាន/អវត្ដមាន</th>
                  <th>Referent</th>
                </tr>
              </thead>
              <?php

              $School_ID = $_SESSION['User_Name'];
              $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_student WHERE School_ID = '$School_ID'");
              while($row = mysqli_fetch_array($sql)){
                $ID_Student=$row['ID_Student'];
                $Student_ID=$row['Student_ID'];
                $studentname_kh=$row['studentname_kh'];

                ?>
                <tr>

                  <input type="text" name="Attandance_ID" name="Attandance_ID" hidden="" />

                  <td>
                    <?php echo $studentname_kh; ?>
                    <input type="text" name="Student_ID[]" hidden="" value="<?php echo $Student_ID; ?>" />
                  </td>
                  <td>
                    <label><input type="radio" id="Event_Time" name="Event_Time<?php echo $Student_ID; ?>" checked value="ព្រឹក" /> ព្រឹក</label>
                  </td>
                  <td>
                    <label><input type="radio" id="Event_Time" name="Event_Time<?php echo $Student_ID; ?>"  value="ល្ងាច" />   ល្ងាច</label>
                  </td>
                  <td>


                   <label><input type="radio" id="Attendent" name="Attendent<?php echo $Student_ID; ?>" checked value="មក" /> វត្ដមាន</label>
                 </td>
                 <td>
                  <label><input type="radio" id="Attendent" name="Attendent<?php echo $Student_ID; ?>"  value="មិនមក" /> អវត្ដមាន</label>
                </td>

                <td>
                 <select class="form-control form-control-border border-width-2 " id="Referent" name="Referent" style="padding-bottom: 2px;">
                  <option></option>
                  <option>ច្ប</option>
                  <option>អច្ប</option>
                </select>
              </td>
            </tr>
            <?php
          }
          ?>
        </table>
      </div>
    </div>
    <div class="modal-footer">
      <input type="hidden" name="action" id="action" value="Add" />
          <input type="submit" name="addnew" id="addnew" class="btn btn-success btn-sm" value="Add" />
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
    </form>
  </div>
</div>
</div>
<!--End Modal -->
