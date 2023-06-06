<?php
header ('Access-Control-Allow-Origin: *');
header  ('Access-Control-Allow-Headers: Content-Type');
header  ("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");



require '../connect.php';
$postdata = file_get_contents("php://input");

// json_decode
//$request = json_decode($postdata);
//$name = $request->data->name;
//$age = $request->data->age;
//$leave = ['name' => $name, 'age' => $age];

$leave = ["employeeName" => 'Rwwww',
            'startDate'  => '01-02-2023',
            'endDate'    => '04-02-2023',
            'leaveType'  => 'personal',
            'status'      => 'pending'

        ];


$employee_name   = $leave["employeeName"];
//$start_date      = date($leave['startDate']) ;
$start_date      = date("Y-m-d", strtotime($leave['startDate']));
$end_date      =  date("Y-m-d", strtotime($leave['endDate']));
/
$leave_type      = $leave['leaveType'];
$status          = $leave['status'];


// Extract values to insert

$sth = $dbh->prepare("INSERT INTO `leave`(
                employee_name,
                start_date,
                end_date,
                leave_type,
                status
                ) VALUES (:employee_name, 
                          :start_date,
                          :end_date,
                          :leave_type,
                          :status

                   )");

$sth -> bindParam(':employee_name', $employee_name);
$sth -> bindParam(':start_date',$start_date);
$sth -> bindParam(':end_date', $end_date);
$sth -> bindParam(':leave_type', $leave_type);
$sth -> bindParam(':status', $status);


$sth ->execute();

//$leave = {name: $name, age: $age}
echo json_encode(['data'=> $leave]);  // hard code test

//Return to frontend
//echo json_encode(['data'=> $request]);
