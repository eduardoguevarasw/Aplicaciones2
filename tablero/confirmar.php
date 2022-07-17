<?php
$ruta = $_GET['ruta'];
$cedula = $_GET['cedula'];
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
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layout-split" viewBox="0 0 16 16">
  <path d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3zm8.5-1v12H14a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H8.5zm-1 0H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h5.5V2z"/>
</svg>

  </svg>



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
              <button type="button" class="btn btn-sm btn-outline-secondary">Boton A</button>
            </div>
          </div>
        </div>
        <h1 class="h4">Seleccione los asientos</h1>

        <br><br>
        <div class="container">
          <div class="row">
            <div class="col">
              <style type="text/css">
                .tg {
                  border-collapse: collapse;
                  border-spacing: 0;
                }

                .tg td {
                  border-color: black;
                  border-style: solid;
                  border-width: 1px;
                  font-family: Arial, sans-serif;
                  font-size: 14px;
                  overflow: hidden;
                  padding: 10px 5px;
                  word-break: normal;
                }

                .tg th {
                  border-color: black;
                  border-style: solid;
                  border-width: 1px;
                  font-family: Arial, sans-serif;
                  font-size: 14px;
                  font-weight: normal;
                  overflow: hidden;
                  padding: 10px 5px;
                  word-break: normal;
                }

                .tg .tg-baqh {
                  text-align: center;
                  vertical-align: top
                }

                .tg .tg-0lax {
                  text-align: left;
                  vertical-align: top
                }
              </style>
              <table class="tg" style="undefined;table-layout: fixed; width: 312px">
                <colgroup>
                  <col style="width: 41px">
                  <col style="width: 46px">
                  <col style="width: 46px">
                  <col style="width: 46px">
                  <col style="width: 46px">
                  <col style="width: 46px">
                  <col style="width: 41px">
                </colgroup>
                <thead>
                  <tr>

                    <th class="tg-0lax" colspan="2"><img src="../img/driver.svg" width="30" height="30" alt="driver" class="text-center" /></th>
                    <th class="tg-0lax" colspan="4">ENTRADA</th>
                  </tr>
                </thead>
                <?php
                $db = mysqli_connect('localhost', 'root', 'root', 'project');
                $query = "SELECT * FROM reserva where id_bus = '$ruta'"; // query to get data from the table 
                $result = mysqli_query($db, $query); // execute query
                $row = mysqli_fetch_array($result) ?>
                <tbody>
                  <tr>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                    <td class="tg-0lax">1<?php if (($row['A1']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=A1&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">2<?php if (($row['A2']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=A2&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-baqh" rowspan="8"><br><br><br>P<br><br><br>A<br><br><br>S<br><br><br>I<br><br><br>L<br><br><br>L<br><br><br>O<br><br><br></td>
                    <td class="tg-0lax">3<?php if (($row['A3']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=A3&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">4<?php if (($row['A4']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=A4&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                  </tr>
                  <tr>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                    <td class="tg-0lax">5<?php if (($row['B1']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=B1&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">6<?php if (($row['B2']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=B2&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">7<?php if (($row['B3']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=B3&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">8<?php if (($row['B4']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=B4&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                  </tr>
                  <tr>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                    <td class="tg-0lax">9<?php if (($row['C1']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=C1&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">10<?php if (($row['C2']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=C2&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">11<?php if (($row['C3']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=C3&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">12<?php if (($row['C4']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=C4&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                  </tr>
                  <tr>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                    <td class="tg-0lax">13<?php if (($row['D1']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=D1&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">14<?php if (($row['D2']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=D2&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">15<?php if (($row['D3']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=D3&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">16<?php if (($row['D4']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=D4&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                  </tr>
                  <tr>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                    <td class="tg-0lax">17<?php if (($row['E1']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=E1&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">18<?php if (($row['E2']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=E2&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">19<?php if (($row['E3']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=E3&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">20<?php if (($row['E4']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=E4&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                  </tr>
                  <tr>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                    <td class="tg-0lax">21<?php if (($row['F1']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=F1&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">22<?php if (($row['F2']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=F2&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">23<?php if (($row['F3']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=F3&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">24<?php if (($row['F4']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=F4&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                  </tr>
                  <tr>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                    <td class="tg-0lax">25<?php if (($row['G1']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=G1&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">26<?php if (($row['G2']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=G2&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">27<?php if (($row['G3']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=G3&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">28<?php if (($row['G4']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=G4&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                  </tr>
                  <tr>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                    <td class="tg-0lax">29<?php if (($row['H1']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=H1&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">30<?php if (($row['H2']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=H2&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">31<?php if (($row['H3']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=H3&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax">32<?php if (($row['H4']) == 0) {
                                          echo '<p><a href="status.php?id_bus=' . $ruta . '&seat=H4&cedula=' . $cedula . '"><img src="../img/disponible.png" width="40" height="40" alt="seat"></a></p>';
                                        } else {
                                          echo '<img src="../img/nodisponible.png" width="40" height="40" alt="seat">';
                                        } ?></td>
                    <td class="tg-0lax"><img src="../img/ventana.svg" width="30" height="30" alt="ventana" /></td>
                  </tr>
                </tbody>
              </table>

            </div>
            <div class="col">
              <?php
              $db = mysqli_connect('localhost', 'root', 'root', 'project');
              $query = "SELECT * FROM bus where id = '$ruta'"; // query to get data from the table
              $result = mysqli_query($db, $query); // execute query
              $row = mysqli_fetch_array($result) ?>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Número de Bus</th>
                    <th scope="col">Ruta</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td><?php echo $row['placa']; ?></td>
                    <td><?php echo $row['numero']; ?></td>
                    <td><?php echo $row['ruta']; ?></td>
                  </tr>

                </tbody>
              </table>

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