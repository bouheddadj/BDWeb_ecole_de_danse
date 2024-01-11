<?php 
$message_requete=null;
if(isset($_POST["boutonExecuterRequete"])){
    $requete=$_POST["espace_requete"];
    $resultats=executer_une_requete2($_POST["espace_requete"]);
    if($resultats==FALSE){
        $message_requete=" Erreur requete pas executée";
    }
}

?>