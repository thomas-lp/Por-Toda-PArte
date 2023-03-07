<?php
    if(!empty($_GET['idevento'])){
        include_once('conexao.php');

        $idevento = $_GET['idevento'];

        $sql = "SELECT * FROM evento WHERE idevento = $idevento";

        $resultado = $conexao->query($sql);

        if($resultado->num_rows > 0){
            while($evento = mysqli_fetch_assoc($resultado)){
                $nome = $evento['nome'];
                $categoria = $evento['categoria'];
                $ano = $evento['ano'];
                $data = $evento['data'];
                $descricao = $evento['descricao'];
            }
        }
        else{
            header("Location: administracao-eventos.php");
        }
    }
    else{
        header("Location: administracao-eventos.php");
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
                    <h2>Alterar Evento</h2>
                    <form action="salvar-edit-evento.php" method="POST">
                      <div class="form-box">
                        <label>Nome do evento</label>
                        <input type="text" id="nome" name="nome" value="<?php echo $nome ?>" required="">
                      </div>
                      <div class="form-box">
                        <label>Descrição</label>
                        <input type="text" id="descricao" name="descricao" value="<?php echo $descricao ?>" required="">
                      </div>
                      <div class="form-box">
                        <label>Data</label>
                        <input type="text" id="data" name="data" value="<?php echo $data ?>" required="">
                      </div>
                      <div class="form-box">
                        <label>Categoria</label>
                        <input type="text" id="categoria" name="categoria" value="<?php echo $categoria ?>" required="">
                      </div>
                      <div class="form-box">
                        <label>Ano</label>
                        <input type="text" id="ano" name="ano" value="<?php echo $ano ?>" required="">
                      </div>
                      <input type="hidden" name="idevento" value="<?php echo $idevento?>">
                      <input type="submit" name="update" id="update" value="Salvar Alterações">
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