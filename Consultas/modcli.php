<?php
$qidc = $_REQUEST['qid'];
$qnom = $_REQUEST['qnom'];
$qape = $_REQUEST['qape'];
$qci  = $_REQUEST['qci'];
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"sistemaventas");
$res=mysqli_query($con,"SELECT idCli from cliente where ci_nit='$qci'");

	mysqli_query($con,"UPDATE cliente SET nombre='$qnom',apellido='$qape' where idCli = $qidc");
	header("location:../Listados/abm_cli.php");

?>