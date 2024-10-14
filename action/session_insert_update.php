<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
 //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){

	$session_id=$_POST['session_id'];
	$name=$_POST['name'];


	if(empty($_POST['session_id'])){

		$result = $obj->fun_checkdata("session","name","$name");

		if($result){
			$_SESSION['data']="ទិន្នន័យមានរួចហើយ!";
		}else{
			$table = "session";
			$fields = array("name");
			$values = array($name);
			$obj->fun_insertdata($table,$fields,$values);	
			$_SESSION['insert']="ត្រូវបានបញ្ចូលដោយជោគជ័យ!";
		}
	}else{
		$table = "session";
		$fields = array("name");
		$values = array($name);
		$fid = 'session_id';
		$vid = $_POST['session_id'];
		$obj->fun_updatedata($table,$fields,$values,$fid,$vid);
		$_SESSION['update']="ត្រូវបានកែប្រែដោយជោគជ័យ!";
	}
	$result1 = $obj->pro_sql;
	if($result1) {
		echo json_encode($result1);
	} else {
		echo "Error: " . $sql . "" . mysqli_error($obj->fun_link());
	}

}
?>