<?php

header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

include "../../config/config.php";

$config = new Config();

if ($_SERVER["REQUEST_METHOD"] == 'GET') {

    $res = $config->fetchuser();

    $all_users = [];

    while ($result = mysqli_fetch_assoc($res)) {
        array_push($all_users, $result);
    }

    $arr['data'] = $all_users;


} else {
    $arr['err'] = "Invalid Request";
}
echo json_encode($arr);


?>