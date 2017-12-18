<?php


function affich($jour,$horaire) {



    $bdd=connecter();
    $tab=array();
    $req = $bdd->prepare('SELECT count(*)  FROM course WHERE Date_course ="'.$jour.'"  and id_heure="'.$horaire.'"  ');
    $req->execute();
    $resultat = $req->fetch();
    $req->closeCursor();
    if($resultat[0] == 0) {    $tab[0]=false;  return $tab;}

    $req = $bdd->prepare('SELECT * FROM course WHERE Date_course ="'.$jour.'"  and id_heure="'.$horaire.'"  ');
    $req->execute();
    $resultat = $req->fetch();
    $req->closeCursor();

    $req0 =$bdd->prepare('SELECT Depart_course,Arrive_course,id_heure FROM course WHERE id_course ="'.$resultat[0].'" ');
    $req1 =$bdd->prepare('SELECT Type_vehicule,id_chauffeur FROM vehicule WHERE id_vehicule ="'.$resultat['id_vehicule'].'" ');
    $req0->execute();
    $req1->execute();
    $resulta = $req0->fetch();
    $resultat = $req1->fetch();
    $req2 =$bdd->prepare('SELECT Nom_chauffeur,Prenom_chauffeur FROM chauffeur WHERE id_chauffeur ="'.$resultat[1].'" ');

    $req2->execute();

    $resultatt = $req2->fetch();
    $tab[0]=true;
    $tab[1]=$resulta[0];
    $tab[2]=$resulta[1];
    $tab[3]=$resulta[2];
    $tab[4]=$resultat[0];
    $tab[5]=$resultatt[0];
    $tab[6]=$resultatt[1];
    $req0->closeCursor();
    $req1->closeCursor();
    $req2->closeCursor();
    return $tab;
}

?>