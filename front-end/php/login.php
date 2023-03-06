<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Por Toda PArte</title>

    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="../css/background.css"> 
    <link rel="stylesheet" href="../css/login.css"> 
</head>

<body class="background">
    <div class="login-box">
        <h2>Login</h2>
        <form action="validarLogin.php" method="POST">
        <div class="user-box">
            <label>Assinatura</label>
            <input type="text" id="assinatura" name="assinatura" required="">
        </div>
        <div class="user-box">
            <label>Senha</label>
            <input type="password" id="senha" name="senha" required="">
        </div>
        <a href="#">Esqueceu sua senha?</a>
        <a href="inicio.php"><input type="submit" name="submit" value="Entrar"></a>
        <a href="cadastro.php">Criar Conta</a>
        </form>
    </div>
</body>
</html>