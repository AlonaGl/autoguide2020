<?php
include_once("donnees.inc.php");
/*
=========================================================================
Intégration web III - TP1
-------------------------------------------------------------------------
Votre nom : Alona Golubyeva
-------------------------------------------------------------------------
- Compléter les méthodes suivantes
- Toutes les méthodes sont statiques
- Conseils :
	- Commencer par créer toutes les méthodes vides avec les bons paramètres et la bonne valeur de retour
	- Faire chaque méthode en oubliant le contexte dans lequel elles seront utilisées. "Elles prennent des données et retournent une valeur. Point final!"
	- Tester CHAQUE méthode individuellement en ajoutant une ligne de test dans la page test.php
*/
class Auto {
	/** Méthode "titre" qui retourne le titre d'une voiture dont la marque et le modele sont passés en paramètres.
	 * Le résultat peut être envelopée ou non d'une balise dont le nom est passé en paramètre.
	 * Notes:
	 * - Il n'y a pas de validation de la combinaison. On pourrait donc avoir une "Ferrari Focus"
	 * - Si une $balise est fournie, on retourne le titre sous le modele suivant "<p>Ferrari Focus</p>"
	 *   en utilisant le nom de la balise donnée en paramètre
	 * - Si une $balise n'est pas fournie, on retourne le titre seulement. ex.: "Ferrari Focus"
	 * @param string $nomMarque - La marque de voiture
	 * @param string $nomModele - Le modele de voiture
	 * @param string $balise - Le nom de la balise devant envelopper le titre. Valeur par défaut : ""
	 * @return string - Le titre mis en forme
	*/
	static public function titre($nomMarque, $nomModele="", $balise="") {
		$resultat = $nomMarque." ".$nomModele;
		if ($nomModele) {
			$resultat = $nomMarque." ".$nomModele;
		}
		if ($balise != "") {
			$resultat = '<'.$balise.'>'.$resultat.'</'.$balise.'>';
		}
		return $resultat;
	}

	/** Méthode "trouverModele" qui retourne le array représentant un modele de voiture.
	 * En fonction de la marque et du modele envoyé en paramètres.
	 * Si la marque n'existe pas ou le modele n'existe pas pour cette marque, on retourne false
	 * @param array $autos - Le array contenant les autos
	 * @param string $nomMarque - La marque à rechercher
	 * @param string $nomModele - Le modele à rechercher dans la marque
	 * @return array - Le array du modele ou false
	 */
	static public function trouverModele($autos, $nomMarque, $nomModele){
		if (!isset($autos[$nomMarque])){
			return false;
		}
		if (!isset($autos[$nomMarque][$nomModele])) {
			return false;
		}
		$resultat = $autos[$nomMarque][$nomModele];
		return $resultat;
	}


	/** Méthode "ariane" qui retourne le HTML du fil d'Ariane se trouvant DANS le div "menu"
	 * Notes :
	 * - Si une $nomMarque est fournie, on retourne le titre de la voiture et un lien vers index (voir la maquette)
	 * - Si une $nomMarque n'est pas fournie, on ne retourne que le mot "Accueil" (voir la maquette)
	 * @param string $nomMarque - La marque de voiture. Valeur par défaut : "".
	 * @param string $nomModele - Le modele de voiture. Valeur par défaut : "".
	 * @return string - Le HTML du fil d'Ariane
	 */
	static public function ariane($nomMarque="", $nomModele=""){
		$resultat = '';
		$resultat .= '<nav id="ariane">';
		$resultat .= '<ul>';
		if($nomMarque & $nomModele){
			$resultat .= '<li><a href="index.php">Accueil</a></li>';
			$resultat .= '<li><a href="marque.php?nomMarque='.$nomMarque.'">'.$nomMarque.'</a></li>';
			$resultat .= '<li><span>'.$nomModele.'</span></li>';
		}else if($nomMarque){
			$resultat .= '<li><a href="index.php">Accueil</a></li>';
			$resultat .= '<li><span>'.$nomMarque.'</span></li>';
		}else{
			$resultat .= '<li><span>Accueil</span></li>';
		}
		$resultat .= '</ul>';
		$resultat .= '</nav>';
		return $resultat;
	}


