<div class="panneau">
	<div class="panneau_details">
		<h2>Gestion MEMBRES</h2>

		<?php 
			if(!isset($_POST["boutonChoixNomMembrePourModifier"])){
				// ON CREE UN CONTROLEUR ET UNE VUE POUR CHANGER CE QUI EST DANS LE CARR2 DU CENTRE
		?>
			<h2>Choisir membre ++</h2>

			<form class="bloc_commandes" method="post" action="#">	
				<label for="choixNom">Membre</label>
				<select name="nomMembreModif" id="nomMembreModif">
					<?php foreach($mem_names as $nom): ?>
						<option value="<?= $nom ?>"><?= $nom ?></option>
					<?php endforeach; ?>
				</select>

				<input type="submit" name="boutonChoixNomMembrePourModifier" value="Valider"/>
			</form>
		<?php 
			} 
		?>


        <?php 
			if(isset($_POST["boutonChoixNomMembrePourModifier"])){  
		?>
			Visualiser le nom, le prénom et la date de naissance, tels que définis actuellement

			<?php if( $resultatInfoMem!=False){ ?>
				<table class="table_resultat">
					<h3> Infos Membre selectionné </h3>
					<thead>
						<tr>
							<?php foreach($resultatInfoMem['schema'] as $att) { ?>
								<th><?php echo $att['nom']; ?></th>
							<?php } ?>	
						</tr>	
					</thead>
					<tbody>
						<?php foreach($resultatInfoMem['instances'] as $row) { ?>
							<tr>
								<?php foreach($row as $valeur) { ?>
									<td><?php echo $valeur; ?></td>
								<?php } ?>
							</tr>
						<?php } ?>
					</tbody>
				</table>

				<h2>ajouter un nouveau membre</h2>

				<form class="bloc_commandes" method="post" action="#">	
					<label for="nom"> Rentrez le nom </label>
					<input type="text" name="nom" id="nom" required>
					</br>
					<label for="prenom"> Rentrez le prenom </label>
					<input type="text" name="prenom" id="prenom" required>
					</br>
					<label for="idFAjout"> Rentrez le idF </label>
					<input type="number" name="idFAjout" id="idFAjout" required>
					</br>
					<label for="datenaiss"> Rentrez la date de naissance (optionnel) </label>
					<input type="date" name="datenaiss" id="datenaiss" >
					</br>
					<input type="submit" name="AjouterMembre" value="Valider"/>
				</form>
			<?php } ?>
		<?php } ?>


		<?php
		if(isset($_POST["AjouterMembre"])){
			//echo"<h3> modif mercredi $reqAjoutMem ajouer membre </h3>";
			if($ajouteMEM==0){
				echo "<h3>Ajout non effectué<h3>";
			}else echo "<h3>Ajout effectué<h3>";
			
		}?>

		<?php if(isset($_POST["boutonChoixNomMembrePourModifier"])) { ?>
        <div>
		<h3>Modifier valeurs adhérents</h3>
			
        <form class="bloc_commandes" method="post" action="#">	
            <label for="choixNom">Champ</label>
                <select name="champModif" id="champModif">
                    <?php foreach($infoMem['schema'] as $att): ?>
                        <option value="<?= $att['nom'] ?>"><?= $att['nom'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="text" id="champSaisi" name="champSaisi" placeholder="Saisir ici" required>
                  <input type="submit" name="boutonModifMembre" value="Valider"/>
        </form>
	    </div>
        <?php }
		if(isset($_POST["boutonModifMembre"])){
			if($modifMem==0){
				echo "<h3>Modification non effectué<h3>";
			}else echo "<h3>Modification  effectué<h3>";
			//echo "<p2> id session ".$_SESSION['idMembreAModif']."<p2>";
			//echo $requp;
		}
		?>

		


		
	</div>
</div>