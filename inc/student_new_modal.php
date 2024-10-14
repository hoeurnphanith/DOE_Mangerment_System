<!-- <div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="student_edit_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="ID_Student" name="ID_Student">
                <div class="form-group">
                    <div class="col-sm-9">
                      <input type="file" id="txt_photo" name="txt_photo" required>
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
  <!--End Modal -->

  <div class="modal fade" id="user-model" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content" style="width: 1200px; display: table-cell;">
        <div class="card" style="background-color: #004fa5;">
          <div class="card-header d-flex justify-content-center" style="color:#004fa5;">
            <h4 style="color:white; font-family: 'Koulen', cursive; font-size: 24px; margin-bottom: 1px;" class="card-title" id="userModel"></h4>

          </div>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="POST" action="student_new_add.php" enctype="multipart/form-data">

           <div class="container ">
            <div class="row">
             <div class="form-group col-sm-12" >
              <input type="text" hidden="" class="form-control form-control-border border-width-2 " name="ID_Student"  id="ID_Student">
            </div>
          </div>
          <div class="row">
           <div class="form-group col-sm-12" >
            <label for="exampleInputBorder">សាលារៀន</label>
            <?php
            $School_ID = $_SESSION['User_Name'];
            $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_ID'");
            ?> 
            <select class="form-control form-control-border border-width-2 " id="School_ID" name="School_ID"  style="padding-bottom: 2px;">
              <?php 
               while($row = mysqli_fetch_array($sql)){
                $School_ID = $row['School_ID'];
              $School_Name=$row['School_NameKH'];
            ?>
                <option value="<?php echo $School_ID; ?>">
                  <?php echo $School_Name; ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="row">
         <div class="form-group col-sm-4" >
          <label for="exampleInputBorder">អត្ដលេខសិស្ស</label>
          <input type="text" class="form-control form-control-border border-width-2 "  name="Student_ID"  id="Student_ID">
        </div>
        <div class="form-group col-sm-4">
          <label for="exampleInputBorder">ឈ្មោះជាភាសាខ្មែរ</label>
          <input type="text" class="form-control form-control-border border-width-2 " name="studentname_kh"  id="studentname_kh">
        </div>

        <div class="form-group col-sm-4">
          <label for="exampleInputBorder">ឈ្មោះជាអក្សរឡាតាំង</label>
          <input type="text" class="form-control form-control-border border-width-2 " name="studentname_en"  id="studentname_en">
        </div>

      </div>
      <div class="row  ">
       <div class="form-group col-sm-4">
        <label for="exampleInputBorder">ភេទ</label>
        <select class="custom-select form-control-border border-width-2" style="line-height: 1.7;" name="gender"  id="gender">
         <!-- <option selected="select">--ជ្រើស--</option> -->
         <option>ប្រុស</option>
         <option>ស្រី</option>
       </select>
     </div>
     <div class="form-group col-sm-4">
      <label for="exampleInputBorder">ថ្ងៃខែឆ្នាំកំណើត</label>
      <input type="date" class="form-control form-control-border border-width-2 " name="dob"  id="dob">
    </div>
    <div class="col-sm-4 fixheight" style="text-align-last: center;">
      <?php
      $Grade_ID = $obj->fun_displaydata("tbl_grade");

      ?> 
      <label for="exampleInputBorder">ថ្នាក់ទី</label>
      <select class="custom-select form-control-border border-width-2" name="grade_id" id="grade_id" required="">
        <!-- <option>-ជ្រើសរើស-</option> -->
        <?php

        foreach($Grade_ID as $records){
          $Grade_ID = $records['Grade_ID'];
          $Grade_Name = $records['Grade_Name'];

          echo "<option value='$Grade_Name'>$Grade_Name</option>";
        }
        ?>
      </select>
    </div>
  </div>

  <div class="row">
   <div class="col-md-12">

    <div class="card" style="background-color:#004fa5 ;border-radius: 0.5rem;">
      <span class="card-title" style="color: white; text-align: center; font-size: 20px; font-family: 'Koulen', cursive;;    margin-top: 5px;
      margin-bottom: 5px;  ">
      <i class="fas fa-map-marker-alt"></i>
      ទីកន្លែងកំណើត     
    </span>
  </div>

</div>
</div>
<!--Open Row3-->
<div class="row" style="    margin-bottom: 20px;">
 <!--Open Coldob-->
 <div class="col-sm-12" style="text-align-last: left;">
   <div class="row" style="    margin-bottom: 20px;">

    <!--ខេត្ត-->
    <div class="col-sm-3">
      <?php
      $allProvince = $obj->fun_displaydata("tbl_province");

      ?>
      <label>ជ្រើសរើសខេត្ដ <span style="color:red">*</span></label>
      <input class="form-control form-control-border border-width-2 " style="line-height: 1.9;"id="dob_province_name" name="dob_province_name" required id="exampleFormControlSelect1">
    </div>
    <!--ស្រុក-->
    <div class="col-sm-id">
      <label>បញ្ចូលស្រុក <span style="color:red">*</span></label>
      <input class="form-control form-control-border border-width-2 " style="line-height: 1.9;"id="dob_district_name" name="dob_district_name" required id="exampleFormControlSelect1">
    </div>
    <!--ឃុំ-->
    <div class="col-sm-3 ">
      <label>បញ្ចូលឃុំ<span style="color:red">*</span></label>
      <input class="form-control form-control-border border-width-2 " style="line-height: 1.9;" id="dob_commune_name" name="dob_commune_name" required id="exampleFormControlSelect1">
    </div>

    <!--ភូមិ-->
    <div class="col-sm-3 ">
      <label>បញ្ចូលភូមិ <span style="color:red">*</span></label>
      <input class="form-control form-control-border border-width-2 " style="line-height: 1.9;" id="dob_village_name" name="dob_village_name" required id="exampleFormControlSelect1">
    </div>
  </div>
  <!--Close Coldob-->
</div>
</div>

<div class="row">
 <div class="col-md-12">

  <div class="card" style="background-color:#004fa5 ;border-radius: 0.5rem;">
    <span class="card-title" style="color: white; text-align: center; font-size: 20px; font-family: 'Koulen', cursive;;    margin-top: 5px;
    margin-bottom: 5px;  ">
    <i class="fas fa-map-marker-alt"></i>
    ទីលំនៅបច្ចុប្បន្ន     
  </span>
</div>

</div>
</div>

<!--location now-->
<div class="row" style="    margin-bottom: 20px;">
  <div class="col-sm-12" style="text-align-last: left;">
    <div class="row" style="    margin-bottom: 20px;" >
     <!--ខេត្ត-->
     <div class="col-sm-3 "> 
      <?php
      $allProvince = $obj->fun_displaydata("tbl_province");

      ?>
      <label>ជ្រើសរើសខេត្ដ <span style="color:red">*</span></label>

      <select class="custom-select form-control-border border-width-2" name="province_id" id="province_id" required="" 
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
  <!--ស្រុក-->
  <div class="col-sm-3 "> 
    <label>ជ្រើសរើសស្រុក <span style="color:red">*</span></label>
    <select class="custom-select form-control-border border-width-2" name="District_Name" id="District_Name" 
    onchange="getCommuneByDistrict();">

  </select>

</div>
<!--ឃុំ-->
<div class="col-sm-3 ">
  <label>ជ្រើសរើសឃុំ <span style="color:red">*</span></label>
  <select class="custom-select form-control-border border-width-2" name="Commune_Name" id="Commune_ID" required=""
  onchange="getVillageByCommune();">
</select>
</div>

<!--ភូមិ-->
<div class="col-sm-3 ">

  <label>ជ្រើសរើសភូមិ <span style="color:red">*</span></label>
  <select class="custom-select form-control-border border-width-2" name="Village_Name" id="Village_ID">

  </select>
</div>

</div>
</div>
</div>
<!--location now-->

<div class="col-sm-12" style="    margin-bottom: 10px;">
 <div class="row" style="text-align-last: left;" >
   <div class="form-group col-sm-4" >
    <label for="exampleInputBorder">ស្ថានភាពគ្រួសារ</label>
    <select class="custom-select form-control-border border-width-2" name="family_status" id="family_status" required="">
      <option>មធ្យម</option>
      <option>ក្រីក្រ</option>
      <option>បង្គួរ</option>
      <option>ល្អ</option>
    </select>
  </div>

  <div class="form-group col-sm-4" >
   <div class="form-group">
    <div class="col-sm-12">
      <?php
      $child_ID = $obj->fun_displaydata("tbl_child_profile");

      ?>
      <label>-លក្ខណះសំគាល់-<span style="color:red">*</span></label>

      <select class="custom-select form-control-border border-width-2" name="child_id" id="child_id" required="">
        <option>-ជ្រើសរើស-</option>
        <?php

        foreach($child_ID as $records){
          $child_ID = $records['child_ID'];
          $chile_Profile = $records['chile_Profile'];

          echo "<option value='$child_ID'>$chile_Profile</option>";
        }
        ?>
      </select>
    </div>

  </div>
</div>

<div class="form-group col-sm-4">
  <label for="exampleInputFile">ជ្រើសរើសរូបភាព</label>
  <div class="input-group ">
    <input type="file" name="txt_photo" id="txt_photo" />
  </div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" name="btn-close" data-dismiss="modal">បិទ</button>
  <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
</div>
</form>
</div>
</div>
</div>




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
