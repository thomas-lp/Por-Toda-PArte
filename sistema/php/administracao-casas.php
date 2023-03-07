<?php
    include('conexao.php');

    $sql = "SELECT * FROM casaartistica ORDER BY nome";    
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
    <link rel="stylesheet" href="../css/administracao.css">
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
                <?php
                    include('verificar-administrador.php');
                    if($ehAdministrador){
                        echo "<li><a href='modulo-administracao.php'><i class='fa-solid fa-hammer'></i> Adm</a></li>";
                    }
                ?>
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
                <div class="section">
                    <h2>Casas Artísticas do Por Toda Parte</h2>
                    <p>Aqui estão listados todas as casas já cadastrados. Você pode alterar os dados de uma casa cadastrada ou
                        excluir uma casa permanentemente. Cuidado ao realizar essas ações.</p>
                    <div class="add-buttons">
                        <button class="add"><a href="cadastrar-casa.php">Cadastrar Casa</a></button>
                    </div>
                </div>
                <div class="timeline">
                    <?php
                      while($casa = mysqli_fetch_assoc($result)) {
                          echo "<div class='timeline-event'>";
                          echo "<h3>".$casa['nome']."</h3>";
                          echo "<p>Casa do(a) ".$casa['animal']."</p>";
                          echo "<button><a href='alterar-casa.php?nome=".$casa['nome']."'>Alterar</a></button>";
                          echo "<button><a href='excluir-casa.php?nome=".$casa['nome']."'>Excluir</a></button>";
                          echo "</div>";
                      }
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