<?php

function selectCategoriaProduto($id = null)
{
    require_once "../../db/crud.php";
    require_once "../../db/database.php";

    $db = new PadariaDB();
    $conn = $db->return_connection();

    $categorias = listEntities($conn, "categoriaproduto");

    $conn->close();

    echo "<select name=\"categoria\" id=\"Selectmedio\">";
    echo "option<option value=\"\" selected disabled hidden>Selecione a categoria...</option>";
    foreach ($categorias as $categoria) {
        if (isset($id) && $categoria["id"] == $id) {
            echo "<option selected value='{$categoria["id"]}'>{$categoria["nome"]}</option>";
        } else {
            echo "<option value='{$categoria["id"]}'>{$categoria["nome"]}</option>";
        }
    }
    echo "</select>";
}

?>