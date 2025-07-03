<?php 
    //conexao com o banco 
    include("utios/conectadb.php");
    include("utios/verificalogin.php");

    // TRAS OS FUNCIONARIOS DO BANCO 
    $sqlfun = "SELECT * FROM funcionarios INNER JOIN usuarios ON FK_FUN_ID = FUN_ID";
    $enviaquery = mysqli_query($link, $sqlfun);

    //$sqlfun = "SELECT * FROM funcionarios";
    //$enviaquery2 = mysqli_query($link, $sqlfun);
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/lista.css">
        <link href="https://fonts.cdnfonts.com/css/comfortaa-3" rel="stylesheet">
        <title>LISTA FUNCIONARIO</title>
    </head>

    <body>
            <div class="topo">

                <h1> Lista de Funcionarios </h1>

                    <!-- BOTAO DE ENCERREMENTO DE SESSÃO -->
                    <div class="logout" method="post"> 
                        <form action="backoffice.php"> 
                            <input type="submit" value="Sair" />
                        </form>
                    </div>
            </div>

            <div class="global">
                <div class="tabela">
                    <table>
                        <tr>
                            <th>ID FUNCIONARIO</th>
                            <th>NOME</th>
                            <th>CPF</th>
                            <th>CARGO</th>
                            <th>TELEFONE</th>
                            <th>STATUS</th>
                            <!-- DADOS DO USUARIO -->
                            <th>LOGIN</th>
                        </tr>

                        <!--COMECOU PHP -->
                        <?php 
                            while($tbl = mysqli_fetch_array($enviaquery)){
                            //while($tbl2 = mysqli_fetch_array($enviaquery2))
                        ?>
                            <tr>
                            <th><?=$tbl[0]?></th> <!-- ID DO FUNCIONARIO -->
                            <th><?=$tbl[1]?></th> <!-- NOME DO FUNCIONARIO -->
                            <th><?=$tbl[2]?></th> <!-- CPF DO FUNCIONARIO -->
                            <th><?=$tbl[3]?></th> <!-- TELEFONE DO FUNCIONARIO -->
                            <th><?=$tbl[4]?></th> <!-- ATIVO DO FUNCIONARIO -->
                            <th><?=$tbl[5]?></th> <!-- ATIVO DO FUNCIONARIO -->
                            <td><a href='funcionario_altera.php?id=<?= $tbl[0]?>'>Alterar</td>
                            
                            </tr>
                        <?php
                            }
                        ?>

                    </table>

                </div>

            </div>
        
    </body>
</html>