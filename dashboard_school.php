<link rel="stylesheet" href="dist/js/jquery.highchartTable.js">
<Header>
  <?php
  //Start Session
  session_start();
  //Import class.php
  require_once('inc/classdoe.php');
  //Instance Object
  $obj = new myclass;
  //Import restrict.php
  require_once('inc/restrict.php');
  if($_SESSION['Role']!=="school"){
    //Redirect Page
    header('location:index.php');
  }
  $School_ID = $_SESSION['User_Name'];

  $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_ID'");
  while($row = mysqli_fetch_array($sql)){
    $School_Name=$row['School_NameKH'];
    $School_Province=$row['School_Province'];
    $School_District=$row['School_District'];
    $School_Commune=$row['School_Commune'];
    $School_Village=$row['School_Village'];
  }
  $sql1= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_province where Province_ID='$School_Province'");
  while($row = mysqli_fetch_array($sql1)){
    $province_Name=$row['province_Name'];
      // $School_District=$row['School_NameKH'];
      // $School_Commune=$row['School_NameKH'];
      // $School_Village=$row['School_NameKH'];
  }
  $sql2= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_district where district_ID='$School_District'");
  while($row = mysqli_fetch_array($sql2)){
      // $province_Name=$row['province_Name'];
    $District_Name=$row['District_Name'];
  }
  $sql3= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_commune where Commune_ID='$School_Commune'");
  while($row = mysqli_fetch_array($sql3)){
      // $province_Name=$row['province_Name'];
    $Commune_Name=$row['Commune_Name'];
  }
  $sql4= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_village where Village_ID='$School_Village'");
  while($row = mysqli_fetch_array($sql4)){
      // $province_Name=$row['province_Name'];
    $Village_Name=$row['Village_Name'];
  }
  ?>

  <?php
  include 'header.php';
  include 'sidebar_school.php';
  ?>
  <style>
    /*@import url('https://fonts.googleapis.com/css2?family=Kantumruy:wght@700&display=swap');*/
    @import url('https://fonts.googleapis.com/css2?family=Kantumruy&display=swap');
    table{
      font-size: 13px;
      font-family: 'Kantumruy', sans-serif;
    }
    tr{
      font-size: 16px;
      font-family: 'Kantumruy', sans-serif;
    }
    form,a{
     font-family: 'Kantumruy', sans-serif;
   }
   h1,h2,h4,h4,h4,h6,span{
     font-family: 'Koulen', cursive;
   }
   input{
     font-family: 'moul';
   }
 </style>
