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
    <link rel="stylesheet" href="../css/casas-artisticas.css">
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
                <div class="casas">
                  <h2>Casas Artísticas do Por Toda Parte</h2>
                  <p>Aqui estão listados as casas artísticas do grupo (equipes). Clique em na logo da casa para
                      consultar mais detalhes sobre ela.</p>

                  <div class="slideshow-container">
                      <?php
                        $cont = 1;
                        while($casa = mysqli_fetch_assoc($result)) {
                            echo "<div class='mySlides fade'>";
                            //echo "<div class='numbertext'>1 / 3</div>";
                            echo "<a href='consultar-casa.php?nome=".$casa['nome']."'>
                                 <img src='../arquivos/brasoes-casas/".$casa['brasao']."' style='width:100%'></a>";
                            echo "<div class='text'>".$casa['nome']."</div>";
                            echo "</div>";
                            
                            $cont++;
                        }
                      ?>

                      <a class="prev" onclick="plusSlides(-1)">❮</a>
                      <a class="next" onclick="plusSlides(1)">❯</a>    
                  </div>
                    
                  <br>
                
                  <div style="text-align:center">
                        <?php
                            $cont2 = 1;
                            while($cont2 < $cont){
                                echo "<span class='dot' onclick='currentSlide(".$cont.")'></span>";
                                $cont2++;
                            }
                        ?>
                  </div>     
                </div>                     
            </div>

            <div class="footer">
                <p>&copy; 2023 - Por Toda PArte</p>
            </div>
        </div>
    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        }
    </script>
</body>
</html>










  