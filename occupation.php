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
    form{
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
          <h2>
            <i class="fas fa-graduation-cap"></i>​ មុខរបរការងារ
          </h2>
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
            <!-- button -->
          <div class="nav justify-content-end">
            <button type="button" class="btn btn-add" id="addnew" data-toggle="modal" data-target="#exampleModal" style="background: #28a745">
             <i class="fas fa-plus text-white " id="add" ></i>
             <a class="text-white" style="font-family: 'Kantumruy', sans-serif;">បញ្ចូលខេត្ដ</a>
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
                  <th style="width: 30%;">មុខរបរ</th>
                  <th style="width: 20%">ផ្សេងៗ</th>
                  <th style="width: 20%">សកម្មភាព</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'action/connection.php';
                $query="select * from tbl_occupation";
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
            <input type="text" class="form-control" id="Occupation_ID" hidden="" name="Occupation_ID" placeholder="Occupation_ID" value="" >
          </div>
        </div>  
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control" id="Occupation" name="Occupation" placeholder="Occupation" value="" maxlength="50" required="">
          </div>
        </div>  
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control" id="other" name="other" placeholder="other" value="" maxlength="50">
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
      url: "action/occupation_edit.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#userModel').html("កែប្រែ");
        $('#user-model').modal('show');
        $('#Occupation_ID').val(res.Occupation_ID);
        $('#Occupation').val(res.Occupation);
        $('#other').val(res.other);
      }
    });
  });

    $('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
      type:"POST",
      url: "action/occupation_insert_update.php",
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
      url: "action/occupation_delete.php",
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



