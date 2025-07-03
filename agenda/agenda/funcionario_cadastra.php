<?php 

    // CONEXAO COM O BANCO DE DADOS 
    include ("utios/conectadb.php");
    include("utios/verificalogin.php");


    //APOS VAMOS CADASTRAR O FUN 

    if($_SERVER ['REQUEST_METHOD'] == 'POST'){
        //COLETAR CAMPOS DOS INPUTS POR NAMES PARA VARIAVEIS PHPs
        $nomefun = $_POST['txtnome'];
        $cpffun = $_POST['txtcpf'];
        $funcaofun = $_POST['txtfuncao'];
        $telefonefun = $_POST['txttel'];
        $ativo = $_POST['ativo'];

        //COLETA PARA FUNCIONARIOS 
        $usulogin = $_POST['txtlogin'];
        $ususenha = $_POST['txtsenha'];

        //INICIANDO QUERIES DO BANCO 
        //VERIFICANDO SE O USUARIO EXISTE 

        $sql = "SELECT COUNT(FUN_CPF) FROM funcionarios WHERE FUN_CPF = '$cpffun'";
        
        //ENVIANDO A QUERY PARA O BANQUINHO, COMUNICAÇÃO DO BANCO COM A QUERY 
        $enviaquery = mysqli_query($link, $sql);


        //RETORNO DO QUE VEM DO BANCO
        $retorno = mysqli_fetch_array($enviaquery) [0];

        //VALIDACAO DO RETORNO
        if($retorno == 1) {
            // INFORMA QUE O USUARIO JA EXISTE POIS RETORNO = 1
            echo ("<script>window.alert('FUNCIONARIO JA EXISTE');</script>");
        }
        else {
            // CASO O FUNCIONARIO NAO ESTEJA CADASTRADO
            $sql = "INSERT INTO funcionarios (FUN_NOME, FUN_CPF, FUN_FUNCAO, FUN_TEL, FUN_ATIVO) 
            VALUES ('$nomefun', '$cpffun', '$funcaofun', '$telefonefun', '$ativo')";
        }

        //CONECTA COM O BANCO E MANDA A QUERIE 
        $enviaquery = mysqli_query($link, $sql);

        //ROLE COM A TABELA DE USUARIOS 
        //PERGUNTA PARA A TABELA DE FUNCIONARIOS QUAL FOI O ULTIMO ID CADASTRADO 
        //ANTES PRECISO SABER SE A VARIAVEL USUFUN ESTA PREENCHIDA

        if ($usulogin != null){
            //TRAS O ID DO FUNCIONARIO CADASTRADO PARA PASSAR O LOGIN
            $sql ="SELECT FUN_ID FROM funcionarios where FUN_CPF = '$cpffun'";
            $enviaquery = mysqli_query($link, $sql);
            $retorno = mysqli_fetch_array($enviaquery) [0];

            //AGORA SALVAMOS TUDO NA TABELA DE USUARIOS  
            $sqlusu ="INSERT INTO usuarios (USU_LOGIN, USU_SENHA, FK_FUN_ID, USU_ATIVO)
            VALUES ('$usulogin', '$ususenha', $retorno, $ativo)";
            $enviaqueryusu = mysqli_query($link, $sqlusu);

        }

        echo ("<script>window.alert('FUNCIONARIO CADASTRADO COM SUCESSO');</script>");


    }

?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/global.css">
    <link href="https://fonts.cdnfonts.com/css/antipasto-pro" rel="stylesheet">
    <title>CADASTRO DE FUNCIONARIO</title>
</head>
<body>

    <div class="topo">
        <h1>Cadastro de Funcionarios </h1>
        <div class="logout" method="post"> 
            <form action="backoffice.php"> 
                <input type="submit" value="Sair" />
            </form>
        </div>
    </div> 

    <div class="global"> 

        <div class="formulario">

            <form class="login" action ="funcionario_cadastra.php" method="post">
                <label>NOME DO FUNCIONARIO</label> 
                <br>
                <input type="text" name="txtnome" placeholder="Digite seu nome completo" required>
                <br>

                <label>CPF</label> 
                <br>
                <input type="text" name="txtcpf" placeholder="Digite seu CPF" required>
                <br>

                <label>FUNÇÃO</label> 
                <br>
                <input type="text" name="txtfuncao" placeholder="Digite sua função" required>
                <br>

                <label>TELEFONE</label> 
                <br>
                <input type="text" name="txttel" placeholder="Digite seu telefone" required>
                <br>
                <br>

                <!-- AGORA CALASTRAMOS O USU NO SYSTEM -->
                <label>DIGITE O LOGIN</label>
                <br>
                <input type="text" name="txtlogin" placeholder="Digite seu login para cadastrar">
                <br>
                <label>SENHA</label>
                <br>
                <input type="password" name="txtsenha" placeholder="Digite sua senha">
                <br>

                <label>INICIAR USUARIO COMO:</label>
                <div class="rbativo">

                    <input type="radio" name="ativo" id="ativo" value="1" checked> <label>ATIVO</label>
                    <br>

                    <input type="radio" name="ativo" id="inativo" value="0"> <label>INATIVO</label>
                    <br>
                </div>
                <br>
                <input type="submit" value="CADASTRAR">

            </form>
            <br>
        </div>

    </div>
</body>
</html>