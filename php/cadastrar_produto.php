<?php
// Verifica se os ados foram enviados via  POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["categoria"]) && isset($_POST["nome"]) && isset($_POST["descricao"]) && isset($_POST["preco"])) {
        require_once "connect.php";

        $categoria_id = $_POST["categoria"];
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $preco = $_POST["preco"];

        try {
            // Prepara a consulta SQL para inserir um novo produto na tabela de produtos
            $sql = "INSERT INTO produtos (nome, descricao, categoria_id, preco) VALUES (:nome, :descricao, :categoria_id, :preco)";
            $stmt = $pdo->prepare($sql);
            // Vincula os parâmetros da consulta aos valores dos campos do formulário
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":descricao", $descricao);
            $stmt->bindParam(":categoria_id", $categoria_id);
            $stmt->bindParam(":preco", $preco);
            if ($stmt->execute()) {
                header("Location: ../admin/admin.php?sucesso_produto=1");
                exit();
            } else {
                header("Location: ../admin/admin.php?sucesso_produto=0");
                exit();
            }
        } catch (PDOException $e) {
            header("Location: ../admin/dmin.php?sucesso_produto=0");
            exit();
        }
    } else {
        header("Location: ../admin/admin.php?sucesso_produto=0");
        exit();
    }
}
?>
