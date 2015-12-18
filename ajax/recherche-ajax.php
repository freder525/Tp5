<?php

// Programmeur : dominique Richard
// Nom Fichier : recherche.php
// Date: 2015-03-31
$msgErreur = null;
if (isset ( $_POST ["recherche"] ))
{
	
	// L'id que le carrousel désire
	$recherche = $_POST ["recherche"];

	try
	{
		
		//$reqCritique = 'SELECT * FROM livre WHERE titre = :recherche';
		//$prepReqCritique = $connBD->prepare ( $reqCritique );
		//$prepReqCritique->execute ( array ("recherche" => $recherche) );
		//$lstLivre = $prepReqCritique->fetch ();
		
	
	}
	catch ( PDOException $e )
	{
		exit ( "Erreur lors de l'exécution de la requête SQL :<br />\n" . $e->getMessage () . "<br />\nREQUÊTE = SELECT" );
	}
	
	if ($prepReq->rowCount () == 0)
	{
		$msgErreur = "Le film n'existe pas.";
	}
	else
	{
		$lstLivre = "[\n";
		while ( $info = $prepReq->fetch () )
		{
			//Construit l'objet JSON
			$id = $info->id;
			$titre = $info->titre;
			$genre = $info->genre;
			$annee = $info->annee;
			
			$lstLivre .= "\t{\n";
			$lstLivre .= "\t\t\"id\": \"$id\",\n";
			$lstLivre .= "\t\t\"titre\": \"$titre\",\n";
			$lstLivre .= "\t\t\"genre\": \"$genre\",\n";
			$lstLivre .= "\t\t\"annee\": \"$annee\"\n";
			$lstLivre .= "\t},\n";
		}
		$lstLivre .= "]";
		
		//Enleve la dernière virgule
		$posDerniereVirgule = strrpos ( $lstLivre, "," );
		$lstLivre = substr_replace ( $lstLivre, "", $posDerniereVirgule, 1 );
		
		echo $lstLivre;
	}
	
	$prepReq->closeCursor ();
	
	$connBD = null;
}
else
{
	$msgErreur = "Le paramètre \"film\" n'a pas été fourni avec la requête.";
}

// Envoie l'objet JSON du message d'erreur
if ($msgErreur != null)
{
	echo "{\n";
	echo "\t\"erreur\":\n";
	echo "\t{\n";
	echo "\t\t\"message\": \"" . str_replace ( "\"", "\\\"", $msgErreur ) . "\"\n";
	echo "\t}\n";
	echo "}\n";
}

?>