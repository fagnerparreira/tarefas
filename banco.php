<?php

$bdServidor = '127.0.0.1';//Pode ser localhost
$bdUsuario = 'sistema'; //Usuário criado no BD
$bdSenha = '123456'; // Senha Totalmente exposta do BD
$bdBanco = 'tarefas'; // Nome do BD dentro do Servidor

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
        $prazo = "' {$tarefa['prazo']}'";
    }

      $sqlInserir = "INSERT INTO tarefas (nome,descricao,prioridade, prazo, concluida) 
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
    $sqlBusca = 'SELECT  * FROM tarefas WHERE id = ' .$id;
    $resultado = mysqli_query($conexao,$sqlBusca);
    return mysqli_fetch_assoc($resultado);
}

?>