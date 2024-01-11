<?php
//on execute un fois pour faire le peuplements
// Requête pour récupérer les groupes de ville, année et idComp_code
/*$reqIEdition= "SELECT DISTINCT ville, année, idComp_code FROM Edition";

// Exécution de la requête
$resultatInfoEdition=executer_une_requete2($reqIEdition);

// Vérification des erreurs de requête
if ($resultatInfoEdition==FALSE) {
    echo "erreur requete info editions";
    return 0;
}

if ($resultatInfoEdition!=FALSE) {
    foreach($resultatInfoEdition['instances'] as $row) {  // pour parcourir les n-uplets
        $idComité = rand(1, 30);
        //$idStructure = rand(1, 10);
       // $infos_struct_sportive
        // Requête pour mettre les tupples
   // $reqUpdate = "UPDATE competition SET idComite = $idComite, idStructure = $idStructure WHERE ville = '{$row['ville']}' AND année = '{$row['année']}' AND idComp_code = '{$row['idComp_code']}'";
   $ville=$row['ville'];
   $année=$row['année'];
   $idComp_code=$row['idComp_code'];
   $reqUpdate = "UPDATE Edition SET idComité = $idComité WHERE ville =".'"'.$ville.'"'." AND année = $année AND idComp_code =".'"'.$idComp_code.'"'; 
   //echo $reqUpdate;
   $res=executer_requete_update($reqUpdate);
   $res=1;
    if($res==0){
        //echo "erreur lien entre edition et commité";
        echo ".";
    }
    }
}

$reqEdition= "SELECT * FROM Edition";
$resEdition=executer_une_requete2($reqEdition);

$lieux = array(
    "Le Moulin Rouge à Paris",
    "La Scala de Milan",
    "Le Bolchoï à Moscou",
    "Le Lincoln Center à New York",
    "Le Royal Opera House à Londres",
    "Le Teatro alla Scala à Buenos Aires",
    "Le Palacio de Bellas Artes à Mexico",
    "L'Opéra national de Vienne",
    "Le Teatro Colón à Bogotá",
    "L'Auditorium Parco della Musica à Rome",
    "Le Sadler's Wells Theatre à Londres",
    "L'Opéra de Paris",
    "Le Teatro Real à Madrid",
    "L'Auditorium de Lyon",
    "Le Gran Teatre del Liceu à Barcelone",
    "Le National Centre for the Performing Arts à Pékin",
    "Le Mikhailovsky Theatre à Saint-Pétersbourg",
    "Le Mariinsky Theatre à Saint-Pétersbourg",
    "Le Palais Garnier à Paris",
    "Le Sydney Opera House à Sydney",
    "Le Palacio de las Bellas Artes à San Juan",
    "Le Ballet Nacional de Cuba à La Havane",
    "Le New York City Ballet à New York",
    "Le Boston Ballet à Boston",
    "Le Teatro Municipal de São Paulo"
);
   
foreach ($lieux as $l){
    $idAd = rand(1, 502);
    $reqPeuplemet = "INSERT INTO Structure_Sportive (nom,type, idAd) VALUES (".'"'.$l.'","salle",'.$idAd.")";
   //echo $reqPeuplemet;
    $res=executer_requete_update($reqPeuplemet);

}*/
//REQUETE POUR TOUVER LE RANG MINIMAL
/*

SELECT numLicence, MIN(rang_final) as rang_minimal
FROM (
    SELECT C.numLicence_1 AS numLicence, PE.rang_final
    FROM Couple C JOIN participe_edition_couple PE ON C.idCouple=PE.idCouple JOIN Adhérent A ON A.numLicence=C.numLicence_1
    UNION
    SELECT C.numLicence_2 AS numLicence, PE.rang_final
    FROM Couple C JOIN participe_edition_couple PE ON C.idCouple=PE.idCouple JOIN Adhérent A ON A.numLicence=C.numLicence_2
) as T
GROUP BY numLicence
ORDER BY rang_minimal ASC
*/


if(isset($_POST["nombre_de_comites"])){
    $resCOM=executer_une_requete2("SELECT idComité,COUNT(idComité) as nb_exp FROM `Edition` GROUP BY idComité ORDER BY nb_exp DESC LIMIT ".$_POST["nombre_de_comites"]." ");
    
}


?>
