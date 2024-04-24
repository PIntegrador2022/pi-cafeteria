<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

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

// --------- Diferenças de uso do PDO e mysqli -----------
// Conectar ao Banco de Dados:

//     MySQLi: mysqli_connect(host, username, password, dbname)
//     PDO: $pdo = new PDO("mysql:host=host;dbname=dbname", username, password)

// Preparar uma Consulta SQL:

//     MySQLi: mysqli_prepare(connection, query)
//     PDO: $stmt = $pdo->prepare(query)

// Executar uma Consulta Preparada:

//     MySQLi: mysqli_stmt_execute(statement)
//     PDO: $stmt->execute()

// Vincular Parâmetros a uma Consulta Preparada:

//     MySQLi: mysqli_stmt_bind_param(statement, types, params)
//     PDO: $stmt->bindParam(':param', $value) ou $stmt->bindValue(':param', $value)

// Obter Resultados de uma Consulta:

//     MySQLi: mysqli_stmt_bind_result(statement, vars)
//     PDO: $stmt->bindColumn(column, $var)

// Buscar uma Linha de Resultados:

//     MySQLi: mysqli_stmt_fetch(statement)
//     PDO: $stmt->fetch(PDO::FETCH_ASSOC)

// Número de Linhas Afetadas:

//     MySQLi: mysqli_stmt_affected_rows(statement)
//     PDO: $stmt->rowCount()
  
?>
