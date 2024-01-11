<!-- Panneau affichant la liste des adhérents, avec un formulaire permettant de les sélectionner -->
<div class="panneau_details">
	<div>
		<h2>Liste des adhérents</h2>
			
		<form class="bloc_commandes" method="post" action="#">	
			
			<label for="choixNom">Adhérent</label>
			<select name="nomAdher" id="nomAdher">
			
				<?php foreach($adr_noms as $nom): ?>
						<option value="<?= $nom ?>"><?= $nom ?></option>
					<?php endforeach; ?>
			</select>
			
			<input type="submit" name="boutonChoixAdher" value="Sélectionner"/>
		</form>
	</div>

    <!-- Si un adhérent est sélectionné, afficher son nom -->
    <?php
            if(isset($_POST['nomAdher'])){
                echo "<p3>nomAdher</p3>";
            }
    ?>
    
    <!-- Si le bouton "Sélectionner" est cliqué, afficher les informations de l'adhérent -->
    <?php if(isset($_POST['boutonChoixAdher'])) { ?>
        <table class="table_resultat">
                <h3> info adhérent </h3>
                    <thead>
                        <tr>
                        <?php
                            ////var_dump($resultats);
                            foreach($infoAdher['schema'] as $att) {  // pour parcourir les attributs
                    
                                echo '<th>';
                                    echo $att['nom'];
                                echo '</th>';
                    
                            }
                        ?>	
                        </tr>	
                    </thead>
                    <tbody>

                    <?php
                        foreach($infoAdher['instances'] as $row) {  // pour parcourir les n-uplets
                    
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

        <!-- Si un adhérent est sélectionné, afficher le formulaire pour modifier ses valeurs -->
        <?php if(isset($_POST['boutonChoixAdher'])) { ?>
        <div>
		<h3>Modifier valeurs adhérents</h3>
			
        <form class="bloc_commandes" method="post" action="index.php?f=tableaueds&p=adherent">	
            <label for="choixNom">Champ</label>
                <select name="champModif" id="champModif">
                    <?php foreach($infoAdher['schema'] as $att): ?>
                        <option value="<?= $att['nom'] ?>"><?= $att['nom'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="text" id="champSaisi" name="champSaisi" placeholder="Saisir ici" required>
                <input type="submit" name="boutonModif" value="Valider"/>
        </form>
        
	    </div>
    <?php }?>

    <div>
		<h3>Ajouter un adhérent</h3>
			
        <form class="bloc_commandes" method="post" action="#">	
                <input type="text" id="NL" name="NL" placeholder="numéro de licence" required>
                <input type="text" id="NM" name="NM" placeholder="nom" required>
                <input type="text" id="PM" name="PM" placeholder="prenom" required>
                <input type="date" id="DN" name="DN" placeholder="date de naissance" required>
                <input type="text" id="IA" name="IA" placeholder="l'idAd" required>
                <input type="text" id="IE" name="IE" placeholder="l'idED" required>
                <input type="submit" name="boutonAjoutAD" value="Valider"/>
        </form>
        
	</div>
    
</div>