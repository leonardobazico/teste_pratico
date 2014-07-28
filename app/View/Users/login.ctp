<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php
   echo $this->Html->link('Registre-se', array('action' => 'add'), array('class' => 'btn btn-info'));
   echo $this->Form->end(array('label' => 'Entrar', 'class' => 'btn btn-success', 'div' => false));
?>
</div>