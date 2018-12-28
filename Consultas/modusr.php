<?php
$qlog = $_REQUEST['qlog'];
$qcla = $_REQUEST['qcla'];
$qnom = $_REQUEST['qnom'];
$qape = $_REQUEST['qape'];
$qfec = $_REQUEST['qfec'];
$qci = $_REQUEST['qci'];
$qdir = $_REQUEST['qdir'];
$con = mysqli_connect("localhost", "root");
mysqli_select_db($con,"sistemaventas");
$sql = "UPDATE usuario SET clave=sha1('$qcla'), nombre='$qnom',apellido='$qape',fechanac='$qfec',ci=$qci,direccion='$qdir' where idUsua = '$qlog'";
mysqli_query($con, $sql);
header("location: ../Listados/abm_usr.php");
?>