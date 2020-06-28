<?php

session_start();

include('connect.php');

$admin_user = $_SESSION['admin_user'];  
$name_task = $_POST['task-name'];
$date = $_POST['date'];
$resp_task = $_POST['resp-task'];
$desc_task = $_POST['desc-task'];

// Inserindo os dados nas colunas do banco de dados.
$insertSQL = "insert into tb_task (name_task, date_task, resp_task, desc_task) values ('$name_task', '$date', '$resp_task', '$desc_task')";

// Verificação do processo de INSERT.
if($link->query($insertSQL) === true){
    echo "New record created successfully!";
} else{
    echo "Error: " . $insertSQL . "<br>" . $link->error;
}

$link->close();

// Verificando se o usuário é ou não administrador.
if($admin_user == 'S'){

    header("Location: ../views/dashAdmin.php");    

}
else{

    header("Location: ../views/dashboard.php");

}