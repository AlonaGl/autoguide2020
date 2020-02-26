<?php
/*
=========================================================================
Intégration web III - TP1
-------------------------------------------------------------------------
Votre nom :
-------------------------------------------------------------------------
Cette page devrait contenir les tests des méthodes
- Inclure le fichier de la class Auto
- Inclure le fichier donnees.inc.php contenant les données des voitures
- Commencer par le fichier Auto.php
=========================================================================
*/
include_once("../src/Auto.php");
include_once("../src/donnees.inc.php");
/*LIGNE DE TEST*/
// echo Auto::image('Ford', 'Fiesta', 'voiture');
// echo Auto::ariane('Ford', 'Fiesta');
// echo Auto::lien('Ford', 'Fiesta');
// echo Auto::titre('Ford', 'Fiesta', '');
// echo Auto::ariane('Ford', 'Fiesta');
// echo Auto::listeModeles('Ford', $voitures);
// echo Auto::array_unshift('Ford');
// var_dump($voitures['Ford']);
// var_dump($voitures['Ford']['Fiesta']);
// var_dump($autos['Ford']['Fiesta']);
// var_dump($voitures);
// echo Auto::trouverModele($voitures, 'Ford','Fiesta');
// echo Auto::listeMarques($voitures);
// echo Auto::ligne('Moteur :','V8 4,3 litres');
echo Auto::ligne_puissance($voitures, 'Ford', 'Fiesta');
// ... CONTINUER ...
?>