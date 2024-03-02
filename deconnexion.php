<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: authentification.php");
    exit();
}

// Script de déconnexion
if (isset($_POST['deconnexion'])) {
    // Détruire la session
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Forcer l'expiration du cookie de session côté client
    setcookie('PHPSESSID', '', time() - 1, '/');

    session_destroy();

    // Redirection biens.php après la déconnexion
    header("Location: authentification.php");
    exit();
}
?>