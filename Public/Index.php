<?php
header ('Access-Control-Allow-Origin: *');
header  ('Access-Control-Allow-Headers: Content-Type');
header  ("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");


require '../connect.php'; //

// * Testing hard code

//$var = array("heroesUrl" => "apiheroes",
//         "textfile" => "assetstextfile.txt",
//         "date" => "2020-01-29");

//
$array = array();
$sth = $dbh->prepare('SELECT 
                            tx_id, employee_name,start_date, end_date, days, leave_type,
                            reason, status
                            from `leave`');
$sth->execute();
//$res = $sth ->fetchAll(PDO::FETCH_ASSOC);

foreach ($sth ->fetchAll(PDO::FETCH_ASSOC) as $row) {

    $data["txId"]           = $row["tx_id"];
    $data["employeeName"]   = $row["employee_name"];
    $data["startDate"]      = $row["start_date"];
    $data["endDate"]        = $row["end_date"];
    $data["days"]           = $row["days"];
    $data["leaveType"]      = $row["leave_type"];
    $data["reason"]         = $row["reason"];
    $data["status"]         = $row["status"];

    array_push($array, $data);
//    $res[] = data;
//    $res = [...$data];
}

echo json_encode(['data'=> $array]);
//echo json_encode(['data'=> $res]);

