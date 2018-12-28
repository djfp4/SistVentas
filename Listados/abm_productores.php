<?php 
include '../Cab_pie/cabecera.php';
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"sistemaventas");
$res=mysqli_query($con,"SELECT p.nomProd, d.nomProductor, d.det_cant, d.fec_reg, d.idProd, d.id_det from det_prod d inner join producto p on p.idProd=d.idProd order by d.nomProductor ");
	echo "<div class='container'>";
	echo "<hr width=250><center><h1>Productores</h1></center><hr width=250>";
	?>
	<center>
	<table>
		<form action="rep_product.php">
			<tr>
				<td>Fecha de inicio : </td><td><input type="date" required="" name="feci" class="form-control"></td>
			</tr>
			<tr>
				<td>Fecha final : </td><td><input type="date" required="" name="fecf" class="form-control"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Filtrar" class="btn btn-primary btn-block"></td>
			</tr>
		</form>
	</table>
</center>
<hr width=250>
	<?php
	echo "<table class='table table-hover table-condensed table-bordered'>";
	echo "<tr><th>Producto</th><th>Productor</th><th>Cantidad</th><th>Fecha de registro</th><th>Editar</th></tr>";
	while ($reg=mysqli_fetch_row($res)) 
	{

		echo "<tr><td>".$reg[0]."</td><td>".$reg[1]."</td><td>".$reg[2]."</td><td>".$reg[3]."</td><td>";
		echo "<a href='../Formularios/edit_det.php?qdet=$reg[5]' class='btn btn-primary'><img src='../imagenes/editar.png' width=20 height=20></a></td></tr>";
		
	}
	echo "</table>";
 	echo "</div>";

 ?>