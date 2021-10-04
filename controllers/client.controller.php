<?php
class ClientController
{
  public function viewCall()
  {
    $isMethodGET = isset($_GET['page']);
    $listPages = ['home', 'login', 'register'];
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
    var_dump($_POST);
  }

  public function loginUser()
  {
    var_dump($_POST);
  }
}
