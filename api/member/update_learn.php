<?php
// required headers
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  // include database and object files
  include_once '../config/database.php';
  include_once '../objects/member.php';

  $database = new Database();
  $connection = $database->getConnection();

  $member = new Member($connection);

  $data = json_decode(file_get_contents("php://input"));
  $member->id = $data->id;

  // set product property values
  $member->subChapt = $data->subChapt;
  $member->learnPage = $data->learnPage;

  // update the product
  if($member->updateLearn()){
    http_response_code(200);
    echo json_encode(array("message" => "User was created."));
  }

  // message if unable to create user
  else{
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create user."));
  }

?>
