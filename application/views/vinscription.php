	<?php 
					include('header.php');
		?>

		<div id="contenu">
		<h2>Inscription</h2>
		<?php echo form_open('Site/inscription', 'id="form1"');?>
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
				
				<li><label for="pseudo">Pseudo : </label>
            		<input type="text" name="pseudo" id="pseudo" />
                    <?php echo form_error('pseudo', '<div class="error">', '</div>'); ?>
                </li>
				<li><label for="pass">Mot de passe : </label>
            		<input type="password" name="pass" id="pass" />
                </li>
            </ol>   
        <input class="boutton" type="submit" value="S'inscrire" />
		<?php echo form_close();?>

		</div><!--Fin de contenu-->

		<div id="droite">
         
        </div><!--Fin de droite-->
	<?php 
					include('footer.php');
		?>
