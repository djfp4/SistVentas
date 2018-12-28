<?php
include '../Cab_pie/cabecera.php';
?> 
<center>
<?php
  $qbus=$_REQUEST['qbus'];
?>
<hr width=250>
<h1>Productos</h1>
<hr width=250>
<table>
<form action="buscar_prod.php" class="formu">
  <tr><td width="265"><input type="text" name="qbus" id="qbus" value="<?php echo $qbus ?>" class="form-control"></td>
  <td><input type="submit" value="Buscar" class="btn btn-primary"></td></tr>
</form>
</table>
<hr width=250>
<?php
  $con=mysqli_connect("localhost","root");
  mysqli_select_db($con,"sistemaventas");
  if (empty($qbus)) {
    header("location:abm_prod.php");
  }
  else{
  $res=mysqli_query($con,"SELECT idProd, nomProd, precioProd, precioVent, cant from producto where nomProd like '%$qbus%' and estado = 'habilitado' group by nomProd");
echo "<div class='container'>";
  echo "<table class='table table-hover table-condensed table-bordered'>";
   echo "<tr><th>Nombre</th><th>Precio de producción</th><th>Precio de venta</th><th>Cantidad</th><th>Editar</th><th>Agregar</th><th>Mas detalles</th></tr>";
  while (($reg=mysqli_fetch_row($res))!=null){
    echo "<tr><td>";
    echo $reg[1] . "</td><td>" . $reg[2] . "</td><td>" . $reg[3] . "</td><td>". $reg[4] ."</td><td>"; 
        echo "<center><a href='../Formularios/editaprod.php?qpro=$reg[0]' class='btn btn-primary'><img src='../imagenes/editar.png' widht=25 height=25></a></center></td><td>";
    echo "<center><a href='../Formularios/agregar.php?qpro=$reg[0]' class='btn btn-primary'><img src='../imagenes/agregar.png' widht=25 height=25></a></center></td><td>";
     echo "<center><a href='abm_det.php?qpro=$reg[0]' class='btn btn-primary'><img src='../imagenes/detalles.png' widht=25 height=25></a></center></td></tr>";
  }
  echo "</table>";
  echo "</div>";
}
?>
