<?php
include '../Cab_pie/cabecera.php';
  $con = mysqli_connect("localhost","root");
  mysqli_select_db($con,"sistemaventas");
  $sql = mysqli_query($con,"SELECT idProd, nomProd, cant from producto where cant>0 and estado='habilitado'");
  $sql1 = mysqli_query($con,"select idCli, nombre, apellido, ci_nit from cliente");
?>
<html>
<head>

<script type="text/javascript">
  $(document).ready(function()
  {
    $("#tabla").load("../Listados/tabla.php");
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
      $("#guardar").click(function(){
          cliente=$("#cli").val();
          usuario=$("#usu").val();
          producto=$("#selec").val();
          cantidad=$("#cant").val();
          agregar(cliente,usuario,producto,cantidad);
      });
  });

   $(document).ready(function(){
        $("#selec").change(function () {
          $("#selec option:selected").each(function () {
            idProd = $(this).val();
            cantidad = $("#cant").val();
            $.post("../Consultas/precio.php", { idProd: idProd }, function(data){
              datos=parseInt(data);
              $("#tot").val(cantidad*datos);
              $("#prec").val(data);
            });          
          });
        })
      });

    $(document).ready(function(){
        $("#selec").change(function () {
          $("#selec option:selected").each(function () {
            idProd = $(this).val();
            cantidad = $("#cant").val();
            precio=$("#prec").val();
            $.post("../Consultas/stock.php", { idProd: idProd }, function(data){
              datos=parseInt(data);
              $("#stock").val(data);
            });          
          });
        })
      });

      $(document).ready(function(){
        $("#cant").change(function () {
          idProd=$("#selec").val();
            cant = $(this).val();
            precio = $("#prec").val();
                $("#tot").val(cant*precio);
          });
      });

      
</script>
<script type="text/javascript">
  function agregar(cliente,usuario,producto,cantidad)
  {
    cadena="cliente="+cliente+
           "&usuario="+usuario+
           "&producto="+producto+
           "&cantidad="+cantidad;

    $.ajax({
        type:"POST",
        url:"../Consultas/ventasxprod.php",
        data:cadena,
        success:function(r){
          if (r==1)
          {
            $("#tabla").load("../listados/tabla.php");
            alertify.success("Agregado correctamente");
          }
          else
          {
            alertify.error("No hay la cantidad deseada");
          }
        }
    });
  }

  function preguntar(id,producto,cantidad)
  {
    alertify.confirm('Eliminar','¿Esta seguro?', 
      function(){eliminar(id,producto,cantidad)},
      function(){alertify.error('Se cancelo')});
  }
  function eliminar(id,producto,cantidad)
  {
    cadena = "id="+id+
             "&producto="+producto+
             "&cantidad="+cantidad;

    $.ajax({
        type:"POST",
        url:"../Consultas/eliminar.php",
        data:cadena,
        success:function(r){
          if (r==1) {
            $("#tabla").load("../Listados/tabla.php");

            alertify.success("Eliminado con exito");
          }
          else{
            alertify.error("Fallo el servidor");
          }
        }
    });
  }

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
</script>
</head>
<body>
  

  <div class="container">
    <div id="tabla"></div>
  </div>


<!-- NUEVO -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ventas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <select class="form-control select-sm" id="cli">
                    <?php 
                    while ($datos2=mysqli_fetch_array($sql1)) {
                    ?>
                  <option value="<?php echo $datos2['idCli']?>">
                    <?php
                        echo $datos2['nombre'].' '.$datos2['apellido'].' '.$datos2['ci_nit'];
                    ?>
                  </option>
                  <?php
                }
                ?>
                </select>
              Usuario:<input type="text" class="form-control input-sm" id="usu" readonly size=15 value="<?php echo $_SESSION['usuario']?>">
              Producto:<select id="selec" class="form-control select-sm">
                  <option value="1">Elije una opción</option>
                    <?php 
                    while ($datos=mysqli_fetch_array($sql)) {
                    ?>
                  <option value="<?php echo $datos['idProd']?>">
                    <?php
                        echo $datos['nomProd'];
                    ?>
                  </option>
                <?php
                }
                ?>
                </select>
              Stock:<input type="text" class="form-control input-sm"  value="0" id="stock" readonly>
            Cantidad:<input type="text" class="form-control input-sm"  value="1" id="cant" required onkeypress="return validar(event)" id="can">
              Precio:<input type="text" class="form-control input-sm" id="prec" value="0"  readonly>
              Total:<input type="text" class="form-control input-sm" id="tot" value="0" readonly>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardar">
        Agregar al carrito
      </button>
      </div>
    </div>
  </div>
</div>


</body>
</html>
