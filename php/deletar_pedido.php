<?php
require_once 'connect.php';

if (isset($_POST['id_pedido'])) {
    $id_pedido = $_POST['id_pedido'];

    $sql = "DELETE FROM pedidos WHERE id = :id";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id_pedido);
        $stmt->execute();

        header("Location: ../admin/pedidos.php?sucesso=1");
        exit();
    } catch (PDOException $e) {
        header("Location: ../admin/pedidos.php?sucesso=0");
        exit();
    }
} else {
    header("Location: ../admin/pedidos.php");
    exit();
}
?>
