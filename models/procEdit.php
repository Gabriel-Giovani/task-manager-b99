<?php

session_start();

include('connect.php');

$admin_user = $_SESSION['admin_user'];
$id = $_POST['id'];
$name_task = $_POST['task-name'];
$date = $_POST['date'];
$resp_task = $_POST['resp-task'];
$desc_task = $_POST['desc-task'];

// Modificando os dados das colunas no banco de dados.
$result = "UPDATE tb_task SET name_task = '$name_task', date_task = '$date', resp_task = '$resp_task', desc_task = '$desc_task' WHERE id_task = '$id'";
$update = $link->query($result);

// Verificação do processo de UPDATE.
if(mysqli_affected_rows($link)){
    echo "Editado com sucesso!";
}
else{
    echo "Erro: ". $link->error;
}

//Verificando se o usuário é ou não administrador
if($admin_user == 'S'){

    header("Location: ../views/dashAdmin.php");    

}
else{

    header("Location: ../views/dashboard.php");

}