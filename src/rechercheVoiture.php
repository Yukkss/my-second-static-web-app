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
<body>
    <header >
    <div class="container">
        <div class="seconn">
            <button id="seconn">Se Connecter</button>
        </div>
        <div class="menu">
            <button id="butmenu">MENU</button>
            <div class="menu-content">
                <a>Recherche</a>
                <a>Contact</a>
                
            </div>

        </div>
    </div>


    </header>


<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>How to Filter Data by PRICE in PHP MySQL |  (Filter Product by PRICE)  </h4>
                    </div>
                    <div class="card-body">

                        <form action="rechercheVoiture" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Prix Min</label>
                                    <input type="text" name="P_prixMin" value="<?php if(isset($_GET['P_prixMin'])){echo $_GET['P_prixMin']; }else{echo "100";} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Prix Max</label>
                                    <input type="text" name="P_prixMax" value="<?php if(isset($_GET['P_prixMax'])){echo $_GET['P_prixMax']; }else{echo "400";} ?>" class="form-control">
                                </div>
								 <div class="col-md-4">
                                    <label for="">Places</label>
									<?php
									$resultat=FilterPlaces($conn1);
									$resuTab = $resultat->fetchAll(); // on récupère le tout dans un tableau. Dans le tableau résultat, la 1ère ligne est associée à chaque ligne qui suit.
									// fabrication de lliste déroulante (balise SELECT) à partir des clients (infos issues de la bdd)
									print '<select name="Place">'; // envoyé comme paramètre dans le formulaire
									foreach ($resuTab as $ligne) {
									print '<option value="">'.$ligne["P_place"].'</option>'; // pour créer chaque ligne de choix  }
									print "</select>"; ?>
                                </div>
								<div class="col-md-4">
                                    <label for="">Boite de Vitesses </label>
                                    <input type="Select" name="P_BoiteVite" value="<?php if(isset($_GET['P_prixMax'])){echo $_GET['P_prixMax']; }else{echo "400";} ?>" class="form-control">
                                </div>																 
								<div class="col-md-4">
                                    <label for="">Type De Carroserie </label>
                                    <input type="text" name="P_prixMax" value="<?php if(isset($_GET['P_prixMax'])){echo $_GET['P_prixMax']; }else{echo "400";} ?>" class="form-control">
                                </div>
								<div class="col-md-4">
                                    <label for="">Prix Max</label>
                                    <input type="text" name="P_prixMax" value="<?php if(isset($_GET['P_prixMax'])){echo $_GET['P_prixMax']; }else{echo "400";} ?>" class="form-control">
                                </div>
								
                                <div class="col-md-4">
                                     <br/>
                                    <button type="submit" class="btn btn-primary px-4">Rechercher</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

	
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Product Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <?php  
                                              
                        $First_query_run = CheckDate ($connex, $start_date, $datereservation, $end_date, $dateretour); // la fonction verifier si les dates choisi par le client sont disponibles et quelles voitures sont disponibles 
                        $Second_query_run =  MontreVoiture ($connex,$marque,$place,$boiteVite,$typevoiture, )           
                        if(mysqli_num_rows($First_query_run) = 0)
                        {
                            foreach($Second_query_run as $items)
                            {
                                // 
                                ?>
                                <div class="col-md-4 mb-3">
                                <div class="border p-2">
                                    <h5><?php echo $items['name']; ?></h5>
                                    <h6>PRICE: <?php echo $items['price']; ?></h6>
                                </div>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "Dates Non Disponibles";
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>>
</body>

</html>
