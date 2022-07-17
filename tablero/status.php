<?php
//conectar a la base 
$db = mysqli_connect('localhost', 'root', 'root', 'project');
//actualizar estado de los asientos
$id_bus = $_GET['id_bus'];
$seat = $_GET['seat'];
$cedula = $_GET['cedula'];
//actualizar dato
$query = "UPDATE `reserva` SET $seat = 1 WHERE id_bus = '$id_bus'";
$result = mysqli_query($db, $query);
//actualizar el número de asientos
if ($result) {
    $query2 = "UPDATE boleto set seats = seats + 1 WHERE cedula = '$cedula'";
    $result2 = mysqli_query($db, $query2);
    if ($result2) {
        //actualizar el precio del boleto
        $consultar = "SELECT precio FROM bus WHERE id = '$id_bus'";
        $resultado = mysqli_query($db, $consultar);
        $row = mysqli_fetch_array($resultado);
        $precio = $row['precio'];
        $query3 = "UPDATE boleto set valor = valor + $precio WHERE cedula = '$cedula'";
        $result3 = mysqli_query($db, $query3);
    }
}


//echo $query;
echo '<script>window.location.href="confirmar.php?ruta=' . $id_bus . '&cedula=' . $cedula . '"</script>';
