<?php

function filtrePlace ($place) {
//$entree est par défaut une chaine de caractères - issue de $_GET ou $_POST, etc...

// etape préalable 1 : traitement chaine mal formatée
//-------------------
	$place=pg_escape_string($place); // protège l'accès à la base de chaines mal formatées. (Utilise la dernière connexion ouverte)
	print "<br/>"; // saut de ligne HTML
	print  "information reçue filtrée par la fonction pg_escape_string(): ".$place;
	print "<br/>";
// etape préalable 2 : limitation de la longueur de la chaine d'entree
//-------------------
    $a=0;
    $b=1;
    //limitation de la longueur de la variable (chaine) recue
    $place=substr($place, $a, $b); // démarre au $a ieme caractere sur b caractères
	
// filtrage du type
//-------------------
	$regex  = "@^(1|4|5|7){1}$@";
	print "<h2>Motif (expression régulière) : </h2>";
	print "<p>".$regex."</p><br/>";
	
	print "<h2>Résultat de la recherche par expression régulière : </h2>";
	if (preg_match_all($regex, $place, $resultats)) { // il y a une correspondance
		// preg_match_all retourne true s'il y a une correspondance
			print "<p>Motif en correspondance !!!!!!!!!!!!</p>";
			//print "<p>Détail du résultat : </p>";
			//echo "<pre>" ;
			//print_r($resultats) ;
			//echo "</pre>" ;
			

	} else {
			print "pas de correspondance du motif";
			$place=null;
	}
    return $place; // retourne le résultat
}

function filtreMarque ($marque) {
//$entree est par défaut une chaine de caractères - issue de $_GET ou $_POST, etc...

// etape préalable 1 : traitement chaine mal formatée
//-------------------
	$marque=pg_escape_string($marque); // protège l'accès à la base de chaines mal formatées. (Utilise la dernière connexion ouverte)
	print "<br/>"; // saut de ligne HTML
	print  "information reçue filtrée par la fonction pg_escape_string(): ".$marque;
	print "<br/>";
// etape préalable 2 : limitation de la longueur de la chaine d'entree
//-------------------
    $a=0;
    $b=10;
    //limitation de la longueur de la variable (chaine) recue
    $marque=substr($marque, $a, $b); // démarre au $a ieme caractere sur b caractères
	
// filtrage du type
//-------------------
	$regex  = "@^[a-zA-Z]{1,10}$@";
	print "<h2>Motif (expression régulière) : </h2>";
	print "<p>".$regex."</p><br/>";
	
	print "<h2>Résultat de la recherche par expression régulière : </h2>";
	if (preg_match_all($regex, $marque, $resultats)) { // il y a une correspondance
		// preg_match_all retourne true s'il y a une correspondance
			print "<p>Motif en correspondance !!!!!!!!!!!!</p>";
			//print "<p>Détail du résultat : </p>";
			//echo "<pre>" ;
			//print_r($resultats) ;
			//echo "</pre>" ;
			

	} else {
			print "pas de correspondance du motif";
			$marque=null;
	}
    return $marque; // retourne le résultat
}


function filtreType ($typevehicule) {
}

function filtreNumTelephone ($numtel) {
//$entree est par défaut une chaine de caractères - issue de $_GET ou $_POST, etc...

// etape préalable 1 : traitement chaine mal formatée
//-------------------
	$numtel=pg_escape_string($numtel); // protège l'accès à la base de chaines mal formatées. (Utilise la dernière connexion ouverte)
	print "<br/>"; // saut de ligne HTML
	print  "information reçue filtrée par la fonction pg_escape_string(): ".$numtel;
	print "<br/>";
// etape préalable 2 : limitation de la longueur de la chaine d'entree
//-------------------
    $a=0;
    $b=9;
    //limitation de la longueur de la variable (chaine) recue
    $numtel=substr($numtel, $a, $b); // démarre au $a ieme caractere sur b caractères
	
// filtrage du type
//-------------------
	$regex  = "@^(0|\+33|0033)[1-9][0-9]{8}$@";
	print "<h2>Motif (expression régulière) : </h2>";
	print "<p>".$regex."</p><br/>";
	
	print "<h2>Résultat de la recherche par expression régulière : </h2>";
	if (preg_match_all($regex, $numtel, $resultats)) { // il y a une correspondance
		// preg_match_all retourne true s'il y a une correspondance
			print "<p>Motif en correspondance !!!!!!!!!!!!</p>";
			//print "<p>Détail du résultat : </p>";
			//echo "<pre>" ;
			//print_r($resultats) ;
			//echo "</pre>" ;
			

	} else {
			print "pas de correspondance du motif";
			$numtel=null;
	}
    return $numtel; // retourne le résultat
}

Function FiltreBoiteVite {

}



?>
