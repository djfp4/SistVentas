<?php
  include 'verificarSesion.php';
?>
<html>
<head>
<title>Sistema de Ventas</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="alertifyjs/css/themes/default.css">
<script language="javascript" src="jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js" "></script>
<script src="alertifyjs/alertify.js" "></script>
<style type="text/css">
  body{
    background: #E5C8FA; 
  }
  .collapse .navbar-nav .nav-item .text-primary:hover{
    background: #C8F6FA;
  }
  .collapse .navbar-nav .nav-item .text-success:hover{
    background: #D0FAC8;
  }
  .collapse .navbar-nav .nav-item .text-danger:hover{
    background: #FAC8C8;
  }
  h1{
    color: #08085F;
  }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<br>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="inicio.php"><img src="logotipo.png" width="55" height="55"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
               
                 <li><button class="btn btn-link"></button></li>
                 <li class="nav-item active"><a class="nav-link text-primary" href="../Formularios/proceso1.php">Nuevo usuario <span class="sr-only">(current)</span></a></li>
                 <li class="nav-item active"><a class="nav-link text-success" href="../Listados/abm_usr.php">Usuarios activos<span class="sr-only">(current)</span></a></li>
                 <li class="nav-item active"><a class="nav-link text-danger" href="../Listados/abm_usrd.php">Usuarios inactivos<span class="sr-only">(current)</span></a></li>
                 <li class="nav-item active"><a class="nav-link text-primary" href="../Formularios/proceso2.php">Agregar productos<span class="sr-only">(current)</span></a></li>
                 <li class="nav-item active"><a class="nav-link text-success" href="../Listados/abm_prod.php">Productos activos<span class="sr-only">(current)</span></a></li>
                 <li class="nav-item active"><a class="nav-link text-danger" href="../Listados/abm_prodd.php">Productos inactivos<span class="sr-only">(current)</span></a></li>
                 <li class="nav-item active"><a class="nav-link text-success" href="../Listados/abm_productores.php">Lista de productores<span class="sr-only">(current)</span></a></li>
                 <li class="nav-item active"><a class="nav-link text-primary" href="../Formularios/proceso4.php">Nuevo clientes<span class="sr-only">(current)</span></a></li>
                 <li class="nav-item active"><a class="nav-link text-success" href="../Listados/abm_cli.php">Clientes activos<span class="sr-only">(current)</span></a></li> 
                 <li class="nav-item active"><a class="nav-link text-danger" href="../Listados/abm_clid.php">Clientes inactivos<span class="sr-only">(current)</span></a></li> 
                 <li class="nav-item active"><a class="nav-link text-success" href="../Listados/abm_trans.php">Lista de ventas<span class="sr-only">(current)</span></a></li>
                 <li class="nav-item active"><a class="nav-link text-danger" href="../Listados/abm_dev.php">Lista de devoluciones<span class="sr-only">(current)</span></a></li>
                 <li><button class="btn btn-link"></button></li>
                 <li class="nav-item active"><a class="btn btn-primary" href="../Formularios/ventas.php"><img src="vender.png" width="40" height="40"><span class="sr-only">(current)</span></a></li>
                 <li><button class="btn btn-link"></button></li>
                 <li class="nav-item active"><a class="btn btn-danger" href="../Login/logout.php"><img src="cerrar1.png" width="40" height="40"><span class="sr-only">(current)</span></a></li>
   
    </ul>
  </div>
</nav>

<br>