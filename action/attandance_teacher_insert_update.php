<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
 //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){

	$Attandance_ID=$_POST['Attandance_ID'];
	$School_ID=$_POST['School_ID'];
	$Teacher_ID=$_POST['Teacher_ID'];
	$Event_Time=$_POST['Event_Time'];
	$Attendent=$_POST['Attendent'];
	$start_work=$_POST['start_work'];
	$End_work=$_POST['End_work'];
	$Referent=$_POST['Referent'];
	$date=$_POST['date'];

	if(empty($_POST['Attandance_ID'])){

		// $result = $obj->fun_checkdata("tbl_attandance","Subject","$Subject");

		// if($result){
		// 	$_SESSION['data']="Already Exited!";
		// }else{
		$table = "tbl_attandance";
		$fields = array("School_ID","Teacher_ID","Event_Time","Attendent","start_work","End_work","Referent","date");
		$values = array($School_ID,$Teacher_ID,$Event_Time,$Attendent,$start_work,$End_work,$Referent,$date);
		$obj->fun_insertdata($table,$fields,$values);	
		$_SESSION['insert']="បញ្ចូលដោយដោយជោគជ័យ";
		
		// }
	}else{
		$table = "tbl_attandance";
		$fields = array("School_ID","Teacher_ID","Event_Time","Attendent","start_work","End_work","Referent","date");
		$values = array($School_ID,$Teacher_ID,$Event_Time,$Attendent,$start_work,$End_work,$Referent,$date);
		$fid = 'Attandance_ID';
		$vid = $_POST['Attandance_ID'];
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