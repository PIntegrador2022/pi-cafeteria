<?php
// Inclua o arquivo de conexão com o banco de dados
include("connect.php");

if (isset($_GET['categoria_id'])) {
    $categoriaId = $_GET['categoria_id'];
    
    // Consulta SQL para obter os produtos da categoria selecionada
    $sql_produtos = "SELECT id, nome, preco FROM produtos WHERE categoria_id = :categoria_id";
    $stmt_produtos = $pdo->prepare($sql_produtos);
    $stmt_produtos->bindParam(':categoria_id', $categoriaId);
    $stmt_produtos->execute();
    
    // Obter os produtos da consulta
    $produtos = $stmt_produtos->fetchAll(PDO::FETCH_ASSOC);
    
    // Retornar os produtos em formato JSON
    echo json_encode($produtos);
} else {
    // Se a categoria não for especificada, retorne uma mensagem de erro
    echo json_encode(["error" => "Categoria não especificada"]);
}
?>
