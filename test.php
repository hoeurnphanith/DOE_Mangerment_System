<?php
  //Start Session
session_start();
  //Import class.php
require('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
  //Import restrict.php
// require('inc/restrict.php');
// if($_SESSION['Role']!=="school"){
//     //Redirect Page
//   header('location:index.php');
// }
?>

<?php require('header.php'); ?>
<?php require('sidebar_school.php'); ?>
<div class="content-wrapper" style="height: auto;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-primary">
          <h4>
            <i class="fas fa-graduation-cap"></i> វត្ដមានសិស្ស
          </h4>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="container-fluid ">
    <div class="row">
      <div class="col-sm-12">
        <div class="card" style="margin: 10px; margin-top: 0px; margin-bottom: 10px;">
          <div class="card-header">
            <div class="card-body">
             <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <!-- row -->
              <!--END row -->

              <!-- row -->
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-primary">
                    <!-- <div class="box-header with-border">
                      <h3 class="box-title"><i class="fa fa-search"></i> Select Class For Attendance</h3>
                    </div> -->
                    <form id="form1" action="" method="post" accept-charset="utf-8">
                      <div class="box-body">            
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                include 'action/connection.php';
                                $query="select * from tbl_grade";
                                $result= mysqli_query($conn,$query);
                                ?>
                                <select type="text" class="form-control form-control-border" style="padding-bottom: 2px;" id="grade_id" name="grade_id" placeholder="grade_id" value="" maxlength="50">
                                  <option>--:--</option>
                                  <option>-ជ្រើសរើសកម្រិតថ្នាក់-</option>
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
                        </div>
                      </div>
                      <div class="box-footer">
                        <button type="button" id="search" name="search" value="search" style="margin-bottom:10px;" class="btn btn-primary btn-sm  checkbox-toggle"><i class="fa fa-search"></i> Search</button> <br>
                      </div>
                    </form>
                  </div>
         
                 <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">         
                  <div style="color:red;margin-top:20px;" class="hidden" id="message"></div>
                  <div class="nav justify-content-end">
                  <button type="submit" id="saveAttendance" name="saveAttendance" value="Save Attendance" style="margin-bottom:10px;" class="btn btn-primary btn-sm  pull-right checkbox-toggle hidden"><i class="fa fa-save"></i> Save Attendance</button> 
                </div>
                  <table id="example" class="table table-bordered table-hover dataTable dtr-inline" style="font-size: 16px;" role="grid" aria-describedby="example2_info">
                    <thead>
                      <tr>
                        <th>#</th>                
                        <th>Roll No</th>  
                        <th>Name</th>
                        <th>Attendance</th>                         
                      </tr>
                    </thead>
                  </table>
                  <input type="hidden" name="action" id="action" value="updateAttendance" />
                  <input type="hidden" name="att_classid" id="att_classid" value="" />
                  <input type="hidden" name="att_sectionid" id="att_sectionid" value="" />
                </form>
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
<?php require('action/includes/attandance_stu_modal.php'); ?>
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
      url: "action/grade_edit.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#userModel').html("កែប្រែ");
        $('#user-model').modal('show');
        $('#Grade_ID').val(res.Grade_ID);
        $('#Grade_Name').val(res.Grade_Name);
        $('#Decription').val(res.Decription);
      }
    });
  });

    $('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
      type:"POST",
      url: "action/attandance_student_insert_update.php",
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
      url: "action/grade_delete.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#Grade_ID').html(res.Grade_ID);
        $('#Grade_Name').html(res.Grade_Name);
        $('#Decription').html(res.Decription);
        window.location.reload();
      }
    });
  }
})
  });

  });
</script>
</div>



