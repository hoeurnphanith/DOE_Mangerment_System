<?php
session_start();
//Import class.php
require_once('../inc/classdoe.php');
  //Instance Object
$obj = new myclass;
?>
<?php
include 'connection.php';
$id = $_POST['id'];
$query="SELECT * from tbl_commune WHERE Commune_ID = '" . $id . "'";
$result = mysqli_query($conn,$query);
$cust = mysqli_fetch_array($result);
if($cust) {
	echo json_encode($cust);
} else {
	echo "Error: " . $sql . "" . mysqli_error($conn);
}
?>
