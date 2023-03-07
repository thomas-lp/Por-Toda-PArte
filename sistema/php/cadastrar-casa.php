<?php
    if(isset($_POST['submit']) && isset($_FILES['brasao'])){
        include_once('conexao.php');

        $nome = $_POST['nome'];
        $animal = $_POST['animal'];
        $pedra = $_POST['pedra'];
        $flor = $_POST['flor'];
        $cor = $_POST['cor'];
        $brasao = $_FILES['brasao'];

        $pasta = "../arquivos/brasoes-casas/";
        $nomeArquivo = $brasao['name'];
        $novoNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        $caminho = $pasta . $novoNomeArquivo . '.' . $extensao;
        $salvarBrasao = $novoNomeArquivo . '.' . $extensao;

        $deuCerto = move_uploaded_file($brasao['tmp_name'], $caminho);

        $resultado = mysqli_query($conexao, "INSERT INTO casaartistica (nome, animal, pedra, flor, cor, ouro, prata, bronze, brasao)
                                             VALUES ('$nome', '$animal', '$pedra', '$flor', '$cor', 0, 0, 0, '$salvarBrasao')");

        header('Location: administracao-casas.php');
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
    <link rel="stylesheet" href="../css/cadastrar-coisas.css">
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
                <div class="cadastro-box">
                    <h2>Cadastro de Casas</h2>
                    <form enctype="multipart/form-data" action="cadastrar-casa.php" method="POST">
                      <div class="form-box">
                        <label>Nome da casa</label>
                        <input type="text" id="nome" name="nome" required="">
                      </div>
                      <div class="form-box">
                        <label>Animal</label>
                        <input type="text" id="animal" name="animal" required="">
                      </div>
                      <div class="form-box">
                        <label>Pedra</label>
                        <input type="text" id="pedra" name="pedra" required="">
                      </div>
                      <div class="form-box">
                        <label>Flor</label>
                        <input type="text" id="flor" name="flor" required="">
                      </div>
                      <div class="form-box">
                        <label>Cor</label>
                        <input type="text" id="cor" name="cor" required="">
                      </div>
                      <div class="form-box">
                        <label>Brasão da casa</label>
                        <input type="file" id="brasao" name="brasao" required="">
                      </div>
                      <input type="submit" name="submit" value="Cadastrar">
                    </form>
                </div>
            </div>
            <div class="footer">
                <p>&copy; 2023 - Por Toda PArte</p>
            </div>
        </div>
    </div>
</body>
</html>
  
