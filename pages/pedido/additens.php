<?php
$title = "Padaria - Adicionar produto no pedido";
require_once "../../components/header.php";
require_once "../../components/produto-row.php";

$preenchido = false;
$qntProduto = ($_GET['qntProduto'] ?? 1);
if ($qntProduto < 0) {
    $qntProduto = 1;
}

for ($i = 0; $i < $qntProduto; $i++) {
    if (!isset($_POST["produto-$i"])) {
        $preenchido = false;
    } else {
        echo $_POST["produto-$i"];
    }
}
if ($preenchido) {
    include("../../db/database.php");
    include("../../db/crud.php");

    $cliente = $_POST["cliente"];
    $funcionario = $_POST["funcionario"];

    $db = new PadariaDB();
    $conn = $db->return_connection();

    createEntity($conn, "pedido", ["cliente_id" => $cliente, "funcionario_id" => $funcionario]);

    // $conn->close();
}
?>
<script>
    const maisUm = () => {
        var qnt = <?php print($qntProduto); ?>;
        window.location.href = `./additens.php?qntProduto=${qnt+1}`;
    }
    
    const menosUm = () => {
        var qnt = <?php print($qntProduto); ?>;
        qnt -= 1;
        qnt = qnt < 1 ? 1: qnt;
        window.location.href = `./additens.php?qntProduto=${qnt}`;
    }
</script>
<span class="tituloSubPagina">
    Adicionar produto 
</span>
<br/>
<span class="tituloSubPagina">
    no pedido
</span>
<form id="produto" class="boxInput" name="cadastro" method="post" action="#">
    <br/>
    <td>
        <button id="addItens" type="button" onClick="maisUm()" class="buttonEdicao" href="./additens.php?qntProduto=$qntMaisUm">
            <img src="/projeto-web-php/images/plus.png" alt="Logo" width="35" height="35">
            Adicionar Produto 
        </button>
    </td>
    <td>
        <button id="removeItens" type="button" onClick="menosUm()" class="buttonEdicao" href="./additens.php?qntProduto=$qntMenosUm">
            - Remover Produto
        </button>
    </td>
    <br/>
    <br/>
    <?= "Quantidade de produtos: $qntProduto" ?>
    <br/>
    <?php produtoRow() ?>
    <br/>
    <input name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
    <button class="voltar" onclick="location.href = './'">Voltar</button>
</form>

<?php require_once "../../components/footer.php" ?>