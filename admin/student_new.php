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
            <i class="fas fa-graduation-cap"></i>សិស្ស
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
                  <thead >
                    <tr >
                      <th>N</th>
                      <th>ឈ្មោះភាសាខ្មែរ</th>
                      <th>ឈ្មោះឡាតាំង</th>
                      <th>ភេទ</th>
                      <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                      <th>រូបថត</th>
                      <th>អត្ដលេខ</th>
                      <th>ថ្នាក់</th>
                      <th>សាលារៀន</th>
                      <th>ខេត្ដ</th>
                      <th>ស្រុក</th>
                      <th>ឃុំ</th>
                      <th>ភូមិ</th>
                      <th>ខេត្ដកំណើត</th>
                      <th>ស្រុកកំណើត</th>
                      <th>ឃុំកំណើត</th>
                      <th>ភូមិកំណើត</th>
                      <th>ស្ថានភាពគ្រួសារ</th>
                      <th>ស្ថានភាពកុមារ</th>
                      <th>កែប្រែ</th>
                      <th>លុប</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $student = $obj->fun_displaydata("tbl_student");
                    foreach($student as $records){
                      $ID_Student = $records['ID_Student'];
                      $Student_ID = $records['Student_ID'];
                      $School_ID = $records['School_ID'];
                      $studentname_kh = $records['studentname_kh'];
                      $studentname_en = $records['studentname_en'];
                      $photo = $records['photo'];
                      $sex = $records['sex'];
                      $dob = $records['dob'];
                      $Province_ID = $records['Province_ID'];
                      $district_ID = $records['district_ID'];
                      $commune_ID = $records['commune_ID'];
                      $village_ID = $records['village_ID'];
                      $dob_province_name = $records['dob_province_name'];
                      $dob_district_name = $records['dob_district_name'];
                      $dob_commune_name = $records['dob_commune_name'];
                      $dob_village_name = $records['dob_village_name'];
                      $family_status = $records['family_status'];
                      $child_ID = $records['child_ID'];
                      $grade = $records['grade'];

                      $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_ID'");
                      while($row = mysqli_fetch_array($sql)){
                        $School_NameKH=$row['School_NameKH'];
                      }

                      ?>
                      <tr>
                        <td><?php echo $ID_Student; ?></td>
                        <td><?php echo $studentname_kh; ?></td>
                        <td><?php echo $studentname_en; ?></td>
                        <td><?php echo $sex; ?></td>
                        <td><?php echo $dob; ?></td>
                        <td>
                         <img src="<?php echo (!empty($records['photo']))? '../images/'.$records['photo']:'images/a.jpg'; ?>" width="50px" height="50px">

                          <!-- <a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['ID_Student']; ?>">
                            <span class="fa fa-edit"></span>
                          </a> -->
                        </td>



                        <td><?php echo $Student_ID; ?></td>
                        <td><?php echo $grade; ?></td>
                        <td><?php echo $School_NameKH; ?></td>

                        <td><?php echo $Province_ID; ?></td>
                        <td><?php echo $district_ID; ?></td>
                        <td><?php echo $commune_ID; ?></td>
                        <td><?php echo $village_ID; ?></td>

                        <td><?php echo $dob_province_name; ?></td>
                        <td><?php echo $dob_district_name; ?></td>
                        <td><?php echo $dob_commune_name; ?></td>
                        <td><?php echo $dob_village_name; ?></td>

                        <td><?php echo $family_status; ?></td>
                        <td><?php echo $child_ID; ?></td>


                        <td>
                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $ID_Student;?>"></a>

                        </td>
                        <td>

                          <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $ID_Student;?>"></a>
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
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<?php include 'inc/student_new_modal.php';?>
</div>
<?php include 'inc/footer.php';?>
<?php include '../action/includes/alert_crud.php';?>

</div>

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
</script>
<script>
  $(document).ready(function($){
    $('#addnew').click(function(){
      $('#userInserUpdateForm').trigger("reset");
      $('#userModel').html("បញ្ចូលព័ត៌មានសិស្ស");
      $('#user-model').modal('show');
    });
    $('body').on('click', '.edit', function () {
      var id = $(this).data('id');
    // ajax
    $.ajax({
      type:"POST",
      url: "../action/student_edit.php",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#userModel').html("កែប្រែ​ ព័ត៌មានសិស្ស");
        $('#user-model').modal('show');
        $('#ID_Student').val(res.ID_Student);
        $('#School_ID').val(res.School_ID);
        $('#Student_ID').val(res.Student_ID);
        $('#studentname_kh').val(res.studentname_kh);
        $('#studentname_en').val(res.studentname_en);
        $('#gender').val(res.sex);
        $('#dob').val(res.dob); 
        $('#grade_id').val(res.grade);
        $('#Province_ID').val(res.Province_ID);
        $('#district_ID').val(res.district_ID);
        $('#commune_ID').val(res.commune_ID); 
        $('#village_ID').val(res.village_ID);
        $('#province_id').val(res.dob_province_name);
        $('#dob_district_name').val(res.dob_district_name);
        $('#dob_commune_name').val(res.dob_commune_name); 
        $('#dob_village_name').val(res.dob_village_name);
        $('#family_status').val(res.family_status); 
        $('#child_id').val(res.child_ID);
        $('#txt_photo').val(res.photo);
      }
    });
  });

    $('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
      type:"POST",
      url: "../student_new_update.php",
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
      url: "../action/student_delete.php",
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


