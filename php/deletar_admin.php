<?php
require_once 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idAdmin'])) {
    $idAdmin = $_POST['idAdmin'];

    try {
        // Verifica se o admin a ser deletado é o mesmo que está logado no momento
        if ($idAdmin == $_SESSION['idUser']) {
            $sql = "SELECT COUNT(*) FROM usuarios";
            $stmt = $pdo->query($sql);
            $rowCount = $stmt->fetchColumn();

            // Verifica se há mais de um administrador no sistema
            if ($rowCount > 1) {
                $sql = "DELETE FROM usuarios WHERE idUsuario = :idAdmin";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':idAdmin', $idAdmin);
                $stmt->execute();

                session_unset();
                session_destroy();

                // Redireciona para a página inicial do site
                header("Location: ../index.php");
                exit();
            } else {
                // Se houver apenas um administrador, impede a exclusão e redireciona de volta com mensagem de erro
                header("Location: ../admin/gerenciar_admins.php?erro=3");
                exit();
            }
        } else {
            // Se o admin a ser deletado não é o mesmo que está logado, apenas exclui o registro do banco de dados
            $sql = "DELETE FROM usuarios WHERE idUsuario = :idAdmin";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':idAdmin', $idAdmin);
            $stmt->execute();

            header("Location: ../admin/gerenciar_admins.php?sucesso_delete_admin=1");
            exit();
        }
    } catch (PDOException $e) {
        header("Location: ../admin/gerenciar_admins.php?erro=1");
        exit();
    }
}
?>
