<?php
include("connect.php");

if (isset($_GET['produto_id'])) {
    $produtoId = $_GET['produto_id'];
    
    $sql_preco = "SELECT preco FROM produtos WHERE id = :produto_id";
    $stmt_preco = $pdo->prepare($sql_preco);
    $stmt_preco->bindParam(':produto_id', $produtoId);
    $stmt_preco->execute();
    
    // Obter o preço do produto da consulta
    $preco = $stmt_preco->fetch(PDO::FETCH_ASSOC);
    
    // Retornar o preço do produto em formato JSON
    echo json_encode($preco);
} else {
    echo json_encode(["error" => "ID do produto não especificado"]);
}
?>
