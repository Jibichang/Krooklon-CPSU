<?php
class Game {
  // Connection instance
  private $connection;

  // table name
  private $table_name = "onlinemember";

  // table columns
  public $username;
  public $usernameBattle;
  public $status;
  public $pageStatus;
  public $progress;
  public $levelplay;
  public $modeplay;
  public $botplay;
  public $scoreProsody;
  public $scoreMelody;
  public $scoreFast;
  public $onlineLastTime;

  public function __construct($connection){
    $this->connection = $connection;
  }

  //C
  public function create(){
    try {
      $query = "SELECT * FROM " . $this->table_name . " WHERE id = ".$this->username;
      $stmt = $this->connection-> prepare($query);

      $stmt-> execute();
      return $stmt;
      
    } catch (Exception $e) {

    }



    $query = "INSERT INTO onlinemember (username,levelplay,modeplay,botplay,status,onlineLastTime)
              VALUES ('$this->username','$this->levelplay','$this->modeplay',
                '$this->botplay','1',NOW())
                ON  DUPLICATE KEY UPDATE username = '$this->username',
                    onlineLastTime = NOW()";

    $stmt = $this->connection-> prepare($query);

    // $this->username=htmlspecialchars(strip_tags($this->username));
    // $this->levelplay=htmlspecialchars(strip_tags($this->levelplay));
    // $this->modeplay=htmlspecialchars(strip_tags($this->modeplay));
    // $this->botplay=htmlspecialchars(strip_tags($this->botplay));
    // $this->status=htmlspecialchars(strip_tags($this->status));
    // $this->onlineLastTime=htmlspecialchars(strip_tags($this->onlineLastTime));

    // bind values
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

  //U
  public function update($column, $value){
    $query = "UPDATE $this->table_name
              SET $column = '".$value. "'
              WHERE username = '$this->username'";

    $stmt = $this->connection->prepare($query);

    // sanitize
    // $this->username=htmlspecialchars(strip_tags($value));
    //
    // // bind new values
    // $stmt->bindParam(':username', $this->username);
    // $stmt->bindParam(':email', $this->email);
    // $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(1, $this->username);
    // execute the query
    if($stmt->execute()) { return true; }
    return false;
  }


  public function delete(){
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

    $stmt = $this->connection->prepare($query);
    $this->id=htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(1, $this->id);

    if($stmt->execute()){ return true; }

    return false;
  }

  // readOne by id

  public function getMember(){
    // query to read single record
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
    // prepare query statement
    $stmt = $this->connection->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();

    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // set values to object properties
    $this->id = $row['id'];
    $this->email = $row['email'];
    $this->username = $row['username'];
  }


  public function getRank(){
    $query = "SELECT * FROM " . $this->table_name. " order by sumScore desc,rankNo desc";
    $stmt = $this->connection-> prepare($query);

    $stmt-> execute();
    return $stmt;
  }

  public function getMemberDetail(){
    $query = "SELECT * FROM " . $this->table_name. " WHERE id = ?";
    $stmt = $this->connection-> prepare($query);

    $stmt-> execute();
    return $stmt;
  }

}
