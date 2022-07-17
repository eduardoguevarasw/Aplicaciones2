
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Checkout example · Bootstrap v5.0</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">



  <!-- Bootstrap core CSS -->
  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container">
    <main>
      <div class="py-5 text-center">
        <h2>Editar</h2>
        <?php
        $cedula = $_GET['cedula'];
        //conectar a la base de datos
        $conexion = mysqli_connect("localhost", "root", "root", "project");
        $sql = "SELECT * FROM cliente WHERE cedula = $cedula";
        $result = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <form method="POST" action="../tablero_admin/edit_cliente.php">
        <label for="id">Cédula</label>
        <input  class="form-control" type="text" name="cedula" value="<?php echo $row['cedula']; ?>" readonly>
        <label for="placa">Nombres</label>
        <input  class="form-control" type="text" name="nombres" value="<?php echo $row['nombres']; ?>" required>
        <label for="numero">Apellidos</label>
        <input  class="form-control" type="text" name="apellidos" value="<?php echo $row['apellidos']; ?>"  required >
        <label for="ruta">Telefono</label>
        <input  class="form-control" type="text" name="telefono" value="<?php echo $row['telefono']; ?>" required >
        <br>
        <button class="btn btn-primary" type="submit">Editar</button>
        </form>
      </div>
    </main>

  </div>


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="form-validation.js"></script>
</body>

</html>