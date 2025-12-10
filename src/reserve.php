<?php

session_start();
 if (isset($_SESSION['login']) && isset($_SESSION['passwd'])) {
    $login = $_SESSION['login'];
    $passwd = $_SESSION['passwd'];
	$typelogin = $_SESSION['type'];
	$idclient = $_SESSION['idclient'];
	$start_date = $_SESSION['start_date'];
    $end_date = $_SESSION['end_date'];
 }else{
	 header ("Location:login.php");
 }
?>

<?php
require_once 'fonctionsConnexion.php'; 	// déclaration du fichier contenant des fonctions pouvant être appelées
require_once 'fonctionsBDD.php'; // délaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant  êre appelées

$conn1=connexionBDD('paramCon.php'); 	// appel de la fonction connexionBDD. Le résultat retourné (un connecteur à la bdd) sera dans la variable $conn1
// à partir d'ici, on est connecté à  la BDD acec le connecteur $conn1
?>
<!--Debut de html on cree le site pour le client  -->
<html lang="fr"> 
<head>
    <meta charset="utf-8" />
    <meta name="Author" Content="Filippos MARKAKIS, Walid DAHI" />
    <link rel="stylesheet" href="./css/deafault.css" />
    <link rel="stylesheet" href="./css/layout.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>	
	<title>Location Voiture: CousCous à la Grec </title>	
	<meta name="description" content="Site de Location Voiture " />
	<meta name="keywords" content="Location,Voiture,Annecy,haute,Savoie,Haute-Savoie,prix-bas,pas-cher,promo"/>
	
	
	

</head>
<h1> Votre Reservation </h1>
<?php if( isset($_SESSION['login']) && $_SESSION['passwd'] !== null ) : 
			echo "Bienvenue, " . escape($login). "  Les Date Chosi Sont : " .escape($start_date). " ET : ".escape($end_date)."";
      ?>
			<br></br>
			<button id="sedeconn" onclick = "window.location.href='./logout.php';">Se Déconnecter</button>
		  <?php else : ?>
			<button id="seconn" onclick = "window.location.href='./login.php';">Se Connecter</button>
		  <?php endif; ?>
      <div class="menu">
            <button id="butmenu">MENU</button>
            <div class="menu-content">
            <a href="./index.php">Recherche</a>
            <a href="./monCompte.php">Mon Compte</a>
                
            </div>

        </div>
<?php 
$local_idvoiture = ($_GET["P_idvoiture"]);
$Clients = ClientReserve($conn1,$idclient);
$Voiture = VoitureReserve($conn1,$local_idvoiture);

foreach($Clients as $items)
{
    
    ?>
    <div class="col-md-4 mb-3">
    <div class="border p-2">

        <h3>Votre Données </h3>
        <h5>Nom : <?php echo $items['nom']; ?></h5>
        <h5>prenom : <?php echo $items['prenom']; ?></h5>
        <h5>Nr. Tel: <?php echo $items['contact'];?></h5>
        <h5>Adress Mail : <?php echo $items['email']; ?></h5>


        
    </div>
    </div>
    <?php
}

?>
<?php
foreach($Voiture as $items)
{
    
    ?>
    <div class="col-md-4 mb-3">
    <div class="border p-2">

        <h3>La Voiture Choisi </h3>
        <h5>Modele : <?php echo $items['nomvoiture']; ?></h5>
        <h5>Marque: <?php echo $items['marque']; ?></h5>
        <h5>Prix : <?php echo $items['prix']; print ' € /par Jour '; ?></h5>
        


        
    </div>
    </div>
    <?php
}

?>


<form action="EnvoieReservation.php" method="GET">
<input type="hidden" name="P_idvoiture"  value=<?php echo $local_idvoiture ?>>
<input type="hidden" name="P_idclient"  value=<?php echo $idclient?>>
<input type="hidden" name="P_start_date"  value=<?php echo $start_date?>>
<input type="hidden" name="P_end_date"  value=<?php echo $end_date?>>
<div class="col-md-4">
                  <label for="">Point Retrait / Retour du Vehicule</label>
									<?php
									$resultat=listerPointsRetraits($conn1);
									$resuTab = $resultat->fetchAll();
									print '<select name="P_refidpointretraits">'; 
									foreach ($resuTab as $ligne) 
									{ print '<option value='.$ligne["idpointretrait"].'>'.$ligne["nompointretrait"].'</option>';}
								    print "</select>"; ?>
                  </div>
<input type="submit" name="envoie" value="C'est Parti!!">

</form>
<?php 

deconnexionBDD($conn1); // fermeture de connexion BDD 

?> 
</html>