<?php 

	//manage users pages

	session_start();
	$pageTitle ="User ".$_SESSION['Username'];
	if(isset($_SESSION['Username'])){
		include 'init.php';

		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

		switch ($do) {
			case 'Manage':

				break;
			
			case 'Edit': //EditPage ?>
				<!-- start html code-->
					<h1 class="text-center">Edit User</h1>

					<div class="container">
							<form>
								  <div class="form-row">
								    <div class="form-group col-md-6">
								      <label for="username">User Name</label>
								      <input type="email" class="form-control" name="username" placeholder="User Name">
								    </div>
								    <div class="form-group col-md-6">
								      <label for="password">Email</label>
								      <input type="password" class="form-control" name="email" placeholder="Email">
								    </div>
								  </div>
								  <div class="form-group col-md-6">
								    <label for="password">Password</label>
								    <input type="text" class="form-control" name="pass" placeholder="Password">
								  </div>
								  <div class="form-group col-md-6">
								    <label for="oldpassword">Old Password</label>
								    <input type="text" class="form-control" name="Oldpass" placeholder="Old Password">
								  </div>
								  <div class="form-row">
								    <div class="form-group col-md-6">
								      <label for="adresse">Adresse</label>
								      <input type="text" class="form-control" name="address" placeholder="Your address">
								    </div>
								    <div class="form-group col-md-2">
								      <label for="city">City</label>
								      <input type="text" class="form-control" name="city" placeholder="Your city">
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="form-check">
								  </div>
								  <button type="submit" class="btn btn-primary">Confirm</button>
								</form>
					</div>

				<!-- end html code-->
		<?php		break;
			default:
				break;
		}



		include $tpl . 'footer.inc';

	}
	else{
		header('Location : index.php');
		exit();
	}