<?php 
	session_start();
	//print_r($_SESSION);

	$noNavbar ='';
	$pageTitle = 'Login';


	//if ther is a session named by username go directly to dashboard page
	if(isset($_SESSION['Username']))
		header('Location: dashboard.php');
	//including most important files
	include 'init.php';
	

	//make sur it is http POST request
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username = $_POST['user'];
		$password = $_POST['pass'];
		$hashedPass = sha1($password);

		//check if user existe in database
		$stmt = $con->prepare("Select UserID, Username,Password from users where Username = ? and Password = ? and GroupID=1 LIMIT 1");
		$stmt->execute(array($username, $hashedPass));

		//get data as array
		$row = $stmt->fetch();

		$nbOfResult = $stmt -> rowCount();
		
		if($nbOfResult > 0){
			//register Session name
			$_SESSION['Username'] = $username;
			//register user id session
			$_SESSION['ID'] = $row['UserID'];
			header('Location: dashboard.php');


		}

	}


 ?>
	

	<form class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<h4>Admin Login</h4>
		<input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off">
		<input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password">
		<input type="submit" value="Login" class="btn btn-primary btn-block">
	</form>

 <?php 
	include $tpl. 'footer.inc';
 ?>