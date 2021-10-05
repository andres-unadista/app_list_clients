<div class="container py-2 mb-5">
  <header class="bg-light mb-3">
    <h1 class="text-center">AppClientes</h1>
    <nav>
      <ul class="nav nav-pills d-flex <?= ClientController::isLoggin() ? 'justify-content-between' : 'justify-content-start' ?> text-center bg-ocean">
        <?php if (ClientController::isLoggin()) : ?>
          <li class="nav-item">
            <?php if (isset($_GET['page']) && $_GET['page'] == 'home') : ?>
              <a href="index.php?page=home" class="nav-link active">Inicio</a>
            <?php elseif (!isset($_GET['page'])) : ?>
              <a href="index.php?page=home" class="nav-link active">Inicio</a>
            <?php else : ?>
              <a href="index.php?page=home" class="nav-link">Inicio</a>
            <?php endif ?>
          </li>
        <?php endif ?>
        <?php if (!ClientController::isLoggin()) : ?>
        <li class="nav-item">
          <a href="index.php?page=login" class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'login') ? 'active' : '' ?>">Iniciar sesión</a>
        </li>
        <li class="nav-item">
          <a href="index.php?page=register" class="nav-link <?= (isset($_GET['page']) && $_GET['page'] == 'register') ? 'active' : '' ?>">Registrarse</a>
        </li>
        <?php endif ?>
        <?php if (ClientController::isLoggin()) : ?>
          <li class="nav-item disabled">
            <a href="index.php?page=logout" class="nav-link">Cerrar</a>
          </li>
        <?php endif ?>
      </ul>
    </nav>
  </header>