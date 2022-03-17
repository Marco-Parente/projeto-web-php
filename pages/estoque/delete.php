<?php
$title = "Padaria - Deletar estoque";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../db/crud.php";
$db = new PadariaDB();
$conn = $db->return_connection();

$id = $_GET["id"];

if (array_key_exists('deleteEntity', $_POST)) {
    deleteEntity($conn, "estoque", $id);
}

$entity = findEntity($conn, "estoque", $id);
?>

<span class="tituloSubPagina">
    Deletar estoque
</span>

<form id="estoque" class="boxInput" name="cadastro" method="post" action="#">
    Você tem certeza de que quer deletar essa entidade? <br>
    <table class="tabela">
        <tr>
            <th>Nome</th>
        </tr>

        <tr>
            <td><?= $entity['localizacao'] ?></td>
        </tr>
    </table>
    <input type="submit" name="deleteEntity" id="deletar" class="buttonCadastro" value="Deletar entidade" />
    <button class="voltar" onclick="location.href = './'">Voltar</button>
</form>

<?php require_once "../../components/footer.php" ?>