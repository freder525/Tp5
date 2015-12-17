	<?php 
					include('header.php');
		?>

		<div id="contenu">

		<h1>Mon profil (<?php echo (isset($pseudo) ? $pseudo : ''); ?>)</h1>

		<?php echo form_open('Site/profil', 'id="frmProfil"');?>
        	<ol>
            	<li><label for="nom">Nom : </label>
            		<input type="text" name="nom" id="nom" placeholder="Nom et prénom" value="<?php echo (isset($nom) ? $nom : ''); ?>" required="true" />
				</li>
              
            	<li><label for="courriel">Courriel</label>
            		<input type="email" name="courriel" id="courriel" placeholder="exemple@donaime.com" value="<?php echo (isset($courriel) ? $courriel : ''); ?>" required="true" />
                </li>
                
               <li><label for="telephone">Téléphone : </label>
            		<input type="tel" name="telephone" id="telephone" value="<?php echo (isset($telephone) ? $telephone : ''); ?>" />
                </li>
                
                <li><label for="adresse">Adresse : </label>
            		<input type="text" name="adresse" id="adresse" value="<?php echo (isset($adresse) ? $adresse : ''); ?>" />
                </li>
                               
                <li><label for="ville">Ville : </label>
            		<input type="text" name="ville" id="ville" value="<?php echo (isset($ville) ? $ville : ''); ?>" />
                </li>

				<li><label for="cp">Code postal : </label>
            		<input type="text" name="cp" id="cp" value="<?php echo (isset($cp) ? $cp : ''); ?>" />
                </li>

				<li><label for="pass">Ancien mot de passe : </label>
            		<input type="password" name="ancien_pass" id="ancien_pass" />
                </li>

                <li><label for="pass">Nouveau mot de passe : </label>
            		<input type="password" name="nouveau_pass" id="nouveau_pass" />
                </li>
            </ol>   
 
        <ol>
        	<li>
            	<label for="commentaire">Commentaires</label>
                <textarea id="commentaire"  name="commentaire" rows="5" required ><?php echo (isset($commentaire) ? $commentaire : ''); ?></textarea>
            
            </li>
        </ol>
        <input type="submit" value="Modifier le profil" />
		<?php echo form_close();?>

		</div><!--Fin de contenu-->

		<div id="droite">
         
        </div><!--Fin de droite-->
	<?php 
					include('footer.php');
		?>
