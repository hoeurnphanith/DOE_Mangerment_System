<?php
session_start();
include 'connection.php';
$id = $_POST['id'];
$_SESSION['id']=$_POST['id'];
$query="SELECT * from tbl_student WHERE ID_Student = '" . $id . "'";
$result = mysqli_query($conn,$query);
$cust = mysqli_fetch_array($result);
if($cust) {
echo json_encode($cust);
} else {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
?>