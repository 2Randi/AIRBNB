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

// Récupérer les données depuis l'URL
$idBien = isset($_GET['idBien']) ? $_GET['idBien'] : '';
$idLocation = isset($_GET['idLocation']) ? $_GET['idLocation'] : '';
$mailProprio = isset($_GET['mailProprio']) ? $_GET['mailProprio'] : '';
$dateDebut = isset($_GET['dateDebut']) ? $_GET['dateDebut'] : '';
$dateFin = isset($_GET['dateFin']) ? $_GET['dateFin'] : '';


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

        <h1>Mes réservations</h1>

        <?php

        $dsn="mysql:host=mysql.etu.umontpellier.fr; dbname=e20230012311; charset=UTF8"; 
        $login="e20230012311";
        $password="12345";

        try
            {
            $dbh = new PDO($dsn,$login,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            #echo "connecté";

            $sql = "SELECT * FROM locations WHERE nom = '$nomUtilisateur' AND prenom= '$prenomUtilisateur'";
            //echo "SQL: $sql";
            $req = $dbh->query($sql) or die("Erreur");
            $resultLoc=$req->fetchAll();

            foreach ($resultLoc as $enr) {
                echo '<div class="reservation-item">';
                echo "<h4>Référence : " . $enr['idBien'] . "</h4>";
                echo "ID Réservation : " . $enr['idLocation'] . "<br>";
                echo "Nom : " . $enr['nom'] . "<br>";
                echo "Prénom : " . $enr['prenom'] . "<br>";
                echo "Date d'arrivée : " . $enr['dateDebut'] . "<br>";
                echo "Date de départ : " . $enr['dateFin'] . "<br>";
                echo '</div>';
            } 
        }
        catch(PDOException $e)
        {
            echo "Erreur PDO: " . $e->getMessage();
        }

        ?>
        </body>
</html>
    