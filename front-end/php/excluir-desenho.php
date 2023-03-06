<?php
    if(!empty($_GET['iddesenho'])){
        include_once('conexao.php');

        $iddesenho = $_GET['iddesenho'];

        $sql = "SELECT * FROM desenho WHERE iddesenho = $iddesenho";

        $resultado = $conexao->query($sql);

        if($resultado->num_rows > 0){
            $sqlDelete = "DELETE FROM desenho WHERE iddesenho=$iddesenho";
            $resultadoDelete = $resultado = $conexao->query($sqlDelete);
            header("Location: minha-galeria.php");
        }
        else{
            header("Location: minha-galeria.php");
        }
    }
    else{
        header("Location: minha-galeria.php");
    }
?>