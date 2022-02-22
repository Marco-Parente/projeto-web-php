<?php
require_once "../../db/crud.php";
require_once "../../db/database.php";

$db = new PadariaDB();
$conn = $db->return_connection();

$cargos = listEntities($conn, "cargo");

$conn->close();

?>

<select name="cargo" id="cargo">
<option value="" selected disabled hidden>Selecione o cargo...</option>
<?php 
foreach ($cargos as $cargo) {
    echo "<option value='{$cargo["id"]}'>{$cargo["nome"]}</option>";
}?>
</select>