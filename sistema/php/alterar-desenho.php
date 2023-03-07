<?php
    if(!empty($_GET['iddesenho'])){
        include_once('conexao.php');

        $iddesenho = $_GET['iddesenho'];
        
        $sql = "SELECT * FROM desenho WHERE iddesenho = $iddesenho";

        $resultado = $conexao->query($sql);

        if($resultado->num_rows > 0){
            while($desenho = mysqli_fetch_assoc($resultado)){
                $iddesenho = $desenho['iddesenho'];
                $descricao = $desenho['descricao'];
                $tipo = $desenho['tipo'];
                $estilo = $desenho['estilo'];
                $datapostagem = $desenho['datapostagem'];
                $arquivo = $desenho['arquivo'];
                $desenhista = $desenho['desenhista'];
                $evento = $desenho['evento'];
            }
        }
        else{
            header("Location: minha-galeria.php");
        }
    }
    else{
        header("Location: minha-galeria.php");
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
                    <form action="salvar-edit-desenho.php" method="POST">
                      <div class="form-box">
                        <label>Descrição do desenho</label>
                        <input type="text" id="descricao" name="descricao" value="<?php echo $descricao ?>" required="">
                      </div>
                      <div class="form-box">
                        <label>Tipo do desenho</label>
                        <input type="text" id="tipo" name="tipo" value="<?php echo $tipo ?>" required="">
                      </div>
                      <div class="form-box">
                        <label>Estilo do desenho</label>
                        <input type="text" id="estilo" name="estilo" value="<?php echo $estilo ?>" required="">
                      </div>
                      <div class="form-box">
                        <label>Linkar desenho em um evento</label>
                        <input type="text" id="evento" name="evento" value="<?php echo $evento ?>" required="">
                      </div>
                      <input type="hidden" name="iddesenho" value="<?php echo $iddesenho?>">
                      <input type="hidden" name="datapostagem" value="<?php echo $datapostagem?>">
                      <input type="hidden" name="arquivo" value="<?php echo $arquivo?>">
                      <input type="hidden" name="desenhista" value="<?php echo $desenhista?>">

                      <input type="submit" name="update" value="Salvar Alterações">
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
  
