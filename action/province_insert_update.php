<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
  //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){
	$Postcode=$_POST['Postcode'];
	$province_Name=$_POST['province_Name'];


	if(empty($_POST['id'])){

		$result = $obj->fun_checkdata("tbl_province","province_Name","$province_Name");
		if($result){
			$_SESSION['data']="Already Exited!";
		}else{
			$table = "tbl_province";
			$fields = array("province_Name","Postcode");
			$values = array($province_Name,$Postcode);
			$obj->fun_insertdata($table,$fields,$values);	
			$_SESSION['insert']="បញ្ចូលដោយដោយជោគជ័យ";
		}
	}else{
		$table = "tbl_province";
		$fields = array("province_Name","Postcode");
		$values = array($province_Name,$Postcode);
		$fid = 'province_ID';
		$vid = $_POST['id'];
		$obj->fun_updatedata($table,$fields,$values,$fid,$vid);
		$_SESSION['update']="ត្រូវបានកែប្រែដោយជោគជ័យ";
	}
	$result1 = $obj->pro_sql;
	if($result1) {
		echo json_encode($result1);
	} else {
		echo "Error: " . $sql . "" . mysqli_error($obj->fun_link());
	}

}
?>