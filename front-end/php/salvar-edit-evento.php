<?php 
    include_once('conexao.php');

    if(isset($_POST['update'])){

        $idevento = $_POST['idevento'];
        $nome = $_POST['nome'];
        $categoria = $_POST['categoria'];
        $ano = $_POST['ano'];
        $data = $_POST['data'];
        $descricao = $_POST['descricao'];
    }

    $sql = "UPDATE evento SET idevento='$idevento', nome='$nome', categoria='$categoria', ano='$ano', data='$data', descricao='$descricao'
            WHERE idevento='$idevento'";

    $resultado = $conexao->query($sql);
    
    header("Location: administracao-eventos.php");
?>