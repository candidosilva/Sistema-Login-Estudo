<?php
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false ) {
    header("Location: bemvindo.php");
} else {
    header("Location: login.html");
}
?>
