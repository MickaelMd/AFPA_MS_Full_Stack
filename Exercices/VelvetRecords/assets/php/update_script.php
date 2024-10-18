<?php require_once __DIR__.'/connect.php'; 



$title = $_POST['title_f'];
$artist = $_POST['artist_f'];
$year = $_POST['year_f'];
$genre = $_POST['genre_f'];
$label = $_POST['label_f'];
$price = $_POST['price_f'];
$picture = $_POST['picture_f'];

echo $title . ' ' . $artist . ' ' . $year . ' ' . $genre . ' ' . $label . ' ' . $price . ' ' . 
$picture;