<?php
    include 'connection.php';
    $id = $_POST['id'];
    $query="SELECT * from session WHERE session_id = '" . $id . "'";
    $result = mysqli_query($conn,$query);
    $cust = mysqli_fetch_array($result);
    if($cust) {
    echo json_encode($cust);
    } else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
    }
?>