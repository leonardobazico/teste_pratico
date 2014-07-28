<h1>Agenda</h1>
<?php echo $this->Html->link('Novo', array('controller' => 'agendas', 'action' => 'edit')); ?>
<table>
    <tr>
         <th>Id</th>
         <th>Título</th>
         <th>Começa</th>
         <th>Termina</th>
         <th>Action</th>
    </tr>
    <?php foreach ($agendas as $agenda): ?>
    <tr>
        <td><?php echo $agenda['Agenda']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($agenda['Agenda']['title'], array('controller' => 'agendas', 'action' => 'view', $agenda['Agenda']['id'])); ?>
        </td>
        <td><?php echo $agenda['Agenda']['starts']; ?></td>
        <td><?php echo $agenda['Agenda']['ends']; ?></td>
         <td>
            <?php echo $this->Form->postLink(
               'Excluir',
               array('action' => 'delete', $agenda['Agenda']['id']),
               array('confirm' => 'Você tem certeza?')
            )?>
            <?php echo $this->Html->link('Editar', array('action' => 'edit', $agenda['Agenda']['id']));?>
         </td>
    </tr>
    <?php endforeach; ?>

</table>