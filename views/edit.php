<?php

include('../models/connect.php');
include('../controllers/calcDate.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Consulta dos dados das tarefas do banco.
$result = $link->query("SELECT * FROM tb_task WHERE id_task = '$id'");
$row_task = mysqli_fetch_assoc($result);

// Consulta dos dados dos usuários do banco.
$consultUser = $link->query("SELECT * FROM tb_user") or die($link->error);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title page -->
    <title>Gerenciador de Tarefas - Editar Tarefa</title>

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
                    <h3>Editar tarefa</h3>

                    <!-- Formulário -->
                    <form action="../models/procEdit.php" method="POST">
                        <div class="form-group">
                            <!-- Input necessário para exportar o id da tarefa ao procEdit.php -->
                            <input type="hidden" name="id" value="<?php echo $row_task['id_task'] ?>" required>
                            <!-- /Input ID -->
                            <label for="task-name">Nome da tarefa</label>
                            <input type="text" id="task-name" name="task-name" class="form-control" value="<?php echo $row_task['name_task']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Prazo</label>
                            <input type="date" id="date" name="date" class="form-control" value="<?php echo formatDateBd($row_task['date_task']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="task-resp">Responsável pela tarefa</label>
                            <select id="task-resp" name="resp-task" class="browser-default custom-select" required>
                            <option value="" selected>Selecione o responsável</option>
                            <!-- Populando o select com dados do banco -->
                            <?php while($dado = $consultUser->fetch_array()){ ?>
                                <option value="<?php echo $dado['name']; ?>"><?php echo $dado['name']; ?></option>
                            <?php } ?>
                            <!-- /Populando o select com dados do banco -->
                            </select>
                        <div class="form-group task-desc">
                            <label for="task-desc">Descrição</label>
                            <textarea id="desc-task" name="desc-task" class="form-control" rows="5" required><?php echo $row_task['desc_task']; ?></textarea>
                        </div>
                        </div>
                        <div class="form-group btn-form">
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