<?php 
    include_once('conexao.php');

    if(isset($_POST['update'])){

        $nome = $_POST['nome'];
        $animal = $_POST['animal'];
        $pedra = $_POST['pedra'];
        $flor = $_POST['flor'];
        $cor = $_POST['cor'];
        $ouro = $_POST['ouro'];
        $prata = $_POST['prata'];
        $bronze = $_POST['bronze'];
        $brasao = $_FILES['brasao'];

        $pasta = "../arquivos/brasoes-casas/";
        $nomeArquivo = $brasao['name'];
        $novoNomeArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
        $caminho = $pasta . $novoNomeArquivo . '.' . $extensao;
        $salvarBrasao = $novoNomeArquivo . '.' . $extensao;

        $deuCerto = move_uploaded_file($brasao['tmp_name'], $caminho);

        $sql = "UPDATE casaartistica SET nome='$nome', animal='$animal', pedra='$pedra', flor='$flor', cor='$cor', 
        ouro='$ouro', prata='$prata', bronze='$bronze', brasao='$salvarBrasao'
        WHERE nome='$nome'";

        $resultado = $conexao->query($sql);

        header("Location: administracao-casas.php");
    }
?>