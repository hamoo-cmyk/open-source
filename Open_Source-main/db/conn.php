<?php 
    $host = 'localhost';
    $db = 'a.mousa_pharmacy';
    $username = 'root';
    $pass = 'root';
    $charset = 'utf8';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $username, $pass);
        $pdo->setAttribute(pdo::ERRMODE_EXCEPTION,pdo::ATTR_ERRMODE);
    } catch (PDOException $th) {
        throw new PDOException($th->getMessage());
    }
    require_once 'db/crud.php';
    require_once 'db/user.php';
    $c = new crud($pdo);
    $us = new user($pdo);
    // $us->insertuser("thomas","pass");

?>