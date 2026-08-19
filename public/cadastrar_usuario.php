<?php

include("../infra/conexao.php");
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    if (empty($nome) || empty($email)) {
        $mensagem = "Por favor, preencha todos os campos.";

    } else {
       
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $nome, $email);
        $stmt->execute();

        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <h1>Cadastrar Usuário</h1>

    <?php if (isset($erro)) echo "<p style='color: red;'>$erro</p>"; ?>
    
    <form method = "POST">
        <label for = "nome">Nome:</label>
        <input type = "text" name = "nome">

        <br>

        <label for = "email">Email:</label>
        <input type = "email" name = "email">

        <br>

        <button type = "submit">Cadastrar</button>
    </form>

</body>
</html>