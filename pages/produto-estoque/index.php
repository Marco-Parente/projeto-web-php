<?php
$title = "Padaria - Produtos nos Estoques";
require_once "../../components/header.php";
require_once "../../db/crud.php";
require_once "../../db/database.php";

$db = new PadariaDB();
$conn = $db->return_connection();

$entidades = customSelectSql($conn, 
    "SELECT prodest.id, prodest.quantidade, prod.nome as nome_produto, est.localizacao, catprod.nome as nome_categoria, uni.sigla FROM produtoestoque AS prodest
    JOIN estoque as est ON prodest.estoque_id=est.id
    JOIN unidade as uni ON prodest.unidade_id=uni.id
    JOIN produto AS prod ON prodest.produto_id=prod.id
    JOIN categoriaproduto AS catprod ON prod.categoria_id=catprod.id
    ");

$conn->close();
?>

<session class="titulo">
    Produtos nos Estoques
</session> </br>
<button class="buttonCadastro" onclick="location.href = 'create.php'">Cadastrar novo produto</button>
<table class="tabela">
    <tr>
        <th>Nome Produto</th>
        <th>Categoria</th>
        <th>Quantidade</th>
        <th>Unidade de Medida</th>
        <th>Estoque</th>
        <th>Editar</th>
        <th>Remover</th>
    </tr>
    
    <?php while ($row =  mysqli_fetch_assoc($entidades)) : ?>
        <tr>
            <td><?=$row['nome_produto']?></td>
            <td><?=$row['nome_categoria']?></td>
            <td><?=$row['quantidade']?></td>
            <td><?=$row['sigla']?></td>
            <td><?=$row['localizacao']?></td>
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