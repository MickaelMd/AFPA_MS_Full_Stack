<?php require_once __DIR__.'/assets/php/connect.php';
 require_once __DIR__.'/assets/php/header.php'; ?>

<?php

$ids = $_GET['disc_id'];

if (!is_numeric($ids) || (int) $ids <= 0) {
    echo '<h1>Erreur : ID invalide.</h1>';
    exit;
}

$prt = details_disc($ids);

if (!$prt) {
    echo "Le disc n'existe pas.";
    exit;
} 
?>
<div class="container mt-5">
    <section>
        <form action="test.php" method="POST">
            <div class="mb-3">
                <label for="title_details_f" class="form-label">Title</label>
                <input type="text" class="form-control" id="title_details_f"
                    value="<?php echo htmlspecialchars($prt['disc_title']) ?>" disabled>
            </div>
            <div class="mb-2">
                <label for="artist_details_f" class="form-label">Artist</label>
                <input type="text" class="form-control" id="artist_details_f"
                    value="<?php echo htmlspecialchars($prt['artist_name']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="year_details_f" class="form-label">Year</label>
                <input type="text" class="form-control" id="year_details_f"
                    value="<?php echo htmlspecialchars($prt['disc_year']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="genre_details_f" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre_details_f"
                    value="<?php echo htmlspecialchars($prt['disc_genre']) ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="label_details_f" class="form-label">Label</label>
                <input type="text" class="form-control" id="label_details_f"
                    value="<?php echo htmlspecialchars($prt['disc_label']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="price_details_f" class="form-label">Price</label>
                <input type="text" class="form-control" id="price_details_f"
                    value="<?php echo htmlspecialchars($prt['disc_price']) ?>" disabled>
            </div>
            <label for="picture_details_f" class="form-label">Picture</label> <br>
            <div class="input-group mb-3" id="upload_img" style="display: none;">
                <input type="file" class="form-control" id="inputGroupFile02">

            </div>
            <img class="details_img" src="assets/img/pictures/<?php echo htmlspecialchars($prt['disc_picture']) ?>"
                alt="">
            <br>
            <div class="d-flex">
                <a href="#" id="btn_edit" class="btn btn-primary m-2">Modifier</a>

                <button class="btn btn-primary m-2" id="submit_btn" type="submit" style="display: none;">Submit
                    form</button>

                <a href="post.php" id="delete_btn" class="btn btn-primary m-2" id="submit_btn"
                    type="submit">Supprimer</a>

                <a href="" class="btn btn-primary m-2">Retour</a>

            </div>
        </form>
    </section>
</div>

<?php require_once __DIR__.'/assets/php/footer.php'; ?>