<?php
$qpro=$_REQUEST['log'];
$con = mysqli_connect("localhost","root");
mysqli_select_db($con,"sistemaventas");
$sql = "SELECT nomProd from producto where nomProd='$qpro'";
$res = mysqli_query($con,$sql);
$fil = mysqli_num_rows($res);
if ($fil==1)
{
	echo "1";
}
else{
	echo "0";
}
?>

