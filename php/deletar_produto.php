<?php
// Incluindo o arquivo de conexão com o banco de dados
include("connect.php");

// Verificando se o ID do produto foi enviado via POST
if(isset($_POST['id_produto'])) {
    // Obtendo o ID do produto a ser excluído
    $id_produto = $_POST['id_produto'];

    try {
        // Preparando e executando a consulta SQL para excluir o produto
        $sql = "DELETE FROM produtos WHERE id = :id_produto";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_produto', $id_produto);
        $stmt->execute();

        // Redirecionando de volta à página do cardápio com uma mensagem de sucesso
        header("Location: ../admin/cardapio.php?sucesso=1");
        exit();
    } catch(PDOException $e) {
        // Em caso de erro, exibimos uma mensagem de erro
        echo "Ocorreu um erro. " . $e->getMessage();
    }
} else {
    // Se o ID do produto não foi enviado, redirecionamos de volta à página do cardápio
    header("Location: ../admin/cardapio.php");
    exit();
}
?>
