<?php
    if(isset($_POST['submit'])){
        /*print_r('<br>');
        print_r('Nome:' . $_POST['nome']);
        print_r('<br>');
        print_r('Assinatura:' . $_POST['assinatura']);
        print_r('<br>');
        print_r('Senha:' . $_POST['senha']);
        print_r('<br>');
        print_r('Rede Social:' . $_POST['redesocial']);*/

        include_once('conexao.php');

        $nome = $_POST['nome'];
        $assinatura = $_POST['assinatura'];
        $senha = $_POST['senha'];
        $redesocial = $_POST['redesocial'];

        $resultado = mysqli_query($conexao, "INSERT INTO desenhista (assinatura, senha, nome, casa, redesocial)
                                            VALUES ('$assinatura', '$senha', '$nome', NULL, '$redesocial')");

        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Por Toda PArte</title>

    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="../css/background.css"> 
    <link rel="stylesheet" href="../css/cadastro.css"> 
</head>

<body class="background">
    <div class="login-box">
        <h2>Cadastro</h2>
        <form action="cadastro.php" method="POST">
        <div class="user-box">
            <label>Nome</label>
            <input type="text" id="nome" name="nome" required="" >
        </div>
        <div class="user-box">
            <label>Assinatura</label>
            <input type="text" id="assinatura" name="assinatura" required="">
        </div>
        <div class="user-box">
            <label>Senha</label>
            <input type="password" id="senha" name="senha" required="">
        </div>
        <div class="user-box">
            <label>Rede Social</label>
            <input type="text" id="redesocial" name="redesocial" required="">
        </div>
        <input type="submit" name="submit" value="Cadastrar">
        <div class="bottom-text">
            Ja possui cadastro? <a href="login.php">Ir para Login</a>
        </div>
        </form>
    </div>
</body>
</html>