<?php
	session_start();
	//Import class.php
	require_once('../inc/classdoe.php');
	//Instance Object
	$obj = new myclass;
?>
<?php
	// include 'connection.php';
	// $id = $_POST['id'];
	// $query="SELECT 
	// 						s.School_ID, 
	// 						s.School_NameEN, 
	// 						s.School_NameKH, 
	// 						s.School_Commune, 
	// 						s.School_District, 
	// 						s.School_Province, 
	// 						s.School_Village, 
	// 						s.parent_school, 
	// 						s.school_type,
	// 						d.District_Name,       -- From tbl_district
	// 						c.Commune_Name,        -- From tbl_commune
	// 						v.Village_Name         -- From tbl_village
	// 					FROM 
	// 						tbl_school AS s
	// 					INNER JOIN 
	// 						tbl_district AS d 
	// 					ON 
	// 						s.School_District = d.District_ID  -- Assuming `School_District` corresponds to `District_ID`
	// 					INNER JOIN 
	// 						tbl_commune AS c 
	// 					ON 
	// 						s.School_Commune = c.Commune_ID    -- Assuming `School_Commune` corresponds to `Commune_ID`
	// 					INNER JOIN 
	// 						tbl_village AS v 
	// 					ON 
	// 						s.School_Village = v.Village_ID    -- Assuming `School_Village` corresponds to `Village_ID`
	// 					WHERE 
	// 						s.School_IDD = '" . $id . "'";


	// $result = mysqli_query($conn,$query);
	// $cust = mysqli_fetch_array($result);
	// if($cust) {
	// 	echo json_encode($cust);
	// } else {
	// 	echo "Error: " . $sql . "" . mysqli_error($conn);
	// }
	
	// include 'connection.php';

	// // Ensure 'id' is set in POST request
	// if (isset($_POST['id'])) {
	// 	$id = $_POST['id'];

	// 	// Use prepared statements to avoid SQL Injection
	// 	$query = "SELECT * FROM tbl_school WHERE School_ID = ?";
		
	// 	if ($stmt = mysqli_prepare($conn, $query)) {
	// 		// Bind the 'id' parameter to the query
	// 		mysqli_stmt_bind_param($stmt, 's', $id); // 's' denotes string type

	// 		// Execute the prepared statement
	// 		mysqli_stmt_execute($stmt);

	// 		// Get the result
	// 		$result = mysqli_stmt_get_result($stmt);

	// 		// Fetch associative array
	// 		$cust = mysqli_fetch_array($result, MYSQLI_ASSOC);

	// 		if ($cust) {
	// 			// Return JSON-encoded data if found
	// 			echo json_encode($cust);
	// 		} else {
	// 			// Return an error message if no results
	// 			echo json_encode(['error' => 'No school found with the provided ID']);
	// 		}

	// 		// Close the prepared statement
	// 		mysqli_stmt_close($stmt);
	// 	} else {
	// 		// Return an error message if the statement couldn't be prepared
	// 		echo json_encode(['error' => 'Query preparation failed: ' . mysqli_error($conn)]);
	// 	}
	// } else {
	// 	// Return an error if 'id' is not set
	// 	echo json_encode(['error' => 'School ID not provided']);
	// }

	// // Close the database connection
	// mysqli_close($conn);

	include 'connection.php';

	// Get the ID from POST request
	$id = $_POST['id'];

	// Prepare the SQL query with JOINs
	$query = "SELECT 
					s.ID_School, 
					s.School_ID, 
					s.School_NameEN, 
					s.School_NameKH, 
					s.School_Commune, 
					s.School_District, 
					s.School_Province, 
					s.School_Village, 
					s.parent_school, 
					s.school_type,
					d.District_Name,       -- From tbl_district
					c.Commune_Name,        -- From tbl_commune
					v.Village_Name         -- From tbl_village
				FROM 
					tbl_school AS s
				INNER JOIN 
					tbl_district AS d 
				ON 
					s.School_District = d.District_ID
				INNER JOIN 
					tbl_commune AS c 
				ON 
					s.School_Commune = c.Commune_ID
				INNER JOIN 
					tbl_village AS v 
				ON 
					s.School_Village = v.Village_ID
				WHERE 
					s.ID_School = ?";  // Corrected `School_IDD` to `School_ID`

	// Prepare the statement
	if ($stmt = mysqli_prepare($conn, $query)) {

		// Bind parameters (i stands for integer)
		mysqli_stmt_bind_param($stmt, "i", $id);  // Pass the ID parameter safely

		// Execute the statement
		mysqli_stmt_execute($stmt);

		// Fetch the result into an associative array
		$result = mysqli_stmt_get_result($stmt);
		$cust = mysqli_fetch_assoc($result);

		// Check if data exists and return as JSON
		if($cust) {
			echo json_encode($cust);  // Return the school data as JSON
		} else {
			echo json_encode(['error' => 'No data found for the given ID']);
		}

		// Close the statement
		mysqli_stmt_close($stmt);

	} else {
		// Handle query error
		echo json_encode(['error' => 'Query preparation failed: ' . mysqli_error($conn)]);
	}

	// Close the connection
	mysqli_close($conn);

?>
