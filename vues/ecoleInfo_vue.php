<div class="panneau_details">
    
        <!-- Tableau d'informations sur l'école -->
    <table class="table_resultat">
            <h3> info école </h3>
                <thead>
                    <tr>
                    <?php
                        // Boucle pour parcourir les attributs du schéma de l'école
                        foreach($ecoleInfo['schema'] as $att) {
                
                            echo '<th>';
                                echo $att['nom'];
                            echo '</th>';
                
                        }
                    ?>	
                    </tr>	
                </thead>
                <tbody>

                <?php
                    // Boucle pour parcourir les n-uplets de l'école
                    foreach($ecoleInfo['instances'] as $row) {
                
                    echo '<tr>';
                    // Boucle pour parcourir chaque valeur de n-uplets de l'école
                    foreach($row as $valeur) {
                
                        echo '<td>'. $valeur . '</td>';
                    }
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>

        <!-- Formulaire pour modifier les informations de l'école -->
        <div>
        <h3>Modifier informations école</h3>
            
        <form class="bloc_commandes" method="post" action="#">	
            <label for="choixNom">Champ</label>
                <select name="champModifEC" id="champModifEC">
                    <?php 
                        // Boucle pour parcourir les attributs du schéma de l'école
                        foreach($ecoleInfo['schema'] as $att): 
                    ?>
                        <option value="<?= $att['nom'] ?>"><?= $att['nom'] ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="text" id="champSaisiEC" name="champSaisiEC" placeholder="Saisir ici" required>
                <input type="submit" name="boutonModifEC" value="Valider"/>
        </form>
        </div>
    
</div>