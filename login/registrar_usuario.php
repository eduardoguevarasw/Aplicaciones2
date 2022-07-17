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

  <!-- jquery -->
  <script type="text/javascript" src="../validar/lib/jquery-1.9.1/jquery-1.9.1.js"></script>
  <!-- validator -->
  <script type="text/javascript" src="../validar/dist/ruc_jquery_validator.min.js"></script>
  <!-- External CSS -->

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
  <link href="./signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form method="post" action="ingresar_cliente.php">
      <img class="mb-4" src="../img/person.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Registrar Nuevo Cliente</h1>
      <div id="result">
      </div>
      <div class="form-floating">
        <input type="number" name="cedula" maxlength="10" class="form-control" id="floatingInput" placeholder="Número de Cédula" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        <label for="floatingInput">Número de Cédula</label>
      </div>
      <script type="text/javascript">
        $("input").validarCedulaEC({
          events: "keyup",
          onValid: function() {
            $("#result").html("Válido");
          },
          onInvalid: function() {
            $("#result").html("No válido");
          }
        });
      </script>
      <div class="form-floating">
        <input type="text" name="nombres" class="form-control" id="floatingInput" placeholder="Nombres" required>
        <label for="floatingInput">Nombres</label>
      </div>
      <div class="form-floating">
        <input type="text" name="apellidos" class="form-control" id="floatingInput" placeholder="Apellidos" required>
        <label for="floatingInput">Apellidos</label>
      </div>
      <div class="form-floating">
      <input type="number" name="telefono" maxlength="10" class="form-control" id="floatingInput" placeholder="Número de Cédula" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        <label for="floatingInput">Telefono</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Contraseña" required>
        <label for="floatingPassword">Contraseña</label>
      </div>

      <input type="submit" class="btn btn-btnw-100 btn btn-lg btn-primary" value="Registrar" />
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>
</body>

</html>