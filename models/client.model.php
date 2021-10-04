<?php
require_once 'models/db.php';

class ClientModel
{
  private PDO $conn;

  public function __construct()
  {
    $this->conn = Connection::connect();
  }

  public function getUsers(): array
  {
    try {
      $sql = "SELECT * FROM users ORDER BY id DESC";
      $query = $this->conn->prepare($sql);
      $query->execute();
      $users = $query->fetchAll();
      return $users;
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }

  public function registerUser(array $user): bool
  {
    try {
      $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (:name,:email,:password)";
      $query = $this->conn->prepare($sql);
      $isRegister = $query->execute($user);
      return $isRegister;
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }

  public function updateUser(array $user): bool
  {
    try {
      $sql = "UPDATE `users` SET `name`=:name,`email`=:email,`password`=:password WHERE id=:id";
      $query = $this->conn->prepare($sql);
      $isUpdated = $query->execute($user);
      return $isUpdated;
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }

  public function getUser(int $id): array
  {
    try {
      $sql = "SELECT * FROM `users` WHERE id=:id ORDER BY id DESC";
      $query = $this->conn->prepare($sql);
      $query->bindParam('id', $id);
      $query->execute();
      $user = $query->fetch();
      return $user;
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }

  public function deleteUser(int $id): bool
  {
    try {
      $sql = "DELETE FROM `users` WHERE id=:id";
      $query = $this->conn->prepare($sql);
      $query->bindParam('id', $id);
      $isUpdated = $query->execute();
      return $isUpdated;
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }
}
