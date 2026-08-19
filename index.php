<?php

include "infra/conexao.php";

$sql = "SELECT pratos.*, usuarios.nome AS usuario_nome
    FROM pratos
    INNER JOIN usuarios ON pratos.usuario_id = usuarios.id";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Pratos cadastrados</h1>

    <a href="cadastrar_usuario.php">Cadastrar usuário</a>
    <a href="cadastrar_prato.php">Cadastrar prato</a>
    <a href="pratos_usuario.php">Pratos por usuário</a>

    <table border="1">

    <tr>

        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Cadastrado por</th>
        <th>Ações</th>
    
    </tr>

    <?php while ($prato = $resultado->fetch_assoc()) { ?>

    <tr>

        <td> <?= $prato["nome"] ?> </td>
        <td> <?= $prato["descricao"] ?> </td>
        <td>R$ <?= $prato["preco"] ?> </td>
        <td> <?= $prato["categoria"] ?> </td>
        <td> <?= $prato["usuario_nome"] ?> </td>

        <td>

            <a href="editar_prato.php?id=<?= $prato["id"] ?>">Editar</a>
            <a href="excluir_prato.php?id=<?= $prato["id"] ?>">Excluir</a>
    
        </td>
    </tr>

    <?php } ?>

    </table>

</body>
</html>