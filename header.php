<?php
$School_ID = $_SESSION['User_Name'];
$sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_ID'");
while($row = mysqli_fetch_array($sql)){
  $School_Name=$row['School_NameKH'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Koulen&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Moul&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Odor+Mean+Chey&display=swap');

    form{
     font-family: 'Odor Mean Chey', cursive;
   }
   table{
    font-family: 'Koulen', cursive;
    font-size: 11px;
   }
   button{
     font-family: 'Odor Mean Chey', cursive;
   }
   h1,h2,h3,h4,h5,h6{
     font-family: 'Koulen', cursive;
   }

 </style>

 <style>
    /*.main-header{
      background: linear-gradient(357deg,rgba(25,69,255,.89) -.84%,rgba(26,42,115,.92)) repeat scroll 0 0,transparent;
      }*/
    </style>
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper" style="min-height: 5%">
      <!-- Navbar -->
      <nav style="background-color:#173bbd; border-bottom-color: white;" class="main-header navbar navbar-expand sticky-top navbar-white navbar-light p-0" ​​​>
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item" >
            <a class="nav-link" style="color:white;" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <a href="#" class="brand-link">
          <!-- <img src="dist/img/M.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">  -->
          <span class=""​​​ style=" color: white; font-family: moul;"><?php echo $School_Name ;?></span>
        </a>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
            <a class="nav-link" style="color:white;" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                      <i class="fas fa-times"></i>
                    </button>

                  </div>
                </div>
              </form>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" style="color:white;" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt" ></i>
            </a>
          </li>
        </ul>

      </nav>
      <!-- /.navbar -->


    </body>
    </html>
