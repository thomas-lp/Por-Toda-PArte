<?php
    session_start();
    include_once('conexao.php');

    // print_r($_SESSION);
    
    if((!isset($_SESSION['assinatura']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['assinatura']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['assinatura'];
    
    $sql = "SELECT * FROM evento ORDER BY idevento DESC";
    
    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Por Toda PArte</title>

    <link rel="stylesheet" href="../icons-font-awesome/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <link rel="stylesheet" href="../css/background.css">
    <link rel="stylesheet" href="../css/esqueleto.css">
    <link rel="stylesheet" href="../css/modulo-administracao.css">
</head>

<body class="background">
    <div class="container">
        <div class="sidebar">
            <div class="user-menu">
                <div class="user-profile">
                <img src="https://via.placeholder.com/80x80" alt="Foto do usuário" />
                </div>
                <ul class="menu">
                <li><a href="#"><i class="fa-solid fa-user"></i> Meu perfil</a></li>
                <li><a href="minha-galeria.php"><i class="fa-solid fa-image"></i> Galeria</a></li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <div class="top-menu">
                <div class="logo">
                <h1><i class="fa-solid fa-palette"></i> Por Toda Parte</h1>
                </div>
                <ul class="menu">
                    <li><a href="inicio.php"><i class="fa-solid fa-paintbrush"></i> Início</a></li>
                    <li><a href="eventos.php"><i class="fa-solid fa-calendar-days"></i> Eventos</a></li>
                    <li><a href="casas-artisticas.php"><i class="fa-solid fa-house-flag"></i> Casas Artísticas</a></li>
                    <li><a href="#"><i class="fa-solid fa-paint-roller"></i> Comunidade</a></li>
                    <li><a href="login.html"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></li>
                </ul>
            </div>
            <div class="content">
                <div class="section">
                    <h2>Modulo de Administração</h2>
                    <p>Este é o módulo de administração. Clique sobre Eventos ou Casas Artísticas para realizar ações de administrador.</p>
                </div>
                <div class="timeline">
                <div class="timeline-event">
                    <h3>Eventos</h3>
                    <p>Modulo: Administração de Eventos</p>
                    <button><a href="administracao-eventos.php">Ir para Eventos</a></button>
                    </div>
                    <div class="timeline-event">
                    <h3>Casas Artísticas</h3>
                    <p>Modulo: Administração de Casas</p>
                    <button><a href="administracao-casas.php">Ir para Casas</a></button>
                    </div>
                </div>
            </div>
            <div class="footer">
                <p>&copy; 2023 - Por Toda PArte</p>
            </div>
        </div>
    </div>
</body>
</html>