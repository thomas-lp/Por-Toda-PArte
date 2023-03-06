<?php
    session_start();
    include_once('conexao.php');
    
    if((!isset($_SESSION['assinatura']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['assinatura']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['assinatura'];

    $iddesenho = $_GET['iddesenho'];
    
    $sql = "SELECT * FROM desenho WHERE iddesenho = '$iddesenho'";

    $result = $conexao->query($sql);

    if($result->num_rows == 0){
        header('Location: minha-galeria.php');
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
    <link rel="stylesheet" href="../css/consultar-meu-desenho.css">

    <script src="../java-script/eventos.js"></script>
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
                <div class="container-drawing">
                    <?php
                        $desenho = mysqli_fetch_assoc($result);

                        echo "<div class='image-container'>";
                        echo "<img class='image' src='../arquivos/desenhos/".$desenho['arquivo']."' alt='Imagem do desenho'>";
                        echo "</div>";

                        echo "<div class='description-container'>";
                        echo "<p><strong>Descrição do desenho:</strong> ".$desenho['descricao']."</p>";
                        echo "<p><strong>Tipo:</strong> ".$desenho['tipo']."</p>";
                        echo "<p><strong>Estilo:</strong> ".$desenho['estilo']."</p>";
                        echo "<p><strong>Data de postagem:</strong> ".$desenho['datapostagem']."</p>";
                        $evento = $desenho['evento'];
                        if($desenho['datapostagem'] == ""){
                            $evento = "Nenhum";
                        }
                        echo "<p><strong>Evento linkado:</strong> ".$evento."</p>";

                        echo "<div class='horizontal-line'></div>";
                        echo "<div class='action-buttons'>";
                        echo "<button class='edit-button'>
                            <a href='alterar-desenho.php?iddesenho=".$desenho['iddesenho']."'>Alterar dados do desenho</a></button>";
                        echo "<button class='delete-button'>
                            <a href='excluir-desenho.php?iddesenho=".$desenho['iddesenho']."'>Excluir desenho da galeria</a></button>";
                        echo "</div>";
                        echo "</div>";
                    ?>
                </div>
            </div>
            <div class="footer">
                <p>&copy; 2023 - Por Toda PArte</p>
            </div>
        </div>
    </div>
</body>
</html>