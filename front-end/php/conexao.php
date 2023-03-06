<?php
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $database = 'por-toda-parte';
    
    $conexao = new mysqli($host, $usuario, $senha, $database);

    /*if($conexao->error){
        die("Falha ao conectar no banco de daodos: " . $conexao->error);
    }
    else{
        echo "Conexão realizada com sucesso.";
    }*/
?>