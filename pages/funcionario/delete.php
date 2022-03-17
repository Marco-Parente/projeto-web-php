<?php
$title = "Padaria - Deletar funcionario";

require_once "../../components/header.php";
require_once "../../db/database.php";
require_once "../../db/crud.php";
$db = new PadariaDB();
$conn = $db->return_connection();

$id = $_GET["id"];

if (array_key_exists('deleteEntity', $_POST)) {
    deleteEntity($conn, "funcionarios", $id);
}

$entidade = customSelectSql($conn, "SELECT f.id, f.nome, c.nome as cargo FROM funcionarios AS f JOIN cargo AS c ON f.cargo_id=c.id");
$entity = mysqli_fetch_assoc($entidade)
?>
<span class="tituloSubPagina">
    Deletar funcionário
</span>
<form id="funcionario" class="boxInput" name="cadastro" method="post" action="#">
    Você tem certeza de que quer deletar essa entidade? <br>
    <table class="tabela">
        <tr>
            <th>Nome</th>
            <th>Cargo</th>
        </tr>

        <tr>
            <td><?= $entity['nome'] ?></td>
            <td><?= $entity['cargo'] ?></td>
        </tr>
    </table>
    <input type="submit" name="deleteEntity" id="deletar" class="buttonCadastro" value="Deletar entidade" />
    <button class="voltar" onclick="location.href = './'">Voltar</button>
</form>

<?php require_once "../../components/footer.php" ?>