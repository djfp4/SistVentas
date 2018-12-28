<?php
include '../Cab_pie/cabecera.php';
?>
<script type="text/javascript">
	  $(document).ready(function(){
            $("#ci").change(function(){
            //var log=document.getElementById('qlog').value;
            log = $("#ci").val();
            if(log==""){
                   $("#nombre").prop("disabled", true);
                   $("#apell").prop("disabled", true);
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
                    url:"../Consultas/vercli.php",
                    data:cadena,
                    success:function(s){
                      if (s=="0") { 
                                $("#nombre").prop("disabled", false);
                                $("#apell").prop("disabled", false);
                                $("#continuar").prop("disabled", false);
                                $("#limpiar").prop("disabled", false);
                            }
                                 
                      else{
                                $("#nombre").prop("disabled", true);
                                $("#apell").prop("disabled", true);
                                $("#continuar").prop("disabled", true);
                                $("#limpiar").prop("disabled", true);
                        alertify.error("El cliente ya existe");
                      }
                    }
                });
        }
            });
        });
        

        function validar(e)
          {
            tecla=(document.all) ? e.keyCode : e.which;

            if (tecla==8) 
            {
              return true;
            }
            patron=/[A-Za-zÑ-ñ]/;
            tecla_final=String.fromCharCode(tecla);
            return patron.test(tecla_final);
          }

          function validarn(e)
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
<hr width="250">
<center><h1>NUEVO CLIENTE</h1></center>
<hr width="250">
<table align="center">
 <form name="regcli" action="../Consultas/regcli.php" method="POST">
 				<tr><td>CI/NIT:</td><td><input id="ci" type="text" class="form-control input-sm" name="qci" placeholder="Ingrese su CI o NIT" onkeypress="return validarn(event)"></td></tr>
                <tr><td>Login:</td><td><input id="login" type="text" class="form-control input-sm"  name="qlog" value="<?php echo $_SESSION['usuario']?>" readonly></td></tr>
                <tr><td>Nombre:</td><td><input id="nombre" type="text" class="form-control input-sm" name="qnom" placeholder="Ingrese su nombre" disabled="true" onkeypress="return validar(event)"></td></tr>
                <tr><td>Apellido:</td><td><input id="apell" type="text" class="form-control input-sm" name="qape" placeholder="Ingrese su apellido" disabled="true" onkeypress="return validar(event)"></td></tr>
                <tr><td colspan=2><br><hr><br></td></tr>
                <tr><td colspan="2" align="center"><input id="continuar" type="submit" disabled="true" class="btn btn-primary" value="Procesar" disabled="true"></td></tr>
                </form>
        </table>