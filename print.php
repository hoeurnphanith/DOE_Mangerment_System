<?php
  //Start Session
session_start();
  //Import class.php
require('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
  //Import restrict.php
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
<link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="action/includes/style_custrom.css">
<style type="text/css" media="print">
	@media print{
		.noprint, .noprint *{
			display: none; !important;
		}
	}
</style>
<body onload ="print()">
	<div class="container">
		<center>
			<h3 style="margin-top: 30px;">List Student</h3>
			
		</center>
		<table id="ready" class="table table-striped table-bordered" style="width: 100%;"> 
			<thead>
				<tr>
					<th>ល.រ</th>
					<th>ឈ្មោះសិស្ស</th>
					<th>ភេទ</th>

					<th>អាយុ</th>
					<th>ថ្ងៃខែឆ្នាំកំណើត</th>
					<th>ថ្នាក់ទី</th>
					<!-- <th>ថ្នាក់រៀន</th> -->
					<!-- <th>លេខទូរសព្ទអាណាព្យាបាល</th> -->
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
						<td><?php echo $studentname_kh; ?></td>
						<td><?php echo $sex; ?></td>
						<td><?php echo $diff->format('%y'); ?></td>
						<td><?php echo $dmy; ?></td>

						<td><?php echo $Grade_Name."(".$Classroom_Name.")"; ?></td>
						<!-- <td><?php echo $Years_Study; ?></td> -->
					</tr>
					<?php

				}
				?>
			</tbody>
			
		</table>
		
	</div>
	<div class="container">
		<button type="" class="btn btn-info noprint" style="width: 100%" onclick="window.location.replace('classroom.php');">CANCEL PRINTING</button>
	</div>
</body>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="sweetalert/sweetalert2.all.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
