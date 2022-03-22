<?php
$title = "Padaria - Adicionar produto no pedido";
require_once "../../components/header.php";
require_once("../../db/database.php");
require_once "../../db/crud.php";
require_once "../../components/select-produto.php";

$db = new PadariaDB();
$conn = $db->return_connection();

$submited = $_GET['submited'] ?? false;
$id = $_GET['id'];
$entidades = listEntities($conn, "pedidoproduto", "WHERE pedido_id = $id");

$size = count($entidades);

$qntProduto = ($_GET['qntProduto'] ?? $size ?? 1);
if ($qntProduto < 1) {
    $qntProduto = 1;
}

if ($submited == "true") {
    $completo = True;

    $sql = "INSERT INTO pedidoproduto (pedido_id, produto_id, quantidade) VALUES ";

    for ($i = 0; $i < $qntProduto; $i++) {
        if (!isset($_POST["idProduto-$i"], $_POST["qntProduto-$i"])) {
            $preenchido = false;
            $j = $i + 1;
            echo "É necessário preencher todos os campos! Produto do campo $j não foi completamente preenchido. <br>";
            $completo = False;
        } else {
            $idProd = $_POST["idProduto-$i"];
            $qntProd = $_POST["qntProduto-$i"];
            $sql .= "($id, $idProd, $qntProd), ";
        }
    }
    
    $sql = substr($sql, 0, -2);

    if($completo){
        customSelectSql($conn, "DELETE FROM pedidoproduto WHERE pedido_id=$id");
        customSelectSql($conn, $sql);
        header("Location: ./index.php");
    }
}

?>
<script>
    const maisUm = () => {
        var id = <?php print($id); ?>;
        var qnt = <?php print($qntProduto); ?>;
        var url = `./additens.php?id=${id}&qntProduto=${qnt+1}`

        for (let i = 0; i < qnt; i++) {
            const produto = {
                idProduto: document.getElementById(`idProduto-${i}`)?.value ?? null,
                qntProduto: document.getElementById(`qntProduto-${i}`)?.value ?? null,
            }

            url += `&idProduto-${i}=${produto.idProduto}&qntProduto-${i}=${produto.qntProduto}`
        }

        window.location.href = url;
    }

    const menosUm = () => {
        var id = <?php print($id); ?>;
        var qnt = <?php print($qntProduto); ?>;
        qnt -= 1;
        qnt = qnt < 1 ? 1 : qnt;
        var url = `./additens.php?id=${id}&qntProduto=${qnt}`

        for (let i = 0; i < qnt; i++) {
            const produto = {
                idProduto: document.getElementById(`idProduto-${i}`)?.value ?? null,
                qntProduto: document.getElementById(`qntProduto-${i}`)?.value ?? null,
            }

            url += `&idProduto-${i}=${produto.idProduto}&qntProduto-${i}=${produto.qntProduto}`
        }

        window.location.href = url;
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
        <button id="addItens" type="button" onClick="maisUm()" class="buttonEdicao">
            <img src="/projeto-web-php/images/plus.png" alt="Logo" width="35" height="35">
            Adicionar Produto 
        </button>
    </td>
    <td>
        <button type="button" onClick="menosUm()" class="buttonEdicao">- Remover Produto</button>
    </td>
    <br>
    <?= "Quantidade de produtos: $qntProduto" ?>
    <br>

    <?php
    for ($i = 0; $i < $qntProduto; $i++) {
        $qntProdutoAtual = $_GET["qntProduto-$i"] ?? $entidades[$i]["quantidade"] ?? null;
        $idProdutoAtual = $_GET["idProduto-$i"] ?? $entidades[$i]["produto_id"] ?? null;
        selectProduto($idProdutoAtual, selectId: "idProduto-$i");
        echo "&nbsp;&nbsp;&nbsp;&nbsp;<label for=\"quantidade\">Quantidade</label>
            <span class=\"\">*</span>
            <input name=\"qntProduto-$i\" type=\"text\" id=\"qntProduto-$i\" size=\"70\" maxlength=\"255\" placeholder=\"Digite a quantidade disponível...\" value=\"$qntProdutoAtual\" required />";
        echo "<br>";
    }
    ?>

    <input name="Cadastrar" type="submit" id="cadastrar" value="Concluir cadastro" />
    <button class="voltar" onclick="location.href = './'">Voltar</button>
</form>

<script>
    document.getElementById("produto").action = window.location.href + "&submited=true";
</script>

<?php require_once "../../components/footer.php" ?>