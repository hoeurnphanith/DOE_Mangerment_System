<?php
	session_start();
	//Import class.php
	require_once('../inc/classdoe.php');
	//Instance Object
	$obj = new myclass;
?>
<?php
	if(count($_POST)>0){
		$ID_School=$_POST['ID_School'];
		$School_ID=$_POST['School_ID'];
		$School_NameKH=$_POST['School_NameKH'];
		$School_NameEN=$_POST['School_NameEN'];
		$parent_school=$_POST['parent_school'];
		$school_type=$_POST['school_type'];
		$province_id=$_POST['province_id'];
		$District_Name=$_POST['District_Name'];
		$Commune_Name=$_POST['Commune_Name'];
		$Village_Name=$_POST['Village_Name'];

		if(empty($_POST['ID_School'])){

				$result = $obj->fun_checkdata("tbl_school","School_ID","$School_ID");
				if($result){
					$_SESSION['data']="ទិន្នន័យមានន័យរួចហើយ!";
				}else{
					$table = "tbl_school";
					$fields = array(
										"School_ID",
										"School_NameKH",
										"School_NameEN",
										"parent_school",
										"school_type",
										"School_Province",
										"School_District",
										"School_Commune",
										"School_Village"
									);
					$values = array(
										$School_ID,
										$School_NameKH,
										$School_NameEN,
										$parent_school,
										$school_type,
										$province_id,
										$District_Name,
										$Commune_Name,
										$Village_Name
									);
					$obj->fun_insertdata($table,$fields,$values);	
					$_SESSION['insert']="បញ្ចូលដោយដោយជោគជ័យ";
				}

			}else{
				$table = "tbl_school";
				$fields = array(
									"School_ID",
									"School_NameKH",
									"School_NameEN",
									"parent_school",
									"school_type",
									"School_Province",
									"School_District",
									"School_Commune",
									"School_Village"
								);
				$values = array(
									$School_ID,
									$School_NameKH,
									$School_NameEN,
									$parent_school,
									$school_type,
									$province_id,
									$District_Name,
									$Commune_Name,
									$Village_Name
								);
				$fid = 'ID_School';
				$vid = $ID_School;
				$obj->fun_updatedata($table,$fields,$values,$fid,$vid = $fid);
				$_SESSION['update']="ត្រូវបានកែប្រែដោយជោគជ័យ!";
			}
			$result1 = $obj->pro_sql;
			if($result1) {
				echo json_encode($result1);
			} else {
				echo "Error: " . $sql . "" . mysqli_error($obj->fun_link());
		}

	}

	// if(count($_POST) > 0) {
	// 	// Collect form data
	// 	$ID_School = $_POST['ID_School'];
	// 	$School_ID = $_POST['School_ID'];
	// 	$School_NameKH = $_POST['School_NameKH'];
	// 	$School_NameEN = $_POST['School_NameEN'];
	// 	$parent_school=$_POST['parent_school'];
	// 	$school_type=$_POST['school_type'];
	// 	$province_id = $_POST['province_id'];
	// 	$District_Name = $_POST['District_Name'];
	// 	$Commune_Name = $_POST['Commune_Name'];
	// 	$Village_Name = $_POST['Village_Name'];

	// 	// Check if this is an insert or update operation
	// 	if (empty($ID_School)) {  // Insert operation
	// 		$result = $obj->fun_checkdata("tbl_school", "School_ID", $School_ID);
			
	// 		if ($result) {
	// 			$_SESSION['data'] = "Already Exists!";
	// 		} else {
	// 			$table = "tbl_school";
	// 			$fields = array("School_ID", "School_NameKH", "School_NameEN","parent_school","school_type", "School_Province", "School_District", "School_Commune", "School_Village");
	// 			$values = array($School_ID, $School_NameKH, $School_NameEN,$parent_school,$school_type, $province_id, $District_Name, $Commune_Name, $Village_Name);
	// 			$obj->fun_insertdata($table, $fields, $values);  
	// 			$_SESSION['insert'] = "បញ្ចូលដោយជោគជ័យ";  // Insert success message
	// 		}

	// 	} else {  // Update operation
	// 		$table = "tbl_school";
	// 		$fields = array("School_ID", "School_NameKH", "School_NameEN","parent_school","school_type", "School_Province", "School_District", "School_Commune", "School_Village");
	// 		$values = array($School_ID, $School_NameKH, $School_NameEN,$parent_school,$school_type, $province_id, $District_Name, $Commune_Name, $Village_Name);
	// 		$fid = 'ID_School';
	// 		$vid = $ID_School;
	// 		$obj->fun_updatedata($table, $fields, $values, $fid, $vid);  // Update data
	// 		$_SESSION['update'] = "ត្រូវបានកែប្រែដោយជោគជ័យ!";  // Update success message
	// 	}

	// 	// Handle the SQL execution result
	// 	$result1 = $obj->pro_sql;  // Assuming pro_sql holds the result

	// 	if($result1) {
	// 		echo json_encode(['status' => 'success', 'data' => $result1]);
	// 	} else {
	// 		// Correct the error handling with appropriate methods
	// 		echo json_encode(['status' => 'error', 'message' => mysqli_error($obj->fun_link())]);
	// 	}
	// }



	// if(count($_POST) > 0) {
	// 	// Collect form data
	// 	$ID_School = $_POST['ID_School'];
	// 	$School_ID = $_POST['School_ID'];
	// 	$School_NameKH = $_POST['School_NameKH'];
	// 	$School_NameEN = $_POST['School_NameEN'];
	// 	$School_Parent = $_POST['parent_school'];
	// 	$School_Type = $_POST['school_type'];
	// 	$province_id = $_POST['province_id'];
	// 	$District_Name = $_POST['District_Name'];
	// 	$Commune_Name = $_POST['Commune_Name'];
	// 	$Village_Name = $_POST['Village_Name'];
	
	// 	// Check if this is an insert or update operation
	// 	if (empty($ID_School)) {  // Insert operation
	// 		$result = $obj->fun_checkdata("tbl_school", "School_ID", $School_ID);
			
	// 		if ($result) {
	// 			$_SESSION['data'] = "ទិន្នន័យមានរួចហើយ!";
	// 		} else {
	// 			$table = "tbl_school";
	// 			$fields = array("School_ID", "School_NameKH", "School_NameEN", "parent_school", "school_type", "School_Province", "School_District", "School_Commune", "School_Village");
	// 			$values = array($School_ID, $School_NameKH, $School_NameEN,$School_Parent,$School_Type, $province_id, $District_Name, $Commune_Name, $Village_Name);
	
	// 			// Insert data and check if successful
	// 			$insert_result = $obj->fun_insertdata($table, $fields, $values);  
	// 			if($insert_result) {
	// 				$_SESSION['insert'] = "បញ្ចូលដោយជោគជ័យ";  // Insert success message
	// 			} else {
	// 				$_SESSION['insert'] = "Insert failed: " . mysqli_error($obj->fun_link());
	// 			}
	// 		}
	
	// 	} else {  // Update operation
	// 		$table = "tbl_school";
	// 		$fields = array("School_ID", "School_NameKH", "School_NameEN", "parent_school", "school_type", "School_Province", "School_District", "School_Commune", "School_Village");
	// 		$values = array($School_ID, $School_NameKH, $School_NameEN,$School_Parent,$School_Type, $province_id, $District_Name, $Commune_Name, $Village_Name);
	// 		$fid = 'ID_School';
	// 		$vid = $ID_School;
	
	// 		// Update data and check if successful
	// 		$update_result = $obj->fun_updatedata($table, $fields, $values, $fid, $vid);  
	// 		if($update_result) {
	// 			$_SESSION['update'] = "ត្រូវបានកែប្រែដោយជោគជ័យ!";  // Update success message
	// 		} else {
	// 			$_SESSION['update'] = "Update failed: " . mysqli_error($obj->fun_link());
	// 		}
	// 	}
	
	// 	// Handle the SQL execution result
	// 	$result1 = $obj->pro_sql;  // Assuming pro_sql holds the result
	
	// 	if($result1) {
	// 		echo json_encode(['status' => 'success', 'data' => $result1]);
	// 	} else {
	// 		echo json_encode(['status' => 'error', 'message' => mysqli_error($obj->fun_link())]);
	// 	}
	// }

	// error_log(print_r($values, true));
	

?>