<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php
   echo $this->Form->end(__('Login'));
   echo $this->Html->link('Registre-se', array('action' => 'add'), array('class' => 'button'));
?>
</div>