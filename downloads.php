<?php include 'filesLogic.php';
session_start();
  //Import class.php
require('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css">
  <title>Download files</title>
</head>
<body>

<table id="example" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
              <thead>
                <tr>
                  <th>ល.រ</th>
                  <th>អត្ដលេខ</th>
                  <th>ឈ្មោះសិស្ស</th>
                  <th>ភេទ</th>
                  <th>អាយុ</th>
                  <th>ថ្ងៃខែឆ្នាំកំណើត</th>
                  <th>ថ្នាក់ទី</th>
                  <!-- <th>ថ្នាក់រៀន</th> -->
                  <!-- <th>លេខទូរសព្ទអាណាព្យាបាល</th> -->
                  <th>សកម្មភាព</th>
                </tr>
              </thead>
              <tbody>
               <?php
               $key = $_GET['key'];
               $classroom = $obj->fun_displaydata("tbl_classroom_student WHERE Classroom_ID = '$key'");
               foreach($classroom as $records){
                $ID = $records['ID'];
                $ClassroomID = $records['Classroom_ID'];
                $StudentID = $records['Student_ID'];
                ?>
                <?php
                      // $School_ID = $_SESSION['User_Name'];
                $grade= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_classroom where Classroom_ID ='$ClassroomID'");
                while($row = mysqli_fetch_array($grade)){
                  $ClassroomID=$row['Classroom_ID'];
                  $Grade_ID=$row['Grade_ID'];
                  $Classroom_Name=$row['Classroom_Name'];
                  $Years_Study=$row['Years_Study'];

                }
                ?>
                <?php
                      // $School_ID = $_SESSION['User_Name'];
                $name_stu= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_student where Student_ID ='$StudentID'");
                while($row = mysqli_fetch_array($name_stu)){
                  $StudentID=$row['Student_ID'];
                  $studentname_kh=$row['studentname_kh'];
                  $sex=$row['sex'];
                  $dob=$row['dob'];


                //Our YYYY-MM-DD date.
                // $ymd = '2015-08-10';

//Convert it into a timestamp.
                  $timestamp = strtotime($dob);

//Convert it to DD-MM-YYYY
                  $dmy = date("d-m-Y", $timestamp);

//Echo it



                // $dateOfBirth = "$dob";
                  $today = date("Y-m-d");
                  $diff = date_diff(date_create($dob), date_create($today));

                }
                ?>
                <?php
                      // $School_ID = $_SESSION['User_Name'];
                $name_stu= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_grade where Grade_ID ='$Grade_ID'");
                while($row = mysqli_fetch_array($name_stu)){
                  $Grade_ID=$row['Grade_ID'];
                  $Grade_Name=$row['Grade_Name'];
                }
                ?>
                <tr>
                  <td><?php echo $ID; ?></td>
                  <td><?php echo $StudentID; ?></td>
                  <td><?php echo $studentname_kh; ?></td>
                  <td><?php echo $sex; ?></td>
                  <td><?php echo $diff->format('%y'); ?></td>
                  <td><?php echo $dmy; ?></td>

                  <td><?php echo $Grade_Name."(".$Classroom_Name.")"; ?></td>
                  <!-- <td><?php echo $Years_Study; ?></td> -->


                  <td>
                    <!-- <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-primary edit fas fa-edit text-white" data-id="<?php echo $ID;?>"></a> -->
                    <a href="javascript:void(0)" onclick="archiveFunction()" class="btn btn-danger delete fas fa-trash-alt text-white" data-id="<?php echo $ID;?>"> Remove</a>
                  </td>


                </tr>
                <?php

              }
              ?>
            </tbody>
          </table>

</body>
</html>