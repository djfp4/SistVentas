<?php
 include '../Cab_pie/cabecera.php';
 $usr=$_SESSION['usuario'];
    $con=mysqli_connect("localhost","root");
    mysqli_select_db($con,"sistemaventas");
    $sql="SELECT cargo FROM usuario where idUsua='$usr' and cargo='Administrador'";
    $res=mysqli_query($con,$sql);
    $fil=mysqli_num_rows($res);

    if ($fil==0) 
    {
        echo '<script type="text/javascript">
        alertify.error("Debe ser administrador");
        window.location.href="../Formularios/ventas.php";
        </script>';
    }
 ?>
<script type="text/javascript">
   function preguntar(id)
  {
    alertify.confirm('Deshabilitar','¿Esta seguro?', 
      function(){eliminar(id)},
      function(){alertify.error('Se cancelo')});
  }
  function alerta()
  {
    alert('alerta');
  }
  function eliminar(id)
  {
    cadena = "id="+id;

    $.ajax({
        type:"POST",
        url:"../Consultas/debusr.php",
        data:cadena,
        success:function(r){
          if (r==1) {
            window.location.href='abm_usr.php';
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
  <hr width="225">
<h1>Usuarios activos</h1>
<hr width="225">

<?php
  $con=mysqli_connect("localhost","root");
  mysqli_select_db($con,"sistemaventas");
  $res=mysqli_query($con,"SELECT * from usuario where estado = 'habilitado' order by idUsua ");
  echo "<div class='container'>";
  echo "<table class='table table-hover table-condensed table-bordered' id='tabla'>";

  echo "<tr><th>Usuario</th><th>Nombre</th><th>Apellidos</th><th>Fecha de nac.</th><th>CI</th><th>Cargo</th><th>Direccion</th><th>Fecha de registro</th><th>Editar</th><th>Deshabilitar</th></tr>";
  ?>
  <?php
  while (($reg=mysqli_fetch_row($res))!=null){
    ?>
  	<tr><td>
  	 <?php echo $reg[0] ?></td><td><?php echo $reg[2] ?></td><td><?php echo $reg[3] ?></td><td><?php echo $reg[4] ?></td><td><?php echo $reg[5] ?></td><td><?php echo $reg[6] ?></td><td><?php echo $reg[7] ?></td><td><?php echo $reg[8] ?></td><td>
     <?php echo"<a href='../Formularios/editausr.php?qlog=$reg[0]' class='btn btn-primary'><img src='../imagenes/editar.png' widht=25 height=25></a></td><td>";?>
     <center><button onclick="preguntar('<?php echo $reg[0] ?>')" class='btn btn-danger'><img src='../imagenes/eliminar.png' widht=25 height=25 ></button></center></td></tr>
     <?php
  }
  ?>
  </table>
  </div>

