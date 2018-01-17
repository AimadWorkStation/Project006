<?php 
	ob_start();//to avoid the probleme of the header already sent 
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
					<div class="col-md-3 stats total_users">
						<a href="users.php">
							<div class="stat">Total users
							<span><?php echo countItems('UserId','users'); ?></span>
							</div>
						</a>
					</div>
					<a href="users.php?do=Manage&page=Pending">
					<div class="col-md-3 stats pending_users">
						
							<div class="stat">Pending users
							<span><?php echo countItems('UserId','users','RegStatus',0); ?></span>
						
					</div></a>
					</div>
					<div class="col-md-3 stats total_items">
						<div class="stat">Total Items<span>323432</span>
					</div>
						
					</div>
					<div class="col-md-3 stats total_comments">
						<div class="stat">Total Comments<span>323432</span>
					</div>
						
					</div>
				</div>

			</div>
			<div class="container dashLatest">
				<div class="row">
					<div class="col-sm-6">
						<div class="panel panel-default">
						  <div class="panel-heading"><i class="fa fa-users"></i> <?php echo $Latestnb = 5?> Latest Registred users</div>
						  <div class="panel-body">
						  	<div class="list-group">
						    <?php 
						    	$row = getlatest("UserID, Username, RegistreDate,RegStatus",'users','UserId',$Latestnb);
						    	foreach ($row as $user) { ?>

						    		 <div class="list-group-item list-group-item-action">

						    		 	<span style="cursor: pointer;" title="Edit this user" class="float-left" onclick="location.href='users.php?do=Edit&userid=<?php  echo $user['UserID'];?>'"><?php echo $user['Username'];?>    --------<?php echo $user['RegistreDate'];?></span>
						    		 	

					    		 	<?php if($user['RegStatus'] == 0) { ?>
		      							<span style="cursor: pointer;" class="float-right" title="Activate this user"  href="" id="activateuser<?php  echo $user['UserID'];  ?>" onclick="return activateuser(<?php  echo $user['UserID'];?>);"><i class="fa fa-check-square-o fa-2x fa-fw"></i></span>
									<?php }//if ?>

						    		 </div>
						    		
						    <?php	
									}//foreache
						     ?>
						     </div>
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

	ob_end_flush();