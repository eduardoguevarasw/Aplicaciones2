<?php
//login de usuario
$db = mysqli_connect('localhost', 'root', 'root', 'project');
$cedula = $_POST['cedula'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];
$sql = "INSERT INTO cliente (cedula, nombres, apellidos, telefono, password) VALUES ('$cedula', '$nombres', '$apellidos', '$telefono', '$password')";
$result = mysqli_query($db, $sql);
if ($result) {
    //mostrar alert 
    echo '<script>alert("Usuario registrado correctamente");</script>';
    session_start();
    $_SESSION['cedula'] = $cedula;
    echo '<script>window.location.href="../tablero/reservar.php";</script>';
}
else{
    echo '<script>alert("Error al registrar usuario o ya existe");</script>';
    echo '<script>window.location.href="../login/registrar_usuario.php";</script>';
}
