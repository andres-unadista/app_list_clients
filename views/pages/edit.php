<?php
$statusUpdated = null;
$user = ClientController::getUser();
if (!empty($_POST)) {
  $clientObj = new ClientController();
  $statusUpdated = $clientObj->updateUser();
  if ($statusUpdated) {
    $user = ClientController::getUser();
  }
  
}
?>
<main>
  <section class="px-5">
    <h2 class="text-center">Actualizar</h2>
    <article>
      <div class="container">
        <form class="row" method="POST">
          <div class="col-md-8 mx-auto shadow">
            <?php if ($statusUpdated) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>¡Usuario actualizado!</strong>
              </div>
            <?php elseif ($statusUpdated === false) : ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>¡El usuario no ha sido actualizado!</strong>
              </div>
            <?php endif ?>

            <div class="mb-3 row">
              <label for="email" class="col-sm-12 col-form-label">Correo</label>
              <div class="col-sm-12">
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="fas fa-envelope    "></i></span>
                  <input type="email" value="<?=$user['email']?>" class="form-control" name="email" id="email" placeholder="Ingrese el correo">
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="text" class="col-sm-12 col-form-label">Nombre</label>
              <div class="col-sm-12">
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="fas fa-user    "></i></span>
                  <input type="text" value="<?=$user['name']?>" class="form-control" name="name" id="name" placeholder="Ingrese el nombre">
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="pass" class="col-sm-12 col-form-label">Contraseña</label>
              <div class="col-sm-12">
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="fas fa-key    "></i></span>
                  <input type="password" class="form-control" name="pass" id="pass" placeholder="Ingrese la contraseña">
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="repeat_pass" class="col-sm-12 col-form-label">Repetir contraseña</label>
              <div class="col-sm-12">
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="fas fa-key    "></i></span>
                  <input type="password" class="form-control" name="repeat_pass" id="repeat_pass" placeholder="Ingrese nuevamente la contraseña">
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-md-12">
                <div class="d-grid gap-2">
                  <button type="submit" name="" id="" class="btn btn-primary">Actualizar</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </article>
  </section>
</main>