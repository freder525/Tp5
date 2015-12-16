	<?php 
					include('header.php');
		?>

		<div id="droite">

		<?php	
			echo "<h3> Liste des commentaires </h3>";
			echo br(1);
			for ($i=0; $i<=count($commentaires)-1; $i++)  {
				echo '<strong>'.$commentaires[$i]['id_ami'].'</strong>'; echo br(1);
				echo $commentaires[$i]['contenu']; echo br(1);
				if ($commentaires[$i]['id_ami']==$login){
					$param=$commentaires[$i]['id']; echo anchor('Site/suppCommentaire/'.$param.'', 'Supprimer le commentaire');
				}
				echo br(2);
			}				
		?>
 
        </div><!--Fin de droite-->

	<?php 
					include('footer.php');
		?>
