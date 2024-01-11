<?php
//tabBordFede_vue.php
?>
<div class="panneau">
	<div class="panneau_details">
		<?php 
			if(!isset($_POST["boutonChoixNomMembre"])){        // ON CREE UN CONTROLEUR ET UNE VUE POUR CHANGER CE QUI EST DANS LE CARR2 DU CENTRE
			?>
			<h2>Identifiez-vous ci-dessous</h2>
			
		<form class="bloc_commandes" method="post" action="#">	
			
			<label for="choixNom">Membre</label>
			<select name="nomMembre" id="nomMembre">
			
				<?php foreach($mem_names as $nom): ?>
						<option value="<?= $nom ?>"><?= $nom ?></option>
					<?php endforeach; ?>
			</select>
			
			<input type="submit" name="boutonChoixNomMembre" value="Valider"/>
		</form>
			
			
			
		<?php 	} ?>
		
		
		
		<?php 
			if(isset($_POST["boutonChoixNomMembre"])){       
			echo "<p2>  Choix NOM MEMBRE  </p2>";
			echo "<p2>  NOM MEMBRE :   ".$_POST["nomMembre"]." </p2>";
			echo "<p2>  NOM MEMBRE :   ".$nomM."  Prenom ".$prenomM." </p2>";
			//echo "<p2>  REQUETE ".$reqInfoFede." </p2>";
			//echo "<p2> $reqInfoFede </p2>"; $resultatLCompet
	
			}
		?>
		</br>
		<?php if(isset($_POST["boutonChoixNomMembre"])){if( $resultatInfoFede!=FALSE ) { ?>
			<form class="bloc_commandes" method="post" action="index.php?f=tabBordFede&p=membre">	
					<input type="submit" name="Gestion_membres" value="Gestion_membres"/>
					<input type="submit" name="Gestion_iComite" value="Gestion_iComite"/>
					<input type="submit" name="Gestion_iFede" value="Gestion_iFede"/>
					<input type="submit" name="Gestion_Compet" value="Gestion_Compet"/>
			</form>



		<table class="table_resultat">
				</br>
				<h3> Infos Fédération </h3>
					<thead>
						<tr>
						<?php
						echo $reqInfoFede;
							///var_dump($resultats);
							foreach($resultatInfoFede['schema'] as $att) {  // pour parcourir les attributs
					
								echo '<th>';
									echo $att['nom'];
								echo '</th>';
					
							}
						?>	
						</tr>	
					</thead>
					<tbody>

					<?php
						foreach($resultatInfoFede['instances'] as $row) {  // pour parcourir les n-uplets
					
							echo '<tr>';
							foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets
						
								echo '<td>'. $valeur . '</td>';
							}
							echo '</tr>';
					}
				?>
				</tbody>
			</table>


			


		<p3>
		<?php echo $IDFede."  id Fede";	
		 ?>

		<?php if($IDFede!="pas init") { ?>

		
			

		<table class="table_resultat">
				</br>
				<h3> Nombre de comités </h3>
					<thead>
						<tr>
						<?php
							////var_dump($resultats);
							foreach($resultatNbCom['schema'] as $att) {  // pour parcourir les attributs
					
								echo '<th>';
									echo $att['nom'];
								echo '</th>';
					
							}
						?>	
						</tr>	
					</thead>
					<tbody>

					<?php
						foreach($resultatNbCom['instances'] as $row) {  // pour parcourir les n-uplets
					
							echo '<tr>';
							foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets
						
								echo '<td>'. $valeur . '</td>';
							}
							echo '</tr>';
					}
				?>
				</tbody>
			</table>

			<?php if(  $resultatLCompet!=FALSE ) { ?>
				

				<table class="table_resultat">
				</br>
				<h3> Nombre de comités </h3>
					<thead>
						<tr>
						<?php
							////var_dump($resultats);
							foreach($resultatLCompet['schema'] as $att) {  // pour parcourir les attributs
					
								echo '<th>';
									echo $att['nom'];
								echo '</th>';
					
							}
						?>	
						</tr>	
					</thead>
					<tbody>

					<?php
						foreach($resultatLCompet['instances'] as $row) {  // pour parcourir les n-uplets
					
							echo '<tr>';
							foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets  
						
								echo '<td>'. $valeur . '</td>';
							}
							echo '</tr>';
					}
				?>
				</tbody>
			</table>


		<?php }  
		 if(  $resultatNdAdCompet!=FALSE ) { ?>

			<table class="table_resultat">
				</br>
				<h3> Le nombre d’adhérents ayant participé à une compétition  </h3>
					<thead>
						<tr>
						<?php
							////var_dump($resultats);
							foreach($resultatNdAdCompet['schema'] as $att) {  // pour parcourir les attributs
					
								echo '<th>';
									echo $att['nom'];
								echo '</th>';
					
							}
						?>	
						</tr>	
					</thead>
					<tbody>

					<?php
						foreach($resultatNdAdCompet['instances'] as $row) {  // pour parcourir les n-uplets
					
							echo '<tr>';
							foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets  
						
								echo '<td>'. $valeur . '</td>';
							}
							echo '</tr>';
					}
				?>
				</tbody>
			</table>


		<?php //GESTION MEMBRES
		} } } }
		?>

	<?php if(isset($_POST["boutonChoixNomMembre"])){if( $resultatInfoFede!=FALSE ) { ?>
	<?php //GESTION MEMBRES 
	} }	?>
		
	</div>
</div>