<?php
$title = "Padaria";

require_once(realpath(dirname(__FILE__) . '/../../components/header.php'));
require_once(realpath(dirname(__FILE__) . '/../../db/database.php'));

$db = new PadariaDB();

if (array_key_exists('createDatabase', $_POST)) {
    createDatabase($db);
} else if (array_key_exists('resetDatabase', $_POST)) {
    resetDatabase($db);
}

function createDatabase(PadariaDB $db)
{
    echo "criando db!";
    $db->create_database();
    $db->initialize_database();
    echo "Database criado!";
}

function resetDatabase(PadariaDB $db)
{
    $db->delete_database();
    echo "Database resetado!";
}
?>

<form method="post">
    <input id="cadastrar" type="submit" name="createDatabase" class="buttonCadastro" value="Criar e inicializar banco" />

    <input type="submit" id="deletar" name="resetDatabase" class="buttonCadastro" value="Resetar banco (clicar criar dps)" />
</form>

<?php require_once(realpath(dirname(__FILE__) . '/../../components/footer.php')); ?>

