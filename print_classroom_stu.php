<?php
  //Start Session
session_start();
  //Import class.php
require('inc/classdoe.php');
$obj = new myclass;

require('inc/restrict.php');
if($_SESSION['Role']!=="school"){
    //Redirect Page
	header('location:index.php');
}

?>
<?php

$class_stu = $_SESSION['key_stu'];

$School_ID = $_SESSION['User_Name'];

$sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_ID'");
while($row = mysqli_fetch_array($sql)){
	$School_Name=$row['School_NameKH'];
}



$class = $obj->fun_displaydata("tbl_classroom WHERE Classroom_ID =$class_stu");
foreach($class as $records){
	$Classroom_ID = $records['Classroom_ID'];
	$Grade_ID = $records['Grade_ID'];
	$Classroom_Name = $records['Classroom_Name'];
	$Years_Study = $records['Years_Study'];
	$School_ID1 = $records['School_ID'];

	$School_ID = $_SESSION['User_Name'];

	$sql= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_school where School_ID='$School_ID1'");
	while($row = mysqli_fetch_array($sql)){
		$School_Name=$row['School_NameKH'];
	}

	$grade = $obj->fun_displaydata("tbl_grade WHERE Grade_ID = '$Grade_ID'");
	foreach ($grade as $records){
		$Grade_Name = $records['Grade_Name'];
	}
}
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
<style>
	@import url('https://fonts.googleapis.com/css2?family=Koulen&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Moul&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Odor+Mean+Chey&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Moulpali&display=swap');

	form{
		font-family: 'Odor Mean Chey', cursive;
	}
	table{
		font-family: 'Odor Mean Chey', cursive;
		font-size: 14px;
	}
	button{
		font-family: 'Odor Mean Chey', cursive;
	}
	h5{
		font-family: 'Moulpali', cursive;
		font-size: 16px;
	}
	h6{
		font-family: 'Moul', cursive;
		font-size: 14px;
	}
	h4{
		font-family: 'Moul', cursive;
	}

</style>
<style type="text/css" media="print">
	@media print{
		.noprint, .noprint *{
			display: none; !important;
		}
	}
</style>
<body onload="window. print();">
	<div class="container">
		<div style="text-align: right;">
			<div style="margin-right: 15px;"><h5 style="margin-top: 30px;​">ព្រះរាជាណាចក្រកម្ពុជា</h5></div>
			<h5 style="margin-top: 30px;">ជាតិ សាសនា ព្រះមហាក្សត្រ</h5>

		</div>
		<center>
			<h5 style="margin-top: 30px;font-family: 'Moul', cursive;">សាលាបឋមសិក្សា <?php echo $School_Name.$Grade_Name."(".$Classroom_Name.")"; ?></h5>

		</center>
		<div class="" style="text-align: left;">
			<h6 style="margin-top: 30px;">ការិយាល័យអប់រំយុវជន និងកីឡា
				ស្រុកសំឡូត
			</h6>

		</div><br>
		<table id="ready" class="table table-striped table-bordered" style="width: 100%;"> 
			<thead>
				<tr>
					<th>ល.រ</th>
					<th>គោត្តនាម-នាម</th>
					<th>ភេទ</th>
					<th>អាយុ</th>
					<th>ថ្ងៃខែឆ្នាំកំណើត</th>
					<th>ថ្នាក់ទី</th>
					<th>ផ្សេងៗ</th>
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
					$name_stu= mysqli_query($obj->fun_link(),"SELECT * FROM tbl_student where Student_ID ='$StudentID'");
					while($row = mysqli_fetch_array($name_stu)){
						$StudentID=$row['Student_ID'];
						$studentname_kh=$row['studentname_kh'];
						$sex=$row['sex'];
						$dob=$row['dob'];
						$timestamp = strtotime($dob);
						$dmy = date("d-m-Y", $timestamp);
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
						<td></td>
					</tr>
					<?php

				}
				?>
			</tbody>

		</table>
		<div class="row">
			<div class="" style="text-align: left;">
				<h6 style="margin-top: 30px;">បានឃើញ និងឯកភាព<br><br>
					<div style="margin-left: 30px;">
						នាយកសាលា 
					</div>
				</h6>
			</div>

		</div><div class="" style="text-align: right;">
			<h6 style="margin-top: 30px;">
				<div style="margin-left: 70px;">
					ថ្ងៃ..............ទី............ខែ..............ឆ្នាំ..................... 
				</div><br>
				<div style="margin-right: 30px;">
					..............,ថ្ងៃទី.......ខែ.......ឆ្នាំ..........
				</div><br>
				<div style="margin-right: 100px;">
					គ្រូបន្ទុកថ្នាក់ 

				</div><br>
			</h6>
		</div>

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
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
