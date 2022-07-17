<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title></title>

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
                                <span data-feather="file"></span>
                                Reservar
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="./historial.php">
                                <span data-feather="users"></span>
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
                <h1 class="h4">Datos del Pago</h1>
                <br><br>
                <?php
                //conectar bd
                $db = mysqli_connect("localhost", "root", "root", "project");
                $comprobante = $_POST['comprobante'];
                $bank = $_POST['bank'];
                $id_boleto = $_GET['id'];
                //imagen del comprobante
                $imagen = $_FILES['foto']['temp_name'];
                $imgContent = addslashes(file_get_contents($imagen));

                if (isset($_POST['comprobante'])) {

                    $query = "UPDATE boleto SET pago = 'Pendiente' WHERE id = '$id_boleto'";
                    $result = mysqli_query($db, $query);
                    $query2 = "UPDATE boleto SET bank = '$bank' WHERE id = '$id_boleto'";
                    $result2 = mysqli_query($db, $query2);
                    $query3 = "UPDATE boleto SET comprobante = '$comprobante' WHERE id = '$id_boleto'";
                    $result3 = mysqli_query($db, $query3);
                    //insertar imagen en la base de datos
                    $query4 = "UPDATE boleto SET foto = '$imgContent' WHERE id = '$id_boleto'";
                    $result4 = mysqli_query($db, $query4);
                    if($result){
                        echo '<div class="alert alert-success" role="alert">Comprobante Enviado - Espere la aprobación</div>';
                        echo '<a href="./historial.php" class="btn btn-primary">Volver</a>';
                    }else{
                        echo '<div class="alert alert-danger" role="alert">Ocurrio un error</div>';
                    }
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="comprobante">Comprobante</label>
                        <input type="number" class="form-control" id="comprobante" name="comprobante" maxlength="8" placeholder="Comprobante">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="comprobante">Banco</label>
                        <select id="banco" name="bank" class="form-control" >
                            <option value="">Seleccione un Banco</option>
                            <option value="Pichincha">Banco de Pichincha</option>
                            <option value="Pacifico">Banco del Pacífico</option>
                            <option value="Guayaquil">Banco de Guayaquil</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <!--Subir una imagen -->
                        <label for="comprobante">Imagen del Comprobante</label>
                        <input type="file" name="image"/>

                    </div>
                    <button type="submit" class="btn btn-primary">Pagar</button>
                </form>

            </main>
        </div>
    </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>