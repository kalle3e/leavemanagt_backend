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
    $sth = $dbh->prepare('SELECT * from `tetable`');
    $sth->execute();
    $res = $sth->fetchAll(PDO::FETCH_ASSOC);

//var_dump(json_encode($res));

// * Testing hard code
//echo json_encode($var); // testing hard code

    echo json_encode($res);
//echo json_encode(['data'=> $Rec]);
