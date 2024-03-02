<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title> Inscription </title>
    </head>
    <body>
        <div class="inscription">
            <form action="inscription.php" method="post">
                <h2>Inscription</h2>
                <label for="email">Email* :</label>
                <input type="text" name="mail" placeholder="adresse mail" required /> 

                <label for="prenom">Prénom* :</label>
                <input type="text" name="prenom" placeholder="prenom" required /> 

                <label for="nom">Nom* :</label>
                <input type="text" name="nom" placeholder="nom" required />

                <label for="telephone">Téléphone* :</label>
                <input type="text" name="telephone" placeholder="telephone" required />

                <input type="submit" name="inscription" value="S'inscrire">
            </form>
            <p>Déjà inscrit? <a href="authentification.php">Se connecter</a></p>

            <p>Revenir aux biens <a href="biens.php"> ici</a></p>
        </div>   


        <?php

        session_start();

        $dsn="mysql:host=mysql.etu.umontpellier.fr; dbname=e20230012311; charset=UTF8"; 
        $login="e20230012311";
        $password="12345";

        /* Vérifie si l'utilisateur est déjà connecté
        if (isset($_SESSION['utilisateur'])) {
            header("Location: biens.php");
            exit();
        }
        */
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["inscription"])) {

            try{
                $dbh = new PDO($dsn,$login,$password);
                #echo "connecté";

            $mail = $_POST['mail'];
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $telephone = $_POST['telephone'];

            // Vérifie si l'utilisateur existe déjà
            $result = $dbh->query("SELECT * FROM utilisateurs WHERE mail = '$mail'");
            
            if ($result->rowCount() > 0) {
                echo "L'utilisateur existe déjà. Vous pouvez vous connecter <a href='authentification.php'>ici</a>.";
            } else {
                // Insère un nouvel utilisateur
                $insert = "INSERT INTO utilisateurs (mail, prenom, nom, telephone) 
                VALUES ('$mail','$prenom','$nom', '$telephone')";

                if ($dbh->exec($insert) == TRUE) {
                    echo "Inscription réussie ! Vous pouvez maintenant vous connecter.";
                } else {
                    echo "Erreur lors de l'inscription: " . $dbh->error;
                }
            }

        // Ferme la connexion
            $dbh = null;
            
            } catch (PDOException $e) {
                die("Erreur: " . $e->getMessage());
            }

        }

        ?>
        
    </body>
</html>