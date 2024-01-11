<?php
// On récupère le nom de l'école de danse stocké en session
$nomEC = $_SESSION['nomEC'];

// On prépare une requête SQL pour récupérer les informations de l'école de danse
$req = (" SELECT Ecole_de_danse.nom, Adresse.numVoie, Adresse.rue, Adresse.Ville, Adresse.codePost, Adresse.Pays, Ecole_de_danse.nom_fondateurs FROM Ecole_de_danse JOIN Adresse ON Ecole_de_danse.idAd = Adresse.idAd WHERE Ecole_de_danse.nom = '$nomEC' ");

// On exécute la requête et on stocke le résultat dans une variable
$ecoleInfo = executer_une_requete2(" SELECT Ecole_de_danse.nom, Adresse.numVoie, Adresse.rue, Adresse.Ville, Adresse.codePost, Adresse.Pays, Ecole_de_danse.nom_fondateurs FROM Ecole_de_danse JOIN Adresse ON Ecole_de_danse.idAd = Adresse.idAd WHERE Ecole_de_danse.nom = '$nomEC' ");

// On initialise une variable pour stocker l'identifiant de l'école de danse
$idEC = NULL;

// Si le bouton de modification a été soumis...
if(isset($_POST["boutonModifEC"])){
    // On récupère l'identifiant de l'école de danse
    $idEC = executer_une_requete2(" SELECT idED FROM Ecole_de_danse WHERE nom = '$nomEC' ");
    if ($idEC != false){
        // On parcourt le résultat de la requête pour récupérer l'identifiant
        foreach($idEC['instances'] as $r){
            foreach($r as $valeur){
                $idEC = $valeur;
            }
        }
    }
    // On exécute une requête de mise à jour pour modifier le champ sélectionné de l'école de danse
    $modifAdher = executer_requete_update("UPDATE Ecole_de_danse SET ".$_POST['champModifEC']." = '".$_POST['champSaisiEC']."' WHERE idED = $idEC");
}
?>
