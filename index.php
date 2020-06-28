<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title page -->
    <title>Gerenciador de Tarefas - Login</title>

    <!-- Icon title page -->
    <link rel="icon" type="image/png" sizes="32x32" href="views/img/logo/logo-head.png">

    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Style CSS -->
    <link rel="stylesheet" href="views/css/login.css">



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
                    <h3>Gerenciador de tarefas</h3>

                    <p>Os personagens de Brooklyn 99 foram demitidos do posto policial de Nova York. Portanto, agora estão trabalhando na Atua 99.</p>

                    <!-- Formulário -->
                    <form action="models/validaUser.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="user" class="form-control" placeholder="Usuário">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Senha">
                        </div>

                        <p class="text-center text-danger">
                            <?php if(isset($_SESSION['loginError'])){
                                echo $_SESSION['loginError'];
                                unset($_SESSION['loginError']);
                            }?>     
                        </p>

                        <div class="col-md-12 col-sm-12 footer-form">
                            <div class="col-md-6 col-sm-6 form-group btn-form">
                                <button type="submit" class="btn-access">Acessar</button>
                            </div>
                            <div class="col-md-6 col-sm-6 form-group forget-password">
                                <a href="#">Esqueci a senha</a>
                            </div>
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

    <!-- Popper.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
    crossorigin="anonymous"></script>

    <!-- Bootstrap.js CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
    crossorigin="anonymous"></script>

</body>
</html>