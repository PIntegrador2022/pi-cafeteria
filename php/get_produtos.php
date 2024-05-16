<?php
include("connect.php");

if (isset($_GET['categoria_id'])) {
    $categoriaId = $_GET['categoria_id'];
    
    $sql_produtos = "SELECT id, nome, preco FROM produtos WHERE categoria_id = :categoria_id";
    $stmt_produtos = $pdo->prepare($sql_produtos);
    $stmt_produtos->bindParam(':categoria_id', $categoriaId);
    $stmt_produtos->execute();
    
    $produtos = $stmt_produtos->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($produtos);
} else {
    echo json_encode(["error" => "Categoria não especificada"]);
}
?>
