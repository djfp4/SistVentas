<?php
include '../Cab_pie/cabecera.php';
?>
<?php
	$codigo = $_REQUEST['qpro'];
	echo "<center><h1>Bienvenido a la edici&oacuten </h1></center><br>";
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
</script>

<script type="text/javascript">
function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }  
}
</script>
<body bgcolor="white">
	<center>
		<table>
<form name="modprod" action="../Consultas/modprod.php" method="GET">
	<tr><td></td><td><input type="text" name="qidp" hidden value="<?php echo $codigo ?>" ></td></tr>
	<tr><td>Nombre: </td><td><input type="text" class="form-control input-sm" required name="qnom" size="40" value="<?php echo $reg[1]; ?>"></td></tr>
	<tr><td>Precio de producción: </td><td><input type="text" onkeypress="return filterFloat(event,this);" class="form-control input-sm" required name="qpre" value="<?php echo $reg[2]; ?>"></td></tr>
	<tr><td>Precio de venta:</td><td><input type="text" onkeypress="return filterFloat(event,this);" name="qven" class="form-control input-sm" required value="<?php echo $reg[3]?>"></td></tr>
	<tr><td></td><td><input type="text" hidden="" class="form-control input-sm" required name="qcan" size=10 value="<?php echo $reg[4]; ?>" onkeypress="return validar(event)" readonly></td></tr>
    <tr><td colspan="2"></td></tr>
        <tr><td colspan="2" align="center"> <input type="submit" value="Procesar" class="btn btn-primary"></td></tr>
</form>
</table>
</center>
</body>

