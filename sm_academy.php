<style>
	@import url('https://fonts.googleapis.com/css2?family=Battambang&display=swap');
	.sidebar-form{
		overflow: hidden;
		text-overflow: clip;
		border-radius: 3px;
		border: 1px solid #374850;
		margin: 10px 10px;

	}
	span{
		font-family: 'Battambang', cursive;
	}
</style>
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
<div class="content-wrapper" style="height: auto;">
	<div class="container-fluid p-3">
		<div class="row">
			<div class="col-sm-12">
				<div class="card" style="border-radius: 1.25rem;">
					<div class="card-header">
						<h1 class="h3 text-center" style="font-family: 'Moul', cursive; color: #007bff;">
							<i class="fas fa-school text-primary"></i>
							ប្រព័ន្ធគ្រប់គ្រងព័ត៌មាន និងស្ថិតិតាមសាលារៀន
						</h1>
						<div class="text-center wlsm_user_current_session_block">
							<?php
							include 'action/connection.php';
							$query="select * from session";
							$result= mysqli_query($conn,$query);
							?>
							<label for="wlsm_user_current_session" class="text-dark">
								ឆ្នាំសិក្សា: 			
							</label>
							<select name="current_session" id="wlsm_user_current_session">
								<?php
								WHILE ($rows =$result->fetch_assoc()){
									$session_id =$rows['session_id'];
									$name =$rows['name'];
									echo "<option value='$name'>$name</option>";
								}
								?>
							</select>
						</div>
					</div>
				</div>


				<div class="row mt-3 mb-1 ml-1 mr-1" >
					<div class="col-md-12" >
						<div class="card p-3" style="background: linear-gradient(101deg,rgb(22 66 255 / 89%) -.84%,rgb(7 37 171 / 92%)) repeat scroll 0 0,transparent;border-radius: 1.25rem ;border-radius: 1.25rem;">
							<span class="card-title" style="color: white; text-align: center; font-size: 25px; font-family: 'Koulen', cursive;  ">
								<i class="fas fa-users"></i>
							គ្រប់គ្រងការសិក្សា			</span>
						</div>
					</div>
				</div>

				<div class="row mt-2 mb-1 ml-1 mr-1">
					<div class="col-md-3 col-sm-6 ">
						<div class="card" style="border-radius: 1.25rem;">
							<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ព័ត៍មានគ្រូ</span>
							<div class="card-actions p-3">
								<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
									<i class="fas fa-plus text-white"></i></button>&nbsp
									<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
										<i class="fas fa-eye text-white"></i></button>
									</div>
								</div>
							</div>

							<div class="col-md-3 col-sm-6 ">
								<div class="card" style="border-radius: 1.25rem;">
									<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ព័ត៍មានគ្រូ</span>
									<div class="card-actions p-3">
										<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
											<i class="fas fa-plus text-white"></i></button>&nbsp
											<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
												<i class="fas fa-eye text-white"></i></button>
											</div>
										</div>
									</div>

									<div class="col-md-3 col-sm-6 ">
										<div class="card" style="border-radius: 1.25rem;">
											<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ព័ត៍មានគ្រូ</span>
											<div class="card-actions p-3">
												<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
													<i class="fas fa-plus text-white"></i></button>&nbsp
													<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
														<i class="fas fa-eye text-white"></i></button>
													</div>
												</div>
											</div>
											<div class="col-md-3 col-sm-6 ">
												<div class="card" style="border-radius: 1.25rem;">
													<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ព័ត៍មានគ្រូ</span>
													<div class="card-actions p-3">
														<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
															<i class="fas fa-plus text-white"></i></button>&nbsp
															<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
																<i class="fas fa-eye text-white"></i></button>
															</div>
														</div>
													</div>
												</div>
												<div class="row mt-2 mb-1 ml-1 mr-1">
													<div class="col-md-3 col-sm-6 ">
														<div class="card" style="border-radius: 1.25rem;">
															<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ព័ត៍មានគ្រូ</span>
															<div class="card-actions p-3">
																<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
																	<i class="fas fa-plus text-white"></i></button>&nbsp
																	<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
																		<i class="fas fa-eye text-white"></i></button>
																	</div>
																</div>
															</div>

															<div class="col-md-3 col-sm-6 ">
																<div class="card" style="border-radius: 1.25rem;">
																	<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ព័ត៍មានគ្រូ</span>
																	<div class="card-actions p-3">
																		<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
																			<i class="fas fa-plus text-white"></i></button>&nbsp
																			<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
																				<i class="fas fa-eye text-white"></i></button>
																			</div>
																		</div>
																	</div>

																	<div class="col-md-3 col-sm-6 ">
																		<div class="card" style="border-radius: 1.25rem;">
																			<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ព័ត៍មានគ្រូ</span>
																			<div class="card-actions p-3">
																				<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
																					<i class="fas fa-plus text-white"></i></button>&nbsp
																					<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
																						<i class="fas fa-eye text-white"></i></button>
																					</div>
																				</div>
																			</div>
																			<div class="col-md-3 col-sm-6 ">
																				<div class="card" style="border-radius: 1.25rem;">
																					<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ព័ត៍មានគ្រូ</span>
																					<div class="card-actions p-3">
																						<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
																							<i class="fas fa-plus text-white"></i></button>&nbsp
																							<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
																								<i class="fas fa-eye text-white"></i></button>
																							</div>
																						</div>
																					</div>
																				</div>

																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>



													</div>

													<?php
													include 'footer.php';
													?>
