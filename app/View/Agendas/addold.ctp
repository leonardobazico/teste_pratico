<h1>Adicionar compromisso</h1>
<?php
echo $this->Form->create('Agenda');
echo $this->Form->input('title');
echo $this->Form->input('starts');
echo $this->Form->input('ends');
echo $this->Form->input('description', array('rows' => '3'));
echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-xs btn-success', 'div' => false));