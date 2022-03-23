<?php
$title = "Padaria - Produtos";
require_once "../../components/header.php";
require_once "../../db/crud.php";
require_once "../../db/database.php";

$db = new PadariaDB();
$conn = $db->return_connection();

$entidades = customSelectSql($conn, 
    "SELECT p.id, c.nome as nome_cliente, f.nome as nome_funcionario, SUM(prod.preco * pedprod.quantidade) as preco FROM pedido AS p
    JOIN cliente as c ON p.cliente_id=c.id
    JOIN funcionarios as f ON p.funcionario_id=f.id
    JOIN pedidoproduto as pedprod ON p.id=pedprod.pedido_id
    JOIN produto as prod ON prod.id=pedprod.produto_id
    GROUP BY p.id
    ");

$conn->close();
?>

<session class="titulo">
    Produtos
</session> </br>
<button class="buttonCadastro" onclick="location.href = 'create.php'">Criar novo pedido</button>
<table class="tabela">
    <tr>
        <th>ID do pedido</th>
        <th>Nome do Cliente</th>
        <th>Nome do Funcionario</th>
        <th>Preco</th>
        <th>Adicionar ou Editar Itens</th>
        <th>Editar</th>
        <th>Remover</th>
    </tr>
    
    <?php while ($row =  mysqli_fetch_assoc($entidades)) : ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['nome_cliente']?></td>
            <td><?=$row['nome_funcionario']?></td>
            <td><?=$row['preco']?></td>
            <td>
                <a class="buttonEdicao" href="./additens.php?id=<?= $row['id'] ?>">+</a>
            </td>
            <td>
                <a class="buttonEdicao" href="./edit.php?id=<?= $row['id'] ?>">Editar</a>
            </td>
            <td>
                <a class="buttonRemover" href="./delete.php?id=<?= $row['id'] ?>">Remover</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<?php require_once "../../components/footer.php" ?>