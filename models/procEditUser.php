<?php

session_start();

include('connect.php');

$error = false;

$id = $_POST['id'];
$user_name = $_POST['user-name'];
$user_email = $_POST['user-email'];
$user_login = $_POST['user-login'];
$user_password = $_POST['user-password'];
$confirm_password = $_POST['confirm-password'];
$user_admin = $_POST['user-admin'];
$photo = $_FILES['photo']['name'];

// Verificando se a senha tem menos de 6 caracteres
if(strlen($user_password) < 6){

    $error = true;
    $_SESSION['editError'] = "A senha deve conter no mínimo 6 caracteres!";
    header("Location: ../views/editUser.php?id=$id");

}
// Verificando se as senhas conferem
elseif($user_password != $confirm_password){

    $error = true;
    $_SESSION['editError'] = "As senhas não conferem!";
    header("Location: ../views/editUser.php?id=$id");

}
else{

    // Verificando se já existe um e-mail já cadastrado
    $result_user = $link->query("SELECT id_user FROM tb_user WHERE email = '$user_email' and id_user != '$id'");
    
    if(($result_user) && ($result_user->num_rows != 0)){

        $error = true;
        $_SESSION['editError'] = "Este e-mail já está cadastrado por outro usuário!";
        header("Location: ../views/editUser.php?id=$id");

    }
    
    // Verificando se já existe um login já cadastrado
    $result_user = $link->query("SELECT id_user FROM tb_user WHERE login = '$user_login' and id_user != '$id'");

    if(($result_user) && ($result_user->num_rows != 0)){

        $error = true;
        $_SESSION['editError'] = "Este login já está cadastrado por outro usuário!";
        header("Location: ../views/editUser.php?id=$id");

    }
}

$_UP['folder'] = '../views/img/users/';
$_UP['extensions'] = array('png', 'jpg', 'jpeg', 'gif');

// Verificando se o input type="file" está vazio. Se estiver...
if(empty($photo)){

    $result_user = $link->query("SELECT photo FROM tb_user WHERE id_user = '$id'");

    // ... a foto continua com o valor já cadastrado anteriormente.
    while($dado = $result_user->fetch_assoc()){

        $photo = $dado['photo'];

    }

}

$temp_ext = explode('.', $photo);
$extension = strtolower(end($temp_ext));

// Verificando a extensão do arquivo passado para o input type="file"
if(array_search($extension, $_UP['extensions']) === false){

    $error = true;
    $_SESSION['editError'] = "Arquivo da foto inválido!";
    header("Location: ../views/editUser.php?id=$id");

}

if(!$error){

    // Modificando os dados das colunas no banco de dados.
    $updateSQL = "UPDATE tb_user SET name = '$user_name', email = '$user_email', login = '$user_login', password = '$user_password', admin = '$user_admin', photo = '$photo' WHERE id_user = '$id'";

}

// Verificação do processo de UPDATE.
if($link->query($updateSQL) === TRUE){
    echo "Editado com sucesso!";
    header("Location: ../views/dashAdmin.php");
}
else{
    echo "Erro: ". $link->error;
}