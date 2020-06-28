<?php

session_start();

include('../models/connect.php');
include('../controllers/calcDate.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Consulta dos dados dos usuários do banco.
$result = $link->query("SELECT * FROM tb_user WHERE id_user = '$id'");
$row_user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title page -->
    <title>Gerenciador de Tarefas - Editar Usuário</title>

    <!-- Icon title page -->
    <link rel="icon" type="image/png" sizes="32x32" href="img/logo/logo-head.png">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
    crossorigin="anonymous"/>

    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/register.css">

</head>
<body>

    <!-- Tela de login -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12 form-area">

                <!-- Área do logo Atua -->
                <div class="col-md-4 col-sl-4 logo-area"></div>
                <!-- /Área do logo Atua -->

                <!-- Área de login -->
                <div class="col-md-8 col-sl-8 login-area">
                    <h3>Editar usuário</h3>

                    <!-- Formulário -->
                    <form id="formRegister" action="../models/procEditUser.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- Input necessário para exportar o id da tarefa ao procEditUser.php -->
                            <input type="hidden" name="id" value="<?php echo $row_user['id_user'] ?>" required>
                            <!-- /Input ID -->
                            <label for="user-name">Nome do usuário</label>
                            <input type="text" id="user-name" name="user-name" class="form-control" value="<?php echo $row_user['name'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="user-email">E-mail</label>
                            <input type="email" id="user-email" name="user-email" class="form-control" value="<?php echo $row_user['email'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="user-login">Login</label>
                            <input type="text" id="user-login" name="user-login" class="form-control" value="<?php echo $row_user['login'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="user-password">Senha</label>
                            <input type="password" id="user-password" name="user-password" class="form-control" value="<?php echo $row_user['password'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirme a senha</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="form-control" placeholder="Digite novamente a senha do usuário" required>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="photo" class="form-control" accept='image/*'>
                            <p class="ml-2"><?php echo $row_user['photo'] ?></p>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="user-admin" class="form-check-input check-adm" id="check-adm" value="N">
                            <label for="check-adm" class="form-check-label">Administrador</label>
                        </div>
                        
                        <!-- Mensagem de erro -->
                        <p class="text-center text-danger">
                            <?php if(isset($_SESSION['editError'])){
                                echo $_SESSION['editError'];
                                unset($_SESSION['editError']);
                            }?>     
                        </p>
                        <!-- /Mensagem de erro -->

                        <div class="form-group btn-form">
                            <a href="dashAdmin.php"><button type="button" class="btn-cancel">Cancelar</button></a>
                            <button type="submit" class="btn-access">Salvar</button>
                        </div>
                    </form>
                    <!-- /Formulário -->
                </div>
                <!-- /Área de Login -->
            </div>
        </div>
    </div>
    <!-- /Tela de Login -->

    

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>

    <!-- jQuery Validation -->
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>

    <!-- Popper.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
    crossorigin="anonymous"></script>

    <!-- Bootstrap.js CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
    crossorigin="anonymous"></script>
    
    <!-- Script -->
    <script src="../controllers/scripts/registerUser.js"></script>

</body>
</html>