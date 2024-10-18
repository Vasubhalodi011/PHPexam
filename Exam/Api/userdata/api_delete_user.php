<?php 
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");

include "../../config/config.php";

$config = new Config();

if ($_SERVER["REQUEST_METHOD"] == 'DELETE') {

    $input = file_get_contents("php://input");

    parse_str($input, $_DELETE);

    $id = $_DELETE['id'];
    
    $res = $config->deleteuser($id);
    if($res){
       $arr['data'] = "Data Deleted";
       
    }else{
        $arr['data'] = "Data Not Deleted";
    }
}else{    
    $arr['err'] = "Invalid Request";
}
echo json_encode($arr);


?>