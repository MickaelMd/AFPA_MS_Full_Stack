<?php 
require_once __DIR__.'/../assets/php/connect.php';

$id = $_GET['plat'];

if (!is_numeric($id) || (int) $id <= 0) {
    echo '<h1>Erreur : ID de plat invalide.</h1>';
    exit;
}

$resultat = pl_unique_verif($id);

if (!$resultat) {
    echo "<h1>Erreur : Le plat demandé n'existe pas.</h1>";
    exit;
}

$name = htmlspecialchars($resultat['libelle'], ENT_QUOTES, 'UTF-8');

require_once __DIR__.'/../assets/php/head.php'; 
?>

<body>
    <div class="container">
        <?php require_once __DIR__.'/../assets/php/header.php'; ?>

        <section id="sec_cards_plat_cat">
            <h1 id="title_section_cat_plat">Plat : <?= $name ?></h1>

            <div id="cards_section_p_c">

                <?php
                $platL = pl_list($id);

                foreach ($platL as $platLs):
                    $libelle = htmlspecialchars($platLs['libelle'], ENT_QUOTES, 'UTF-8');
                    $image = htmlspecialchars($platLs['image'], ENT_QUOTES, 'UTF-8');
                    $prix = htmlspecialchars($platLs['prix'], ENT_QUOTES, 'UTF-8');
                    $description = htmlspecialchars($platLs['description'], ENT_QUOTES, 'UTF-8');
                    
                    if (strlen($description) > 500) {
                        $description = substr($description, 0, 500).'...';
                    }
                ?>

                <div class="card mb-3" id="cards_plat_all" style="max-width: 100%">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="../assets/img/food/<?= $image ?>" class="img-fluid rounded-start"
                                alt="<?= $libelle ?>" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"><?= $libelle ?></h4>
                                <p class="card-text font_text"><?= $description ?></p>
                                <p class="font_text show_price"><?= $prix ?>€</p>
                                <div class="d-grid gap-2 d-md-flex">
                                    <a href="#">
                                        <button type="button" class="btn btn-info mt-3 btn_com">COMMANDER</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>

            </div>

        </section>
    </div>
    <?php require_once __DIR__.'/../assets/php/footer.php'; ?>
</body>

</html>