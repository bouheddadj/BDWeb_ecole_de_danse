<?php
//tabBordFede_controleur.php
$nomMem = executer_une_requete("SELECT M.nom, M.prenom FROM Membre M ORDER BY M.nom ASC");

if($nomMem == null || count($nomMem) == 0) {
	$message_liste = "Aucun nom de membre n'a été trouvée dans la base de données !";
}else{

    foreach($nomMem as $nr){

        $mem_names[] = strval($nr["nom"]." ".$nr["prenom"]);

    }

}

if(isset($_POST["boutonChoixNomMembre"])){        			
	$nomM_prenomM = $_POST["nomMembre"];
	$nomM_prenomM_array = explode (" ", $nomM_prenomM);
	$nomM = $nomM_prenomM_array[0];
	$prenomM = $nomM_prenomM_array[1];
	
	$reqInfoFede=" SELECT F.nom,F.sigle,F.niveau, A.numVoie, A.rue, A.Ville, A.codePost";
	$reqInfoFede=$reqInfoFede." FROM Membre M JOIN Fédération F ON F.idF=M.idF JOIN Adresse A ON F.idAd=A.idAd";
	$reqInfoFede=$reqInfoFede." WHERE M.nom=".'"'.$nomM.'"'." AND M.prenom=".'"'.$prenomM.'"';
	
	$resultatInfoFede=executer_une_requete2($reqInfoFede);
	
	$requeteIDFede=" SELECT M.idF FROM Membre M JOIN Fédération F ON F.idF=M.idF";
	$requeteIDFede=$requeteIDFede." JOIN Adresse A ON F.idAd=A.idAd WHERE M.nom=".'"'.$nomM.'"'." AND M.prenom=".'"'.$prenomM.'"';
	
	$resIDFede="";
	$resIDFede = executer_une_requete2($requeteIDFede);
	$IDFede="pas init";
	if($resIDFede!=FALSE){
		foreach($resIDFede['instances'] as $row) {  // pour parcourir les n-uplets
			foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets
				$IDFede=$valeur;
			}
		}

	}

	if($IDFede!="pas init"){
		
		$reqNbCom="SELECT COUNT(DISTINCT C.idComité) AS nb_comites FROM Comités C WHERE C.idF='.$IDFede.'";
		$resultatNbCom=executer_une_requete2($reqNbCom);

		$reqLCompet="SELECT DISTINCT C.libellé,C.idComp_code,C.niveau FROM Compétition C WHERE C.idF=".$IDFede."";
		$resultatLCompet=executer_une_requete2($reqLCompet);

		$reqNdAdCompet="SELECT (COUNT(DISTINCT A.numLicence)) AS nombre_adherents_participe_compet
		FROM Adhérent A JOIN Ecole_de_danse E ON A.idED=E.idED
		WHERE E.idF=".$IDFede." AND A.numLicence IN(
		SELECT C.numLicence_2
		FROM participe_edition_couple PE JOIN Couple C ON PE.idCouple=C.idCouple 
		UNION
		SELECT C.numLicence_1
		FROM participe_edition_couple PE JOIN Couple C ON PE.idCouple=C.idCouple 
		UNION
		SELECT DISTINCT CG.numLicence
		FROM Partcipe_edition PG JOIN composition_groupe CG ON PG.idGroupe=CG.idGroupe
		)";

		$resultatNdAdCompet=executer_une_requete2($reqNdAdCompet);

		


	}


}



?>
