<?php 
$message = "";

// recupération de la liste des tables
$stats = get_statistiques();
$re_1 = executer_une_requete("SELECT COUNT(DISTINCT F.idF) AS nbFed, COUNT(DISTINCT R.idComité) AS nbCR , COUNT(DISTINCT D.idComité) AS nbCD FROM Fédération F, Regional R , Departemental D");
$re_3 = executer_une_requete("SELECT c.nom from Comités c join Fédération f on c.idF = f.idf  where f.nom = 'Fédération Française de Danse' order by c.nom DESC");
$re_2 = executer_une_requete("SELECT COUNT(*) AS nb_ecoles, CASE WHEN codePost LIKE '97%' THEN SUBSTRING(codePost, 1, 3) ELSE SUBSTRING(codePost, 1, 2) END AS code_departement FROM Ecole_de_danse E INNER JOIN Adresse A ON E.idAD = A.idAd GROUP BY code_departement");
$re_4 = executer_une_requete("SELECT E.nom AS nom_ecole, AD.Ville AS vile, COUNT(DISTINCT A.idAd) AS nb_adher FROM Ecole_de_danse E JOIN Adhérent A  ON A.idED=E.idED JOIN Adresse AD GROUP BY E.idED ORDER BY nb_adher DESC LIMIT 5");



if($stats == null || count($stats) == 0) {
	$message .= "Aucune statistique n'est disponible!";
}else{

	$nbTables = 0;
	$nbTuples = 0;

	$nbFed = 0;
	$nbCR = 0;
	$nbCD = 0;

	$nb_ecoles = 0;
	$code_departement = "!";

	$nom = "!";

	$nom_ecole = "!";
	$vile = "!";
	$nb_adher = 0;


	 foreach($stats as $s) {
		
	 	$nbTables++;
	 	$nbTuples += intval($s['table_rows']);

	 	$stats = array('nbTables' => $nbTables, 'nbTuples' => $nbTuples );
		$stats = array('nbTables' => $nbTables, 'nbTuples' => $nbTuples );
	 }

	 foreach($re_1 as $r1){

		$nbFed = intval($r1['nbFed']);
		$nbCR = intval($r1['nbCR']);
		$nbCD = intval($r1['nbCD']);


		$re_1 = array('nbFed'=>$nbFed, 'nbCR'=>$nbCR, 'nbCD'=>$nbCD);
	 }

	 foreach($re_2 as $r2){
		$nb_ecoles = intval($r2['nb_ecoles']);
		$code_departements[] = strval($r2["code_departement"]);
	 }

	 foreach($re_4 as $r4){
		$nom_ecoles[] = strval($r4["nom_ecole"]);
		$viles[] = strval($r4["vile"]);
		$nb_adher = intval($r4['nb_adher']);
	}

	 foreach($re_3 as $r3){
        $noms[] = strval($r3["nom"]);
    }
}
?>
