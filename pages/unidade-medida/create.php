<?php
$title = "Padaria - Criar Unidade de Medida";
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

Criar unidade

<form id="unidade" name="cadastro" method="post" action="#">
    <label for="nome">Nome da Unidade de Medida</label>
    <span class="">*</span>
    <input name="nome" type="text" id="nome" size="70" maxlength="255" placeholder="Digite o nome da unidade de medida..." required />

    
    <label for="sigla">Sigla</label>
    <input name="sigla" type="text" id="sigla" size="70" maxlength="255" placeholder="Digite a sigla..."/>
    
    <input name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
</form>
<button onclick="location.href = './'">Voltar</button>

<?php require_once "../../components/footer.php" ?>