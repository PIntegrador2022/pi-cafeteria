<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body class="espaco_cabecalho">

<?php
require '../php/verifica.php';
require_once 'cabecalho.php';

if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!--    TEXTO DE SUCESSO/ERRO AO EXCLUIR CLIENTE    -->
<div style="text-align: center;">
    <script>
        <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
            document.write("<label style='color: rgb(32, 230, 104); font-weight: bold;'>Cliente excluído!</label>");
        <?php elseif (isset($_GET['sucesso']) && $_GET['sucesso'] == 2): ?>
            document.write("<label style='color: rgb(32, 230, 104); font-weight: bold;'>Cliente atualizado!</label>");
        <?php elseif (isset($_GET['sucesso']) && $_GET['sucesso'] == 0): ?>
            document.write("<label style='color: rgb(223, 0, 0); font-weight: bold;'>Ocorreu um erro!</label>");
        <?php endif; ?>
    </script>
</div>

<div>
    
    <?php
    include("../php/connect.php");

    $sql = "SELECT idCliente, nome, telefone FROM clientes";

    try {
        $stmt = $pdo->query($sql);

        if ($stmt->rowCount() > 0) {//  CRIA A TABELA C/ CLIENTES DO BANCO DE DADOS
            echo "<table class='table-clientes'><thead><tr> 
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Ações</th></tr></thead>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr><td>".$row['idCliente']."</td>
                <td>".$row['nome']."</td>
                <td>".$row['telefone']."</td>
                <td>
                    <form action='../php/deletar_cliente.php' method='post' style='display: inline-block;'>
                        <input type='hidden' name='idCliente' value='".$row['idCliente']."'>
                        <input style='width: 50px; margin: 5px;' type='submit' value='Excluir'>
                    </form>
                    <button onclick='openModal(\"myModal".$row['idCliente']."\")'>Atualizar</button>
                </td></tr>";
            }

            echo "</table>";
        } else {
            echo "<p class='table-clientes'>Nenhum resultado.</p>";
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
    ?>
</div>

<!-- Formulário pop-up p/ atualizar cliente -->
<?php
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div id='myModal".$row['idCliente']."' class='modal'>
                <div class='modal-content'>
                    <span class='close' onclick='closeModal(\"myModal".$row['idCliente']."\")'>&times;</span>
                    <h2>Atualizar Cliente</h2>
                    <form action='../php/atualizar_cliente.php' method='post'>
                        <input type='hidden' name='idCliente' value='".$row['idCliente']."'>
                        <label for='novonome'>Novo Nome:</label>
                        <input type='text' id='novonome' name='novoNome'><br><br>
                        <label for='novotelefone'>Novo Telefone:</label>
                        <input type='text' id='novotelefone' name='novoTelefone'><br><br>
                        <input type='submit' value='Atualizar'>
                    </form>
                </div>
            </div>";
    }
?>

<script>
    // Abre o modal (pop up)
    function openModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = "block";
    }

    // Fecha o modal
    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = "none";
    }
</script>

<?php else: header("Location: ../login.php"); endif;?>

</body>
</html>