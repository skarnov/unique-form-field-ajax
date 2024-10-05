<?php

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "db_tests";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $email = filter_input(INPUT_POST, 'email');

    $sql = "SELECT * FROM tbl_users WHERE user_email = '$email'";
    $result = $conn->query($sql)->fetch_assoc();

    if ($result) {
        echo 'Already Exits';
    } else {
        echo 'Valid Input';
    }