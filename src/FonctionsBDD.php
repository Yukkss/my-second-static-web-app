<?php

function RechercheVehicule ($connex, $place, $type, $marque, $prixMin, $prixMax, $retrait) {

	$stmt = $connex->prepare("SELECT idvoiture, nomvoiture, modele, prixreservation FROM VOITURES 
	WHERE place = :place;
	AND type = :type;
	AND marque = :marque;
	AND prixreservation >= :prixMin;
	AND prixreservation <= :prixMax;");
	
	$stmt->bindParam(':place', $place);
	$stmt->bindParam(':type', $type);
	$stmt->bindParam(':marque', $marque);
	$stmt->bindParam(':prixMin', $prixMin);
	$stmt->bindParam(':prixMax', $prixMax);
	
	$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.
	
	return $stmt;     // retourne a l'appelant le resultat.
	
}

function AjoutUtilisateur($connex, $nomclient, $prenomclient, $adresseclient, $contactclient, $emailclient, $usernameclient, $passwordclient) {

	$stmt = $connex->prepare("INSERT INTO CLIENTS(nom, prenom, adresse, contact, email, username, password, refidadmin, statutcompte) 
							  VALUES (:nomclient,:prenomclient,:adresseclient,:contactclient,:emailclient,:usernameclient,:passwordclient,1,1);");

	$stmt->bindParam(':nomclient', $nomclient);
	$stmt->bindParam(':prenomclient', $prenomclient);
	$stmt->bindParam(':adresseclient', $adresseclient);
	$stmt->bindParam(':contactclient', $contactclient, PDO::PARAM_INT);
	$stmt->bindParam(':emailclient', $emailclient);
	$stmt->bindParam(':usernameclient', $usernameclient);
	$stmt->bindParam(':passwordclient', $passwordclient);

	$stmt->execute(); // execution de la requête. Le resultat est dans la variable $res.

	return $stmt;     // retourne a l'appelant le resultat.
}

/**
 * Nettoie une valeur insérée dans une page HTML
 * Doit être utilisée à chaque insertion de données dynamique dans une page HTML
 * Permet d'éviter les problèmes d'exécution de code indésirable (XSS)
 * @param string $valeur Valeur à nettoyer
 * @return string Valeur nettoyée
 */
function escape($valeur)
{
    // Convertit les caractères spéciaux en entités HTML
    return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
}

function CheckDate ($connex, $start_date, $datereservation, $end_date, $dateretour) {
	$stmt =$connex->prepare("SELECT * FROM reservations WHERE datereservation >= '$start_date' AND dateretour <= '$end_date'AND ");

	$stmt->bindParam(':datereservation', $datereservation);
	$stmt->bindParam(':start_date', $start_date);
	$stmt->bindParam(':dateretour', $dateretour);
	$stmt->bindParam(':end_date', $end_date);
	
	$stmt->execute();

	return $stmt
}
function MontreVoiture ($connex,$marque,$place,$boiteVite,$typevoiture, ) 
{
	$stmt = $connex->prepare("SELECT idvoiture, boitevite ,nomvoiture, modele,typevoiture, prix,place FROM VOITURES 
	WHERE place = :place;
	AND statut = 0;
	AND typevoiture = :typevoiture;
	AND boiteVite = :boiteVite;
	AND prix >= :prixMin;
	AND prix <= :prixMax;");
	
	$stmt->bindParam(':place', $place);
	$stmt->bindParam(':typevoiture', $typevoiture);
	$stmt->bindParam(':marque', $marque);
	$stmt->bindParam(':prixMin', $prixMin);
	$stmt->bindParam(':prixMax', $prixMax);
	
}

function MontreVoitureDispo ($connex,$marque,$place,$boiteVite,$typevoiture ) $
{
	$stmt = $connex->prepare("SELECT  boitevite ,nomvoiture, modele,typevoiture, prix,place FROM VOITURES INNER JOIN ON voitures.idvoiture  
	WHERE place = :place;
	AND statu = 0;
	AND typevoiture = :typevoiture;
	AND marque = :marque;
	AND boiteVite = :boiteVite;
	AND prix >= :prixMin;
	AND prix <= :prixMax;");
	
	$stmt->bindParam(':place', $place);
	$stmt->bindParam(':typevoiture', $typevoiture);
	$stmt->bindParam(':marque', $marque);
	$stmt->bindParam(':prixMin', $prixMin);
	$stmt->bindParam(':prixMax', $prixMax);
	
}

function FilterBoite($connex, $BoiteVite, $Vit) {
	
	$stmt =$connex->prepare("SELECT nomvoiture,desimg,place,prix,BoiteVite FROM voitures WHERE BoiteVite = $Vit ");

	$stmt->bindParam(':BoiteVite', $BoiteVite);
	$stmt->bindParam(':Vit', $Vit);

	
	$stmt->execute();

	return $stmt


}
function Filterprix($connex, $prix, $prixMax,$prixMin) {
	
	$stmt =$connex->prepare("SELECT nomvoiture,desimg,place,prix,BoiteVite FROM voitures WHERE prix >= :prixMin;AND prix <= :prixMax; ");

	$stmt->bindParam(':prix', $prix);
	$stmt->bindParam(':prixMax', $prixMax);
	$stmt->bindParam(':prixMin', $prixMin);

	
	$stmt->execute();

	return $stmt
}
function FilterPlaces($connex, $place, $NbrPlaces) {
	
	$stmt =$connex->prepare("SELECT nomvoiture,desimg,place,prix,BoiteVite FROM voitures WHERE place = :NbrPlaces ");

	$stmt->bindParam(':place', $place);
	$stmt->bindParam(':NbrPlaces', $NbrPlaces);
	

	
	$stmt->execute();

	return $stmt
}

?>