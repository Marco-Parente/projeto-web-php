<?php
$title = "Padaria - Categorias de produto";
require_once "../Components/header.php";
require_once "../db/crud.php";
require_once "../db/database.php";

$db = new PadariaDB();
$conn = $db->return_connection();

$categorias = listEntities($conn, "CategoriaProduto");

$conn->close();
?>

<session class="titulo">
    Categoria 
</session> </br>
<button class="buttonCadastro" onclick="location.href = 'create.php'">Cadastrar nova categoria</button>
<table class="tabela">
    <tr>
        <th>Nome</th>
        <th>Editar</th>
        <th>Remover</th>
    </tr>
    
    <?php foreach ($categorias as $row) : ?>
        <tr>
            <td><?=$row['nome']?></td>
            <td>
                <a class="buttonEdicao" href="./edit.php?id=<?= $row['id'] ?>">Editar</a>
            </td>
            <td>
                <a class="buttonRemover" href="./delete.php?id=<?= $row['id'] ?>">Remover</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require_once "../Components/footer.php" ?>