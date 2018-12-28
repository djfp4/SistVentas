<?php
include '../Cab_pie/cabecera.php';
?>
<meta charset="utf-8">
<script type="text/javascript">
   function preguntar(id)
  {
    alertify.confirm('Deshabilitar','¿Esta seguro?', 
      function(){eliminar(id)},
      function(){alertify.error('Se cancelo')});
  }
  function eliminar(id)
  {
    cadena = "id="+id;

    $.ajax({
        type:"POST",
        url:"../Consultas/debprod.php",
        data:cadena,
        success:function(r){
          if (r==1) {
            window.location.href='abm_prodd.php';
            alertify.success("Deshabilitado con exito");
          }
          else{
            alertify.error("Fallo el servidor");
          }
        }
    });
  }
</script>
<center>
  <hr width=250>
<h1>Productos activos</h1>
<hr width=250>
<table>
<form action="buscar_prod.php">
      <tr><td width="265"><input type="text" name="qbus" required="" id="qbus" class="form-control" placeholder="Ingrese el nombre del producto"></td><td>
      <input type="submit" value="Buscar" class="btn btn-primary"></td>
      <tr><td></td></tr>
</form>
</table><hr width=250>
<?php
  $con=mysqli_connect("localhost","root");
  mysqli_select_db($con,"sistemaventas");
  $res=mysqli_query($con,"SELECT p.idProd, p.nomProd, p.precioProd, p.precioVent, p.cant  from producto p where p.estado = 'habilitado'");
  echo "<div class='container'>";
  echo "<table class='table table-hover table-condensed table-bordered'>";
  echo "<tr><th>Nombre</th><th>Precio de producción</th><th>Precio de venta</th><th>Cantidad</th><th>Editar</th><th>Agregar</th><th>Mas detalles</th></tr>";
  while (($reg=mysqli_fetch_row($res))!=null){
    echo "<tr><td>";
    echo $reg[1] . "</td><td>" . $reg[2] . "</td><td>" . $reg[3] . "</td><td>". $reg[4] ."</td><td>"; 
    echo "<center><a href='../Formularios/editaprod.php?qpro=$reg[0]' class='btn btn-primary'><img src='../imagenes/editar.png' widht=25 height=25></a></center></td><td>";
    echo "<center><a href='../Formularios/agregar.php?qpro=$reg[0]' class='btn btn-primary'><img src='../imagenes/agregar.png' widht=25 height=25></a></center></td><td>";
     echo "<center><a href='abm_det.php?qpro=$reg[0]' class='btn btn-primary'><img src='../imagenes/detalles.png' widht=25 height=25></a></center></td><td>";
     ?>
     <button onclick="preguntar('<?php echo $reg[0] ?>')" class="btn btn-danger"><img src="../imagenes/eliminar.png" width="25" height="25"></button>
     <?php 
  }
   ?>
  </table>
  </div>
</center>
