<?php

//session_start();
// Requer que o arquivo funcione corretamente ou esteja presenta para execução do programa
require 'banco.php'; //Arquivo de conexão com o Banco
require 'ajudantes.php'; //Arquivo de ferramentas

$exibir_tabela = false;




//include 'banco.php'; // Arquivo de conexão com o Banco


//var_dump($lista_tarefas);

if (array_key_exists('nome', $_GET) && $_GET['nome'] != '') {
    $tarefa = [
        'nome' => $_GET['nome'],
        'descricao' => 'null',
        'prazo' => 'null',
        'prioridade' => $_GET['prioridade'],
        'concluida' => 0,
    ];

    if (array_key_exists('descricao', $_GET)) {
        $tarefa['descricao'] = $_GET['descricao'];
    }

    if (array_key_exists('prazo', $_GET)) {
        $tarefa['prazo'] = traduz_data_para_banco ($_GET['prazo']);
    }

    if (array_key_exists('concluida', $_GET)) {
        $tarefa['concluida'] =  1;
    }

     if(isset($lista_tarefas) && $lista_tarefas > 0){
            $ultimo = array_key_last($lista_tarefas);
        
        

        if($lista_tarefas[$ultimo]['nome'] == $tarefa['nome']){
            echo 'Cadastro existente';
        }else{
            inserir_tarefa($conexao,$tarefa);
        }
    } 
}



$tarefa = buscar_tarefa_para_editar($conexao, $_GET['id']);

// Include pode avisar sobre ausência ou erro mas não impede a execução do programa
    include 'template.php';


?>