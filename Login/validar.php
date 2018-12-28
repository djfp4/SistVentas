<?php
	session_start();
	$usr=$_REQUEST['usuario'];
	$pass=$_REQUEST['pass'];
	$con=mysqli_connect("localhost","root");
	mysqli_select_db($con,"sistemaventas");
	$sql="SELECT cargo FROM usuario where idUsua='$usr'";
	$res=mysqli_query($con,$sql);
	$fil=mysqli_num_rows($res);
	if ($fil>0) 
	{
		$sql2="SELECT cargo FROM usuario where idUsua='$usr' and clave=sha1('$pass')";
		$res2=mysqli_query($con,$sql2);
		$fil2=mysqli_num_rows($res2);
		if ($fil2>0) {
			$sql3="SELECT cargo from usuario where idUsua='$usr' and estado='habilitado'";
			$res3=mysqli_query($con,$sql3);
			$fil3=mysqli_num_rows($res3);
			if ($fil3>0) {
				$_SESSION['usuario']=$usr;
				header("location:../Formularios/ventas.php");
			}
			else{
				echo "<script type='text/javascript'>
				alert('No esta habilitado');
				window.location.href='login.php';
				</script>";
			}
		}
		else {
			echo "<script type='text/javascript'>
				alert('Ingrese bien su clave');
				window.location.href='login.php';
				</script>";
		}
	}
	else{
		echo '<script type="text/javascript">
		alert("El usuario que ingreso no existe");
		window.location.href="login.php";
		</script>';
	}
	mysqli_free_result($res);
	mysqli_close($con);
?>