</Header>
<MAIN>
  <div class="content-wrapper" style="height: auto;">
    <section class="content-header">

      <!-- Main content -->
      <section class="content" style="margin: 15px 5px;">
        <div class="row">
         <div class="col-md-3 col-sm-6">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">ខេត្ដ</span>
            </div>
            <input type="text"​ value="<?php echo $province_Name ;?>" class="form-control text-primary" placeholder="Username">
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">ស្រុក</span>
            </div>
            <input type="text" value="<?php echo $District_Name ;?>" class="form-control text-primary" placeholder="Username">
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">ឃុំ</span>
            </div>
            <input type="text" value="<?php echo $Commune_Name ;?>" class="form-control text-primary" placeholder="Username">
          </div>
        </div>
        <div class="col-md-3 col-sm-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">ភូមិ</span>
            </div>
            <input type="text" value= "<?php echo  $Village_Name ;?>" class="form-control text-primary" placeholder="Username">
          </div>
        </div>
      </div>
      <div class="row" >
        <!-- ./col -->
        <div class="col-lg-3 col-md-6">
          <!-- small box -->
          <a href="student_new.php">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>
                  <?php 

                  $result1 = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE School_ID = '$School_ID' AND sex = 'ស្រី'");
                  $row1 = mysqli_fetch_array($result1);

                  $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE School_ID = '$School_ID'");
                  $row = mysqli_fetch_array($result);

                  $total1 = $row1[0];
                  $total = $row[0];
                  echo $total."/".$total1;

                  mysqli_close($obj->pro_link);
                  ?>
                </h4>

                <p>សិស្ស</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
            </div>
          </a>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-3 col-md-6">
          <a href="teacher.php">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>
                  <?php 

                  $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_teacher WHERE School_ID = '$School_ID'");
                  $row = mysqli_fetch_array($result);

                  $total = $row[0];
                  echo $total;

                  mysqli_close($obj->pro_link);
                  ?>
                </h4>

                <p>គ្រូ</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
            </div>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-md-6">
          <!-- small box -->
          <a href="#">
            <div class="small-box bg-warning">
              <div class="inner text-white">
                <h4>0</h4>
                <p>អាណាព្យាបាល</p>
              </div>
              <div class="icon">
                <i class="fas fa-home"></i>
              </div>
            </div>
          </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-md-6">
          <!-- small box -->
          <a href="classroom.php">
            <div class="small-box bg-red">
              <div class="inner">
                <h4>
                  <?php 
                  $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_classroom WHERE School_ID = '$School_ID'");
                  $row = mysqli_fetch_array($result);

                  $total = $row[0];
                  echo $total;

                  mysqli_close($obj->pro_link);
                  ?>
                </h4>

                <p>បន្ទប់សិក្សា</p>
              </div>
              <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
              </div>
            </div>
          </a>
        </div>
        <!-- ./col -->
      </div>
      <div class="row" >
        <div class="col-lg-3 col-md-6" >
          <!-- small box -->
          <a href="attandance_teacher.php">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>
                 <?php 
                 $School_ID = $_SESSION['User_Name'];
                 $today = date("Y-m-d");
                 $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_attandance WHERE date = '$today' && Attendent = 'វត្ដមាន'
                  AND School_ID = '$School_ID'");
                 $row = mysqli_fetch_array($result);

                 $total = $row[0];
                 echo $total;

                 mysqli_close($obj->pro_link);
                 ?>
               </h4>

               <p>វត្ដមាន</p>
             </div>
             <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </a>
      </div>
      <!-- ./col -->
        <div class="col-lg-3 col-md-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h4>0</h4>

              <p>លេខា</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-md-6">
          <div class="small-box bg-warning">
            <div class="inner text-white">
              <h4>0</h4>

              <p>បណ្ណារក្ស</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-md-6">
          <!-- small box -->
          <a href="head_teacher.php">
            <div class="small-box bg-danger">
              <div class="inner">
               <h4>
                <?php 

                $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_teacher WHERE School_ID = '$School_ID' && Teacher_Position = 'នាយក'");
                $row = mysqli_fetch_array($result);

                $total = $row[0];
                echo $total;

                mysqli_close($obj->pro_link);
                ?>

              </h4>

              <p>នាយក</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-tie"></i>
            </div>
          </div>
        </a>
      </div>
      <!-- ./col -->
    </div>
  </section>
  <div class="row">
    <div class="col-md-6 col-sm-6">
      <div class="card"​ style="margin: 10px; margin-top: 0px; margin-bottom: 10px;">

        <div class="card-header">
          <div class="card-body">
           <!-- button -->
           <div class="nav justify-content-center">
              <!-- <button type="button" class="btn btn-add​ btn-primary" id="addnew" data-toggle="modal" data-target="#exampleModal">
               <i class="fas fa-plus text-white " id="add" ></i>
               <a class="text-white" style="font-family: 'Kantumruy', sans-serif;"></a>
             </button> -->
             <h5 style="color: #007bff!important;">សិស្សតាមកម្រិតថ្នាក់</h5>
           </div>
           <!-- button -->&nbsp;
           <!-- row -->
           <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
             <div class="card-body table-responsive p-0">
               <div class="col-sm-12">
                 <table id="exampleយ៥យ" class="highchart table table-bordered table-hover dataTable dtr-inline" style="font-size: 16px; min-width: max-content; " role="grid"​ style="font-family: 'Kantumruy', sans-serif;" aria-describedby="example2_info">
                  <thead >
                   <tr >
                    <th>ថ្នាក់ទី១</th>
                    <th>ថ្នាក់ទី២</th>
                    <th>ថ្នាក់ទី៣</th>
                    <th>ថ្នាក់ទី៤</th>
                    <th>ថ្នាក់ទី៥</th>
                    <th>ថ្នាក់ទី៦</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <!-- ១១១១១១១១១១១១១ -->
                      <?php 
                      $School_ID = $_SESSION['User_Name'];

                      $result1 = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE School_ID = '$School_ID' AND sex = 'ស្រី' AND grade = 'ថ្នាក់ទី១'");
                      $row1 = mysqli_fetch_array($result1);
                      $total1 = $row1[0];

                  // $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_classroom WHERE Grade_ID = '11' AND School_ID = '$School_ID'");
                      $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE grade = 'ថ្នាក់ទី១' AND School_ID = '$School_ID'");
                      $row = mysqli_fetch_array($result);

                      $total1 = $row1[0];
                      $total = $row[0];
                      echo $total."/".$total1;
                      mysqli_close($obj->pro_link);
                      ?>

                    </td>
                    <td>
                      <!-- ២២២២២២២២២២២២ -->
                      <?php 
                      $School_ID = $_SESSION['User_Name'];

                      $result1 = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE School_ID = '$School_ID' AND sex = 'ស្រី' AND grade = 'ថ្នាក់ទី២'");
                      $row1 = mysqli_fetch_array($result1);
                      $total1 = $row1[0];

                  // $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_classroom WHERE Grade_ID = '11' AND School_ID = '$School_ID'");
                      $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE grade = 'ថ្នាក់ទី២' AND School_ID = '$School_ID'");
                      $row = mysqli_fetch_array($result);

                      $total1 = $row1[0];
                      $total = $row[0];
                      echo $total."/".$total1;
                      mysqli_close($obj->pro_link);
                      ?>

                    </td>

                    <td>
                      <!-- 3333333333333 -->
                      <?php 
                      $School_ID = $_SESSION['User_Name'];

                      $result1 = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE School_ID = '$School_ID' AND sex = 'ស្រី' AND grade = 'ថ្នាក់ទី៣'");
                      $row1 = mysqli_fetch_array($result1);
                      $total1 = $row1[0];

                  // $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_classroom WHERE Grade_ID = '11' AND School_ID = '$School_ID'");
                      $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE grade = 'ថ្នាក់ទី៣' AND School_ID = '$School_ID'");
                      $row = mysqli_fetch_array($result);

                      $total1 = $row1[0];
                      $total = $row[0];
                      echo $total."/".$total1;
                      mysqli_close($obj->pro_link);
                      ?>

                    </td>
                    <td>
                      <!-- 4444444 -->
                      <?php 
                      $School_ID = $_SESSION['User_Name'];

                      $result1 = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE School_ID = '$School_ID' AND sex = 'ស្រី' AND grade = 'ថ្នាក់ទី៤'");
                      $row1 = mysqli_fetch_array($result1);
                      $total1 = $row1[0];

                  // $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_classroom WHERE Grade_ID = '11' AND School_ID = '$School_ID'");
                      $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE grade = 'ថ្នាក់ទី៤' AND School_ID = '$School_ID'");
                      $row = mysqli_fetch_array($result);

                      $total1 = $row1[0];
                      $total = $row[0];
                      echo $total."/".$total1;
                      mysqli_close($obj->pro_link);
                      ?>

                    </td>
                    <td>
                      <!-- ៥៥៥៥៥៥៥៥៥ -->
                      <?php 
                      $School_ID = $_SESSION['User_Name'];

                      $result1 = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE School_ID = '$School_ID' AND sex = 'ស្រី' AND grade = 'ថ្នាក់ទី៥'");
                      $row1 = mysqli_fetch_array($result1);
                      $total1 = $row1[0];

                  // $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_classroom WHERE Grade_ID = '11' AND School_ID = '$School_ID'");
                      $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE grade = 'ថ្នាក់ទី៥' AND School_ID = '$School_ID'");
                      $row = mysqli_fetch_array($result);

                      $total1 = $row1[0];
                      $total = $row[0];
                      echo $total."/".$total1;
                      mysqli_close($obj->pro_link);
                      ?>

                    </td>
                    <td>
                      <!-- ៥៥៥៥៥៥៥៥ -->
                      <?php 
                      $School_ID = $_SESSION['User_Name'];

                      $result1 = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE School_ID = '$School_ID' AND sex = 'ស្រី' AND grade = 'ថ្នាក់ទី៦'");
                      $row1 = mysqli_fetch_array($result1);
                      $total1 = $row1[0];

                  // $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_classroom WHERE Grade_ID = '11' AND School_ID = '$School_ID'");
                      $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student WHERE grade = 'ថ្នាក់ទី៦' AND School_ID = '$School_ID'");
                      $row = mysqli_fetch_array($result);

                      $total1 = $row1[0];
                      $total = $row[0];
                      echo $total."/".$total1;
                      mysqli_close($obj->pro_link);
                      ?>

                    </td>
                  </tr>

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
<div class="col-md-6 col-sm-6">
  <div class="card"​ style="margin: 10px; margin-top: 0px; margin-bottom: 10px;">

    <div class="card-header">
      <div class="card-body">
       <!-- button -->
       <div class="nav justify-content-center">
        <!-- <button type="button" class="btn btn-add​ btn-primary" id="addnew" data-toggle="modal" data-target="#exampleModal">
         <i class="fas fa-plus text-white " id="add" ></i>
         <a class="text-white" style="font-family: 'Kantumruy', sans-serif;"></a>
       </button> -->
       <h5 style="color: #007bff!important;">ព័ត៌មានគ្រូ</h5>
     </div>
     <!-- button -->&nbsp;
     <!-- row -->
     <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
      <div class="row">
       <div class="card-body table-responsive p-0">
         <div class="col-sm-12">
           <table id="examrgrhple" class="table table-bordered table-hover dataTable dtr-inline" style="font-size: 16px; min-width: max-content; " role="grid"​ style="font-family: 'Kantumruy', sans-serif;" aria-describedby="example2_info">
            <thead >
             <tr >
              <!-- <th>ល.រ</th> -->
              <!-- <th>រូបថត</th> -->
              <th>អត្តលេខមន្ត្រី</th>
              <!-- <th>អង្គភាព</th> -->
              <th>គោត្តនាម-នាម</th>
              <!-- <th>ឈ្មោះឡាតាំង</th> -->
              <th>ភេទ</th>
              <!-- <th>ថ្ងៃខែឆ្នាំកំណើត</th>
              <th>ថ្ងៃខែឆ្នាំចូលបម្រើការងារ</th>
              <th>ថ្ងៃខែឆ្នាំតាំងស៊ុបក្នុងក្របខណ្ឌ</th>
              <th>ប្រភេទក្របខណ្ឌ</th> -->
              <th>តួនាទី</th>
              <!-- <th>ប្រភេទកាំប្រាក់</th>
              <th>ឯកទេសទី១</th>
              <th>ឯកទេសទី២</th>
              <th>កម្រិតវប្បធម៌</th>
              <th>ភមិកំណើត</th>
              <th>POB_District</th>
              <th>POB_Commune</th>
              <th>POB_Village</th>
              <th>Province_ID</th>
              <th>District_ID</th>
              <th>Commune_ID</th>
              <th>Village_ID</th>
              <th>ស្ថានភាពគ្រួសារ</th>
              <th>កែប្រែ</th> -->


            </tr>
          </thead>
          <tbody>
            <?php
            $School_ID = $_SESSION['User_Name'];

            $student = $obj->fun_displaydata("tbl_teacher WHERE School_ID =$School_ID");
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
              $Teacher_Framework = $records['Teacher_Framework'];
              $Teacher_Position = $records['Teacher_Position'];
              $Lavel_Type = $records['Lavel_Type'];
              $Subject1 = $records['Subject1'];
              $Subject2 = $records['Subject2'];
              $last_Certivicate = $records['last_Certivicate'];
              $Province_ID = $records['Province_ID'];
              $District_ID = $records['District_ID'];
              $Commune_ID = $records['Commune_ID'];
              $Village_ID = $records['Village_ID'];
              $POB_Province = $records['POB_Province'];
              $POB_District = $records['POB_District'];
              $POB_Commune = $records['POB_Commune'];
              $POB_Village= $records['POB_Village'];
              $Relationship = $records['Relationship'];



              $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_ID'");
              while($row = mysqli_fetch_array($sql)){
                $School_NameKH=$row['School_NameKH'];
              }
              ?>


              <tr>
                <!-- <td><?php echo $ID_Teacher; ?></td>
                <td></td> -->
                <td><?php echo $Teacher_ID; ?></td>
                <!-- <td><?php echo $School_NameKH; ?></td> -->
                <td><?php echo $Teacher_NameKH; ?></td>
                <!-- <td><?php echo $Teacher_NameEN; ?></td> -->
                <td><?php echo $Gender; ?></td>

                <!-- <td><?php echo $DOB; ?></td>
                <td><?php echo $Start_Date_Work; ?></td>
                <td><?php echo $Date_Certi; ?></td>
                <td><?php echo $Teacher_Framework; ?></td> -->
                <td><?php echo $Teacher_Position; ?></td>
                <!-- <td><?php echo $Lavel_Type; ?></td>
                <td><?php echo $Subject1; ?></td>
                <td><?php echo $Subject2; ?></td>
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
</MAIN>

<FOOTER>
  <?php
  include 'footer.php';
  ?>
</FOOTER>
<script>
  $(document).ready(function() {
  $('table.highchart').highchartTable();
});
</script>
