<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
  //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){
	$district_ID=$_POST['district_ID'];
	$District_Name=$_POST['District_Name'];
	$Postcode=$_POST['Postcode'];
	$province_ID=$_POST['province_id'];


	if(empty($_POST['district_ID'])){

		$result = $obj->fun_checkdata("tbl_district","Postcode","$Postcode");
		if($result){
			$_SESSION['data']="Already Exited!";
		}else{
			$table = "tbl_district";
		$fields = array("District_Name","Postcode","province_id");
		$values = array($District_Name,$Postcode,$province_ID);
		$obj->fun_insertdata($table,$fields,$values);	
		$_SESSION['insert']="បញ្ចូលដោយដោយជោគជ័យ";
		}
		

	}else{
		$table = "tbl_district";
		$fields = array("District_Name","Postcode","province_id");
		$values = array($District_Name,$Postcode,$province_ID);
		$fid = 'district_ID';
		$vid = $_POST['district_ID'];
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