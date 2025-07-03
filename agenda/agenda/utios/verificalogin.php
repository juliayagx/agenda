<?php 
session_start();

// MECANISMO DE SEGURANÇA ANTI VARIAVEL SE SESSÃO VAZIA
if (isset($_SESSION['idfuncionario'])) {
    $idfuncionario = $_SESSION['idfuncionario'];
}
else {
    echo("<script>window.alert('NAO LOGADO');</script>");
    echo ("<script>window.location.href='login.php';</script>");
}

?>