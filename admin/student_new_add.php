<?php
session_start();
//Import class.php
require_once('inc/classdoe.php');
  //Instance Object
$obj = new myclass;

if(isset($_POST['add'])){
	$ID_Student=$_POST['ID_Student'];
	
	$Student_ID=$_POST['Student_ID'];
	$School_ID=$_POST['School_ID'];
	$studentname_kh=$_POST['studentname_kh'];
	$studentname_en=$_POST['studentname_en'];
	$sex=$_POST['gender'];
	$dob=$_POST['dob'];
	$Province_ID=$_POST['province_id'];
	$district_ID=$_POST['District_Name'];
	$commune_ID=$_POST['Commune_Name'];
	$village_ID=$_POST['Village_Name'];
	$dob_province_name=$_POST['dob_province_name'];
	$dob_district_name=$_POST['dob_district_name'];
	$dob_commune_name=$_POST['dob_commune_name'];
	$dob_village_name=$_POST['dob_village_name'];
	$family_status=$_POST['family_status'];
	$child_ID=$_POST['child_id'];
	$grade=$_POST['grade_id'];
	$filename = $_FILES['txt_photo']['name'];
	

	if(!empty($filename)){
		move_uploaded_file($_FILES['txt_photo']['tmp_name'], 'images/'.$filename);	
	}

	if(empty($_POST['ID_Student'])){
		$table = "tbl_student";
		$fields = array("Student_ID","School_ID","studentname_kh","studentname_en","sex","dob","Province_ID","district_ID","commune_ID","village_ID","dob_province_name","dob_district_name","dob_commune_name","dob_village_name","family_status","child_ID","grade","photo");
		$values = array($Student_ID,$School_ID,$studentname_kh,$studentname_en,$sex,$dob,$Province_ID,$district_ID,$commune_ID,$village_ID,$dob_province_name,$dob_district_name,$dob_commune_name,$dob_village_name,$family_status,$child_ID,$grade,$filename);
		$obj->fun_insertdata($table,$fields,$values);	
		$_SESSION['insert']="Insert Success";
		// }
		echo '$obj';
	}else{
			$table = "tbl_student";
			$fields = array("Student_ID","School_ID","studentname_kh","studentname_en","sex","dob","Province_ID","district_ID","commune_ID","village_ID","dob_province_name","dob_district_name","dob_commune_name","dob_village_name","family_status","child_ID","grade","photo");
		$values = array($Student_ID,$School_ID,$studentname_kh,$studentname_en,$sex,$dob,$Province_ID,$district_ID,$commune_ID,$village_ID,$dob_province_name,$dob_district_name,$dob_commune_name,$dob_village_name,$family_status,$child_ID,$grade,$filename);
			$fid = 'ID_Student';
			$vid = $_POST['ID_Student'];
			$obj->fun_updatedata($table,$fields,$values,$fid,$vid);
			$_SESSION['update']="Update Success";
			echo '$obj';

		}
	$result1 = $obj->pro_sql;
	if($result1) {
		echo json_encode($result1);
	} else {
		echo "Error: " . $sql . "" . mysqli_error($obj->fun_link);
	}

}
header('location: student_new.php');
?>