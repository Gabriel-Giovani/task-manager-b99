<?php

include('connect.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Exclusão dos dados na coluna do banco de dados.
$result = $link->query("DELETE FROM tb_user WHERE id_user = '$id'");

header("Location: ../views/dashAdmin.php");