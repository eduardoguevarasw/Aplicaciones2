
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
        $id = $_GET['idruta'];
        //conectar a la base de datos
        $conexion = mysqli_connect("localhost", "root", "root", "project");
        $sql = "SELECT * FROM bus WHERE id = $id";
        $result = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <form method="POST" action="../tablero_admin/edit_ruta.php">
        <label for="id">ID</label>
        <input  class="form-control" type="text" name="id" value="<?php echo $row['id']; ?>" readonly>
        <label for="placa">Placa</label>
        <input  class="form-control" type="text" name="placa" value="<?php echo $row['placa']; ?>" required>
        <label for="numero">Número</label>
        <input  class="form-control" type="number" name="numero" value="<?php echo $row['numero']; ?>" maxlength="5" required >
        <label for="ruta">Ruta</label>
        <input  class="form-control" type="text" name="ruta" value="<?php echo $row['ruta']; ?>" required >
        <label for="precio">Precio</label>
        <input  class="form-control" step="0.1" type="number" name="precio" value="<?php echo $row['precio']; ?>" required >
        <label for="hora">Hora</label>
        <input  class="form-control" type="time" name="hora" value="<?php echo $row['hora']; ?>" required>
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