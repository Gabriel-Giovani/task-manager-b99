<?php

session_start();

include('connect.php');

$admin_user = $_SESSION['admin_user'];  

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Exclusão dos dados na coluna do banco de dados.
$result = $link->query("DELETE FROM tb_task WHERE id_task = '$id'");

// Verificando se o usuário é ou não administrador.
if($admin_user == 'S'){

    header("Location: ../views/dashAdmin.php");    

}
else{

    header("Location: ../views/dashboard.php");

}