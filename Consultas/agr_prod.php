<?php 
$qcan=$_REQUEST['qcan'];
$qidp=$_REQUEST['qidp'];
$qpro=$_REQUEST['qpro'];
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"sistemaventas");
$res=mysqli_query($con,"SELECT cant from producto where idProd=$qidp");
$num = mysqli_fetch_row($res);
$cant=$num[0];
mysqli_query($con,"INSERT into det_prod (idProd, nomProductor, det_cant, fec_reg) 
	values ($qidp, '$qpro', $qcan, curdate())");
mysqli_query($con,"UPDATE producto set cant=cant+$qcan where idProd=$qidp");
header("location:../Listados/abm_prod.php");
 ?>