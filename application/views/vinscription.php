	<?php 
					include('header.php');
		?>

		<div id="contenu">
	
		<?php echo form_open('site/inscriptionamis', 'id="form1"');?>
        	<ol>
            	<li><label for="name">Nom : </label>
            		<input type="text" name="name" id="name" placeholder="Nom et prénom" required="true" />
 
				</li>
              
            	<li><label for="email">Courriel</label>
            		<input type="email" name="email" id="email" placeholder="exemple@donaime.com" required="true" />
                </li>
                
               <li><label for="tel">Téléphone : </label>
            		<input type="tel" name="tel" id="tel" />
                </li>
                
                <li><label for="adresse">Adresse : </label>
            		<input type="text" name="adresse" id="adresse" />
                </li>
                               
                <li><label for="ville">Ville : </label>
            		<input type="text" name="ville" id="ville" />
					
                </li>
				<li><label for="cp">Code postal : </label>
            		<input type="text" name="cp" id="cp" />
                </li>
				
				<li><label for="cp">Pseudo : </label>
            		<input type="text" name="pseudo" id="pseudo" />
                </li>
				<li><label for="cp">Mot de passe : </label>
            		<input type="password" name="pass" id="pass" />
                </li>
            </ol>   
 
        <ol>
        	<li>
            	<label for="renseignements">Commentaires</label>
                <textarea id="renseignements"  name="commentaire" rows="5" required ></textarea>
            
            </li>
        </ol>
        <input type="submit" value="S'inscrire" />
		<?php echo form_close();?>

		</div><!--Fin de contenu-->

		<div id="droite">
         
        </div><!--Fin de droite-->
	<?php 
					include('footer.php');
		?>
