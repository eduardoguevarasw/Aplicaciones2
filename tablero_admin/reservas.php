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
  <!-- jquery -->
  <script type="text/javascript" src="../validar/lib/jquery-1.9.1/jquery-1.9.1.js"></script>
  <!-- validator -->
  <script type="text/javascript" src="../validar/dist/ruc_jquery_validator.min.js"></script>


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
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="container">
            <div class="row">
              <div class="col">
                <form method="POST" action="ok_admin.php">
                  <h1 class="h4">Seleccione la ruta</h1>
                  <select name="ruta" class="form-control" required>
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
                                                                                        echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>">

                  <h4>Datos del usuario</h4>
                  <div id="result">.</div>
                  <input type="text" class="form-control" name="cedula" placeholder="Cédula" maxlength="10" required>
                  <br>
                  <script type="text/javascript">
                    $("input").validarCedulaEC({
                      events: "keyup",
                      onValid: function() {
                        $("#result").html("Cédula Válida");
                      },
                      onInvalid: function() {
                        $("#result").html("Cédula No válida");
                      }
                    });
                  </script>

                  <input type="text" class="form-control" name="nombres" placeholder="Nombres" required>
                  <br>
                  <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>
                  <br>
                  <button type="submit" class="btn btn-sm btn-outline-secondary">Seleccionar asientos</button>
                </form>
              </div>
              <div class="col">
                <table class='table table-striped'>
                  <thread>
                    <th>Cédula</th>
                    <th>Asientos</th>
                    <th>Banco</th>
                    <th>Comprobante</th>
                    <th>Foto</th>
                    <th>Valor</th>
                    <th>Estado del pago</th>
                    </tr>
                  </thread>
                  <?php
                  //mostrar las reservas en una tabla 
                  //conectar a la base de datos
                  $db = mysqli_connect("localhost", "root", "root", "project");
                  $consultar = "SELECT * FROM boleto";
                  $resultado = mysqli_query($db, $consultar);
                  while ($row = mysqli_fetch_array($resultado)) {
                  ?>
                    <tbody>
                      <tr>
                        <td><?php echo $row['cedula'] ?></td>
                        <td><?php echo $row['seats'] ?></td>
                        <td><?php echo $row['bank'] ?></td>
                        <td><?php echo $row['comprobante'] ?></td>
                        <td><?php echo $row['foto'] ?></td>
                        <td><?php echo '$' . $row['valor'] ?></td>
                        <td><?php if ($row['pago'] == "Pendiente") {
                              echo '<a href="cambiar_estado.php?cedula=' . $row['cedula'] . '&estado=Aprobado"><button type="button" class="btn btn-warning">Pendiente</button></a>';
                            } else {
                              echo '<a href="cambiar_estado.php?cedula=' . $row['cedula'] . '&estado=Pendiente"><button type="button" class="btn btn-success">Aprobado</button></a>';
                            } ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
              </div>
            </div>
          </div>
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