<?php

session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "marchiatto_db"; //criada pelo phpmyadmin

    global $pdo; //(php data object) é um módulo de suporte a banco de dados no php, é útil p/ padronização

    try{
        $pdo = new PDO("mysql:dbname=".$dbname."; host=".$servername, $username, $password);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Tbm podia ser feito de modo mais simples, 
        // sem usar o PDO, EX: $conn = new mysqli($servername, $username, $password, $dbname);

    } catch(PDOException $e){
        echo "ERRO: " .$e->getMessage();
        exit;
    }

  
?>
