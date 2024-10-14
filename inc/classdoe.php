<?php
	class myclass{
		//Properties
		var $pro_link, $pro_sql, $pro_query, $pro_count,$pro_result,$pro_arr;
		var $pro_records,$pro_target;
		//Method
		//Open Connection
		function fun_link(){
			$this->pro_link = mysqli_connect("localhost","root","","doe_managementsystem");
			
			return $this->pro_link;

		}
		//Close Connection
		function fun_close(){
			mysqli_close($this->pro_link);
		}
		//Check Existing User Name and Password
		function fun_checkuserpwd($arg_user,$arg_pwd){
			//Create Sql Statement
			$this->pro_sql = "SELECT * FROM tbl_users WHERE
 			 User_Name='$arg_user' AND pwd='$arg_pwd'";
			//Command Sql Statement to MySQL Server
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			//Count Record
			$this->pro_count = mysqli_num_rows($this->pro_query);
			if($this->pro_count == 1){
				$this->pro_result =  true;
			}else{
				$this->pro_result = false;
			}
			return $this->pro_result;
		}

		//Check Admin Existing User Name and Password
		function fun_checkadminuserpwd($arg_user,$arg_pwd){
			//Create Sql Statement
			$this->pro_sql = "SELECT * FROM tbl_doe WHERE
 			 DOE_ID='$arg_user' AND Password='$arg_pwd'";
			//Command Sql Statement to MySQL Server
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			//Count Record
			$this->pro_count = mysqli_num_rows($this->pro_query);
			if($this->pro_count == 1){
				$this->pro_result =  true;
			}else{
				$this->pro_result = false;
			}
			return $this->pro_result;
		}
		//Check 2 Column Existing table Student
		function fun_checktwocolumn($arg_user,$arg_pwd){
			//Create Sql Statement
			$this->pro_sql = "SELECT * FROM tbl_student WHERE
 			 Student_ID='$arg_user' AND School_ID='$arg_pwd'";
			//Command Sql Statement to MySQL Server
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			//Count Record
			$this->pro_count = mysqli_num_rows($this->pro_query);
			if($this->pro_count == 1){
				$this->pro_result =  true;
			}else{
				$this->pro_result = false;
			}
			return $this->pro_result;
		}
		//Check 2 Column Existing table teacher
		function fun_check_twocolumn($arg_user,$arg_pwd){
			//Create Sql Statement
			$this->pro_sql = "SELECT * FROM tbl_teacher WHERE
 			 Teacher_ID='$arg_user' AND School_ID='$arg_pwd'";
			//Command Sql Statement to MySQL Server
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			//Count Record
			$this->pro_count = mysqli_num_rows($this->pro_query);
			if($this->pro_count == 1){
				$this->pro_result =  true;
			}else{
				$this->pro_result = false;
			}
			return $this->pro_result;
		}

		//Check 3 Column Existing table Student
		function fun_checkthreecolumn($arg_user,$arg_pwd,$arg_pwd1,$arg_pwd2){
			//Create Sql Statement
			$this->pro_sql = "SELECT * FROM tbl_classroom WHERE
 			 Grade_ID='$arg_user' AND Classroom_Name='$arg_pwd' AND Years_Study='$arg_pwd1' AND School_ID='$arg_pwd2'";
			//Command Sql Statement to MySQL Server
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			//Count Record
			$this->pro_count = mysqli_num_rows($this->pro_query);
			if($this->pro_count == 1){
				$this->pro_result =  true;
			}else{
				$this->pro_result = false;
			}
			return $this->pro_result;
		}
        
		//Check Existing Field Name and Field ID
		function fun_checknameid($arg_table,$arg_fname,$arg_fid,$arg_fnameval,$arg_fidval){
			//Create Sql Statement
			$this->pro_sql = "SELECT * FROM $arg_table WHERE
			$arg_fname='$arg_fnameval' AND $arg_fid <>'$arg_fidval'";
			//Command Sql Statement to MySQL Server
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			//Count Record
			$this->pro_count = mysqli_num_rows($this->pro_query);
			if($this->pro_count == 1){
				$this->pro_result =  true;
			}else{
				$this->pro_result = false;
			}
			return $this->pro_result;
		}

		//Display Data
		function fun_displaydata($arg_table){
			//Define Empty Array
			$this->pro_arr = array();
			$this->pro_sql = "SELECT * FROM $arg_table ";
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			while($this->pro_records = mysqli_fetch_assoc($this->pro_query)){
				array_push($this->pro_arr,$this->pro_records);
			}
			return $this->pro_arr;
		}
		
		//Display User Admin
		function fun_displayAdmin($arg_table){
			//Define Empty Array
			$this->pro_arr = array();
			$this->pro_sql = "SELECT * FROM $arg_table WHERE User_Type='doe'";
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			while($this->pro_records = mysqli_fetch_assoc($this->pro_query)){
				array_push($this->pro_arr,$this->pro_records);
			}
			return $this->pro_arr;
		}
		//Display User school
		function fun_displaySchool($arg_table){
			//Define Empty Array
			$this->pro_arr = array();
			$this->pro_sql = "SELECT * FROM $arg_table WHERE User_Type='school'";
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			while($this->pro_records = mysqli_fetch_assoc($this->pro_query)){
				array_push($this->pro_arr,$this->pro_records);
			}
			return $this->pro_arr;
		}


		//Count Products
		function fun_countpro($arg_catid){
			$this->pro_sql = "SELECT * FROM tbl_products WHERE cat_id=$arg_catid";
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			$this->pro_count = mysqli_num_rows($this->pro_query);
			return $this->pro_count;
		}
		
		//Lookup
		function fun_lookup($arg_table,$arg_fieldid,$arg_valueid){
			$this->pro_sql = "SELECT * FROM $arg_table WHERE $arg_fieldid=$arg_valueid";
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			$this->pro_myrow = mysqli_fetch_assoc($this->pro_query);
			return $this->pro_myrow;
		}
		
		//Check Existing Data
		function fun_checkdata($arg_table,$arg_fieldname,$arg_value){
			//Create Sql Statement
			$this->pro_sql = "SELECT * FROM $arg_table WHERE $arg_fieldname='$arg_value'";
			//Command Sql Statement to MySQL Server
			$this->pro_query = mysqli_query($this->fun_link(),$this->pro_sql);
			//Count Record
			$this->pro_count = mysqli_num_rows($this->pro_query);
			if($this->pro_count == 1){
				$this->pro_result =  true;
			}else{
				$this->pro_result = false;
			}
			return $this->pro_result;
		}
		
		function fun_insertdata($arg_table,$arg_arrfields,$arg_arrvalues){
			$this->pro_count = count($arg_arrfields);
			$this->pro_sql = "INSERT INTO $arg_table(";
			for($x=0;$x<$this->pro_count;$x++){
				$this->pro_sql .= $arg_arrfields[$x];
				if($x < ($this->pro_count - 1)){
					$this->pro_sql .= ",";
				}else{
					$this->pro_sql .= ") VALUES(";
				}
			}
			for($x=0;$x<$this->pro_count;$x++){
				$this->pro_sql .= "'$arg_arrvalues[$x]'";
				if($x < ($this->pro_count - 1)){
					$this->pro_sql .= ",";
				}else{
					$this->pro_sql .= ")";
				}
			}
			mysqli_query($this->fun_link(),$this->pro_sql);
			//return $this->pro_sql;
		}
		
		function fun_updatedata($table,$field,$value,$fid,$vid){
			$this->pro_count = count($field);
			$this->pro_sql = "Update $table SET ";
			for($x=0;$x<$this->pro_count;$x++){
				$this->pro_sql .= "$field[$x]='$value[$x]'";	
				if($x <($this->pro_count-1)){
					$this->pro_sql .= ",";
				}else{
					$this->pro_sql .= " WHERE $fid=$vid";
				}
			}
			mysqli_query($this->fun_link(),$this->pro_sql);
		}
		
		//function upload image
	  function f_upload_img($field,$width,$folder){
		if(trim($_FILES[$field]["tmp_name"]) != "")
		{
		$images = $_FILES[$field]["tmp_name"];
		$new_images = "Thum_".$_FILES[$field]["name"];
		//copy($_FILES["fileUpload"]["tmp_name"],"MyResize/".$_FILES["fileUpload"]["name"]);
		//$width=100; //*** Fix Width & Heigh (Autu caculate) ***//
		$size=GetimageSize($images);
		$height=round($width*$size[1]/$size[0]);
		$images_orig = ImageCreateFromJPEG($images);
		$photoX = ImagesX($images_orig);
		$photoY = ImagesY($images_orig);
		$images_fin = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
		ImageJPEG($images_fin,$folder."/".$new_images);
		ImageDestroy($images_orig);
		ImageDestroy($images_fin);
		}
		return $new_images;
	  }	
	  
	  //Delete Data
	  function fun_deletedata($arg_table, $arg_fieldid,$arg_valueid){
			$this->pro_sql = "DELETE FROM $arg_table WHERE $arg_fieldid=$arg_valueid";
			//Command Sql Statement to MySQL Server
			mysqli_query($this->fun_link(),$this->pro_sql);
	  }
	  
	  //Delete Image
	  function fun_deleteimage($arg_imgname){
			$this->pro_target = "images/$arg_imgname";
			if(file_exists($this->pro_target)){
				if($arg_imgname != "default.jpg"){
					unlink($this->pro_target);
				}
			}
	  }
	  

	}
?>