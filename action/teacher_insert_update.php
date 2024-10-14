<?php
    session_start();
    //Import class.php
    require_once('../inc/classdoe.php');
    //Instance Object
    $obj = new myclass;
?>
 <?php
if(count($_POST)>0){
    $ID_Teacher=$_POST['ID_Teacher'];
    $Teacher_ID=$_POST['Teacher_ID'];
	$School_ID=$_POST['School_ID'];
	$Teacher_NameKH=$_POST['Teacher_NameKH'];
	$Teacher_NameEN=$_POST['Teacher_NameEN'];
	$Sex=$_POST['gender'];
	$DOB=$_POST['DOB'];
    $Teacher_Position=$_POST['Teacher_Position'];
	$Start_Date_Work=$_POST['Start_Date_Work'];
    $Teacher_Framework=$_POST['Teacher_Framework'];
	$Date_Certi=$_POST['Date_Certi'];
	$Lavel_Type=$_POST['Lavel_Type'];
	$last_Certivicate=$_POST['last_Certivicate'];
    
    $POB_Province=$_POST['POB_Province'];
	$POB_District=$_POST['POB_District'];
	$POB_Commune=$_POST['POB_Commune'];
	$POB_Village=$_POST['POB_Village'];
    
    $Province_ID=$_POST['province_id'];
	$district_ID=$_POST['District_Name'];
	$commune_ID=$_POST['Commune_Name'];
	$village_ID=$_POST['Village_Name'];
	$Relationship=$_POST['Relationship'];
    $Subject1=$_POST['Subject1'];
	$Subject2=$_POST['Subject2'];
	$phone=$_POST['phone'];


	if(empty($_POST['ID_Teacher'])){

		$result = $obj->fun_check_twocolumn($Teacher_ID,$School_ID);

		if($result){
			$_SESSION['data']="Already Exited!";
		}else{
		$table = "tbl_teacher";
		$fields = array("Teacher_ID","School_ID","Teacher_NameKH","Teacher_NameEN","Sex","DOB","Start_Date_Work","Date_Certi","Teacher_Framework","Teacher_Position","Lavel_Type","Subject1","Subject2","phone","last_Certivicate",
        "Province_ID","District_ID","Commune_ID","Village_ID","POB_Province","POB_District","POB_Commune",
        "POB_Village","Relationship");
		$values=array($Teacher_ID,$School_ID,$Teacher_NameKH,$Teacher_NameEN,$Sex,$DOB,$Start_Date_Work,$Date_Certi,$Teacher_Framework,$Teacher_Position,$Lavel_Type,$Subject1,$Subject2,$phone,$last_Certivicate,$Province_ID,$district_ID,$commune_ID,$village_ID,$POB_Province,$POB_District,$POB_Commune,$POB_Village,$Relationship);
		
        $obj->fun_insertdata($table,$fields,$values);	
		$_SESSION['insert']="បញ្ចូលដោយដោយជោគជ័យ";
		}
	}else{
		$table = "tbl_teacher";
		$fields = array("Teacher_ID","School_ID","Teacher_NameKH","Teacher_NameEN","Sex","DOB","Start_Date_Work","Date_Certi","Teacher_Framework","Teacher_Position","Lavel_Type","Subject1","Subject2","phone","last_Certivicate",
        "Province_ID","District_ID","Commune_ID","Village_ID","POB_Province","POB_District","POB_Commune",
        "POB_Village","Relationship");
		$values=array($Teacher_ID,$School_ID,$Teacher_NameKH,$Teacher_NameEN,$Sex,$DOB,$Start_Date_Work,$Date_Certi,$Teacher_Framework,$Teacher_Position,$Lavel_Type,$Subject1,$Subject2,$phone,$last_Certivicate,$Province_ID,$district_ID,$commune_ID,$village_ID,$POB_Province,$POB_District,$POB_Commune,$POB_Village,$Relationship);
		$fid ='ID_Teacher';
		$vid = $_POST['ID_Teacher'];
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



// if (count($_POST) > 0) {
//     // Validate if important fields are set
//     $ID_Teacher = isset($_POST['ID_Teacher']) ? $_POST['ID_Teacher'] : null;
//     $Teacher_ID = isset($_POST['Teacher_ID']) ? $_POST['Teacher_ID'] : null;
//     $School_ID = isset($_POST['School_ID']) ? $_POST['School_ID'] : null;
    
//     // Make sure School_ID and Teacher_ID are provided, otherwise handle errors
//     if (!$Teacher_ID || !$School_ID) {
//         echo "Error: Teacher_ID or School_ID is missing.";
//         exit;
//     }

//     $Teacher_NameKH = $_POST['Teacher_NameKH'] ?? '';
//     $Teacher_NameEN = $_POST['Teacher_NameEN'] ?? '';
//     $Sex = $_POST['gender'] ?? '';
//     $DOB = $_POST['DOB'] ?? '';
//     $Teacher_Position = $_POST['Teacher_Position'] ?? '';
//     $Start_Date_Work = $_POST['Start_Date_Work'] ?? '';
//     $Teacher_Framework = $_POST['Teacher_Framework'] ?? '';
//     $Date_Certi = $_POST['Date_Certi'] ?? '';
//     $Lavel_Type = $_POST['Lavel_Type'] ?? '';
//     $last_Certivicate = $_POST['last_Certivicate'] ?? '';
//     $POB_Province = $_POST['POB_Province'] ?? '';
//     $POB_District = $_POST['POB_District'] ?? '';
//     $POB_Commune = $_POST['POB_Commune'] ?? '';
//     $POB_Village = $_POST['POB_Village'] ?? '';
//     $Province_ID = $_POST['province_id'] ?? '';
//     $district_ID = $_POST['District_Name'] ?? '';
//     $commune_ID = $_POST['Commune_Name'] ?? '';
//     $village_ID = $_POST['Village_Name'] ?? '';
//     $Relationship = $_POST['Relationship'] ?? '';
//     $Subject1 = $_POST['Subject1'] ?? '';
//     $Subject2 = $_POST['Subject2'] ?? '';
//     $phone = $_POST['phone'] ?? '';

//     // Define the table and fields
//     $table = "tbl_teacher";
//     $fields = array(
//         "Teacher_ID", "School_ID", "Teacher_NameKH", "Teacher_NameEN", "Sex", "DOB", 
//         "Start_Date_Work", "Date_Certi", "Teacher_Framework", "Teacher_Position", 
//         "Lavel_Type", "Subject1", "Subject2", "phone", "last_Certivicate", 
//         "Province_ID", "District_ID", "Commune_ID", "Village_ID", 
//         "POB_Province", "POB_District", "POB_Commune", "POB_Village", "Relationship"
//     );
//     $values = array(
//         $Teacher_ID, $School_ID, $Teacher_NameKH, $Teacher_NameEN, $Sex, $DOB, 
//         $Start_Date_Work, $Date_Certi, $Teacher_Framework, $Teacher_Position, 
//         $Lavel_Type, $Subject1, $Subject2, $phone, $last_Certivicate, 
//         $Province_ID, $district_ID, $commune_ID, $village_ID, 
//         $POB_Province, $POB_District, $POB_Commune, $POB_Village, $Relationship
//     );

//     // Insert or Update based on the presence of ID_Teacher
//     if (empty($ID_Teacher)) {
//         // Check if the Teacher_ID and School_ID combination already exists
//         $result = $obj->fun_check_twocolumn($Teacher_ID, $School_ID);
        
//         if ($result) {
//             $_SESSION['data'] = "Already Exists!";
//         } else {
//             // Insert new teacher record
//             $obj->fun_insertdata($table, $fields, $values);
//             $_SESSION['insert'] = "បញ្ចូលដោយដោយជោគជ័យ"; // Inserted successfully
//         }
//     } else {
//         // Update the existing teacher record
//         $fid = 'ID_Teacher';
//         $vid = $ID_Teacher;
//         $obj->fun_updatedata($table, $fields, $values, $fid, $vid);
//         $_SESSION['update'] = "ត្រូវបានកែប្រែដោយជោគជ័យ"; // Updated successfully
//     }

//     // Check for SQL execution result
//     $result1 = $obj->pro_sql;
//     if ($result1) {
//         echo json_encode($result1);
//     } else {
//         echo "Error: " . mysqli_error($obj->fun_link());
//     }
// }


?>