<?php
include '../Cab_pie/cabecera.php';
?> 
<center>
  <hr width="250">
<h1>Devoluciones</h1>
<hr width="250"><br>
<?php
  $con=mysqli_connect("localhost","root");
  mysqli_select_db($con,"sistemaventas");
  $res=mysqli_query($con,"select t.idTrans,t.idUsua,c.nombre,p.nomProd,t.cant,t.fecTrans from transaccion t
  inner join cliente c on c.idCli=t.idCli inner join producto p on p.idProd=t.idProd where t.estado = 'inhabilitado'
  order by idTrans desc");
  echo "<div class='container'>";
  echo "<table class='table table-hover table-condensed table-bordered'>";
  echo "<tr><th>Id</th><th>Usuario</th><th>Cliente</th><th>Producto</th><th>Cantidad</th><th>Fecha</th></tr>";
  while (($reg=mysqli_fetch_row($res))!=null){
  	echo "<tr><td>";
  	 echo $reg[0] . "</td><td>" . $reg[1] . "</td><td>" . $reg[2] . "</td><td>" . $reg[3] . "</td><td>" . $reg[4] . "</td><td>" . $reg[5] . "</td></tr>"; 
  }
  echo "</table>";
  echo "</div>";
?>
