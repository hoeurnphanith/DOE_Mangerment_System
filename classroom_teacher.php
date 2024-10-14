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

<style>
  /*@import url('https://fonts.googleapis.com/css2?family=Kantumruy:wght@700&display=swap');*/
  @import url('https://fonts.googleapis.com/css2?family=Kantumruy&display=swap');
  .table{
    font-size: 20px;
    font-family: 'Kantumruy', sans-serif;
  }
  form,a{
   font-family: 'Kantumruy', sans-serif;
 }
 h1,h2,h3,h4,h5,h6{
   font-family: 'Koulen', cursive;
 }
</style>
<div class="content-wrapper" style="height: auto;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-primary">
          <h4>
            <i class="fas fa-graduation-cap"></i> គ្រប់គ្រង់ ព័ត៌មានគ្រូ
          </h4>
        </div>
        <div class="col-sm-6 text-primary">
          <h2>
            <ol class="breadcrumb float-sm-right">

               <a href="classroom.php"><i class="fas fa-arrow-left"></i></a>
            </ol>
          </h2>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="container-fluid ">
    <div class="row">
      <div class="col-sm-12">
        <div class="card"​​ style="margin: 10px; margin-top: 0px; margin-bottom: 10px;">
          <div class="card-header">
            <div class="card-body">
              <!-- button -->
              <div class="nav justify-content-end">
                <button type="button" class="btn btn-add" id="addnew" data-toggle="modal" data-target="#exampleModal" style="background: #28a745">
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
                  <table id="example" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                    <thead>
                      <tr>
                        <th>ល.រ</th>

                        <th>កម្រិតថ្នាក់</th>
                        <th>បន្ទប់</th>
                        <th>ឆ្នាំសិក្សា</th>
                        <th>គ្រប់គ្រង់</th>
                        <th>សកម្មភាព</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     $class = $obj->fun_displaydata("tbl_classroom");
                     foreach($class as $records){
                      $Classroom_ID = $records['Classroom_ID'];
                      $Grade_ID = $records['Grade_ID'];
                      $Classroom_Name = $records['Classroom_Name'];
                      $Years_Study = $records['Years_Study'];

                      ?><?php
                      $grade = $obj->fun_displaydata("tbl_grade WHERE Grade_ID = '$Grade_ID'");
                  // $users = $obj->fun_displaydata("tbl_users where User_Type='school'");
                      foreach ($grade as $records){
                        $Grade_Name = $records['Grade_Name'];
                      }
                      ?>

                      <tr>
                        <td><?php echo $Classroom_ID; ?></td>
                        <td><?php echo $Grade_Name; ?></td>
                        <td><?php echo  $Classroom_Name;  ?></td>
                        <td><?php echo  $Years_Study; ?></td>

                        <td>
                        
                          <a href="classroom_manage.php ?key=<?php echo $Classroom_ID;?>" class="btn btn-primary edit text-white">
                          គ្រប់គ្រង
                        </a>
                          
                        </td>

                        <td>
                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $Classroom_ID;?>"></a>
                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $Classroom_ID;?>"></a>
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
          <input type="text" class="form-control form-control-border" id="Classroom_ID" hidden="" name="Classroom_ID" placeholder="Classroom_ID" value="" >
        </div>
      </div>
      <div class="form-group">

        <div class="col-sm-12">
          <?php
          include 'action/connection.php';
          $query="select * from tbl_grade";
          $result= mysqli_query($conn,$query);
          ?>
          <select class="custom-select form-control-border" name="grade_id" id="exampleSelectBorder" required="">
            <option>-ជ្រើសរើស-</option>
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
          <input type="text" class="form-control form-control-border" id="Classroom_Name  " name="Classroom_Name" placeholder="Classroom_Name" value="" maxlength="50">
        </div>
      </div> 

      
      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control form-control-border" id="Years_Study  " name="Years_Study" placeholder="Years_Study" value="" maxlength="50">
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
</div>


<?php require('footer.php'); ?>


<!-- alert insert -->
<?php
if(isset($_SESSION['insert'])){
  ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'success',
      title: '<?php echo $_SESSION['insert'] ?>'
    })
  </script>
  <?php 
  unset($_SESSION['insert']);
}
?>
<!-- end alert insert -->
<!-- alert update -->
<?php
if(isset($_SESSION['update'])){
  ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'success',
      title: '<?php echo $_SESSION['update'] ?>'
    })
  </script>
  <?php 
  unset($_SESSION['update']);
}
?>
<!-- end alert update -->
<!-- alert delete -->
<?php
if(isset($_SESSION['delete'])){
  ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'success',
      title: '<?php echo $_SESSION['delete'] ?>'
    })
  </script>
  <?php 
  unset($_SESSION['delete']);
}
?>
<!-- end alert delete -->
<!-- alert data -->
<?php
if(isset($_SESSION['data'])){
  ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'warning',
      title: '<?php echo $_SESSION['data'] ?>'
    })
  </script>
  <?php 
  unset($_SESSION['data']);
}
?>
<!-- end alert data -->


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


