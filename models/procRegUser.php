<?php

session_start();

include('connect.php');

$error = false;

$user_name = $_POST['user-name'];
$user_email = $_POST['user-email'];
$user_login = $_POST['user-login'];
$user_password = $_POST['user-password'];
$confirm_password = $_POST['confirm-password'];
$user_admin = $_POST['user-admin'];
$photo = $_FILES['photo']['name'];

// Verificando se a senha tem menos de 6 caracteres.
if(strlen($user_password) < 6){

    $error = true;
    $_SESSION['regError'] = "A senha deve conter no mínimo 6 caracteres!";
    header("Location: ../views/registerUser.php");

}
// Verificando se as senhas conferem.
elseif($user_password != $confirm_password){

    $error = true;
    $_SESSION['regError'] = "As senhas não conferem!";
    header("Location: ../views/registerUser.php");

}
else{

    // Verificando se já existe um e-mail já cadastrado
    $result_user = $link->query("SELECT id_user FROM tb_user WHERE email = '$user_email'");
    
    if(($result_user) && ($result_user->num_rows != 0)){

        $error = true;
        $_SESSION['regError'] = "Este e-mail já está cadastrado por outro usuário!";
        header("Location: ../views/registerUser.php");

    }
    
    // Verificando se já existe um login já cadastrado
    $result_user = $link->query("SELECT id_user FROM tb_user WHERE login = '$user_login'");

    if(($result_user) && ($result_user->num_rows != 0)){

        $error = true;
        $_SESSION['regError'] = "Este login já está cadastrado por outro usuário!";
        header("Location: ../views/registerUser.php");

    }
}

$_UP['folder'] = '../views/img/users/';
$_UP['extensions'] = array('png', 'jpg', 'jpeg', 'gif');

// Verificando se o input type="file" está vazio. Se estiver...
if(empty($photo)){

    // ... a foto vai ser a padrão já contida na pasta de upload.
    $photo = 'avatar.jpg';

}

$temp_ext = explode('.', $photo);
$extension = strtolower(end($temp_ext));

// Verificando a extensão do arquivo passado para o input type="file"
if(array_search($extension, $_UP['extensions'])=== false){	
        
    $error = true;
    $_SESSION['regError'] = "Arquivo da foto inválido!";
    header("Location: ../views/registerUser.php");
        
}

if(!$error){

    // Inserindo os dados nas colunas do banco de dados.
    $insertSQL = "insert into tb_user (name, email, login, password, admin, photo) values ('$user_name', '$user_email', '$user_login', '$user_password', '$user_admin', '$photo')";

}

// Verificação do processo de INSERT.
if($link->query($insertSQL) === TRUE){
    echo "Editado com sucesso!";
    header("Location: ../views/dashAdmin.php");
}
else{
    echo "Erro: ". $link->error;
}