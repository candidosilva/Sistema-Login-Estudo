<?php
session_start();
require 'config.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = md5(filter_input(INPUT_POST, 'senha'));

if($email && $senha) {
    
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $senha);
    $sql->execute();


    if($sql->rowCount() > 0) {


        $dado = $sql->fetch();

        $_SESSION['id'] = $dado['id'];

        header("Location: index.php");
    } else {
        header("Location: naodeu.php");

        
    }
    
} 
