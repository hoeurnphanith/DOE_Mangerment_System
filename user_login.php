<?php
//Start Session
session_start();
//Import class.php
require_once('inc/classdoe.php');
//Instance Object
$obj = new myclass;

 //Test Submit Button
 if(isset($_POST['Login_user'])){
  
  $username=trim($_POST['txt_username']);
  $username=mysqli_real_escape_string($obj->fun_link(),$_POST['txt_username']);

  $password=trim($_POST['txt_password']);
  $password=$_POST['txt_password'];

  if(empty($username)&&empty($password)){
  $error= 'Fileds are Mandatory';
  }else{
 //Checking Login Detail
$result=mysqli_query($obj->fun_link(),"SELECT*FROM tbl_users WHERE User_Name='$username' AND pwd='$password'");
$row=mysqli_fetch_assoc($result);
$count=mysqli_num_rows($result);

 if($count==1){
   //create User
   $_SESSION['User_Name']=$username;
   $_SESSION['pwd']=$password;
   $_SESSION['Role']=$row['User_Type'];
   //Chk Role user

  switch($_SESSION['Role']){
  case 'doe':
  header('location:dashboard_admin.php');
  break;
  case 'school':
  header('location:dashboard_school.php');
  break;
   }
   }else{
    $_SESSION['fail']='incorect username or passwprd';
    header('location:http://localhost/DOE_Mangerment_System/index.php');

   }
 }
 }

?>
