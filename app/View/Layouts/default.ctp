<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Teste Prático: Agenda
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-theme.min');
		echo $this->Html->css('tablesorter/blue/style');
      echo $this->Html->script('jquery-1.11.1.min');
      echo $this->Html->script('bootstrap.min');
      echo $this->Html->script('jquery.tablesorter.min');
      echo $this->Html->script('jquery.metadata');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
   <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">App Agenda</a>
        </div>
        <div class="navbar-collapse collapse">
          <div class="navbar-form navbar-right" role="form">
            <?php
               if (AuthComponent::user()) 
                  echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout'));
            ?>
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
      <hr>
      <hr>
    <div class="container">
      <div class="row">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
      </div>
      <hr>

      <footer>
        <p>Teste Prático</p>
      </footer>
    </div>
		<!--
	<div id="container">
		<div id="header">
			<h1 style="float:left;">App Agenda</h1>
			<span>
			<?php
            if (AuthComponent::user()) 
               echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout'));
			?>
			</span>
		</div>
		
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			Teste Prático
		</div>
	</div>
		-->
	<?php
	   //echo $this->element('sql_dump'); 
	   echo $this->Js->writeBuffer();
	?>
</body>
</html>
