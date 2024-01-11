<?php

// Requête pour récupérer les noms et prénoms de tous les adhérents, triés par ordre alphabétique
$nomAdher = executer_une_requete("SELECT A.nom, A.prenom FROM Adhérent A ORDER BY A.nom ASC");

// Initialisation de variables à NULL
$nl = NULL;
$nm = NULL;
$pm = NULL;
$dn = NULL;
$ia = NULL;
$ie = NULL;

// Vérifie si le formulaire a été soumis pour obtenir les informations d'un adhérent spécifique
if(isset($_POST['nomAdher'])){
    $nomAR_prenomAR = $_POST["nomAdher"];
    $nomAR_prenomAR_array = explode (" ", $nomAR_prenomAR);
    $nomAR = $nomAR_prenomAR_array[0];
    $prenomAR = $nomAR_prenomAR_array[1];
    // Requête pour récupérer toutes les informations d'un adhérent spécifique
    $infoAdher = executer_une_requete2("SELECT * FROM Adhérent where nom = '$nomAR' and prenom='$prenomAR' ");
}

// Vérifie si le formulaire a été soumis pour ajouter un nouvel adhérent
if(isset($_POST['boutonAjoutAD'])){
    // Récupération des données du formulaire pour ajouter un nouvel adhérent
    $nl = $_POST['NL'];
    $nm = $_POST['NM'];
    $pm = $_POST['PM'];
    $dn = $_POST['DN'];
    $ia = $_POST['IA'];
    $ie = $_POST['IE'];
    
    // Stockage des données du formulaire dans la session
    $_SESSION['nl'] = $nl;
    $_SESSION['nm'] = $nm;
    $_SESSION['pm'] = $pm;
    $_SESSION['dn'] = $dn;
    $_SESSION['ia'] = $ia;
    $_SESSION['ie'] = $ie;

    // Récupération des données du formulaire depuis la session
    $nl = $_SESSION['nl'];
    $nm = $_SESSION['nm'];
    $pm = $_SESSION['pm'];
    $dn = $_SESSION['dn'];
    $ia = $_SESSION['ia'];
    $ie = $_SESSION['ie'];
    
    // Requête pour insérer un nouvel adhérent dans la base de données
    $inserAD = "INSERT INTO Adhérent (numLicence, nom, prenom, date_naissance, idAd, idED) VALUES ('".$nl."', '".$nm."', '".$pm."', '".$dn."', '".$ia."', '".$ie."')";
    executer_requete_update (" $inserAD ");
}

// Vérifie si des noms d'adhérents ont été trouvés dans la base de données
if($nomAdher == null || count($nomAdher) == 0) {
	// Message d'erreur si aucun nom d'adhérent n'a été trouvé
	$message_liste = "Aucun nom de résponsable n'a été trouvée dans la base de données !";
}else{
    // Stockage des noms et prénoms d'adhérents dans un tableau
    foreach($nomAdher as $ad){
        $adr_noms[] = strval($ad["nom"]." ".$ad["prenom"]);
    }
}

?>