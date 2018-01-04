<?php 

	//manage users pages

	session_start();
	$pageTitle ="User ".$_SESSION['Username'];
	if(isset($_SESSION['Username'])){
		include 'init.php';

		$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

		switch ($do) {
			case 'Manage':
			// ********** start users page ********
			
			$stmt = $con->prepare('select * from users where GroupID != 1');
			$stmt -> execute();

		?>
				<!-- start manage users page -->
				<h1 class="text-center">Manage</h1>
				<div class='container'>
					<div class="table-responsive">
						
						<table class="mainTable table table-bordered text-center">
							<tr>
								<td>#</td>
								<td>username</td>
								<td>Email</td>
								<td>Full name</td>
								<td>Adresse</td>
								<td>City</td>
								<td>Registred Date</td>
								<td>Controle</td>
							</tr>
							<?php 

								while ($row = $stmt->fetch()) { 

							 ?>
								<tr>
									<td><?php echo $row['UserID']; ?></td>
									<td><?php echo $row['UserName']; ?></td>
									<td><?php echo $row['Email']; ?></td>
									<td><?php echo $row['FullName']; ?></td>
									<td><?php echo $row['Adresse']; ?></td>
									<td><?php echo $row['City']; ?></td>
									<td></td>
									<td>
										<a href=""><i class="fa fa-trash-o fa-2x fa-fw"></i></a>
			      						<a href="users.php?do=Edit&userid=<?php  echo $row['UserID'];  ?>"><i class="fa fa-pencil-square-o fa-2x fa-fw"></i></a>
									</td>
								</tr>
							<?php } ?>

						</table>

					</div>
					<a href='users.php?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i> Add new user</a>
				

				</div>
				<!-- end manage users page -->

		<?php	// ********** end add case ******* 
				break;

			case 'Add':
			// ********** start Add users page ********
			
				?>		
				
				<!-- start html code -->
					<h1 class="text-center">Add User</h1>
					<div class="container">
								<form action="?do=insert" method="POST" class="w-75 m-auto">
									  <div class="form-row">
									  	<div class="form-group col-md-12">
									      <label for="username">Username</label>
									      <input type="text" class="form-control" name="username" placeholder="Username" required>
									    </div>
									    <div class="form-group col-md-6">
									      <label for="userfullname">User Full Name</label>
									      <input type="text" class="form-control" name="fullname" placeholder="User Full Name" required>
									    </div>
									    <div class="form-group col-md-6">
									      <label for="email">Email</label>
									      <input type="email" class="form-control" name="email" placeholder="Email" required>
									    </div>
									  </div>
									  <div class="form-group col-md-6">
									    <label for="password">New Password</label>
									    <input type="password" class="form-control" name="pass" placeholder="Password" required>
									  </div>
									  <div class="form-row">
									    <div class="form-group col-md-6">
									      <label for="adresse">Adresse</label>
									      <input type="text" class="form-control" name="address" placeholder="Your address">
									    </div>
									    <div class="form-group col-md-4">
									      <label for="city">City</label>
									      <input type="text" class="form-control" name="city" placeholder="Your city">
									    </div>
									  </div>
									  <div class="form-group">
									    <div class="form-check">
									  </div>
									  <button type="submit" class="btn btn-primary">Add User</button>

									  <!-- if succeeded or not show message-->
									  <?php if(isset($succeed)){
									  	echo $succeed;	;
									  } ?>
									</form>
						</div>

				<!-- end html code -->

			<?php

			// ********** end add case *******
				break;

			case 'insert':
				
				//start insert code for add form
				 
				


								//Testing if request method is Post for button submit 
				if($_SERVER['REQUEST_METHOD'] == 'POST'){

					$username = $_POST['username'];
					$fullname = $_POST['fullname'];
					$email = $_POST['email'];
					$pass = sha1($_POST['pass']);
					$address = $_POST['address'];
					$city = $_POST['city'];


					try {
					
						$stmt = $con -> prepare("insert into users(username,password,FullName, Email,adresse, city) values(?,?,?,?,?,?)");
						$stmt -> execute(array($username,$pass,$fullname,$email,$address,$city));
						
						echo $succeed = "<div class='alert alert-success alert-dismissible fade show w-50 h-25 mt-5 ml-auto mr-auto' role='alert'>
									  				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												    <span aria-hidden='true'>&times;</span>
												  	</button>
												  <strong>Well done!</strong> user added successfully.
												</div>";

					} catch (Exception $e) {
						echo $wrongpass = "<div class='alert alert-warning alert-dismissible fade show' 	role='alert'>
									  				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												    <span aria-hidden='true'>&times;</span>
												  	</button>
												  <strong>Oh Snap!</strong> Somthing Goes wrong" . $e -> $e.getMessage() . " !!.
												</div>";
					}
				}
				else
				{
					echo $wrongpass = "<div class='alert alert-danger alert-dismissible fade show w-50 mt-5 ml-auto mr-auto' 	role='alert'>
									  				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												    <span aria-hidden='true'>&times;</span>
												  	</button>
												  <strong>Oh Snap!</strong> U cant access this page !!.
												</div>";
				}



				//end insert code for add form
				break;
			
			case 'Edit': 
			//********* start Edit Page ********
				
				// verify if userid is numeric
				$userId = (isset($_GET['userid']) && is_numeric($_GET['userid'])) ? intval($_GET['userid']) : 0;

				//make sur that noOne has the possibility to bring info only by changing id at the GET Resuest but the username in the session also
				$stmt = $con->prepare("Select * from users where userid = ? LIMIT 1");

				$stmt -> execute(array($userId));
				$row = $stmt -> fetch();
				$count = $stmt -> rowCount();
				

				//Testing if request method is Post for button submit 
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					
					//variables to modify
					$Ufnm = $_POST['fullname'];
					$Uemail = $_POST['email'];
					$Unpass = sha1($_POST['pass']);
					$Uopass = sha1($_POST['Oldpass']);
					$Uadd = $_POST['address'];
					$Ucity = $_POST['city'];

					$stmt = $con -> prepare("Select * from users where userid = ?");
					$stmt -> execute(array($userId));
					$row = $stmt -> fetch();

					// verify if input is empty set the old value
					if(empty($Ufnm)){
						$Ufnm = $row['FullName'];
					}
					if (empty($Uemail)) {
						$email= $row['Email'];
					}
					if(empty($Unpass)){
						// if the user wont to change email only for Expl thene we shoold gard the old password
						$Unpass = $row['password'];
					}


					// verify if the old pass is true to give permission to change
					if($Uopass == $row['password']){

						$stmt = $con -> prepare("Update users set FullName = ? , Email = ? , password = ? , adresse = ? , city = ? where UserID = ?");
						$stmt -> execute(array($Ufnm, $Uemail, $Unpass, $Uadd, $Ucity,  $_SESSION['ID']));

						echo $stmt-> rowCount();
						$succeed = "<div class='alert alert-success alert-dismissible fade show' 	role='alert'>
									  				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												    <span aria-hidden='true'>&times;</span>
												  	</button>
												  <strong>Well done!</strong> Your informations successfully updated.
												</div>";
					}
					else{

						$wrongpass = "<div class='alert alert-warning alert-dismissible fade show' 	role='alert'>
									  				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												    <span aria-hidden='true'>&times;</span>
												  	</button>
												  <strong>Oh Snap!</strong> Password is wrong !!.
												</div>";
					} 




					
				}
				else
				{
					//echo "U cant Modify by this access";
				}




				if($count > 0){				?>
					<!-- start html code-->
						<h1 class="text-center">Edit User : <?php echo strtoupper($_SESSION['Username']); ?></h1>
						
						<div class="container">
								<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
									  <div class="form-row">
									    <div class="form-group col-md-6">
									      <label for="userfullname">User Full Name</label>
									      <input type="text" class="form-control" name="fullname" value="<?php echo $row[4]; ?>" placeholder="User Full Name">
									    </div>
									    <div class="form-group col-md-6">
									      <label for="email">Email</label>
									      <input type="email" class="form-control" name="email" value='<?php echo $row[3]; ?>' placeholder="Email">
									    </div>
									  </div>
									  <div class="form-group col-md-6">
									    <label for="password">New Password</label>
									    <input type="password" class="form-control" name="pass" placeholder="Password">
									  </div>
									  <div class="form-group col-md-6">
									    <label for="oldpassword">Old Password</label>
									    <input type="password" class="form-control" name="Oldpass" placeholder="Old Password">
									    <?php if(isset($wrongpass)) echo $wrongpass; ?>
									  </div>
									  <div class="form-row">
									    <div class="form-group col-md-6">
									      <label for="adresse">Adresse</label>
									      <input type="text" class="form-control" name="address" value='<?php echo $row[5]; ?>' placeholder="Your address">
									    </div>
									    <div class="form-group col-md-2">
									      <label for="city">City</label>
									      <input type="text" class="form-control" name="city" value='<?php echo $row[6]; ?>' placeholder="Your city">
									    </div>
									  </div>
									  <div class="form-group">
									    <div class="form-check">
									  </div>
									  <button type="submit" class="btn btn-primary">Confirme</button>

									  <!-- if succeeded or not show message-->
									  <?php if(isset($succeed)){
									  	echo $succeed;	;
									  } ?>
									</form>
						</div>
	
					<!-- end html code-->

				<?php	}
				//if the result is empty or id is wrong 
				else{
					echo 'There is no such id ';
				}	

			// ******* end of case Edit **********
				break;
			default:
				break;
		}



		include $tpl . 'footer.inc';

	}
	else{
		header('Location : index.php');
		exit();
	}