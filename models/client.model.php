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
      $sql = "SELECT *, DATE_FORMAT(created_at, '%d/%m/%Y') as date_created FROM users ORDER BY id DESC";
      $query = $this->conn->prepare($sql);
      $query->execute();
      $users = $query->fetchAll();
      return $users;
    } catch (PDOException $e) {
      echo $e->getMessage();
      Connection::close();
      return [];
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
      Connection::close();
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
      Connection::close();
    }
  }

  public function getUserLogin(array $user)
  {
    try {
      $sql = "SELECT * FROM `users` WHERE email=:email";
      $query = $this->conn->prepare($sql);
      $query->bindParam('email', $user['email']);
      $query->execute();
      $user = $query->fetch();
      return $user;
    } catch (PDOException $e) {
      echo $e->getMessage();
      Connection::close();
    }
  }

  public function getUser(int $user)
  {
    try {
      $sql = "SELECT * FROM `users` WHERE id=:id";
      $query = $this->conn->prepare($sql);
      $query->bindParam('id', $user);
      $query->execute();
      $user = $query->fetch();
      return $user;
    } catch (PDOException $e) {
      echo $e->getMessage();
      Connection::close();
    }
  }

  public function deleteUser(int $id): bool
  {
    try {
      $sql = "DELETE FROM `users` WHERE id=:id";
      $query = $this->conn->prepare($sql);
      $query->bindParam('id', $id);
      $isDeleted = $query->execute();
      return $isDeleted;
    } catch (PDOException $e) {
      echo $e->getMessage();
      Connection::close();
    }
  }
}
