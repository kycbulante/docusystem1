<?php
    $host = "localhost:3307";
    $username = "root";
    $password = "";
    $database = "document";

    //database connection
    $con = mysqli_connect($host, $username, $password, $database);

    //check connection
    if(!$con){
        die("connection failed:". mysqli_connect_error());
    }
    ?>