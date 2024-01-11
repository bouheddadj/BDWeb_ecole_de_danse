<!--
recuperer nom ecole adresse
nom fondateurs
liste employes
-->


<?php 
//echo "nom  :".$_POST['nomResp'];

//echo "nom  :".$_POST['nomResp'];
$nomR_prenomR = $_POST['nomResp'];
$nomR_prenomR_array = explode (" ", $nomR_prenomR);
$nomR = $nomR_prenomR_array[0];
$prenomR = $nomR_prenomR_array[1];
$requeteInfoEcole="SELECT E.nom AS nom_ecole, A.numVoie, A.rue, A.Ville, A.codePost, E.nom_fondateurs";
$requeteInfoEcole=$requeteInfoEcole." FROM Travaille T JOIN Employé Em ON Em.idEm=T.idEm JOIN Ecole_de_danse E ON E.idED=T.idED JOIN Adresse A ON A.idAd=E.idAd ";
$requeteInfoEcole=$requeteInfoEcole." WHERE T.idEm = (SELECT Em.idEm FROM Employé Em WHERE Em.nom='$nomR' and Em.prenom='$prenomR')";
$resnomEcole="";
$resnomEcole = executer_une_requete2($requeteInfoEcole);




$nomres=$_POST['nomResp'];
$requeteIEcoleIDE="SELECT E.idED FROM Travaille T JOIN Employé Em ON Em.idEm=T.idEm JOIN Ecole_de_danse E ON E.idED=T.idED WHERE T.idEm = (SELECT Em.idEm FROM Employé Em WHERE Em.nom='$nomR' and Em.prenom='$prenomR')";


$resIDEcole="";
$resIDEcole = executer_une_requete2($requeteIEcoleIDE);

$IDEcole="pas init";
if($resIDEcole!= FALSE){

    foreach($resIDEcole['instances'] as $row) {  // pour parcourir les n-uplets
        foreach($row as $valeur) { // pour parcourir chaque valeur de n-uplets
            $IDEcole=$valeur;
        }
    }
}
$resListeEmp="";
if($IDEcole!="pas init"){
    $reqListeEmp='SELECT Em.nom, Em.prenom FROM Employé Em JOIN Travaille T ON Em.idEm=T.idEm    ';
    $reqListeEmp=$reqListeEmp."     WHERE T.idED=".$IDEcole;

    $resListeEmp=executer_une_requete2($reqListeEmp);
	
	
	
	$reqNbAd="SELECT (COUNT(DISTINCT A.numLicence)) AS nombre_adherents  
FROM Adhérent A JOIN Certificat_medical C ON A.numLicence=C.numLicence
WHERE A.idED=$IDEcole AND C.année=$annee_creation";
	
	
	$resNbAd=executer_une_requete2($reqNbAd);
	
	$reqNbAdHist="SELECT (COUNT(DISTINCT A.numLicence)) AS nombre_adherents  
FROM Adhérent A JOIN Certificat_medical C ON A.numLicence=C.numLicence
WHERE A.idED=$IDEcole";
	
	
	$resNbAdHist=executer_une_requete2($reqNbAdHist);
	
	//liste des cours proposés dans l’école
	$reqLCours='SELECT DISTINCT C.libellé , C.catégorie_age FROM Responsable R JOIN Cours C ON C.code=R.code JOIN Travaille T ON R.idEm=T.idEm ';
	$reqLCours=$reqLCours.' WHERE T.idED='.$IDEcole.' AND T.fonction="resp_cours_danse"';
	
	$resLCours=executer_une_requete2($reqLCours);
	
	//le nombre d’adhérents ayant participé à une compétition
	$reqNbAdCompet='SELECT (COUNT(DISTINCT A.numLicence)) AS nombre_adherents_participe_edition
FROM Adhérent A 
WHERE A.idED='.$IDEcole.' AND A.numLicence IN(
SELECT C.numLicence_2
FROM participe_edition_couple PE JOIN Couple C ON PE.idCouple=C.idCouple 
UNION
SELECT C.numLicence_1
FROM participe_edition_couple PE JOIN Couple C ON PE.idCouple=C.idCouple 
UNION
SELECT DISTINCT CG.numLicence
FROM Partcipe_edition PG JOIN composition_groupe CG ON PG.idGroupe=CG.idGroupe
)';
	
	$resNbAdCompet=executer_une_requete2($reqNbAdCompet);
	
}




?>