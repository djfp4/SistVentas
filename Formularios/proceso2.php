<?php
  include '../Cab_pie/cabecera.php';
?>
<script type="text/javascript">

    $(document).ready(function(){
            $("#nombre").change(function(){
            //var log=document.getElementById('qlog').value;
            log = $("#nombre").val();
            if(log==""){
                   $("#prod").prop("disabled", true);
                   $("#venta").prop("disabled", true);
                   $("#productor").prop("disabled", true);
                   $("#cant").prop("disabled", true);
                   $("#continuar").prop("disabled", true);
                   $("#cancelar").prop("disabled", true);            
            }
            else{
                enviar(log);
            }
        function enviar(log)
        {
              cadena = "log="+log;

                $.ajax({
                    type:"POST",
                    url:"../Consultas/ver_prod.php",
                    data:cadena,
                    success:function(s){
                      if (s==0) { 
                                $("#prod").prop("disabled", false);
                                $("#venta").prop("disabled", false);
                                $("#productor").prop("disabled", false);
                                $("#cant").prop("disabled", false);
                                $("#continuar").prop("disabled", false);
                                $("#cancelar").prop("disabled", false);
                            }
                                 
                      else{
                                $("#prod").prop("disabled", true);
                                $("#venta").prop("disabled", true);
                                $("#productor").prop("disabled", true);
                                $("#cant").prop("disabled", true);
                                $("#continuar").prop("disabled", true);
                                $("#cancelar").prop("disabled", true);
                        alertify.error("El producto ya existe");
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

    patron=/[0-9]/;
    tecla_final=String.fromCharCode(tecla);
    return patron.test(tecla_final);
  }

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

<script type="text/javascript">
<!--
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
<hr width="250">
  <center><h1>NUEVO PRODUCTO</h1></center>
  <hr width="250">
                <table align="center">
                <form name="regprod" action="../Consultas/regprod.php" method="POST">
                <tr><td>Nombre:</td><td><input type="text" placeholder="Ingrese el nombre del producto" class="form-control input-sm" size="50" id="nombre" name="qnom" placeholder="Ingrese el nombre del producto"></td></tr>
                <tr><td>Precio de producción:</td><td><input disabled="" type="text" class="form-control input-sm" id="prod" name="qpre" placeholder="Ingrese el precio de producción" onkeypress="return filterFloat(event,this);"></td></tr>
                <tr><td>Precio de venta:</td><td><input disabled="" type="text" class="form-control input-sm" id="venta" name="qven" placeholder="Ingrese el precio de venta" onkeypress="return filterFloat(event,this);"></td></tr>
                <tr><td>Cantidad:</td><td><input disabled="" type="text" class="form-control input-sm" id="cant" name="qcan" onkeypress="return validar(event)" placeholder="Ingrese la cantidad"></td></tr>
                <tr><td>Productor:</td><td><input disabled="" type="text" id="productor" name="qnpr" placeholder="Ingrese el nombre del productor" onkeypress="return soloLetras(event)" class="form-control input-sm"></td></tr>
                <tr><td colspan=2><br><hr><br></td></tr>
                <tr><td><input disabled="" type="submit" value="Procesar" id="continuar" class="btn btn-primary"></td>
                    <td><input disabled="" type="reset" value="Limpiar" id="cancelar" class="btn btn-primary"></td></tr>
                </form>
                </table>
               