	/** Méthode "lien" qui retourne le code HTML d'un lien retrouvé dans la page index
	 * qui permet d'afficher les détails d'une voiture
	 * @param string $nomMarque - La marque de voiture
	 * @param string $nomModele - Le modele de voiture
	 * @return string - Le HTML de la balise <a>
	 */
	static public function lien($nomMarque, $nomModele){
			$resultat = '';
			$resultat .= '<li><a href="modele.php?nomMarque='.$nomMarque.'&amp;nomModele='.$nomModele.'">';
			$resultat .= self::image($nomMarque, $nomModele, $class="voiture");
			$resultat .= '<span>'.$nomModele.'</span></a></li>';
			return $resultat;
	}


	/** Méthode "image" qui retourne le code HTML d'une image composé en fonction des paramètres
	 * et en suivant le modèle suivant : <img src="images/voitures/ford_fiesta.jpg" class="voiture" alt="Ford Fiesta" title="Ford Fiesta" />
	 * Note : Cette méthode utilise la méthode "titre"
	 * Note : Le nom du fichier est en minuscule. Vous n'avez pas à vérifier la
	 * validité de la combinaison modele/marque ni l'existence du fichier
	 * @param string $nomMarque - La marque de voiture
	 * @param string $nomModele - Le modele de voiture
	 * @param string $class - La classe à donner à la balise. Valeur par défaut: "voiture". Note: Si la classe est différente de "voiture", le nom de l'image doit automatiquement être accompagné du suffixe "_tb"
	 * @return string - Le HTML de la balise <img>
	 */
	static public function image($nomMarque, $nomModele, $class="voiture"){
		$resultat = '<img src="images/voitures/'.$nomMarque.'_'.$nomModele.'.jpg" class="voiture" alt="'.$nomMarque.''.$nomModele.'" title="'.$nomMarque.''.$nomModele.'" />';
		return $resultat;
	}


	/** Méthode "listeMarques" qui retourne le HTML du ul "listeMarques"
	 * contenant la liste des voitures (voir maquette, page index.php) en fonction du paramètre
	 * @param array $autos - Le array contenant les autos
	 * @return string - Le HTML du div "listeMarques"
	 */

	static public function listeMarques($autos){
		$resultat = '';
		foreach ($autos as $auto) {
			$resultat .= '<ul class="listeMarques">';
			$resultat .= '<li><a href="marque.php?nomMarque='.$auto.'">'.$auto.'</a>';
			$resultat .= self::listeModeles($auto, $autos);
		}
		$resultat .= '</li>';
		$resultat .= '</ul>';
		return $resultat;
	}

	 /** Méthode "listeModeles" qui retourne le HTML du ul "listeModeles"
	 * contenant la liste des voitures (voir maquette, page index.php) en fonction des paramètres
	 * @param array $nomMarque - Le nom de la marque à parcourir
	 * @param array $autosMarque - Le array contenant les autos
	 * @return string - Le HTML du ul "listeModeles"
	 */
	static public function listeModeles($nomMarque, $autosMarque){
			$resultat = '';
			$resultat .= '<ul class="listeModeles">';
			foreach ($autosMarque[$nomMarque] as $key) {
				$resultat .= self::lien($nomMarque, $key);
			}
			$resultat .= '</ul>';
			return $resultat;
	}



	/**	Méthode "ligne" qui retourne une ligne (<tr>) du tableau des caractéristiques
	 * en fonction des paramètres (voir maquette, page modele.php)
	 * @param string $etiquette - Le contenu de la première cellule
	 * @param string $contenu - Le contenu de la deuxième cellule
	 * @param string - Le HTML du tr
	 */
	static public function ligne($etiquette, $contenu){
			$resultat = '';
			$resultat .= '<tr>';
			$resultat .= '<td class="etiquette">'.$etiquette.' : </td>';
			$resultat .= '<td>'.$contenu.'</td>';
			$resultat .= '</tr>';
			return $resultat;
	}


	
	static public function ligne_moteur($voiture, $nomMarque, $nomModele){
		$resultat = '';
		foreach ($voiture[$nomMarque][$nomModele]['moteur'] as $key => $valeur){
			$resultat .= self::ligne($key, $valeur);
		}
		return $resultat;
	}

