
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

?>

<?php
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
            <i class="fas fa-graduation-cap"></i> ព័ត៌មានគ្រូ
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
               <i class="fas fa-plus text-white " id="add" ></i> បញ្ចូលព័ត៌មានគ្រូ
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
                    <th>ល.រ</th>
                    <th>រូបថត</th>
                    <th>អត្តលេខមន្ត្រី</th>
                    <th>អង្គភាព</th>
                    <th>គោត្តនាម-នាម</th>
                    <th>ឈ្មោះឡាតាំង</th>
                    <th>ភេទ</th>
                    <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                    <th>ថ្ងៃខែឆ្នាំចូលបម្រើការងារ</th>
                    <!-- <th>ថ្ងៃខែឆ្នាំតាំងស៊ុបក្នុងក្របខណ្ឌ</th> -->
                    <!-- <th>ប្រភេទក្របខណ្ឌ</th> -->
                    <!-- <th>តួនាទី</th> -->
                    <!-- <th>ប្រភេទកាំប្រាក់</th>
                    <th>ឯកទេសទី១</th>
                    <th>ឯកទេសទី២</th>
                    <th>phone</th>
                    <th>កម្រិតវប្បធម៌</th>
                    <th>ភមិកំណើត</th>
                    <th>POB_District</th>
                    <th>POB_Commune</th>
                    <th>POB_Village</th>
                    <th>Province_ID</th>
                    <th>District_ID</th>
                    <th>Commune_ID</th>
                    <th>Village_ID</th>
                    <th>ស្ថានភាពគ្រួសារ</th> -->
                    <th>កែប្រែ</th>


                  </tr>
                </thead>
                <tbody>
                  <?php
                  $student = $obj->fun_displaydata("tbl_teacher");
                  foreach($student as $records){
                    $ID_Teacher = $records['ID_Teacher'];
                    $Teacher_ID = $records['Teacher_ID'];
                    $School_ID = $records['School_ID'];
                    $Teacher_NameKH = $records['Teacher_NameKH'];
                    $Teacher_NameEN = $records['Teacher_NameEN'];
                    $Gender = $records['Sex'];
                    $DOB = $records['DOB'];
                    $Start_Date_Work = $records['Start_Date_Work'];
                    $Date_Certi = $records['Date_Certi'];
                    // $Teacher_Framework = $records['Teacher_Framework'];
                    // $Teacher_Position = $records['Teacher_Position'];
                    // $Lavel_Type = $records['Lavel_Type'];
                    // $Subject1 = $records['Subject1'];
                    // $Subject2 = $records['Subject2'];
                    // $phone = $records['phone'];
                    // $last_Certivicate = $records['last_Certivicate'];
                    // $Province_ID = $records['Province_ID'];
                    // $District_ID = $records['District_ID'];
                    // $Commune_ID = $records['Commune_ID'];
                    // $Village_ID = $records['Village_ID'];
                    // $POB_Province = $records['POB_Province'];
                    // $POB_District = $records['POB_District'];
                    // $POB_Commune = $records['POB_Commune'];
                    // $POB_Village= $records['POB_Village'];
                    // $Relationship = $records['Relationship'];

                    $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_ID'");
                    while($row = mysqli_fetch_array($sql)){
                      $School_NameKH=$row['School_NameKH'];
                    }
                    ?>

                    <tr>
                      <td><?php echo $ID_Teacher; ?></td>
                      
                      <td></td>

                      <td><?php echo $Teacher_ID; ?></td>
                      <td><?php echo $School_NameKH; ?></td>
                      <td><?php echo $Teacher_NameKH; ?></td>
                      <td><?php echo $Teacher_NameEN; ?></td>
                      <td><?php echo $Gender; ?></td>

                      <td><?php echo $DOB; ?></td>
                      <td><?php echo $Start_Date_Work; ?></td>
                      <!-- <td><?php echo $Date_Certi; ?></td>
                      <td><?php echo $Teacher_Framework; ?></td> -->
                      <!-- <td><?php echo $Teacher_Position; ?></td> -->
                      <!-- <td><?php echo $Lavel_Type; ?></td> -->
                      <!-- <td><?php echo $Subject1; ?></td>
                      <td><?php echo $Subject2; ?></td>
                      <td><?php echo $phone; ?></td>
                      <td><?php echo $last_Certivicate; ?></td>
                      <td><?php echo $POB_Province; ?></td>
                      <td><?php echo $POB_District; ?></td>

                      <td><?php echo $POB_Commune; ?></td>
                      <td><?php echo $POB_Village; ?></td>
                      <td><?php echo $Province_ID; ?></td>
                      <td><?php echo $District_ID; ?></td>
                      <td><?php echo $Commune_ID; ?></td>
                      <td><?php echo $Village_ID; ?></td>
                      <td><?php echo $Relationship; ?></td> -->

                      <td>
                        <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-warning views fas fa-eye text-white" data-id="<?php echo $ID_Teacher;?>"></a>
                        <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $ID_Teacher;?>"></a>
                        <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $ID_Teacher;?>"></a>
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

<?php include '../action/includes/teacher_modal.php';?>
</div>
<?php include 'inc/footer.php';?>
<?php include '../action/includes/alert_crud.php';?>
<!-- Update Photo -->
<!-- <div class="modal fade" id="edit_photos">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="POST" action="employee_edit_photo.php" enctype="multipart/form-data">
            <input type="hidden" class="empid" name="id">
            <div class="form-group">
              <label for="photo" class="col-sm-3 control-label">Photo</label>

              <div class="col-sm-9">
                <input type="file" id="photo" name="photo" required>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>

        </div>
      </div>
    </div>
  </div> -->

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
        $('#userModel').html("បញ្ចូលព័ត៌មានគ្រូ");
        $('#user-model').modal('show');
        $("#btn-save").attr("hidden", false);
      });

      //Insert Data to teacher
      
      $('#userInserUpdateForm').submit(function() {
          // ajax
          $.ajax({
            type:"POST",
            url: "../action/teacher_insert_update.php",
            data: $(this).serialize(), // get all form field value in 
            dataType: 'json',
            success: function(res){
            window.location.reload();
          }
        });
      })


      //Views Teacher
      $('body').on('click', '.views', function () {
        var id = $(this).data('id');
        // ajax
        $.ajax({
          type:"POST",
          url: "../action/teacher_dataviews.php",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            $('#userModel').html("មើលព័ត៌មានគ្រូ");
            $('#user-model').modal('show');
            $("#btn-save").attr("hidden", true);
            $('#ID_Teacher').val(res.ID_Teacher);
            $('#Teacher_ID').val(res.Teacher_ID);
            $('#School_ID').val(res.School_ID);
            $('#Teacher_NameKH').val(res.Teacher_NameKH);
            $('#Teacher_NameEN').val(res.Teacher_NameEN);
            $('#gender').val(res.Sex);
            $('#DOB').val(res.DOB); 
            $('#Start_Date_Work').val(res.Start_Date_Work);
            $('#Date_Certi').val(res.Date_Certi);
            $('#Teacher_Framework').val(res.Teacher_Framework);
            $('#Teacher_Position').val(res.Teacher_Position); 
            $('#Lavel_Type').val(res.Lavel_Type);
            $('#Subject1').val(res.Subject1);
            $('#Subject2').val(res.Subject2);
            $('#phone').val(res.phone);
            $('#last_Certivicate').val(res.last_Certivicate); 
            $('#POB_Province').val(res.POB_Province);
            $('#POB_District').val(res.POB_District); 
            $('#POB_Commune').val(res.POB_Commune);
            $('#POB_Village').val(res.POB_Village);
            $('#Province_ID').val(res.Province_ID); 
            $('#district_ID').val(res.district_ID);
            $('#commune_ID').val(res.commune_ID); 
            $('#village_ID').val(res.village_ID);
            $('#Relationship').val(res.Relationship);

            $('#District_Name').empty();
            $('#District_Name').append('<option value="'+res.District_Name+'">'+res.District_Name+'</option>'); 

            $('#Commune_ID').empty();
            $('#Commune_ID').append('<option value="'+res.Commune_Name+'">'+res.Commune_Name+'</option>'); 

            $('#Village_ID').empty();
            $('#Village_ID').append('<option value="'+res.Village_Name+'">'+res.Village_Name+'</option>'); 

          }
        });
            $("#ID_Teacher").prop("readonly", true).css('color', 'red');
            $("#School_ID").prop("readonly", true).css('color', 'red');
            $("#Teacher_ID").prop("readonly", true).css('color', 'red');
            $("#Teacher_NameKH").prop("readonly", true).css('color', 'red');
            $("#Teacher_NameEN").prop("readonly", true).css('color', 'red');
            $("#gender").prop("readonly", true).css('color', 'red');
            $('#DOB').prop("readonly", true).css('color', 'red');
            $('#Start_Date_Work').prop("readonly", true).css('color', 'red');
            $('#Date_Certi').prop("readonly", true).css('color', 'red');
            $('#Teacher_Framework').prop("readonly", true).css('color', 'red');
            $('#Teacher_Position').prop("readonly", true).css('color', 'red');
            $('#Lavel_Type').prop("readonly", true).css('color', 'red');
            $('#Subject1').prop("readonly", true).css('color', 'red');
            $('#Subject2').prop("readonly", true).css('color', 'red');
            $('#phone').prop("readonly", true).css('color', 'red');
            $('#last_Certivicate').prop("disabled", true).css('color', 'red');
            $('#POB_Province').prop("readonly", true).css('color', 'red');
            $('#POB_District').prop("readonly", true).css('color', 'red'); 
            $('#POB_Commune').prop("readonly", true).css('color', 'red');
            $('#POB_Village').prop("readonly", true).css('color', 'red');
            $('#province_id').prop("disabled", true).css('color', 'red');
            $('#District_Name').prop("disabled", true).css('color', 'red');
            $('#Commune_ID').prop("disabled", true).css('color', 'red');
            $('#Village_ID').prop("disabled", true).css('color', 'red');
            $('#Relationship').prop("disabled", true).css('color', 'red');
      });

      //Edit Teacher
      $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        // ajax
        $.ajax({
          type:"POST",
          url: "../action/teacher_edit.php",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            $('#userModel').html("កែព័ត៌មានគ្រូ");
            $('#user-model').modal('show');
            $("#btn-save").attr("hidden", false);
            $('#ID_Teacher').val(res.ID_Teacher);
            $('#Teacher_ID').val(res.Teacher_ID);
            $('#School_ID').val(res.School_ID);
            $('#Teacher_NameKH').val(res.Teacher_NameKH);
            $('#Teacher_NameEN').val(res.Teacher_NameEN);
            $('#gender').val(res.Sex);
            $('#DOB').val(res.DOB); 
            $('#Start_Date_Work').val(res.Start_Date_Work);
            $('#Date_Certi').val(res.Date_Certi);
            $('#Teacher_Framework').val(res.Teacher_Framework);
            $('#Teacher_Position').val(res.Teacher_Position); 
            $('#Lavel_Type').val(res.Lavel_Type);
            $('#Subject1').val(res.Subject1);
            $('#Subject2').val(res.Subject2);
            $('#phone').val(res.phone);
            $('#last_Certivicate').val(res.last_Certivicate); 
            $('#POB_Province').val(res.POB_Province);
            $('#POB_District').val(res.POB_District); 
            $('#POB_Commune').val(res.POB_Commune);
            $('#POB_Village').val(res.POB_Village);
            $('#province_id').val(res.Province_ID); 
            $('#District_Name').val(res.District_Name);
            $('#Commune_ID').val(res.Commune_Name); 
            $('#Village_ID').val(res.Village_Name);
            $('#Relationship').val(res.Relationship);

            $('#District_Name').empty();
            $('#District_Name').append('<option value="'+res.District_Name+'">'+res.District_Name+'</option>'); 

            $('#Commune_ID').empty();
            $('#Commune_ID').append('<option value="'+res.Commune_Name+'">'+res.Commune_Name+'</option>'); 

            $('#Village_ID').empty();
            $('#Village_ID').append('<option value="'+res.Village_Name+'">'+res.Village_Name+'</option>'); 

          }
        });
      });

      //Delete data teacher
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
              url: "../action/teacher_delete.php",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                $('#ID_Teacher').val(res.ID_Teacher);
                $('#Teacher_ID').val(res.Teacher_ID);
                $('#School_ID').val(res.School_ID);
                $('#Teacher_NameKH').val(res.Teacher_NameKH);
                $('#Teacher_NameEN').val(res.Teacher_NameEN);
                $('#gender').val(res.Sex);
                $('#DOB').val(res.DOB); 
                $('#Start_Date_Work').val(res.Start_Date_Work);
                $('#Date_Certi').val(res.Date_Certi);
                $('#Teacher_Framework').val(res.Teacher_Framework);
                $('#Teacher_Position').val(res.Teacher_Position); 
                $('#Lavel_Type').val(res.Lavel_Type);
                $('#Subject1').val(res.Subject1);
                $('#Subject2').val(res.Subject2);
                $('#phone').val(res.phone);
                $('#last_Certivicate').val(res.last_Certivicate); 
                $('#POB_Province').val(res.POB_Province);
                $('#POB_District').val(res.POB_District); 
                $('#POB_Commune').val(res.POB_Commune);
                $('#POB_Commune').val(res.POB_Village);
                $('#Province_ID').val(res.Province_ID); 
                $('#district_ID').val(res.district_ID);
                $('#commune_ID').val(res.commune_ID); 
                $('#village_ID').val(res.village_ID);
                $('#Relationship').val(res.Relationship);
                window.location.reload();
                }
              });
            }
          })
      });

;

    });
  </script>
</div>


