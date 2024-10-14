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
              <input type="date" name="date" required="" id="date" class="form-control" />
              <span id="error_attendance_date" class="text-danger"></span>
            </div>
          </div>
        </div>


        <div class="row">
          <input type="text" class="form-control form-control-border" id="Attandance_ID" hidden="" name="Attandance_ID" placeholder="Attandance_ID" value="" >
          <input type="text" class="form-control form-control-border" id="School_ID" hidden="" name="School_ID" placeholder="School_ID" value="" >


          <div class="form-group col-sm-2">
            <label for="exampleInputBorder">Teacher ID</label>
            <?php
            include 'action/connection.php';
            $query="select * from tbl_teacher WHERE School_ID = '$School_ID'";
            $result= mysqli_query($conn,$query);
            ?>
            <select class="custom-select form-control-border" name="Teacher_ID" id="Teacher_ID" required="">
              <option>---</option>
              <?php
              WHILE ($rows =$result->fetch_assoc()){
                $Teacher_ID =$rows['Teacher_ID'];
                $Teacher_NameKH =$rows['Teacher_NameKH'];
                echo "<option value='$Teacher_ID'>$Teacher_NameKH</option>";
              }
              ?>
            </select>
          </div>
            <?php 
            $School_ID = $_SESSION['User_Name'];
            ?>
             <input type="text" class="form-control form-control-border border-width-2 " hidden="" value="<?php echo $School_ID?>"  name="School_ID"  id="School_ID">


          <div class="form-group col-sm-2" >
            <label for="exampleInputBorder">Event Time</label>
            <select class="custom-select form-control-border" name="Event_Time" id="Event_Time" required="">
              <option>---</option>
              <option>ព្រឹក</option>
              <option>ល្ងាច</option>
            </select>
          </div>
          <div class="form-group col-sm-2">
            <label for="exampleInputBorder">Attandance</label>
            <select class="custom-select form-control-border" name="Attendent" id="Attendent" required="">
              <option>---</option>
              <option>វត្ដមាន</option>
              <option>អវត្ដមាន</option>
            </select>
          </div>
          <div class="form-group col-sm-2">
            <label for="exampleInputBorder">Start</label>
            <input type="Time" class="form-control form-control-border border-width-2 " name="start_work"  id="start_work" required="">
          </div>
          <div class="form-group col-sm-2">
            <label for="exampleInputBorder">End</label>
            <input type="Time" class="form-control form-control-border border-width-2 " name="End_work"  id="End_work" required="">
          </div>
          <div class="form-group col-sm-2">
            <label for="exampleInputBorder">Reference</label>
            <select class="custom-select form-control-border" name="Referent" id="Referent">
              <option>---</option>
              <option>ច្ប</option>
              <option>អច្ប</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" name="btn-close" data-dismiss="modal">បិទ</button>
          <button type="submit" class="btn btn-primary" id="btn-save" value="addnew">Save changes
          </div>
        </form>
      </div>
    </div>
  </div>
<!--End Modal -->
