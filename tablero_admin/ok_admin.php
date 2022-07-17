<?php
$db = mysqli_connect('localhost', 'root', 'root', 'project');
//guardar la ruta y la fecha en variables
$cedula = $_POST['cedula'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$password = $_POST['cedula'];
$telefono = 00000000;
$ruta = $_POST['ruta'];
$fecha = $_POST['fecha'];
//guardar en base de datos
$query = "INSERT INTO reserva (id_bus,fecha) VALUES ('$ruta', '$fecha')";
$result = mysqli_query($db, $query);
//consultar id de la reserva
if ($result) {
  $query3 = "SELECT * FROM reserva WHERE id_bus = '" . $ruta . "' AND fecha = '" . $fecha . "'";
  $result3 = mysqli_query($db, $query3);
  $row3 = mysqli_fetch_array($result3);
  $id_reserva = $row3['id'];
  $count = 0;
  $cliente = "INSERT INTO cliente (cedula,nombres,apellidos,telefono,password) VALUES ('$cedula', '$nombres', '$apellidos', '$telefono', '$password')";
  $resultado = mysqli_query($db, $cliente);

  if ($result3 && $resultado) {
    $query2 = "INSERT INTO boleto (id_reserva,cedula,seats) VALUES ('$id_reserva', '$cedula', '$count')";
    $result2 = mysqli_query($db, $query2);
    if($result2){
      echo '<script>alert("Seleccione los asientos")</script>';
      echo '<script>window.location.href="./confirmar.php?ruta='.$ruta.'&cedula='.$cedula.'"</script>';
    }else{
      echo '<script>alert("Error al realizar la reserva o ya existe una reserva")</script>';
      echo '<script>window.location.href="index.php"</script>';
    }
  }
}
?>
