<?php
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: access");
  header("Access-Control-Allow-Methods: GET");
  header("Access-Control-Allow-Credentials: true");

  include_once '../config/database.php';
  include_once '../objects/history.php';

  $database = new Database();
  $connection = $database->getConnection();

  $his = new History($connection);
  $data = json_decode(file_get_contents("php://input"));

  // /$his->username = $data->username;
  $stmt = $his->readOne($data->username);
  $count = $stmt->rowCount();

  if($count > 0){
      $h = array();
      $h["history"] = array();
      $h["count_arr"] = $count;

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          extract($row);

          $h_arr = array(
            "modegame"  => $modegame,
            "level"     => $level,
            "countbot"  => $countbot,
            "prosody"   => $prosody,
            "melody"    => $melody,
            "fast"      => $fast,
            "playall"   => $playall,
            "status"    => $status,
            "reg_date"  => $reg_date
          );
          array_push($h["history"], $h_arr);
      }
      echo json_encode($h);
      //echo json_encode( array( "history" => array(), "count" => $count) );
  }  else {
      echo json_encode( array( "history" => array(), "count_arr" => 0) );
      //return json_encode( array( "history" => array(), "count" => 0) );
  }
?>
