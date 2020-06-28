<?php

session_start();

include('../models/connect.php');
include('../controllers/calcDate.php');

$name_user = $_SESSION['name_user'];
$photo_user = $_SESSION['photo_user'];

// Consulta dos dados das tarefas do banco.
$consultTask = $link->query("SELECT * FROM tb_task") or die($link->error);
// Consulta dos dados dos usuários do banco.
$consultUser = $link->query("SELECT * FROM tb_user WHERE name != '$name_user'") or die($link->error);

$currentDate = strtotime(date('Y-m-d'));

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title page -->
    <title>Gerenciador de Tarefas - Dashboard</title>

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
    <link rel="stylesheet" href="css/dashboard.css">

    <!-- Inclusão da foto do usuário -->
    <style>

        .user-photo{
            width: 72px;
            background: url(img/users/<?php echo $photo_user; ?>);
            background-position: center;
            background-size: cover;
        }

    </style>

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light menu">
        <a class="navbar-brand" href="#"><img src="img/logo/logo-navbar.png" alt=""></a>
        <!-- Botão menu collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- /Botão menu collapse -->
      
        <!-- Itens do menu -->
        <div class="collapse navbar-collapse menu-items" id="navbarSupportedContent">
            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tarefas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clientes</a>
                </li>
            </ul>
            <!-- /Links -->

            <!-- Notificações -->
            <div class="menu-icons">
                <a href="#"><i class="far fa-envelope"></i></a>
                <a href="#"><i class="far fa-bell"></i></a>
            </div>
            <!-- /Notificações -->

            <!-- Botões -->
            <form class="form-inline my-2 my-lg-0 menu-buttons">
                <a href="registerTask.php"><button class="btn btn-outline-success my-2 my-sm-0 btn-task" type="button"><i class="far fa-plus-square"></i> Nova Tarefa</button></a>
                <button class="btn btn-outline-success my-2 my-sm-0 btn-exit" type="button" data-toggle="modal" data-target="#exit"><i class="fas fa-sign-out-alt"></i> Sair</button>
            </form>
            <!-- /Botões -->

            <!-- Foto usuário -->
            <div class="user-photo"></div>
            <!-- /Foto usuário -->
        </div>
        <!-- Itens do menu -->
    </nav>
    <!-- /Navbar -->

    <!-- Conteúdo da página -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 dashboard">

                    <!-- Area de tarefas -->
                    <div class="col-md-8 col-sm-8 tasks">
                        <h3>Trabalhos em progresso</h3>

                        <!-- Tabela de tarefas -->
                        <div class="task-table">
                            <table class="table table-bordered">
                                <tbody>
                                    <!-- Obtendo array com os dados do banco e inserindo os valores na tabela -->
                                    <?php while($dado = $consultTask->fetch_array()){ ?>
                                    <tr>
                                        <td class="task-id">#<?php echo $dado["id_task"]; ?></td>
                                        <td class="task-name"><?php echo $dado["name_task"]; ?></td>
                                        <td>
                                            <span class="status badge ml-1 bg-atr">
                                                <!-- Verificando o status da tarefa -->
                                                <?php
                                                    // Data do banco de dados formatada
                                                    $dateBD = substr($dado['date_task'], 0, 10);
                                                    // Diferença da data atual e da data da tarefa
                                                    $result = strtotime($dateBD) - $currentDate;

                                                    // Definindo valor do status
                                                    if($result < 0){
                                                        echo "ATRASADO";
                                                    }
                                                    else if($result > 0){
                                                        echo formatDate($dateBD);
                                                    }
                                                    else{
                                                        echo "HOJE";
                                                    } 
                                                ?>
                                            </span>
                                        </td>
                                        <td class="resp-name"><?php echo $dado["resp_task"]; ?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $dado["id_task"]; ?>"><i class="far fa-edit"></i></a> 

                                            <i class="far fa-eye" data-toggle="modal" data-target="#detailsTask<?php echo $dado['id_task']; ?>"></i>

                                            <i class="fas fa-ban" data-toggle="modal" data-target="#removeTask"></i>
                                        </td>
                                    </tr>
                                        <!-- Modal de confirmação de tarefa a ser deletada -->
                                        <div class="modal fade" id="removeTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Deletar tarefa</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certeza que deseja deletar esta tarefa?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <a href="../models/remove.php?id=<?php echo $dado["id_task"]; ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Modal de confirmação de tarefa a ser deletada -->

                                        <!-- Modal com descrição da tarefa clicada -->
                                        <div class="modal fade" id="detailsTask<?php echo $dado['id_task']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detalhes da tarefa</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Descrição: <?php echo $dado['desc_task']; ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Modal com descrição da tarefa clicada -->
                                    <?php } ?>
                                    <!-- /Obtendo array com os dados do banco e inserindo os valores na tabela -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /Tabela de tarefas -->
                    </div>
                    <!-- /Area de tarefas -->

                    <!-- Modal de confirmação da saída do usuário da dashboard -->
                    <div class="modal fade" id="exit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Sair</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem certeza que deseja sair?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <a href="../models/exit.php"><button type="button" class="btn btn-danger">Sair</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Modal de confirmação da saída do usuário da dashboard -->

                    <!-- Area de usuários -->
                    <div class="col-md-4 col-sm-4 users">
                        <h3>Usuários</h3>

                        <!-- Tabela de usuários -->
                        <div class="task-table">
                            <table class="table table-bordered table-sm mb-3">
                                <tbody>
                                <tr>
                                    <td class="task-id td-name"><?php echo $_SESSION['name_user'] ?></td> 
                                    <td><span class="badge ml-1 badge-danger bg-atr">Você</span></td>
                                </tr>
                                <!-- Obtendo array com os dados do banco e inserindo os valores na tabela -->
                                <?php while($dado = $consultUser->fetch_array()){ ?>    
                                    <tr>
                                        <td class="task-id td-name"><?php echo $dado['name'] ?></td>
                                        <td class="td-edit">
                                            <a href="editUser.php?id=<?php echo $dado["id_user"]; ?>"><i class="far fa-edit"></i></a>
                                            <i class="fas fa-ban" data-toggle="modal" data-target="#removeUser<?php echo $dado['id_user']; ?>"></i>
                                        </td>
                                    </tr>

                                        <!-- Modal de confirmação de usuário a ser deletado -->
                                        <div class="modal fade" id="removeUser<?php echo $dado['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Deletar Usuário</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certeza que deseja deletar este usuário?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <a href="../models/removeUser.php?id=<?php echo $dado["id_user"]; ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Modal de confirmação de usuário a ser deletado -->
                                <?php } ?>
                                <!-- /Obtendo array com os dados do banco e inserindo os valores na tabela -->
                                </tbody>
                            </table>

                            <form class="form-inline my-2 my-lg-0 menu-buttons">
                                <a href="registerUser.php"><button class="btn btn-outline-success my-2 my-sm-0 btn-task" type="button"><i class="far fa-plus-square"></i> Novo usuário</button></a>
                            </form>

                        </div>
                        <!-- Tabela de usuários -->
                    </div>
                    <!-- /Area de usuários -->
                </div>
            </div>
        </div>
    </main>
    <!-- Conteúdo da página -->

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

    <!-- Script Dashboard -->
    <script src="../controllers/scripts/dashboard.js"></script>

</body>
</html>