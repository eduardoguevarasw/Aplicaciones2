<?php
$db = mysqli_connect('localhost', 'root', 'root', 'project');
$placa = $_POST['placa'];
$numero = $_POST['numero'];
$ruta = $_POST['ruta'];
$hora = $_POST['hora'];
$precio = $_POST['precio'];
//conectar a la base de datos
echo $placa;
echo $numero;
echo $ruta;
echo $hora;
echo $precio;
$query = "INSERT INTO bus (placa, numero, ruta, precio, hora) VALUES ('$placa', '$numero', '$ruta', '$precio', '$hora')";
$result = mysqli_query($db, $query);
if ($result) {
    echo '<div class="alert alert-success" role="alert">Ruta registrada con éxito.</div>';
    echo '<script>window.location.href="rutas.php"</script>';
} else {
    echo '<div class="alert alert-danger" role="alert">Ocurrio un error!</div>';
}
