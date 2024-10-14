<?php
session_start();
include 'connection.php';
$id = $_POST['id'];

$query = "DELETE FROM tbl_attandance WHERE Attandance_ID ='" . $id . "'";
$result = mysqli_query($conn, $query);
if($result) {
	
echo json_encode($result);
$_SESSION['delete']="Deleted Success";
} else {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
?>