<?php

$user = 'root';
$pass = 'leavemngt';


try {
    $arry = [];
    $dbh = new PDO('mysql:host=localhost;dbname=leavemngt', $user, $pass);
//    foreach($dbh->query('SELECT * from `leave`') as $row) {
//        print_r($row);
//    }
//    ------------------------------------------------------
//    $sth = $dbh->prepare('SELECT * from `leave`');
//    $sth->execute();
//    ------------------------------------------------------
//    $res = $sth->fetchAll(PDO::FETCH_ASSOC);
//    var_dump($res); // test
//    $dbh->exec()

//    $resultArr = [];
//    $i = 0;
//    while ($row = $sth->fetchAll(PDO::FETCH_ASSOC)) {
//        echo $result;
//        $resultArr[$i][$result] = $result;
//        $i++;
//    }
//------------------------
//    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
//    $var = json_encode($result);
//    echo $var;
//   ------------------------------
//    var_dump($var);
//    print_r($result);

//    return array_map(function ($record) use ($arry){
//        $arr[] = json_encode($record);
//        array_push($arry, $arr);
//
//    }, $sth->fetchAll(PDO::FETCH_ASSOC));


//    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
