<?php
    include("connect.php");

    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];

    // esse código vai verificar se a tabela está vazia, se estiver,
    // o próximo cliente cadastrado vai começar com o id 1.
    // se apagar clientes, ele vai verificar o maior ID até então,
    // e o próximo cadastrado vai voltar a contar a partir desse.
    // fiz isso pq o MySQL auto_increment sempre somava o ID 
    // a partir do anterior, mesmo que ele já estivesse deletado.

    try {
        // Verifica o maior ID existente na tabela
        $sql_max_id = "SELECT MAX(idCliente) AS max_id FROM clientes";
        $stmt_max_id = $pdo->query($sql_max_id);
        $row_max_id = $stmt_max_id->fetch(PDO::FETCH_ASSOC);
        $max_id = $row_max_id['max_id'];

        // definindo o valor p/ auto incremento
        if ($max_id === NULL) {
            $auto_increment_value = 1; // Se a tabela estiver vazia, define como 1
        } else {
            $auto_increment_value = $max_id + 1; // Se não, define como o máximo ID + um
        }

        // INSERE NOVO CLIENTE
        $sql_insert_cliente = "INSERT INTO clientes (idCliente, nome, telefone) VALUES (:idCliente, :nome, :telefone)";
        $stmt_insert_cliente = $pdo->prepare($sql_insert_cliente);
        $stmt_insert_cliente->bindParam(':idCliente', $auto_increment_value);
        $stmt_insert_cliente->bindParam(':nome', $nome);
        $stmt_insert_cliente->bindParam(':telefone', $telefone);
        $stmt_insert_cliente->execute();

        header("Location: ../admin/admin.php?sucesso=1"); //texto de sucesso
        exit();
    } catch(PDOException $e) {
        echo "<h1>Erro: " . $e->getMessage() . "</h1>";
        header("Location: ../admin/admin.php?sucesso=0");
    }
?>
