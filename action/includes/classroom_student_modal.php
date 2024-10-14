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
          $School_ID = $_SESSION['User_Name'];
          include 'action/connection.php';
          $query="select * from tbl_student WHERE grade = '$Grade_Name' && School_ID =$School_ID";
          $result= mysqli_query($conn,$query);
          ?>
          <select class="custom-select form-control-border" name="student_id" id="student_id" required="">
            <option>-ជ្រើសរើសសិស្ស-</option>
            <?php
            WHILE ($rows =$result->fetch_assoc()){
              $Student_ID =$rows['Student_ID'];
              $studentname_kh =$rows['studentname_kh'];
              echo "<option value='$Student_ID'>$studentname_kh</option>";
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