<?php
session_start();

// Détruire toutes les variables de session
$_SESSION = array();

// Si vous souhaitez détruire complètement la session, détruisez également le cookie de session.
// Notez: cela détruira la session et non seulement les données de session!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Enfin, détruire la session.
session_destroy();

// Redirection vers la page de connexion
header('Location: index.php');
exit;
?>
