<?php
session_start();

$login = strtolower(trim($_POST['login'] ?? ''));
$mdp = trim($_POST['mdp'] ?? '');

# Mot de passe bts2026
$hash = '$2y$10$O1h47QkmKvEwdP.yVUhgeeE8YX6V5WsZ6okQG.1iK1N.7Q6Ivp4yu';

if ($login === 'admin' && password_verify($mdp, $hash)) {
    $_SESSION['user'] = $login;
    header('Location: /admin.php');
    exit();
}

$_SESSION['error'] = 'Login/MDP incorrect';
header('Location: /vues/connexion.php');
exit();