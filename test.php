<?php
require 'connect.php'; //

//$array = array();
for ($x = 1; $x <= 10; $x++)
{
     $array[] = $x;
}
var_dump($array);
// * Testing hard code

//$var = array("heroesUrl" => "apiheroes",
//         "textfile" => "assetstextfile.txt",
//         "date" => "2020-01-29");

//
//$cost_example = array(2, 3, 4, 5 );
//$array_mapped = array_map(function ($array_item){
//    return $array_item;
//}, $cost_example);
//$data = [];
$i = 0;
$array = array();
$sth = $dbh->prepare('SELECT 
                                tx_id, employee_name,start_date, end_date, days, leave_type,
                                reason, status
                                from `leave`');
$sth->execute();

//    $res = $sth->fetchAll(PDO::FETCH_ASSOC);;
//    echo '-------------- fetchAll in just one ----------------';
//    var_dump($res);
//while($res = $sth->fetch(PDO::FETCH_ASSOC) ) {
//    $row[] = $row;
//    var_dump($res);
foreach ($sth ->fetchAll(PDO::FETCH_ASSOC) as $row) {
//        var_dump(json_encode($row));
    $data["txId"] = $row["tx_id"];
    $data["employeeName"] = $row["employee_name"];
    $data["startDate"] = $row["start_date"];
    $data["endDate"] = $row["end_date"];
    $data["days"] = $row["days"];
    $data["leaveType"] = $row["leave_type"];
    $data["reason"] = $row["reason"];
    $data["status"] = $row["status"];

    array_push($array(), $data);
}
    var_dump(json_encode($data));


//    array_push( $res[], json_encode($data));
//    echo "Encoded data: -------";
//    var_dump($res);
//    $i++;




//    foreach ($res as $row => $rowvalue)
//    {
//        foreach ($rowvalue as $rowkey => $rowdata) {
//            $data[$i]["txId"] =  $rowdata["tx_id"];
//            $data[$i]["employeeName"] =  $rowdata["employee_name"];
//            $data[$i]["startDate"] =  $rowdata["start_date"];
//            $data[$i]["endDate"] =  $rowdata["days"];
//            $data[$i]["days"] =  $rowdata["leave_type"];
//            $data[$i]["reason"] =  $rowdata["reason"];
//            $data[$i]["status"] =  $rowdata["status"];
//            $i++;
//
//        }
//    }

//var_dump($data);
//var_dump(json_encode($res));

// * Testing hard code
//echo json_encode($var); // testing hard code

//echo json_encode($res);
//echo json_encode(['data'=> $res]);
