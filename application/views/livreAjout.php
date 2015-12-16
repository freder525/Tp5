<?php
require_once("../connexionMysql.inc.php");
if(isset($_POST['bouton']))
{
	$requete="INSERT INTO livre SET id='".$_POST['id']."', titre='".$_POST['titre']."',  auteur='".$_POST['auteur']."', annee='".$_POST['annee']."', genre='".$_POST['genre']."' ";
	$resultat=mysql_query($requete);
    header("Location:livreGestion.php");
}

?>
	<?php 
					include('header.php');
		?>
<a href="livreGestion.php?logout=ok" >Deconnexion</a>
<br/>

<form id="monform" name="form1" method="post" enctype="multipart/form-data" action="livreAjout.php">
  <p>
    <label>ID :
      <input type="text" name="id"  />
    </label>
  </p>
  <p>
    <label>Titre :
      <input type="text" name="titre"  />
    </label>
  </p>
  <p>
    <label> Auteur:
      <input type="text" name="auteur"  />
    </label>
  </p>
  
  <p>
  <label> Année
  <input type="text" name="annee" />
  </label>
  </p>
  
  <p>
  <label> Genre
  <input type="text" name="genre" />
  </label>
  </p>
  
  <p>
    <label>
      <input type="submit" name="bouton"  value="Envoyer" />
    </label>
  </p>
</form>

	<?php 
					include('footer.php');
		?>