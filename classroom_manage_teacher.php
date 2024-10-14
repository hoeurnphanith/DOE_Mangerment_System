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
            <i class="fas fa-graduation-cap"></i> គ្រប់គ្រងគ្រូបន្ទុក
          </h4>
        </div>
        <div class="col-sm-6 text-primary">
          <h4>
            <ol class="breadcrumb float-sm-right">

             <a href="classroom.php"><i class="fas fa-arrow-left"></i></a>
           </ol>
         </h4>
       </div>

     </div>

   </div><!-- /.container-fluid -->

 </section>

 <section class="content-header"​​ style="text-align: -webkit-center;">
  <?php
  $id = $_GET['key'];
  $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_classroom where Classroom_ID='$id'");

  while($row = mysqli_fetch_array($sql)){
    $Grade_ID=$row['Grade_ID'];
    $Classroom_Name=$row['Classroom_Name'];
    $Years_Study=$row['Years_Study'];
  }
  $sql1= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_grade where Grade_ID='$Grade_ID'");
  while($row = mysqli_fetch_array($sql1)){
    $Grade_ID=$row['Grade_ID'];
    $Grade_Name=$row['Grade_Name'];
  }

  $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_classroom_student WHERE Classroom_ID = '$id';");
  $row = mysqli_fetch_array($result);
  $total_stu = $row[0];

  $result1 = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_teacher_classroom WHERE Classroom_ID = '$id';");
  $row = mysqli_fetch_array($result1);
  $total_tr = $row[0];

  mysqli_close($obj->pro_link);


  ?>


  <div class="row col-md-12">
    <div class="col-md-3">

      <!-- Info Boxes Style 2 -->
      <div class="info-box mb-3 bg-info">
        <span class="info-box-icon text-white"><i class="fas fa-user-graduate"></i></span>

        <div class="info-box-content text-white">
          <span class="info-box-text">កម្រិតថ្នាក់</span>
          <span class="info-box-text"><?php echo $Grade_Name ;?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-3">

      <!-- Info Boxes Style 2 -->
      <div class="info-box mb-3 bg-success">
        <span class="info-box-icon"><i class="fas fa-chalkboard"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">បន្ទប់</span>
          <span class="info-box-text"><?php echo $Classroom_Name ;?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-3">

      <!-- Info Boxes Style 2 -->
      <div class="info-box mb-3 bg-warning ">
        <span class="info-box-icon text-white"><i class="fas fa-users"></i></span>

        <div class="info-box-content text-white">
          <span class="info-box-text">ចំនួនសិស្ស</span>
          <span class="info-box-number"><?php echo $total_stu ;?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-3">

      <!-- Info Boxes Style 2 -->
      <div class="info-box mb-3  bg-danger">
        <span class="info-box-icon "><i class="fas fa-chalkboard-teacher"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">ចំនួនគ្រូសរុប</span>
          <span class="info-box-number"><?php echo $total_tr ;?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
  </div>
</section>



