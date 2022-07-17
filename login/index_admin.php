<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Inicio de Sesión</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



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
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
  <?php
    //login de usuario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $cedula = $_POST['cedula'];
      $password = $_POST['password'];
      $usuario = 'root';
      $passwor1 = 'root';
      $db = new PDO('mysql:host=localhost;dbname=project', $usuario, $passwor1);
      $sql = "SELECT * FROM admin WHERE cedula = '$cedula' AND password = '$password'";
      $result = $db->query($sql);
      $row = $result->fetch();
      if ($row) {
        session_start();
        $_SESSION['cedula'] = $cedula;
        header('Location: ../tablero_admin/index.php');
      } else {
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
      <div>
        <strong>Error!</strong> Usuario o contraseña incorrectos.
      </div>
    </div>';
      }
    }
    ?>
    <form method="post">
      <img class="mb-4" src="../img/admin.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Administrador</h1>

      <div class="form-floating">
        <input type="text" name="cedula" class="form-control" id="floatingInput" placeholder="Cédula">
        <label for="floatingInput">Número de Cédula</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Contraseña">
        <label for="floatingPassword">Contraseña</label>
      </div>

      <input type = "submit" class="btn btn-btnw-100 btn btn-lg btn-primary" value = "Ingresar"/>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
    
  </main>



</body>

</html>