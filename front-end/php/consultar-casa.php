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

    $nome = $_GET['nome'];
    
    $sql = "SELECT * FROM casaartistica WHERE nome = '$nome'";

    $result = $conexao->query($sql);

    if($result->num_rows == 0){
        header('Location: casas-artisticas.php');
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
    <link rel="stylesheet" href="../css/consultar-casa.css">
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
                <section class="casa">
                    <?php
                        $casa = mysqli_fetch_assoc($result);

                        echo "<div class='casa-header'>";
                        echo "<h2 class='casa-nome'>".$casa['nome']."</h2>";
                        echo "</div>";

                        echo "<div class='casa-header'>";
                        echo "<img src='../arquivos/brasoes-casas/".$casa['brasao']."' alt='Brasão da Casa' class='casa-brasao'>";
                        echo "</div>";
                        echo "<div class='casa-info'>";
                        echo "<p><strong>Animal:</strong> ".$casa['animal']."</p>";
                        echo "<p><strong>Pedra:</strong> ".$casa['pedra']."</p>";
                        echo "<p><strong>Flor:</strong> ".$casa['pedra']."</p>";

                        echo "<p><strong>Medalhas:</strong></p>";
                        echo "<ul class='casa-medalhas'>";
                                echo "<li><span class='casa-ouro'>".$casa['ouro']."</span> Ouro</li>";
                                echo "<li><span class='casa-prata'>".$casa['prata']."</span> Prata</li>";
                                echo "<li><span class='casa-bronze'>".$casa['bronze']."</span> Bronze</li>";
                        echo "</ul>";
                        echo "</div>";
                    ?>
                </section>
            </div>
            <div class="footer">
                <p>&copy; 2023 - Por Toda PArte</p>
            </div>
        </div>
    </div>
</body>
</html>