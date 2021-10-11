<?php

//session_start();
// Requer que o arquivo funcione corretamente ou esteja presenta para execução do programa
require 'banco.php'; //Arquivo de conexão com o Banco
require 'ajudantes.php'; //Arquivo de ferramentas

$exibir_tabela = false;
$tem_erros = false;
$erros_validacao =[];

//include 'banco.php'; // Arquivo de conexão com o Banco

//var_dump($lista_tarefas);

if (tem_post()) {
    $tarefa = [
        'id' => $_POST['id'],
        'nome' => $_POST['nome'],
        'descricao' => 'null',
        'prazo' => 'null',
        'prioridade' => $_POST['prioridade'],
        'concluida' => 0,
    ];

    if (strlen($tarefa['nome']) == 0) {
        $tem_erros = true;
        $erros_validacao['nome'] = 'O nome da tarefa é obrigatório!';
        
    }

    if (array_key_exists('prazo', $_POST) && strlen($_POST['prazo']) > 0) {
        $tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
    }

    if (array_key_exists('concluida', $_POST)) {
        $tarefa['concluida'] =  1;
    }

     
            editar_tarefa($conexao,$tarefa);
            header('Location: tarefas.php');
            die();


}



$tarefa = buscar_tarefa_para_editar($conexao, $_GET['id']);

// Include pode avisar sobre ausência ou erro mas não impede a execução do programa
    include 'template.php';


?>