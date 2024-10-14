<div class="modal fade" id="user-model" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="width: 1200px; display: table-cell;">
      <div class="card" style="background-color: #004fa5; ">
        <div class="card-header d-flex justify-content-center" style="color:#004fa5;">
          <h4 style="color:white; font-family: 'Kantumruy', cursive; font-size: 24px; margin-bottom: 1px; border-radius: -1.75rem;" class="card-title" id="userModel"></h4>

        </div>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">

         <div class="container ">
          <div class="row">
           <div class="form-group col-sm-12" >
            <input type="text" hidden="" class="form-control form-control-border border-width-2 " name="ID_Teacher"  id="ID_Teacher">
          </div>
        </div>
        
        <div class="row">
        <?php
            // Check if the 'User_Name' is set in the session
            if (isset($_SESSION['User_Name'])) {
                $School_ID = $_SESSION['User_Name'];

                // Execute your query
                $sql = mysqli_query($obj->fun_link(), "SELECT * FROM tbl_school WHERE School_ID='$School_ID'");
                ?>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="exampleInputBorder">អង្គភាព</label>
                        <select class="form-control form-control-border border-width-2" id="School_ID" name="School_ID" style="padding-bottom: 2px;">
                            <?php 
                            // Loop through the results and output the options
                            while ($row = mysqli_fetch_array($sql)) {
                                $School_ID = $row['School_ID'];
                                $School_Name = $row['School_NameKH'];
                                ?>
                                <option value="<?php echo $School_ID; ?>">
                                    <?php echo $School_Name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <?php
            }
          ?>

          <!-- <div class="form-group col-sm-12" >
            <label for="exampleInputBorder">អង្គភាព</label>
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
          </div> -->
        </div>

        <div class="row">
          <div class="form-group col-sm-3" >
            <label for="exampleInputBorder">អត្តលេខមន្ត្រី</label>
            <input type="text" class="form-control form-control-border border-width-2 "  name="Teacher_ID"  id="Teacher_ID" required="">
          </div>
          <div class="form-group col-sm-3">
            <label for="exampleInputBorder">ឈ្មោះជាភាសាខ្មែរ</label>
            <input type="text" class="form-control form-control-border border-width-2 " name="Teacher_NameKH"  id="Teacher_NameKH" required="">
          </div>

          <div class="form-group col-sm-3">
            <label for="exampleInputBorder">ឈ្មោះជាអក្សរឡាតាំង</label>
            <input type="text" class="form-control form-control-border border-width-2 " name="Teacher_NameEN"  id="Teacher_NameEN" required="">
          </div>
          <div class="form-group col-sm-3">
            <label for="exampleInputBorder">ភេទ</label>
            <select class="custom-select form-control-border border-width-2" style="line-height: 1.7;" name="gender"  id="gender" >
             <option>ប្រុស</option>
             <option>ស្រី</option>
           </select>
         </div>
       </div>

       <div class="row  ">
         <div class="form-group col-sm-3">
          <label for="exampleInputBorder">ថ្ងៃខែឆ្នាំកំណើត</label>
          <input type="date" class="form-control form-control-border border-width-2 " name="DOB"  id="DOB" required="">
        </div>
        <div class="form-group col-sm-3" >
          <label for="exampleInputBorder">តួនាទី</label>
          <select class="custom-select form-control-border border-width-2" style="line-height: 1.7;" name="Teacher_Position"  id="Teacher_Position">
            <option>គ្រូកិច្ចសន្យា</option>
            <option>នាយក</option>
            <option>នាយករង</option>
            <option>លេខាធិការ</option>
            <option>សក្ខិបនធារី</option>

            <option>បណ្ណារក្ស</option>
            <option>រោងជាង</option>
            <option>ឆ្មាំ</option>
            <option>បំរើការនៅអង្គការ</option>
            <option>បន្តការសិក្សា</option>
            <option>លំហែមិត្តភាព</option>
            <option>កំពុងស្នើសុំលុបឈ្មោះ</option>
            <option>សុំចូលនិវត្តមុនអាយុ</option>
            <option>ទំនេរគ្មានបៀវត្ស</option>
            <option>ក្រៅក្របខណ្ឌដើម</option>
            <option>បាត់បង់សម្បទាវិជ្ជាជីវៈ</option>
            <option>មានជំងឺរ៉ាំរ៉ៃ</option>
          </select>
        </div>
        <div class="form-group col-sm-3" >
          <label for="exampleInputBorder">ថ្ងៃខែចូលបម្រើការងារ</label>
          <input type="date" class="form-control form-control-border border-width-2 "  name="Start_Date_Work"  id="Start_Date_Work" required="">
        </div>
        <div class="form-group col-sm-3">
          <label for="exampleInputBorder">ថ្ងៃខែតាំងស៊ុបក្នុងក្របខណ្ឌ</label>
          <input type="date" class="form-control form-control-border border-width-2 " name="Date_Certi"  id="Date_Certi" required="">
        </div>


<!-- <div class="form-group col-sm-3">
  <label for="exampleInputBorder">Subject1</label>
  <input type="text" class="form-control form-control-border border-width-2 " name="dob"  id="dob">
</div> -->
<!-- <div class="form-group col-sm-3">
  <label for="exampleInputBorder">Subject1</label>
  <input type="text" class="form-control form-control-border border-width-2 " name="dob"  id="dob">
</div> -->
</div>
<div class="row">
  <div class="form-group col-sm-3">
    <label for="exampleInputBorder">ប្រភេទក្របខណ្ឌ</label>
    <select class="custom-select form-control-border border-width-2" style="line-height: 1.7;" name="Teacher_Framework"  id="Teacher_Framework">
      <option>ឧត្តម</option>
      <option>មូលដ្ឋាន</option>
      <option>បឋម</option>
      <option>មត្តេយ្យ</option>
      <option>កិច្ចសន្យា</option>
    </select>
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputBorder">កាំប្រាក់ចុងក្រោយ</label>
    <select class="custom-select form-control-border border-width-2" style="line-height: 1.7;" name="Lavel_Type"  id="Lavel_Type">
      <option>ក.១.១</option>
      <option>ក.១.២</option>
      <option>ក.១.៣</option>
      <option>ក.១.៤</option>
      <option>ក.១.៥</option>
      <option>ក.១.៦</option>
      <option>ក.២.១</option>
      <option>ក.២.២</option>
      <option>ក.២.៣</option>
      <option>ក.២.៤</option>
      <option>ក.៣.១</option>
      <option>ក.៣.២</option>
      <option>ក.៣.៣</option>
      <option>ក.៣.៤</option>
      <option>ខ.១.១</option>
      <option>ខ.១.២</option>
      <option>ខ.១.៣</option>
      <option>ខ.១.៤</option>
      <option>ខ.១.៥</option>
      <option>ខ.១.៦</option>
      <option>ខ.២.១</option>
      <option>ខ.២.២</option>
      <option>ខ.២.៣</option>
      <option>ខ.២.៤</option>
      <option>ខ.៣.១</option>
      <option>ខ.៣.២</option>
      <option>ខ.៣.៣</option>
      <option>ខ.៣.៤</option>
      <option>គ.១</option>
      <option>គ.២</option>
      <option>គ.៣</option>
      <option>គ.៤</option>
      <option>គ.៥</option>
      <option>គ.៦</option>
      <option>គ.៧</option>
      <option>គ.៨</option>
      <option>គ.៩</option>
      <option>គ.១០</option>
    </select>
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputBorder">កម្រិតវប្បធម៌</label>
    <select class="custom-select form-control-border border-width-2" style="line-height: 1.6;" name="last_Certivicate"  id="last_Certivicate">
      <option>មធ្យមសិក្សាបឋមភូមិ</option>
      <option>ទុតិយភូមិមធ្យមសិក្សា</option>
      <option>បរិញ្ញាបត្រ</option>
      <option>អនុបណ្ឌិត</option>
      <option>បណ្ឌិត</option>
    </select>
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputBorder">ស្ថានភាពគ្រួសារ</label>
    <select class="custom-select form-control-border border-width-2" style="line-height: 1.7;" name="Relationship"  id="Relationship">
      <option>នៅលីវ</option>
      <option>មានគ្រួសារ</option>
    </select>
  </div>

</div>
<div class="row">

  <div class="form-group col-sm-3">
    <label for="exampleInputBorder">ឯកទេសទី១</label>
    <?php
    $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_subject");
    ?> 
    <select class="custom-select form-control-border border-width-2" style="line-height: 1.7;" name="Subject1"  id="Subject1">
      <?php 
      while($row = mysqli_fetch_array($sql)){
        $Subject = $row['Subject'];
        ?>
        <option value="<?php echo $Subject; ?>">
          <?php echo $Subject; ?>
        </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputBorder">ឯកទេសទី២</label>
    <?php
    $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_subject");
    ?> 
    <select class="custom-select form-control-border border-width-2" style="line-height: 1.7;" name="Subject2"  id="Subject2">
      <?php 
      while($row = mysqli_fetch_array($sql)){
        $Subject = $row['Subject'];
        ?>
        <option value="<?php echo $Subject; ?>">
          <?php echo $Subject; ?>
        </option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputBorder">ទូរស័ព្ទ</label>
    <input type="text" class="form-control form-control-border border-width-2 " name="phone"  id="phone" required="">
  </div>
  <div class="form-group col-sm-3">
    <label for="exampleInputFile">រូបថត</label>
    <div class="input-group ">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="exampleInputFile" name="photo">
        <label class="custom-file-label" for="exampleInputFile">ជ្រើសរើសរូបភាព</label>
      </div>
    </div>
  </div>

</div>

<div class="row">
 <div class="col-md-12">

  <div class="card" style="background-color:#004fa5 ;border-radius: 0.5rem;">
    <span class="card-title" style="color: white; text-align: center; font-size: 20px; font-family: 'Kantumruy';    margin-top: 5px;
    margin-bottom: 5px;  ">
    <i class="fas fa-map-marker-alt"></i>
    ទីកន្លែងកំណើត     
  </span>
</div>

</div>
</div>

<div class="row" style="    margin-bottom: 20px;text-align-last: center;">
 <div class="col-sm-12" style="text-align-last: left;">
   <div class="row">

    <!--ខេត្ត-->
    <div class="col-sm-3">
      <label>ជ្រើសរើសខេត្ដ <span style="color:red">*</span></label>
      <input class="form-control form-control-border border-width-2 " style="line-height: 1.9;"  name="POB_Province" required id="POB_Province">
    </div>
    <!--ស្រុក-->
    <div class="col-sm-3">
      <label>បញ្ចូលស្រុក <span style="color:red">*</span></label>
      <input class="form-control form-control-border border-width-2 " style="line-height: 1.9;"  name="POB_District" required id="POB_District">
    </div>
    <!--ឃុំ-->
    <div class="col-sm-3">
      <label>បញ្ចូលឃុំ<span style="color:red">*</span></label>
      <input class="form-control form-control-border border-width-2 " style="line-height: 1.9;" id="POB_Commune" name="POB_Commune" required id="exampleFormControlSelect1">
    </div>

    <!--ភូមិ-->
    <div class="col-sm-3">
      <label>បញ្ចូលភូមិ <span style="color:red">*</span></label>
      <input class="form-control form-control-border border-width-2 " style="line-height: 1.9;" id="POB_Village" name="POB_Village" required id="exampleFormControlSelect1">
    </div>
  </div>
  <!--Close Coldob-->
</div>
</div>
</div>

<div class="row">
 <div class="col-md-12">

  <div class="card" style="background-color:#004fa5 ;border-radius: 0.5rem;">
    <span class="card-title" style="color: white; text-align: center; font-size: 20px; font-family: 'Kantumruy';    margin-top: 5px;
    margin-bottom: 5px;  ">
    <i class="fas fa-map-marker-alt"></i>
    ទីលំនៅបច្ចុប្បន្ន     
  </span>
</div>

</div>
</div>

<!--location now-->
<div class="row" style="margin-bottom: 20px;" >
 <!--ខេត្ត-->
 <div class="col-sm-3 "> 
   <div class="form-group">
    <div class="col-sm-12">
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

</div>
</div>
<!--ស្រុក-->
<div class="col-sm-3 "> 
 <div class="form-group">
  <div class="col-sm-12">
    <label>ជ្រើសរើសស្រុក <span style="color:red">*</span></label>
    <select class="custom-select form-control-border border-width-2" name="District_Name" id="District_Name" 
    onchange="getCommuneByDistrict();">

  </select>
</div>

</div>
</div>
<!--ឃុំ-->
<div class="col-sm-3 ">
  <div class="form-group">
    <div class="col-sm-12">
      <label>ជ្រើសរើសឃុំ <span style="color:red">*</span></label>
      <select class="custom-select form-control-border border-width-2" name="Commune_Name" id="Commune_ID" required=""
      onchange="getVillageByCommune();">

    </select>
  </div>

</div>
</div>

<!--ភូមិ-->
<div class="col-sm-3 ">
  <div class="form-group">
    <div class="col-sm-12">
      <label>ជ្រើសរើសភូមិ <span style="color:red">*</span></label>
      <select class="custom-select form-control-border border-width-2" name="Village_Name" id="Village_ID">

      </select>
    </div>

  </div>
</div>

</div>
<!--location now-->

<div class="modal-footer">
  <button type="button" class="btn btn-danger" name="btn-close" data-dismiss="modal"><i class="fas fa-times-circle"></i> បិទ</button>
  <button type="submit" class="btn btn-primary" id="btn-save" value="addnew"><i class="fas fa-save"></i> រក្សារទុក</button>
  </div>
</form>
</div>
</div>
</div>
<!--End Modal -->

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