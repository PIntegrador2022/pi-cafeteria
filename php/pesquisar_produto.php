<?php
include("../php/connect.php");

if (isset($_POST['pesquisar'])) {
    // Limpe e normaliza o termo de pesquisa
    $searchTerm = trim($_POST['pesquisar']);
    $searchTerm = htmlspecialchars($searchTerm, ENT_QUOTES, 'UTF-8');

    $sql = "SELECT p.id AS id_produto, p.nome AS produto, p.preco AS preco, c.id AS categoria_id, c.nome AS categoria
            FROM produtos p
            INNER JOIN categoria c ON p.categoria_id = c.id
            WHERE p.nome LIKE :searchTerm
            ORDER BY c.nome, p.nome";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $stmt->execute();

        // Construa a tabela HTML com os resultados da pesquisa
        if ($stmt->rowCount() > 0) {
            echo "<thead>
                    <tr> 
                        <th>Categoria</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr class='table-selecionada'>
                        <td>" . $row['categoria'] . "</td>
                        <td>" . $row['produto'] . "</td>
                        <td>R$ " . number_format($row['preco'], 2, ',', '.') . "</td>
                        <td>
                            <form action='../php/deletar_produto.php' method='post' style='display: inline-block;'>
                                <input type='hidden' name='id_produto' value='" . $row['id_produto'] . "'>
                                <input class='botaoexcluir'style='width: 50px; margin: 5px;' type='submit' value='Excluir'>
                            </form>
                            <button class='botaoatualizar'onclick='openModal(\"myModal" . $row['id_produto'] . "\")'>Atualizar</button>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum produto encontrado.</td></tr>";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "<tr><td colspan='4'>Por favor, forneça um termo de pesquisa válido.</td></tr>";
}
?>
