<?php
include 'connection.php';
$id = $_POST['id'];
$query="SELECT * from tbl_users WHERE User_ID = '" . $id . "'";
$result = mysqli_query($conn,$query);
$cust = mysqli_fetch_array($result);
if($cust) {
echo json_encode($cust);
} else {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
?>