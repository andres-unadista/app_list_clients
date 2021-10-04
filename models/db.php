<?php
class Connection
{
  static $pdo = null;
  static public $dns = 'mysql:host=localhost;dbname=dev_clients';
  static public $user = 'root';
  static public $pass = '';

  static public function connect()
  {
    try {
      self::$pdo = new PDO(
        self::$dns,
        self::$user,
        self::$pass,
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
      );
      self::$pdo->exec('set names utf8');
      return self::$pdo;
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }

  static public function close()
  {
    self::$pdo = null;
  }
}
