<?php
class Comment
{
  private $connection;
  private $table_name = "commentshow";

  public $id;
  public $username;
  public $message;
  public $reg_date;

  public function __construct($connection){
    $this->connection = $connection;
  }

  function create(){
    $query = "INSERT INTO $this->table_name (username,message,reg_date)
    VALUES ('$this->username', '$this->message', NOW())";

    $stmt = $this->connection-> prepare($query);
    $stmt->bindParam("username", $this->username);
    $stmt->bindParam("message", $this->message);

    if($stmt->execute()){return true;}
    return false;
  }

  public function getComments(){
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->connection-> prepare($query);

    $stmt-> execute();
    return $stmt;
  }

  public function getComment(){
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
    $stmt = $this->connection->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->id = $row['id'];
    $this->username = $row['username'];
    $this->message = $row['message'];
  }
}

?>
