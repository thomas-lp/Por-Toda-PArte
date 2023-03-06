<?php
    if(!empty($_GET['idevento'])){
        include_once('conexao.php');

        $idevento = $_GET['idevento'];

        $sql = "SELECT * FROM evento WHERE idevento = $idevento";

        $resultado = $conexao->query($sql);

        if($resultado->num_rows > 0){
            $sqlDelete = "DELETE FROM evento WHERE idevento='$idevento'";
            $resultadoDelete = $resultado = $conexao->query($sqlDelete);
            header("Location: administracao-eventos.php");
        }
        else{
            header("Location: administracao-eventos.php");
        }
    }
    else{
        header("Location: administracao-eventos.php");
    }
?>