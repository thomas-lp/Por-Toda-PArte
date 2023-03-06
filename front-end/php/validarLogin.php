<?php
    session_start();

    // print_r($_REQUEST);

    if(isset($_POST['submit']) && !empty($_POST['assinatura']) && !empty($_POST['senha']))
    {
        // Acessa
        include_once('conexao.php');
        $assinatura = $_POST['assinatura'];
        $senha = $_POST['senha'];

        // print_r('Assinatura: ' . $assinatura);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        $sql = "SELECT * FROM desenhista WHERE assinatura = '$assinatura' and senha = '$senha'";

        $result = $conexao->query($sql);

        // print_r($sql);
        // print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['assinatura']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['assinatura'] = $assinautura;
            $_SESSION['senha'] = $senha;
            header('Location: inicio.php');
        }
    }
    else
    {
        // Não acessa
        header('Location: login.php');
    }
?>