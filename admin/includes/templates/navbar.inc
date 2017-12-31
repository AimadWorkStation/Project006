
<!-- star nav bar -->
	
	<!-- navbar color by default bg-light class i deleted it -->
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			  <!-- the small button shown at sm screen -->
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavButton" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
				<!-- the target for the small button at small screen size -->
			  <div class="collapse navbar-collapse" id="mainNavButton">
			    <!-- mr-auto to do margin right auto ml-auto to do it left -->
				<a class="nav-Brand" href="#"><?php echo lang('HomeAdmin'); ?></a>
			    <ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link" href="#"><?php echo lang('Categories'); ?></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#"><?php echo lang('Items'); ?></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#"><?php echo lang('Members'); ?></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#"><?php echo lang('Statistics'); ?></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#"><?php echo lang('Logs'); ?></a>
			      </li>
			    </ul>
			
			  </div>



				<ul class="nav navbar-nav navbar-right">
		        <li class="dropdown">
		          <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['Username']; ?><span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="users.php?do=Edit&userid=<?php echo $_SESSION['ID']; ?>"><?php echo lang('Edit Profil'); ?></a></li>
		            <li><a href="#"><?php echo lang('Setting'); ?></a></li>
		            <li><a href="logout.php"><?php echo lang('Logout'); ?></a></li>
		          </ul>
		        </li>
		      </ul>


	  </div>
	</nav>

	<!-- end nav bar -->