<?php
  include '../Cab_pie/cabecera.php';
  $con=mysqli_connect("localhost","root");
  mysqli_select_db($con,"sistemaventas");
  $sql=mysqli_query($con,"SELECT idCli, nombre, apellido, ci_nit from cliente");
?>

<script type="text/javascript">
   function preguntar(id)
  {
    alertify.confirm('Devolver','¿Esta seguro?', 
      function(){eliminar(id)},
      function(){alertify.error('Se cancelo')});
  }
  function eliminar(id)
  {
    cadena = "id="+id;

    $.ajax({
        type:"POST",
        url:"../Consultas/editartrans.php",
        data:cadena,
        success:function(r){
          if (r==1) {
            window.location.href='abm_dev.php';
            alertify.success("Devuelto con exito");
          }
          else{
            alertify.error("Fallo el servidor");
          }
        }
    });
  }
</script>
<center>
<h1>Ventas</h1>
<hr width="300">
<table>
<form action="rep_trans.php">
        <tr><td>Fecha de inicio :</td><td><input type="date" name="feci" class="form-control" required=""></td></tr>
        <tr><td>Fecha final :</td><td><input type="date" name="fecf" class="form-control" required=""></td></tr>
  <tr><td colspan="2"><input type="submit" value="Buscar por fecha" class="btn btn-primary btn-block"></td></tr>
</form>
</table>
<hr width="300">
<?php
  $res=mysqli_query($con,"select t.idTrans,t.idUsua,c.nombre,p.nomProd,t.cant,t.fecTrans from transaccion t
  inner join cliente c on c.idCli=t.idCli inner join producto p on p.idProd=t.idProd where t.estado = 'habilitado'
  order by idTrans desc");
  $r=mysqli_query($con,"select sum(p.precioVent*t.cant)-sum(p.precioProd*t.cant) as ganancias
    from transaccion t 
    inner join producto p on p.idProd=t.idProd
    where t.estado='habilitado'");
  $g=mysqli_fetch_row($r);
  $r2=mysqli_query($con,"select sum(p.precioVent*t.cant) as ganancias
    from transaccion t 
    inner join producto p on p.idProd=t.idProd
    where t.estado='habilitado'");
  $t=mysqli_fetch_row($r2);
    echo "
        <td><div class='text-primary'><h2>"."<span class='text-dark'>Total vendido : </span>".$t[0]." Bs."."</h2></div></td>
        <td><div class='text-success'><h2>"."<span class='text-dark'>Ganacias : </span>+".$g[0]." Bs."."</h2></div></td>
      <br>";
  echo "<div class='container'>";
  echo "<table class='table table-hover table-condensed table-bordered'>";
  echo "<tr><th>Id</th><th>Usuario</th><th>Cliente</th><th>Producto</th><th>Cantidad</th><th>Fecha</th><th>Devolver</th></tr>";
  while (($reg=mysqli_fetch_row($res))!=null){
  	echo "<tr><td>";
  	 echo $reg[0] . "</td><td>" . $reg[1] . "</td><td>" . $reg[2] . "</td><td>" . $reg[3] . "</td><td>" . $reg[4] . "</td><td>" . $reg[5] . "</td><td>"; 
     ?>
     <center><button onclick="preguntar('<?php echo $reg[0] ?>')" class='btn btn-primary'><img src='../imagenes/devolver1.png' widht=30 height=25></a></center></td></tr>
      <?php
  }

  echo "</table>";
  echo "</div>";
  
?>
