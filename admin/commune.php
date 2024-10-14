<?php
  //Start Session
session_start();
  //Import class.php
require('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
  //Import restrict.php
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
  <style>
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
            <i class="fas fa-graduation-cap"></i>​ ឃុំ
          </h2>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
 <div class="container-fluid" style="height: auto;">
  <div class="row">
    <div class="col-sm-12">
      <div class="card" style="margin: 10px; margin-top: 0px; margin-bottom: 10px;">

        <div class="card-header">
          <div class="card-body">
           <!-- button -->
           <div class="nav justify-content-end">
            <button type="button" class="btn btn-add" id="addnew" data-toggle="modal" data-target="#exampleModal" style="background: #007bff;">
             <i class="fas fa-plus text-white " id="add" ></i>
             <a class="text-white" style="font-family: 'Kantumruy', sans-serif;">បញ្ចូលឃុំ</a>
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
                    <th>ល.រ</th>
                    <th>ឈ្មោះស្រុក</th>
                    <th>ឈ្មោះឃុំ</th>
                    <th>លេខសំគាល់ឃុំ</th>
                    <th>ឧបករណ៌</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $district = $obj->fun_displaydata("tbl_commune");
                  foreach($district as $records){
                    $Commune_ID = $records['Commune_ID'];
                    $district_ID = $records['district_ID'];
                    $Commune_Name = $records['Commune_Name'];
                    $Postcode = $records['Postcode'];

                    ?>
                    <?php
                  //   $province = $obj->fun_displaydata("tbl_province WHERE province_ID = '$province_ID'");
                  // // $users = $obj->fun_displaydata("tbl_users where User_Type='school'");
                  //   foreach ($province as $records){
                  //     $province_Name = $records['province_Name'];
                    // }

                      $district = $obj->fun_displaydata("tbl_district WHERE district_ID = '$district_ID'");
                      foreach ($district as $records){
                        $District_Name = $records['District_Name'];
                      }

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
                        <td><?php echo $Commune_ID; ?></td>
                        <td><?php echo $District_Name; ?></td>
                        <td><?php echo  $Commune_Name;  ?></td>
                        <td><?php echo  $Postcode; ?></td>
                        <td>
                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $Commune_ID;?>"></a>
                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $Commune_ID;?>"></a>
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
        </div>
        <!-- row -->
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
        <h4 class="modal-title" id="userModel"></h4>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
          <input type="hidden" name="Commune_ID" id="id">
          <div class="form-group">
            <div class="col-sm-12">
              <?php
              include '../action/connection.php';
              $query="select * from tbl_district";
              $result= mysqli_query($conn,$query);
              ?>
              <select class="custom-select form-control-border" name="district_id" id="district_id" required="">
                <?php
                WHILE ($rows =$result->fetch_assoc()){
                  $District_Name =$rows['District_Name'];
                  $district_ID =$rows['district_ID'];
                  echo "<option value='$district_ID'>$District_Name</option>";
                }
                ?>
              </select>
            </div>

          </div>

          <div class="form-group">
            <div class="col-sm-12">
              <input type="text" class="form-control form-control-border" id="Commune_Name" required="" name="Commune_Name" placeholder="Commune_Name">
            </div>
          </div>  
          <div class="form-group">
            <div class="col-sm-12">
              <input type="text" class="form-control form-control-border" id="Postcode" required="" name="Postcode" placeholder="Postcode">
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
<?php require('inc/footer.php'); ?>
<?php include '../action/includes/alert_crud.php';?>

<script>
  $(document).ready(function($){
    $('#addnew').click(function(){
      $('#userInserUpdateForm').trigger("reset");
      $('#userModel').html("បន្ថែមឃុំ");
      $('#user-model').modal('show');
    });
    $('body').on('click', '.edit', function () {
      var id = $(this).data('id');
    // ajax
    $.ajax({
      type:"POST",
      url: "../action/commoune_edit.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#userModel').html("Edit District");
        $('#user-model').modal('show');
        $('#district_id').val(res.district_ID);
        $('#Commune_Name').val(res.Commune_Name);
        $('#Postcode').val(res.Postcode);
      }
    });
  });

    $('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
      type:"POST",
      url: "../action/commoune_insert_update.php",
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
      url: "../action/commoune_delete.php",
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




