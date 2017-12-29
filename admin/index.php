<?php 
	
	include 'init.php';
	include $tpl. 'header.inc';
	include 'includes/languages/english.php';

	//make sur it is http POST request
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username = $_POST['user'];
		$password = $_POST['pass'];
		$hashedPass = sha1($password);

		//check if user existe in database
		$stmt = $con->prepare("Select Username,Password from users where Username = ? and Password = ? and GroupID=1");
		$stmt->execute(array($username, $hashedPass));

		$nbOfResult = $stmt -> rowCount();
		
		if($nbOfResult > 0){
			echo "Welcom ".$username;
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