<?php

include_once "bd.inc.php";

function getClientByIdC($idC) {
    $mysqli = mysqli_connect("localhost", "root", "root", "ap2eme");
    $rqt = mysqli_query($mysqli,"SELECT * FROM client where idC=: idC") or die("Erreur au niveau de la requête");
    return $rqt;
}

function getClientByNumC($numC) {
    $mysqli = mysqli_connect("localhost", "root", "root", "ap2eme");
    $rqt = mysqli_query($mysqli,"SELECT * FROM client where numC=: numC") or die("Erreur au niveau de la requête");
    return $rqt;
}

?>