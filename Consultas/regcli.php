<?php
$qlog = $_REQUEST['qlog'];
$qnom = $_REQUEST['qnom'];
$qape = $_REQUEST['qape'];
$qci  = $_REQUEST['qci'];

$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"sistemaventas");
$res=mysqli_query($con,"SELECT ci_nit from cliente");
$fil=mysqli_fetch_row($res);
if ($fil[0]!=$qci) {
	mysqli_query($con,"INSERT INTO cliente (nombre,apellido,ci_nit,fecRegistro,estado,idUsua) 
	values ('$qnom','$qape','$qci',now(),'habilitado','$qlog')");
	header("location:../Listados/abm_cli.php");
}
else
{
	echo"<script type='text/javascript'>
		alert('El usuario ya existe');
		windows.location.href='../Listados/abm_cli.php';
	</script>";
}
?>
