
	<?php 
					include('header.php');
		?>

		<div id="contenu">
   	<?php 	echo "<h3> Documents empruntés </h3>"; 
   			if(isset($erreur))
            {
                echo '<div class="error"><p>'.$erreur.'</p></div>';
            }
            else if(isset($reussite))
            {
                echo '<div class="reussite"><p>'.$reussite.'</p></div>';
            }
   			echo '<table>';
   			echo '<th>Titre</th>';
   			echo '<th>Renouveler</th>';
				$data=array();
				for ($i=0; $i<count($empruntes); $i++)
				{
					echo '<tr>';
					echo '<td>';
					echo $empruntes[$i]['titre'].'   -   '.$empruntes[$i]['auteur'];
					echo '</td>';
					echo '<td>';
					echo form_open('Site/mondossier', 'id="form1"');
	?>
					<input type="submit" name="Renouveler" value="Renouveler" />
					<input type="hidden" name="isbn" value="<?php echo $empruntes[$i]['id'] ?>">
	<?php
					echo form_close();
					echo '</td>';
					echo '</tr>';
				}
			echo '</table>';
				
				echo "<h3> Documents réservés </h3>"; 
				$data=array();
				for ($i=0; $i<count($reserves); $i++)
				{
					$data[$i]=$reserves[$i]['titre'].'   -   '.$reserves[$i]['auteur'];
				}
				echo ul($data);
			
			echo "<h3>Solde du compte</h3>";
			echo '<p>'.number_format($this->mindex->calculersoldeusager($_SESSION['user']['id']), 2).' $</p>';
			?>
	 

		</div><!--Fin de contenu-->

	

	<?php 
					include('footer.php');
		?>
