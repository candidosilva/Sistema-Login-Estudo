<?php
require 'config.php';

$lista =[];
$sql = $pdo->query("SELECT * FROM usuarios");
if($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<head>
<link rel="stylesheet" type="text/css" href="assets/css/usuario.css"/>
</head>

<div class="hero">

<table class="table-content">
    <thead>
        <tr>
            <td>ID</td>
            <td>NOME</td>
            <td>E-MAIL</td>
            <td>PASSWORD</td>
        </tr>
    </thead>
<?php
    foreach($lista as $usuario): ?>
    <tbody>
        <tr>
            <td><?=$usuario['id'];?></td>
            <td><?=$usuario['nome'];?></td>
            <td><?=$usuario['email'];?></td>
            <td><?=$usuario['senha'];?></td>
        </tr>
    </tbody>
    <?php endforeach; ?>
</table>

<a href="index.php" class="voltar-btn"> Voltar </a>

    </div>