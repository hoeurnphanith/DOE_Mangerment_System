<?php
session_start();
include 'connection.php';
$id = $_POST['id'];
$query = "DELETE FROM tbl_student WHERE ID_Student ='" . $id . "'";
$result = mysqli_query($conn, $query);
if($result) {

	
echo json_encode($result);
$_SESSION['delete']="ត្រូវបានលុយដោយជោគជ័យ";
} else {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
?>