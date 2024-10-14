<?php
  //Start Session
session_start();
  //Import class.php
require('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
  //Import restrict.php
// require('inc/restrict.php');
if(!isset($_SESSION['DOE_ID']) || !isset($_SESSION['Password'])){
    //Redirect Page
  header('location:index.php');
}else{
  $username = $_SESSION['DOE_ID'];
  $pwd = $_SESSION['Password'];
    //Check User Name and Pwd
  $result = $obj->fun_checkadminuserpwd($username,$pwd);
  if(!$result){
      //Redirect Page
    header('location:index.php');
  }
}
require('inc/header.php');
require('sidebar_Admin.php');



?>
<link rel="stylesheet" type="text/css" href="action/includes/style_custrom.css">
<div class="content-wrapper" style="height: auto;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-primary">
          <h4>
            <i class="fas fa-graduation-cap"></i>​ ប្រភេទកុមារពិការ
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
                <table id="example" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr>
                      <th style="width: 10%;">ល.រ</th>
                      <th style="width: 40%;">ប្រភេទពិការ</th>
                      <th style="width: 20%">ផ្សេងៗ</th>
                      <th style="width: 20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include '../action/connection.php';
                    $query="select * from tbl_child_profile";
                    $result= mysqli_query($conn,$query);
                    ?>
                    <?php if($result->num_rows>0):?>
                      <?php while($array=mysqli_fetch_row($result)): ?>
                        <tr>
                          <td><?php echo $array[0]; ?></td>
                          <td><?php echo $array[1]; ?></td>
                          <td><?php echo $array[2]; ?></td>
                          <td>
                            <a href="javascript:void(0)"  class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $array[0];?>"></a>
                            <a href="javascript:void(0)" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $array[0];?>"></a>
                          </td>


                        </tr>
                      <?php endwhile; ?>
                      <?php else:; ?>
                        <tr>
                          <td colspan="3" rowspan="1" headers="">No Data Found</td>
                        </tr>
                      <?php endif; ?>
                      <?php mysqli_free_result($result); ?>
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
          <input type="text" class="form-control" id="child_ID" hidden="" name="child_ID" placeholder="Grade_ID" value="" >
        </div>
      </div>  
      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control form-control-border" id="chile_Profile" name="chile_Profile" placeholder="ប្រភេទកុមារ" value="" maxlength="50" required="">
        </div>
      </div>  
      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control form-control-border" id="other" name="other" placeholder="ផ្សេងៗ" value="" maxlength="50">
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


<?php require('inc/footer.php'); ?>


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
      url: "../action/childprofile_edit.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#userModel').html("កែប្រែ");
        $('#user-model').modal('show');
        $('#child_ID').val(res.child_ID);
        $('#chile_Profile').val(res.chile_Profile);
        $('#other').val(res.other);
      }
    });
  });

    $('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
      type:"POST",
      url: "../action/childprofile_insert_update.php",
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
      url: "../action/childprofile_delete.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
       $('#child_ID').val(res.child_ID);
       $('#chile_Profile').val(res.chile_Profile);
       $('#other').val(res.other);
       window.location.reload();
     }
   });
  }
})
  });

  });
</script>
</div>



