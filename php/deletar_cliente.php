<?php
    include("connect.php");

    $idCliente = $_POST['idCliente'];

    try {
        $sql = "DELETE FROM clientes WHERE idCliente = :idCliente";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idCliente', $idCliente);
        $stmt->execute();


        header("Location: ../admin/clientes.php?sucesso=1");
        exit();
    } catch(PDOException $e) {
        echo "<h1>Houve um erro. Cliente não excluído.</h1>" . $e->getMessage();
    }
?>
