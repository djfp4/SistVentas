<?php
include '../Cab_pie/cabecera.php';
?>
<meta charset="utf-8">
<script type="text/javascript">
   function preguntar(id)
  {
    alertify.confirm('Habilitar','¿Esta seguro?', 
      function(){eliminar(id)},
      function(){alertify.error('Se cancelo')});
  }
  function eliminar(id)
  {
    cadena = "id="+id;

    $.ajax({
        type:"POST",
        url:"../Consultas/habprod.php",
        data:cadena,
        success:function(r){
          if (r==1) {
            window.location.href='abm_prod.php';
            alertify.success("Habilitado con exito");
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
<h1>Productos inactivos</h1>
<hr width=250>

<?php
  $con=mysqli_connect("localhost","root");
  mysqli_select_db($con,"sistemaventas");
  $res=mysqli_query($con,"SELECT p.idProd, p.nomProd, p.precioProd, p.precioVent, p.cant  from producto p where p.estado = 'inhabilitado'");
  echo "<div class='container'>";
  echo "<table class='table table-hover table-condensed table-bordered'>";
  echo "<tr><th>Nombre</th><th>Precio de producción</th><th>Precio de venta</th><th>Cantidad</th><th>Mas detalles</th><th>Habilitar</th></tr>";
  while (($reg=mysqli_fetch_row($res))!=null){
    echo "<tr><td>";
    echo $reg[1] . "</td><td>" . $reg[2] . "</td><td>" . $reg[3] . "</td><td>". $reg[4] ."</td><td>"; 
         echo "<center><a href='abm_det.php?qpro=$reg[0]' class='btn btn-primary'><img src='../imagenes/detalles.png' widht=25 height=25></a></center></td><td>";
    ?>
     <center><button onclick="preguntar('<?php echo $reg[0] ?>')" class="btn btn-success"><img src="../imagenes/habilitar.png" width="25" height="25"></button></center></td></tr>
     <?php 
  }
   ?>
  </table>
  </div>
</center>
