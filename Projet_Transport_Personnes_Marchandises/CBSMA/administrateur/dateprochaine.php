<?php


function dateprochaine($jour) {

    $bdd=connecter();
    $jourcourant=date("l");
    $req = $bdd->prepare('SELECT NumeroJour  FROM Jour WHERE JourA = "'.$jourcourant.'"  ');
    $req->execute();
    $resultat = $req->fetch();
    $req->closeCursor();
    $req = $bdd->prepare('SELECT NumeroJour  FROM Jour WHERE NomJour = "'.$jour.'"  ');
    $req->execute();
    $resultat1 = $req->fetch();
    $req->closeCursor();
    $DateDebut = date("Y-m-d");
    $DateFin = date('Y-m-d', strtotime($DateDebut.' +'.($resultat1[0]-$resultat[0]).' days'));

    return $DateFin;
}

?>