<?php
// Récupération des noms et prénoms de tous les adhérents dans la base de données
$nomAdher = executer_une_requete("SELECT A.nom, A.prenom FROM Adhérent A ORDER BY A.nom ASC");

// Initialisation des variables
$res = NULL;
$nomAR_prenomAR = NULL;
$nomAR_prenomAR_array = NULL;
$nomAR = NULL;
$prenomAR = NULL;
$infoAdher = NULL;
$idAdher = NULL;

// Si un nom d'adhérent est sélectionné
if(isset($_POST['nomAdher'])){
    // Récupération du nom et prénom sélectionnés
    $nomAR_prenomAR = $_POST["nomAdher"];
    $nomAR_prenomAR_array = explode (" ", $nomAR_prenomAR);
    $nomAR = $nomAR_prenomAR_array[0];
    $prenomAR = $nomAR_prenomAR_array[1];

    // Enregistrement des valeurs en session
    $_SESSION['nomAR'] = $nomAR;
    $_SESSION['prenomAR'] = $prenomAR;

    // Récupération des informations de l'adhérent sélectionné
    $infoAdher = executer_une_requete2("SELECT * FROM Adhérent where nom = '$nomAR' and prenom='$prenomAR' ");
}

// Si le bouton de modification est cliqué
if(isset($_POST["boutonModif"])){
    // Récupération du nom et prénom en session
    $nomAR = $_SESSION['nomAR'];
    $prenomAR = $_SESSION['prenomAR'];

    // Récupération de l'ID de l'adhérent
    $res = executer_une_requete2("SELECT numLicence from Adhérent where nom = '".$nomAR."' and prenom = '".$prenomAR."'");
    if ($res != false){
        foreach($res['instances'] as $r){
            foreach($r as $valeur){
                $idAdher = $valeur;
            }
        }
    }

    // Modification de l'adhérent en fonction du champ sélectionné et de la saisie utilisateur
    $modifAdher = executer_requete_update("UPDATE Adhérent SET ".$_POST['champModif']." = '".$_POST['champSaisi']."' WHERE numLicence = $idAdher");
}

// Si aucun nom d'adhérent n'est trouvé dans la base de données
if($nomAdher == null || count($nomAdher) == 0) {
	$message_liste = "Aucun nom de résponsable n'a été trouvée dans la base de données !";
}else{
    // Parcours des adhérents trouvés et stockage des noms dans un tableau
    foreach($nomAdher as $ad){
        $adr_noms[] = strval($ad["nom"]." ".$ad["prenom"]);
    }
}

?>