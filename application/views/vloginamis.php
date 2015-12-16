	<?php 
					include('header.php');
		?>

		<div id="contenu">
		
		<?php echo form_open('site/amiconnecte', 'id="form1"');?>
		<label for="nom"> Nom d'utilisateur : </label>
		<input type="text" name="login" value="<?php echo set_value('login');?>" />
		<?php echo form_error('login', '<div class="error">', '</div>'); ?>
		<br/> <br/>
		<label for="pass"> Mot de passe : </label>
		<input type="password" name="pass" />
		<?php echo form_error('pass', '<div class="error">', '</div>'); ?>
		<br/>
		<input type="submit" value = "Connexion" />
		<?php form_close();?>
		
		<?php echo $chaine; ?>
		</div><!--Fin de contenu-->


	<?php 
					include('footer.php');
		?>
