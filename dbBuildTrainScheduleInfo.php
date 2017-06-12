<?php
include "pdo_sql.php";
include "myPhpAPIs.php";

$json = file_get_contents("./OpenData/TrainSchedules/20170610.json");
// var_dump($json);

$src_encoding = mb_detect_encoding($json, mb_list_encodings(), true); // not really working
echo "source encoding: " . $src_encoding . '<br>';
$result = mb_convert_encoding($json, "utf-8", $src_encoding);
$root = json_decode($result, true);
echo gettype($root) . '<br>';
// var_dump($result);

myPrintObj('', $root["TrainInfos"], '<br>');



?>

