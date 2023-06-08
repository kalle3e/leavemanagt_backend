<?php
header ('Access-Control-Allow-Origin: *');
header  ('Access-Control-Allow-Headers: Content-Type');
header  ("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");



require '../connect.php';

    $isUpdate = false;
    $isCreate = false;

    $postdata = file_get_contents("php://input");

    // json_decode
    $request = json_decode($postdata);

    if (is_null($request->data->txId )) {
        $isCreate = true;
    } else {
        $isUpdate = true;
        $txId     = (int)$request->data->txId;
    }

    $employeeName      = $request->data->employeeName;
    $startDate         = date("Y-m-d", strtotime($request->data->startDate));
    $endDate           = date("Y-m-d", strtotime($request->data->endDate));
    $days              = (int)$request->data->days;
    $leaveType         = $request->data->leaveType;
    $reason            = $request->data->reason;
    $status            = $request->data->status;


    //$leave = ['name' => $name, 'age' => $age];
    //
//    $leave = ["employeeName" => 'Rwwww',
//                'startDate'  => '01-02-2023',
//                'endDate'    => '04-02-2023',
//                'days'       => 2,
//                'leaveType'  => 'personal',
//                'reason'     => 'a',
//                'status'      => 'pending'
//
//            ];

//        $employeeName = $leave["employeeName"];
//        $startDate = date("Y-m-d", strtotime($leave['startDate']));
//        $endDate = date("Y-m-d", strtotime($leave['endDate']));
//        $days = $leave['days'];
//        $leaveType = $leave['leaveType'];
//        $reason = $leave['reason'];
//        $status = $leave['status'];

    if (isset($request)) {


        if ($isUpdate) {
            $sth = $dbh->prepare("SELECT * from `leave`
                                     WHERE  tx_id = ?

                     ");
            $sth->execute([$txId]);
//        echo "Row Count: {$sth->rowCount()}";
//        var_dump($sth->rowCount());
//        echo "               ";
            if (0 < $sth->rowCount()) {

                $sth = $dbh->prepare("
                        UPDATE `leave`
                            SET employee_name       = :employeeName,
                            start_date              = :startDate,
                            end_date                = :endDate,
                            days                    = :days,
                            leave_type              = :leaveType,
                            reason                  = :reason,
                            status                  = :status,
                            updated_at              = CURRENT_TIMESTAMP
                        where tx_id = :txId
        ");
                $sth->bindParam(':txId', $txId);
                $sth->bindParam(':employeeName', $employeeName);
                $sth->bindParam(':startDate', $startDate);
                $sth->bindParam(':endDate', $endDate);
                $sth->bindParam(':days', $days);
                $sth->bindParam(':leaveType', $leaveType);
                $sth->bindParam(':reason', $reason);
                $sth->bindParam(':status', $status);

                $sth->execute();

            }
        }
        if ($isCreate) {
            $sth = $dbh->prepare("
                        INSERT INTO `leave`(
                            employee_name,
                            start_date,
                            end_date,
                            days,
                            leave_type,
                            reason,
                            status,
                            created_at
                        
                       
                        ) VALUES (:employeeName,
                                  :startDate,
                                  :endDate,
                                  :days,
                                  :leaveType,
                                  :reason,
                                  :status,
                                  CURRENT_TIMESTAMP
                                
                                      
                           )");


            $sth->bindParam(':employeeName', $employeeName);
            $sth->bindParam(':startDate', $startDate);
            $sth->bindParam(':endDate', $endDate);
            $sth->bindParam(':days', $days);
            $sth->bindParam(':leaveType', $leaveType);
            $sth->bindParam(':reason', $reason);
            $sth->bindParam(':status', $status);

            $sth->execute();

        }

//    $tx_id = 249;
//    $request->data->tx_id === $tx_id


//    var_dump($value);
        // Prepare data to return

        $leave = ["txId" => 0, "employeeName" => $employeeName, "startDate" => $startDate, "endDate" => $endDate, "days" => $days, "leaveType" => $leaveType, "reason" => $reason, "status" => $status
        ];

        $isUpdate = false;
        $isCreate = false;
        //$leave = {name: $name, age: $age}
        return json_encode(['data' => $leave]);  // hard code test

    }

    //Return to frontend
    //echo json_encode(['data'=> $request]);


