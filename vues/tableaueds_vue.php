<!-- Affiche un formulaire pour sélectionner un responsable -->
<div class="panneau_details">
	<div>
		<!-- Titre du formulaire -->
		<h2>Identifiez-vous ci-dessous</h2>
			
		<!-- Formulaire pour sélectionner un responsable -->
		<form class="bloc_commandes" method="post" action="#">	
			
			<!-- Étiquette du champ de sélection -->
			<label for="choixNom">Responsable</label>
			
			<!-- Liste déroulante des noms de responsables -->
			<select name="nomResp" id="nomResp">
			
				<!-- Boucle pour générer les options de la liste déroulante -->
				<?php foreach($res_names as $nom): ?>
						<option value="<?= $nom ?>"><?= $nom ?></option>
				<?php endforeach; ?>
			</select>
			
			<!-- Bouton de soumission du formulaire -->
			<input type="submit" name="boutonChoixNomResp" value="Valider"/>
		</form>
	</div>
</div>
