	<?php 
					include('header.php');
		?>
<div id='contenu'>

<?php echo form_open('site/enregisterlivremodif', 'id="form2"');?>
  <p>
    <label>ID : <input type="hidden" name="id" value="<?php echo $resultat[0]['id']; ?>" >     </label>
      <?php echo $resultat[0]['id']; ?>
  </p>
  <p>
    <label>titre :    </label>
      <input type="text" name="titre"  value="<?php echo $resultat[0]['titre']; ?>" />

  </p>
  <p>
    <label>Auteur :    </label>
      <input type="text" name="auteur"  value="<?php echo $resultat[0]['auteur']; ?>" />
  </p>
  <p>
    <label>Année :    </label>
      <input type="text" name="annee"  value="<?php echo $resultat[0]['annee']; ?>" />
  </p>
  <p>
    <label>Genre :    </label>
      <input type="text" name="genre"  value="<?php echo $resultat[0]['genre']; ?>" />
  </p>
 
    <p>
      <input type="submit" name="bouton"  value="Envoyer" />
  </p>


  <?php echo form_close();?>
  </div>
	<?php 
					include('footer.php');
		?>