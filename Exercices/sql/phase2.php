<?php require_once __DIR__.'/assets/php/connect.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php 

// Rechercher le prénom des employés et le numéro de la région de leur
// département. 

$sqlQueryy = "SELECT employe.nodep, employe.nom AS nom_employe, dept.nom AS nom_dept FROM `employe` JOIN dept ON employe.nodep = dept.nodept";
$employeStatement = $mysqlClient->prepare($sqlQueryy);
$employeStatement->execute();
$employeList = $employeStatement->fetchAll();

foreach ($employeList as $ex) {

    echo $ex['nom_employe'] . ' - ' . $ex['nodep']  . '</br>';

}

echo '<hr>';

// Rechercher le numéro du département, le nom du département, le
// nom des employés classés par numéro de département (renommer les
// tables utilisées). 

$sqlQuery = "SELECT employe.nom AS nom_employe, employe.nodep AS numdep, dept.nom AS nom_dept FROM employe JOIN dept ON employe.nodep = dept.nodept ORDER BY nodep";
$Statement = $mysqlClient->prepare($sqlQuery);
$Statement->execute();
$ex_2 = $Statement->fetchAll();

foreach ($ex_2 as $ex) {

    echo $ex['numdep'] . ' - ' . $ex['nom_dept'] . ' - ' . $ex['nom_employe'] . '</br>';

}

echo '<hr>';

// Rechercher le nom des employés du département Distribution. 

$sqlQuery = "SELECT employe.nom AS nom_employe FROM employe JOIN dept ON employe.nodep = dept.nodept WHERE dept.nom = 'distribution' ORDER BY nom_employe";
$Statement = $mysqlClient->prepare($sqlQuery);
$Statement->execute();
$ex_3 = $Statement->fetchAll();

foreach ($ex_3 as $ex) {

    echo $ex['nom_employe'] . '</br>';

}

echo '<hr>';

// Rechercher le nom et le salaire des employés qui gagnent plus que
// leur patron, et le nom et le salaire de leur patron. 

$sqlQuery = "SELECT * FROM employe JOIN employe ON employe.nom";
$Statement = $mysqlClient->prepare($sqlQuery);
$Statement->execute();
$ex_3 = $Statement->fetchAll();

foreach ($ex_4 as $ex) {

    echo $ex['nom_employe'] . '</br>';

}


// ----------

// 1. Calculer le nombre d'employés de chaque titre.




// 2. Calculer la moyenne des salaires et leur somme, par région.


// 3. Afficher les numéros des départements ayant au moins 3 employés.


// 4. Afficher les lettres qui sont l'initiale d'au moins trois employés.


// 5. Rechercher le salaire maximum et le salaire minimum parmi tous les
// salariés et l'écart entre les deux.


// 6. Rechercher le nombre de titres différents.


// 7. Pour chaque titre, compter le nombre d'employés possédant ce titre.


// 8. Pour chaque nom de département, afficher le nom du département et
// le nombre d'employés.


// 9. Rechercher les titres et la moyenne des salaires par titre dont la
// moyenne est supérieure à la moyenne des salaires des Représentants.


// 10.Rechercher le nombre de salaires renseignés et le nombre de taux de
// commission renseignés. 

?>
</body>

</html>