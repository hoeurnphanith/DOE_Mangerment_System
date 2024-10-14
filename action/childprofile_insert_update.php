<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
 //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){

	$child_ID=$_POST['child_ID'];
	$chile_Profile=$_POST['chile_Profile'];
	$other=$_POST['other'];


	if(empty($_POST['child_ID'])){

		$result = $obj->fun_checkdata("tbl_child_profile","chile_Profile","$chile_Profile");

		if($result){
			$_SESSION['data']="Already Exited!";
		}else{
			$table = "tbl_child_profile";
			$fields = array("chile_Profile","other");
			$values = array($chile_Profile,$other);
			$obj->fun_insertdata($table,$fields,$values);	
			$_SESSION['insert']="បញ្ចូលដោយដោយជោគជ័យ";
		}
	}else{
		$table = "tbl_child_profile";
		$fields = array("chile_Profile","other");
		$values = array($chile_Profile,$other);
		$fid = 'child_ID';
		$vid = $_POST['child_ID'];
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