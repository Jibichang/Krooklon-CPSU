<?php
// header("Access-Control-Allow-Origin: http://localhost/rest-api-authentication-example/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/member.php';

$database = new Database();
$db = $database->getConnection();

$member = new Member($db);

$data = json_decode(file_get_contents("php://input"));

$member->username = $data->username;
$member->email = $data->email;
$member->password = $data->password;
$email_exists = $member->emailExists();

if(!$email_exists){
  if($member->create()){
    http_response_code(200);
    echo json_encode(array("message" => "User was created."));
  }

  // message if unable to create user
  else{
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create user."));
  }

}
else{
  http_response_code(400);
  echo json_encode(array("message" => "Unable to create user again."));
}


?>
