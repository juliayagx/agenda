<?php 

    // CONEXAO COM O BANCO DE DADOS 
    include ("utios/conectadb.php");

    //ATIVA A VARIAVEL E USO DA SESSAO
    session_start();
   



    if($_SERVER ['REQUEST_METHOD'] == 'POST'){

        //COLETA OS DADOS DO CAMPO DE TEXTO DO HTML
        $login = $_POST['txtlogin'];
        $senha = $_POST['txtsenha'];

        //COLETA DE NOME DO FUNCIONARIO 
        $sqlfun ="SELECT FK_FUN_ID FROM usuarios WHERE USU_LOGIN = '$login' AND USU_SENHA = '$senha'";

        $enviaquery2 = mysqli_query($link, $sqlfun);
        $idfuncionario = mysqli_fetch_array($enviaquery2) [0];








        //COMUNICA COM O BANCO MONTANDO AS QUERIES 
        $sql = "SELECT COUNT(USU_ID) FROM usuarios WHERE USU_LOGIN = '$login' AND USU_SENHA = '$senha'";
        
        //ENVIANDO A QUERY PARA O BANQUINHO, COMUNICAÇÃO DO BANCO COM A QUERY 
        $enviaquery = mysqli_query($link, $sql);


        //RETORNO DO QUE VEM DO BANCO
        $retorno = mysqli_fetch_array($enviaquery) [0];

        //VALIDACAO DO RETORNO
        if($retorno == 1) {
            $_SESSION['idfuncionario'] = $idfuncionario;
            Header("Location: backoffice.php");
        }
        else {
            echo ("<script>window.alert('LOGIN OU SENHA INCORRETOS');</script>");
            echo ("<script>window.location.href='login.php';</script>");
        }
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
    <title>Login</title>
</head>
<body>
    <div class="global"> 

        <div class="formulario">

            <form class="login" action ="login.php" method="post">
                <label>LOGIN</label> 
                <br>
                <input type="text" name="txtlogin" placeholder="Digite seu login" required>
                <br>
                <br>
                <label>SENHA</label>
                <br>
                <input type="password" name="txtsenha" placeholder="Digite sua senha" required>
                <br>
                <br>
                <input type="submit" value="LOGIN">
            </form>
            <br>
        </div>

    </div>
</body>
</html>