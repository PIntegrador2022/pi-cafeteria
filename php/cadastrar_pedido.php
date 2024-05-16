<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../php/connect.php");

    if (isset($_POST['cliente']) && isset($_POST['produto']) && isset($_POST['preco_total'])) {
        $clienteId = $_POST['cliente'];
        $produtoId = $_POST['produto'];
        $precoTotal = $_POST['preco_total'];

        try {
            // Insere os dados do novo pedido na tabela de pedidos
            $sql = "INSERT INTO pedidos (cliente_id, produto_id, preco_produto) VALUES (:cliente_id, :produto_id, :preco_produto)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':cliente_id', $clienteId);
            $stmt->bindParam(':produto_id', $produtoId);
            $stmt->bindParam(':preco_produto', $precoTotal);
            $stmt->execute();

            // Redireciona para a página de admin com uma mensagem de sucesso
            header("Location: ../admin/admin.php?sucesso_pedido=1");
            exit();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    } else {
        // Se algum campo estiver faltando, redireciona com uma mensagem de erro
        header("Location: ../admin/admin.php?erro_pedido=1");
        exit();
    }
} else {
    // Se o formulário não foi submetido corretamente, redireciona com uma mensagem de erro
    header("Location: ../admin/admin.php?erro_pedido=1");
    exit();
}
?>
