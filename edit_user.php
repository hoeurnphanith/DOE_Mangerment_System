
<?php
  //Start Session
session_start();
  //Import class.php
require_once('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
  //Import restrict.php
require_once('inc/restrict.php');
if($_SESSION['Role']!=="school"){
    //Redirect Page
	header('location:index.php');
}

?>

<?php
include 'header.php';
include 'sidebar_school.php';
?>
<style>
	/*@import url('https://fonts.googleapis.com/css2?family=Kantumruy:wght@700&display=swap');*/
	@import url('https://fonts.googleapis.com/css2?family=Kantumruy&display=swap');
	table{
		font-size: 13px;
		font-family: 'Kantumruy', sans-serif;
	}
	tr{
		font-size: 16px;
		font-family: 'Kantumruy', sans-serif;
	}
	form{
		font-family: 'Kantumruy', sans-serif;
	}
	h1,h2,h3,h4,h5,h6{
		font-family: 'Koulen', cursive;
	}
</style>
<div class="content-wrapper" style="height: auto;">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-3" >
				<div class="col-sm-6 text-primary">
					<h2>
						<i class="fas fa-graduation-cap"></i>​ កែប្រែអ្នកប្រើប្រាស់
					</h2>
				</div>
			</div>
			<form action="javascript:void(0)" id="userInserUpdateForm" name="userInserUpdateForm" class="form-horizontal" method="POST">
				<?php 
				$result = mysqli_query($obj->fun_link(),"SELECT * FROM tbl_users WHERE User_ID='" . $_GET['User_ID'] . "'");
				$row= mysqli_fetch_array($result);
				?>
				<input type="hidden" name="User_ID" id="User_ID">
				<div class="form-group">
					<div class="col-sm-12">
						<label>សាលារៀន <span style="color:red">*</span></label>
						<input   type="text" class="form-control form-control-border" id="School_Name" required="" name="School_Name" value="<?php echo $row['School_Name']; ?>" placeholder="សាលារៀន"​>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label>លេខកូដសាលា <span style="color:red">*</span></label>
						<input  type="text" class="form-control form-control-border" id="User_Name" required="" name="User_Name"
						value="<?php echo $row['User_Name']; ?>" placeholder="លេខកូដសាលា"​>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<label>លេខសំងាត់ <span style="color:red">*</span></label>
						<input type="text" class="form-control form-control-border" id="pwd" required="" name="pwd"
						value="<?php echo $row['pwd']; ?>" placeholder="លេខសំងាត់">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label>អុីម៉ែល <span style="color:red">*</span></label>
						<input type="text" class="form-control form-control-border" id="Email" required="" name="Email" 
						value="<?php echo $row['Email']; ?>" placeholder="អុីម៉ែល">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label>លេខទូរសព្ទ <span style="color:red">*</span></label>
						<input type="text" class="form-control form-control-border" id="phone" required="" name="phone"
						value="<?php echo $row['phone']; ?>" placeholder="លេខទូរសព្ទ">
					</div>
				</div> 
				<div class="form-group">
					<div class="col-sm-12">
						<label>ប្រភេទអ្នកប្រើប្រាស់ <span style="color:red">*</span></label>
						<input type="text" class="form-control form-control-border" id="User_Type" required="" name="User_Type" 
						value="<?php echo $row['User_Type']; ?>" placeholder="ប្រភេទអ្នកប្រើប្រាស់">
					</div>
				</div> 
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary" name="btn_upate" id="btn-save" value="btn_upate">Update
					</button>
				</div>
			</form>
		</div>
	</div>
</section>
<?php 
if(isset($_POST['btn_upate'])){
	mysqli_query($obj->fun_link(),"UPDATE tbl_users set
		User_Name='" . $_POST['User_Name'] . "',
		School_Name='" . $_POST['School_Name'] . "',
		pwd='" . $_POST['pwd'] . "',
		User_Type='" . $_POST['User_Type'] . "',
		Email='" . $_POST['Email'] . "',
		phone='" . $_POST['phone'] . "' WHERE User_ID='".$_GET['User_ID']."' ");

	$message = "Record Modified Successfully";
}
?>
<?php
include 'footer.php';
?>
<!-- alert insert -->
<?php
if(isset($_SESSION['insert'])){
	?>
	<script>
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})

		Toast.fire({
			icon: 'success',
			title: '<?php echo $_SESSION['insert'] ?>'
		})
	</script>
	<?php 
	unset($_SESSION['insert']);
}
?>
<!-- end alert insert -->


<!-- alert update -->
<?php
if(isset($_SESSION['update'])){
	?>
	<script>
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})

		Toast.fire({
			icon: 'success',
			title: '<?php echo $_SESSION['update'] ?>'
		})
	</script>
	<?php 
	unset($_SESSION['update']);
}
?>
<!-- end alert update -->


<!-- alert delete -->
<?php
if(isset($_SESSION['delete'])){
	?>
	<script>
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})

		Toast.fire({
			icon: 'success',
			title: '<?php echo $_SESSION['delete'] ?>'
		})
	</script>
	<?php 
	unset($_SESSION['delete']);
}
?>
<!-- end alert delete -->


<!-- alert data -->

<?php
if(isset($_SESSION['data'])){
	?>
	<script>
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})

		Toast.fire({
			icon: 'warning',
			title: '<?php echo $_SESSION['data'] ?>'
		})
	</script>
	<?php 
	unset($_SESSION['data']);
}
?>
<!-- end alert data -->


<!-- Dropdown_list_location -->

<!-- End Dropdown_list_location -->
<!-- <script>
	function singleSelectChangeValue() {
        //Getting Value
        //var selValue = document.getElementById("singleSelectDD").value;
        var selObj = document.getElementById("school_id");
        var selValue = selObj.options[selObj.selectedIndex].value;
        //Setting Value
        document.getElementById("User_Name").value = selValue;
    }
</script>
<script>
	$(document).ready(function($){
		$('#update').click(function(){
			url : "action/update_user.php";
		});
		$('#userInserUpdateForm').submit(function() {
    // ajax
    $.ajax({
    	type:"POST",
    	url: "action/update_user.php",
    data: $(this).serialize(), // get all form field value in 
    dataType: 'json',
    success: function(res){
    	window.location.reload();
    }
});
});
	});
</script> -->
</div>


