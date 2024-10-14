<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
 //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){

	$ID=$_POST['ID'];
	$Classroom_ID=$_POST['classroom_id'];
	$Teacher_ID=$_POST['teacher_id'];


	if(empty($_POST['ID'])){

		// $result = $obj->fun_checkdata("tbl_grade","Grade_Name","$Grade_Name");

		// if($result){
		// 	$_SESSION['data']="Already Exited!";
		// }else{
		$table = "tbl_teacher_classroom";
		$fields = array("Classroom_ID","Teacher_ID");
		$values = array($Classroom_ID,$Teacher_ID);
		$obj->fun_insertdata($table,$fields,$values);	
		$_SESSION['insert']="បញ្ចូលដោយដោយជោគជ័យ";
		// }
	}else{
		$table = "tbl_teacher_classroom";
		$fields = array("Classroom_ID","Teacher_ID");
		$values = array($Classroom_ID,$Teacher_ID);
		$fid = 'ID';
		$vid = $_POST['ID'];
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