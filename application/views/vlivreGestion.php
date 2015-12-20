
	<?php 
					include('header.php');
		?>
	<div id="contenu">
		<div id="article">
		 <h3> Liste des livres </h3>
		<table width="900" border="1" cellspacing="0" cellpadding="5">
		  <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Modif</th>
            <th>Supp</th>
		  </tr>
		  <?php for ($i=0; $i<=count($resultat)-1; $i++)  { ?>
		  <tr>
			 <td><?php echo $resultat[$i]['id']; ?></td>
			<td><?php echo $resultat[$i]['titre']; ?></td>
			<td><?php echo $resultat[$i]['auteur']; ?></td>
			<td><?php $param=$resultat[$i]['id']; echo anchor('Admin/livreModif/'.htmlspecialchars_decode($param).'', 'Modif') ?> </td>
			<td><?php $param=$resultat[$i]['id']; echo anchor('Admin/livreSupp/'.htmlspecialchars_decode($param).'', 'Supp') ?> </td>	
		  </tr>
		  <?php } ?>
		</table>
         <?php
         echo form_open('Admin/ajouterLivre', 'id="form3"');
			?>
					<input type="submit" name="Ajouter" value="Ajouter" />
			<?php 
					echo form_close();
			?>
		</div>
</div>
	<?php 
					include('footer.php');
		?>