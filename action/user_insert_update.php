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
	$User_Name=$_POST['school_id'];
	$School_Name=$_POST['school_id'];
	$pwd=$_POST['pwd'];
	$User_Type=$_POST['User_Type'];
	$Created=$_POST['Created'];
	$Email=$_POST['email'];
	$phone=$_POST['phone'];
	if(empty($_POST['User_ID'])){

		$sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$User_Name'");
		while($row = mysqli_fetch_array($sql)){
			$School_Name=$row['School_NameKH'];
		// }

		// $sql = $obj->fun_displaydata("tbl_school WHERE School_ID ='$User_Name'");
		// foreach ($sql as $records) {
		// 	$School_Name = $_POST['School_NameKH'];
		// }
		

		$result = $obj->fun_checkdata("tbl_users","School_Name","$School_Name");

		if($result){
			$_SESSION['data']="Already Exited!";
		}else{
		$table = "tbl_users";
		$fields = array("User_Name","School_Name","pwd","User_Type","Created","Email","phone");
		$values = array($User_Name,$School_Name,$pwd,$User_Type,$Created,$Email,$phone);
		$obj->fun_insertdata($table,$fields,$values);	
		$_SESSION['insert']="បញ្ចូលដោយដោយជោគជ័យ";
		echo '$obj';
	}
		}
	}else{
		$table = "tbl_users";
		$fields = array("User_Name","School_Name","pwd","User_Type","Created","Email","phone");
		$values = array($User_Name,$School_Name,$pwd,$User_Type,$Created,$Email,$phone);
		$fid = 'User_ID';
		$vid = $_POST['User_ID'];
		$obj->fun_updatedata($table,$fields,$values,$fid,$vid);
		$_SESSION['update']="ត្រូវបានកែប្រែដោយជោគជ័យ";
	}
	$result1 = $obj->pro_sql;
	if($result1) {
		echo json_encode($result1);
	} else {
		echo "Error: " . $sql . "" . mysqli_error($obj->fun_link);
	}

}
?>