<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
 //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){

	$Occupation_ID=$_POST['Occupation_ID'];
	$Occupation=$_POST['Occupation'];
	$other=$_POST['other'];


	if(empty($_POST['Occupation_ID'])){

		$result = $obj->fun_checkdata("tbl_occupation","Occupation","$Occupation");

		if($result){
			$_SESSION['data']="Already Exited!";
		}else{
			$table = "tbl_occupation";
			$fields = array("Occupation","other");
			$values = array($Occupation,$other);
			$obj->fun_insertdata($table,$fields,$values);	
			$_SESSION['insert']="Insert Success";
		}
	}else{
		$table = "tbl_occupation";
		$fields = array("Occupation","other");
		$values = array($Occupation,$other);
		$fid = 'Occupation_ID';
		$vid = $_POST['Occupation_ID'];
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