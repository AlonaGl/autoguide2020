<?php
/*
=========================================================================
Intégration web III - TP1
-------------------------------------------------------------------------
Votre nom : Alona Golubyeva
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


// echo Auto::titre('Ford', 'Fiesta', '');
// echo Auto::trouverModele($voitures, 'Ford','Fiesta');        nope
// var_dump(trouverModele($voitures, 'Ford','Fiesta'));     nope
// print_r(Auto::trouverModele($voitures, 'Ford','Fiesta'))

// echo Auto::ariane('Ford', 'Fiesta');
// echo Auto::lien('Ford', 'Fiesta');
// echo Auto::image('Ford', 'Fiesta', 'voiture');

// echo Auto::listeMarques($voitures);
// echo Auto::listeModeles('Ford', $voitures);
print_r(Auto::listeModeles('Ferrari', $voitures))
// echo Auto::ligne('Moteur :','V8 4,3 litres');

// echo Auto::ligne_moteur($voitures, 'Ford', 'Fiesta');

// echo Auto::ligne_puissance($voitures, 'Ford', 'Fiesta');
// echo Auto::ligne_couple($voitures, 'Ford', 'Fiesta');
// echo Auto::ligne_transmissions($voitures, 'Ford', 'Fiesta');
// echo Auto::ligne_consommation($voitures, 'Ford', 'Fiesta');
// echo Auto::affichageVoiture($voitures, 'Ford', 'Fiesta');

// var_dump($voitures);
// var_dump($voitures['Ford']);
// var_dump($voitures['Ford']['Fiesta']);
// var_dump($voitures['Ford']['Fiesta']['prix']);
// var_dump($voitures['Ford']['Fiesta']['consommation'][0]);
// ... CONTINUER ...
?>