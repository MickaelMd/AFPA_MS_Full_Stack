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

    function employe($where) {
        
        global $mysqlClient;
        $sqlQueryy = "SELECT * FROM `employe` $where";
        $employeStatement = $mysqlClient->prepare($sqlQueryy);
        $employeStatement->execute();
        $employeList = $employeStatement->fetchAll();

        return $employeList;

    }

    function depa($where) {
        global $mysqlClient;
        $sqlQueryy = "SELECT * FROM `employe` $where";
        $depalistStatement = $mysqlClient->prepare($sqlQueryy);
        $depalistStatement->execute();
        $depalist = $depalistStatement->fetchAll();

        return $depalist;
    }
    
    // 1. Afficher toutes les informations concernant les employés. 
    
    $sqlQueryy = "SELECT * FROM `employe`";
    $employeStatement = $mysqlClient->prepare($sqlQueryy);
    $employeStatement->execute();
    $employeList = $employeStatement->fetchAll();

    echo '<h4>Employés : </h4> </br>';

    foreach ($employeList as $employe) {
        echo $employe["nom"] . ' ' . $employe['prenom'] . ' - ' . $employe['titre'] . '</br>';
    }

    echo '<hr>';

    // 2. Afficher toutes les informations concernant les départements. 

    $sqlQueryy = "SELECT * FROM `dept`";
    $deptStatement = $mysqlClient->prepare($sqlQueryy);
    $deptStatement->execute();
    $deptList = $deptStatement->fetchAll();


    echo '<h4>Départements : </h4> </br>';
    foreach ($deptList as $dept) {
        echo $dept["nom"] . ' Région : ' . $dept['noregion'] . '</br>';
    }

    echo '<hr>';
 
    //3. Afficher le nom, la date d'embauche, le numéro du supérieur, le numéro de département et le salaire de tous les employés. 

    $sqlQueryy = "SELECT nom, dateemb, nosup, nodep, salaire FROM `employe`";
    $deptdeuxStatement = $mysqlClient->prepare($sqlQueryy);
    $deptdeuxStatement->execute();
    $deptListdeux = $deptdeuxStatement->fetchAll();


    foreach ($deptListdeux as $deptLd) {
        echo '<p>' . $deptLd['nom'] . ' - ' . $deptLd["dateemb"] . ' - ' . $deptLd['nosup'] . ' - ' . $deptLd['nodep'] . ' - ' . $deptLd['salaire'] ;
    }

    echo '<hr>';

    // 4. Afficher le titre de tous les employés.
    // 5. Afficher les différentes valeurs des titres des employés. 

    $sqlQueryy = "SELECT DISTINCT titre FROM `employe`";
    $titreempStatement = $mysqlClient->prepare($sqlQueryy);
    $titreempStatement->execute();
    $titreemp = $titreempStatement->fetchAll();
    
    foreach ($titreemp as $tem) {
        echo $tem['titre'] . '</br>';
    
    }
    echo '<hr>';

    // 6. Afficher le nom, le numéro d'employé et le numéro du
    // département des employés dont le titre est « Secrétaire ».

    $secretaire = employe("WHERE titre = 'secrétaire'");

    foreach ($secretaire as $scr) {
        echo $scr['nom'] . ' ' . $scr['prenom'] . '</br>';
    }

    echo '<hr>';

    // 7. Afficher le nom et le numéro de département dont le numéro de
    // département est supérieur à 40. 


    $sqlQueryy = "SELECT * FROM `dept` WHERE nodept > 40";
    $dept40Statement = $mysqlClient->prepare($sqlQueryy);
    $dept40Statement->execute();
    $dept40 = $dept40Statement->fetchAll();


    foreach ($dept40 as $de) {
        echo $de['nom'] . ' - ' . $de['nodept'] . '</br>';  
    }

    echo '<hr>';

    // 8. Afficher le nom et le prénom des employés dont le nom est
    // alphabétiquement antérieur au prénom. 

    $empAlpha = employe('WHERE nom < prenom');

    foreach ($empAlpha as $emp) {
        echo $emp['nom'] . ' ' . $emp['prenom'] . '</br>'; 
    }

    echo '<hr>';

    // 9. Afficher le nom, le salaire et le numéro du département des employés
    // dont le titre est « Représentant », le numéro de département est 35 et
    // le salaire est supérieur à 20000.

    $ex9 = employe("WHERE salaire > 20000 AND titre = 'Représentant' AND nodep = 35");

    foreach ($ex9 as $ex) {
        echo 'Nom : ' . $ex['nom'] . 'Salaire : ' . $ex['salaire'] . ' Département : ' . $ex['nodep'] . '</br>';
    }

    echo '<hr>';

    // 10.Afficher le nom, le titre et le salaire des employés dont le titre est
    // « Représentant » ou dont le titre est « Président ». 

    $ex10 = employe("WHERE titre = 'Représentant' || titre = 'Président'");

    foreach ($ex10 as $ex10a) {
        echo $ex10a['nom'] . ' - ' . $ex10a['titre'] . ' - ' . $ex10a['salaire'] . '</br>';
    }

    echo '<hr>';

    // 11.Afficher le nom, le titre, le numéro de département, le salaire des
    // employés du département 34, dont le titre est « Représentant » ou
    // « Secrétaire ».


    $ex11 = employe("WHERE nodep = 34 AND titre = 'Représentant' || titre = 'Secrétaire'");
    foreach ($ex11 as $ex11) {
    echo $ex11['nom'] . ' - ' . $ex11['titre'] . ' - ' . $ex11['nodep'] . ' - ' . $ex11['salaire'] .'</br>'; 
}

    echo '<hr>';

    // 12.Afficher le nom, le titre, le numéro de département, le salaire des
    // employés dont le titre est Représentant, ou dont le titre est Secrétaire
    // dans le département numéro 34.
 
    // ??????????? La même que l'ex 11 <<


    // 13.Afficher le nom, et le salaire des employés dont le salaire est compris
    // entre 20000 et 30000. 

    $ex13 = employe("WHERE salaire > 20000 AND salaire < 30000");
    
    foreach ($ex13 as $ex13a) {

        echo 'Nom : ' .  $ex13a['nom'] . ' Salaire : ' . $ex13a['salaire'] . '</br>';
    }

    echo '<hr>';


    // 14... pas trouvé l'exercice !

    // 15.Afficher le nom des employés commençant par la lettre « H ».

    $ex15 = employe("WHERE nom LIKE 'h%'");

    foreach ($ex15 as $ex) {
        echo $ex['nom'] . '</br>';
    }


    echo '<hr>';

    // 16.Afficher le nom des employés se terminant par la lettre « n ».

    $ex16 = employe("WHERE nom LIKE '%n'");
    
    foreach ($ex16 as $ex) {
        echo $ex['nom'] . '</br>';
    }

    echo '<hr>';

    // 17.Afficher le nom des employés contenant la lettre « u » en 3ème
    // position.

    $ex17 = employe("WHERE nom LIKE '__u%'");
    
    foreach ($ex17 as $ex) {
        echo $ex['nom'] . '</br>';
    }


    echo '<hr>';

    // 18.Afficher le salaire et le nom des employés du service 41 classés par
    // salaire croissant.

    $ex18 = employe("WHERE nodep = 41 ORDER BY 'salaire'");
    
    foreach ($ex18 as $ex) {
        echo $ex['nom'] . ' ' . $ex['salaire'] . '</br>';
    }

    echo '<hr>';

    // 19.Afficher le salaire et le nom des employés du service 41 classés par
    // salaire décroissant.

    $ex19 = employe("WHERE nodep = 41 ORDER BY salaire ASC");

    foreach ($ex19 as $ex19s) {
        echo $ex19s['nom'] . ' ' . $ex19s['salaire'] . '</br>';
    }


    echo '<hr>';

    // 20.Afficher le titre, le salaire et le nom des employés classés par titre
    // croissant et par salaire décroissant.

    $ex20 = employe("ORDER BY titre AND salaire ASC");

    foreach ($ex20 as $ex) {
        echo $ex['titre'] . ' ' . $ex['salaire'] . ' ' . $ex['nom'] . '</br>';
    }

    echo '<hr>';

    // 21.Afficher le taux de commission, le salaire et le nom des employés
    // classés par taux de commission croissante. 

    $ex21 = employe("ORDER BY tauxcom");

    foreach ($ex21 as $ex) {
        echo $ex['tauxcom'] . ' - ' . $ex['salaire'] . ' - ' . $ex['nom'] . '</br>';
    }

    echo '<hr>';

    // 22.Afficher le nom, le salaire, le taux de commission et le titre des
    // employés dont le taux de commission n'est pas renseigné.

    $ex22 = employe("WHERE tauxcom IS NULL");

    foreach ($ex22 as $ex) {
        echo $ex['tauxcom'] . ' - ' . $ex['salaire'] . ' - ' . $ex['nom'] . '</br>';
    }


    echo '<hr>';

    // 23.Afficher le nom, le salaire, le taux de commission et le titre des
    // employés dont le taux de commission est renseigné.


    $ex23 = employe("WHERE tauxcom IS NOT NULL");

    foreach ($ex23 as $ex) {
        echo $ex['tauxcom'] . ' - ' . $ex['salaire'] . ' - ' . $ex['nom'] . '</br>';
    }

    echo '<hr>';

    // 24.Afficher le nom, le salaire, le taux de commission, le titre des
    // employés dont le taux de commission est inférieur à 15.

    $ex24 = employe("WHERE tauxcom > 15");

    foreach ($ex24 as $ex) {
        echo $ex['nom'] . ' - ' . $ex['salaire'] . ' - ' . $ex['tauxcom'] . ' - ' . $ex['titre'] . '</br>';
    }

    echo '<hr>';

    // 25. Afficher le nom, le salaire, le taux de commission, le titre des
    // employés dont le taux de commission est supérieur à 15. 

    $ex25 = employe("WHERE tauxcom < 15");

    foreach ($ex25 as $ex) {
        echo $ex['nom'] . ' - ' . $ex['salaire'] . ' - ' . $ex['tauxcom'] . ' - ' . $ex['titre'] . '</br>';
    }

    echo '<hr>';

    // 26.Afficher le nom, le salaire, le taux de commission et la commission des
    // employés dont le taux de commission n'est pas nul. (la commission
    // est calculée en multipliant le salaire par le taux de commission)


    $sqlQueryy = "SELECT nom, salaire, tauxcom, salaire * tauxcom AS ex26com FROM employe WHERE tauxcom IS NOT NULL";
        $employeStatement = $mysqlClient->prepare($sqlQueryy);
        $employeStatement->execute();
        $ex26 = $employeStatement->fetchAll();

    foreach ($ex26 as $ex) {
        
        echo $ex['nom'] . ' - ' . $ex['salaire'] . ' - ' . $ex['tauxcom'] . ' - ' . $ex['ex26com'] . '</br>';
    }

    echo '<hr>';

    // 27. Afficher le nom, le salaire, le taux de commission, la commission des
    // employés dont le taux de commission n'est pas nul, classé par taux de
    // commission croissant. 

    $sqlQueryy = "SELECT nom, salaire, tauxcom, salaire * tauxcom AS ex27com FROM employe WHERE tauxcom IS NOT NULL ORDER BY tauxcom";
    $employeStatement = $mysqlClient->prepare($sqlQueryy);
    $employeStatement->execute();
    $ex27 = $employeStatement->fetchAll();

