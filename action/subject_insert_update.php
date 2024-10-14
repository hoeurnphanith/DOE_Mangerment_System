<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
 //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){

	$Subject_ID=$_POST['Subject_ID'];
	$Subject=$_POST['Subject'];


	if(empty($_POST['Subject_ID'])){

		$result = $obj->fun_checkdata("tbl_subject","Subject","$Subject");

		if($result){
			$_SESSION['data']="Already Exited!";
		}else{
			$table = "tbl_subject";
			$fields = array("Subject");
			$values = array($Subject);
			$obj->fun_insertdata($table,$fields,$values);	
			$_SESSION['insert']="បញ្ចូលដោយដោយជោគជ័យ";
		}
	}else{
		$table = "tbl_subject";
		$fields = array("Subject");
		$values = array($Subject);
		$fid = 'Subject_ID';
		$vid = $_POST['Subject_ID'];
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