<?php 
include '../Cab_pie/cabecera.php';
$qpro=$_REQUEST['qpro'];
$qprod=$_REQUEST['qprod'];
$con = mysqli_connect("localhost","root");
mysqli_select_db($con,"sistemaventas");
$res=mysqli_query($con,"SELECT p.nomProd, d.nomProductor, d.det_cant, d.fec_reg, d.idProd from det_prod d inner join producto p on p.idProd=d.idProd 
	where p.idProd = $qpro and d.nomProductor like '%$qprod%' order by fec_reg desc");
	echo "<div class='container'>";
	echo "<hr width=250><center><h1>Productores</h1></center><hr width=250><br>";
	?>
	<center>
		<table>
			<form action="bus_produ.php">
				<tr><td colspan="2"><input type="text" name="qpro" hidden=""></td></tr>
				<tr><td width="260"><input type="text" name="qprod" class="form-control insput-sm" placeholder="Ingrese el nombre del productor"></td>
					<td><input type="submit" value="Buscar" class="btn btn-primary"></td></tr>
			</form>
		</table>
	</center><br><hr width=250><br>
	<?php
	echo "<table class='table table-hover table-condensed table-bordered'>";
	echo "<tr><th>Producto</th><th>Productor</th><th>Cantidad</th><th>Fecha de registro</th><th>Editar</th></tr>";
	while ($reg=mysqli_fetch_row($res)) 
	{

		echo "<tr><td>".$reg[0]."</td><td>".$reg[1]."</td><td>".$reg[2]."</td><td>".$reg[3]."</td><td>";
		echo "<a href='../Formularios/edit_det.php?qdet=$reg[4]' class='btn btn-primary'><img src='../imagenes/editar.png' width=20 height=20></a></td></tr>";
		
	}
	echo "</table>";
 	echo "</div>";
 ?>