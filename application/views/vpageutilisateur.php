
	<?php 
					include('header.php');
		?>

		<div id="contenu">
   	<?php 	echo "<h3> Documents empruntés </h3>"; 
				$data=array();
				for ($i=0; $i<count($empruntes); $i++)
				{
					$data[$i]=$empruntes[$i]['titre'].'   -   '.$empruntes[$i]['auteur'];
				}
				echo ul($data);
				
				echo "<h3> Documents réservés </h3>"; 
				$data=array();
				for ($i=0; $i<count($reserves); $i++)
				{
					$data[$i]=$reserves[$i]['titre'].'   -   '.$reserves[$i]['auteur'];
				}
				echo ul($data);
			
			?>
	 

		</div><!--Fin de contenu-->

	

	<?php 
					include('footer.php');
		?>
