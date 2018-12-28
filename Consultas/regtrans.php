<?php
$con = mysqli_connect("localhost","root");
mysqli_select_db($con,"sistemaventas");
		mysqli_query($con,"INSERT INTO transaccion(idUsua,idCli,idProd,cant,fecTrans,estado) 
		select idUsua,idCli,idProd,cant,fecTrans,estado from ventaxprod");
		mysqli_query($con,"TRUNCATE table ventaxprod");
		header("location:../Listados/abm_trans.php");
?>