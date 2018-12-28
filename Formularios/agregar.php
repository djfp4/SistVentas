<?php
include '../Cab_pie/cabecera.php';
?>
<?php
	$codigo = $_REQUEST['qpro'];
	echo "<hr width='250'>
  <center><h1>Agregar más productos</h1></center>
  <hr width='250'>";
	$con=mysqli_connect("localhost", "root");
mysqli_select_db($con, "sistemaventas");
$sql="select * from producto where idProd = '$codigo'";
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

<body bgcolor="white">
	<center>
		<table>
<form name="modprod" action="../Consultas/agr_prod.php" method="GET">
	<input type="text" name="qidp" hidden="" value="<?php echo $codigo ?>">
	<tr><td>Cantidad:</td><td width="350"><input type="text" class="form-control input-sm" name="qcan" size=10 placeholder="Ingrese la cantidad" onkeypress="return validar(event)"></td></tr>
  <tr><td>Productor</td><td width="350"><input type="text" onkeypress="return soloLetras(event)" name="qpro" class="form-control input-sm" placeholder="Ingrese el nombre del productor"></td></tr>
    <tr><td colspan="2"></td></tr>
        <tr><td colspan="2" align="center"> <input type="submit" value="Procesar" class="btn btn-primary"></td></tr>
</form>
</table>
</center>
</body>