<?php

			$user = $_POST['user'];
			$pass = $_POST['password'];

		if ($user == 'saadmin' && $pass == '123')
			{
				session_start();			
				$_SESSION['admin'] = $user ;
				
				header("location:home2.php");
			}
		else
			{
				
				header("location:indexn.php");	
			}	
	
?>