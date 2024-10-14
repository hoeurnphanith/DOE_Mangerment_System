
<?php
	//Start Session
session_start();
	//Import class.php
require_once('inc/classdoe.php');
	//Instance Object
$obj = new myclass;
	// Import restrict.php
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
<div class="content-wrapper" style="min-height: 767.392px;">
  <!-- Main content --> 
  <section class="content-header">

    <!-- Main content -->
    <section class="content" style="margin: 5px 5px;">
      <!-- <div class="row">
       <div class="col-md-3 col-sm-6">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">ខេត្ដ</span>
          </div>
          <input type="text"​ value="" class="form-control text-primary" placeholder="Username">
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">ស្រុក</span>
          </div>
          <input type="text" value="" class="form-control text-primary" placeholder="Username">
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">ឃុំ</span>
          </div>
          <input type="text" value="" class="form-control text-primary" placeholder="Username">
        </div>
      </div>
      <div class="col-md-3 col-sm-12">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">ភូមិ</span>
          </div>
          <input type="text" value= "" class="form-control text-primary" placeholder="Username">
        </div>
      </div>
    </div> -->
    <div class="row" >
      <div class="col-lg-3 col-md-6" >
        <!-- small box -->
        <a href="#">
          <div class="small-box bg-aqua" style=" background-color: #17a2b8; ">
            <div class="inner" style="color:white;" >
              <h4>
                <?php 
                $result1 = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_doe");
                $row1 = mysqli_fetch_array($result1);
                $total1 = $row1[0];

                $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_Users");
                $row = mysqli_fetch_array($result);
                $total = $row[0];
                echo $total+$total1;

                mysqli_close($obj->pro_link);
                ?>
              </h4>

              <p>បុគ្គលិកសរុប</p>
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
        <a href="school_name.php">
          <div class="small-box bg-green">
            <div class="inner">
              <h4> <?php 

              $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_school");
              $row = mysqli_fetch_array($result);

              $total = $row[0];
              echo $total;

              mysqli_close($obj->pro_link);
              ?>
            </h4>

            <p>សាលារៀនសរុប</p>
          </div>
          <div class="icon">
            <i class="fas fa-school"></i>
          </div>
        </div>
      </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-md-6">
      <!-- small box -->
      <a href="teacher.php">
        <div class="small-box bg-gray">
          <div class="inner">
            <h4><?php 

            $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_teacher");
            $row = mysqli_fetch_array($result);

            $total = $row[0];
            echo $total;

            mysqli_close($obj->pro_link);
            ?></h4>

            <p>គ្រូសរុប</p>
          </div>
          <div class="icon">
            <i class="fas fa-chalkboard-teacher"></i>
          </div>
        </div>
      </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-md-6">
      <!-- small box -->
      <a href="student_new.php">
        <div class="small-box bg-red">
          <div class="inner">
            <h4>
              <?php 

              $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_student");
              $row = mysqli_fetch_array($result);

              $total = $row[0];
              echo $total;

              mysqli_close($obj->pro_link);
              ?>
            </h4>

            <p>សិស្សសរុប</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-graduate"></i>
          </div>
        </div>
      </a>
    </div>
    <!-- ./col -->
  </div>
  <div class="row" >
    <div class="col-lg-3 col-md-6" >
      <!-- small box -->
      <a href="#">
        <div class="small-box bg-aqua" style=" background-color: #17a2b8; ">
          <div class="inner" style="color:white;" >
            <h4>0</h4>

            <p>វត្ដមានបុគ្គលិក</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-md-6">
      <!-- small box -->
      <a href="admin_add.php">
        <div class="small-box bg-green">
          <div class="inner">
            <h4>
              <?php 

              $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_doe");
              $row = mysqli_fetch_array($result);

              $total = $row[0];
              echo $total;

              mysqli_close($obj->pro_link);
              ?>
              <sup style="font-size: 16px"></sup></h4>

              <p>គណនី​ រដ្ឋាបាលសរុប</p>
            </div>
            <div class="icon">
              <i class="fas fa-users-cog"></i>
            </div>
          </div>
        </a>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-md-6">
        <!-- small box -->
        <a href="create_user.php">
          <div class="small-box bg-gray">
            <div class="inner">
              <h4>
                <?php 

                $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_Users");
                $row = mysqli_fetch_array($result);

                $total = $row[0];
                echo $total;

                mysqli_close($obj->pro_link);
                ?>

              </h4>

              <p>គណនី សាលារៀនសរុប</p>
            </div>
            <div class="icon">
              <i class="fas fa-users-cog"></i>
            </div>
          </div>
        </a>
      </div>
      <!-- ./col -->
      <!-- ./col -->
      <div class="col-lg-3 col-md-6">
        <!-- small box -->
        <a href="head_teacher.php">
          <div class="small-box bg-danger">
            <div class="inner">
              <h4>
                <?php 

                $result = mysqli_query($obj->fun_link(),"select count(1) FROM tbl_teacher WHERE Teacher_Position = 'នាយក'");
                $row = mysqli_fetch_array($result);

                $total = $row[0];
                echo $total;

                mysqli_close($obj->pro_link);
                ?>

              </h4>

              <p>នាយកសរុប</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-tie"></i>
            </div>
          </div>
        </a>
      </div>
      <!-- ./col -->

      <!-- ./col -->
    </div>
  </section>
  <!-- /.content -->

</div>

<?php
include 'inc/footer.php';
?> 
