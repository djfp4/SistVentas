<?php 
	include '../Cab_pie/cabecera.php';
	$qidd=$_REQUEST['qdet'];
	$con=mysqli_connect("localhost","root");
	mysqli_select_db($con,"sistemaventas");
	$res=mysqli_query($con,"SELECT p.nomProd, d.nomProductor, d.det_cant from det_prod d inner join producto p on p.idProd=d.idProd where d.id_det=$qidd");
	$reg=mysqli_fetch_row($res);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<script type="text/javascript">
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
 </head>
 <body>
 	<center>
 		<hr width="350">
 		<h1>Edición de productor</h1>
 		<hr width="350">
 	<table>
 		<form action="../Consultas/moddet.php">
 			<tr><td colspan="2"><input type="text" name="qdet" hidden="" value="<?php echo $qidd ?>"></td></tr>
 			<tr><td>Nombre del producto :</td><td><input type="text" class="form-control input-sm" readonly="" value="<?php echo $reg[0] ?>"></td></tr>
 			<tr><td>Nombre del productor :</td><td><input type="text" class="form-control input-sm" name="qnom" value="<?php echo $reg[1] ?>" onkeypress="return soloLetras(event)" required></td></tr>
 			<tr><td></td><td><input readonly="" hidden="" type="text" class="form-control input-sm" name="qcan" value="<?php echo $reg[2] ?>" required></td></tr>
 			<tr><td colspan="2"><hr width="350"></td></tr>
 			<tr><td align="center"><input type="submit" value="Continuar" class="btn btn-primary"></td><td align="center"><a href="abm_prod.php" class="btn btn-primary">Cancelar</a></td></tr>
 		</form>
 	</table>
 </center>
 </body>
 </html>