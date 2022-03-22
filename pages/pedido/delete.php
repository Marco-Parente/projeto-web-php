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

$entidade = customSelectSql($conn, "SELECT p.id, p.nome, p.preco, c.nome as categoria FROM produto AS p JOIN categoriaproduto AS c ON p.categoria_id=c.id WHERE p.id = $id");
$entity = mysqli_fetch_assoc($entidade)
?>

Deletar funcionário

<form id="produto" name="cadastro" method="post" action="#">
    Você tem certeza de que quer deletar essa entidade? <br>
    <table class="tabela">
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Categoria</th>
        </tr>

        <tr>
            <td><?= $entity['nome'] ?></td>
            <td><?= $entity['preco'] ?></td>
            <td><?= $entity['categoria'] ?></td>
        </tr>
    </table>
    <input type="submit" name="deleteEntity" class="buttonCadastro" value="Deletar entidade" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>