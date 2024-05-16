<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Administradores</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body class="espaco_cabecalho">
    <?php
    require_once '../php/verifica.php';
    require_once 'cabecalho.php';

    if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

        <div>

            <!-- TEXTO DE SUCESSO/ERRO AO EXCLUIR/ATUALIZAR ADMIN -->
            <div style="text-align: center;">
                <script>
                    <?php if (isset($_GET['sucesso_delete_admin']) && $_GET['sucesso_delete_admin'] == 1): ?>
                        document.write("<label style='color: rgb(32, 230, 104); font-weight: bold;'>Administrador excluído!</label>");
                    <?php elseif (isset($_GET['sucesso']) && $_GET['sucesso'] == 2): ?>
                        document.write("<label style='color: rgb(32, 230, 104); font-weight: bold;'>Administrador atualizado!</label>");
                    <?php elseif (isset($_GET['erro']) && $_GET['erro'] == 1): ?>
                        document.write("<label style='color: rgb(255, 20, 20);; font-weight: bold;'>Ocorreu um erro!</label>");
                    <?php elseif (isset($_GET['erro']) && $_GET['erro'] == 2): ?>
                        document.write("<label style='color: rgb(255, 20, 20); font-weight: bold;'>A senha antiga está incorreta.</label>");
                    <?php elseif (isset($_GET['erro']) && $_GET['erro'] == 3): ?>
                        document.write("<label style='color: rgb(255, 20, 20); font-weight: bold;'>Administrador não excluído. Deve haver ao menos um administrador no sistema. </label>");
                        <?php endif; ?>
                </script>
            </div>

            <!-- Tabela de Admins existentes -->
            <table class="table-clientes">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Senha (Criptografada)</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../php/connect.php';
                    $sql = "SELECT idUsuario, nome, senha FROM usuarios";
                    $stmt = $pdo->query($sql);
                    while ($admin = $stmt->fetch(PDO::FETCH_ASSOC)):
                        ?>
                        <tr class='table-selecionada'>
                            <td><?php echo $admin['idUsuario']; ?></td>
                            <td><?php echo $admin['nome']; ?></td>
                            <td><?php echo $admin['senha']; ?></td>
                            <td>
                                <form action='../php/deletar_admin.php' method='post' style='display: inline-block;'>
                                    <input type='hidden' name='idAdmin' value='<?php echo $admin['idUsuario']; ?>'>
                                    <input class='botaoexcluir' style='width: 50px; margin: 5px;' type='submit' value='Excluir'>
                                </form>
                                <button class='botaoatualizar'
                                    onclick='openModal("myModal<?php echo $admin['idUsuario']; ?>")'>Atualizar</button>
                            </td>
                        </tr>

                        <!-- Modal para atualizar admin -->
                        <div id='myModal<?php echo $admin['idUsuario']; ?>' class='modal'>
                            <div class='modal-content'>
                                <span class='close'
                                    onclick='closeModal("myModal<?php echo $admin['idUsuario']; ?>")'>&times;</span>
                                <h2>Atualizar Administrador</h2>
                                <form action='../php/atualizar_admin.php' method='post'>
                                    <input type='hidden' name='idAdmin' value='<?php echo $admin['idUsuario']; ?>'>
                                    <div class='campo'>
                                        <label for='nome'>Nome:</label>
                                        <input type='text' id='nome' name='nome' value='<?php echo $admin['nome']; ?>' required>
                                    </div>
                                    <div class='campo'>
                                        <label for='senha_antiga'>Senha Antiga:</label>
                                        <input type='password' id='senha_antiga' name='senha_antiga' required>
                                    </div>
                                    <div class='campo'>
                                        <label for='nova_senha'>Nova Senha:</label>
                                        <input type='password' id='nova_senha' name='nova_senha' required>
                                    </div>
                                    <input type='submit' value='Atualizar'>
                                </form>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    <?php else:
        header("Location: ../login.php");
    endif; ?>

    <script>
        // Função para abrir o modal
        function openModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = 'block';
        }

        // Função para fechar o modal
        function closeModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = 'none';
        }
    </script>
</body>

</html>