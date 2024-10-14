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
	// $query="SELECT * from tbl_school WHERE School_ID = '" . $id . "'";


	// $result = mysqli_query($conn,$query);
	// $cust = mysqli_fetch_array($result);
	// if($cust) {
	// 	echo json_encode($cust);
	// } else {
	// 	echo "Error: " . $sql . "" . mysqli_error($conn);
	// }

	include 'connection.php';

	// Check if the 'id' parameter is set and not empty
	if (isset($_POST['id']) && !empty($_POST['id'])) {
		$id = $_POST['id'];

		// Prepare a parameterized query to prevent SQL injection
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
							s.School_District = d.District_ID  -- Assuming `School_District` corresponds to `District_ID`
						INNER JOIN 
							tbl_commune AS c 
						ON 
							s.School_Commune = c.Commune_ID    -- Assuming `School_Commune` corresponds to `Commune_ID`
						INNER JOIN 
							tbl_village AS v 
						ON 
							s.School_Village = v.Village_ID    -- Assuming `School_Village` corresponds to `Village_ID`
						WHERE 
							s.ID_School = ?;";
		$stmt = mysqli_prepare($conn, $query);
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		// Check if the query was successful
		if ($result) {
			$cust = mysqli_fetch_array($result);
			if ($cust) {
				echo json_encode($cust);
			} else {
				echo "No record found";
			}
		} else {
			echo "Error: " . mysqli_error($conn);
		}
	} else {
		echo "Invalid request";
}

?>