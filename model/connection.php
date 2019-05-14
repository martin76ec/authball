<?php

//
// ──────────────────────────────────────────────────────────────────── I ──────────
//   :::::: P D O   C O N N E C T I O N : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────
//

    $host = 'authball.mariadb.database.azure.com';
    $db   = 'authball';
    $user = 'authuser@authball';
    $pass = 'htua';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];


    try {
        $con = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        echo $e->getMessage();
        //throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
    
