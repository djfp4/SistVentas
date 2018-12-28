<?php
$qnom = $_REQUEST["qnom"];
$qpre = $_REQUEST["qpre"];
$qcan = $_REQUEST["qcan"];
$qven = $_REQUEST["qven"];
$qnpr = $_REQUEST["qnpr"];
$hab='habilitado';
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"sistemaventas");
mysqli_query($con,"INSERT into producto(nomProd, precioProd, precioVent, cant, estado) values ('$qnom',$qpre,$qven,$qcan,'$hab')");
$res=mysqli_query($con,"SELECT idProd from producto order by idProd desc limit 1");
$num=mysqli_fetch_row($res);
$qidp=$num[0];
mysqli_query($con,"INSERT into det_prod(idProd, nomProductor, det_cant, fec_reg) 
			values ($qidp, '$qnpr', $qcan, curdate())");
header("location: ../Listados/abm_prod.php");
?>