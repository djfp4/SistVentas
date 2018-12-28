<?php
$qci=$_REQUEST['log'];
$con = mysqli_connect("localhost","root");
mysqli_select_db($con,"sistemaventas");
$sql = "SELECT ci_nit from cliente where ci_nit='$qci'";
$res = mysqli_query($con,$sql);
$fil = mysqli_num_rows($res);
if ($fil==1) 
{
	echo "1";
}
else
{
	echo "0";
}
?>
