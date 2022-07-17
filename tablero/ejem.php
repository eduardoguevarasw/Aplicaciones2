<?php
$comprobante = $_POST['comprobante'];
$id_boleto = $_GET['id'];
if (isset($_POST['submit'])) {

    //conecta a base de datos
    $db = mysqli_connect('localhost', 'root', 'root', 'project');
    $sql = "Update boleto SET pago = $comprobante WHERE id = $id_boleto;";
    $result = mysqli_query($db, $sql);
    if ($result) {
        //mostrar notificación 
        echo '<srcipt>alert("Pago realizado con éxito")</script>';
    } else {
        echo '<srcipt>alert("Error")</script>';
    }
}
?>