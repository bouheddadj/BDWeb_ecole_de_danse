<div class="panneau">
    <div>  <!-- Bloc permettant d'afficher les statistiques -->
	<div>	
		<form class="bloc_commandes" method="post" action="index.php?f=tableaueds&p=adherent">	
			<input type="submit" name="gestionAdher" value="gestion des adhérents de l’école"/>
			<input type="hidden" name="p" value="adherent"/>
		</form>
		<form class="bloc_commandes" method="post" action="index.php?f=tableaueds&p=info">	
			<input type="submit" name="gestionInfo" value="gestion des informations de l’école"/>
			<input type="hidden" name="p" value="adherent"/>
		</form>
	</div>
    <p class="accueil_description"> NOM CHOIST Date 23/04
    </p>
    
    
    <?php if( $resnomEcole!=FALSE ) { ?>
    <table class="table_resultat">
			<h3> info ecole <?php echo $IDEcole ;?> </h3>
				<thead>
					<tr>
					<?php
						////var_dump($resultats);
						foreach($resnomEcole['schema'] as $att) {  // pour parcourir les attributs
				
							echo '<th>';
								echo $att['nom'];
							echo '</th>';
				
						}
					?>	
					</tr>	
				</thead>
				<tbody>

				<?php
					foreach($resnomEcole['instances'] as $row) {  // pour parcourir les n-uplets
				
					echo '<tr>';
					foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets
				
						echo '<td>'. $valeur . '</td>';
					}
					echo '</tr>';
				}
			?>
			</tbody>
		</table>

	<?php }?>
	
	<?php if( $resListeEmp!=FALSE ) { ?>
    <table class="table_resultat">
			</br>
			<h3> Liste employés </h3>
				<thead>
					<tr>
					<?php
						////var_dump($resultats);
						foreach($resListeEmp['schema'] as $att) {  // pour parcourir les attributs
				
							echo '<th>';
								echo $att['nom'];
							echo '</th>';
				
						}
					?>	
					</tr>	
				</thead>
				<tbody>

				<?php
					foreach($resListeEmp['instances'] as $row) {  // pour parcourir les n-uplets
				
					echo '<tr>';
					foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets
				
						echo '<td>'. $valeur . '</td>';
					}
					echo '</tr>';
				}
			?>
			</tbody>
		</table>

	<?php }?>
	<?php if( $resNbAd!=FALSE ) { ?>
    <table class="table_resultat">
			</br>
			<h3> Nombre d'adhérents cette année </h3>
				<thead>
					<tr>
					<?php
						////var_dump($resultats);
						foreach($resNbAd['schema'] as $att) {  // pour parcourir les attributs
				
							echo '<th>';
								echo $att['nom'];
							echo '</th>';
				
						}
					?>	
					</tr>	
				</thead>
				<tbody>

				<?php
					foreach($resNbAd['instances'] as $row) {  // pour parcourir les n-uplets
				
						echo '<tr>';
						foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets
					
							echo '<td>'. $valeur . '</td>';
						}
						echo '</tr>';
				}
			?>
			</tbody>
		</table>

	<?php }?>
	
	
	<?php if( $resNbAdHist!=FALSE ) { ?>
    <table class="table_resultat">
			</br>
			<h3> Nombre d'adhérents au cours des années <h3>
				<thead>
					<tr>
					<?php
						////var_dump($resultats);
						foreach($resNbAdHist['schema'] as $att) {  // pour parcourir les attributs
				
							echo '<th>';
								echo $att['nom'];
							echo '</th>';
				
						}
					?>	
					</tr>	
				</thead>
				<tbody>

				<?php
					foreach($resNbAdHist['instances'] as $row) {  // pour parcourir les n-uplets
				
						echo '<tr>';
						foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets
					
							echo '<td>'. $valeur . '</td>';
						}
						echo '</tr>';
				}
			?>
			</tbody>
		</table>

	<?php }?>
	

	
	<?php if( $resLCours!=FALSE ) { ?>
    <table class="table_resultat">
			</br>
			<h3> Liste des cours proposés dans l’école </h3>
				<thead>
					<tr>
					<?php
						////var_dump($resultats);
						foreach($resLCours['schema'] as $att) {  // pour parcourir les attributs
				
							echo '<th>';
								echo $att['nom'];
							echo '</th>';
				
						}
					?>	
					</tr>	
				</thead>
				<tbody>

				<?php
					foreach($resLCours['instances'] as $row) {  // pour parcourir les n-uplets
				
						echo '<tr>';
						foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets
					
							echo '<td>'. $valeur . '</td>';
						}
						echo '</tr>';
				}
			?>
			</tbody>
		</table>

	<?php }?>
	

	
	<?php if( $resNbAdCompet!=FALSE ) { ?>
    <table class="table_resultat">
			</br>
			<h3> le nombre d’adhérents ayant participé à une compétition </h3>
				<thead>
					<tr>
					<?php
						////var_dump($resultats);
						foreach($resNbAdCompet['schema'] as $att) {  // pour parcourir les attributs
				
							echo '<th>';
								echo $att['nom'];
							echo '</th>';
				
						}
					?>	
					</tr>	
				</thead>
				<tbody>

				<?php
					foreach($resNbAdCompet['instances'] as $row) {  // pour parcourir les n-uplets
				
						echo '<tr>';
						foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets
					
							echo '<td>'. $valeur . '</td>';
						}
						echo '</tr>';
				}
			?>
			</tbody>
		</table>

	<?php }?>


    </div>
</div>