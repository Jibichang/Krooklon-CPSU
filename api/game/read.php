<?php
  header("Content-Type: application/json; charset=UTF-8");

  include_once '../config/database.php';
  include_once '../objects/game.php';

  $database = new Database();
  $connection = $database->getConnection();

  $game = new Game($connection);

  $stmt = $game->read();
  $count = $stmt->rowCount();

  if($count > 0){
      $games = array();
      $games["body"] = array();
      $games["count"] = $count;

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          extract($row);

          $game_arr = array(
            "username" => $username,
            "levelplay" => $levelplay,
            "modeplay" => $modeplay,
            "botplay" => $botplay,
            "status" => $status,
            "onlineLastTime" => $onlineLastTime
          );
          array_push($games["body"], $game_arr);
      }
      echo json_encode($games);
  }  else {
      echo json_encode( array( "body" => array(), "count" => 0) );
  }
?>
