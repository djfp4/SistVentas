<?php 
$qdet=$_REQUEST['qdet'];
$qnom=$_REQUEST['qnom'];
$qcan=$_REQUEST['qcan'];
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"sistemaventas");
	$p=mysqli_query($con,"SELECT idProd, det_cant from det_prod where id_det=$qdet");
	$fid=mysqli_fetch_row($p);
	$id=$fid[0];
	$dcant=$fid[1];
	$r=mysqli_query($con,"SELECT cant from producto where idProd=$id");
	$fcan=mysqli_fetch_row($r);
	$cant=$fcan[0];
	$stock=$cant-$dcant;
	mysqli_query($con,"UPDATE producto set cant=$stock+$qcan where idProd=$id");
	mysqli_query($con,"UPDATE det_prod set det_cant=$qcan, nomProductor='$qnom' where id_det=$qdet");
	header("location:../Listados/abm_prod.php");
 ?>
