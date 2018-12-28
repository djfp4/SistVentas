<?php
	 $con=mysqli_connect("localhost","root");
  mysqli_select_db($con,"sistemaventas");
	$res=mysqli_query($con,"select t.idVent,t.idUsua,c.nombre,p.nomProd,t.cant,t.fecTrans,p.precioProd from ventaxprod t
  inner join cliente c on c.idCli=t.idCli inner join producto p on p.idProd=t.idProd");
  ?>
  <style type="text/css">
  	.btn btn-primary,
	.btn btn-primary:hover,
	.btn btn-primary :active {
  color: white;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  background-color: #007da7;
}
  	button{
  		color:#fff;
  	}
  	button a{
		text-decoration: none;
	}
  </style>
  

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<div class="row">
	<div class="col-sm-12">
		<h1>Ventas</h1>
		<br>
		<div>
				<button class="btn btn-primary" id="nuevo" data-toggle="modal" data-target="#modal1">Agregar</button>
		</div><br>
		<table class="table table-hover table-condensed table-bordered" id="tabla_t">
			
			<tr>
				<td>Usuario</td>
				<td>Cliente</td>
				<td>Producto</td>
				<td>Precio</td>
				<td>Cantidad</td>
				<td>Fecha</td>
				<td>Total</td>
				<td>Eliminar</td>
			</tr>
			<?php
				while ($reg=mysqli_fetch_row($res)) {
					$datos=$reg[0]."||".$datos=$reg[1]."||".$datos=$reg[2]."||".$datos=$reg[3]."||".$datos=$reg[4]."||".$datos=$reg[5];
					$tot=$reg[6]*$reg[4];
			?>
			<tr>
				<td><?php echo $reg[1];?></td>
				<td><?php echo $reg[2];?></td>
				<td><?php echo $reg[3];?></td>
				<td><?php echo $reg[6];?></td>
				<td><?php echo $reg[4];?></td>
				<td><?php echo $reg[5];?></td>
				<td id="montos"><?php echo $tot?></td>
				
				<td>
					<button class="btn btn-danger"><span><img src="../Imagenes/eliminar.png" width="20" height="20" onclick="preguntar('<?php echo $reg[0]?>','<?php echo $reg[3]?>','<?php echo $reg[4];?>')"></span></button>
				</td>
			</tr>
			
			<?php 
			}
			 ?>
			
		</table>
		<center><a class="btn btn_default btn-success btn-lg btn-block" href="../Consultas/regtrans.php">Vender</a></center>

	</div>
</div>