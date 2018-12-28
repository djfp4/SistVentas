<?php
session_start();
error_reporting(0);
$varSesion=$_SESSION['usuario'];
if ($varSesion==null) 
{
	echo '<script type="text/javascript">
			alert("Debe iniciar sesion");
			window.location.href="login.php";
			</script>';
  
  die();
}
?>