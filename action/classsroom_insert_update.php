<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
 //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){

	$Classroom_ID=$_POST['Classroom_ID'];
	$Grade_ID=$_POST['grade_id'];
	$Classroom_Name=$_POST['Classroom_Name'];
	$School_ID1=$_POST['School_ID'];
	$Years_Study=$_POST['Years_Study'];


	if(empty($_POST['Classroom_ID'])){

		$result = $obj->fun_checkthreecolumn($Grade_ID,$Classroom_Name,$Years_Study,$School_ID1);

		if($result){
			$_SESSION['data']="Already Exited!";
		}else{
		$table = "tbl_classroom";
		$fields = array("Grade_ID","School_ID","Classroom_Name","Years_Study");
		$values = array($Grade_ID,$School_ID1,$Classroom_Name,$Years_Study);
		$obj->fun_insertdata($table,$fields,$values);	
		$_SESSION['insert']="បញ្ចូលដោយដោយជោគជ័យ";
	}

	}else{
		$table = "tbl_classroom";
		$fields = array("Grade_ID","School_ID","Classroom_Name","Years_Study");
		$values = array($Grade_ID,$School_ID1,$Classroom_Name,$Years_Study);
		$fid = 'Classroom_ID';
		$vid = $_POST['Classroom_ID'];
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