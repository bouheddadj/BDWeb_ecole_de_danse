<div class="panneau">
	<div class="panneau_details">
		<p2>
            Competition VIP
        </p2>

        <?php if ($resEdition!=FALSE){?>
            <table class="table_resultat">
				</br>
				<h3> tab VIP </h3>
					<thead>
						<tr>
						<?php
							foreach($resEdition['schema'] as $att) {  // pour parcourir les attributs
					
								echo '<th>';
									echo $att['nom'];
								echo '</th>';
					
							}
						?>	
						</tr>	
					</thead>
					<tbody>

					<?php
						foreach($resEdition['instances'] as $row) {  // pour parcourir les n-uplets
					
							echo '<tr>';
							foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets
						
								echo '<td>'. $valeur . '</td>';
							}
							echo '</tr>';
					}
				?>
				</tbody>
			</table>

        <?php     }
        if(!isset($_POST["Generer Competition"])){
        ?>

        <form class="bloc_commandes" method="post" action="#">	
		    <label for="rang_palmares">Rang palmares (de 1 à 5) :</label>
            <input type="number" id="rang_palmares" name="rang_palmares" min="1" max="5"><br><br>
            
            <label for="nombre_de_comites">Nombre de comités :</label>
            <input type="number" id="nombre_de_comites" name="nombre_de_comites"><br><br>
            
            <label for="rang_min">Rang es le minimum :</label>
            <input type="radio" id="rang_min" name="rang_type" value="min"><br>
            
            <label for="rang_moyenne">Rang est la moyenne :</label>
            <input type="radio" id="rang_moyenne" name="rang_type" value="moyenne"><br><br>
            
            <input type="submit" name="Generer Competition" value="Generer">
        </form>

        <?php     }
        if(isset($_POST["Generer Competition"])){
          /*  $resCOM
            
        }
        ?>

                    <table class="table_resultat">
				</br>
				<h3> tab VIP </h3>
					<thead>
						<tr>
						<?php
							foreach($resEdition['schema'] as $att) {  // pour parcourir les attributs
					
								echo '<th>';
									echo $att['nom'];
								echo '</th>';
					
							}
						?>	
						</tr>	
					</thead>
					<tbody>

					<?php
						foreach($resEdition['instances'] as $row) {  // pour parcourir les n-uplets
					
							echo '<tr>';
							foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets
						
								echo '<td>'. $valeur . '</td>';
							}
							echo '</tr>';
					}
				?>
				</tbody>
			</table>
            */
        }
        ?>
    </div>
</div>