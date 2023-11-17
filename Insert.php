<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mydb";

    $conn = mysqli_connect($servername, $username, $password, $database);
    if ($conn) {
        echo "Connected Successfully";
    } else {
        echo "Connection Error: " . mysqli_connect_error();
    }

    $sql = "INSERT INTO `mytable` (`Sr.no`, `Name`, `Email`, `Sex`) VALUES 
    ('1', 'Suraj', 'abc@gmail.com', 'Male'),
    ('2', 'Raut', 'abc@gmail.com', 'Male')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data Inserted";
    } else {
        echo "Data Insertion Error: " . mysqli_error($conn);
    }
?>
