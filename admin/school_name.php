
<?php
	//Start Session
  session_start();
    //Import class.php
  require_once('inc/classdoe.php');
    //Instance Object
  $obj = new myclass;
    //Import restrict.php
  // require_once('inc/restrict.php');
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

  include 'inc/header.php';
  include 'sidebar_Admin.php';
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
             <i class="fas fa-plus text-white " id="add" >​ បញ្ជូលសាលារៀន</i>
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
                    <th>លេខកូដសាលា</th>
                    <th>ឈ្មោះសាលា</th>
                    <th>ឈ្មោះឡាតាំង</th>
                    <th>កម្រង</th>
                    <th>ប្រភេទសាលា</th>
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
                    $ID_School = $records['ID_School'];
                    $School_ID = $records['School_ID'];
                    $School_NameKH = $records['School_NameKH'];
                    $School_NameEN = $records['School_NameEN'];
                    $School_Parent = $records['parent_school'];
                    $School_Type = $records['school_type'];
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
                        <td><?php echo $School_NameEN;  ?></td>
                        <td><?php echo $School_Parent; ?></td>
                        <td><?php echo $School_Type; ?></td>
                        <td><?php echo $province_Name; ?></td>
                        <td><?php echo $District_Name; ?></td>
                        <td><?php echo $Commune_Name  ;  ?></td>
                        <td><?php echo $Village_Name; ?></td>

                        <td>
                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-warning views fas fa-eye text-white" data-id="<?php echo $ID_School;?>"></a>
                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $ID_School;?>"></a>
                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $ID_School;?>"></a>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="justify-content: center;">
        <h4 class="modal-title" id="userModel" style="font-family:'Kantumruy Pro';"></h4>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
          <input type="hidden" class="form-control form-control-border" id="ID_School" required="" name="ID_School">
          <div class="container ">
            <div class="row">
              <div class="form-group col-sm-4">
                <label>លេខកូដសាលា <span style="color:red">*</span></label>
                <input type="text" class="form-control form-control-border" id="School_ID" required="" name="School_ID">
              </div> 
              <div class="form-group col-sm-4">
                <label>ឈ្មោះសាលា <span style="color:red">*</span></label>
                <input type="text" class="form-control form-control-border" id="School_NameKH" required="" name="School_NameKH" placeholder="ឈ្មោះភាសាខ្មែរ">
              </div>  
              <div class="form-group col-sm-4">
                <label>ឈ្មោះសាលា<span style="color:red">*</span></label>
                <input type="text" class="form-control form-control-border" id="School_NameEN" required="" name="School_NameEN" placeholder="ឈ្មោះឡាតាំង">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-4">
                <label>កម្រង <span style="color:red">*</span></label>

                <select class="custom-select form-control-border" name="parent_school" id="parent_school" required="" 
                onchange="">
                <option>ជ្រើសរើសប្រភេទកម្រង</option>
                <option>មត្ដេយ្យ</option>
                <option>បឋមសិក្សា</option>
                <option>អនុវិទ្យាល័យ</option>
                <option>វិទ្យាល័យ</option>

              </select>

            </div>
            <div class="form-group col-sm-4">
              <label>ប្រភេទសាលា <span style="color:red">*</span></label>

              <select class="custom-select form-control-border" name="school_type" id="school_type" required="" 
              onchange="getDistrictByProvince();">
              <option>ជ្រើសរើសប្រភេទសាលា</option>
              <option>មត្ដេយ្យ</option>
              <option>បឋមសិក្សា</option>
              <option>អនុវិទ្យាល័យ</option>
              <option>វិទ្យាល័យ</option>

            </select>

          </div>
          <div class="form-group col-sm-4">
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
            <option value="">ជ្រើសរើសខេត្ដ</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-4">
          <label>ជ្រើសរើសស្រុក <span style="color:red">*</span></label>
          <select class="custom-select form-control-border" name="District_Name" id="District_Name" required=""
          onchange="getCommuneByDistrict();">
            <option value="">ជ្រើសរើសស្រុក</option>
          </select>
        </div>
      <div class="form-group col-sm-4">
        <label>ជ្រើសរើសឃុំ <span style="color:red">*</span></label>
        <select class="custom-select form-control-border" name="Commune_Name" id="Commune_ID" required=""
        onchange="getVillageByCommune();">
        <option value="">ជ្រើសរើសឃុំ</option>
      </select>
    </div>
    <div class="form-group col-sm-4">
      <!-- <label>ជ្រើសរើសភូមិ <span style="color:red">*</span></label>
      <select class="custom-select form-control-border" name="Village_Name" id="Village_ID">

      </select> -->

      <!-- <label for="Village_ID">ជ្រើសរើសភូមិ <span style="color:red">*</span></label>
      <select class="custom-select form-control-border" name="Village_Name" id="Village_ID" required>
      </select> -->
      
      <label for="Village_ID">ជ្រើសរើសភូមិ <span style="color:red">*</span></label>
      <select class="custom-select form-control-border" name="Village_Name" id="Village_ID" required="">
          <option value="">ជ្រើសរើសភូមិ</option>  <!-- Placeholder option -->
      </select>

    </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-danger" name="btn-close" data-dismiss="modal"><i class="fas fa-times-circle"></i> បិទ</button>
    <button type="submit" class="btn btn-primary" id="btn-save" value="addnew"><i class="fas fa-save"></i> រក្សារទុក</button>
  </div>
