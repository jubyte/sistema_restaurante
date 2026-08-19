<?php
include "../infra/conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM pratos WHERE id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$prato = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Prato</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
<header>
    <h1>Editar Prato</h1>
</header>

<main>
    <h2>Formulário de edição</h2>

    <form method="POST" action="atualizar_prato.php">
    <input type="hidden" name="id" value="<?= $prato["id"] ?>">

    <label>Nome:</label>
    <input type="text" name="nome" value="<?= $prato["nome"] ?>">

    <br><br>

    <label>Descrição:</label>
    <textarea name="descricao"><?= $prato["descricao"] ?></textarea>

    <br><br>

    <label>Preço:</label>
    <input type="number" name="preco" step="0.01" value="<?= $prato["preco"] ?>">

    <br><br>

    <label>Categoria:</label>
    <input type="text" name="categoria" value="<?= $prato["categoria"] ?>">

    <br><br>

    <button type="submit">Salvar</button>
    </form>
    
</main>

</body>
</html>