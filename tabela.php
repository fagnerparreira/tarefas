<table>
            <tr>
                <th>Tarefas</th>
                <th>Descrição</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluída</th>
                <th>Opções</th>
            </tr>
        <?php foreach($lista_tarefas as $tarefas) : ?>
            <tr>
                <td><a href="tarefa.php?id<?php echo $tarefas['id']; ?>">
                        <?php echo $tarefas['nome'] ?>
                    </a> </td>
                
                <td><?php echo $tarefas['descricao']; ?></td>
                <td><?php echo traduz_data_para_exibir($tarefas['prazo']); ?></td>
                <td><?php echo verifica_prioridade($tarefas['prioridade']); ?></td>
                <td><?php echo verifica_concluida($tarefas['concluida']); ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $tarefas['id']; ?>">&#9989 Editar</a>
                    <a href="remover.php?id=<?php echo $tarefas['id']; ?>">&#10060 Apagar</a>
                </td>
            </tr>
        <?php endforeach ?>
</table>