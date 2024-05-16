<?php
    include("connect.php");

    $codigo = $_POST["idCliente"];
    $novonome = $_POST["novoNome"];
    $novotelefone = $_POST["novoTelefone"];

    try {   //é a mesma ideia do cadastro
        $sql = "UPDATE clientes SET nome = :novonome, telefone = :novotelefone WHERE idCliente = :codigo";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':novonome', $novonome);
        $stmt->bindParam(':novotelefone', $novotelefone);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();

        header("Location: ../admin/clientes.php?sucesso=2"); //texto de sucesso
        exit();
    } catch(PDOException $e) {
        echo "Ocorreu um erro. " . $e->getMessage();
    }
?>
