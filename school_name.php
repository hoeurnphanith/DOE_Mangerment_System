
<?php
	//Start Session
session_start();
	//Import class.php
require_once('inc/classdoe.php');
	//Instance Object
$obj = new myclass;
	//Import restrict.php
require_once('inc/restrict.php');
if($_SESSION['Role']!=="school" && $_SESSION['Role']!=="doe"){
		//Redirect Page
  header('location:index.php');
}

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
            <i class="fas fa-graduation-cap"></i> សាលារៀន
          </h4>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="card" style="margin: 10px; margin-top: 0px; margin-bottom: 10px;">

          <div class="card-header">
            <div class="card-body">
             <!-- button -->
             <div class="nav justify-content-end">
             <!--  <form method="post" action="export.php">
               <button type="button" class="btn btn-add"  data-toggle="modal" data-target="#exampleModal" style="background: #28a745; ">
                 <i class="fas fa-print text-white"> Print</i>
               </button>&nbsp &nbsp
             </form>

             <form method="post" action="export.php">
              <button type="button" class="btn btn-add"  data-toggle="modal" data-target="#exampleModal" style="background: #28a745; ">
               <i class="fas fa-file-pdf text-white"> PDF</i>
             </button>&nbsp &nbsp
           </form>

           <form method="post" action="action/includes/export.php">
             <button type="submit" class="btn btn-add" value="Export" name="export" data-toggle="modal" data-target="#exampleModal" style="background: #28a745;">
               <i class="fas fa-file-excel text-white"> Excel</i> 
             </button>&nbsp &nbsp
           </form> -->

           <button type="button" class="btn btn-add" id="addnew" data-toggle="modal" data-target="#exampleModal" style="background: #28a745; color: white;">
             <i class="fas fa-plus text-white " id="add" >​</i>
           </button>
         </div>
         <!-- button -->&nbsp;
         <!-- row -->
         <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
          <div class="row">
            <div class="card-body table-responsive p-0">
             <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                  <tr>
                    <th>លេខកូដសាលា</th>
                    <th>ឈ្មោះសាលា</th>
                    <th>ឈ្មោះឡាតាំង</th>
                    <th>ខេត្ដ</th>
                    <th>ស្រុក</th>
                    <th>ឃុំ</th>
                    <th>ភូមិ</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $school = $obj->fun_displaydata("tbl_school");
                  foreach($school as $records){
                    $School_ID = $records['School_ID'];
                    $School_NameKH = $records['School_NameKH'];
                    $School_NameEN = $records['School_NameEN'];
                    $School_Province = $records['School_Province'];
                    $School_District = $records['School_District'];
                    $School_Commune = $records['School_Commune'];
                    $School_Village = $records['School_Village'];

                    ?>
                    <?php
                    $province = $obj->fun_displaydata("tbl_province WHERE province_ID = '$School_Province'");
                  // $users = $obj->fun_displaydata("tbl_users where User_Type='school'");
                    foreach ($province as $records){
                      $province_Name = $records['province_Name'];

                      $district = $obj->fun_displaydata("tbl_district WHERE district_ID = '$School_District'");
                      foreach ($district as $records){
                        $District_Name = $records['District_Name'];
                      }

                      $commune = $obj->fun_displaydata("tbl_commune WHERE Commune_ID = '$School_Commune'");
                      foreach ($commune as $records){
                        $Commune_Name = $records['Commune_Name'];
                      }

                      $village = $obj->fun_displaydata("tbl_village WHERE Village_ID = '$School_Village'");
                      foreach ($village as $records){
                        $Village_Name = $records['Village_Name'];
                      }
                      ?>

                      <tr>
                        <td><?php echo $School_ID; ?></td>
                        <td><?php echo $School_NameKH; ?></td>
                        <td><?php echo  $School_NameEN;  ?></td>
                        <td><?php echo  $province_Name; ?></td>
                        <td><?php echo $District_Name; ?></td>
                        <td><?php echo $Commune_Name  ;  ?></td>
                        <td><?php echo $Village_Name; ?></td>

                        <td>
                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $School_ID;?>"></a>
                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $School_ID;?>"></a>
                        </td>


                      </tr>
                      <?php

                    }
                    ?>
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
<!-- Modal -->
<div class="modal fade" id="user-model" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="userModel"></h4>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
          <input type="hidden" class="form-control form-control-border" id="ID_School" required="" name="ID_School">
          <div class="form-group">

            <div class="col-sm-12">
              <label>លេខកូដសាលា <span style="color:red">*</span></label>
              <input type="text" class="form-control form-control-border" id="School_ID" required="" name="School_ID">

            </div>
          </div> 
          <div class="form-group">

            <div class="col-sm-12">
              <label>ឈ្មោះសាលា <span style="color:red">*</span></label>
              <input type="text" class="form-control form-control-border" id="School_NameKH" required="" name="School_NameKH" placeholder="ឈ្មោះភាសាខ្មែរ">
            </div>
          </div>  
          <div class="form-group">

            <div class="col-sm-12">
              <label>ឈ្មោះសាលា<span style="color:red">*</span></label>
              <input type="text" class="form-control form-control-border" id="School_NameEN" required="" name="School_NameEN" placeholder="ឈ្មោះឡាតាំង">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <?php
              $allProvince = $obj->fun_displaydata("tbl_province");

              ?>
              <label>ជ្រើសរើសខេត្ដ <span style="color:red">*</span></label>

              <select class="custom-select form-control-border" name="province_id" id="province_id" required="" 
              onchange="getDistrictByProvince();">
              <?php

              foreach($allProvince as $records){
                $province_ID = $records['province_ID'];
                $province_Name = $records['province_Name'];

                echo "<option value='$province_ID'>$province_Name</option>";
              }
              ?>
            </select>
          </div>

        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <label>ជ្រើសរើសស្រុក <span style="color:red">*</span></label>
            <select class="custom-select form-control-border" name="District_Name" id="District_Name" 
            onchange="getCommuneByDistrict();">

          </select>
        </div>

      </div>
      <div class="form-group">
        <div class="col-sm-12">
          <label>ជ្រើសរើសឃុំ <span style="color:red">*</span></label>
          <select class="custom-select form-control-border" name="Commune_Name" id="Commune_ID" required=""
          onchange="getVillageByCommune();">

        </select>
      </div>

    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <label>ជ្រើសរើសភូមិ <span style="color:red">*</span></label>
        <select class="custom-select form-control-border" name="Village_Name" id="Village_ID">

        </select>
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
<?php include 'footer.php';?>
<?php include 'action/includes/alert_crud.php';?>
<!-- Dropdown_list_location -->
<script>
  function getDistrictByProvince() {
    var province_id = $("#province_id").val();
    $.post("action/ajax.php",{
      getDistrictByProvince:'getDistrictByProvince',
      province_id:province_id},
      function (response) {
           // alert(response);
           var data = response.split('^');
           var districtData = data[1];
           $("#District_Name").html(districtData);
         });
  }
  function getCommuneByDistrict() {
    var District_Name = $("#District_Name").val();
    $.post("action/ajax.php",{
      getCommuneByDistrict:'getCommuneByDistrict',
      District_Name:District_Name},
      function (response) {
           // alert(response);
           var data = response.split('^');
           var CommuneData = data[1];
           $("#Commune_ID").html(CommuneData);
         });
  }
  function getVillageByCommune() {
    var Commune_ID = $("#Commune_ID").val();
    $.post("action/ajax.php",{
      getVillageByCommune:'getVillageByCommune',
      Commune_ID:Commune_ID},
      function (response) {
           // alert(response);
           var data = response.split('^');
           var VillageData = data[1];
           $("#Village_ID").html(VillageData);
         });
  }
</script>
<!-- End Dropdown_list_location -->
<script>
  $(document).ready(function($){
    $('#addnew').click(function(){
      $('#userInserUpdateForm').trigger("reset");
      $('#userModel').html("Add New User");
      $('#user-model').modal('show');
    });
    $('body').on('click', '.edit', function () {
      var id = $(this).data('id');
    // ajax
    $.ajax({
      type:"POST",
      url: "action/school_edit.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#userModel').html("Edit District");
        $('#user-model').modal('show');
        $('#ID_School').val(res.ID_School);
        $('#School_ID').val(res.School_ID);
        $('#School_NameKH').val(res.School_NameKH);
        $('#School_NameEN').val(res.School_NameEN);
        $('#province_id').val(res.School_Province);
        $('#District_Name').val(res.School_District);
        $('#Commune_ID').val(res.School_Commune); 
        $('#Village_ID').val(res.School_Village);
      }
    });
  });

    $('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
      type:"POST",
      url: "action/school_insert_update.php",
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
      url: "action/school_delete.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#id').val(res.School_ID);
        $('#School_NameKH').val(res.School_NameKH);
        $('#School_NameEN').val(res.School_NameEN);
        $('#School_Province').val(res.School_Province);
        $('#School_District').val(res.School_District);
        $('#School_Commune').val(res.School_Commune); 
        $('#School_Village').val(res.School_Village);
        window.location.reload();
      }
    });
  }
})
  });
  });
</script>
</div>


