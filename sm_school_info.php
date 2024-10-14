<style>
	@import url('https://fonts.googleapis.com/css2?family=Kantumruy:wght@700&display=swap');
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
						<h1 class="h3 text-center">
							<i class="fas fa-school text-primary"></i>
							School of Business Studies			<small class="wlsm_text_secondary">2022-2023</small>
						</h1>
						<div class="text-center wlsm_user_current_session_block">
							<label for="wlsm_user_current_session" class="text-dark">
							Current Session: 			</label>
							<select name="current_session" id="wlsm_user_current_session">
								<option value="5" data-nonce="85aaf81571">
								2021-2022				</option>
								<option selected="selected" value="6" data-nonce="4b952a2d84">
								2022-2023				</option>
							</select>
						</div>
					</div>
				</div>


				<div class="row mt-3 mb-1 ml-1 mr-1" >
					<div class="col-md-12" >
						<div class="card p-3" style="background: linear-gradient(101deg,rgb(22 66 255 / 89%) -.84%,rgb(7 37 171 / 92%)) repeat scroll 0 0,transparent;border-radius: 1.25rem;">
							<span class="card-title" style="color: white; text-align: center; font-size: 25px; font-family: 'Koulen', cursive;  ">
								<i class="fas fa-users"></i>
							ទិន្នន័យសាលារៀន			</span>
						</div>
					</div>
				</div>

				<div class="row mt-2 mb-1 ml-1 mr-1">
					<div class="col-md-3 col-sm-6 ">
						<div class="card" style="border-radius: 1.25rem;">
							<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">អត្ដសញ្ញាណ និងសាវតា</span>
							<div class="card-actions p-3">
								<a href="identity.php" class="btn btn-sm btn-primary mr-1">
								បញ្ញូល		</a>
								<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
									<i class="fas fa-eye text-white"></i></button>
								</div>
							</div>
						</div>

						<div class="col-md-3 col-sm-6 ">
							<div class="card" style="border-radius: 1.25rem;">
								<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">សាលារៀន</span>
								<div class="card-actions p-3">
									<a href="#" class="btn btn-sm btn-primary mr-1">
									បញ្ញូល		</a>
									<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
										<i class="fas fa-eye text-white"></i></button>
									</div>
								</div>
							</div>

						<div class="col-md-3 col-sm-6 ">
							<div class="card" style="border-radius: 1.25rem;">
								<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">សិស្ស</span>
								<div class="card-actions p-3">
									<a href="#" class="btn btn-sm btn-primary mr-1">
									បញ្ញូល		</a>
									<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
										<i class="fas fa-eye text-white"></i></button>
									</div>
								</div>
							</div>

							<div class="col-md-3 col-sm-6 ">
								<div class="card" style="border-radius: 1.25rem;">
									<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">បន្ទប់ និងថ្នាក់រៀន</span>
									<div class="card-actions p-3">
										<a href="#" class="btn btn-sm btn-primary mr-1">
										បញ្ញូល				</a>
										<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
											<i class="fas fa-eye text-white"></i></button>
										</div>
									</div>
								</div>

								<!-- <div class="col-md-3 col-sm-6 ">
									<div class="card" style="border-radius: 1.25rem;">
										<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">បុគ្គលិកបង្រៀន និងមិនបង្រៀន</span>
										<div class="card-actions p-3">
											<a href="#" class="btn btn-sm btn-primary mr-1">
											បញ្ញូល			</a>
											<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
												<i class="fas fa-eye text-white"></i></button>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-sm-6 ">
										<div class="card" style="border-radius: 1.25rem;">
											<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">អគារ និងបរិក្ខារ</span>
											<div class="card-actions p-3">
												<a href="#" class="btn btn-sm btn-primary mr-1">
												បញ្ញូល		</a>
												<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
													<i class="fas fa-eye text-white"></i></button>
												</div>
											</div>
										</div>
										<div class="col-md-3 col-sm-6 ">
											<div class="card" style="border-radius: 1.25rem;">
												<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ការចូលរួមរបស់សហគមន៍</span>
												<div class="card-actions p-3">
													<a href="#" class="btn btn-sm btn-primary mr-1">
													បញ្ញូល			</a>
													<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
														<i class="fas fa-eye text-white"></i></button>
													</div>
												</div>
											</div>
											<div class="col-md-3 col-sm-6 ">
												<div class="card" style="border-radius: 1.25rem;">
													<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ការចែកចាយថ្នាំព្រូន</span>
													<div class="card-actions p-3">
														<a href="#" class="btn btn-sm btn-primary mr-1">
														បញ្ញូល				</a>
														<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
															<i class="fas fa-eye text-white"></i></button>
														</div>
													</div>
												</div>
												<div class="col-md-3 col-sm-6 ">
													<div class="card" style="border-radius: 1.25rem;">
														<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ទឹកស្អាត និងអនាម័យសាលា</span>
														<div class="card-actions p-3">
															<a href="#" class="btn btn-sm btn-primary mr-1">
															បញ្ញូល			</a>
															<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
																<i class="fas fa-eye text-white"></i></button>
															</div>
														</div>
													</div>
													<div class="col-md-3 col-sm-6 ">
														<div class="card" style="border-radius: 1.25rem;">
															<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ទិន្នន័យអាកាសធាតុ</span>
															<div class="card-actions p-3">
																<a href="#" class="btn btn-sm btn-primary mr-1">
																បញ្ញូល		</a>
																<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
																	<i class="fas fa-eye text-white"></i></button>
																</div>
															</div>
														</div>
														<div class="col-md-3 col-sm-6 ">
															<div class="card" style="border-radius: 1.25rem;">
																<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">សាលារៀន</span>
																<div class="card-actions p-3">
																	<a href="#" class="btn btn-sm btn-primary mr-1">
																	សាលារៀន			</a>
																	<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
																		<i class="fas fa-eye text-white"></i></button>
																	</div>
																</div>
															</div> -->
														</div>

													</div>

												</div>
											</div>
										</div>

									</div>

									<?php
									include 'footer.php';
									?>
