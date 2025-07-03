<?php

    //LOCALIZAÇÃO DO SERVIDOR DE BANCO 
    $servidor = "localhost";

    //USUARIO DO BANCO 
    $usuario = "root";

    //SENHA DO BANCO   
    $senha = "";

    //NOME DO BANCO
    $banco = "sallonccina";

    // RECURSOS PARA CONECAO DO BANCO 
    $link = mysqli_connect($servidor, $usuario, $senha, $banco);

   
?>