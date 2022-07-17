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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">



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
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./rutas.php">
                <span data-feather="repeat"></span>
                Rutas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./reservas.php">
                <span data-feather="shopping-cart"></span>
                Reservas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./clientes.php">
                <span data-feather="users"></span>
                Clientes
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
        <div class="row">
          <div class="col-sm-2">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Rutas</h5>
                <i class="bi bi-map-fill"></i>
                <p class="card-text"><?php
                //contar las rutas 
                $db = mysqli_connect('localhost', 'root', 'root', 'project');
                $query = "SELECT count(*) FROM bus";
                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_array($result);
                echo $row[0];
                ?></p>
                <a href="./rutas.php" class="btn btn-primary">Ver</a>
              </div>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Clientes</h5>
                <i class="bi bi-people-fill"></i>
                <p class="card-text">
                <?php
                //contar las rutas 
                $db = mysqli_connect('localhost', 'root', 'root', 'project');
                $query = "SELECT count(*) FROM cliente";
                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_array($result);
                echo $row[0];
                ?>
                </p>
                <a href="./clientes.php" class="btn btn-primary">ver</a>
              </div>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Reservas</h5>
                <i class="bi bi-truck-front-fill"></i>
                <p class="card-text">
                <?php
                //contar las rutas 
                $db = mysqli_connect('localhost', 'root', 'root', 'project');
                $query = "SELECT count(*) FROM boleto";
                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_array($result);
                echo $row[0];
                ?>
                </p>
                <a href="./reservas.php" class="btn btn-primary">ver</a>
              </div>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>


  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
</body>

</html>