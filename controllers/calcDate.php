<?php

include('../models/connect.php');

// Formata data para o padrão dia-mês-Ano
function formatDate($date){
    return date("d/m/Y", strtotime($date));
}

// Formata a data para o padrão Ano-mês-dia (necessário para inserir a data do banco de dados no input date do formulário)
function formatDateBd($date){
    return date("Y-m-d", strtotime($date));
}