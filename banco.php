<?php

$bdServidor = 'localhost';//Pode ser localhost
$bdUsuario = 'id17692821_sistema'; //Usuário criado no BD
$bdSenha = 'd#&SDzku4URd_tpR'; // Senha Totalmente exposta do BD
$bdBanco = 'id17692821_livraria'; // Nome do BD dentro do Servidor

$conexao = mysqli_connect($bdServidor,$bdUsuario,$bdSenha,$bdBanco);

if(mysqli_connect_errno()){  //Função retorna se houve algum erro, caso sim, exibe o erro e encerra a execução do sistema
  echo 'Problemas para Conectar no Banco de dados. ERRO:';
  echo mysqli_connect_error();//Exibe qual foi o erro
  die();//Encerra a execução do sistema
}

function buscar_tarefas($conexao){
  $sqlBusca = 'SELECT * FROM tarefas'; //Consulta SQL
  $resultado = mysqli_query($conexao,$sqlBusca); // Função que executa a requisição

  $tarefas = []; //Array vazio para receber os resultados

  while($tarefa = mysqli_fetch_assoc($resultado)){ //Função que vai passar os resultados para o Array
    $tarefas[] = $tarefa; 
  }

  return $tarefas;
}

function inserir_tarefa($conexao, $tarefa){
    if($tarefa['prazo'] == ''){
        $prazo = 'null';
    }else{
        $prazo = "'{$tarefa['prazo']}'";
    }

      $sqlInserir = "INSERT INTO tarefas (nome, descricao, prioridade, prazo, concluida) 
                    VALUES
                  (
                      '{$tarefa['nome']}',
                      '{$tarefa['descricao']}',
                      {$tarefa['prioridade']},
                      {$prazo},
                      {$tarefa['concluida']}
                  )
      ";
                    
      mysqli_query($conexao,$sqlInserir);
}


function buscar_tarefa_para_editar($conexao,$id){
    $sqlBusca = 'SELECT * FROM tarefas WHERE id = ' .$id;

    $resultado = mysqli_query($conexao,$sqlBusca);

    return mysqli_fetch_assoc($resultado);
}

function editar_tarefa($conexao, $tarefa){
    if($tarefa['prazo'] == ''){
      $prazo = 'null';    }
      else {
        $prazo = "'{$tarefa['prazo']}'";
      }

      $sqlBusca = "UPDATE tarefas SET
                      nome = '{$tarefa['nome']}',
                      descricao = '{$tarefa['descricao']}',
                      prioridade = {$tarefa['prioridade']},
                      prazo = {$prazo},
                      concluida = {$tarefa['concluida']}
                      WHERE id = {$tarefa['id']}";

      mysqli_query($conexao,$sqlBusca);
}

function remover_tarefa($conexao, $id){
      $sqlDelete = "DELETE FROM tarefas WHERE id = {$id}";

      mysqli_query($conexao, $sqlDelete);
}

function buscar_tarefa($conexao,$id){
  $sqlBusca = "SELECT * FROM tarefas WHERE id = {$id}";
  $busca = mysqli_query($conexao, $sqlBusca);
  return mysqli_fetch_assoc($busca);

}

function gravar_anexo($conexao, $anexo)
{
    $sqlGravar = "INSERT INTO anexos VALUES
                  (null,
                  {$anexo['tarefa_id']},
                  '{$anexo['nome']}',
                  '{$anexo['arquivo']}')";
    mysqli_query($conexao, $sqlGravar);

}

function buscar_anexos($conexao, $id)
    {
        $sqlBusca = 'SELECT * FROM anexos WHERE tarefa_id = ' . $id;
        $resultado = mysqli_query($conexao,$sqlBusca);

        $anexos = [];

        while($anexo = mysqli_fetch_assoc($resultado)){
            $anexos[] = $anexo;
        }

        return $anexos;
    }

?>