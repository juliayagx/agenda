<?php 

    // CONEXAO COM O BANCO DE DADOS 
    include ("utios/conectadb.php");

    //ATIVA A VARIAVEL E USO DA SESSAO
    session_start();

    //VERIFICA SE A SESSAO ESTA ATIVA
    if(isset($_SESSION['idfuncionario'])) {
        $idfuncionario = $_SESSION['idfuncionario'];
        
        $sql = "SELECT FUN_NOME FROM funcionarios WHERE FUN_ID = $idfuncionario";

        $enviaquery = mysqli_query($link, $sql);

        $nomeusuario = mysqli_fetch_array($enviaquery) [0];
    }
    else{
        echo("<script>window.alert('VOCE NAO TEM ACESSO A ESTA PAGINA');</script>");
        echo ("<script>window.location.href='login.php';</script>");
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link href="https://fonts.cdnfonts.com/css/comfortaa-3" rel="stylesheet">
    <title>BACKOFFICE</title>
    
</head>
<body>
    <div class="global"> 
        <div class="topo">

            <!-- AQUI VAI TRAZER O NOME DO USUARIO NO TOPO -->
            <h1> Bem Vindo <?php echo strtoupper ($nomeusuario)?> </h1>

            <!-- BOTAO DE ENCERREMENTO DE SESSÃO -->
            <div class="logout" method="post"> 
                <form action="logout.php"> 
                <input type="submit" value="Sair" />
                </form>
            </div>
            
        </div>

            <!-- CARDS -->
            <div class="menus">

                <div class="menu1">
                    <a href="usuario_cadastra.php"><img src="icons/user.png" width="200px" height="200px"></a>
                </div>

                <div class="menu2">
                    <a href="usuario_lista.php"><img src="icons/th2.png" width="200px" height="200px"></a>
                </div>

                <div class="menu3">
                    <a href="funcionario_cadastra.php"><img src="icons/business.png" width="200px" height="200px"></a>
                </div>

                <div class="menu4">
                    <a href="funcionario_lista.php"><img src="icons/group1.png" width="200px" height="200px"></a>
                </div>

                <div class="menu5">
                    <a href="cliente_cadastra.php"><img src="icons/add9.png" width="200px" height="200px"></a>
                </div>

                <div class="menu6">
                    <a href="cliente_lista.php"><img src="" width="200px" height="200px"></a>
                </div>

            </div>

        

    </div>
</body>
</html>