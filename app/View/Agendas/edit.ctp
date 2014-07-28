<div style="width: 35%;">
   <?php echo $this->Session->flash('auth'); ?>
   <h1>Adicionar compromisso</h1>
   <?php
      echo $this->Form->create('Agenda');
      echo $this->Form->input('title');
   ?>
   <div class="form-inline">
      <?php
         echo $this->Form->input('starts');
         echo $this->Form->input('ends');
      ?>
   </div>
   <?php
      echo $this->Form->input('description', array('rows' => '3'));
      echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-success', 'div' => false));
   ?>
</div>