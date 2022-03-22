<?php
require_once __DIR__."/select-produto.php";

function produtoRow()
{
    require_once "../../db/crud.php";
    require_once "../../db/database.php";

    $db = new PadariaDB();
    $conn = $db->return_connection();

    $produtos = listEntities($conn, "produto");

    $conn->close();
    
    $qntProduto = $_GET['qntProduto'] ?? 1;
    $qntMaisUm = $qntProduto + 1;
    $qntMenosUm = $qntProduto - 1;

    for ($i=0; $i < $qntProduto; $i++) { 
        selectProduto(selectId:"produto-$i");
        echo "&nbsp;&nbsp;&nbsp;&nbsp;<label for=\"quantidade\">Quantidade</label>
            <span class=\"\">*</span>
            <input name=\"quantidade\" type=\"text\" id=\"quantidade\" size=\"70\" maxlength=\"255\" placeholder=\"Digite a quantidade disponível...\" required />";
        echo "<br>";
    }
}

?>