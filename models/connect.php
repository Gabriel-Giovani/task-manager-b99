<?php


$host = "localhost";

$user = "root";

$pass = "";

$db = "crud";

$link = mysqli_connect($host, $user, $pass, $db);

// Verificação da conexão com o banco
if(!$link){
    die("Connection failed!: " . mysqli_connect_error());
}
