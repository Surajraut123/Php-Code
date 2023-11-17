<?php
    $servername = "localhost";
    $username="root";
    $password="";


    $conn = mysqli_connect($servername, $username, $password);
    $sql = "CREATE DATABASE mydb";
    mysqli_query($conn, $sql);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
?>