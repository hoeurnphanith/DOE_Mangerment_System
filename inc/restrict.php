<?php
	//Test Session
	if(!isset($_SESSION['User_Name']) || !isset($_SESSION['pwd'])){
		//Redirect Page
		header('location:index.php');
	}else{
		$username = $_SESSION['User_Name'];
		$pwd = $_SESSION['pwd'];
		//Check User Name and Pwd
		$result = $obj->fun_checkuserpwd($username,$pwd);
		if(!$result){
			//Redirect Page
			header('location:index.php');
		}
	}
?>