<div class="container-fluid ">

  <div class="row" style="margin: 10px; margin-top: 0px; margin-bottom: 10px;">
    <div class="col-sm-12" >
     &nbsp;

     <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <!-- <h3 class="card-title">គ្រប់គ្រងគ្រូ</h3> -->
            <!-- button -->
            <div class="nav justify-content-end">
              <!-- <a href="print.php" class="btn btn-add"><span>Print</span></a>
                &nbsp &nbsp -->

                
                <button type="button" class="btn btn-add" id="addnew" data-toggle="modal" data-target="#exampleModal" style="background: #28a745">
                 <i class="fas fa-plus text-white " id="add" ></i>
                 <a class="text-white" style="font-family: 'Kantumruy', sans-serif;"></a>
               </button>
             </div>
             <!-- button -->
           </div>

           <!-- /.card-header -->
           <div class="card-body">
            <table id="example" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
              <thead>
                <tr>
                  <th>ល.រ</th>
                  <th>អត្ដលេខ</th>
                  <th>ឈ្មោះគ្រូ</th>
                  <th>ភេទ</th>
                  <th>តួនាទី</th>
                  <!-- <th>លេខទូរសព្ទ</th> -->
                  <th>បន្ទប់ថ្នាក់ទី</th>
                  <!-- <th>ថ្នាក់រៀន</th> -->
                  <!-- <th>លេខទូរសព្ទអាណាព្យាបាល</th> -->
                  <th>សកម្មភាព</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $key = $_GET['key'];
               $classroom = $obj->fun_displaydata("tbl_teacher_classroom WHERE Classroom_ID = '$key'");
               foreach($classroom as $records){
                $ID = $records['ID'];
                $ClassroomID = $records['Classroom_ID'];
                $Teacher_ID = $records['Teacher_ID'];

                $teacher= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_teacher where Teacher_ID ='$Teacher_ID'");
                while($row = mysqli_fetch_array($teacher)){
                  $Teacher_ID=$row['Teacher_ID'];
                  $Teacher_NameKH=$row['Teacher_NameKH'];
                  $Sex=$row['Sex'];
                  $Teacher_Position=$row['Teacher_Position'];
                }

                $grade= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_classroom where Classroom_ID ='$ClassroomID'");
                while($row = mysqli_fetch_array($grade)){
                  $ClassroomID=$row['Classroom_ID'];
                  $Grade_ID=$row['Grade_ID'];
                  $Classroom_Name=$row['Classroom_Name'];
                  $Years_Study=$row['Years_Study'];

                }
                ?>
                
                <?php
                      // $School_ID = $_SESSION['User_Name'];
                $name_stu= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_grade where Grade_ID ='$Grade_ID'");
                while($row = mysqli_fetch_array($name_stu)){
                  $Grade_ID=$row['Grade_ID'];
                  $Grade_Name=$row['Grade_Name'];
                }
                ?>
                <tr>
                  <td><?php echo $ID; ?></td>
                  <td><?php echo $Teacher_ID; ?></td>
                  <td><?php echo $Teacher_NameKH; ?></td>
                  <td><?php echo $Sex; ?></td>
                  <td><?php echo $Teacher_Position; ?></td>

                  <td><?php echo $Grade_Name."(".$Classroom_Name.")"; ?></td>
                  <!-- <td><?php echo $Years_Study; ?></td> -->


                  <td>
                    <!-- <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $ID;?>"></a> -->
                    <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $ID;?>"> Remove</a>
                  </td>


                </tr>
                <?php

              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.card -->
</div>
</div>
<!-- /.col -->
</div>
</div>
</div>
</div>
</div>
</div>
<?php require('action/includes/classroom_teacher_modal.php'); ?>
</div>
<?php require('footer.php'); ?>
<?php require('action/includes/alert_crud.php'); ?>
<script>
  function printPage(){
    var tableData = '<table border="1">'+document.getElementsByTagName('table')[0].innerHTML+'</table>';
    var data = '<button onclick="window.print()">Print this page</button>'+tableData;       
    myWindow=window.open('','','width=800,height=600');
    myWindow.innerWidth = screen.width;
    myWindow.innerHeight = screen.height;
    myWindow.screenX = 0;
    myWindow.screenY = 0;
    myWindow.document.write(data);
    myWindow.focus();
  };

</script>
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
      url: "action/classroom_teacher_edit.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#userModel').html("កែប្រែ");
        $('#user-model').modal('show');
        $('#Classroom_ID').val(res.Classroom_ID);
        $('#Classroom_Name').val(res.Classroom_Name);
        $('#grade_id').val(res.Grade_ID);
        $('#Years_Study').val(res.Years_Study);

      }
    });
  });

    $('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
      type:"POST",
      url: "action/classroom_teacher_insert_update.php",
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
      url: "action/classroom_teacher_delete.php",
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



