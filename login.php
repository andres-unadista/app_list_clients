<!doctype html>
<html lang="es">

<head>
    <title>CRUD Clientes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="description" content="Página principal de clientes">
    <meta name="keywords" content="cliente, crud, php, tecnología">
</head>

<body>

    <div class="container">
        <header>
            <h1 class="text-center">Clientes</h1>
            <nav>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Iniciar sesión</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Registrarse</a>
                    </li>
                    <li class="nav-item disabled">
                        <a href="#" class="nav-link">Cerrar</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <h2>Inicio</h2>
                <article>
                    <div class="container">
                      <form>
                        <div class="mb-3 row">
                          <label for="email" class="col-sm-12 col-form-label">Correo</label>
                          <div class="col-sm-12">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese el correo">
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label for="pass" class="col-sm-12 col-form-label">Contraseña</label>
                          <div class="col-sm-12">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Ingrese el contraseña">
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Iniciar</button>
                          </div>
                        </div>
                      </form>
                    </div>
                </article>
            </section>
        </main>
        <footer>
            <h2>Desarrollado por Andrés García &copy;<?= date('Y'); ?></h2>
        </footer>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>