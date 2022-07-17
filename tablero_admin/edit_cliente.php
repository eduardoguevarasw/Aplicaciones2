<?php
$cedula = $_POST['cedula'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$db = mysqli_connect("localhost", "root", "root", "project");
$sql = "UPDATE cliente SET cedula='$cedula', nombres='$nombres', apellidos='$apellidos', telefono='$telefono' WHERE cedula='$cedula'";
$result = mysqli_query($db, $sql);
if ($result) {
  echo "<script>alert('Cliente actualizado correctamente');</script>";
  echo "<script>window.location.href='../tablero_admin/clientes.php';</script>";
} else {
  echo "<script>alert('Error al actualizar ruta');</script>";
  echo "<script>window.location.href='../rutas.php';</script>";
}
?>