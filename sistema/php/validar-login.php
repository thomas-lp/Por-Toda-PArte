<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['assinatura']) && !empty($_POST['senha']))
    {
        // Acessa o site
        include_once('conexao.php');

        $assinatura = $_POST['assinatura'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM desenhista WHERE assinatura = '$assinatura' and senha = '$senha'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['assinatura']);
            unset($_SESSION['senha']);
            session_abort();
            header('Location: login.php');
        }
        else
        {
            $_SESSION['assinatura'] = $assinatura;
            $_SESSION['senha'] = $senha;
            header('Location: inicio.php');
        }
    }
    else
    {
        // Não acessa o site
        header('Location: login.php');
    }
?>