	/** Méthode "ligne_puissance" qui retourne la ligne de la puissance (2e ligne) de la voiture
	 * en lui donnant le format adéquat (voir maquette, page modele.php)
	 * Note : Cette méthode utilise la méthode "ligne"
	 * @param array $voiture - Le array représentant la voiture (un modèle)
	 * @param string - Le HTML du tr
	 */
	static public function ligne_puissance($voiture, $nomMarque, $nomModele){
		$resultat = '';
		foreach ($voiture[$nomMarque][$nomModele]['puissance'] as $key => $valeur){
			$resultat .= self::ligne($key, $valeur);
		}
		return $resultat;
	}


	/** Méthode "ligne_couple" qui retourne la ligne du couple de la voiture (3e ligne)
	 * en lui donnant le format adéquat (Note : Utilise la méthode "ligne")
	 * Note : Cette méthode utilise la méthode "ligne"
	 * @param array $voiture - Le array représentant la voiture (un modèle)
	 * @param string - Le HTML du tr
	 */
	static public function ligne_couple($voiture){
		$resultat = '';
		foreach ($voiture[$nomMarque][$nomModele]['couple'] as $key => $valeur){
			$resultat .= self::ligne($key, $valeur);
		}
		return $resultat;
	}


	/** Méthode "ligne_transmissions" qui retourne la ligne des transmissions disponibles (voir maquette, page modele.php)
	 * Note : Cette méthode utilise la méthode "ligne"
	 * @param array $voiture - Le array représentant la voiture
	 * @return string - Le HTML du tr
	 */
	static public function ligne_transmissions($voiture){
		$resultat = '';
		foreach ($voiture[$nomMarque][$nomModele]['transmission'] as $key => $valeur){
			$resultat .= self::ligne($key);
			$resultat .= 'ul class="transmissions">';
			$resultat .= 'li>'.$valeur[0].''.$valeur[1].'</li>';
			$resultat .= 'li>'.$valeur[2].''.$valeur[3].''.$valeur[4].'</li>';
			$resultat .= '/ul>';
		}
		return $resultat;
	}


	/** Méthode "ligne_consommation" qui retourne la ligne de la consommation (en ville et sur autoroute) de la voiture (voir maquette, page modele.php)
	 * Note : Cette méthode utilise la méthode "ligne"
	 * @param array $voiture - Le array représentant la voiture
	 * @return string - Le HTML du tr
	 */
	static public function ligne_consommation($voiture){
		$resultat = '';
		foreach ($voiture[$nomMarque][$nomModele]['consommation'] as $key => $valeur){
			$resultat .= self::ligne($key);
			$resultat .= 'ul class="$chiffre">';
			$resultat .= 'li>'.$valeur[0].'</li>';
			$resultat .= 'li>'.$valeur[1].'</li>';
			$resultat .= '/ul>';
		}
		return $resultat;
	}
	

	/** Méthode "affichageVoiture" qui retourne le div "voiture" contenant la description d'une voiture
	 * en fonction des paramètres (voir maquette, page modele.php)
	 * Note : Cette méthode utilise des méthodes créées précédemment
	 * @param array $voiture - Le array représentant la voiture
	 * @param string $nomMarque - La marque à rechercher
	 * @param string $nomModele - Le modele à rechercher dans la marque
	 * @param string - Le HTML du div "voiture"
	 */
	static public function affichageVoiture($voiture, $nomMarque, $nomModele){
		$resultat = '';
		$resultat .= '<div class="voiture">';
		$resultat .= self::image($nomMarque, $nomModele, $class="voiture");
		$resultat .= '<h2>Prix de base</h2>';
		$resultat .= '<div class="prix">'.$voiture[$nomMarque][$nomModele]["prix"].'$</div>';
		$resultat .= '<h2>Caractéristiques</h2>';
		$resultat .= '<table class="caracteristiques">';
		$resultat .= self::ligne_moteur($voiture, $nomMarque, $nomModele);
		$resultat .= self::ligne_puissance($voiture, $nomMarque, $nomModele);
		$resultat .= self::ligne_couple($voiture);
		$resultat .= self::ligne_transmissions($voiture);
		$resultat .= self::ligne_consommation($voiture);
		$resultat .= '</table>';
		$resultat .= '</div>';

	}
	

}