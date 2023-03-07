<?php
    include('sessao.php');

    $sqlConsulta = "SELECT * FROM desenhista WHERE nome = '$logado'";
    $resultConsulta = $conexao->query($sqlConsulta);

    if($resultConsulta->num_rows == 0){
        header('Location: login.php');
    }

    $usuario = mysqli_fetch_assoc($resultConsulta);

    $ehAdministrador = ($usuario['administrador']==true);
?>