<?php
require_once ''; // déclaration du fichier contenant des fonctions pouvant être appelées
$conn1=connexionBDD(''); // appel de la fonction connexionBDD. Le résultat retourné sera dans la variable $conn1
// a partir d'ici, on est connecté à la BDD acec le connecteur $conn1

require_once ''; // déclaration du fichier contenant des fonctions liées à l'utilisation de la BDD pouvant être appelées
require_once ''; // déclaration du fichier contenant des fonctions orientées système (filtrage)


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
	<title>Location Voiture: CousCous à la Grec </title>	
	<meta name="description" content="Site de Location Voiture " />
	<meta name="keywords" content="Location,Voiture,Annecy,haute,Savoie,Haute-Savoie,prix-bas,pas-cher,promo"/>
	
	
	

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>How to Filter Data by PRICE in PHP MySQL |  (Filter Product by PRICE)  </h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Start Price</label>
                                    <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price']; }else{echo "100";} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">End Price</label>
                                    <input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price']; }else{echo "900";} ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Click Me</label> <br/>
                                    <button type="submit" class="btn btn-primary px-4">Filter</button>
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
                        $con = mysqli_connect("localhost","root","","phptutorials");

                        if(isset($_GET['start_price']) && isset($_GET['end_price']))
                        {
                            $startprice = $_GET['start_price'];
                            $endprice = $_GET['end_price'];

                            $query = "SELECT * FROM a_products WHERE price BETWEEN $startprice AND $endprice ";
                        }
                        else
                        {
                            $query = "SELECT * FROM a_products";
                        }
                        
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $items)
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
                            echo "No Record Found";
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>