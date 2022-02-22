<?php
$title = "Padaria - Funcionários";
require_once "../../components/header.php";
require_once "../../db/crud.php";
require_once "../../db/database.php";

$db = new PadariaDB();
$conn = $db->return_connection();

$entidades = customSelectSql($conn, "SELECT f.id, f.nome, c.nome as cargo FROM funcionarios AS f JOIN cargo AS c ON f.cargo_id=c.id");

$conn->close();
?>

<session class="titulo">
    Funcionários
</session> </br>
<button class="buttonCadastro" onclick="location.href = 'create.php'">Cadastrar novo funcionario</button>
<table class="tabela">
    <tr>
        <th>Nome</th>
        <th>Cargo</th>
        <th>Editar</th>
        <th>Remover</th>
    </tr>
    
    <?php while ($row =  mysqli_fetch_assoc($entidades)) : ?>
        <tr>
            <td><?=$row['nome']?></td>
            <td><?=$row['cargo']?></td>
            <td>
                <a class="buttonEdicao" href="./edit.php?id=<?= $row['id'] ?>">Editar</a>
            </td>
            <td>
                <a class="buttonRemover" href="./delete.php?id=<?= $row['id'] ?>">Remover</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<?php require_once "../../components/footer.php" ?>