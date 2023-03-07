<?php 
    include_once('conexao.php');

    if(isset($_POST['update'])){
        $iddesenho = $_POST['iddesenho'];
        $descricao = $_POST['descricao'];
        $tipo = $_POST['tipo'];
        $estilo = $_POST['estilo'];
        $datapostagem = $_POST['datapostagem'];
        $arquivo = $_POST['arquivo'];
        $desenhista = $_POST['desenhista'];
        $evento = $_POST['evento'];

        $sql = "UPDATE desenho SET iddesenho='$iddesenho', descricao='$descricao', tipo='$tipo', estilo='$estilo', datapostagem='$datapostagem', 
        arquivo='$arquivo', desenhista='$desenhista', evento='$evento'
        WHERE iddesenho='$iddesenho'";

        $resultado = $conexao->query($sql);

        header("Location: minha-galeria.php");
    }
?>