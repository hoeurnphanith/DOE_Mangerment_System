
<?php
  //Start Session
session_start();
  //Import class.php
require_once('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
  //Import restrict.php
require_once('inc/restrict.php');
if($_SESSION['Role']!=="school"){
    //Redirect Page
  header('location:index.php');
}

?>

<?php
include 'header.php';
include 'sidebar_school.php';
?>
<link rel="stylesheet" type="text/css" href="action/includes/style_custrom.css">

<div class="content-wrapper" style="height: auto;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-primary">
          <h4>
            <i class="fas fa-graduation-cap"></i> ព័ត៌មានគ្រូ
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
             <!-- button -->
             <div class="nav justify-content-end">
              <button type="button" class="btn btn-add​ btn-primary" id="addnew" data-toggle="modal" data-target="#exampleModal">
               <i class="fas fa-plus text-white " id="add" ></i>
               <a class="text-white" style="font-family: 'Kantumruy', sans-serif;"></a>
             </button>
           </div>
           <!-- button -->&nbsp;
           <!-- row -->
           <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
             <div class="card-body table-responsive p-0">
               <div class="col-sm-12">

                 <table id="example" class="table table-bordered table-hover dataTable dtr-inline" style="font-size: 16px; min-width: max-content; " role="grid"​ style="font-family: 'Kantumruy', sans-serif;" aria-describedby="example2_info">
                  <thead>
                    <tr >
                      <th rowspan="2">ល.រ</th>
                      <th rowspan="2">គោត្តនាម និងនាម</th>
                      <th rowspan="2">ភេទ</th>
                      <th rowspan="2">ថ្ងៃខែឆ្នាំ កំណើត</th>
                      <th rowspan="2">កំរិតវប្បធម៌</th>
                      <th rowspan="2">ក្របខណ្ឌបច្ចុប្បន្ន</th>
                      <th rowspan="2" style="text-align: center;">តួនាទី និងភារកិច្ច<br>(បើសិក្ខាបនធារី ត្រូវបញ្ជាក់កម្រិតថ្នាក់ដែលបង្រៀន)</th>
                      <th colspan="2">ព័ត៌មានសិស្ស</th>
                      <!-- <th colspan="2">ពេលបង្រៀន</th> -->
                    </tr>
                    <tr>
                      <th>សរុប</th>
                      <th>ស្រី</th>
                      <!-- <th>ព្រឹក</th>
                        <th>ល្ងាច</th> -->
                        <!-- <td>C</td> -->
                    <!-- <td>D</td>
                    <td>E</td>
                    <td>F</td>
                    <td>G</td>
                    <td>H</td> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $School_ID = $_SESSION['User_Name'];
                  $student = $obj->fun_displaydata("tbl_teacher WHERE School_ID =$School_ID");
                  foreach($student as $records){
                    $ID_Teacher = $records['ID_Teacher'];
                    $Teacher_ID = $records['Teacher_ID'];
                    $School_ID = $records['School_ID'];
                    $Teacher_NameKH = $records['Teacher_NameKH'];
                    $Teacher_NameEN = $records['Teacher_NameEN'];
                    $Gender = $records['Sex'];
                    $DOB = $records['DOB'];
                    $Start_Date_Work = $records['Start_Date_Work'];
                    $Date_Certi = $records['Date_Certi'];
                    $Teacher_Framework = $records['Teacher_Framework'];
                    $Teacher_Position = $records['Teacher_Position'];
                    $Lavel_Type = $records['Lavel_Type'];
                    $Subject1 = $records['Subject1'];
                    $Subject2 = $records['Subject2'];
                    $last_Certivicate = $records['last_Certivicate'];
                    $Province_ID = $records['Province_ID'];
                    $District_ID = $records['District_ID'];
                    $Commune_ID = $records['Commune_ID'];
                    $Village_ID = $records['Village_ID'];
                    $POB_Province = $records['POB_Province'];
                    $POB_District = $records['POB_District'];
                    $POB_Commune = $records['POB_Commune'];
                    $POB_Village= $records['POB_Village'];
                    $Relationship = $records['Relationship'];
                    ?>

                    <?php

                    $sql= mysqli_query($obj->fun_link(),"SELECT Classroom_ID FROM tbl_teacher_classroom WHERE Teacher_ID = '$Teacher_ID'");
                    while($row = mysqli_fetch_array($sql)){
                      $Classroom_ID=$row['Classroom_ID'];
                    }

                    $sql= mysqli_query($obj->fun_link(),"SELECT Grade_ID,Classroom_Name FROM tbl_classroom where Classroom_ID='$Classroom_ID'");
                    while($row = mysqli_fetch_array($sql)){
                      $Grade_ID=$row['Grade_ID'];
                      $Classroom_Name=$row['Classroom_Name'];
                    }
                    $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_grade WHERE Grade_ID = '$Grade_ID'");
                    while($row = mysqli_fetch_array($sql)){
                      $Grade_Name=$row['Grade_Name'];
                    }

                    $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_classroom_student WHERE Classroom_ID");
                    while($row = mysqli_fetch_array($sql)){
                      $Student_ID=$row['Student_ID'];
                    }
                    

                    $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_ID'");
                    while($row = mysqli_fetch_array($sql)){
                      $School_NameKH=$row['School_NameKH'];
                    }
                    ?>
                    <tr>
                      <td><?php echo $ID_Teacher; ?></td>
                      <td><?php echo $Teacher_NameKH; ?></td>
                      <td><?php echo $Gender; ?></td>
                      <td><?php echo $DOB; ?></td>
                      <td><?php echo $last_Certivicate; ?></td>

                      <td><?php echo $Teacher_Framework; ?></td>
                      <td><?php echo $Teacher_Position.$Grade_Name."($Classroom_Name)"?></td>
                      <td>
                        <?php
                        $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_classroom_student WHERE Classroom_ID = '$Classroom_ID'");
                        $row = mysqli_fetch_array($result);
                        $total = $row[0];
                        echo $total;
                        mysqli_close($obj->pro_link);
                        ?>
                      </td>
                      <td><?php
                      $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_student where Student_ID='$Student_ID'");
                      while($row = mysqli_fetch_array($sql)){
                        $sex=$row['sex'];
                      }

                      $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_classroom_student WHERE Classroom_ID = '$Classroom_ID' AND Student_ID = $Student_ID");
                      $row = mysqli_fetch_array($result);
                      $total = $row[0];
                      echo $total;
                      mysqli_close($obj->pro_link);
                      ?></td>
                      <!-- <td></td>
                        <td></td> -->
                      </tr>
                      <?php

                    }
                    ?>
                  </tbody>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<?php include 'action/includes/teacher_modal.php';?>
</div>
<?php include 'footer.php';?>
<?php include 'action/includes/alert_crud.php';?>
<!-- Update Photo -->
<div class="modal fade" id="edit_photos">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="POST" action="employee_edit_photo.php" enctype="multipart/form-data">
            <input type="hidden" class="empid" name="id">
            <div class="form-group">
              <label for="photo" class="col-sm-3 control-label">Photo</label>

              <div class="col-sm-9">
                <input type="file" id="photo" name="photo" required>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>

        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function($){
      $('#addnew').click(function(){
        $('#userInserUpdateForm').trigger("reset");
        $('#userModel').html("បញ្ចូលព័ត៌មានគ្រូ");
        $('#user-model').modal('show');
      });
      $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
    // ajax
    $.ajax({
      type:"POST",
      url: "action/teacher_edit.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#userModel').html("Edit District");
        $('#user-model').modal('show');
        $('#ID_Teacher').val(res.ID_Teacher);
        $('#Teacher_ID').val(res.Teacher_ID);
        $('#School_ID').val(res.School_ID);
        $('#Teacher_NameKH').val(res.Teacher_NameKH);
        $('#Teacher_NameEN').val(res.Teacher_NameEN);
        $('#gender').val(res.Sex);
        $('#DOB').val(res.DOB); 
        $('#Start_Date_Work').val(res.Start_Date_Work);
        $('#Date_Certi').val(res.Date_Certi);
        $('#Teacher_Framework').val(res.Teacher_Framework);
        $('#Teacher_Position').val(res.Teacher_Position); 
        $('#Lavel_Type').val(res.Lavel_Type);
        $('#Subject1').val(res.Subject1);
        $('#Subject2').val(res.Subject2);
        $('#last_Certivicate').val(res.last_Certivicate); 
        $('#POB_Province').val(res.POB_Province);
        $('#POB_District').val(res.POB_District); 
        $('#POB_Commune').val(res.POB_Commune);
        $('#POB_Village').val(res.POB_Village);
        $('#Province_ID').val(res.Province_ID); 
        $('#district_ID').val(res.district_ID);
        $('#commune_ID').val(res.commune_ID); 
        $('#village_ID').val(res.village_ID);
        $('#Relationship').val(res.Relationship);
      }
    });
  });

      $('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
      type:"POST",
      url: "action/teacher_insert_update.php",
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
      url: "action/teacher_delete.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
      }
    });
  }
})
    });
    });
  </script>
</div>


