<?php
include('../../inc/classdoe.php');
$obj = new myclass;

$output = '';
if(isset($_POST["export"]))
{
  $sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school");

// $query = "SELECT * FROM tbl_customer";
// $result = mysqli_query($connect, $query);


  if(mysqli_fetch_array($sql)>0)
  {
    $output .= '
    <table class="table" bordered="1">  
    <tr>  
    <th>លេខកូដសាលា</th>
    <th>ឈ្មោះសាលា</th>
    <th>ឈ្មោះឡាតាំង</th>
    <th>ខេត្ដ</th>
    <th>ស្រុក</th>
    <th>ឃុំ</th>
    <th>ភូមិ</th>
    </tr>
    ';
    while($row = mysqli_fetch_array($sql))
    {
      $School_ID = $row['School_ID'];
      $School_NameKH = $row['School_NameKH'];
      $School_NameEN = $row['School_NameEN'];
      $School_Province = $row['School_Province'];
      $School_District = $row['School_District'];
      $School_Commune = $row['School_Commune'];
      $School_Village = $row['School_Village'];

        // $province= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_province where province_ID='$School_Province'");
        //             while ($row = mysqli_fetch_array($province)){
        //               $province_Name = $row['province_Name'];
        //             }


      $output .= '
      <tr>  
      <td>'.$row["School_ID"].'</td>
      <td>'.$row["School_NameKH"].'</td>  
      <td>'.$row["School_NameEN"].'</td>  
      <td>'.$row["School_Province"].'</td>  
      <td>'.$row["School_District"].'</td>
      <td>'.$row["School_Commune"].'</td>  
      <td>'.$row["School_Village"].'</td>
      </tr>


      ';
    }
    $output .= '</table>';
   header('Content-Type: application/pdf');
   header('Content-Disposition: attachment; filename=download.pdf');
    echo $output;
  }
}
?>