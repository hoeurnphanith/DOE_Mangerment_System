<?php
$School_ID = $_SESSION['User_Name'];
$sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_ID'");
while($row = mysqli_fetch_array($sql)){
      $School_Name=$row['School_NameKH'];
    }
?>
<!-- Modal -->
<div class="modal fade" id="user-model" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="padding: 1.5rem; padding-top: 10px; padding-bottom: 10px">
        <h4 class="modal-title" style="  font-family: 'Koulen', cursive; color: #007bff" id="userModel"></h4>
      </div>
      <div class="modal-body">
      </form>
      <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control form-control-border" id="ID" hidden="" name="ID" placeholder="Classroom_ID" value="" >
          </div>
        </div>  

        <div class="form-group">
          <div class="col-sm-12">
           <?php
           $key = $_GET['key'];
           include 'action/connection.php';
           $query="select * from tbl_classroom WHERE Classroom_ID = '$key'";
           $result= mysqli_query($conn,$query);
           ?>
           <select class="custom-select form-control-border" name="classroom_id" id="classroom_id" required="">
            <?php
            WHILE ($rows =$result->fetch_assoc()){
              $Grade_ID =$rows['Grade_ID'];
              $Classroom_ID =$rows['Classroom_ID'];
              $Classroom_Name =$rows['Classroom_Name'];
              echo "<option value='$Classroom_ID'>$Grade_Name($Classroom_Name)</option>";
            }
            ?>
          </select>


        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
          <?php
          include 'action/connection.php';
          $query="select * from tbl_teacher WHERE School_ID = '$School_ID'";
          $result= mysqli_query($conn,$query);
          ?>
          <select class="custom-select form-control-border" name="teacher_id" id="teacher_id" required="">
            <option>-ជ្រើសរើសគ្រូ-</option>
            <?php
            WHILE ($rows =$result->fetch_assoc()){
              $Teacher_ID =$rows['Teacher_ID'];
              $Teacher_NameKH =$rows['Teacher_NameKH'];
              echo "<option value='$Teacher_ID'>$Teacher_NameKH</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary" id="btn-save" value="addnew">រក្សារទុក
        </button>
      </div>
    </form>
  </div>
</div>
</div>
<!-- End Modal -->