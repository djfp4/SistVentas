 <?php
 $qid = $_REQUEST['id'];
 $con = mysqli_connect("localhost","root");
 mysqli_select_db($con,"sistemaventas");
 $sql1 = mysqli_query($con,"SELECT idProd, cant from transaccion where idTrans=$qid");
 $res=mysqli_fetch_array($sql1);
 $qidp=$res[0];
 $cant=$res[1];
 $sql2 = mysqli_query($con,"UPDATE transaccion set estado ='inhabilitado' where idTrans = $qid");
 $sql3 = mysqli_query($con,"UPDATE producto set cant = cant+$cant where idProd= $qidp");
 echo $sql3;
 ?>
