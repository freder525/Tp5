	<?php 
					include('header.php');
		?>

		<div id="contenu">
			<h1><?php echo $titre; ?></h1>
			<?php
	            if(isset($erreur))
	            {
	                echo '<div class="error"><p>'.$erreur.'</p></div>';
	            }
	            else if(isset($reussite))
	            {
	                echo '<div class="reussite"><p>'.$reussite.'</p></div>';
	            }
        	?>
			<ul>
				<li>Auteur : <?php echo $auteur; ?></li>
				<li>Année : <?php echo $annee; ?></li>
				<li>Genre : <?php echo $genre; ?></li>
				<li>Status :
				<?php
					$valeurFormulaire = NULL;
					if($id_reserve == 0)
					{
						if($id_emprunt == 0)
						{
							echo "Disponible";
							$valeurFormulaire = "Emprunter";
						}
						else if($id_emprunt == $_SESSION['user']['id'])
						{
							echo "Emprunté (par vous)";
						}
						else
						{
							echo "Emprunté";
							$valeurFormulaire = "Réserver";
						}					
					}
					else
					{
						echo "Emprunté et déjà réservé";
					}
				?>
				</li>
			</ul>

			<?php
				if($valeurFormulaire != NULL && isset($_SESSION['user']))
				{
					echo form_open('Site/' + uri_string(), 'id="form1"');
			?>
					<input type="submit" name="<?php echo $valeurFormulaire; ?>" value="<?php echo $valeurFormulaire; ?>" />
			<?php 
					echo form_close();
				}
				echo anchor('Site/recherche','Retour à la recherche','title="Retour à la recherche"');
			?>

		</div><!--Fin de contenu-->



	<?php 
					include('footer.php');
		?>