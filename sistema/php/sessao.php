<?php
    if(!isset($_SESSION)){
        session_start();
    }
    
    include_once('conexao.php');

    if((!isset($_SESSION['assinatura']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['assinatura']);
        unset($_SESSION['senha']);
        //header('Location: login.php');
    }
    $logado = $_SESSION['assinatura'];
?>