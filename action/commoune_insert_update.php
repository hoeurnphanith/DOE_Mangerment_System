<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
  //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){
	$Commune_ID=$_POST['Commune_ID'];
	$Commune_Name=$_POST['Commune_Name'];
	$Postcode=$_POST['Postcode'];
	$district_ID=$_POST['district_id'];


	if(empty($_POST['Commune_ID'])){

		$result = $obj->fun_checkdata("tbl_commune","Postcode","$Postcode");
		if($result){
			$_SESSION['data']="Already Exited!";
		}else{
			$table = "tbl_commune";
		$fields = array("Commune_Name","Postcode","district_ID");
		$values = array($Commune_Name,$Postcode,$district_ID);
		$obj->fun_insertdata($table,$fields,$values);	
		$_SESSION['insert']="ត្រូវបានបញ្ចូលដោយជោគជ័យ";
		}
		

	}else{
		$table = "tbl_commune";
		$fields = array("Commune_Name","Postcode","district_ID");
		$values = array($Commune_Name,$Postcode,$district_ID);
		$fid = 'Commune_ID';
		$vid = $_POST['Commune_ID'];
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