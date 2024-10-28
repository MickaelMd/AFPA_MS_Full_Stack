<?php

session_start();
date_default_timezone_set('Europe/Paris');

require_once __DIR__.'/../../vendor/autoload.php';

use Dotenv\Dotenv;

try {
    $dotenv = Dotenv::createImmutable(__DIR__.'/../../../../'); // Chemin vers le .env en dehors de du projet <---
     // $dotenv = Dotenv::createImmutable(__DIR__.'/../../../../'); // .env dans le main projet <---
    $dotenv->load();

    $ip_link = $_ENV['URL_LINK_TD'];

    $dsn = 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME_TD'].';charset='.$_ENV['DB_CHARSET'];
    $username = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];

    $mysqlClient = new PDO($dsn, $username, $password);
} catch (Exception $e) {
    echo '<h1>Erreur : Configurer le fichier connect.php dans /assets/php et le .env, et utilisez MariaDB.</h1>';
    exit('Erreur : '.$e->getMessage());
}

if (isset($_SESSION['email'])) {
    $req = $mysqlClient->prepare(query: 'SELECT id FROM clients WHERE email = :email');
    $req->execute(params: ['email' => $_SESSION['email']]);

    $userExists = $req->fetch();

    if (!$userExists) {
        unset($_SESSION['email']);
        unset($_SESSION['nom']);
        unset($_SESSION['prenom']);
        unset($_SESSION['telephone']);
        unset($_SESSION['adresse']);
        unset($_SESSION['admin']);
        unset($_SESSION['role']);
        unset($_SESSION['lostmail']);
        unset($_SESSION['nom_client']);
        unset($_SESSION['uuid']);
        unset($_SESSION['csrf']);
        // unset($_SESSION['shopping_list_count']);

        if (ini_get(option: 'session.use_cookies')) {
            setcookie(session_name(), '', time() - 42000);
        }

        session_destroy();
    }
}

require_once __DIR__.'/PDO.php';