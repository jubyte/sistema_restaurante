<?php
include "../infra/conexao.php";

$usuarios = $conexao->query("SELECT * FROM usuarios");
$pratos = null;

if (isset($_GET["usuario_id"])) {

    $usuario_id = $_GET["usuario_id"];
    $sql = "SELECT pratos.*, usuarios.nome AS usuario_nome FROM pratos INNER JOIN usuarios ON pratos.usuario_id = usuarios.id WHERE usuarios.id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();

    $pratos = $stmt->get_result();
}

?>
<h1>Pratos por usuário</h1>

<form method="GET">
    <select name="usuario_id">
    <option value="">Selecione usuário</option>
        <?php while ($usuario = $usuarios->fetch_assoc()) { ?>
        
        <option value="<?= $usuario["id"] ?>">
        <?= $usuario["nome"] ?> </option>
        <?php } ?>
    </select>

    <button type="submit">Pesquisar</button>
</form>

<?php if ($pratos) { ?>
<h2>Pratos cadastrados</h2>

<?php while ($prato = $pratos->fetch_assoc()) { ?>
<p> <?= $prato["nome"] ?> -
R$ <?= $prato["preco"] ?> </p>

<?php } ?>
<?php } ?>