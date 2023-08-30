<?php
namespace App\Models;
use PDO;
use PDOException;

class Database{
  private string $db_host = "localhost";
  private string $db_user = "root";
  private string $db_pass = "root";
  private string $db_name = "crud_operations";

  private ?PDO $pdo = null;
  private array $result = [];

  public function __construct() {
    try {
      $dsn = "mysql:host={$this->db_host};dbname={$this->db_name}";
      $this->pdo = new PDO($dsn, $this->db_user, $this->db_pass);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      $this->result[] = $e->getMessage();
    }
  }

  public function insert($table, $params=[]): bool
  {
    $table_columns = implode(", ", array_keys($params));
    $table_values  = implode("', '", $params);

    $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_values')";

    try {
      $this->pdo->exec($sql);
      $this->result[] = $this->pdo->lastInsertId();
      return true;
    } catch ( PDOException $e) {
      $this->result[] = $e->getMessage();
      return false;
    }
  }

  public function update($table, $params=[], $where=null): bool
  {
    $args = [];
    foreach ($params as $key => $value) {
      $args[] = "$key = '$value'";
    }

    $sql = "UPDATE $table SET " . implode(", ", $args);

    if($where !== null) {
      $sql .= " WHERE $where";
    }

    try {
       $stmt = $this->pdo->exec($sql);
       $this->result[] = $this->pdo->lastInsertId();
       return true;
    } catch (PDOException $e) {
       $this->result[] = $e->getMessage();
       return false;
    }
  }

  public function delete($table, $where = null): bool
  {
    $sql = "DELETE FROM $table";

    if($where !== null) {
      $sql .= " WHERE $where";
    }

    try {
      $rowCount = $this->pdo->exec($sql);

      if($rowCount !== false) {
        $this->result[] = $rowCount;
        return true;
      }

      $this->result[] = $this->pdo->errorInfo();
      return false;
    } catch (PDOException $e) {
      $this->result[] = $e->getMessage();
      return false;
    }
  }
	
	public function search($table, $id): false|array
	{
		try {
			$stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id = :id");
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			$this->result[] = $e->getMessage();
			return false;
		}
	}


  public function select($table): false|array
  {
    try {
      $stmt = $this->pdo->query("SELECT * FROM $table");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      $this->result[] = $e->getMessage();
      return [];
    }
  }


  public function getResult(): array
  {
    $val = $this->result;
    $this->result = [];

    return $val;
  }

  public function __destruct() {
    if($this->pdo !== null) {
      $this->pdo = null;
    }
  }
}