<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/game.php';

$database = new Database();
$connection = $database->getConnection();

$game= new Game($connection);
$data = json_decode(file_get_contents("php://input"));
//echo file_get_contents("php://input");
//$data = $data ->data;
$game_arr = array(
  "username" => $data->username,
  "levelplay" => $data->levelplay,
  "modeplay" => $data->modeplay,
  "botplay" => $data->botplay
);
print_r(json_encode($game_arr));

if(
  !empty($data->username)
){

  // set property values levelplay	modeplay	botplay
  $game->username = $data->username;
  $game->levelplay = $data->levelplay;
  $game->modeplay = $data->modeplay;
  $game->botplay = $data->botplay;
  // $Game->status = $data->status;
  // $Game->onlineLastTime  = $date('Y-m-d H:i:s');

  // create
  if($game->create()){
    // set response code - 201 created
    http_response_code(201);
    // tell the user
    echo json_encode(array("message" => "OnlineMember was created."));
  }
  // if unable to create , tell the user
  else{
    // set response code - 503 service unavailable
    http_response_code(503);
    // tell the user
    echo json_encode(array("message" => "Unable to create OnlineMember."));
  }
}
// tell the user data is incomplete
else{
  // set response code - 400 bad request
  http_response_code(400);
  // tell the user
  echo json_encode(array("message" => "Unable to create OnlineMember. Data is incomplete."));
}
?>
