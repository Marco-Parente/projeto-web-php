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

Deletar funcionário

<form id="funcionario" name="cadastro" method="post" action="#">
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
    <input type="submit" name="deleteEntity" class="buttonCadastro" value="Deletar entidade" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>