<?php
    if(!empty($_GET['nome'])){
        include_once('conexao.php');

        $nome = $_GET['nome'];

        $sql = "SELECT * FROM casaartistica WHERE nome = '$nome'";

        $resultado = $conexao->query($sql);

        if($resultado->num_rows > 0){
            $sqlDelete = "DELETE FROM casaartistica WHERE nome='$nome'";
            $resultadoDelete = $resultado = $conexao->query($sqlDelete);
            header("Location: administracao-casas.php");
        }
        else{
            header("Location: administracao-casas.php");
        }
    }
    else{
        header("Location: administracao-casas.php");
    }
?>