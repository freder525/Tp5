
	<?php 
					include('header.php');
		?>
	<div id="contenu">
		<div id="article">
		 <h3> Liste des livres </h3>
		<table width="900" border="1" cellspacing="0" cellpadding="5">
		  <tr>
			 <td>id</td>
			<td>titre</td>
			<td>auteur</td>
			 <td>Modif</td>
			<td>Supp</td>
		  </tr>
		  <?php for ($i=0; $i<=count($resultat)-1; $i++)  { ?>
		  <tr>
			 <td><?php echo $resultat[$i]['id']; ?></td>
			<td><?php echo $resultat[$i]['titre']; ?></td>
			<td><?php echo $resultat[$i]['auteur']; ?></td>
			<td><?php $param=$resultat[$i]['id']; echo anchor('Site/livreModif/'.htmlspecialchars_decode($param).'', 'Modif') ?> </td>
			<td><?php $param=$resultat[$i]['id']; echo anchor('Site/livreSupp/'.htmlspecialchars_decode($param).'', 'Supp') ?> </td>	
		  </tr>
		  <?php } ?>
		</table>
		</div>
</div>
	<?php 
					include('footer.php');
		?>