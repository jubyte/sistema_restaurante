<?php
include "../infra/conexao.php";
$usuarios = $conexao->query("SELECT * FROM usuarios");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   $nome = $_POST["nome"];
   $descricao = $_POST["descricao"];
   $preco = $_POST["preco"];
   $categoria = $_POST["categoria"];
   $usuario_id = $_POST["usuario_id"];

   if (
    empty($nome) ||
    empty($descricao) ||
    empty($preco) ||
    empty($categoria) ||
    empty($usuario_id)) {
    
    $erro = "Todos os campos são obrigatórios.";
   } else {
    $sql = "INSERT INTO pratos (nome, descricao, preco, categoria, usuario_id) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssdsi", $nome, $descricao, $preco, $categoria, $usuario_id);
    $stmt->execute();

    header("Location: ../index.php");
    exit();
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Prato</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>

<header>
    <h1>Cadastro de Pratos</h1>
</header>

<?php if (isset($erro)) { ?>
<p><?= $erro ?></p>
<?php } ?>

<main>
    <h2>Formulário de cadastro</h2>
    <form method="POST">

    <label>Prato:</label>
    <input type="text" name="nome">

    <br><br>

    <label>Descrição:</label>
    <textarea name="descricao"></textarea>

    <br><br>

    <label>Preço:</label>
    <input type="number" name="preco" step="0.01">

    <br><br>

    <label>Categoria:</label>
    <input type="text" name="categoria">

    <br><br>

    <label>Usuário responsável:</label>

    <select name="usuario_id">
        <option value="">Selecione um usuário</option>

        <?php while ($usuario = $usuarios->fetch_assoc()) { ?>
            <option value="<?= $usuario["id"] ?>">
                <?= $usuario["nome"] ?>
            </option>
        <?php } ?>
    </select>

    <br><br>

    <button type="submit">Cadastrar prato</button>
    </form>
</main>

</body>
</html>