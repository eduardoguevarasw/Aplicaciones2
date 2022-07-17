<?php
$db = mysqli_connect("localhost", "root", "root", "project");
$id = $_GET['id'];
$sql = "SELECT * FROM boleto inner join reserva on boleto.id_reserva = reserva.id inner join bus on reserva.id_bus = bus.id WHERE boleto.id = '$id'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$id_reserva = $row['id_reserva'];
$id_bus = $row['id_bus'];
$cedula = $row['cedula'];
$placa = $row['placa'];
$numero = $row['numero'];
$ruta = $row['ruta'];
$hora = $row['hora'];
$precio = $row['precio'];
$seats = $row['seats'];
$valor = $row['valor'];
$pago = $row['pago'];
$fecha = $row['fecha'];
//extraer nombres del cliente
$sql2 = "SELECT * FROM cliente WHERE cedula = '$cedula'";
$result2 = mysqli_query($db, $sql2);
$row2 = mysqli_fetch_array($result2);
$nombre = $row2['nombres'];
$apellido = $row2['apellidos'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>

<body>
    <div>
        <h1>Boleto</h1>
        <h3>Coop "PATRIA"</h3>
        <h3>RIOBAMBA-ECUADOR</h3>
        <p>
            <strong>-----------------------------------</strong><br>
            <strong>ID:</strong> <?php echo $id; ?> <br>
            <strong>ID Reserva:</strong> <?php echo $id_reserva; ?> <br>
            <strong>ID Bus:</strong> <?php echo $id_bus; ?> <br>
            <strong>Cédula:</strong> <?php echo $cedula; ?> <br>
            <strong>Nombres:</strong> <?php echo $nombre; ?> <br>
            <strong>Apellidos:</strong> <?php echo $apellido; ?> <br>
            <strong>-----------------------------------</strong><br>
            <strong>-----DATOS DE LA RESERVA-----------</strong><br>
            <strong>Fecha:</strong> <?php echo $fecha; ?> <br>
            <strong>Placa:</strong> <?php echo $placa; ?> <br>
            <strong>Número:</strong> <?php echo $numero; ?> <br>
            <strong>Ruta:</strong> <?php echo $ruta; ?> <br>
            <strong>Hora:</strong> <?php echo $hora; ?> <br>
            <strong>Asientos:</strong> <?php echo $seats; ?> <br>
            <strong>-----------------------------------</strong><br>
            <strong>Valor:</strong> <?php echo $valor; ?> <br>
            <strong>Pago:</strong> <?php echo $pago; ?> <br>
            <strong>-----------------------------------</strong><br>
        </p>
    </div>
    <a href="javascript:window.print()"> Imprimir</a>
</body>

</html>