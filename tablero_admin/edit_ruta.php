<?php
$id = $_POST['id'];
$placa = $_POST['placa'];
$numero = $_POST['numero'];
$ruta = $_POST['ruta'];
$hora = $_POST['hora'];
$precio = $_POST['precio'];
$db = mysqli_connect("localhost", "root", "root", "project");
$sql = "UPDATE bus SET placa='$placa', numero='$numero', ruta='$ruta', hora='$hora', precio='$precio' WHERE id='$id'";
$result = mysqli_query($db, $sql);
if ($result) {
  echo "<script>alert('Ruta actualizada correctamente');</script>";
  echo "<script>window.location.href='../tablero_admin/rutas.php';</script>";
} else {
  echo "<script>alert('Error al actualizar ruta');</script>";
  echo "<script>window.location.href='../rutas.php';</script>";
}
?>