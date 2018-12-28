<?php
	$qid = $_POST['idProd'];
	$con = mysqli_connect("localhost","root");
  	mysqli_select_db($con,"sistemaventas");
	$sql = mysqli_query($con,"SELECT cant from producto where idProd=$qid");
	$rowM = mysqli_fetch_array($sql);
	
	if ($qid==0) {
		$res=0;
	}
	else $res=$rowM['cant'];
	echo $res;
?>