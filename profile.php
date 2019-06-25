
<?php  
  include_once 'inc/db_config.php';
  include_once 'inc/header.php';

  if (!isset($_SESSION["user_loged"])) {

    header('Location: login.php');
  }


  
  include_once 'inc/nav.php';
?>
	<div class="content-wrapper p-md-3">
		<div class="container">
			<div class="profile-info mt-5">

				<?php
					if ($_SESSION["user_role"]==0) {
					  	# code...
					  	$sql_query = "SELECT * FROM `admin` WHERE id=".$_SESSION["user_id"].";";

					    $result = DB_Query($sql_query);

					      while ($row = mysqli_fetch_assoc($result)) {

					          extract($row);

					      }

				?>

					<div class="row">
						<div class="col-md-4">
							<div class="img-box text-center p-md-3">
								<img src="avatars/profile-pic.jpg">
								<p class="bg-primary text-white">
									<span>
										<?= $admin_name ?>
									</span>
								</p>

								<div class="access">
									<a href="#">
										<i class="fa fa-pencil text-success"></i>
										Edit Profile
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="profile-information mt-5">
								<table class="table">
									<tr>
										<td class="bg-info text-white text-right">Full Name :</td>
										<td><?= $admin_name ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Mobile :</td>
										<td><?= $mobile ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Email :</td>
										<td><?= $email_id ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>


				<?php


					  }elseif ($_SESSION["user_role"]==1) {
					  	# code...
					  	$sql_query = "SELECT * FROM `employee` WHERE emp_id=".$_SESSION["user_id"].";";

					    $result = DB_Query($sql_query);

					      while ($row = mysqli_fetch_assoc($result)) {

					          extract($row);

					      }

				?>

					<div class="row">
						<div class="col-md-4">
							<div class="img-box text-center p-md-3">
								<img src="avatars/profile-pic.jpg">
								<p class="bg-primary text-white">
									<span>
										<?= $first_name." ".$last_name ?>
									</span>
								</p>

								<div class="access">
									<a href="#">
										<i class="fa fa-pencil text-success"></i>
										Edit Profile
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="profile-information mt-5">
								<table class="table">
									<tr>
										<td class="bg-info text-white text-right">Full Name :</td>
										<td><?= $first_name." ".$last_name ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Mobile :</td>
										<td><?= $mobile ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Email :</td>
										<td><?= $email_id ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Date Of Birth :</td>
										<td><?= $birth_date ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Gender :</td>
										<td><?= $gender ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Address :</td>
										<td><?= $address ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Join Date :</td>
										<td><?= $join_date ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Salary :</td>
										<td><?= $salary ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>


				<?php
					  	
					  }else{
					  	$sql_query = "SELECT * FROM `customers` WHERE id=".$_SESSION["user_id"].";";

					    $result = DB_Query($sql_query);

					      while ($row = mysqli_fetch_assoc($result)) {

					          extract($row);

					      }

				?>

					<div class="row">
						<div class="col-md-4">
							<div class="img-box text-center p-md-3">
								<img src="avatars/profile-pic.jpg">
								<p class="bg-primary text-white">
									<span>
										<?= $first_name." ".$last_name ?>
									</span>
								</p>

								<div class="access">
									<a data-toggle="modal" data-target="#edit_user_modal<?= $id ?>" href="#">
										<i class="fa fa-pencil text-success"></i>
										Edit Profile
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="profile-information mt-5">
								<table class="table">
									<tr>
										<td class="bg-info text-white text-right">Full Name :</td>
										<td><?= $first_name." ".$last_name ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Mobile :</td>
										<td><?= $mobile ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Email :</td>
										<td><?= $email_id ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Address :</td>
										<td><?= $address ?></td>
									</tr>
									<tr>
										<td class="bg-info text-white text-right">Join Date :</td>
										<td><?= $join_date ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>


					<!--Start Modals-->
                  <div class="modal fade" id="edit_user_modal<?= $id ?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content form-modal">
                        <span class="fa fa-times close-modal bg-danger" data-dismiss="modal"></span>
                        
                        <form action="form_submit/update_profile.php" method="post" class="product_form">

                          <label for="first_name">First Name</label>
                          <input type="text" id="first_name" value="<?= $first_name ?>" name="first_name">

                          <label for="last_name">Last Name</label>
                          <input type="text" id="last_name" value="<?= $last_name ?>" name="last_name">
                          

                          <label for="mobile_num">Mobile</label>
                          <input type="text" id="mobile_num" value="<?= $mobile ?>" name="mobile">
                          
                          <label for="address">Address</label>
                          <textarea type="text" id="address" name="address"><?= $address ?></textarea>

                          <br><br>
                          <div class="text-center text-uppercase">
                            <button type="submit" class="btn-lg btn-success">save</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="reset" class="btn-lg btn-info">reset</button>
                          </div>
                        </form>
                      </div>
                      
                    </div>
                  </div>


				<?php

					  }
				?>


			</div>
		</div>
	

<?php 
	include_once 'inc/footer.php';
?>