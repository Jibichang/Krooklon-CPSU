<?php

  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: access");
  header("Access-Control-Allow-Methods: GET");
  header("Access-Control-Allow-Credentials: true");
  header('Content-Type: application/json');

  include_once '../config/database.php';
  include_once '../objects/game.php';

  $database = new Database();
  $connection = $database->getConnection();

  $game= new Game($connection);
  $game->username = isset($_GET['username']) ? $_GET['username'] : die();

  $game-> readOne();

  // create array
  $game_arr = array(
    "username" => $game->username,
    "levelplay" => $game->levelplay,
    "modeplay" => $game->modeplay
  );
  print_r(json_encode($game_arr));
?>
