<?php
require_once "../../db/crud.php";
require_once "../../db/database.php";

$db = new PadariaDB();
$conn = $db->return_connection();

$categorias = listEntities($conn, "categoriaproduto");

$conn->close();

?>

<select name="categoria" id="categoria">
<option value="" selected disabled hidden>Selecione o categoria do produto...</option>
<?php 
foreach ($categorias as $categoria) {
    echo "<option value='{$categoria["id"]}'>{$categoria["nome"]}</option>";
}?>
</select>