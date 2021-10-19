<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gerenciador de Tarefas</title>
  <link rel="stylesheet" href="css/style2.css" type="text/css">
</head>
<body>
    <div>
        <h1>Tarefa: <?php echo $tarefa['nome']; ?></h1>
        <p>
          <a href="tarefas.php">
            Voltar para a lista de tarefas
          </a>
        </p>
        <p>
          <strong>Concluída:</strong>
          <?php echo traduz_concluida($tarefa['concluida']); ?>
        </p>
        <p>
        <strong>Descrição:</strong>
          <?php echo exibe_descricao($tarefa['descricao']); ?>
        </p>
        <p>
        <strong>Prazo:</strong>
          <?php echo traduz_data_para_exibir($tarefa['prazo']); ?>
        </p>
        <p>
        <strong>Prioridade:</strong>
          <?php echo traduz_prioridade($tarefa['prioridade']); ?>
        </p>

        <h2>Anexos</h2>

        <form method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Novo Anexo</legend>
                <input type="hidden" name="tarefa_id" value="<?php echo $tarefa['id']; ?>">
                <label >
                    <?php if($tem_erros && array_key_exists('anexo',$erro_validacao)) : ?>
                        <span class="erro">
                            <?php echo $erros_validacao['anexo']; ?>
                        </span>
                    <?php endif; ?>
                    <input type="file" name="anexo">
                </label>
                <input type="submit" value="Cadastrar">
            </fieldset>
      </form>


    </div>
</body>
</html>