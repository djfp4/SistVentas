<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
<script src="../bootstrap/js/bootstrap.js" "></script>
<style type="text/css">
  body{
    background: #E5C8FA; 
  }
</style>
	
</head>
<body>
	<br>
	<center>
	<table>
		
	<form action="../Login/validar.php" method="post">
		<tr><td align="center"><h1>Login</h1></td></tr>
		<tr><td><hr width="250"></td></tr>
		<tr><td align="center"><img src="../imagenes/logotipo.png" width="175" height="175"></td></tr>
		<tr><td><hr width="250"></td></tr>
		<tr><td width="250"><input type="text" name="usuario" class="form-control input-sm" placeholder="Ingrese su nombre de usuario" required></td></tr>
		<tr><td><br></td></tr>
		<tr><td width="250"><input type="password" class="form-control input-sm" name="pass" placeholder="Ingrese su contraseña" required></td></tr>
		<tr><td><br></td></tr>
		<tr><td align="center"><input type="submit" class="btn btn-primary" value="Ingresar"></td></tr>
	</form>
	</table>
	</center>
</body>
</html>