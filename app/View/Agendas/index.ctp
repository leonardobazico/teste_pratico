<h1>Agenda</h1>
<?php echo $this->Html->link('Novo', array('controller' => 'agendas', 'action' => 'edit'), array('class' => 'btn btn-default')); ?>
<table class="table tablesorter" id="agendaTable">
   <thead>
    <tr>
         <th>#</th>
         <th>Título</th>
         <th>Começa</th>
         <th>Termina</th>
         <th>Action</th>
    </tr>
   </thead>
   <tbody>
    <?php foreach ($agendas as $agenda): ?>
    <tr id="tr_<?php echo $agenda['Agenda']['id']; ?>">
        <td><?php echo $agenda['Agenda']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($agenda['Agenda']['title'], array('controller' => 'agendas', 'action' => 'view', $agenda['Agenda']['id'])); ?>
        </td>
        <td><?php echo $agenda['Agenda']['starts']; ?></td>
        <td><?php echo $agenda['Agenda']['ends']; ?></td>
         <td>
            <input type="button" class="btn btn-xs btn-danger" onClick="excluir(<?php echo $agenda['Agenda']['id'] ?>);" value="Excluir">
            
            <?php
               /*
               echo $this->Form->postLink(
                  'Excluir',
                  array('action' => 'delete', $agenda['Agenda']['id']), array('class' => 'btn btn-xs btn-danger'),
                  array('confirm' => 'Você tem certeza?')
               );
               */
               echo $this->Html->link('Editar', array('action' => 'edit', $agenda['Agenda']['id']),
                                          array('class' => 'btn btn-xs btn-info'));?>
         </td>
    </tr>
    <?php endforeach; ?>
   </tbody>
</table>

<script type="text/javascript">
   $(document).ready(function(){ 
           $("#agendaTable").tablesorter(); 
       } 
   ); 
   function excluir(id) {
      if(confirm("Você tem certeza?")){
         $.ajax({
            type:'POST',
            cache: false,
            url: "<?php echo Router::Url(array('controller' => 'agendas', 'action' => 'delete'), TRUE); ?>/"+id,
            success: function(response) {
               $('#tr_'+id).remove();
            },
            data: {id: id}
         });
      }
   }
</script>