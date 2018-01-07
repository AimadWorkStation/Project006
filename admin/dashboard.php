<?php 
	session_start();
	//print_r($_SESSION);
	if(isset($_SESSION['Username'])){
		$pageTitle = 'Dashboard';
		include 'init.php';

		//start dashboard page
		?>
		<div class="dashboard">
			<div class="container dashStat text-center">
				
				<h1>Dashboad</h1>

				<div class="row">
					<div class="col-md-3 stats">
						<div class="stat">Total users
						<span>323432</span>
						</div>
						
					</div>
					<div class="col-md-3 stats">
						<div class="stat">Pending users
						<span>323432</span>
					</div>
						
					</div>
					<div class="col-md-3 stats">
						<div class="stat">Total Items<span>323432</span>
					</div>
						
					</div>
					<div class="col-md-3 stats">
						<div class="stat">Total Comments<span>323432</span>
					</div>
						
					</div>
				</div>

			</div>
			<div class="container dashLatest">
				<div class="row">
					<div class="col-sm-6">
						<div class="panel panel-default">
						  <div class="panel-heading"><i class="fa fa-users"></i>  Latest Registred users</div>
						  <div class="panel-body">
						    Panel content
						  </div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="panel panel-default">
						  <div class="panel-heading"><i class="fa fa-ticket"></i>  Latest Registred users</div>
						  <div class="panel-body">
						    Panel content
						  </div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<?php 
		//end dashboard page 

		include $tpl. 'footer.inc';
	}



	else{
		//if trying to access to dashbord page directly without signed in
		header('Location: index.php');	
		exit();
	} 