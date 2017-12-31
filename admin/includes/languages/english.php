<?php 

	function lang($sentence){

		//static to say to the compilare that this is not dynamic for not calling it everytime.
		static $lang =array(
			//'' => '',
			'HomeAdmin' 	=> 'Admin Area',
			'Categories' 	=> 'Categories',
			'Items' 		=> 'Items',
			'Members' 		=> 'Members',
			'Statistics' 	=> 'Statistics',
			'Logs' 			=> 'Logs',
			'Edit Profil' 	=> 'Edit Profil',
			'Setting' 		=> 'Setting',
			'Logout' 		=> 'Logout',
			'Login' 		=> 'Login',
			'Dashboard' 	=> 'Dashboard',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',
			'' => '',

		);
		return $lang[$sentence];
	}
