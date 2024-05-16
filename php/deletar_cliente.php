<?php
include("connect.php");

$idCliente = $_POST['idCliente'];

// Verifica se o cliente possui pedidos ativos
$sql = "SELECT COUNT(*) AS total_pedidos FROM pedidos WHERE cliente_id = :idCliente";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idCliente', $idCliente);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$totalPedidos = $row['total_pedidos'];

if ($totalPedidos > 0) {
    // Se o cliente possuir pedidos ativos, redireciona de volta para a página de clientes com uma mensagem explicativa
    // pois ocorre um erro ao deletar um cliente com pedido ativo, dado as chaves relacionadas no banco de dados
    header("Location: ../admin/clientes.php?erro=1");
    exit();
}

// Se não houver pedidos ativos, exclui o cliente normalmente
try {
    $sql = "DELETE FROM clientes WHERE idCliente = :idCliente";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idCliente', $idCliente);
    $stmt->execute();

    // Redireciona de volta p página de clientes com uma mensagem de sucesso
    header("Location: ../admin/clientes.php?sucesso=1");
    exit();
} catch(PDOException $e) {
    header("Location: ../admin/clientes.php");
    exit();
}
?>
