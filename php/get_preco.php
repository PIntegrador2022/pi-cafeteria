<?php
// Inclua o arquivo de conexão com o banco de dados
include("connect.php");

if (isset($_GET['produto_id'])) {
    $produtoId = $_GET['produto_id'];
    
    // Consulta SQL para obter o preço do produto selecionado
    $sql_preco = "SELECT preco FROM produtos WHERE id = :produto_id";
    $stmt_preco = $pdo->prepare($sql_preco);
    $stmt_preco->bindParam(':produto_id', $produtoId);
    $stmt_preco->execute();
    
    // Obter o preço do produto da consulta
    $preco = $stmt_preco->fetch(PDO::FETCH_ASSOC);
    
    // Retornar o preço do produto em formato JSON
    echo json_encode($preco);
} else {
    // Se o ID do produto não for especificado, retorne uma mensagem de erro
    echo json_encode(["error" => "ID do produto não especificado"]);
}
?>
