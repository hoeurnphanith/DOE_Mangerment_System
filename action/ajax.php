<?php
require_once('../inc/classdoe.php');
  //Instance Object
$obj = new myclass;


// if (isset($_POST['getDistrictByProvince']) == "getDistrictByProvince") {
//     $districtData = '';
//     $province_id = $_POST['province_id'];

//     $allProvince = $obj->fun_displaydata("tbl_district WHERE province_ID='$province_id' ");
//         foreach($allProvince as $records){
//                 $district_ID = $records['district_ID'];
//                 $District_Name = $records['District_Name'];
//             $districtData .= '<option value="'.$district_ID.'">'.$District_Name.'</option>';
//         }

//     echo "^".$districtData;
// }


if (isset($_POST['getDistrictByProvince']) && $_POST['getDistrictByProvince'] == "getDistrictByProvince") {
    $districtData = '';
    $province_id = $_POST['province_id'];

    // Assuming $obj->fun_displaydata is your function to fetch data from the database
    $allProvince = $obj->fun_displaydata("tbl_district WHERE province_ID='$province_id' ");
    
    foreach ($allProvince as $records) {
        $district_ID = $records['district_ID'];
        $District_Name = $records['District_Name'];
        $districtData .= '<option value="'.$district_ID.'">'.$District_Name.'</option>';
    }

    echo "^" . $districtData;
}

// if (isset($_POST['getCommuneByDistrict']) == "getCommuneByDistrict") {
//     $CommuneData = '';
//     $District_Name = $_POST['District_Name'];

//     $allCommune = $obj->fun_displaydata("tbl_commune WHERE district_ID='$District_Name' ");
//         foreach($allCommune as $records){
//                 $Commune_ID = $records['Commune_ID'];
//                 $Commune_Name = $records['Commune_Name'];
//             $CommuneData .= '<option value="'.$Commune_ID.'">'.$Commune_Name.'</option>';
//         }

//     echo "^".$CommuneData;
// }


if (isset($_POST['getCommuneByDistrict']) && $_POST['getCommuneByDistrict'] == "getCommuneByDistrict") {
    $CommuneData = '';
    $District_Name = $_POST['District_Name'];

    // Assuming $obj->fun_displaydata is a function to fetch data from the database
    $allCommune = $obj->fun_displaydata("tbl_commune WHERE district_ID='$District_Name' ");
    
    foreach ($allCommune as $records) {
        $Commune_ID = $records['Commune_ID'];
        $Commune_Name = $records['Commune_Name'];
        $CommuneData .= '<option value="'.$Commune_ID.'">'.$Commune_Name.'</option>';
    }

    echo "^" . $CommuneData;
}



// if (isset($_POST['getVillageByCommune']) == "getVillageByCommune") {
//     $VillageData = '';
//     $Commune_ID = $_POST['Commune_ID'];

//     $allVillage = $obj->fun_displaydata("tbl_village WHERE Commune_ID='$Commune_ID' ");
//         foreach($allVillage as $records){
//                 $Village_ID = $records['Village_ID'];
//                 $Village_Name = $records['Village_Name'];
//             $VillageData .= '<option value="'.$Village_ID.'">'.$Village_Name.'</option>';
//         }

//     echo "^".$VillageData;
// }


if (isset($_POST['getVillageByCommune']) && $_POST['getVillageByCommune'] == "getVillageByCommune") {
    $VillageData = '';
    $Commune_ID = $_POST['Commune_ID'];

    // Assuming $obj->fun_displaydata is your function to fetch data from the database
    $allVillage = $obj->fun_displaydata("tbl_village WHERE Commune_ID='$Commune_ID' ");
    
    foreach ($allVillage as $records) {
        $Village_ID = $records['Village_ID'];
        $Village_Name = $records['Village_Name'];
        $VillageData .= '<option value="'.$Village_ID.'">'.$Village_Name.'</option>';
    }

    echo "^" . $VillageData;
}

// if (isset($_POST['getVillage']) && $_POST['getVillage'] == "getVillage") {
//     $VillageData = '';
//     $Commune_ID = $_POST['Commune_ID'];

//     // Assuming $obj->fun_displaydata is your function to fetch data from the database
//     $allVillage = $obj->fun_displaydata("tbl_village WHERE Village_ID='$Village_ID' ");
    
//     foreach ($allVillage as $records) {
//         $Village_ID = $records['Village_ID'];
//         $Village_Name = $records['Village_Name'];
//         $VillageData .= '<option value="'.$Village_ID.'">'.$Village_Name.'</option>';
//     }

//     echo "^" . $VillageData;
// }

if (isset($_POST['getVillage']) && $_POST['getVillage'] == "getVillage") {
    $VillageData = '';
    $Commune_ID = $_POST['Commune_ID'];

    // Assuming you need to filter villages by Commune_ID
    // Use prepared statements to prevent SQL injection
    $allVillage = $obj->fun_displaydata("tbl_village WHERE Commune_ID='$Commune_ID'");

    // Check if any villages were returned
    if (!empty($allVillage)) {
        foreach ($allVillage as $records) {
            $Village_ID = $records['Village_ID'];
            $Village_Name = $records['Village_Name'];
            $VillageData .= '<option value="'.$Village_ID.'">'.$Village_Name.'</option>';
        }
    } else {
        $VillageData .= '<option value="">No villages found</option>';
    }

    echo "^" . $VillageData;
}