<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$man = new MongoDB\Driver\Manager("mongodb+srv://arunaa_s:arunaa_s@guvi_task_20csr020.tohgkb0.mongodb.net/?retryWrites=true&w=majority");

$query = new MongoDB\Driver\Query(['_id'=>$_POST['email']]);
$cur = $man->executeQuery("guvi_data.user_data", $query);

foreach ($cur as $obj) {
    
    $document = json_decode(json_encode($obj), true);
    $data["result"] = $document ;
}

echo json_encode($data);

?>