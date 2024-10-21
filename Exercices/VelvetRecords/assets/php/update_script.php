<?php require_once __DIR__.'/connect.php'; 

$ids = $_POST['id'];
$artist_id = artist_id($_POST['artist_f']);


if (!is_numeric($ids) || (int) $ids <= 0) {
    echo '<h1>Erreur : ID invalide.</h1>';
    exit;
}

$prt = details_disc($ids);

if (!$prt) {
    echo "Le disc n'existe pas.";
    exit;
} 

if (isset($_FILES['picture_f']) && $_FILES['picture_f']['error'] !== UPLOAD_ERR_NO_FILE) {
    $uploadedFileName = upload_image($_FILES['picture_f']);
    if ($uploadedFileName) {
        $picture = $uploadedFileName; 
    } else {
        echo "Erreur lors de l'upload de l'image.";
        $picture = $prt['disc_picture'];
    }
} else {

    $picture = $prt['disc_picture'];
}

try {
    update_disc($ids, $artist_id[0], $picture);
} catch (Exception $e) {
    echo 'Une erreur s\'est produite : ' . $e->getMessage();
    exit;
}

header("Location: /Exercices/VelvetRecords/");