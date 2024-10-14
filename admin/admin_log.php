<?php
  //Start Session
  session_start();
  //Import class.php
  require_once('../inc/classdoe.php');
  //Instance Object
  $obj = new myclass;

  //Test Submit Button
  if(isset($_POST['Login_admin'])){
    
    $username=trim($_POST['txt_username']);
    $username=mysqli_real_escape_string($obj->fun_link(),$_POST['txt_username']);

    $password=trim($_POST['txt_password']);
    $password=md5($_POST['txt_password']);

    if(empty($username)&&empty($password)){
    $error= 'Fileds are Mandatory';
    }else{
  //Checking Login Detail
  $result=mysqli_query($obj->fun_link(),"SELECT*FROM tbl_doe WHERE DOE_ID='$username' AND Password='$password'");
  $row=mysqli_fetch_assoc($result);
  $count=mysqli_num_rows($result);

  if($count==1){
    //create session User
    $_SESSION['DOE_ID']=$username;
    $_SESSION['Password']=$password;
    $_SESSION['Role']=$row['Role'];
    //Chk Role user

    switch($_SESSION['Role']){
    case 'admin':
    header('location:dashboard_admin.php');
    break;
    case 'doe':
    header('location:dashboard_admin.php');
    break;
    // case 'school':
    // header('location:dashboard_school.php');
    // break;
    }

    }else{
      header('location:admin_login.php');
    }
  }
  }

?>
