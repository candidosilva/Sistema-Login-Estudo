<?php
require  'config.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = md5(filter_input(INPUT_POST, 'senha'));

if($name && $email ) {

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email );
    $sql->execute();

    if($sql->rowCount() === 0){
    $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:name, :email, :senha)");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $senha);
    $sql->execute();

    header("Location: index.php");
    exit;
    } else {
        alert("Usuário ja existente");
        header("Location: login.php");
        exit;
    }

} else {
    alert("Falta dados");
    header("Location: login.php");
    exit;
}