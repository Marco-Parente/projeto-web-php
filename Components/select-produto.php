<?php

function selectProduto($id = null)
{
    require_once "../../db/crud.php";
    require_once "../../db/database.php";

    $db = new PadariaDB();
    $conn = $db->return_connection();

    $produtos = listEntities($conn, "produto");

    $conn->close();

    echo "<select name=\"produto\" id=\"produto\">";
    echo "option<option value=\"\" selected disabled hidden>Selecione o produto...</option>";
    foreach ($produtos as $produto) {
        if (isset($id) && $produto["id"] == $id) {
            echo "<option selected value='{$produto["id"]}'>{$produto["nome"]}</option>";
        } else {
            echo "<option value='{$produto["id"]}'>{$produto["nome"]}</option>";
        }
    }
    echo "</select>";
}

?>