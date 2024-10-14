<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
 //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){

	
		// $data = array(
		// ':Attandance_ID'			=>	$Attandance_ID[$count],
		// ':Event_Time'	=>	$_POST["Event_Time".$Student_ID[$count].""],
		// ':Attendent'	=>	$_POST["Attendent".$Student_ID[$count].""],
		// ':Referent'		=>	$Referent,
		// ':date'		=>	$date,

						// ':teacher_id'			=>	$_SESSION["teacher_id"]
		// );
		// $statement = $connect->prepare($query);
		// $statement->execute($data);
	$Attandance_ID=$_POST['Attandance_ID'];
	$Student_ID=$_POST['Student_ID'];
	$Event_Time=$_POST["Event_Time"];
	$Attendent=$_POST["Attendent"];
	$Referent=$_POST['Referent'];
	$date=$_POST['date'];
	// }

	


	if(empty($_POST['Attandance_ID'])){
		for($count = 0; $count < count($Student_ID); $count++)
	{

		// $result = $obj->fun_checkdata("tbl_attandance","Subject","$Subject");

		// if($result){
		// 	$_SESSION['data']="Already Exited!";
		// }else{
		$table = "tbl_attandance_stu";
		$fields = array("Student_ID","Event_Time","Attendent","Referent","date");
		$values = array($Student_ID,$Event_Time,$Attendent,$Referent,$date);
		$obj->fun_insertdata($table,$fields,$values);	
		$_SESSION['insert']="បញ្ចូលដោយដោយជោគជ័យ";
		echo '$obj';
		}
	}else{
		$table = "tbl_attandance_stu";
		$fields = array("Student_ID","Event_Time","Attendent","Referent","date");
		$values = array($Student_ID,$Event_Time,$Attendent,$Referent,$date);
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