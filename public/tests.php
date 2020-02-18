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
//echo Auto::image('Ford', 'Fiesta', 'voiture');
//echo Auto::trouverModele('Ford', 'Fiesta', 'voiture');
// echo Auto::ariane('Ford', 'Fiesta');
echo Auto::lien('Nissan', 'Versa');
// ... CONTINUER ...
?>