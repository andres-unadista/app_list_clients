<?php
$client = new ClientModel();
$users = $client->getUsers();
ClientController::validatePage();
?>
<main class="mt-4">
    <section class="px-5">
        <?php if (ClientController::existMessage()) : ?>
            <div class="alert alert-<?= $_SESSION['message' . session_id()]['status'] ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert" id="message">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong><?= $_SESSION['message' . session_id()]['msg'] ?></strong>
            </div>
            <script>
                let $message = document.querySelector('#message');
                setTimeout(() => {
                    $message.style.display = 'none';
                }, 3000);
            </script>
            <?php ClientController::clearMessage(); ?>
        <?php endif ?>
        <h2 class="text-center">Inicio</h2>
        <article>
            <table class="table table-bordered table-striped">
                <thead class="text-center bg-secondary text-white">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php if (count($users) === 0): ?>
                        <td colspan="5">No hay usuarios</td>
                    <?php endif ?>
                    <?php foreach ($users as $key => $client) :  ?>
                        <tr>
                            <td scope="row"><?= $client['id'] ?></td>
                            <td><?= $client['name'] ?></td>
                            <td><?= $client['email'] ?></td>
                            <td><?= $client['date_created'] ?></td>
                            <td>
                                <a href="index.php?page=edit&id=<?= $client['id'] ?>" class="btn btn-warning" title="editar">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form class="d-inline" action="index.php?page=remove" method="post">
                                    <input type="hidden" name="delete_id" value="<?= $client['id'] ?>">
                                    <button type="submit" href="index.php?page=remove" class="btn btn-danger" title="eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </article>
    </section>
</main>