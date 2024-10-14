<?php
    // include 'connection.php';
    // $id = $_POST['id'];
    // $query="SELECT 
    //                 t.ID_Teacher, 
    //                 t.Teacher_ID, 
    //                 t.School_ID, 
    //                 t.Teacher_NameKH, 
    //                 t.Teacher_NameEN, 
    //                 t.Sex, 
    //                 t.DOB, 
    //                 t.Start_Date_Work, 
    //                 t.Date_Certi, 
    //                 t.Teacher_Framework, 
    //                 t.Teacher_Position, 
    //                 t.Lavel_Type, 
    //                 t.Subject1, 
    //                 t.Subject2, 
    //                 t.phone, 
    //                 t.last_Certivicate, 
    //                 t.Province_ID, 
    //                 t.District_ID, 
    //                 t.Commune_ID, 
    //                 t.Village_ID, 
    //                 t.POB_Province, 
    //                 t.POB_District, 
    //                 t.POB_Commune, 
    //                 t.POB_Village, 
    //                 t.Relationship, 
    //                 t.photos,
    //                 d.District_Name,
    //                 c.Commune_Name,
    //                 v.Village_Name
    //             FROM 
    //                 tbl_teacher AS t
    //             INNER JOIN 
    //                 tbl_district AS d 
    //             ON 
    //                 t.District_ID = d.District_ID
    //             INNER JOIN 
    //                 tbl_commune AS c 
    //             ON 
    //                 t.Commune_ID = c.Commune_ID
    //             INNER JOIN 
    //                 tbl_village AS v 
    //             ON 
    //                 t.Village_ID = v.Village_ID
    //             WHERE 
    //                 t.ID_Teacher = ?";

    // $result = mysqli_query($conn,$query);
    // $cust = mysqli_fetch_array($result);
    // if($cust) {
    // echo json_encode($cust);
    // } else {
    // echo "Error: " . $sql . "" . mysqli_error($conn);
    // }


    
    include 'connection.php';  // Assuming this file contains the database connection

    // Retrieve 'id' from POST request
    $id = $_POST['id'];

    // Prepare the SQL query using prepared statements to prevent SQL injection
    $query = "
        SELECT 
            t.ID_Teacher, 
            t.Teacher_ID, 
            t.School_ID, 
            t.Teacher_NameKH, 
            t.Teacher_NameEN, 
            t.Sex, 
            t.DOB, 
            t.Start_Date_Work, 
            t.Date_Certi, 
            t.Teacher_Framework, 
            t.Teacher_Position, 
            t.Lavel_Type, 
            t.Subject1, 
            t.Subject2, 
            t.phone, 
            t.last_Certivicate, 
            t.Province_ID, 
            t.District_ID, 
            t.Commune_ID, 
            t.Village_ID, 
            t.POB_Province, 
            t.POB_District, 
            t.POB_Commune, 
            t.POB_Village, 
            t.Relationship, 
            t.photos,
            d.District_Name,
            c.Commune_Name,
            v.Village_Name
        FROM tbl_teacher AS t
        INNER JOIN tbl_district AS d ON t.District_ID = d.District_ID
        INNER JOIN tbl_commune AS c ON t.Commune_ID = c.Commune_ID
        INNER JOIN tbl_village AS v ON t.Village_ID = v.Village_ID
        WHERE t.ID_Teacher = ?";

    // Prepare the statement
    if ($stmt = mysqli_prepare($conn, $query)) {
        
        // Bind the 'id' parameter (assuming it's an integer)
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        // Execute the statement
        mysqli_stmt_execute($stmt);
        
        // Get the result set
        $result = mysqli_stmt_get_result($stmt);

        // Fetch the result as an associative array
        $cust = mysqli_fetch_assoc($result);
        
        // If the query returned a result
        if ($cust) {
            // Output the result as JSON
            echo json_encode($cust);
        } else {
            // No result found, return an appropriate message
            echo json_encode(["error" => "No record found"]);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle errors in preparing the statement
        echo "Error: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);

//     include 'connection.php';  // Assuming this file contains the database connection

// // Check if 'id' is set in POST request
// if (isset($_POST['id'])) {
//     $id = $_POST['id'];

//     // Prepare the SQL query using prepared statements to prevent SQL injection
//     $query = "
//         SELECT 
//             t.ID_Teacher, 
//             t.Teacher_ID, 
//             t.School_ID, 
//             t.Teacher_NameKH, 
//             t.Teacher_NameEN, 
//             t.Sex, 
//             t.DOB, 
//             t.Start_Date_Work, 
//             t.Date_Certi, 
//             t.Teacher_Framework, 
//             t.Teacher_Position, 
//             t.Lavel_Type, 
//             t.Subject1, 
//             t.Subject2, 
//             t.phone, 
//             t.last_Certivicate, 
//             t.Province_ID, 
//             t.District_ID, 
//             t.Commune_ID, 
//             t.Village_ID, 
//             t.POB_Province, 
//             t.POB_District, 
//             t.POB_Commune, 
//             t.POB_Village, 
//             t.Relationship, 
//             t.photos,
//             d.District_Name,
//             c.Commune_Name,
//             v.Village_Name
//         FROM tbl_teacher AS t
//         INNER JOIN tbl_district AS d ON t.District_ID = d.District_ID
//         INNER JOIN tbl_commune AS c ON t.Commune_ID = c.Commune_ID
//         INNER JOIN tbl_village AS v ON t.Village_ID = v.Village_ID
//         WHERE t.ID_Teacher = ?";

//     // Prepare the statement
//     if ($stmt = mysqli_prepare($conn, $query)) {
        
//         // Bind the 'id' parameter (assuming it's an integer)
//         mysqli_stmt_bind_param($stmt, "i", $id);
        
//         // Execute the statement
//         mysqli_stmt_execute($stmt);
        
//         // Get the result set
//         $result = mysqli_stmt_get_result($stmt);

//         // Fetch the result as an associative array
//         $cust = mysqli_fetch_assoc($result);
        
//         // Set response header to return JSON
//         header('Content-Type: application/json');
        
//         // If the query returned a result
//         if ($cust) {
//             // Output the result as JSON
//             echo json_encode($cust);
//         } else {
//             // No result found, return an appropriate message
//             echo json_encode(["error" => "No record found"]);
//         }

//         // Close the statement
//         mysqli_stmt_close($stmt);
//     } else {
//         // Handle errors in preparing the statement
//         echo json_encode(["error" => "Error preparing statement: " . mysqli_error($conn)]);
//     }
// } else {
//     // Handle case where 'id' is not set
//     echo json_encode(["error" => "'id' is missing from the request"]);
// }

// // Close the connection
// mysqli_close($conn);


?>