<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idAdmin']) && isset($_POST['nome']) && isset($_POST['senha_antiga']) && isset($_POST['nova_senha']) && !empty($_POST['idAdmin']) && !empty($_POST['nome']) && !empty($_POST['senha_antiga']) && !empty($_POST['nova_senha'])) {
        $idAdmin = $_POST['idAdmin'];
        $nome = $_POST['nome'];
        $senhaAntiga = md5($_POST['senha_antiga']); // Convertendo a senha antiga para MD5
        $novaSenha = md5($_POST['nova_senha']); // Convertendo a nova senha para MD5

        // Verifica se a senha antiga está correta
        $sql_verifica_senha = "SELECT * FROM usuarios WHERE idUsuario = :idAdmin AND senha = :senhaAntiga";
        $stmt_verifica_senha = $pdo->prepare($sql_verifica_senha);
        $stmt_verifica_senha->bindValue(':idAdmin', $idAdmin);
        $stmt_verifica_senha->bindValue(':senhaAntiga', $senhaAntiga);
        $stmt_verifica_senha->execute();

        if ($stmt_verifica_senha->rowCount() > 0) {
            // Atualiza o nome e a senha do administrador
            $sql_atualizar_admin = "UPDATE usuarios SET nome = :nome, senha = :novaSenha WHERE idUsuario = :idAdmin";
            $stmt_atualizar_admin = $pdo->prepare($sql_atualizar_admin);
            $stmt_atualizar_admin->bindValue(':nome', $nome);
            $stmt_atualizar_admin->bindValue(':novaSenha', $novaSenha);
            $stmt_atualizar_admin->bindValue(':idAdmin', $idAdmin);

            if ($stmt_atualizar_admin->execute()) {
                header("Location: ../admin/gerenciar_admins.php?sucesso=2");
                exit();
            } else {
                header("Location: ../admin/gerenciar_admins.php?erro=1");
                exit();
            }
        } else {
            // Senha antiga incorreta
            header("Location: ../admin/gerenciar_admins.php?erro=2");
            exit();
        }
    } else {
        header("Location: ../admin/gerenciar_admins.php");
        exit();
    }
} else {
    header("Location: ../admin/gerenciar_admins.php");
    exit();
}
