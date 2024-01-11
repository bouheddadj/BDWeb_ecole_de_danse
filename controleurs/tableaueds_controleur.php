<?php

// Récupérer les noms et prénoms des responsables à partir de la base de données
$nomRes = executer_une_requete("SELECT DISTINCT E.nom, E.prenom FROM Responsable R JOIN Employé E ON R.idEm=E.idEm ORDER BY E.nom ASC");

// Vérifier si le résultat de la requête est vide ou nul
if($nomRes == null || count($nomRes) == 0) {
	// Message d'erreur si la requête n'a renvoyé aucun résultat
	$message_liste = "Aucun nom de résponsable n'a été trouvée dans la base de données !";
}else{
    // Itérer sur chaque élément du résultat de la requête
    foreach($nomRes as $nr){
        // Créer une nouvelle chaîne de caractères avec le nom et le prénom du responsable
        $res_names[] = strval($nr["nom"]." ".$nr["prenom"]);
    }
}

?>
