<?php
    $servername = "localhost";
    $username = "root";
    $password = "";


    // $db = "CREATE DATABASE mydb";
    // $result = mysqli_query($conn, $db);
    // if($result) {
    //     echo "Database created: " . var_dump($result);
    // } else {
    //     echo "Database creation error: " . mysqli_error($conn);
    // }

    $database = "mydb";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if($conn) {
        echo "Connected Successfully";
    } else {
        echo "Connection Error: " . mysqli_connect_error();
    }

    $tabelQuery = "CREATE TABLE `mytable` (`Sr.no` INT NOT NULL , `Name` VARCHAR(20) NOT NULL , `Email` VARCHAR(10) NOT NULL , `Sex` VARCHAR(10) )";

    $resul1t = mysqli_query($conn, $tabelQuery);
    if($resul1t) {
        echo "tABLE created: " . var_dump($resul1t);
    } else {
        echo "Database creation error: " . mysqli_error($conn);
    }
?>
