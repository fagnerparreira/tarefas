<table>
            <tr>
                <th>Tarefas</th>
                <th>Descrição</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluída</th>
                <th>Opçoões</th>
            </tr>
        <?php foreach($lista_tarefas as $tarefas) : ?>
            <tr>
                <td><?php echo $tarefas['nome'] ?></td>
                <td><?php echo $tarefas['descricao'] ?></td>
                <td><?php echo traduz_data_para_exibir($tarefas['prazo']); ?></td>
                <td><?php echo verifica_prioridade($tarefas['prioridade']); ?></td>
                <td><?php echo verifica_concluida($tarefas['concluida']); ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $tarefas['id']; ?>">Editar</a>
                    <a href="remover.php?id=<?php echo $tarefas['id']; ?>">Apagar</a>
                </td>
            </tr>
        <?php endforeach ?>
</table>