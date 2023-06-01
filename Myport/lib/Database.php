<?php
class Database {
  private $host = "localhost";
  private $user = "root";
  private $password = "";
  private $database = "portblog";
  private $pdo;

  public function __construct() {
    try {
      $dsn = "mysql:host={$this->host};dbname={$this->database}";
      $this->pdo = new PDO($dsn, $this->user, $this->password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function query($query) {
    return $this->pdo->query($query);
  }

  public function prepare($query) {
    return $this->pdo->prepare($query);
  }

  public function execute($query, $params = []) {
    $stmt = $this->pdo->prepare($query);
    $stmt->execute($params);
    return $stmt;
  }

  public function lastInsertId() {
    return $this->pdo->lastInsertId();
  }
}
