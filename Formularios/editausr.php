<?php
include '../Cab_pie/cabecera.php';
?>
<?php
	$codigo = $_REQUEST['qlog'];
	echo "<center><h1>Bienvenido a la edici&oacuten </h1></center><br>";
	$con=mysqli_connect("localhost", "root");
mysqli_select_db($con, "sistemaventas");
$sql="select idUsua,sha1(clave),nombre,apellido,fechaNac,ci,cargo,direccion from usuario where idUsua = '$codigo'";
$res = mysqli_query($con, $sql);
$reg=mysqli_fetch_row($res);
?>
<script type="text/javascript">
	function validar(e)
          {
            tecla=(document.all) ? e.keyCode : e.which;

            if (tecla==8) 
            {
              return true;
            }

            patron=/[0-9]/;
            tecla_final=String.fromCharCode(tecla);
            return patron.test(tecla_final);
          }

          function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
<center>
<table>
<form name="modusr" action="../Consultas/modusr.php" method="POST">
	<tr><td>Login:</td><td> <input type="text" name="qlog" required class="form-control input-sm" value="<?php echo $reg[0]; ?>" readonly=""> </td></tr>
	<tr><td>Clave:</td><td> <input type="password" name="qcla" required class="form-control input-sm" value="<?php echo $reg[1]; ?>"></td></tr>
	<tr><td>Nombre:</td><td> <input type="text" name="qnom" required onkeypress="return soloLetras(event)" class="form-control input-sm" value="<?php echo $reg[2]; ?>"></td></tr>
	<tr><td>Apellido:</td><td> <input type="text" name="qape" onkeypress="return soloLetras(event)" required class="form-control input-sm" value="<?php echo $reg[3]; ?>"></td></tr>
	<tr><td>Fecha de nac.:</td><td><input type="date" name="qfec" required class="form-control input-sm"  value="<?php echo $reg[4]; ?>"></td></tr>
    <tr><td>CI:</td><td><input type="text" onkeypress="return validar(event)" name="qci"  required  class="form-control input-sm" value="<?php echo $reg[5]; ?>"></td></tr>
    <tr><td>Cargo:</td><td><input disabled="true" type="text" class="form-control input-sm" name="qcar" required  value="<?php echo $reg[6]; ?>"></td></tr>
    <tr><td>Direccion:</td><td><input type="text" name="qdir" required class="form-control input-sm" value="<?php echo $reg[7]; ?>"></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" value="Procesar" class="btn btn-primary"></td></tr>   
</form>
</table>
</center>
