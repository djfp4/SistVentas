<?php
$qlog = $_REQUEST["qlog"];
$qcla = $_REQUEST["qcla"];
$qnom = $_REQUEST["qnom"];
$qape = $_REQUEST["qape"];
$qfec = $_REQUEST["qfec"];
$qci = $_REQUEST["qci"];
$qcar = $_REQUEST["qcar"];
$qdir = $_REQUEST["qdir"];
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"sistemaventas");
mysqli_query($con,"INSERT INTO usuario VALUES ('$qlog',sha1('$qcla'),'$qnom','$qape','$qfec','$qci','$qcar','$qdir',curdate(),'habilitado')");
header("location: ../Listados/abm_usr.php");
?>