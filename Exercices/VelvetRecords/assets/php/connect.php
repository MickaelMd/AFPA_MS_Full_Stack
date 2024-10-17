<?php

session_start();
date_default_timezone_set('Europe/Paris');

require_once __DIR__.'/../../vendor/autoload.php';

use Dotenv\Dotenv;

define('BASE_URL', '/exercices/VelvetRecords/');

try {
     $dotenv = Dotenv::createImmutable(__DIR__.'/../../../../../'); // Chemin vers le .env en dehors de du projet <---
   // $dotenv = Dotenv::createImmutable(__DIR__.'/../../../../'); // .env dans le main projet <---
    $dotenv->load();

    $dsn = 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME_EXO_CRUB'].';charset='.$_ENV['DB_CHARSET'];
    $username = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];

    $mysqlClient = new PDO($dsn, $username, $password);
} catch (Exception $e) {
    echo '<h1>Erreur : Configurer le fichier connect.php dans /assets/php et le .env, et utilisez MariaDB.</h1>';
    exit('Erreur : '.$e->getMessage());
}

function disc_list() {
        
    global $mysqlClient;
    $sqlQueryy = "SELECT * FROM artist JOIN disc ON disc.artist_id = artist.artist_id";
    $Statement = $mysqlClient->prepare($sqlQueryy);
    $Statement->execute();
    $disc_list = $Statement->fetchAll();

    return $disc_list;

}
function details_disc($id) {
    global $mysqlClient;
    $sqlQueryy = "SELECT * FROM artist JOIN disc ON disc.artist_id = artist.artist_id WHERE disc_id = :id";
    $Statement = $mysqlClient->prepare($sqlQueryy);
    $Statement->bindParam(':id', $id, PDO::PARAM_INT);
    $Statement->execute();
    $disc = $Statement->fetch();

    return $disc;
}