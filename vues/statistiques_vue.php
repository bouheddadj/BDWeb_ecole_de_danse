
<div class="panneau">

  <div>  <!-- Bloc permettant d'afficher les statistiques -->

	<h2>Statistiques de la base</h2>


	<?php if( $message != "" ) { ?>

		<p class="notification"><?= $message ?></p>

	<?php }else{?>

	<table class="table_resultat">
		<thead>
			<tr><th>Propriété</th><th>Valeur</th></tr>
		</thead>
		<tbody>

			<tr><td>Nombre de tables</td><td><?= $stats['nbTables'] ?></td></tr>
			<tr><td>Nombre de tuples</td><td><?= $stats['nbTuples'] ?></td></tr>
	
	</tbody>
	</table>

	<table class="table_resultat">
		<thead>
			<h3>requete 1</h2>
			<tr><th>nbFed</th><th>nbCr</th><th>nbCD</th></tr>
		</thead>
		<tbody>

			<tr><td><?= $re_1['nbFed'] ?></td><td><?= $re_1['nbCR'] ?></td><td><?= $re_1['nbCD'] ?></td></tr>
	
	</tbody>
	</table>

	<table class="table_resultat">
		<thead>
			<h3>requete 2</h3>
			<tr><th>nb_ecoles</th><th>code_departement</th></tr>
		</thead>
		<tbody>

		<?php foreach($re_2 as $r2): ?>
			<tr><td><?= $r2['nb_ecoles'] ?></td><td><?= $r2['code_departement'] ?></td></tr>
		<?php endforeach; ?>

			
		</tbody>
	</table>

	<table class="table_resultat">
		<thead>
			<h3>requete 3</h3>
			<tr><th>libellé</th></tr>
		</thead>
		<tbody>
			<?php foreach($noms as $nom): ?>
			<tr><td><?= $nom ?></td></tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<table class="table_resultat">
		<thead>
			<h3>requete 4</h3>
			<tr><th>nom_ecole</th><th>vile</th><th>nb_adher</th></tr>
		</thead>
		<tbody>

		<?php foreach($re_4 as $r4): ?>
			<tr><td><?= $r4['nom_ecole'] ?></td><td><?= $r4['vile'] ?></td><td><?= $r4['nb_adher'] ?></td></tr>
		<?php endforeach; ?>

			
		</tbody>
	</table>

	<?php }?>

  </div>

</div>	