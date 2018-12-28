<?php
$qidp = $_REQUEST['qidp'];
$qnom = $_REQUEST['qnom'];
$qpre = $_REQUEST['qpre'];
$qcan = $_REQUEST['qcan'];
$qven = $_REQUEST['qven'];
$con = mysqli_connect("localhost", "root");
mysqli_select_db($con,"sistemaventas");
$sql = "UPDATE producto set nomProd='$qnom',precioProd='$qpre', precioVent=$qven where idProd = $qidp";
mysqli_query($con, $sql);
header("location: ../Listados/abm_prod.php");
?>