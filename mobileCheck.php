<?php

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "db_tests";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $mobile = filter_input(INPUT_POST, 'mobile');

    $sql = "SELECT * FROM tbl_users WHERE user_mobile = '$mobile'";
    $result = $conn->query($sql)->fetch_assoc();

    if ($result) {
        echo 'Already Exits';
    } else {
        echo 'Valid Input';
    }