<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: authentification.php");
    exit();
}

$nomUtilisateur = $_SESSION['utilisateur']['nom'];
$prenomUtilisateur = $_SESSION['utilisateur']['prenom'];

/// Récupérer les données
$idBien = isset($_GET['idBien']) ? $_GET['idBien'] : '';
$mailProprio = isset($_GET['mailProprio']) ? $_GET['mailProprio'] : '';
$dateDebut = isset($_GET['dateDebut']) ? $_GET['dateDebut'] : '';
$dateFin = isset($_GET['dateFin']) ? $_GET['dateFin'] : '';
$avis = isset($_GET['avis']) ? $_GET['avis'] : '';
$noteEtoile = isset($_GET['noteEtoile']) ? $_GET['noteEtoile'] : '';


?>
<!DOCTYPE html>
<html>
    <head>
        <title> Location </title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>

        <div id="authContainer">
            <img id="authIcon" src="/photos/AuthIcon.jpg" alt="Icône d'authentification">
            <span id="authText"><?php echo $nomUtilisateur . ' ' . $prenomUtilisateur; ?></span>
            
        </div>

        <div id="upperRightLinks">
            <span id="logoutBtn"><a href="biens.php">Déconnexion</a></span>
            <p><a href="utilisateurs.php">Retourner aux biens</a></p>
        </div>
        <div class="form-container">
            <h2>Réservation</h2>
            <form action="locations.php" method="GET" class="location">
                
                <label for="dateDebut">Date d’arrivée :</label>
                <input type="date" name="dateDebut" value="<?php echo $dateDebut; ?>"required/></br>

                <label for="dateFin">Date de départ :</label>
                <input type="date" name="dateFin" value="<?php echo $dateFin; ?>"required/></br>

                <label for="idBien">Réference :</label>
                <input type="text" name="idBien" value="<?php echo $idBien; ?>" required readonly/></br>

                <label for="mailProprio">Mail du propriétaire :</label>
                <input type="text" name="mailProprio" value="<?php echo $mailProprio; ?>" required readonly/></br>

                <label for="nom">Nom :</label>
                <input type="text" name="nom" value="<?php echo $nomUtilisateur; ?>" required readonly/></br>

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" value="<?php echo $prenomUtilisateur; ?>" required readonly/></br>

                <label for="avis">Avis :</label>
                <input type="text" name="avis" /></br>

                <input type="hidden" name="noteEtoile" id="noteEtoile" value="0"/>

                <div class="rating" onclick="rateStar(event)">
                    <span class="star" data-value="1">&#9733;</span>
                    <span class="star" data-value="2">&#9733;</span>
                    <span class="star" data-value="3">&#9733;</span>
                    <span class="star" data-value="4">&#9733;</span>
                    <span class="star" data-value="5">&#9733;</span>
                </div>
                <input type="submit" name="reservation" value="Valider la réservation"/>
            </form>

            <script>
                function rateStar(event) {
                    const stars = document.querySelectorAll('.star');
                    const starValue = parseInt(event.target.getAttribute('data-value'));

                    document.getElementById('noteEtoile').value = starValue;

                    stars.forEach((star, index) => {
                        if (index < starValue) {
                            star.classList.add('active');
                        } else {
                            star.classList.remove('active');
                        }
                    });
                }

            </script>


        
                <?php

                $dsn="mysql:host=mysql.etu.umontpellier.fr; dbname=e20230012311; charset=UTF8"; 
                $login="e20230012311";
                $password="12345";

                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["reservation"])){

                try
                    {
                    $dbh = new PDO($dsn,$login,$password);
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    #echo "connecté";
                
                    // Vérifiez si les dates sont non nulles et si la chambre est disponible
                    if (!empty($dateDebut) && !empty($dateFin)) {
                        $checkAvailabilityQuery = "SELECT COUNT(*) AS count FROM locations 
                                                    WHERE idBien = '$idBien' 
                                                        AND (dateFin > '" . $dateDebut . "' AND dateDebut <'" . $dateFin ."')";
                            
                        $availabilityResult = $dbh->query($checkAvailabilityQuery);
                        $availabilityCount = $availabilityResult->fetch(PDO::FETCH_ASSOC)['count'];

                        if ($availabilityCount > 0) {
                            
                            header("Location: locations.php?idBien=$idBien&mailProprio=$mailProprio");
                            echo "</br>La chambre est déjà réservée pour cette période.";
                            exit();
                        } 

                        else {
                        // La chambre est disponible, procédez à l'insertion
                            $sql = "INSERT INTO locations (idBien, mailLoueur, dateDebut, dateFin, avis, noteEtoile, nom, prenom) 
                                        VALUES ('$idBien', '$mailProprio', '$dateDebut', '$dateFin', '$avis', '$noteEtoile','$nomUtilisateur', '$prenomUtilisateur')";
                    
                            //echo "SQL: $sql";
                            $req = $dbh->query($sql) or die("Erreur lors de l'insertion");

                            // informations de réservation
                            //echo "</br>Succès";
                            echo "<h4 class='reservation-title'>Informations de réservation :</h4>";
                            echo "<p>Référence du bien : $idBien</p>";
                            echo "<p>Mail du propriétaire : $mailProprio</p>";
                            echo "<p>Date d'arrivée : $dateDebut</p>";
                            echo "<p>Date de départ : $dateFin</p>";
                            echo "<p>Avis : $avis</p>";
                            echo "<p class='etoile'>Note étoile : ";
                            for ($i = 1; $i <= $noteEtoile; $i++) {
                                echo "&#9733;"; 
                            }
                            echo "</p>";
                            echo "<h4 class='info-title'>Vos informations :</h4>";
                            echo "<p>Nom : $nomUtilisateur</p>";
                            echo "<p>Prénom : $prenomUtilisateur</p>";
                        } 
                        
                    } else {
                        echo "</br>Veuillez spécifier des dates valides.";
                    }
                }
                catch(PDOException $e)
                {
                    echo "Erreur PDO: " . $e->getMessage();
                }

            } 
        ?>
        </div>
    </body>
</html>

