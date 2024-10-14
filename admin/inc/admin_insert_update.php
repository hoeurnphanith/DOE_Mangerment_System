<?php
session_start();
//Import class.php
require_once('classdoe.php');
 //Instance Object
$obj = new myclass;
?>
<?php
if(count($_POST)>0){

	$ID=$_POST['ID'];
	$DOE_ID=$_POST['DOE_ID'];
	$Full_Name=$_POST['Full_Name'];
	$EN_Fullname=$_POST['EN_Fullname'];
	$Gender=$_POST['Gender'];
	$Dob=$_POST['Dob'];
	$Pob_Address=$_POST['Pob_Address'];
    $Date_of_startwork=$_POST['Date_of_startwork'];
    $Date_of_certi=$_POST['Date_of_certi'];
    $type_of_framework=$_POST['type_of_framework'];
    $Lastdate_of_certi=$_POST['Lastdate_of_certi'];
    $Level_of_framework=$_POST['Level_of_framework'];
    $Unit=$_POST['Unit'];
    $Edu_Level=$_POST['Edu_Level'];
    $Vocational_Level=$_POST['Vocational_Level'];
    $Position=$_POST['Position'];
    $family_status=$_POST['family_status'];
    $Current_Address=$_POST['Current_Address'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $Tel=$_POST['Tel'];
    $Role=$_POST['Role'];
    $Date_Created=$_POST['Date_Created'];

	$DOE_ID=mysqli_real_escape_string($obj->fun_link(),$_POST['DOE_ID']);
	$Password=md5($_POST['Password']);// covert string to md5


	if(empty($_POST['ID'])){

		$result = $obj->fun_checkdata("tbl_doe","DOE_ID","$DOE_ID");

		if($result){
			$_SESSION['data']="មានរួចហើយ!";
		}else{
		$table = "tbl_doe";
		$fields = array("DOE_ID","Full_Name","EN_Fullname","Gender","Dob","Pob_Address","Date_of_startwork",
                       "Date_of_certi","type_of_framework","Lastdate_of_certi","Level_of_framework","Unit",
                       "Edu_Level","Vocational_Level","Position","family_status","Current_Address",
                       "Email","Password","Tel","Role","Date_Created");
		$values= array($DOE_ID,$Full_Name,$EN_Fullname,$Gender,$Dob,$Pob_Address,$Date_of_startwork,
                      $Date_of_certi,$type_of_framework,$Lastdate_of_certi,$Level_of_framework,$Unit,
                      $Edu_Level,$Vocational_Level,$Position,$family_status,$Current_Address,$Email,
                      $Password,$Tel,$Role,$Date_Created);
            
		$obj->fun_insertdata($table,$fields,$values);	
		$_SESSION['insert']="បានបញ្ចូល";
        
		}

	}else{

		$table = "tbl_doe";
		$fields = array("DOE_ID","Full_Name","EN_Fullname","Gender","Dob","Pob_Address","Date_of_startwork",
                       "Date_of_certi","type_of_framework","Lastdate_of_certi","Level_of_framework","Unit",
                       "Edu_Level","Edu_Level","Vocational_Level","Position","family_status","Current_Address",
                       "Email","Password","Tel","Date_Created");
		$values=array($DOE_ID,$Full_Name,$EN_Fullname,$Gender,$dob,$Pob_Address,$Date_of_startwork,
                      $Date_of_certi,$type_of_framework,$Lastdate_of_certi,$Level_of_framework,$Unit,
                      $Edu_Level,$Vocational_Level,$Position,$family_status,$Current_Address,$Email,
                      $Password,$Tel,$Date_Created);
		
		$fid = 'ID';
		$vid =$_POST['ID'];
		$obj->fun_updatedata($table,$fields,$values,$fid,$vid);
		$_SESSION['update']="កែប្រែបានជោគជ័យ";
	}

	$result1 = $obj->pro_sql;
	if($result1) {
		echo json_encode($result1);
	} else {
		echo "Error: " . $sql . "" . mysqli_error($obj->fun_link);
	}

}
?>