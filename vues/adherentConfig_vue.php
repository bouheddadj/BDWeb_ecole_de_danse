<div class="panneau_details">
	<div>
		<h2>Liste des adhérents</h2>
			
		<!-- Formulaire de sélection de l'adhérent -->
		<form class="bloc_commandes" method="post" action="#">	
			
			<label for="choixNom">Adhérent</label>
			<select name="nomAdher" id="nomAdher">
			
				<!-- Boucle pour afficher les noms des adhérents dans la liste déroulante -->
				<?php foreach($adr_noms as $nom): ?>
						<option value="<?= $nom ?>"><?= $nom ?></option>
					<?php endforeach; ?>
			</select>
			
			<input type="submit" name="boutonChoixAdher" value="Sélectionner"/>
		</form>
	</div>
    
    <!-- Affichage des informations de l'adhérent sélectionné -->
    <?php if(isset($_POST['boutonChoixAdher'])) { ?>
        <table class="table_resultat">
                <h3> info adhérent </h3>
                    <thead>
                        <tr>
                        <?php
                            // Boucle pour afficher les attributs de l'adhérent
                            foreach($infoAdher['schema'] as $att) {  
                    
                                echo '<th>';
                                    echo $att['nom'];
                                echo '</th>';
                    
                            }
                        ?>	
                        </tr>	
                    </thead>
                    <tbody>

                    <?php
                        // Boucle pour afficher les valeurs de l'adhérent
                        foreach($infoAdher['instances'] as $row) {  
                    
                        echo '<tr>';
                        foreach($row as $valeur) { // Boucle pour afficher chaque valeur de l'adhérent
                    
                            echo '<td>'. $valeur . '</td>';
                        }
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>

        <?php }?>

        <!-- Formulaire pour modifier les valeurs de l'adhérent sélectionné -->
        <?php if(isset($_POST['boutonChoixAdher'])) { ?>
        <div>
		<h3>Modifier valeurs adhérents</h3>
			
        <form class="bloc_commandes" method="post" action="#">	
            <label for="choixNom">Champ</label>
                <select name="champModif" id="champModif">
                    <!-- Boucle pour afficher les champs de l'adhérent -->
                    <?php foreach($infoAdher['schema'] as $att): ?>
                        <option value="<?= $att['nom'] ?>"><?= $att['nom'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="text" id="champSaisi" name="champSaisi" placeholder="Saisir ici" required>
                <input type="submit" name="boutonModif" value="Valider"/>
        </form>
        
	    </div>
        <?php }?>
