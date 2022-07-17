
<?php
//conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "root";
$db = "project";
$conexion = mysqli_connect($host, $user, $pass, $db);
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo "Conexión exitosa";
}
?>