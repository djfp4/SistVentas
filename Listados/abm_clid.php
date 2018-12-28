 <?php
include '../Cab_pie/cabecera.php';
?> 
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
        url:"habcli.php",
        data:cadena,
        success:function(r){
          if (r==1) {
            window.location.href='abm_cli.php';
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
  <hr width="250">
<h1>Clientes inactivos</h1>
<hr width="250">
<?php
  $con=mysqli_connect("localhost","root");
  mysqli_select_db($con,"sistemaventas");
  $res=mysqli_query($con,"select * from cliente where estado = 'inhabilitado'");
  echo "<div class='container'>";
  echo "<table class='table table-hover table-condensed table-bordered'>";
  echo "<tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>CI/NIT</th><th>Habilitar</th></tr>";
  while (($reg=mysqli_fetch_row($res))!=null){
  	echo "<tr><td>";
  	 echo $reg[0] . "</td><td>" . $reg[1] . "</td><td>" . $reg[2] . "</td><td>" . $reg[3] . "</td><td>"; 
    
     ?>
     <center><button onclick="preguntar('<?php echo $reg[0]; ?>')" class='btn btn-success'><img src='../imagenes/habilitar.png' widht=25 height=25></button></center></td></tr>
     <?php
  }
  ?>
  </table>
  </div>

