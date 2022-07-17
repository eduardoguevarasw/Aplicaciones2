<?php
$_SESSION['cedula'] = $cedula;
$_SESSION['nombre'] = $row['nombre'];
$_SESSION['apellido'] = $row['apellido'];
$usuario = 'root';
$password = 'root';
$db = new PDO('mysql:host=localhost;dbname=project', $usuario, $password);
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Dashboard Template · Bootstrap v5.0</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



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
  <link href="dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Coop Patria</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="../index.php">Cerrar Sesión </a> 
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="./reservar.php">
                <span data-feather="shopping-cart"></span>
                Reservar
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./historial.php">
                <span data-feather="list"></span>
                Historial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./imprimir.php">
                <span data-feather="file-text"></span>
                Imprimir
              </a>
            </li>
          </ul>

        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Tablero</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
             
            </div>

          </div>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
          <form method="POST" action="ok.php">
            <h1 class="h4">Seleccione la ruta</h1>
            <select name="ruta" class="form-control">
              <option value="">Seleccione:</option>
              <?php

              $query = $db->prepare("SELECT * FROM bus");
              $query->execute();
              $data = $query->fetchAll();

              foreach ($data as $valores) :
                echo '<option value="' . $valores["id"] . '">' . $valores["ruta"] . '-[' . $valores["hora"] . ']</option>';
              endforeach;
              ?>
            </select>
            <br>
            <h1 class="h4">Seleccione una fecha</h1>
            <input type="date" name="fecha" class="form-control" id="fecha" min="<?php date_default_timezone_set("America/Guayaquil");
                                                                                  echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>" required>

        </div>
        <br><br>
        <div>
          <h4>Datos del usuario</h4>
          <?php
          session_start();
          //echo '<p>Cedula: ' . $_SESSION['cedula'] . '</p>';

          $db = mysqli_connect('localhost', 'root', 'root', 'project');
          $query = "SELECT * FROM cliente WHERE cedula = '" . $_SESSION['cedula'] . "'";
          $result = mysqli_query($db, $query);
          $row = mysqli_fetch_array($result);
          $cedula = $row['cedula'];
          $nombres = $row['nombres'];
          $apellidos = $row['apellidos'];
          ?>

          <input type="text" class="form-control" name="cedula" value="<?php echo $cedula; ?>" readonly>
          <br>
          <input type="text" class="form-control" name="nombres" value="<?php echo $nombres; ?>" readonly>
          <br>
          <input type="text" class="form-control" name="apellidos" value="<?php echo $apellidos; ?>" readonly>
          <br>
          <button type="submit" class="btn btn-sm btn-outline-secondary">Seleccionar asientos</button>

          </form>
        </div>
        <br><br>

      </main>
    </div>
  </div>


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
</body>

</html>