<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';
include_once '../objects/commentobj.php';

$database = new Database();
$connection = $database->getConnection();

$cm = new Comment($connection);
$data = json_decode(file_get_contents("php://input"));

if(
  !empty($data->username) &&
  !empty($data->message)
){
  $cm->username = $data->username;
  $cm->message = $data->message;
  if($cm->create()){
    http_response_code(201);
    //echo json_encode(array("message" => "ส่งข้อความเรียบร้อยแล้ว ขอบคุณสำหรับความคิดเห็นค่ะ"));
  }
  else{
    http_response_code(503);
    //echo json_encode(array("message" => "Unable to comment."));
  }
}
else{
  http_response_code(400);
  //json_encode(array("message" => "Unable to comment. Data is incomplete."));
}
?>
