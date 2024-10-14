<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
 //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){
	$User_ID=$_POST['User_ID'];
	$School_Name=$_POST['School_Name'];
	$User_Name=$_POST['User_Name'];
	$pwd=$_POST['pwd'];
	$User_Type=$_POST['User_Type'];
	$Email=$_POST['Email'];
	$phone=$_POST['phone'];

		$table = "tbl_users";
		$fields = array("User_Name","School_Name","pwd","User_Type","Email","phone");
		$values = array($User_Name,$School_Name,$pwd,$User_Type,$Email,$phone);
		$fid = 'User_ID';
		$vid = $User_ID;
		$obj->fun_updatedata($table,$fields,$values,$fid,$vid);
		$_SESSION['update']="Update Success";
	$result1 = $obj->pro_sql;
	if($result1) {
		echo json_encode($result1);
	} else {
		echo "Error: " . $sql . "" . mysqli_error($obj->fun_link);
	}

}
?>