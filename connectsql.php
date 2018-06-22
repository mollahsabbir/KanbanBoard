<?php
    //This page will be called throughout the project
    //wherever a connection to the sql database is necessary

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kanbanboard";

    // Create connection, $conn var will be used globally to execute sql queries
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    //echo "Connected successfully";
?> 