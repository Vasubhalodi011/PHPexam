<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include "../../config/config.php";

$config = new Config();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Contact = $_POST['Contact'];
    
    $res = $config->insertupcomingmovie($Name, $Email, $Contact);
    if($res){
       $arr['data'] = "Data Inserted";
       http_response_code(201);
    }else{
        $arr['data'] = "Data Not Inserted";
    }
}else{
    $arr['err'] = "Invalid Request";
}

echo json_encode($arr);


?>