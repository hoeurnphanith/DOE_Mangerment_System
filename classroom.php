<?php
  //Start Session
session_start();
  //Import class.php
require('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
  //Import restrict.php
require('inc/restrict.php');
if($_SESSION['Role']!=="school"){
    //Redirect Page
  header('location:index.php');
}
?>

<?php require('header.php'); ?>
<?php require('sidebar_school.php'); ?>
<link rel="stylesheet" type="text/css" href="action/includes/style_custrom.css">
<div class="content-wrapper" style="height: auto;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-primary">
          <h4>
            <i class="fas fa-graduation-cap"></i> បន្ទប់សិក្សា
          </h4>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="container-fluid">
   <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="card"​ style="margin: 10px; margin-top: 0px; margin-bottom: 10px;">

        <div class="card-header">
          <div class="card-body">
           <div class="nav justify-content-end">
            <!-- <button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
             <a href="classroom_teacher.php" class="text-white">
              គ្រូសរុប
            </a>
          </button>&nbsp &nbsp --> 
          <!-- <button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
           <a href="classroom_student.php" class="text-white">
            សិស្សសរុប
          </a>
        </button>&nbsp &nbsp  -->

        <button type="button" class="btn btn-add" id="addnew" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
         <i class="fas fa-plus text-white " id="add" ></i>
         <a class="text-white" style="font-family: 'Kantumruy', sans-serif;"></a>
       </button>
     </div>
     <!-- button -->


     &nbsp;

     <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
      <!-- row -->
      <!--END row -->

      <!-- row -->
      <div class="row">
       <div class="card-body table-responsive p-0">
         <div class="col-sm-12">
          <table id="example" class="table table-bordered table-hover dataTable dtr-inline" style="font-size: 16px;" role="grid" aria-describedby="example2_info">
            <thead>
              <tr>
                <!-- <th>ល.រ</th> -->
                <th>កម្រិតថ្នាក់</th>
                <th>សាលារៀន</th>
                <th>បន្ទប់</th>
                <th>ឆ្នាំសិក្សា</th>
                <th>គ្រប់គ្រង</th>
                <th>សកម្មភាព</th>
              </tr>
            </thead>
            <tbody>
             <?php
             $School_ID = $_SESSION['User_Name'];
             $class = $obj->fun_displaydata("tbl_classroom WHERE School_ID =$School_ID");
             foreach($class as $records){
              $Classroom_ID = $records['Classroom_ID'];
              $Grade_ID = $records['Grade_ID'];
              $Classroom_Name = $records['Classroom_Name'];
              $Years_Study = $records['Years_Study'];
              $School_ID1 = $records['School_ID'];

              $School_ID = $_SESSION['User_Name'];

              $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_ID1'");
              while($row = mysqli_fetch_array($sql)){
                $School_Name=$row['School_NameKH'];
              }

              $grade = $obj->fun_displaydata("tbl_grade WHERE Grade_ID = '$Grade_ID'");
              foreach ($grade as $records){
                $Grade_Name = $records['Grade_Name'];
              }
              ?>

              <tr>
                <!-- <td><?php echo $Classroom_ID; ?></td> -->
                
                <td><?php echo $Grade_Name; ?></td>
                <td><?php echo $School_Name; ?></td>
                <td><?php echo  $Classroom_Name; ?></td>
                <td><?php echo  $Years_Study; ?></td>

                <td>

                  <a href="classroom_manage.php ?key=<?php echo $Classroom_ID;?>" class="btn btn-success  text-white">
                    <i class="fas fa-cog"></i>
                    សិស្ស
                  </a>

                  <a href="classroom_manage_teacher.php ?key=<?php echo $Classroom_ID;?>" class="btn btn-success  text-white">
                    <i class="fas fa-cog"></i>
                    គ្រូបន្ទុក
                  </a>

                </td>

                <td>
                  <a href="javascript:void(0)"  class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $Classroom_ID; ?>"></a>
                  <a href="javascript:void(0)" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $Classroom_ID; ?>"></a>
                </td>



              </tr>
              <?php

            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- row -->
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade " id="user-model" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="font-family: 'Koulen', cursive; color: #007bff;" id="userModel"></h4>
      </div>
      <div class="modal-body" >
        <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST" >
         <div class="form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control form-control-border" id="Classroom_ID" hidden="" name="Classroom_ID" placeholder="Classroom_ID" value="" >
          </div>
        </div>
        <div class="form-group" >
          <div class="col-sm-12" >
            <?php
            $School_ID = $_SESSION['User_Name'];
            $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_ID'");
            ?> 
            <select class="form-control form-control-border border-width-2 " hidden="" id="School_ID" name="School_ID"  style="padding-bottom: 2px;">
              <?php 
              while($row = mysqli_fetch_array($sql)){
                $School_ID = $row['School_ID'];
                $School_Name=$row['School_NameKH'];
                ?>
                <option value="<?php echo $School_ID; ?>">
                  <?php echo $School_Name; ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">

          <div class="col-sm-12" >
            <?php
            include 'action/connection.php';
            $query="select * from tbl_grade";
            $result= mysqli_query($conn,$query);
            ?>
            <select type="text" class="form-control form-control-border" style="padding-bottom: 2px;" id="grade_id" name="grade_id" placeholder="grade_id" value="" maxlength="50">
              <!-- <option>-ជ្រើសរើសកម្រិតថ្នាក់-</option> -->
              <?php
              WHILE ($rows =$result->fetch_assoc()){
                $Grade_Name =$rows['Grade_Name'];
                $Grade_ID =$rows['Grade_ID'];
                echo "<option value='$Grade_ID'>$Grade_Name</option>";
              }
              ?>
            </select>
          </div>
        </div>  
        <div class="form-group">
          <div class="col-sm-12">
            <?php
            include 'action/connection.php';
            $query="select * from session";
            $result= mysqli_query($conn,$query);
            ?>
            <select type="text" class="form-control form-control-border" id="Years_Study" name="Years_Study" value="" maxlength="50" style="padding-bottom: 2px;">
              <!-- <option>-ជ្រើសរើសឆ្នាំសិក្សា-</option> -->
              <?php
              WHILE ($rows =$result->fetch_assoc()){
                $session_id =$rows['session_id'];
                $name =$rows['name'];
                echo "<option value='$name'>$name</option>";
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text" style="padding-bottom: 2px;" class="form-control form-control-border" id="Classroom_Name" name="Classroom_Name" placeholder="បន្ទប់" value="" maxlength="50" required="">
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
</div>

<!-- End Modal -->
</div>

<?php require('footer.php'); ?>
<?php require('action/includes/alert_crud.php'); ?>

<script>
  $(document).ready(function($){
    $('#addnew').click(function(){
      $('#userInserUpdateForm').trigger("reset");
      $('#userModel').html("បន្ថែម");
      $('#user-model').modal('show');
    });
    $('body').on('click', '.edit', function () {
      var id = $(this).data('id');
    // ajax
    $.ajax({
      type:"POST",
      url: "action/classroom_edit.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#userModel').html("កែប្រែ");
        $('#user-model').modal('show');
        $('#Classroom_ID').val(res.Classroom_ID);
        $('#grade_id').val(res.Grade_ID);
        $('#Classroom_Name').val(res.Classroom_Name);
        $('#Years_Study').val(res. Years_Study);
      }
    });
  });

    $('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
      type:"POST",
      url: "action/classsroom_insert_update.php",
    data: $(this).serialize(), // get all form field value in 
    dataType: 'json',
    success: function(res){
      window.location.reload();
    }
  });
  });
    $('body').on('click', '.delete', function () {
     Swal.fire({
      title: 'តើអ្នកប្រាកដថាចង់លុបទេ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'ទេ',
      confirmButtonText: 'យល់ព្រម'
    }).then((result) => {
      if (result.isConfirmed) {
        var id = $(this).data('id');
    // ajax
    $.ajax({
      type:"POST",
      url: "action/classroom_delete.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        window.location.reload();
      }
    });
  }
})
  });

  });
</script>
</div>



