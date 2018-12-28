<?php
$cliente = $_POST['cliente'];
$usuario = $_POST['usuario'];
$producto = $_POST['producto'];
$cantidad = $_POST['cantidad'];
	$con=mysqli_connect("localhost","root");
	mysqli_select_db($con,"sistemaventas");
	$res=mysqli_query($con,"SELECT cant FROM producto where idProd=$producto");
	$num=mysqli_fetch_row($res);
	if ($cantidad<=$num[0]) {
		mysqli_query($con,"UPDATE producto set cant=cant-$cantidad where idProd=$producto");
		$sql="INSERT into ventaxprod (idUsua,idCli,idProd,cant,fecTrans,estado) values ('$usuario',$cliente,$producto,$cantidad,curdate(),'habilitado')";
		echo $res=mysqli_query($con,$sql);
	}
	else{
		echo "0";
	}
?>