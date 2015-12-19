
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<title>Bibliothèque Moncalm</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/styles.css" type="text/css" media="screen" />
<script type='text/javaScript' src="<?php echo base_url()?>js/jquery-1.11.3.js"></script> 
<script type='text/javaScript' >
$(document).ready(function(){
	$('#btnRecherche').click(function()
	{
		var recherche = $('#champsRecherche').val();
		
		$.ajax({
			type:'POST',
			data:{recherche:recherche},
			dataType: 'json',
			url: '<?php echo site_url('/site/rechercheLivre')  ; ?>',
			success : function(result){
				$('#info').children().remove();
				if(result.length > 0)
				{
				var divLivre = document.createElement( "div" );	
				var table = document.createElement( "table" );
				var tableBody = document.createElement( "tbody" );
				var rowHeader = document.createElement( "tr" );
				var titre = document.createElement( "th" );
				var auteur = document.createElement( "th" );
				var genre = document.createElement( "th" );
				
				var textTitre = document.createTextNode("Titre");
				var textAuteur = document.createTextNode("Auteur");
				var textGenre = document.createTextNode("Genre");
						
				$(table).addClass("rwd-table");
				$(table).attr("id","resultRecherche");
				
				$(titre).append(textTitre);
				$(auteur).append(textAuteur);
				$(genre).append(textGenre);
						
				$(rowHeader).append(titre);
				$(rowHeader).append(auteur);
				$(rowHeader).append(genre);
				
				$(tableBody).append(rowHeader);
				}
				for(var i = 0; i< result.length; i++)
				{									
						var row = document.createElement( "tr" );
						var dataTitre = document.createElement( "td" );

						var lienVersDetails = document.createElement( "a" );
						lienVersDetails.href = "details_article/" + result[i].id.replace(/ /g, '-');
						lienVersDetails.title = result[i].titre;

						var dataAuteur = document.createElement( "td" );
						var dataGenre = document.createElement( "td" );

						var textNodeLien = document.createTextNode(result[i].titre);
						var textNodeA = document.createTextNode(result[i].auteur);
						var textNodeG = document.createTextNode(result[i].genre);
						
						lienVersDetails.appendChild(textNodeLien);
						$(dataTitre).append(lienVersDetails);
						$(dataAuteur).append(textNodeA);
						$(dataGenre).append(textNodeG);
						
						$(row).append(dataTitre);
						$(row).append(dataAuteur);
						$(row).append(dataGenre);
						
						$(tableBody).append(row);
						
				}			
				$(table).append(tableBody);
				$(divLivre).append(table);		
				$('#info').append(divLivre);	
				}
			
		});
	});
});


</script> 
</head>

<body>
	<div id ="conteneur">
		<header>
		<div>
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
			</div>
			
				
			 <?php echo anchor('#contenu','Contenu','class="contenuPrinc"','title="contenu"') ?>
		</header>

		<div id="menu">
        	<ul>
				<li> <?php echo anchor('Site/index','Accueil','title="Accueil du site"', 'class="cellules"') ?> </li>
				<li> <?php echo anchor('Site/horaire','Horaire','title="Horaire de la bibliothèque"', 'class="cellules"') ?> </li>
				<li> <?php echo anchor('Site/activites','Activités','title="Activités de la bibbliothèque"', 'class="cellules"') ?> </li>
				<li> <?php echo anchor('Site/mondossier','Mon dossier','title="Dossier de l\'utilisateur"', 'class="cellules"') ?> </li>
				<li> <?php echo anchor('Site/recherche','Recherche','title="Recherche"', 'class="cellules"') ?> </li>
				<?php if(isset($_SESSION['user']) && $_SESSION['user']['type'] == 'a')
				{
					echo '<li>';
					echo anchor('Admin/pageadmin','Page Administrative','title="page administration"');
					echo '</li>';
				}
				?>
				<li> <?php echo anchor('Site/nous_joindre','Nous joindre','title="Nous joindre"', 'class="cellules"') ?> </li>
			</ul>
		</div><!--Fin de menu-->