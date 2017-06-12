<?php

include "pdo_sql.php";

$date = '20170608';
$train = '754';
// $depStation = '100';
$depStation = '';
// $arrStation = '158';
$arrStation = '';
$depStnChtName = '臺北';
$arrStnChtName = '高雄';
// $arrStnChtName = '內灣';


$pdo = @new pdo($pdo_dsn, $db_user, $db_password, $pdo_opt);
$sql_tickets = "SELECT date, train, depStation, arrStation, tickets FROM Tickets WHERE date = ? AND depStation = ? AND arrStation = ?";
// $sql_stnInfo = "SELECT StnChtName, StnEngName FROM StationsInfo WHERE StnCode_3 = ?";
$sql_stnInfo = "SELECT StnCode_3 FROM StationsInfo WHERE StnChtName = ?";

// $depStnInfo = array();
// $arrStnInfo = array();

$stmt = $pdo->prepare($sql_stnInfo);
$stmt->execute([$depStnChtName]);
$rs = $stmt->fetch(PDO::FETCH_ASSOC);
// $rs = $stmt->fetch(PDO::FETCH_BOTH);
foreach ($rs as $key => $val) {
    echo "$key: $val\t";
    $depStation = $val; // should be only one
}

echo "Depart: {$depStnChtName}:{$depStation}".'<br>';
echo '<hr>';


$stmt->execute([$arrStnChtName]);
$rs = $stmt->fetch(PDO::FETCH_ASSOC);
// $rs = $stmt->fetch(PDO::FETCH_BOTH);
foreach ($rs as $key => $val) {
    echo "$key: $val\t";
    $arrStation = $val; // should be also only one
}

echo "Arrive: {$arrStnChtName}:{$arrStation}".'<br>';
echo '<hr>';



$stmt = $pdo->prepare($sql_tickets);
// $stmt->execute([$date, $train]);
$stmt->execute([$date, $depStation, $arrStation]);

// var_dump($stmt);

// var_dump($stmt);
$isFetched = false;
while ( $rs = $stmt->fetch(PDO::FETCH_ASSOC) ) {

    foreach ($rs as $key => $val) {
        echo "$key: $val\t";
    }
    echo "<br>";

    $isFetched = true;
}

if ($isFetched) {
    echo 'Got train'.'<br>';
} else {
    echo 'No train'.'<br>';
}

?>