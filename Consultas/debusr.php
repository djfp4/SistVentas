<?php 
$qlog=$_REQUEST['id'];
$con = mysqli_connect("localhost","root");
mysqli_select_db($con,"sistemaventas");
$res=mysqli_query($con,"UPDATE usuario set estado='inhabilitado' where idUsua='$qlog'");
echo $res;
 ?>