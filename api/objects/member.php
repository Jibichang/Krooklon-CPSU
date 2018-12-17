<?php
class Member{
  // Connection instance
  private $connection;

  // table name
  private $table_name = "memberdetail";

  // table columns
  public $id;
  public $idApi;
  public $rank;
  public $rankNo;
  public $email;
  public $username;
  public $password;
  public $filePic;
  public $learn1;
  public $learn2;
  public $learn3;
  public $prosody;
  public $melody;
  public $fast;
  public $prosodyFull;
  public $melodyFull;
  public $fastWin;
  public $win;
  public $count;
  public $sumScore;
  public $coin;
  public $SID;
  public $active;
  public $reg_date;
  public $learnPage;
  public $subChapt;

  public function __construct($connection){
    $this->connection = $connection;
  }

  public function create(){
    $sid = md5($this->email);

    $query = "INSERT INTO $this->table_name
    SET  rank = 'ลูกเจี๊ยบหัดเดิน',
    rankNo = '1',
    username = :username,
    password = :password,
    email = :email,
    filePic = 'defultKruklon.png',
    learn1 = '0',
    learn2 = '0',
    learn3 = '0',
    prosody = '0',
    melody = '0',
    fast = '0',
    win = '0',
    count = '0',
    sumScore = '0',
    coin = '5',
    SID = '$sid',
    active = 'no'";

    $stmt = $this->connection->prepare($query);

    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->password=htmlspecialchars(strip_tags($this->password));

    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':email', $this->email);

    $password_hash = password_hash($this->password, PASSWORD_DEFAULT);
    $stmt->bindParam(':password', $password_hash);

    if($stmt->execute()){
      return true;
    }
    return false;
  }

  public function read(){
    $query = "SELECT * FROM " . $this->table_name;
    $stmt = $this->connection-> prepare($query);

    $stmt-> execute();
    return $stmt;
  }

  // public function update(){
  //   $query = "UPDATE $this->table_name SET username='".$this->username."',email='".$this->email."' WHERE email='$this->email'";
  //
  //   // prepare query statement
  //   $stmt = $this->connection->prepare($query);
  //
  //   // sanitize
  //   $this->username=htmlspecialchars(strip_tags($this->username));
  //   $this->email=htmlspecialchars(strip_tags($this->email));
  //   $this->password=htmlspecialchars(strip_tags($this->password));
  //
  //   // bind new values
  //   $stmt->bindParam(':username', $this->username);
  //   $stmt->bindParam(':email', $this->email);
  //   $stmt->bindParam(':password', $this->password);
  //
  //   // execute the query
  //   if($stmt->execute()) { return true; }
  //   return false;
  // }

  function update(){
    $password_set=!empty($this->password) ? " password = :password" : "";

    $query = "UPDATE $this->table_name
    SET
    username = :username,
    email = :email,
    {$password_set}
    WHERE
    id = :id";

    $stmt = $this->connection->prepare($query);

    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->id=htmlspecialchars(strip_tags($this->id));

    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':id', $this->id);

    // hash the password before saving to database
    if(!empty($this->password)){
      $this->password=htmlspecialchars(strip_tags($this->password));
      $password_hash = password_hash($this->password, PASSWORD_DEFAULT);
      $stmt->bindParam(':password', $password_hash);
    }
    $stmt->bindParam(':id', $this->id);

    if($stmt->execute()){
      return true;
    }
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
  public function getInfoGame(){
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
    $this->rank = $row['rank'];
    $this->sumScore = $row['sumScore'];
    $this->coin = $row['coin'];
    $this->username = $row['username'];
  }

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

  function emailExists(){
    $query = "SELECT id, username, password, email
    FROM  $this->table_name
    WHERE email = ?
    LIMIT 0,1";

    // prepare the query
    $stmt = $this->connection->prepare( $query );
    $this->email=htmlspecialchars(strip_tags($this->email));
    $stmt->bindParam(1, $this->email);

    $stmt->execute();
    $num = $stmt->rowCount();

    // if email exists, assign values to object properties for easy access and use for php sessions
    if($num>0){
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      $this->id = $row['id'];
      $this->username = $row['username'];
      $this->email = $row['email'];
      $this->password = $row['password'];
      return true;
    }
    return false;
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

  public function updateLearn(){
    $this->learnPage=htmlspecialchars(strip_tags($this->learnPage));
    if ($this->learnPage == "learn1") {
      $query = "UPDATE $this->table_name
      SET learn1 = :subChapt WHERE id = :id";

    }elseif ($this->learnPage == "learn2") {
      $query = "UPDATE $this->table_name
      SET learn2 = :subChapt WHERE id = :id";
    }else {
      $query = "UPDATE $this->table_name
      SET learn3 = :subChapt WHERE id = :id";
    }

    $stmt = $this->connection->prepare($query);
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->subChapt=htmlspecialchars(strip_tags($this->subChapt));


    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':subChapt', $this->subChapt);

    if($stmt->execute()){
      return true;
    }
    return false;
  }


}
