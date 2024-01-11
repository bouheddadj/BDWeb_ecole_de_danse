<?php

// Récupération des noms et prénoms des membres dans la base de données
$nomMem = executer_une_requete("SELECT M.nom, M.prenom FROM Membre M ORDER BY M.nom ASC");

// Vérification s'il y a des membres dans la base de données
if($nomMem == null || count($nomMem) == 0) {
    $message_liste = "Aucun nom de membre n'a été trouvé dans la base de données !";
} else {
    // Boucle pour récupérer tous les noms et prénoms dans un tableau
    foreach($nomMem as $nr){
        $mem_names[] = strval($nr["nom"]." ".$nr["prenom"]);
    }
}

// Récupération des informations d'un membre sélectionné pour modification
if(isset($_POST["boutonChoixNomMembrePourModifier"])){         
    // Récupération des informations du formulaire
    $nomM_prenomM = $_POST["nomMembreModif"]; 	
    $nomM_prenomM_array = explode (" ", $nomM_prenomM);
    $nomMemModif = $nomM_prenomM_array[0];
    $prenomMemModif = $nomM_prenomM_array[1];

    // Requête pour récupérer les informations du membre sélectionné
    $reqInfoMem="SELECT idM,nom,prenom,idF,date_naissance FROM Membre WHERE nom=".'"'.$nomMemModif.'"'." AND prenom=".'"'.$prenomMemModif.'"' ;
    $resultatInfoMem=executer_une_requete2($reqInfoMem);

    // Récupération de l'ID du membre sélectionné
    $resIdMembreModif=executer_une_requete2("SELECT idM FROM Membre WHERE nom=".'"'.$nomMemModif.'"'." AND prenom=".'"'.$prenomMemModif.'"' );
    $IdMembreModif=NULL;
    foreach($resIdMembreModif['instances'] as $row) { 
        foreach($row as $valeur) { 
            $IdMembreModif=$valeur;
        }
    }

    // Récupération des informations du membre pour afficher sur la page de modification
    $infoMem=executer_une_requete2("SELECT nom,prenom,idF,date_naissance FROM Membre WHERE nom=".'"'.$nomMemModif.'"'." AND prenom=".'"'.$prenomMemModif.'"');
    $_SESSION['idMembreAModif'] = $IdMembreModif;
}

// Ajout d'un nouveau membre dans la base de données
if(isset($_POST["AjouterMembre"])){
    if (($_POST["datenaiss"])!=""){
        $reqAjoutMem='INSERT INTO Membre (idF,nom, prenom, date_naissance) VALUES ('.$_POST["idFAjout"].',"'.$_POST["nom"].'","'.$_POST["prenom"].'","'.$_POST["datenaiss"].'")';
    } else {
        $reqAjoutMem='INSERT INTO Membre (idF,nom, prenom, date_naissance) VALUES ('.$_POST["idFAjout"].',"'.$_POST["nom"].'","'.$_POST["prenom"].'")';
    }
    $ajouteMEM=executer_requete_update($reqAjoutMem);
}

// Modification d'un membre dans la base de données
if(isset($_POST["boutonModifMembre"])){
    //

    
    $requp = "UPDATE Membre SET ".$_POST['champModif']." = '".$_POST['champSaisi']."' WHERE idM=".$_SESSION['idMembreAModif']." ";
    //echo $requp;
    $modifMem=executer_requete_update($requp);
    
}




?>