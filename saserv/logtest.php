

<?php


			 if(isset ($_POST['entrar']))
			 {
				$nick	   	= 	$_POST['nick'];
				$pass	   	=	$_POST['pass'];
			  	$tipoCuenta =  $_POST['tipoCuenta'];

			


			   
			       
			        

			        require("cnx.php");
			        
			       
			        if($tipoCuenta == "client")
			    	{	
							        $ssql = "SELECT * FROM usuarios WHERE email='$nick' and pass='$pass'";
							        $rs = mysql_query($ssql,$conexion);
							            if (mysql_num_rows($rs)==1)
							            {
							              session_start();
							              $_SESSION["login"] = $nick;    
							              mysql_close($conexion); 
							              ?>
							              <script type="text/javascript">
							              window.location="micuenta/index.php";
							              </script>
							              <?php 
							            }
							            else
							            {
			            					?>
			            						<!--

												  <script type="text/javascript">
									              window.location="http://managercode.com.ve/loginfail/";
									              </script>
								 					-->
								 				Error
			            					<?php     	       
			              				mysql_close($conexion);
			           					}
			        }
			        

			            
			    

/*
			  	if ($tipoCuenta == "admin")
			    {
			    	
			       require("cnx.php");
			        $ssql = "SELECT * FROM administradores WHERE email='$nick' and pass='$pass'";
			        $rs = mysql_query($ssql,$conexion);
			            if (mysql_num_rows($rs)==1)
			            {
			              session_start();
			              $_SESSION["administrador"] = $nick;    
			              mysql_close($conexion); 
			              ?>
			              <script type="text/javascript">
			              window.location="admin/";
			              </script>
			              <?php 
			            }
			            else
			            {
			            	?>
								<script type="text/javascript">
								              window.location="http://managercode.com.ve/loginfail/";
								              </script>
			            	<?php     	       
			              mysql_close($conexion);
			            } 


			    }
		*/		


			    	if ($tipoCuenta == "admin")
			    	{
			    	
				       	
								        $ssql = "SELECT * FROM administradores WHERE email='$nick' and pass='$pass'";
								        $rs = mysql_query($ssql,$conexion);
								            if (mysql_num_rows($rs)==1)
								            {
								              session_start();
								              $_SESSION["administrador"] = $nick;    
								              mysql_close($conexion); 
								              ?>
								              <script type="text/javascript">
								              window.location="admin/index.php";
								              </script>
								              <?php 
								            }
							            	else
							            	{
								            	?>
													<script type="text/javascript">
													              window.location="http://managercode.com.ve/loginfail/";
													              </script>
								            	<?php     	       
							              	mysql_close($conexion);
							            	} 


			    	}


		}
		else
		{
				header("location:http://managercode.com.ve");
			 }
									
		?>		
