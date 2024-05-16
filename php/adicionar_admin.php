<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $senha = md5($_POST['senha']); // Convertendo a senha para MD5

    try {
        $sql = "INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        header("Location: ../admin/admin.php?sucesso_admin=1"); // Redireciona com mensagem de sucesso
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        header("Location: ../admin/admin.php?sucesso_admin=0"); // Redireciona com mensagem de erro
    }
}
?>
