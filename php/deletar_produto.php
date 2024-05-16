<?php
include("connect.php");

if(isset($_POST['id_produto'])) {
    $id_produto = $_POST['id_produto'];

    try {
        $sql = "DELETE FROM produtos WHERE id = :id_produto";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_produto', $id_produto);
        $stmt->execute();

        header("Location: ../admin/cardapio.php?sucesso=1");
        exit();
    } catch(PDOException $e) {
        echo "Ocorreu um erro. " . $e->getMessage();
    }
} else {
    header("Location: ../admin/cardapio.php");
    exit();
}
?>
