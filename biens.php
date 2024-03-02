<!DOCTYPE html>
<html>
    <head>
    <title>Biens</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="stylesheet" href="leaflet/leaflet.css" />
        <script src="leaflet/leaflet.js"></script>
    </head>
    <body>
        <div id="authContainer">
            <img id="authIcon" src="/photos/AuthIcon.jpg" alt="Icône d'authentification" href="authentification.php">
            <a href="authentification.php"><span id="authText">LOG IN</span></a>
        </div>

        <h1> AirBNB</h1>
        <div id="maCarte" ></div>
        <article>
            <section id="searchFormSection">
            <div id="searchForm">
                    <form action="biens.php" method="POST">              
                        <input type="text" name="commune" placeholder="Commune"/>
                        <input type="number" name="nbCouchages" placeholder="Nombre de lits"/><br>
                        <input type="number" name="nbChambres" placeholder="Nombre de Chambres"/><br>
                        <input type="number" name="distance" placeholder="Distance max"/><br>
                        <input type="number" name="prixMin" placeholder="Prix Min"/><br>
                        <input type="number" name="prixMax" placeholder="Prix Max"><br>
                        <input type="date" name="dateDebut"/><br>
                        <input type="date" name="dateFin"/><br>
                        <input type="submit" value="Rechercher"/>                
                    </form>
                </div>
            
        
                    <script>
                        // Initialiser la carte
                        var maCarte = L.map('maCarte').setView([48.8566, 2.3522], 13);

                        // Ajouter une couche de carte (par exemple, OpenStreetMap)
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                        }).addTo(maCarte);
                    </script>
            </section>
        </article>

        <article id="resultFormSection">
            <section>
                <div id="searchResults">

                <?php
                
                $dsn="mysql:host=mysql.etu.umontpellier.fr; dbname=e20230012311; charset=UTF8"; 
                $login="e20230012311";
                $password="12345";
                
                try {
                    $dbh = new PDO($dsn, $login, $password);
                } catch(PDOException $e) {
                    die("Erreur: " . $e->getMessage());
                }


                if (isset($_POST['submitComment'])) {
                    //echo "INSERTION D'UN COMMENTAIRE !!!!";
                    // Récupérez les données du formulaire
                    $comment = $_POST['comment'];
                    $idLocation = $_POST['idLocation'];
                    //echo $idLocation, $nomUtilisateur, $prenomUtilisateur, ':', $comment;
                    //echo "<br/>-----------------------------------------------------------";
                
                    $insertCommentQuery = "INSERT INTO commentaire (idLocation, nom, prenom, comment) 
                            VALUES ($idLocation, '$nomUtilisateur', '$prenomUtilisateur', '$comment')";
                    $insertCommentStmt = $dbh->prepare($insertCommentQuery);
                    //echo $insertCommentQuery;
                    //var_dump($commentList); 
                
                    if ($insertCommentStmt->execute()) {
                        // Commentaire inséré avec succès
                    } else {
                        // Erreur lors de l'insertion
                        echo "Erreur lors de l'insertion du commentaire.";
                    }
                }

                $idBien = isset($_POST['idBien']) ? $_POST['idBien'] : '';            
                $mailLoueur = isset($_POST['mailProprio']) ? $_POST['mailProprio'] : '';
                $comm  = isset($_POST['commune']) ? $_POST['commune'] : '';
                $nbCou = isset($_POST['nbCouchages']) ? $_POST['nbCouchages'] : '';
                $nbCham = isset($_POST['nbChambres']) ? $_POST['nbChambres'] : '';
                $dist = isset($_POST['distance']) ? $_POST['distance'] : '';
                $prixMin = isset($_POST['prixMin']) ? $_POST['prixMin'] : '';
                $prixMax = isset($_POST['prixMax']) ? $_POST['prixMax'] : '';
                $dateDebut = isset($_POST['dateDebut']) ? $_POST['dateDebut'] : '';
                $dateFin = isset($_POST['dateFin']) ? $_POST['dateFin'] : '';
                
                $sql = "SELECT * FROM biens";

                if (!empty($comm) || !empty($nbCou) || !empty($nbCham) || 
                    !empty($dist) || (!empty($prixMin) && !empty($prixMax))||
                    (!empty($dateDebut) && !empty($dateFin))) {

                    $sql .= " WHERE ";
                
                    $conditions = array(); 

                    if (!empty($comm)) {
                        $conditions[] = "commune='" . $comm . "'";
                    }

                    if (!empty($nbCou)) {
                        $conditions[] = "nbCouchages='" . $nbCou . "'";
                    }

                    if (!empty($nbCham)) {
                        $conditions[] = "nbChambres='" . $nbCham . "'";
                    }

                    if (!empty($dist)) {
                        $conditions[] = "distance<='" . $dist . "'";
                    }

                    if (!empty($prixMin)) {
                        $conditions[] = "prix>='" . $prixMin . "'";
                    }

                    if (!empty($prixMax)) {
                        $conditions[] = "prix<= '" . $prixMax . "'";
                    }

                    if (!empty($dateDebut)) {
                        $conditions[] = "idBien NOT IN (SELECT DISTINCT idBien FROM locations 
                                        WHERE dateFin > '" . $dateDebut . "' AND dateDebut <'" . $dateFin . "')";
                    }

                    $sql .= implode(' AND ', $conditions);
                }

                $req = $dbh->query($sql) or die("PB requête");
                $resultCom = $req->fetchAll();
                
                ?>
                
                <?php foreach($resultCom as $enr): ?>

                <script>
                    // Ajout marqueur pour chaque résultat
                    var marker<?php echo $enr['idBien']; ?> = L.marker([<?php echo $enr['latitude']; ?>, <?php echo $enr['longitude']; ?>])
                        .addTo(maCarte)
                        .bindPopup("<b>Référence:</b> <?php echo $enr['idBien']; ?> <br> <b>Commune:</b> <?php echo $enr['commune']; ?> <br><b>Cp:</b> <?php echo $enr['cp']; ?> <br><b>Rue:</b> <?php echo $enr['rue']; ?>");
                </script>
                <section id="searchResultsSection">
                    <div class="resultCard">
                        <p>Référence :<b> <?php echo $enr['idBien']; ?></b></p>
                        <p><b><?php echo $enr['cp']; ?>, <?php echo $enr['rue']; ?>, <?php echo $enr['commune']; ?></b></p>
                        <p>Prix : <b><?php echo $enr['prix']; ?> €</b></p>
                        <p>Nombre de lits :<b> <?php echo $enr['nbCouchages']; ?></b></p>
                        <p>Nombre de chambres :<b> <?php echo $enr['nbChambres']; ?></b></p>
                        <p>Distance :<b> <?php echo $enr['distance']; ?> m</b></p>
                        <p>Contact :<b> <?php echo $enr['mailProprio']; ?></b></p>
                        <a href='authentification.php'><center>Réserver<center></a>
                    
                        <?php
                        $idBienCom = $enr['idBien'];

                        $avisCom = "SELECT * FROM locations WHERE idBien = '$idBienCom'";
                        $avisResultCom = $dbh->query($avisCom);
                        $resCom = $avisResultCom->fetchAll(PDO::FETCH_ASSOC);
                        echo "</br><p class='avis'>Avis :</p>";

                        if (!empty($resCom)) {
                    
                            foreach ($resCom as $resComM) {
                                $resComM['idLocation'];
                        
                            $idLocation = $resComM['idLocation'];
                            $avisQuery = "SELECT l.nom, l.prenom, l.avis, l.noteEtoile, c.idCom FROM locations l
                                            LEFT JOIN commentaire c ON l.idLocation = c.idLocation
                                            WHERE l.idLocation = '$idLocation'";
                            $avisResult = $dbh->query($avisQuery);
                            $avisList = $avisResult->fetchAll(PDO::FETCH_ASSOC);
                            
                            if (!empty($avisList)) {
                        
                                foreach ($avisList as $avisInfo) { 
                                    echo "<b>" . $avisInfo['nom'] . " " . $avisInfo['prenom'] . " :</b> " . $avisInfo['avis'] . "</p>";
                                    for ($i = 1; $i <= $avisInfo['noteEtoile']; $i++) {
                                        echo "<span class='etoile'>&#9733;</span>"; "&#9733;"; 
                                    }
                                
                                    // Afficher les commentaires pour chaque avis
                                    
                                    $commentQuery = "SELECT nom, prenom, comment FROM commentaire WHERE idLocation = '$idLocation'";
                                    $commentResult = $dbh->query($commentQuery);
                                    $commentList = $commentResult->fetchAll();
                                    //var_dump($commentList);
                                    //echo $commentQuery;

                                    if (!empty($commentList)) {
                                        echo "<p class='avis'>Commentaires :</p>";

                                        foreach ($commentList as $commentInfo) {
                                            echo "<b>" . $commentInfo['nom'] . " " . $commentInfo['prenom'] . " :</b>" . $commentInfo['comment'] . "</p>";
                                        }
                                    
                                    }
                                    }
                                
                                } 
                        }
                    } 
                        ?>

                    </div>
                    <?php endforeach; ?>
                </div>
                </section>
        </article>
    </body>
</html>

