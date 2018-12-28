<?php
	$id=$_POST['id'];
	$prod=$_POST['producto'];
	$cantidad=$_POST['cantidad'];
	$con=mysqli_connect("localhost","root");
	mysqli_select_db($con,"sistemaventas");
	$sql1=mysqli_query($con,"UPDATE producto set cant=cant+$cantidad");
	$sql2="DELETE from ventaxprod where idVent=$id";
	echo $res=mysqli_query($con,$sql2);
?>