<?php
    include '../Cab_pie/cabecera.php';
    $usr=$_SESSION['usuario'];
    $con=mysqli_connect("localhost","root");
    mysqli_select_db($con,"sistemaventas");
    $sql="SELECT cargo FROM usuario where idUsua='$usr' and cargo='Administrador'";
    $res=mysqli_query($con,$sql);
    $fil=mysqli_num_rows($res);

    if ($fil==0) 
    {
        echo '<script type="text/javascript">
        alertify.error("Debe ser administrador");
        window.location.href="ventas.php";
        </script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script type="text/javascript">
        
        $(document).ready(function(){
            $("#login").change(function(){
            //var log=document.getElementById('qlog').value;
            log = $("#login").val();
            if(log==""){
                   $("#clave").prop("disabled", true);
                   $("#nombre").prop("disabled", true);
                   $("#apell").prop("disabled", true);
                   $("#fec").prop("disabled", true);
                   $("#ci").prop("disabled", true);
                   $("#cargo").prop("disabled", true);
                   $("#dir").prop("disabled", true);
                   $("#continuar").prop("disabled", true);
                   $("#limpiar").prop("disabled", true);            
            }
            else{
                enviar(log);
            }
        function enviar(log)
        {
              cadena = "log="+log;

                $.ajax({
                    type:"POST",
                    url:"../Consultas/verusua.php",
                    data:cadena,
                    success:function(s){
                      if (s=="0") { 
                                $("#clave").prop("disabled", false);
                                $("#nombre").prop("disabled", false);
                                $("#apell").prop("disabled", false);
                                $("#fec").prop("disabled", false);
                                $("#ci").prop("disabled", false);
                                $("#cargo").prop("disabled", false);
                                $("#dir").prop("disabled", false);
                                $("#continuar").prop("disabled", false);
                                $("#limpiar").prop("disabled", false);
                            }
                                 
                      else{
                                $("#clave").prop("disabled", true);
                                $("#nombre").prop("disabled", true);
                                $("#apell").prop("disabled", true);
                                $("#fec").prop("disabled", true);
                                $("#ci").prop("disabled", true);
                                $("#cargo").prop("disabled", true);
                                $("#dir").prop("disabled", true);
                                $("#continuar").prop("disabled", true);
                                $("#limpiar").prop("disabled", true);
                        alertify.error("El usuario ya existe");
                      }
                    }
                });
        }
            });
        });

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
    <hr width="250">
    <CENTER><H1>NUEVO USUARIOS</H1></CENTER>
    <hr width="250">
                <table align="center">
                <form name="regusr" action="../Consultas/regusr.php" method="POST">
                <tr><td>Login:</td><td><input required type="text" name="qlog" class="form-control input-sm" required placeholder="Ingrese su nombre usuario" id="login"></td></tr>
                <tr><td>Clave:</td><td><input required type="password" class="form-control input-sm" disabled="true" name="qcla" placeholder="Ingrese su contrase&ntilde;a" id="clave"></td><td></td></tr>
                <tr><td>Nombre:</td><td><input required id="nombre" type="text" class="form-control input-sm" disabled="true" name="qnom" placeholder="Ingrese su nombre" onkeypress="return soloLetras(event)"></td><td></td></tr>
                <tr><td>Apellido:</td><td><input required id="apell" type="text" class="form-control input-sm" disabled="true" name="qape" placeholder="Ingrese su apellido" onkeypress="return soloLetras(event)"></td><td></td></tr>
                <tr><td>Fecha de nac.:</td><td><input required id="fec" type="date" class="form-control input-sm" disabled="true" name="qfec"></td><td></td></tr>
                <tr><td>CI:</td><td><input required id="ci" type="text" name="qci" class="form-control input-sm" disabled="true" placeholder="Ingrese su CI o NIT"></td><td></td></tr>
                <tr><td>Cargo:</td><td>
                    <select  disabled="true" name="qcar" id="cargo" class="form-control input-sm">
                        <option>Administrador</option>
                        <option>Vendedor</option>
                    </select></td><td></td></tr>
                <tr><td>Direcci&oacute;n:</td><td><input required id="dir" type="text" class="form-control input-sm" disabled="true" name="qdir" placeholder="Ingrese su direcci&oacute;n"></td><td></td></tr>
                <tr><td colspan=2><br><hr><br></td></tr>
                <tr><td><input type="submit" value="Procesar" class="btn btn-primary" disabled="true" id="continuar"></td><td align="right"><input type="reset" class="btn btn-primary" disabled="true" value="Limpiar" id="limpiar"></td></tr>
                </form>
           </table>
</body>
</html>