foreach ($ex27 as $ex) {
    
    echo $ex['nom'] . ' - ' . $ex['salaire'] . ' - ' . $ex['tauxcom'] . ' - ' . $ex['ex27com'] . '</br>';
}

    echo '<hr>';
    
    // 28. Afficher le nom et le prénom (concaténés) des employés. Renommer
    // les colonnes.

    $sqlQueryy = "SELECT CONCAT(nom, ' ', prenom) AS newcol FROM employe";
        $employeStatement = $mysqlClient->prepare($sqlQueryy);
        $employeStatement->execute();
        $ex28 = $employeStatement->fetchAll();

        foreach ($ex28 as $ex) {
            echo $ex['newcol'] . '</br>';
        }

    echo '<hr>';

    // 29. Afficher les 5 premières lettres du nom des employés.

    $sqlQueryy = "SELECT SUBSTRING(nom, 1, 5) AS newcol FROM employe";
    $employeStatement = $mysqlClient->prepare($sqlQueryy);
    $employeStatement->execute();
    $ex29 = $employeStatement->fetchAll();

    foreach ($ex29 as $ex) {
        
        echo $ex['newcol'] . '</br>';
    }


    echo '<hr>';

    // 30. Afficher le nom et le rang de la lettre « r » dans le nom des
    // employés.


    $sqlQueryy = "SELECT nom, INSTR(nom, 'r') AS rang FROM employe WHERE INSTR(nom, 'r') > 0;";
    $employeStatement = $mysqlClient->prepare($sqlQueryy);
    $employeStatement->execute();
    $ex30 = $employeStatement->fetchAll();

    foreach ($ex30 as $ex) {
        
        echo $ex['nom'] . ' - ' . $ex['rang'] . '</br>';
    }

    echo '<hr>';

    // 31. Afficher le nom, le nom en majuscule et le nom en minuscule de
    // l'employé dont le nom est Vrante.

    $sqlQueryy = "SELECT nom, UPPER(nom) AS nommaj, LOWER(nom) AS nommin FROM employe WHERE nom = 'Vrante'";
    $employeStatement = $mysqlClient->prepare($sqlQueryy);
    $employeStatement->execute();
    $ex31 = $employeStatement->fetchAll();

    foreach ($ex31 as $ex) {
        
        echo $ex['nom'] . ' - ' . $ex['nommaj'] . ' - ' . $ex['nommin'] . '</br>';
    }

    echo '<hr>';

    // 32. Afficher le nom et le nombre de caractères du nom des employés.

    $sqlQueryy = "SELECT nom, LENGTH(nom) AS nomnum FROM employe";
    $employeStatement = $mysqlClient->prepare($sqlQueryy);
    $employeStatement->execute();
    $ex32 = $employeStatement->fetchAll();

    foreach ($ex32 as $ex) {
        
        echo $ex['nom'] . ' - ' . $ex['nomnum'] . '</br>';
    }

    echo '<hr>';
    ?>


</body>

</html>