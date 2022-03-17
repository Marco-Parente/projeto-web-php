<?php
$title = "Padaria - Adicionar Unidade de Medida";
require_once "../../components/header.php";

if (isset($_POST["nome"])) {
    include("../../db/database.php");
    include("../../db/crud.php");

    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];

    $db = new PadariaDB();
    $conn = $db->return_connection();

    createEntity($conn, "Unidade", ["nome" => $nome, "sigla" => $sigla]);

    $conn->close();
}
?>

<span class="tituloSubPagina">
    Adicionar unidade
</span>
<form id="unidade" class="boxInput" name="cadastro" method="post" action="#">
    <label for="nome">Nome </label>
    <span class="labelInputRequired">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome da unidade de medida..." required />

    <br/>
    <label for="sigla">Sigla</label>
    <input name="sigla" type="text" id="sigla" size="70" maxlength="255" placeholder="Digite a sigla..."/>
    <br/>
    <input name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
    <button class="voltar" onclick="location.href = './'">Voltar</button>
</form>

<?php require_once "../../components/footer.php" ?>