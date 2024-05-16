<?php
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pedido = $_POST['id_pedido'];
    $atendido = $_POST['atendido'];

    // Inverte o estado do atendimento
    $novo_estado = $atendido ? 0 : 1;

    // Atualiza o status do pedido no banco de dados
    $sql = "UPDATE pedidos SET atendido = :atendido WHERE id = :id_pedido";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':atendido', $novo_estado);
    $stmt->bindParam(':id_pedido', $id_pedido);
    $stmt->execute();

    header("Location: ../admin/pedidos.php");
    exit();
}
?>
