<?php
class History {
  // Connection instance
  private $connection;

  // table name
  private $table_name = "playerdetail";

  // table columns


  public $id;
  public $username;
  public $modegame;
  public $level;
  public $countbot;
  public $klon;
  public $prosody;
  public $melody;
  public $fast;
  public $playall;
  public $status;
  public $reg_date;

  public function __construct($connection){
    $this->connection = $connection;
  }

  //C
  public function create(){
    $query = "SELECT * FROM ". $this->table_name ." WHERE username = '$this->username'";
    $stmt = $this->connection->prepare($query);
    // $stmt->bindParam("username", $this->username, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $query = "UPDATE $this->table_name SET username='$this->username',
      levelplay='$this->levelplay', modeplay='$this->modeplay',
      botplay='$this->botplay', status='1', onlineLastTime = NOW()
      WHERE username='$this->username'";
    } else {
      $query = "INSERT INTO onlinemember (username,levelplay,modeplay,botplay,status,onlineLastTime)
      VALUES ('$this->username','$this->levelplay','$this->modeplay','$this->botplay','1',NOW())
      ON  DUPLICATE KEY
      UPDATE username = '$this->username',onlineLastTime = NOW()";
    }

    $stmt = $this->connection-> prepare($query);
    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":levelplay", $this->levelplay);
    $stmt->bindParam(":modeplay", $this->modeplay);
    $stmt->bindParam(":botplay", $this->botplay);
    // $stmt->bindParam(":status", $this->status);
    // $stmt->bindParam(":onlineLastTime", $this->onlineLastTime);

    if($stmt->execute()){
      return true;
    }
    return false;
  }

  //R
  public function read(){
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->connection-> prepare($query);

    $stmt-> execute();
    return $stmt;
  }

  public function delete(){
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

    $stmt = $this->connection->prepare($query);
    $this->id=htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(":modegame", $this->modegame);
    $stmt->bindParam(":level", $this->level);
    $stmt->bindParam(":countbot", $this->countbot);
    $stmt->bindParam(":prosody", $this->prosody);
    $stmt->bindParam(":melody", $this->melody);
    $stmt->bindParam(":fast", $this->fast);
    $stmt->bindParam(":playall", $this->playall);
    $stmt->bindParam(":status", $this->status);
    $stmt->bindParam(":reg_date", $this->reg_date);

    if($stmt->execute()){ return true; }
    return false;
  }

  // readOne by username
  public function readOne($userx){
    // query to read single record
    $query = "SELECT * FROM $this->table_name WHERE username = '". $userx. "' ORDER BY id DESC";
    // prepare query statement
    $stmt = $this->connection->prepare($query);
    // $stmt->bindParam(":modegame", $this->modegame);
    // $stmt->bindParam(":level", $this->level);
    // $stmt->bindParam(":countbot", $this->countbot);
    // $stmt->bindParam(":prosody", $this->prosody);
    // $stmt->bindParam(":melody", $this->melody);
    // $stmt->bindParam(":fast", $this->fast);
    // $stmt->bindParam(":playall", $this->playall);
    // $stmt->bindParam(":status", $this->status);
    // $stmt->bindParam(":reg_date", $this->reg_date);

    $stmt->execute();
    return $stmt;
  }
}
