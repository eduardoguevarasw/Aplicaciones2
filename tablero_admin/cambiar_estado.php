<?php
//conexion a la base de datos
$db = mysqli_connect("localhost", "root", "root", "project");
$cedula = $_GET['cedula'];
$estado = $_GET['estado'];

$consultar = "UPDATE boleto SET pago = '$estado' WHERE cedula='$cedula'";
$resultado = mysqli_query($db, $consultar);

if ($resultado) {
  //mostrar notificación y regresar 
    echo "<script>alert('Se ha actualizado el estado del pago');</script>";
    echo '<script>window.location.href="reservas.php"</script>';
} else {
    echo "<script>alert('No se ha actualizado el estado del pago');</script>";
}
?>