</div>

</form>
</div>
</div>
</div>
<!--End Modal -->
</div>
<?php include 'inc/footer.php';?>
<?php include '../action/includes/alert_crud.php';?>
<!-- Dropdown_list_location -->
<script>
  function getDistrictByProvince() {
    var province_id = $("#province_id").val();
    $.post("../action/ajax.php",{
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
    $.post("../action/ajax.php",{
      getCommuneByDistrict:'getCommuneByDistrict',
      District_Name:District_Name},
      function (response) {
           // alert(response);
           var data = response.split('^');
           var CommuneData = data[1];
           $("#Commune_ID").html(CommuneData);
         });
  }

//   function getCommuneByDistrict() {
//     var District_Name = $("#District_Name").val();
    
//     $.post("../action/ajax.php", {
//         getCommuneByDistrict: 'getCommuneByDistrict',
//         District_Name: District_Name
//     }, function(response) {
//         // Assuming response is split by '^'
//         var data = response.split('^');
        
//         if (data.length > 1) {
//             var CommuneData = data[1];
//             $("#Commune_ID").html(CommuneData);  // Set commune dropdown options
//         } else {
//             // If response doesn't contain valid data, handle it
//             console.error("Invalid response format or no data returned.");
//             $("#Commune_ID").html('<option value="">No communes found</option>');
//         }
//     }).fail(function(jqXHR, textStatus, errorThrown) {
//         // Handle AJAX request failure
//         console.error("Request failed: " + textStatus, errorThrown);
//         alert("Failed to load communes. Please try again later.");
//     });
// }


  function getVillageByCommune() {
    var Commune_ID = $("#Commune_ID").val();
    $.post("../action/ajax.php",{
      getVillageByCommune:'getVillageByCommune',
      Commune_ID:Commune_ID},
      function (response) {
           // alert(response);
           var data = response.split('^');
           var VillageData = data[1];
           $("#Village_ID").html(VillageData);
         });
  }

  $(document).ready(function() {
  // Fetch district data when the page loads
  $.ajax({
    url: '../action/ajax.php', // Your server endpoint to fetch districts
    type: 'POST',
    success: function(response) {
      var districtDropdown = $('#District_Name');
      var districts = response.districts; // Assuming the response contains a 'districts' array

      // Clear existing options
      districtDropdown.empty();

      // Add the default option
      districtDropdown.append('<option value="">ជ្រើសរើសស្រុក</option>');

      // Populate the dropdown with the fetched district data
      $.each(districts, function(index, district) {
        districtDropdown.append(
          `<option value="${district.id}">${district.name}</option>`
        );
      });
    },
    error: function() {
      alert('Failed to fetch district data');
    }
  });
});


//   function getVillageByCommune() {
//     var Commune_ID = $("#Commune_ID").val();
//     $.post("../action/ajax.php", {
//         getVillageByCommune: 'getVillageByCommune',
//         Commune_ID: Commune_ID
//     }, function (response) {
//         try {
//             var data = JSON.parse(response);  // Assuming the server returns JSON
//             var VillageData = data.villages;  // Access the 'villages' property
//             $("#Village_ID").html(VillageData);
//         } catch (error) {
//             console.error("Failed to parse JSON:", error);
//             alert("Error processing data.");
//         }
//     }).fail(function(xhr, status, error) {
//         console.log("Error occurred: " + error);
//         alert("An error occurred. Please try again.");
//     });
// }

// function getVillageByCommune() {
//     var Commune_ID = $("#Commune_ID").val();
//     $.post("../action/ajax.php", {
//         getVillage: 'getVillage',
//         Commune_ID: Commune_ID
//     }, function (response) {
//         try {
//             var data = JSON.parse(response);  // Parse the JSON response
//             if (data.status === 'success') {
//                 var VillageData = data.villages;
//                 var options = '<option value="">ជ្រើសរើសភូមិ</option>';  // Default option
//                 VillageData.forEach(function(village) {
//                     options += '<option value="' + village.Village_ID + '">' + village.Village_Name + '</option>';
//                 });
//                 $("#Village_ID").html(options);  // Populate the dropdown
//             } else {
//                 $("#Village_ID").html('<option value="">' + data.message + '</option>');  // Display error message
//             }
//         } catch (error) {
//             console.error("Failed to parse JSON:", error);
//             alert("Error processing data.");
//         }
//     }).fail(function(xhr, status, error) {
//         console.log("Error occurred: " + error);
//         alert("An error occurred. Please try again.");
//     });
// }

</script>
<!-- End Dropdown_list_location -->
<script>
  $(document).ready(function($){
    $('#addnew').click(function(){
      $('#userInserUpdateForm').trigger("reset");
      $('#userModel').html("បញ្ចូលព័ត៌មានសាលារៀន");
      $('#user-model').modal('show');
      $("#btn-save").attr("hidden", false);
    });

    $('#userInserUpdateForm').submit(function() {
      // ajax
      $.ajax({
        type:"POST",
        url: "../action/school_insert_update.php",
        data: $(this).serialize(), // get all form field value in 
        dataType: 'json',
        success: function(res){
          window.location.reload();
        }
      });
    });

    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
      // ajax
      $.ajax({
        type:"POST",
        url: "../action/school_edit.php",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          $('#userModel').html("កែប្រែព័ត៌មានសាលារៀន");
          $('#user-model').modal('show');
          $("#btn-save").attr("hidden", false);
          $('#ID_School').val(res.ID_School);
          $('#School_ID').val(res.School_ID);
          $('#School_NameKH').val(res.School_NameKH);
          $('#School_NameEN').val(res.School_NameEN);
          $('#parent_school').val(res.parent_school);
          $('#school_type').val(res.school_type);
          $('#province_id').val(res.School_Province);
          $('#District_Name').val(res.District_Name);
          $('#Commune_ID').val(res.Commune_Name);
          $('#Village_ID').val(res.Village_Name);

          $('#District_Name').empty();
          $('#District_Name').append('<option value="'+res.District_Name+'">'+res.District_Name+'</option>'); 

          $('#Commune_ID').empty();
          $('#Commune_ID').append('<option value="'+res.Commune_Name+'">'+res.Commune_Name+'</option>'); 

          $('#Village_ID').empty();
          $('#Village_ID').append('<option value="'+res.Village_Name+'">'+res.Village_Name+'</option>'); 
        }
      });
    });;

    //Views

    $('body').on('click', '.views', function () {
        var id = $(this).data('id');
      // ajax
      $.ajax({
        type:"POST",
        url: "../action/views_dataschool.php",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          $('#userModel').html("មើលព័ត៌មានសាលា");
          $('#user-model').modal('show');
          $("#btn-save").attr("hidden", true);
          $('#ID_School').val(res.ID_School);
          $('#School_ID').val(res.School_ID);
          $('#School_NameKH').val(res.School_NameKH);
          $('#School_NameEN').val(res.School_NameEN);
          $('#parent_school').val(res.parent_school);
          $('#school_type').val(res.school_type);
          $('#province_id').val(res.School_Province);
          $('#District_Name').val(res.District_Name);
          $('#Commune_ID').val(res.Commune_Name);
          $('#Village_ID').val(res.Village_Name);

          $('#District_Name').empty();
          $('#District_Name').append('<option value="'+res.District_Name+'">'+res.District_Name+'</option>'); 

          $('#Commune_ID').empty();
          $('#Commune_ID').append('<option value="'+res.Commune_Name+'">'+res.Commune_Name+'</option>'); 

          $('#Village_ID').empty();
          $('#Village_ID').append('<option value="'+res.Village_Name+'">'+res.Village_Name+'</option>'); 

          
        }
      });
      // $("#School_ID").prop("readonly", true).css('color', 'red');
      // $("#School_NameKH").prop("readonly", true).css('color', 'red');
      // $("#School_NameEN").prop("readonly", true).css('color', 'red');
      // $("#parent_school").prop("disabled", true).css('color', 'red');
      // $("#school_type").prop("disabled", true).css('color', 'red');
      // $("#province_id").prop("disabled", true).css('color', 'red');
      // $("#District_Name").prop("disabled", true).css('color', 'red');
      // $("#Commune_ID").prop("disabled", true).css('color', 'red');
      // $("#Village_ID").prop("disabled", true).css('color', 'red');
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
            url: "../action/school_delete.php",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#id').val(res.School_ID);
              $('#School_NameKH').val(res.School_NameKH);
              $('#School_NameEN').val(res.School_NameEN);
              $('#parent_school').val(res.parent_school);
              $('#school_type').val(res.school_type);
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

//   $(document).ready(function($) {

//   $('#addnew').click(function() {
//     $('#userInserUpdateForm').trigger("reset");
//     $('#userModel').html("បញ្ចូលព័ត៌មានសាលារៀន");
//     $('#user-model').modal('show');
//   });

//   $('#userInserUpdateForm').submit(function(event) {
//     event.preventDefault(); // Prevent form from reloading
//     // Add form validation logic here if needed
//     $.ajax({
//       type: "POST",
//       url: "../action/school_insert_update.php",
//       data: $(this).serialize(),
//       dataType: 'json',
//       success: function(res) {
//         window.location.reload();
//       },
//       error: function(xhr, status, error) {
//         console.log("Error occurred: " + error);
//         alert("not insertData To Database. Please try again.");
//       }
//     });
//   });

//   $('body').on('click', '.edit', function() {
//     var id = $(this).data('id');
//     $.ajax({
//       type: "POST",
//       url: "../action/school_edit.php",
//       data: { id: id },
//       dataType: 'json',
//       success: function(res) {
//         $('#userModel').html("កែប្រែព័ត៌មានសាលារៀន");
//         $('#user-model').modal('show');
//         $('#ID_School').val(res.ID_School);
//         $('#School_ID').val(res.School_ID);
//         $('#School_NameKH').val(res.School_NameKH);
//         $('#School_NameEN').val(res.School_NameEN);
//         $('#parent_school').val(res.parent_school);
//         $('#school_type').val(res.school_type);
//         $('#province_id').val(res.School_Province);
//         $('#District_Name').val(res.School_District);
//         $('#Commune_ID').val(res.School_Commune);
//         $('#Village_ID').val(res.School_Village);
//       },
//       error: function(xhr, status, error) {
//         console.log("Error occurred: " + error);
//         alert("Not UpdateData To Database. Please try again.");
//       }
//     });

//         var districts = response.districts; // Assuming server returns a list of districts
//         var districtDropdown = $('#District_Name');

//         // Clear existing options
//         districtDropdown.empty();

//         // Add the default option
//         districtDropdown.append('<option value="">ជ្រើសរើសស្រុក</option>');
//     // Populate the dropdown with district options
//     $.each(districts, function(index, district) {
//           districtDropdown.append(
//             `<option value="${district.id}" ${district.id == districtId ? 'selected' : ''}>${district.name}</option>`
//           );
//         });
//   });

//   $('body').on('click', '.delete', function() {
//     Swal.fire({
//       title: 'តើអ្នកប្រាកដថាចង់លុបទេ?',
//       icon: 'warning',
//       showCancelButton: true,
//       confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       cancelButtonText: 'ទេ',
//       confirmButtonText: 'យល់ព្រម'
//     }).then((result) => {
//       if (result.isConfirmed) {
//         var id = $(this).data('id');
//         $.ajax({
//           type: "POST",
//           url: "../action/school_delete.php",
//           data: { id: id },
//           dataType: 'json',
//           success: function(res) {
//             window.location.reload();
//           },
//           error: function(xhr, status, error) {
//             console.log("Error occurred: " + error);
//             alert("Not Delete Data in Database. Please try again.");
//           }
//         });
//       }
//     });
//   });
// });


</script>
</div>


