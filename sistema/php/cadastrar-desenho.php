<?php
    include('sessao.php');
    
    if(isset($_POST['submit']) && isset($_FILES['arquivo'])){
        include_once('conexao.php');

        $descricao = $_POST['descricao'];
        $tipo = $_POST['tipo'];
        $estilo = $_POST['estilo'];
        $arquivo = $_FILES['arquivo'];

        $pasta = "../arquivos/desenhos/";
        $nomeArquivo = $arquivo['name'];
        $novoNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        $caminho = $pasta . $novoNomeArquivo . '.' . $extensao;
        $salvarArquivo = $novoNomeArquivo . '.' . $extensao;

        $deuCerto = move_uploaded_file($arquivo['tmp_name'], $caminho);

        $resultado = mysqli_query($conexao, "INSERT INTO desenho (descricao, tipo, estilo, arquivo, desenhista, evento)
                                             VALUES ('$descricao', '$tipo', '$estilo', '$salvarArquivo', '$logado', NULL)");

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
                    <h2>Cadastro de Desenho</h2>
                    <form enctype="multipart/form-data" action="cadastrar-desenho.php" method="POST">
                      <div class="form-box">
                        <label>Descrição do desenho</label>
                        <input type="text" id="descricao" name="descricao" required="">
                      </div>
                      <div class="form-box">
                        <label>Tipo do desenho</label>
                        <input type="text" id="tipo" name="tipo" required="">
                      </div>
                      <div class="form-box">
                        <label>Estilo do desenho</label>
                        <input type="text" id="estilo" name="estilo" required="">
                      </div>
                      <div class="form-box">
                        <label>Arquivo do desenho</label>
                        <input type="file" id="arquivo" name="arquivo" required="">
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
  
