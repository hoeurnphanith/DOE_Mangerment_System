<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
  //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){
	$Village_ID=$_POST['Village_ID'];
	$Village_Name=$_POST['Village_Name'];
	$Postcode=$_POST['Postcode'];
	$Commune_ID=$_POST['commune_id'];


	if(empty($_POST['Village_ID'])){

		$result = $obj->fun_checkdata("tbl_village","Postcode","$Postcode");
		if($result){
			$_SESSION['data']="Already Exited!";
		}else{
			$table = "tbl_village";
		$fields = array("Village_Name","Postcode","Commune_ID");
		$values = array($Village_Name,$Postcode,$Commune_ID);
		$obj->fun_insertdata($table,$fields,$values);	
		$_SESSION['insert']="បញ្ចូលដោយដោយជោគជ័យ";
		}
		

	}else{
		$table = "tbl_village";
		$fields = array("Village_Name","Postcode","Commune_ID");
		$values = array($Village_Name,$Postcode,$Commune_ID);
		$fid = 'Village_ID';
		$vid = $_POST['Village_ID'];
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