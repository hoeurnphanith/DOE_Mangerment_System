<?php
  //Start Session
session_start();
  //Import class.php
require('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
  //Import restrict.php
require('inc/restrict.php');
if($_SESSION['Role']!=="school" && $_SESSION['Role']!=="doe"){
    //Redirect Page
  header('location:index.php');
}
require('header.php');

if($_SESSION['Role']=="school"){
  require('sidebar_school.php'); 
}
if($_SESSION['Role']=="doe"){
  require('sidebar_Admin.php');
} 


?>

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
            <i class="fas fa-graduation-cap"></i>​ ស្រុក
          </h2>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card"​ style="margin: 10px; margin-top: 0px; margin-bottom: 10px;">

          <div class="card-header">
            <div class="card-body">
             <!-- button -->
             <div class="nav justify-content-end">
              <button type="button" class="btn btn-add" id="addnew" data-toggle="modal" data-target="#exampleModal" style="background: #28a745">
               <i class="fas fa-plus text-white " id="add" ></i>
               <a class="text-white" style="font-family: 'Kantumruy', sans-serif;">បញ្ចូលស្រុក</a>
             </button>
           </div>
           <!-- button -->&nbsp;
           <!-- row -->
           <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
             <div class="card-body table-responsive p-0">
               <div class="col-sm-12">
                <table id="example" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr>
                      <th style="width: 15%">ល.រ</th>
                      <th style="width: 40%">ឈ្មោះស្រុក</th>
                      <th style="width: 15%">លេខកូដស្រុក</th>
                      <th style="width: 15%">លេខសំគាល់ខេត្ដ</th>
                      <th >សកម្មភាព</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $district = $obj->fun_displaydata("tbl_district");
                    foreach($district as $records){
                      $district_ID = $records['district_ID'];
                      $province_ID = $records['province_ID'];
                      $District_Name = $records['District_Name'];
                      $Postcode = $records['Postcode'];

                      ?>
                      <?php
                      $province = $obj->fun_displaydata("tbl_province WHERE province_ID = '$province_ID'");
                  // $users = $obj->fun_displaydata("tbl_users where User_Type='school'");
                      foreach ($province as $records){
                        $province_Name = $records['province_Name'];
                      }

                  //     $district = $obj->fun_displaydata("tbl_district WHERE district_ID = '$School_District'");
                  //     foreach ($district as $records){
                  //       $District_Name = $records['District_Name'];
                  //     }

                  //     $commune = $obj->fun_displaydata("tbl_commune WHERE Commune_ID = '$School_Commune'");
                  //     foreach ($commune as $records){
                  //       $Commune_Name = $records['Commune_Name'];
                  //     }

                  //     $village = $obj->fun_displaydata("tbl_village WHERE Village_ID = '$School_Village'");
                  //     foreach ($village as $records){
                  //       $Village_Name = $records['Village_Name'];
                  //     }
                      ?>

                      <tr>
                        <td><?php echo $district_ID; ?></td>
                        <td><?php echo $province_Name; ?></td>
                        <td><?php echo  $District_Name;  ?></td>
                        <td><?php echo  $Postcode; ?></td>
                        <td>
                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $district_ID;?>"></a>
                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $district_ID;?>"></a>
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
<div class="modal fade" id="user-model" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="font-family: 'Koulen', cursive; color: #007bff;" id="userModel"></h4>
      </div>
      <div class="modal-body">
      <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
        <input type="hidden" name="district_ID" id="id">
        <div class="form-group">
          <div class="col-sm-12">
            <?php
            include 'action/connection.php';
            $query="select * from tbl_province";
            $result= mysqli_query($conn,$query);


            ?>
            <!-- <select class="custom-select form-control-border" name="province_id" id="exampleSelectBorder" required="">
              <?php
              // WHILE ($rows =$result->fetch_assoc()){
              //   $province_Name =$rows['province_Name'];
              //   $province_ID =$rows['province_ID'];
              //   echo "<option value='$province_ID'>$province_Name</option>";
              // }
              ?>
            </select> -->


            <select name="province_id" id="province_id" class="custom-select form-control-border" required>
              <!-- <option value="">Select Province</option> -->
              <?php
              foreach($result as $row)
              {
                echo '
                <option value="'.$row["province_ID"].'">'.$row["province_Name"].'</option>
                ';
              }
              ?>
            </select>
          </div>

        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control form-control-border" id="District_Name" required="" name="District_Name" placeholder="ឈ្មោះស្រុក">
          </div>
        </div>  
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control form-control-border" id="Postcode" required="" name="Postcode" placeholder="លេខកូដស្រុក">
          </div>
        </div>
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary" id="btn-save" value="addnew">Save changes
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--End Modal -->
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
<!-- <select id="Gender">
  <option value="" disabled selected>--Geslacht--</option>
  <option value="1">Man</option>
  <option value="2">Vrouw</option>
  <option value="3">Beide</option>
</select>
<script type="text/javascript">
  $(document).ready(function(){
    $("#province_id").change(function () {
      var province = $("#province_id").val();
      jQuery.ajax({
        type: "POST",
        data:  {GenderID: province},
        success: function(data){ 
          if(data.success == true){ 
            alert('success'); 
          }
        }               
      });
    });
  });
</script> -->

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
      url: "action/district_edit.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#userModel').html("កែប្រែ");
        $('#user-model').modal('show');
        $('#id').val(res.district_ID);
        $('#province_id').val(res.province_ID);
        $('#District_Name').val(res.District_Name);
        $('#Postcode').val(res.Postcode);
      }
    });
  });

    $('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
      type:"POST",
      url: "action/district_insert_update.php",
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
      url: "action/district_delete.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#District_Name').html(res.District_Name);
        $('#Postcode').html(res.Postcode);
        window.location.reload();
      }
    });
  }
})
  });
  });
</script>

</div>



