<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
 //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){

	$Grade_ID=$_POST['Grade_ID'];
	$Grade_Name=$_POST['Grade_Name'];
	// $Decription=$_POST['Decription'];


	if(empty($_POST['Grade_ID'])){

		$result = $obj->fun_checkdata("tbl_grade","Grade_Name","$Grade_Name");

		if($result){
			$_SESSION['data']="ទិន្នន័យមានរួចហើយ!";
		}else{
			$table = "tbl_grade";
			$fields = array("Grade_Name");
			$values = array($Grade_Name);
			$obj->fun_insertdata($table,$fields,$values);	
			$_SESSION['insert']="ត្រូវបានបញ្ចូលដោយជោគជ័យ";
		}
	}else{
		$table = "tbl_grade";
		$fields = array("Grade_Name","Decription");
		$values = array($Grade_Name,$Decription);
		$fid = 'Grade_ID';
		$vid = $_POST['Grade_ID'];
		$obj->fun_updatedata($table,$fields,$values,$fid,$vid);
		$_SESSION['update']="ត្រូវបានកែប្រែដោយជោគជ័យ!";
	}
	$result1 = $obj->pro_sql;
	if($result1) {
		echo json_encode($result1);
	} else {
		echo "Error: " . $sql . "" . mysqli_error($obj->fun_link);
	}

}
?>