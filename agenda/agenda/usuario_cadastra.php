<?php 

    include ("utios/conectadb.php");
    include("utios/verificalogin.php");


    if($_SERVER ['REQUEST_METHOD'] == 'POST'){
        //COLETAR CAMPOS DOS INPUTS POR NAMES PARA VARIAVEIS PHPs
        $nomeusu = $_POST['txtnome'];
        $ativocli = $_POST['ativo'];  
        $senhacli = $_POST['txtsenha'];

        //INICIANDO QUERIES DO BANCO 
        //VERIFICANDO SE EXISTE 

        $sql = "SELECT COUNT(CLI_CPF) FROM clientes WHERE CLI_CPF = '$cpfcli'";
        
        //ENVIANDO A QUERY PARA O BANQUINHO, COMUNICAÇÃO DO BANCO COM A QUERY 
        $enviaquery = mysqli_query($link, $sql);


        //RETORNO DO QUE VEM DO BANCO
        $retorno = mysqli_fetch_array($enviaquery) [0];

        //VALIDACAO DO RETORNO
        if($retorno == 1) {
            // INFORMA QUE JA EXISTE POIS RETORNO = 1
            echo ("<script>window.alert('FUNCIONARIO JA EXISTE');</script>");
        }
        else {
            // CASO NAO ESTEJA CADASTRADO
            $sql = "INSERT INTO clientes (CLI_NOME, CLI_CPF, CLI_TEL, CLI_ATIVO, CLI_DATANASC, CLI_SENHA) 
            VALUES ('$nomecli', '$cpfcli', '$telcli', '$ativocli', '$datanasccli', '$senhacli')";                    
        }

        //CONECTA COM O BANCO E MANDA A QUERIE 
        $enviaquery = mysqli_query($link, $sql);

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
    <title>CADASTRO DE CLIENTES</title>
</head>
<body>

    <div class="topo">
    <h1>Cadastro de Clientes</h1>
        <div class="logout" method="post"> 
            <form action="backoffice.php"> 
            <input type="submit" value="Sair" />
            </form>
        </div>
    </div> 

    <div class="global"> 

        <div class="formulario">

            <form class="login" action ="usuario_cadastra.php" method="post">
                <label>NOME DO FUNCIONARIO</label> 
                <br>
                <input type="text" name="txtnome" placeholder="Digite seu nome completo" required>
                <br>
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