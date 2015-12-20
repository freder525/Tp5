<?php 
					include('header.php');
		?>
<div id='contenu'>

<?php 
    if(isset($resultat)){
    

echo form_open('admin/enregisterlivremodif', 'id="form2"');?>
  <p>
    <label>ID : <input type="hidden" name="id" value="<?php echo $resultat['id']; ?>" >     </label>
      <?php echo $resultat['id']; ?>
  </p>
  <p>
    <label>titre :    </label>
      <input type="text" name="titre"  value="<?php echo $resultat['titre']; ?>" />

  </p>
  <p>
    <label>Auteur :    </label>
      <input type="text" name="auteur"  value="<?php echo $resultat['auteur']; ?>" />
  </p>
  <p>
    <label>Année :    </label>
      <input type="text" name="annee"  value="<?php echo $resultat['annee']; ?>" />
  </p>
  <p>
    <label>Genre :    </label>
      <input type="text" name="genre"  value="<?php echo $resultat['genre']; ?>" />
  </p>
 
    <p>
      <input type="submit" name="bouton"  value="Envoyer" />
  </p>

  <?php echo form_close();?>
  </div>
	<?php 
    
    }    
    else{
        echo form_open('admin/insererLivre', 'id="form3"');?>
  <p>
    <label>ID : <input type="text" name="id" value="" >     </label>
  </p>
  <p>
    <label>Type de document :    </label>
      <input type="text" name="typeDoc"  value="" />

  </p>
  <p>
    <label>titre :    </label>
      <input type="text" name="titre"  value="" />

  </p>
  <p>
    <label>Auteur :    </label>
      <input type="text" name="auteur"  value="" />
  </p>
  <p>
    <label>Année :    </label>
      <input type="text" name="annee"  value="" />
  </p>
  <p>
    <label>Genre :    </label>
      <input type="text" name="genre"  value="" />
  </p>
 
    <p>
      <input type="submit" name="bouton"  value="Ajouter" />
  </p>


  <?php echo form_close();?>
  </div>
  <?php
    }
					include('footer.php');
		?>