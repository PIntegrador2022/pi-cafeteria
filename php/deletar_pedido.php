<?php
// Inclua o arquivo de conexão com o banco de dados
require_once 'connect.php';

// Verifique se o ID do pedido foi enviado via POST
if (isset($_POST['id_pedido'])) {
    $id_pedido = $_POST['id_pedido'];

    // Consulta SQL para deletar o pedido com o ID fornecido
    $sql = "DELETE FROM pedidos WHERE id = :id";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id_pedido);
        $stmt->execute();

        // Redirecione de volta à página de pedidos com uma mensagem de sucesso
        header("Location: ../admin/pedidos.php?sucesso=1");
        exit();
    } catch (PDOException $e) {
        // Em caso de erro, redirecione de volta à página de pedidos com uma mensagem de erro
        header("Location: ../admin/pedidos.php?sucesso=0");
        exit();
    }
} else {
    // Se o ID do pedido não foi enviado, redirecione de volta à página de pedidos
    header("Location: ../admin/pedidos.php");
    exit();
}
?>
