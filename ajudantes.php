<?php

function verifica_prioridade($numPrioridade){
  $prioridade = '';
  switch($numPrioridade ){
    case 2:
      $prioridade = 'Média';
      break;
    case 3:
      $prioridade = 'Alta';
      break;
    default:
      $prioridade = 'Baixa';
      break;
  }

  return $prioridade;

}

function traduz_data_para_banco($data){
  if($data == ''){
      return '';
  }

  // $objeto_data = DateTime::createFromFormat('d/m/Y',$data);

  // return $objeto_data->format('Y-m-d');

  
  $dados = explode("/", $data);

  $data_banco = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

  return $data_banco;
 

}

function traduz_data_para_exibir($data){
  if($data == '' OR $data == '0000-00-00'){
      return '';
  }

  // $objeto_data = DateTime::createFromFormat('Y-m-d', $data);

  // return $objeto_data->format('d/m/Y');

  
  $dados = explode("-",$data);

  $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

  return $data_exibir;
  
}

function verifica_concluida($concluida){

  if($concluida == 0 OR $concluida == ''){

      return 'Não';
  }

  return 'Sim';
}


?>
