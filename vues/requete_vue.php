<div class="bloc_requete">
<h2>Recherche dans la base</h2>
<form method="post" action="#">

    <label for="espace_requete">Saisir une requête</label>
    <br/>
    <textarea id="espace_requete" name="espace_requete" placeholder="SELECT ... FROM ... WHERE ..." required></textarea>
    <br/><br/>
    <input type="submit" name="boutonExecuterRequete" value="Exécuter"/>
</form>

</div>


<div class="panneau">
    <div class="panneau_details">


        <?php if( isset($resultats) ) {

             if( is_array($resultats) ) { ?>

                <h3>Résultat de la requête</h3>
                <p><?php echo $requete;  ?></p>

                <table class="table_resultat">
                    <thead>
                        <tr>
                        <?php
                            //var_dump($resultats);
                            foreach($resultats['schema'] as $att) {  // pour parcourir les attributs

                                echo '<th>';
                                    echo $att['nom'];
                                echo '</th>';

                            }
                        ?>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        foreach($resultats['instances'] as $row) {  // pour parcourir les n-uplets

                        echo '<tr>';
                        foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets

                            echo '<td>'. $valeur . '</td>';
                        }
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>

        <?php }else{ if($message_requete!=null) ?>

            <p class="notification"><?= $message_requete ?></p>

        <?php } 

    }?>
</div>
</div>