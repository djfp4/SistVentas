<?php
include '../Cab_pie/cabecera.php';
?>
<?php
	$codigo = $_REQUEST['qid'];
	echo "<center><h1>Bienvenido a la edici&oacuten </h1></center><br>";
	$con=mysqli_connect("localhost", "root");
mysqli_select_db($con, "sistemaventas");
$sql="select * from cliente where idCli = '$codigo'";
$res = mysqli_query($con, $sql);
$reg=mysqli_fetch_row($res);
?>
<body>
	<center>
		<table>
<form name="modcli" action="../Consultas/modcli.php" method="GET">
	<tr><td></td><td><input type="text" name="qid" required="" class="form-control input-sm" value="<?php echo $reg[0]; ?>" readonly hidden></td></tr> 
	<tr><td>Nombre: </td><td><input type="text" name="qnom" required="" class="form-control input-sm" size="40" value="<?php echo $reg[1]; ?>"></td></tr>
	<tr><td>Apellido: </td><td><input type="text" name="qape" required="" class="form-control input-sm" value="<?php echo $reg[2]; ?>"></td></tr>
	<tr><td>CI/NIT:</td><td><input type="text" readonly="" class="form-control input-sm" name="qci" size=10 value="<?php echo $reg[3]; ?>"></td></tr>
	<tr><td colspan="2"><hr></td></tr>
        <tr><td colspan="2" align="center"> <input type="submit" class="btn btn-primary" value="Procesar"></td></tr>
</form>
</table>
</center>
</body>

