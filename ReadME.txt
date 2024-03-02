NOM : RANDRIAMISAINA
PRENOMS : Tsiory Fanomezana

1-
Lancer le serveur dans le terminal
les tables : 
	*utilisateurs.sql
utilisateurs(mail, prenom, nom, telephone)

	*biens.sql
biens(idBien, mailProprio, commune, rue, cp, nbCouchages,nbChambres, distance, prix, latitude, longitude)
Ici, on a utilisé leaflet comme carte
On a ajouté manuelement les latitudes et longitudes dans la table biens.
dossier: leaflet

	*locations.sql
locations(idLocation, idBien, mailLoueur, dateDebut, dateFin, avis, noteEtoile, nom, prenom)
	
	*commentaire.sql
commentaire(idCom, idBien, nom, prenom, comment)


************************************************************************
************************************************************************

2-

	* biens.php
page d'accueil
permet de faire des recherches
affiche les résultats des recherches, les avis, et les commentaires
affiche les résultats sur la carte
liens pour s'authentifier ou s'inscrire ("LOG IN", "Réserver")

	* inscription.php
permet de créer un nouveau utilisateur

	* authentification.php
récupère les infos saisie
Vérifie si l'utilisateur existe avec le mail et le téléphone donnés
si OK : redirection vers: http://localhost:8080/utilisateurs.php
sinon, Authentification échouée. Veuillez vérifier vos informations.


	* locations.php
page pour faire une réservation
elle récupère automatiquement le idBien, mailProprio, nom, prenom
on peut ajouter un avis, et les notes en étoile

	* deconnexion.php
pour déconnecter
efface les coockies, et redirige vers http://localhost:8080/biens.php

	*maReservation.php
contient toutes les réservations que l'utilisateur a fait

	*utilisateurs.php
page qui permet de faire des réservations, recherches, ajout de commentaire (les avis peuvent être commenté)
affichage des résultats 

	*styles.css
contient les styles

	*leaflet : carte utilisé

	*photos : contient l'icone 

*********************************************************************************************
*********************************************************************************************

3-
Ouvrir le navigateur et taper (selon le port, ici port 8080)
	http://localhost:8080/biens.php
	
Vous pouvez faire des recherches sur un logement par
	*Commune
	*nombre de couchage
	*nombre de chambre
	*distance max
	*prix min, prix max
	*date d'Arrivée et date de départ 
	
les résultats des recherches sont aussi marqués sur la carte par le marqueur (idBien,commune,cp, et rue) 

Les avis, note en étoile et les commentaires sur les avis sont affichés

il y a le lien "Réserver" sur chaque bien
Vous ne pouvez pas faire une réservation si vous n'avez pas de compte
redirection vers: http://localhost:8080/authentification.php

le lien "Réserver" : mêne vers la page d'authentification 
redirection vers: http://localhost:8080/authentification.php

si vous n'avez pas encore de compte, cliquer sur "S'inscrire" 
redirection vers: http://localhost:8080/inscription.php

après inscrit, vous devriez vos authentifier


***************************************************************************
4-
si authentification = OK,
vous serez rediriger vers http://localhost:8080/utilisateurs.php

Votre nom et prénom seront en haut à droite

il y a aussi les liens : 
	* "Deconnexion" : pour se déconncter, redirection vers: http://localhost:8080/biens.php
		 
	* "Mes réservations": affichent toutes les réservations que l'utilisateur a effectué 
	redirection vers: http://localhost:8080/maRéservation.php

	* "Réserver" : redirection vers: http://localhost:8080/maRéservation.php, 
	pour faire une réservation : ajout dateDebut, dateFin si vous n'avez pas défini ces dates lors de la recherche

Vous pouvez faire des recherches sur un logement par
	*Commune
	*nombre de couchage
	*nombre de chambre
	*distance max
	*prix min, prix max
	*date d'Arrivée et date de départ 
	*Et faire une réservation
	*ajouter des commentaires sur les avis

les résultats des recherches sont aussi marqués sur la carte par le marqueur (idBien,commune,cp, et rue) 





