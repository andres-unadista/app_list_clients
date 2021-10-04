<div class="container py-2">
  <header class="bg-light mb-3">
    <h1 class="text-center">AppClientes</h1>
    <nav>
      <ul class="nav nav-pills d-flex justify-content-between text-center bg-ocean">
        <li class="nav-item">
          <?php if (isset($_GET['page']) && $_GET['page'] == 'home') : ?>
            <a href="index.php?page=home" class="nav-link active">Inicio</a>
          <?php elseif (!isset($_GET['page'])) : ?>
            <a href="index.php?page=home" class="nav-link active">Inicio</a>
          <?php else : ?>
            <a href="index.php?page=home" class="nav-link">Inicio</a>
          <?php endif ?>
        </li>
        <li class="nav-item">
          <a href="index.php?page=login" class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'login') ? 'active' : '' ?>">Iniciar sesión</a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=register" class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'register') ? 'active' : '' ?>">Registrarse</a>
        </li>
        <li class="nav-item disabled">
          <a href="#" class="nav-link">Cerrar</a>
        </li>
      </ul>
    </nav>
  </header>