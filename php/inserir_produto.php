<?php
// Incluindo o arquivo de conexão com o banco de dados
include("connect.php");

// Recuperando os dados do formulário
$produtoNome = $_POST["produtoNome"];
$produtoDescricao = $_POST["produtoDescricao"];
$produtoPreco = $_POST["produtoPreco"];

// Aqui você pode adicionar a lógica para processar as variações do produto, se necessário

try {
    // Verificando o maior ID existente na tabela de produtos
    $sql_max_id = "SELECT MAX(produtoID) AS max_id FROM Produtos";
    $stmt_max_id = $pdo->query($sql_max_id);
    $row_max_id = $stmt_max_id->fetch(PDO::FETCH_ASSOC);
    $max_id = $row_max_id['max_id'];

    // Definindo o valor para auto incremento do ID do produto
    if ($max_id === NULL) {
        $auto_increment_value = 1; // Se a tabela estiver vazia, define como 1
    } else {
        $auto_increment_value = $max_id + 1; // Se não, define como o máximo ID + um
    }

    // Inserindo o novo produto na tabela de produtos
    $sql_insert_produto = "INSERT INTO Produtos (produtoID, produtoNome, produtoDescricao, produtoPreco) VALUES (:produtoID, :produtoNome, :produtoDescricao, :produtoPreco)";
    $stmt_insert_produto = $pdo->prepare($sql_insert_produto);
    $stmt_insert_produto->bindParam(':produtoID', $auto_increment_value);
    $stmt_insert_produto->bindParam(':produtoNome', $produtoNome);
    $stmt_insert_produto->bindParam(':produtoDescricao', $produtoDescricao);
    $stmt_insert_produto->bindParam(':produtoPreco', $produtoPreco);
    $stmt_insert_produto->execute();

    // Redirecionando de volta para a página do cardápio com mensagem de sucesso
    header("Location: ../admin/cardapio.php?sucesso=1");
    exit();
} catch(PDOException $e) {
    // Exibindo mensagem de erro e redirecionando de volta para a página do cardápio com mensagem de erro
    echo "<h1>Erro: " . $e->getMessage() . "</h1>";
    header("Location: ../admin/cardapio.php?sucesso=0");
    exit();
}
?>