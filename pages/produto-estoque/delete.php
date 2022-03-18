<?php
$title = "Padaria - Deletar produto";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../db/crud.php";
$db = new PadariaDB();
$conn = $db->return_connection();

$id = $_GET["id"];

if (array_key_exists('deleteEntity', $_POST)) {
    deleteEntity($conn, "produto", $id);
}

$entidade = customSelectSql($conn, "SELECT prodest.id, prodest.quantidade, prod.nome as nome_produto, est.localizacao, catprod.nome as nome_categoria, uni.sigla FROM produtoestoque AS prodest
INNER JOIN estoque as est ON prodest.estoque_id=est.id
INNER JOIN unidade as uni ON prodest.unidade_id=uni.id
INNER JOIN produto AS prod ON prodest.produto_id=prod.id
INNER JOIN categoriaproduto AS catprod ON prod.id=catprod.id
WHERE prodest.id = $id
");
$entity = mysqli_fetch_assoc($entidade)
?>

Deletar funcionário

<form id="produto" name="cadastro" method="post" action="#">
    Você tem certeza de que quer deletar essa entidade? <br>
    <table class="tabela">
        <tr>
            <th>Nome Produto</th>
            <th>Categoria</th>
            <th>Quantidade</th>
            <th>Unidade de Medida</th>
            <th>Estoque</th>
        </tr>

        <tr>
            <td><?=$entity['nome_produto']?></td>
            <td><?=$entity['nome_categoria']?></td>
            <td><?=$entity['quantidade']?></td>
            <td><?=$entity['sigla']?></td>
            <td><?=$entity['localizacao']?></td>
        </tr>
    </table>
    <input type="submit" name="deleteEntity" class="buttonCadastro" value="Deletar entidade" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>