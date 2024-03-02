<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Connexion</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="authentification">
            <form action="authentification.php" method="POST">
                <h2>Connexion</h2>

                <label for="mail">Email* :</label>
                <input type="text" name="mail" placeholder="adresse mail" required /> 

                <label for="telephone">Téléphone* :</label>
                <input type="text" name="telephone" placeholder="telephone" required /> 

                <input type="submit" name="authentification" value="Se connecter">
            </form>
            <p>Pas encore inscrit? <a href="inscription.php">S'inscrire</a></p>

            <p>Revenir aux biens <a href="biens.php"> ici</a></p>

        </div>

        <?php

        session_start();

        $dsn="mysql:host=mysql.etu.umontpellier.fr; dbname=e20230012311; charset=UTF8"; 
        $login="e20230012311";
        $password="12345";

        /* Vérifie si l'utilisateur est déjà connecté
        if (isset($_SESSION['utilisateur'])) {
            header("Location: utilisateurs.php");
            exit();
        }
        */

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["authentification"])) {
            
            try{
                $dbh = new PDO($dsn,$login,$password); 

                $mail = $_POST['mail'];
                $telephone = $_POST['telephone'];

                // Vérifie si l'utilisateur existe avec le mail et le téléphone donnés
                $sql = "SELECT * FROM utilisateurs WHERE mail = '$mail' AND telephone = '$telephone'";
                $result = $dbh->query($sql);

                if ($result->rowCount() > 0) {
                    // Utilisateur trouvé, redirige vers la page des utilisateurs
                    $_SESSION['utilisateur'] = $result->fetch(PDO::FETCH_ASSOC);
                    header("Location: utilisateurs.php");
                    exit();
                } else {
                    echo "Authentification échouée. Veuillez vérifier vos informations.";
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