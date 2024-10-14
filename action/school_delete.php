<?php
    session_start();
    include 'connection.php';
    $id = $_POST['id'];
    $query = "DELETE FROM tbl_school WHERE ID_School ='" . $id . "'";
    $result = mysqli_query($conn, $query);
    if($result) {
    echo json_encode($result);
    $_SESSION['delete']="លុបដោយជោយជោគជ័យ";
    } else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    
    // session_start();
    // include 'connection.php';

    // // Use prepared statements to prevent SQL injection
    // $id = $_POST['id'];

    // $query = "DELETE FROM tbl_school WHERE School_ID = ?";
    // $stmt = mysqli_prepare($conn, $query);
    // mysqli_stmt_bind_param($stmt, "i", $id); // Assuming School_ID is an integer

    // $result = mysqli_stmt_execute($stmt);

    // if($result) {
    //     echo json_encode(['status' => 'success']);
    //     $_SESSION['delete'] = "លុបដោយជោគជ័យ"; // Set the success message
    // } else {
    //     echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]); // Correct the error handling
    // }

    // mysqli_stmt_close($stmt);
    // mysqli_close($conn); // Always close the connection
    

?>