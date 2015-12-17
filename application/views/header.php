
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<title>Bibliothèque Moncalm</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/styles.css" type="text/css" media="screen" />
<script type='text/JavaScript' src='../../js/jquery-1.11.3.js'></script> 
<script type='text/JavaScript' src='../../js/recherche.js'></script> 
</head>

<body>
	<div id ="conteneur">
		<header>
        	<h1>
			<?php $image_properties = array('src' => 'images/logo.png','class' => 'logo','alt' => 'Logo de la page'); ?>
			<?php echo anchor('Site/index', img($image_properties))?>
			
		
			 
				Bibliothèque Moncalm
</h1>
			<?php
		
				if (isset ( $_SESSION ['user'] ))
				{
					echo '<div class="lienHautPageConn">';
					echo $_SESSION['user']['pseudo'];
					echo anchor('Site/profil','Mon profil','title="Mon profil"');
					echo anchor('Site/deconnexion','Se déconnecter','title="Se déconnecter"');
				}
				else
				{
					echo '<div class="lienHautPageConn">';
					echo anchor('Site/inscription','Inscription','title="Inscription"');
				   echo anchor('Site/login','Se Connecter','title="Connexion"');
				}
				echo '</div >';
			?>
				<?php echo form_open('site/recherche', 'id="formRecherche"');?>
			
			<input type="text" name="recherche"  />
			<input type="submit" name="bouton"  value="Rechercher" />
			
			 <?php echo form_close();?>
		</header>

		<div id="menu">
        	<ul>
				<li> <?php echo anchor('Site/index','Accueil','title="Accueil du site"', 'class="cellules"') ?> </li>
				<li> <?php echo anchor('Site/horaire','Horaire','title="Horaire de la bibliothèque"', 'class="cellules"') ?> </li>
				<li> <?php echo anchor('Site/activites','Activités','title="Activités de la bibbliothèque"', 'class="cellules"') ?> </li>
				<li> <?php echo anchor('Site/mondossier','Mon dossier','title="Dossier de l\'utilisateur"', 'class="cellules"') ?> </li>
				<?php if(isset($_SESSION['user']) && $_SESSION['user']['type'] == 'a')
				{
					echo '<li>';
					echo anchor('Admin/pageadmin','Aller à la page d\'administration','title="page administration"');
					echo '</li>';
				}
				?>
				<li> <?php echo anchor('Site/nous_joindre','Nous joindre','title="Nous joindre"', 'class="cellules"') ?> </li>
			</ul>
		</div><!--Fin de menu-->