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

    $idevento = $_GET['idevento'];
    
    $sql = "SELECT * FROM evento WHERE idevento = '$idevento'";

    $result = $conexao->query($sql);

    if($result->num_rows == 0){
        header('Location: eventos.php');
    }
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
    <link rel="stylesheet" href="../css/consultar-evento.css">
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
                    <li><a href="login.php"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></li>
                </ul>
            </div>
            <div class="content">
                <div class="event-container">
                    <div class="event-info">
                        <?php
                            $evento = mysqli_fetch_assoc($result);

                            echo "<h2 class='event-name'>".$evento['nome']."</h2>";
                            echo "<p class='event-date'>Data: ".$evento['data']."</p>";
                            echo "<p class='event-category'>Categoria: ".$evento['categoria']."</p>";
                            echo "<p class='event-year'>Ano: ".$evento['ano']."</p>";
                            echo "<p class='event-description'>Descrição: ".$evento['descricao']."</p>";
                        ?>
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
  