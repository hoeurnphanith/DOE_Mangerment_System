<?php
  //Start Session
session_start();
  //Import class.php
require('inc/classdoe.php');
  //Instance Object
$obj = new myclass;
  //Import restrict.php
// require('inc/restrict.php');
if(!isset($_SESSION['DOE_ID']) || !isset($_SESSION['Password'])){
    //Redirect Page
    header('location:index.php');
  }else{
    $username = $_SESSION['DOE_ID'];
    $pwd = $_SESSION['Password'];
    //Check User Name and Pwd
    $result = $obj->fun_checkadminuserpwd($username,$pwd);
    if(!$result){
      //Redirect Page
      header('location:index.php');
    }
  }
require('inc/header.php');
require('sidebar_Admin.php');


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
						<div class="card p-3" style="background: linear-gradient(101deg,rgb(22 66 255 / 89%) -.84%,rgb(7 37 171 / 92%)) repeat scroll 0 0,transparent;border-radius: 1.25rem ;border-radius: 1.25rem;">
							<span class="card-title" style="color: white; text-align: center; font-size: 25px; font-family: 'Koulen', cursive;">
								<i class="fas fa-users"></i>
							គ្រប់គ្រងសិស្សទូទៅ			</span>
						</div>
					</div>
				</div>

				<div class="row mt-2 mb-1 ml-1 mr-1">
					<div class="col-md-3 col-sm-6 ">
						<div class="card" style="border-radius: 1.25rem;">
							<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ព័ត៍មានសិស្ស</span>
							<div class="card-actions p-3">
								<a href="#" class="btn btn-sm btn-primary mr-1">
								បញ្ចូល				</a>
								<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
									<i class="fas fa-eye text-white"></i></button>
								</div>
							</div>
						</div>

						<div class="col-md-3 col-sm-6 ">
							<div class="card" style="border-radius: 1.25rem;">
								<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ពិន្ទុប្រចាំឆមាស/ឆ្នាំ</span>
								<div class="card-actions p-3">
									<a href="#" class="btn btn-sm btn-primary mr-1">
									បញ្ចូល				</a>
									<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
										<i class="fas fa-eye text-white"></i></button>
									</div>
								</div>
							</div>

							<div class="col-md-3 col-sm-6 ">
								<div class="card" style="border-radius: 1.25rem;">
									<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ផ្ទេរចូល/ផ្ទេរចេញ</span>
									<div class="card-actions p-3">
										<a href="#" class="btn btn-sm btn-primary mr-1">
										បញ្ចូល				</a>
										<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
											<i class="fas fa-eye text-white"></i></button>
										</div>
									</div>
								</div>

								<div class="col-md-3 col-sm-6 ">
									<div class="card" style="border-radius: 1.25rem;">
										<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ពិន្ទុតាមមុខវិជ្ជា</span>
										<div class="card-actions p-3">
											<a href="#" class="btn btn-sm btn-primary mr-1">
											បញ្ចូល				</a>
											<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
												<i class="fas fa-eye text-white"></i></button>
											</div>
										</div>
									</div>
								</div>


								<div class="row mt-1 mb-1 ml-2 mr-1">
									<!-- <div class="col-md-3 col-sm-6 ">
										<div class="card" style="border-radius: 1.25rem;">
											<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">បណ្ណសរសើរ</span>
											<div class="card-actions p-3">
												<a href="#" class="btn btn-sm btn-primary mr-1">
												បញ្ចូល				</a>
												<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
													<i class="fas fa-eye text-white"></i></button>
												</div>
											</div>
										</div>

										<div class="col-md-3 col-sm-6 ">
											<div class="card" style="border-radius: 1.25rem;">
												<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">បណ្ណសំគាល់ខ្លួន</span>
												<div class="card-actions p-3">
													<a href="#" class="btn btn-sm btn-primary mr-1">
													បញ្ចូល				</a>
													<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
														<i class="fas fa-eye text-white"></i></button>
													</div>
												</div>
											</div>

											<div class="col-md-3 col-sm-6 ">
												<div class="card" style="border-radius: 1.25rem;">
													<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">ព្រឹត្ដិបត្រពិន្ទុ</span>
													<div class="card-actions p-3">
														<a href="#" class="btn btn-sm btn-primary mr-1">
														បញ្ចូល			</a>
														<button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModal" style="background: #007bff">
															<i class="fas fa-eye text-white"></i></button>
														</div>
													</div>
												</div> -->

												<div class="col-md-3 col-sm-6 ">
													<div class="card" style="border-radius: 1.25rem;">
														<span class="card-title pl-3 pt-3" style="font-size:20px; color: #007bff; ">បញ្ចីវត្ដមាន</span>
														<div class="card-actions p-3">
															<a href="#" class="btn btn-sm btn-primary mr-1">
															បញ្ចូល				</a>
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

							<?php
							include 'inc/footer.php';
							?>
