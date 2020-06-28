<?php

session_start();

include('connect.php');

$user = $_POST['user'];
$password = $_POST['password'];

// Verificando se existem o usuário e senha cadastrados
if((isset($user)) && (isset($password))){

    $sql = "SELECT * FROM tb_user WHERE login = '$user' && password = '$password' LIMIT 1";
    $result = mysqli_query($link, $sql);
    $resultList = mysqli_fetch_assoc($result);

    if(empty($resultList)){

        $_SESSION['loginError'] = "Usuário ou senha inválido(a)";
	    header("Location: ../views/login.php");

    }
    
    elseif(isset($resultList)){

        // Verificando se o usuário é ou não administrador.
        if($resultList['admin'] == 'S'){
        
            header("Location: ../views/dashAdmin.php");

        }

        else{

            header("Location: ../views/dashboard.php");

        }

        $_SESSION['name_user'] = $resultList['name'];
        $_SESSION['photo_user'] = $resultList['photo'];
        $_SESSION['admin_user'] = $resultList['admin'];

    }

    else{

        $_SESSION['loginError'] = "Usuário ou senha inválido(a)";
	    header("Location: ../views/login.php");    

    }

} 

else{

    $_SESSION['loginError'] = "Usuário ou senha inválido(a)";
	header("Location: ../views/login.php");

}