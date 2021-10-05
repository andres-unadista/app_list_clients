<?php
class ClientController
{
  public function viewCall()
  {
    $isMethodGET = isset($_GET['page']);
    $listPages = ['home', 'login', 'register', 'logout', 'edit', 'remove'];
    if ($isMethodGET) {
      $pageGET = $_GET['page'];
      $isPage = in_array($pageGET, $listPages);
      if ($isPage) {
        $callView = "views/pages/$pageGET.php";
        require_once 'views/layout.php';
      } else {
        $this->notFound();
      }
    } else {
      $callView = "views/pages/home.php";
      require_once 'views/layout.php';
    }
  }

  public function notFound()
  {
    $callView = "views/pages/not_found.php";
    require_once 'views/layout.php';
  }

  public function registerUser()
  {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : null;
    $repeat_pass = isset($_POST['repeat_pass']) ? $_POST['repeat_pass'] : null;
    if (!$pass || !$repeat_pass || $pass !== $repeat_pass) {
      return false;
    }
    $client = new ClientModel();
    $user = [
      'name' => $name,
      'email' => $email,
      'password' => password_hash($pass, PASSWORD_BCRYPT),
    ];
    return $client->registerUser($user);
  }

  public function updateUser()
  {
    try {
      $name = isset($_POST['name']) ? $_POST['name'] : '';
      $id = isset($_GET['id']) ? $_GET['id'] : null;
      $email = isset($_POST['email']) ? $_POST['email'] : '';
      $pass = isset($_POST['pass']) ? $_POST['pass'] : null;
      $repeat_pass = isset($_POST['repeat_pass']) ? $_POST['repeat_pass'] : null;
      if (!$pass || !$repeat_pass || $pass !== $repeat_pass || !$id) {
        throw new Exception('Datos inválidos al actualizar');
      }
      $client = new ClientModel();
      $user = [
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'password' => password_hash($pass, PASSWORD_BCRYPT),
      ];
      if ($client->updateUser($user)) {
        $_SESSION['message' . session_id()] = ['msg' => 'Usuario actualizado!', 'status' => true];
      } else {
        throw new Exception('Error al actualizar el usuario!');
      }
    } catch (Exception $e) {
      $_SESSION['message' . session_id()] = ['msg' => $e->getMessage(), 'status' => false];
    } finally {
      header('Location:index.php?page=home');
    }
  }

  static public function getUser()
  {
    $client = new ClientModel();
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    return $client->getUser($id);
  }

  public function loginUser()
  {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : null;
    if (!$pass || !$email) {
      return false;
    }

    $client = new ClientModel();
    $user = [
      'email' => $email,
    ];
    $user = $client->getUserLogin($user);

    if (!$user) {
      return false;
    }

    if (password_verify($pass, $user['password'])) {
      $_SESSION['user' . session_id()] = 'ok';
      return true;
    }
    return false;
  }

  static public function validatePage()
  {
    if (!isset($_SESSION['user' . session_id()]) || $_SESSION['user' . session_id()] !== 'ok') {
      header('Location:index.php?page=login');
    }
    return;
  }

  static public function isLoggin()
  {
    return (isset($_SESSION['user' . session_id()]) && $_SESSION['user' . session_id()] == 'ok');
  }

  static public function existMessage(): bool
  {
    $statusMessage = isset($_SESSION['message' . session_id()]);
    return $statusMessage;
  }

  static public function clearMessage()
  {
    unset($_SESSION['message' . session_id()]);
  }

  static public function close()
  {
    unset($_SESSION['user' . session_id()]);
    unset($_SESSION['message' . session_id()]);
    header('Location:index.php?page=login');
  }

  static public function deleteUser()
  {
    $id = isset($_POST['delete_id']) ? $_POST['delete_id'] : null;
    if (!$id) {
      $_SESSION['message' . session_id()] = ['msg' => 'ID inválido', 'status' => false];
    }
    $client = new ClientModel();
    $delete = $client->deleteUser($id);
    if ($delete) {
      $_SESSION['message' . session_id()] = ['msg' => 'Usuario eliminado!', 'status' => true];
    } else {
      $_SESSION['message' . session_id()] = ['msg' => 'Error al eliminar usuario!', 'status' => false];
    }
    header('Location:index.php?page=home');
  }
}
